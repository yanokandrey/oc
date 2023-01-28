<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Image;

class DeliveryController extends Controller
{
	Const $table="deliveries";
	
    public function add(Request $request) {
		
	    if($request->validate([
            'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'weight' => 'required'
        ])){
			
			$image=$this->Image($request);		
			DB::insert("insert into $table (name,image,description,price,weight,checked,deleted) values ('$request->name','$image','$request->description','$request->price','$request->weight',0,0)");
			return redirect(route('dashboard.delivery'));	 
		}
	}
    public function delivery(Request $request) {
	       // $steps = DB::table('steps')->get();
	        $delivery = DB::table($table)->where(['id' => $request->id])->first();
		   // $activeStep = DB::table('steps')->where(['id' => $component->step])->first();
	    	return view('dashboard.delivery',['delivery' => $devovery]);
	    }
    public function Image(Request $request){
		if($request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:204800'
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
	public function update(Request $request) {
		if($request->validate([
            'name' => 'required',
       ])){
		   DB::table($table)
              ->where('id', $request->id)
              ->update(['name' => $request->name]);
	   }
	   if($request->validate([
			'description' => 'required',
       ])){
		   DB::select("update $table set description='$request->description' where id='$request->id'");
 
		   
			  //$sql = "update packoges where id='$request->id' (description) VALUES (?)";
			  //$pdo->prepare($sql)->execute([$request->description]);
			  ////$description=mysql_real_escape_string($request->description);
			  
		  //    DB::table('packoges')
            //  ->where('id', $request->id)
           //   ->update(['descriprion' => ?],$request->description);
	   }
	   if($request->validate([
			'price' => 'required',
       ])){   DB::table($table)
              ->where('id', $request->id)
              ->update(['price' => $request->price]);
			  }
	   if($request->validate([
			'weight' => 'required',
       ])){
		      DB::table($table)
              ->where('id', $request->id)
              ->update(['weight' => $request->weight]);
	   }
	   	if($request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:204800',
       ])){
		   $oldImage=DB::table($table)->where(['id' => $request->id])->first()->image;
		    if($oldImage){
				Storage::drive('public')->delete($oldImage);
				Storage::drive('public')->delete("thumbnails/".$oldImage);
		    }
			$image=$this->Image($request);
			DB::table($table)
              ->where('id', $request->id)
              ->update(['image' => $image]);
	   }
	   return back();
	}
	public function delete(Request $request) {
//dd($request);	
	//$steps = DB::table('steps')->get();
	    $delivery =  DB::table($table)->where(['id' => $request->id])->first();
		//$activeStep =  DB::table('steps')->where(['id' => $package->step])->first();
		     DB::table($table)
              ->where('id', $request->id)
              ->update(['deleted' => 1]);
		
	//	$deliveries = DB::table($table)->where(['deleted' => 0])->get();
		return redirect(route('dashboard.deliveries'))
		//return view('dashboard.deliveries',['deviveries' => $deliveries]);
	}
}
