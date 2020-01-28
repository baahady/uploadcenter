<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;

class UploadController extends Controller
{
    public function index(){

    	return view('welcome');
    }

    public function process(Upload $upload , Request $request){

    	$validation = $request->validate([
    		'photo' => 'required|file|image|mimes:jpeg,png,gif|max:2048'
    	]);

    	$file = $validation['photo'];
    	$extension = $file->getClientOriginalExtension();
    	$filename = 'picture-'.time().rand().'.'.$extension;
    	$path = $file->storeAs('photos',$filename);

    	$upload->file_name = $path;
    	$upload->user()->associate()->save();

    	/*$path = $request->file('photo')->store('photos');
    	dd($path);*/

    	//multiple file upload
    	/*$photos = $request->file('photo');
    	$path=[];

    	foreach ($photos as $photo) {
    		$extension = $photo->getClientOriginalExtension();
    		$filename = 'picture'.time().rand().'.'.$extension;
    		$path[] = $photo->storeAs('photos',$filename);
    	}
    	dd($path);*/
    }
}
