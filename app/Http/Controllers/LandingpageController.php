<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingpageController extends Controller
{
    public function welcome()
    {
   		return view('welcome'); 	
    }
}
