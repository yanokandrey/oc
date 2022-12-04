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
		
		$url = 'https://accounts.google.com/o/oauth2/auth';

		$params = array(
			'redirect_uri'  => config('google.REDIRECT-URL'),
			'response_type' => 'code',
			'client_id'     => config('google.CLIENT-ID'),
			'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
			);

		$GoogleLink = $url . '?' . urldecode(http_build_query($params)) ;
		
		return $GoogleLink;
	}
	
	public function LoginURL() {
		return view('welcome')->with('google_url', $this->GenerateLoginUrl());
	}
	
	public function Login(Request $code){

		$token=sha1(uniqid(time(), true));
		
		$url = 'https://accounts.google.com/o/oauth2/auth';

		if (isset($code)) {
			$result = false;
			$params = array(
				'client_id'     => config('google.CLIENT-ID'),
				'client_secret' => config('google.CLIENT-SECRET'),
				'redirect_uri'  => config('google.REDIRECT-URL'),
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
					if ($user && $user->role=="1") {
						Auth::loginUsingId($user->id);
						return redirect(route('dashboard.basicsWelcome'));
					}
					elseif($user && $user->role=="0") {
						Auth::loginUsingId($user->id);
						return view('order.order');
					}	
					elseif(!$user) {
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
		}
		return redirect(route('welcome'));
	}
	public function CreateAdmin($name,$email,$GoogleId,$token) {

		$user=User::create([
			"name"=>$name,
			"email"=>$email,
			"google_id"=>$GoogleId,
			"role"=>"1",
			"token"=>$token,
		]);
	}

	public function CreateUser($name,$email,$GoogleId,$token) {
		$user=User::create([
			"name"=>$name,
			"email"=>$email,
			"google_id"=>$GoogleId,
			"role"=>"0",
			"token"=>$token,
		]);		
	}
	
	public function GetUser($google_id) {
		$user=DB::table('users')->where('google_id', $google_id)->first();
		return $user;
	} 
	public function Logout(){
		Session::flush();
		Auth::logout();
		return redirect(route('welcome'))->with('google_url',$this->GenerateLoginUrl());	
	}
}
