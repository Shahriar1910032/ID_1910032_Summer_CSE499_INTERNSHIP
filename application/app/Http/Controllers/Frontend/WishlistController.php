<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $property_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('property_id', $property_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            }else{
                return response()->json(['error' => 'This Property Has Already in your Wishlist']);
            }
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function wishList()
    {
        $pageTitle = 'Wish List';
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('templates.user.wishlist', compact('pageTitle', 'userData'));
    }

    public function wishlistProperty()
    {
        $wishList = Wishlist::with('property')->where('user_id', Auth::id())->latest()->get();

        $wishQty = Wishlist::count();

        return response()->json(['wishlist' => $wishList, 'wishQty' => $wishQty]);
    }

    public function wishListRemove($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => 'Successfully Property Remove']);
    }
   
}
