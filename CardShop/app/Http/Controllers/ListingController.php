<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function create(Request $request){
        // Form validation
        $validated = $request->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required|min:1",
            "description" => "required",
            "category" => "required",
            "series" => "required",
            "image" => "required|image",
        ]);

        // Fetch lister id from authed user
        $lister_id = Auth::id();

        // Generated formatted name
        $ext = $request->file('image')->extension();
        $newFileName = $validated["name"].'.'.$ext;

        // Add new listing to database
        Listing::create([
            "lister_id" => $lister_id,
            "name" => $validated["name"],
            "individual_price" => $validated["price"],
            "stock" => $validated["stock"],
            "description" => $validated["description"],
            "category_id" => $validated["category"],
            "series_id" => $validated["series"],
            "image" => "storage/listing_pics/$lister_id/$newFileName"
        ]);

        // Move uploaded file to appropriate directory
        Storage::putFileAs("public/listing_pics/$lister_id/",
            $request->image, $newFileName);

        return redirect('/');

    }
}
