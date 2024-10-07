<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class LandingPage extends Controller
{
    public function landing_view(Request $request)
    {

        $categories = Category::take(8)->get();



        return view("welcome", ["categories" => $categories]);
    }
}