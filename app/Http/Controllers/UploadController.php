<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){

    	return view('welcome');
    }

    public function process(Request $request){

    	// $path = $request->file('photo')->store('photos');
    	// dd($path);
    	$photos = $request->file('photo');
    	$path=[];

    	foreach ($photos as $photo) {
    		$extension = $photo->getClientOriginalExtension();
    		$filename = 'picture'.time().rand(1,10).'.'.$extension;
    		$path[] = $photo->storeAs('photos',$filename);
    	}
    	dd($path);
    }
}
