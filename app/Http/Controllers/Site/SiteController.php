<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SiteController extends Controller
{
    public function app(){
    	return view('layout.app');
    }
    public function generator(){
    	return view('generator.index');
    }
    public function simplifier(){
    	return view('simplifier.index');
    }
}
