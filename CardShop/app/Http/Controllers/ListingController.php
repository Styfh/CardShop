<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required|min:1",
            "category" => "required",
            "series" => "required",
            "image" => "required|image",
        ]);
    }
}
