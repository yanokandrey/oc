<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\dashboard;
use App\Models\Parameters;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Image;
use App\Http\Controllers\ParameterController;

class DashboardController extends Controller
{
   public function basicWelcome(){
		$favicon=DB::table('parameters')->where(['name' => 'Favicon'])->first();
		if(!$favicon){
			$favicon = new parameters;
			$favicon->value="";
		}
		$logo=DB::table('parameters')->where(['name' => 'Logo'])->first();
		if(!$logo){
			$logo = new parameters;
			$logo->value="";
		}
		$image=DB::table('parameters')->where(['name' => 'WelcomeImage'])->first();
		if(!$image){
			$image = new parameters;
			$image->value="";
		}
		$text=DB::table('parameters')->where(['name' => 'WelcomeText'])->first();
		if(!$text){
			$text = new parameters;
			$text->value="";
		}
		else {
			$text->value=Storage::disk('views')->get('welcomeText.blade.php');
			$text->value=str_replace("<br />","",$text->value);
		}
		$footer=DB::table('parameters')->where(['name' => 'WelcomeFooter'])->first();
		if(!$footer){
			$footer = new parameters;
			$footer->value="";
		}
		else{
			$footer->value=Storage::disk('views')->get('welcomeFooter.blade.php');
		}
		return view('dashboard.basicWelcome',['favicon'=>$favicon->value,'logo'=>$logo->value,'image'=>$image->value,'text'=>$text->value,'footer'=>$footer->value]);
	}
    public function basicWelcomePost(Request $request){

			//ParametresController::saveFile($request,'favicon','realpublic');
			//dd('2'.$request);
			$this->logo($request);
			$this->welcomeImage($request);
			$this->welcomeText($request);
			$this->welcomeFooter($request);
			
			return redirect(route('dashboard.basicWelcome'));
		
	}
    public function basicSEO(){

		$title=DB::table('parameters')->where(['name' => 'SeoTitle'])->first();
		if($title){
			$title=Storage::disk('views')->get('title.blade.php');
		}
		else{
			$title=Storage::disk('views')->get('title.blade.php');
		}
		if(!$title){
			$title="";
		}

		$description=DB::table('parameters')->where(['name' => 'SeoDescription'])->first();
		if($description){
			$description=Storage::disk('views')->get('description.blade.php');
		}
		else{
			$description=Storage::disk('views')->get('description.blade.php');
		}
		if(!$description){
			$description="";
		}
		
		$keywords=DB::table('parameters')->where(['name' => 'SeoKeywords'])->first();
		if($keywords){
			$keywords=Storage::disk('views')->get('keywords.blade.php');
		}
		else{
			$keywords=Storage::disk('views')->get('keywords.blade.php');
		}
		if(!$keywords){
			$keywords="";
		}

		$robots=DB::table('parameters')->where(['name' => 'SeoRobots'])->first();
		if($robots){
			$robots=Storage::disk('realpublic')->get('robots.txt');
		}
		else{
			$robots=Storage::disk('realpublic')->get('robots.txt');
		}
		if(!$robots){
			$robots="";
		}
		
		return view('dashboard.basicSEO',['title'=>$title,'description'=>$description,'keywords'=>$keywords,'robots'=>$robots]);
	}
    public function steps(){
		$steps = DB::table('steps')->get();
 
		return view('dashboard.steps',['steps' => $steps]);
	}

    public function stepEdit(Request $request){
		$steps = DB::table('steps')->get();
		$activeStep =  DB::table('steps')->where(['id' => $request->id])->first();
 
		return view('dashboard.stepEdit',['steps' => $steps, 'activeStep' => $activeStep]);
	}

    public function step(Request $request){
		//dd($request->id);
		$steps = DB::table('steps')->get();
		$components = DB::table('components')->where(['step' => $request->id, 'deleted' => 0])->get();
		$activeStep =  DB::table('steps')->where(['id' => $request->id])->first();
		return view('dashboard.step',['steps' => $steps, 'components' => $components, 'activeStep' => $activeStep]);
	}

	public function packages(Request $request){
		$packages = DB::table('packages')->where(['deleted' => 0])->get();
		return view('dashboard.packages',['packages' => $packages]);
	}
	public function deliveries(){
		$deliveries = DB::table('deliveries')->where(['deleted' => 0])->get();
		return view('dashboard.deliveries',['deliveries' => $deliveries]);
	}
    public function payments(){
		return view('dashboard.payments');
	}
	public function GetUserInfo($token){
		$user=DB::table('users')->where('token', $token)->first();
		return $user;
	}
}
