<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;

class UploadController extends Controller
{
    public function index(Upload $upload){
        $upload = Upload::find(1);
        $a = $upload->user()->name;

    	return view('welcome')->with('data',$a);
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
    	$upload->save();

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
