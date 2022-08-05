<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;

class SliderController extends Controller
{
    public function ImageView(){
        $photos=Images::all();
        return response('slider', compact('photos'));
    }
    public function slider(){
        $photos=Images::all();
        //echo "<pre>"; print_r($photos);die;
        return view('slider', compact('photos'));
    }
}
