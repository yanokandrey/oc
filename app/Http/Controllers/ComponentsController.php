<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Image;

class ComponentsController extends Controller
{
	public function showComponent(Request $request) {
	    $steps = DB::table('steps')->get();
	    $component = DB::table('components')->where(['id' => $request->id])->first();
		$activeStep = DB::table('steps')->where(['id' => $component->step])->first();
		return view('dashboard.component',['steps' => $steps, 'activeStep' => $activeStep, 'component' => $component]);
	}
	
	public function updateComponent(Request $request) {
		//dd($request);
		//dd(DB::table('components')->where(['id' => $request->id])->first()->image);
		if($request->validate([
            'name' => 'required',
       ])){
		   DB::table('components')
              ->where('id', $request->id)
              ->update(['name' => $request->name]);
	   }
	   if($request->validate([
			'description' => 'required',
       ])){
		   DB::select("update components set description='$request->description' where id='$request->id'");
 
		   
			  //$sql = "update components where id='$request->id' (description) VALUES (?)";
			  //$pdo->prepare($sql)->execute([$request->description]);
			  ////$description=mysql_real_escape_string($request->description);
			  
		  //    DB::table('components')
            //  ->where('id', $request->id)
           //   ->update(['descriprion' => ?],$request->description);
	   }
	   if($request->validate([
			'price' => 'required',
       ])){   DB::table('components')
              ->where('id', $request->id)
              ->update(['price' => $request->price]);
			  }
	   if($request->validate([
			'weight' => 'required',
       ])){
		      DB::table('components')
              ->where('id', $request->id)
              ->update(['weight' => $request->weight]);
	   }
	   	if($request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:204800',
       ])){
		   $oldImage=DB::table('components')->where(['id' => $request->id])->first()->image;
		    if($oldImage){
				Storage::drive('public')->delete($oldImage);
				Storage::drive('public')->delete("thumbnails/".$oldImage);
		    }
			$image=$this->Image($request);
			DB::table('components')
              ->where('id', $request->id)
              ->update(['image' => $image]);
	   }
	   return back();
	}
    public function addComponent(Request $request) {
		
		if($request->validate([
            'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'weight' => 'required',
			'step' => 'required'
       ])){
	//dd($request);
	
	$image=$this->Image($request);
	 
    DB::select("INSERT INTO components (name, step, image, description, price, weight, deleted) values ('$request->name','$request->step','$image','$request->description','$request->price','$request->weight','0')");
	
/*	DB::table('components')->insert([
    'name' => $request->name,
	'step' => $request->step,
    'image' => $image,
	'description' => '?',
	'price' => $request->price,
	'weight' => $request->weight
	   ],$request->description); }*/
	}
	return back()->withInput();
	}
	public function deleteComponent(Request $request) {
		$steps = DB::table('steps')->get();
	    $component =  DB::table('components')->where(['id' => $request->id])->first();
		$activeStep =  DB::table('steps')->where(['id' => $component->step])->first();
		     DB::table('components')
              ->where('id', $request->id)
              ->update(['deleted' => 1]);
	
		return view('dashboard.step',['steps' => $steps, 'activeStep' => $activeStep, 'component' => $component]);
	}
	public function Image(Request $request){
		if($request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:204800',
       ])){
			$fileImage = $request->file('image');

			$destinationPath = '../storage/app/public';
			
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
		return $fileImageName;
		}
		
	}
		
}
