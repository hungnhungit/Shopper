<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminController extends Controller
{
    public function index(){
    	//dd(Auth::guard()->user()->email);
    	return view('admin.index');
    }
}
