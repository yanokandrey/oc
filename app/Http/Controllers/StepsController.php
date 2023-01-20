<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class StepsController extends Controller
{
    public function addStep(Request $request) {
		
	    if($request->validate([
            'name' => 'required'
        ])){
			DB::insert('insert into steps (name) values (?)', [$request->name]);
		/*			
			DB::table('steps')
			->updateOrInsert(
				['name' => 'seoTitle', 'partition' => 'seo'],
				['value' => '1']
			);
		*/
			return redirect(route('dashboard.steps'));	 
		}
	}
	public function stepEdit(Request $request) {
		//dd($request);
	    if($request->validate([
            'name' => 'required',
			'id' => 'required'
        ])){
					
		DB::table('steps')
              ->where('id', $request->id)
              ->update(['name' => $request->name]);
		
			return back()->withInput();
		}
	}
}
