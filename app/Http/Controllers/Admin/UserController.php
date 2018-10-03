<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
	/**
	 * [showFormUpload description]
	 * @param  Request $request [description]
	 * @return [view]           [description]
	 */
    public function showFormUpload(){

    	return view('upload');
    }
    /**
     * [upload files]
     * @param  Request $request [description]
     * @return [view]           [description]
     */
     public function files(Request $request){
     	//$file = new File();
    	if($request->has('file')){
    		

    		$filename = time() . '.' .$request->file->getClientOriginalExtension();


    		$request->file->storeAs('pdf', $filename);

    		dd("done");
    	}
    	
    }
}
