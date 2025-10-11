<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    public function addToCompare(Request $request, $property_id)
    {
        if (Auth::check()) {
            $exists = Compare::where('user_id', Auth::id())->where('property_id', $property_id)->first();

            if (!$exists) {
                Compare::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added On Your Compare']);
            } else {
                return response()->json(['error' => 'This Property Has Already in your Compare']);
            }
        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function compare()
    {
        $pageTitle = 'Compare Properties';
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('templates.user.compare', compact('pageTitle', 'userData'));
    }

    public function getCompare()
    {
        $compare = Compare::with('property')->where('user_id', Auth::id())->latest()->get();
      
        return response()->json(['compare' => $compare]);
    }

    public function compareRemove($id)
    {
        Compare::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => 'Successfully Property Remove']);
    }
}
