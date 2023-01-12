<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PurchaseDetail;
use App\Models\PurchaseHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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

    public function purchase(Request $request){

        // Get authed user id
        $user_id = Auth::id();

        // Get all items in user's cart
        $cart = Cart::where('user_id', $user_id)->get();

        // Validate if cart has content
        if($cart->isEmpty()){
            return redirect()->back()
                ->withErrors('emptyCart', 'cart is empty, cannot purchase');
        }

        // Push new header
        $newHeader = new PurchaseHeader();
        $newHeader->buyer_id = $user_id;
        $newHeader->save();

        // Purchase all items in the cart as detail
        foreach($cart as $item){

            $listing = $item->listing;

            // Push cart item as detail
            $newDetail = new PurchaseDetail();
            $newDetail->listing_id = $listing->id;
            $newDetail->quantity = $item->quantity;
            $newDetail->save();

            // Update listing stock
            $listing->stock -= $item->quantity;
            $listing->save();
        }

        $request->session()->flash('success', 'Item(s) purchased successfully');

        return redirect('/');

    }

}
