<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
   function index(){
      $sliders = Slider::where('status', 1)->get();
    return view('frontend.home.index', get_defined_vars());
   //  return view('frontend.layouts.master');
   }
}
