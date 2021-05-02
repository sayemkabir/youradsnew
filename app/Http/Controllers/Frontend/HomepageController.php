<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(){

        $categories=Category::all();

        return view('frontend.homepage',compact('categories'));
    }
}
