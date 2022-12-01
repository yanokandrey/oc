<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
   public function basicsWelcome(){
		return view('dashboard.basicsWelcome');
	}
   public function basicsWelcomePost(){
		return view('dashboard.basicsWelcome');
	}
   public function basicsSEO(){
		return view('dashboard.basicsSEO');
	}
    public function steps(){
		return view('dashboard.steps');
	}
	public function package(){
		return view('dashboard.package');
	}
	public function delivery(){
		return view('dashboard.delivery');
	}
    public function payments(){
		return view('dashboard.payments');
	}
	public function GetUserInfo($token){
		$user=DB::table('users')->where('token', $token)->first();
		return $user;
	}
}
