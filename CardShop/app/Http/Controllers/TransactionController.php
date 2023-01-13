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

    public function purchase(Request $request){

        // Get authed user id
        $user_id = Auth::id();

        // Get all items in user's cart
        $cart = Cart::where('user_id', $user_id);
        $cartCollection = $cart->get();

        // Validate if cart has content
        if($cartCollection->isEmpty()){
            return redirect()->back()
                ->withErrors('emptyCart', 'cart is empty, cannot purchase');
        }

        // Push new header
        $newHeader = new PurchaseHeader();
        $newHeader->buyer_id = $user_id;
        $newHeader->save();

        // Purchase all items in the cart as detail
        foreach($cartCollection as $item){

            $listing = $item->listing;

            // Push cart item as detail
            $newDetail = new PurchaseDetail();
            $newDetail->listing_id = $listing->id;
            $newDetail->header_id = $newHeader->id;
            $newDetail->quantity = $item->quantity;
            $newDetail->save();

            // Update listing stock
            $listing->stock -= $item->quantity;
            $listing->save();
        }

        // Clear cart
        $cart->delete();

        $request->session()->flash('success', 'Item(s) purchased successfully');

        return redirect('/');

    }

}
