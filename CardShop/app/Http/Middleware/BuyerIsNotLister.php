<?php

namespace App\Http\Middleware;

use App\Models\Listing;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerIsNotLister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $listing_id = $request->route('listing_id');
        $lister_id = Listing::where('id', $listing_id)->lister_id;

        if(Auth::id() == $lister_id)
            return redirect()->back();

        return $next($request);
    }
}
