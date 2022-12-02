<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\Models\User;
use App\Controller\DashboardController;


class AuthController extends Controller
{
	
    public function GenerateLoginUrl() {
		
		$client_id = config('google.CLIENT-ID'); // Client ID
		$client_secret = config('google.CLIENT-SECRET'); // Client secret
		$redirect_uri = config('google.REDIRECT-URL'); // Redirect URIs

		$url = 'https://accounts.google.com/o/oauth2/auth';

		$params = array(
			'redirect_uri'  => $redirect_uri,
			'response_type' => 'code',
			'client_id'     => $client_id,
			'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
			);

		$GoogleLink = $url . '?' . urldecode(http_build_query($params)) ;
		
		return $GoogleLink;
	}
	
	public function LoginUrl() {
		return view('welcome')->with('google_url', $this->GenerateLoginUrl());
	}
	
	public function Login(Request $code){

		if(Auth::attempt()) {
			if(Auth::user()->type=="1") {
				return redirect()->route('dashboard.basicsWelcome');
			}
			if(Auth::user()->type=="0"){
				return view('order/order');
			}
		}
		else {
		$token=sha1(uniqid(time(), true));
		$client_id = config('google.CLIENT-ID'); // Client ID
		$client_secret = config('google.CLIENT-SECRET'); // Client secret
		$redirect_uri = config('google.REDIRECT-URL'); // Redirect URIs
		
		$url = 'https://accounts.google.com/o/oauth2/auth';

		if (isset($code)) {
			$result = false;
			$params = array(
				'client_id'     => $client_id,
				'client_secret' => $client_secret,
				'redirect_uri'  => $redirect_uri,
				'grant_type'    => 'authorization_code',
				'code'          => $_GET['code']);

			$url = 'https://accounts.google.com/o/oauth2/token';

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($curl);
			curl_close($curl);
			$tokenInfo = json_decode($result, true);

			if (isset($tokenInfo['access_token'])) {
				$params['access_token'] = $tokenInfo['access_token'];                                                                              
				$GoogleUserInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
				
				if (isset($GoogleUserInfo['id'])) {
					$result = true;
				$user=DB::table('users')->where('google_id', $GoogleUserInfo['id'])->first();
					if ($user) {
						switch($user->type) {
							case"1":
								Auth::loginUsingId($user->id);
								return redirect(route('dashboard.basicsWelcome'));
							break;
							case"0":
								Auth::loginUsingId($user->id);
								return view('order.order');
							break;
						}	
					}
					else {
						if (is_null(DB::table('users')->find(1))) {
							$this->CreateAdmin($GoogleUserInfo['name'],$GoogleUserInfo['email'],$GoogleUserInfo['id'],$token);
							$user=DB::table('users')->where('google_id', $GoogleUserInfo['id'])->first();
							Auth::loginUsingId($user->id);
							return redirect(route('dashboard.basicsWelcome'));
						}
						else { 
							$this->CreateUser($GoogleUserInfo['name'],$GoogleUserInfo['email'],$GoogleUserInfo['id'],$token);
							$user=DB::table('users')->where('google_id', $GoogleUserInfo['id'])->first();
							Auth::loginUsingId($user->id);
							return redirect(route("order.order"));
						}
					}
				}
			}
		}}
	}
	public function CreateAdmin($name,$email,$GoogleId,$token) {

		$user=User::create([
			"name"=>$name,
			"email"=>$email,
			"google_id"=>$GoogleId,
			"type"=>"1",
			"token"=>$token,
		]);
			
	}

	public function CreateUser($name,$email,$GoogleId,$token) {
		$user=User::create([
			"name"=>$name,
			"email"=>$email,
			"google_id"=>$GoogleId,
			"type"=>"0",
			"token"=>$token,
		]);		
	}
	
	public function GetUserType($google_id) {
		$user=DB::table('users')->select('type')->where('google_id', $google_id)->first();
		return $user->type;
	}
	
	public function GetUser($google_id) {
		$user=DB::table('users')->where('google_id', $google_id)->first();
		return $user;
	} 
	public function Logout(){
		Session::flush();
		Auth::logout();
		return view('welcome')->with('google_url',$this->GenerateLoginUrl());	
	}
}
