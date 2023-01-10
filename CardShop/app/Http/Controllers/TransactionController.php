<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //

    public function cartAdd(Request $request){

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

        // Update cart/add new
        $cartItem->save();

        $request->session()->flash('success', 'Product successfully added to cart');

        return redirect()->back();

    }
}
