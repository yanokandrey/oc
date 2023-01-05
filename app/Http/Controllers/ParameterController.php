<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Image;

class ParameterController extends Controller
{
    public function saveSettingsWelcome(Request $request){
		
			$this->favicon($request);
			$this->logo($request);
			$this->welcomeImage($request);
			$this->welcomeText($request);
			$this->welcomeFooter($request);
			
			return redirect(route('dashboard.basicWelcome'));	 
	}

	public function favicon(Request $request){
			if($request->validate([
			'favicon' => 'file|mimes: gif,png,icon,ico|max:8100|dimensions:min_width=16,min_height=16,max_width=16,max_height=16,ratio=1/1'
        ])){
			$fileFavicon = $request->file('favicon');

			$destinationPath = '../public';
			
			$favicon=DB::table('dashboards')->where(['name' => 'Favicon'])->first();
			if(!$favicon){
				$favicon = new dashboard;
				$favicon->value="";
			}
			if($favicon->value and $favicon->value!=$fileFavicon->getClientOriginalName()){
				$oldFaviconPath=$favicon->value;
				Storage::drive('realpublic')->delete($oldFaviconPath);
			}
			
			$fileFavicon->move($destinationPath,$fileFavicon->getClientOriginalName());
	
			$fileFaviconName=$fileFavicon->getClientOriginalName();
			$FaviconBladePhpContent='<link rel="icon" type="image/x-icon" href="'.$fileFaviconName.'">';
			$DashboardFaviconBladePhpContent='<link rel="icon" type="image/x-icon" href="../'.$fileFaviconName.'">';
	
			Storage::disk('views')->put('favicon.blade.php',$FaviconBladePhpContent);
			Storage::disk('views')->put('dashboard/favicon.blade.php',$DashboardFaviconBladePhpContent);
			Storage::disk('views')->put('order/favicon.blade.php',$DashboardFaviconBladePhpContent);

			DB::table('dashboards')
			->updateOrInsert(
				['name' => 'Favicon', 'partition' => 'welcome'],
				['value' => $fileFaviconName]
			);
		}
	}
	public function logo(Request $request){
		if($request->validate([
			'logo' => 'file|mimes: jpg,gif,png|max:8100|dimensions:min_width=32,min_height=32,max_width=256,max_height=64'
        ])){
			$logo=DB::table('dashboards')->where(['name' => 'Logo'])->first();
			
			$fileLogo = $request->file('logo');
			$destinationPath = '../storage/app/public';
			
			if(!$logo){
				$logo = new dashboard;
				$logo->value="";
			}
			if($logo->value and $logo->value!=$fileLogo->getClientOriginalName()){
				$oldLogoPath=$logo->value;
				Storage::drive('public')->delete($oldLogoPath);
			}
			$fileLogo->move($destinationPath,$fileLogo->getClientOriginalName());
	
			$fileLogoName=$fileLogo->getClientOriginalName();
			$LogoBladePhpContent='<img class="logo" src="/storage/'.$fileLogoName.'">';
			$DashboardLogoBladePhpContent='<img class="logo" src="../storage/'.$fileLogoName.'">';
	
			Storage::disk('views')->put('logo.blade.php',$LogoBladePhpContent);
			Storage::disk('views')->put('dashboard/logo.blade.php',$DashboardLogoBladePhpContent);
			Storage::disk('views')->put('order/logo.blade.php',$DashboardLogoBladePhpContent);

			DB::table('dashboards')
			->updateOrInsert(
				['name' => 'Logo', 'status' => '1', 'partition' => 'welcome'],
				['value' => $fileLogoName]
			);
		}
	}
	public function welcomeImage(Request $request){
		if($request->validate([
            'welcomeImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:204800',
       ])){
			$image=DB::table('dashboards')->where(['name' => 'WelcomeImage'])->first();
			
			$fileImage = $request->file('welcomeImage');

			$destinationPath = '../storage/app/public';
			
			if(!$image){
				$image = new dashboard;
				$image->value="";
			}
			if($image->value and $image->value!=$fileImage->getClientOriginalName()){
				$oldImagePath=$image->value;
				Storage::drive('public')->delete($oldImagePath);
				Storage::drive('public')->delete("thumbnails/".$oldImagePath);
			}
			$fileImageName=time().".".$fileImage->getClientOriginalExtension();
			$thumbnailPath = 'thumbnails/';
			
			if(Image::make($fileImage)->width()>='1320'){
				
				$img=Image::make($fileImage)->resize('1320', null,
					function ($constraint) {
					$constraint->aspectRatio();
					})->save('storage/'.$fileImageName);
			}
			
			if(!Storage::disk('public')->exists('/thumbnails')) {
				Storage::disk('public')->makeDirectory('/thumbnails', 0775, true); //creates directory
			}
			$img=Image::make($fileImage)->resize('80', null,
				function ($constraint) {
				$constraint->aspectRatio();
				})->save('storage/thumbnails/'.$fileImageName);
				
			$fileImage->move($destinationPath,$fileImageName);
			
			$newPath='./resources/view/image.blade.php';
			$ImageBladePhpContent='<img class="image" src="/storage/'.$fileImageName.'">';
			$DashboardImageBladePhpContent='<img class="image" src="../storage/'.$fileImageName.'">';
	
			Storage::disk('views')->put('image.blade.php',$ImageBladePhpContent);
			Storage::disk('views')->put('dashboard/logo. blade.php',$DashboardImageBladePhpContent);
			Storage::disk('views')->put('order/image.blade.php',$DashboardImageBladePhpContent);

			DB::table('dashboards')
			->updateOrInsert(
				['name' => 'WelcomeImage', 'partition' => 'welcome'],
				['value' => $fileImageName]
			);
		}
	}
    public function welcomeText(Request $request) {
	   	if($request->validate([
            'welcomeText' => 'required'
        ])){
			$welcomeText=nl2br($request->welcomeText);
			if(!$welcomeText){
				$welcomeText = new dashboard;
				$welcomeText->value="";
			}
			Storage::disk('views')->put('welcomeText.blade.php',$welcomeText);
			
			DB::table('dashboards')
			->updateOrInsert(
				['name' => 'WelcomeText', 'partition' => 'welcome'],
				['value' => $welcomeText]
			);
        } 
   }
    public function welcomeFooter(Request $request) {
	   	if($request->validate([
            'welcomeFooter' => 'required'
        ])){
			$welcomeFooter=$request->welcomeFooter;
			if(!$welcomeFooter){
				$welcomeFooter = new dashboard;
				$welcomeFooter->value="";
			}
			Storage::disk('views')->put('welcomeFooter.blade.php',$welcomeFooter);
			
			DB::table('dashboards')
			->updateOrInsert(
				['name' => 'WelcomeFooter', 'partition' => 'welcome'],
				['value' => $welcomeFooter]
			);
		} 
   }

