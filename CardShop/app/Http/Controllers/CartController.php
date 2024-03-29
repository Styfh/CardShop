<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function add(Request $request){

        // Form validation
        $request->validate([
            'amount' => 'required|min:1'
        ]);

        // Get cart details
        $user_id = Auth::id();
        $listing_id = $request->route('listing_id');
        $quantity = $request->amount;

        // Get current cart
        $user_cart = Cart::where('user_id', $user_id)->get();

        // Search if item of the same id already exists in cart
        $flag = false;
        $newCartItem = new Cart();

        foreach($user_cart as $cartItem){
            if($cartItem->listing_id == $listing_id){
                $flag = true;
                $newCartItem = $cartItem;
            }
        }

        // If already exists, add to quantity
        if($flag){
            $newCartItem->quantity += $quantity;
        }
        // Else, initialize cart item
        else{
            $newCartItem->user_id = $user_id;
            $newCartItem->listing_id = $listing_id;
            $newCartItem->quantity = $quantity;
        }

        // Validate that the listing have enough stock
        $listing = $newCartItem->listing;
        if($listing->stock < $newCartItem->quantity){
            return redirect()->back()->withErrors([
                'listingStock' => "Listing doesn't have enough in stock"
            ]);
        }

        // Update cart/add new
        $newCartItem->save();

        $request->session()->flash('success', 'Product successfully added to cart');

        return redirect()->back();

    }

    public function updateQty(Request $request){

        // Form validation
        $request->validate([
            "quantity" => 'required|min:1'
        ]);

        // Fetch cart id from route
        $cart_id = $request->route('cart_id');

        // Fetch cart item from db
        $item = Cart::where('id', $cart_id)->first();

        // Validate that the listing have enough stock
        $listing = $item->listing;
        if($listing->stock < $request->quantity){
            return redirect()->back()->withErrors([
                'listingStock' => "Listing doesn't have enough in stock"
            ]);
        }

        // Update quantity in cart
        $item->quantity = $request->quantity;
        $item->save();

        $request->session()->flash('success', 'Item quantity updated successfully');

        return redirect()->back();
    }

    public function delete(Request $request){

        // Get cart id from route
        $cart_id = $request->route('cart_id');

        // delete cart item from db
        Cart::where('id', $cart_id)->delete();

        $request->session()->flash('success', 'Deleted item from cart successfully');

        return redirect()->back();


    }


}
