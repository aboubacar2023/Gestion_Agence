<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $properties = Property::orderBy('created_at', 'desc')->where('sold', false)->limit(4)->get();
        return view('home', ['properties'=> $properties]);
    }
}