    public function saveFile(Request $file,$name,$disk){
		if($file->validate([
            $name => 'required|file|mimes: icon,ico,gif,png|max:2048|dimensions:min_width=16,min_height=16,max_width=512,max_height=512,ratio=1/1'
        ])){
		
			$file = $file->file($name);
			
			Switch($name) {
				case"favicon":
					$FileBladePhpContent='<link rel="icon" type="image/x-icon" href="'.$file->getClientOriginalName().'">';
					$DashboardFileBladePhpContent='<link rel="icon" type="image/x-icon" href="../'.$file->getClientOriginalName().'">';
					$destinationPath = '../public';
				break;
				case"logo":
					$destinationPath = '../storage/app/public';
					$FileBladePhpContent='<img class="logo" src="/storage/'.$file->getClientOriginalName().'">';
					$DashboardFileBladePhpContent='<img class="logo" src="../storage/'.$file->getClientOriginalName().'">';
				break;
				case"welcomeImage":
					$destinationPath = '../storage/app/public';
					$FileBladePhpContent='<img class="logo" src="/storage/'.$file->getClientOriginalName().'">';
					$DashboardFileBladePhpContent='<img class="logo" src="../storage/'.$file->getClientOriginalName().'">';
				break;
			}
			
			$fileDb=DB::table('dashboards')->where(['name' => $name])->first();
			
			if(!$fileDb){
				$fileDb = new dashboard;
				$fileDb->value="";
			}
			elseif($fileDb->value and $fileDb->value!=$file->getClientOriginalName()){
				$oldFilePath=$fileDb->value;
				Storage::drive($disk)->delete($oldFilePath);
			}
			
			$file->move($destinationPath,$file->getClientOriginalName());
	
			$newPath='./resources/view/'.$name.'.blade.php';
			$fileName=$file->getClientOriginalName();
			
			Storage::disk('views')->put($name.'.blade.php',$FileBladePhpContent);
			Storage::disk('views')->put('dashboard/'.$name.'.blade.php',$DashboardFileBladePhpContent);
			Storage::disk('views')->put('order/'.$name.'.blade.php',$DashboardFileBladePhpContent);

			DB::table('dashboards')
			->updateOrInsert(
				['name' => $name, 'status' => '1', 'partition' => 'welcome'],
				['value' => $fileName]
			);
		}
	}	
	public function Varificate($file,$name) {
		
		switch($name){
				case"icon":
					$file->validate([
					'favicon' => 'required|file|mimes: icon,ico,gif,png|max:2048|dimensions:min_width=16,min_height=16,max_width=512,max_height=512,ratio=1/1'
					]);
				break;
				case"logo":
					$file->validate([
					'logo' 
					=> 'required|file|mimes: jpg, jpeg, gif, png|max:2048|dimensions:min_width=32,min_height=32,max_width=256,max_height=768'
					]);
					return $request;
				break;
				case"welcomeImage":
					$file->validate([
						'welcomeImage' => 'required|file|mimes: icon,ico,gif,png|max:2048|dimensions:min_width=1320,min_height=32'
					]);
				break;
		}
	}
}
