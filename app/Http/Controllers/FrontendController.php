<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function service(){
        $features = Feature::all();
        return view('service', compact('features'));
    }
}
