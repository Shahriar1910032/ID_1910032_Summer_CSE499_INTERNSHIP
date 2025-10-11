<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class StateController extends Controller
{
    public function index()
    {
        $pageTitle = 'Amenities';

        $state = State::latest()->get();

        return view('admin.state.index', compact('pageTitle', 'state'));
    }

    public function createState()
    {
        $pageTitle = 'Create State';

        return view('admin.state.create', compact('pageTitle'));
    }

    public function storeState(Request $request)
    {
        $image = $request->file('image');
        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 250)->save('application/public/upload/property/thumbnail/' . $name_gen);
            $save_url = 'application/public/upload/property/thumbnail/' . $name_gen;
        }

        $state = new State();

        $state->name  = $request->name;
        $state->image = $save_url;
        $state->save();

        $notification = array(
            'message'   => 'State Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function editState($id)
    {
        $pageTitle = 'State Edit';

        $states = State::find($id);

        return view('admin.state.edit', compact('pageTitle', 'states'));
    }

    public function updateState(Request $request, $id)
    {
        if ($request->file('image')) {

            $image = $request->file('image');
            if ($image) {
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(370, 250)->save('application/public/upload/property/thumbnail/' . $name_gen);
                $save_url = 'application/public/upload/property/thumbnail/' . $name_gen;
            }

            $state = State::find($id);

            $state->name  = $request->name;
            $state->image = $save_url;
            $state->save();

            $notification = array(
                'message'   => 'State Update Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {

            $state = State::find($id);

            $state->name  = $request->name;

            $state->save();

            $notification = array(
                'message'   => 'State Update Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function deleteState($id)
    {
        $state = State::find($id);
        $img = $state->image;
        unlink($img);
        State::find($id)->delete();

        $notification = array(
            'message'   => 'State Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
