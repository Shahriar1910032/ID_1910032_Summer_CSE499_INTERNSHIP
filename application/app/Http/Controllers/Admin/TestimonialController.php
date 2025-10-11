<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $pageTitle = 'Testimonials';

        $testimonials = Testimonial::latest()->get();

        return view('admin.testimonials.index', compact('pageTitle', 'testimonials'));
    }

    public function create()
    {
        $pageTitle = 'Create State';

        return view('admin.testimonials.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 250)->save('application/public/upload/property/thumbnail/' . $name_gen);
            $save_url = 'application/public/upload/property/thumbnail/' . $name_gen;
        }

        $testimonials = new Testimonial();

        $testimonials->name         = $request->name;
        $testimonials->desination   = $request->desination;
        $testimonials->short_desc   = $request->short_desc;
        $testimonials->image        = $save_url;
        $testimonials->save();

        $notification = array(
            'message'   => 'Testimonial Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function details($id)
    {
        $pageTitle = 'Testimonial Edit';

        $testimonials = Testimonial::find($id);

        return view('admin.testimonials.edit', compact('pageTitle', 'testimonials'));
    }

    public function update(Request $request, $id)
    {
        if ($request->file('image')) {

            $image = $request->file('image');
            if ($image) {
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(370, 250)->save('application/public/upload/property/thumbnail/' . $name_gen);
                $save_url = 'application/public/upload/property/thumbnail/' . $name_gen;
            }

            $testimonials = Testimonial::find($id);

            $testimonials->name        = $request->name;
            $testimonials->desination  = $request->desination; 
            $testimonials->short_desc  = $request->short_desc; 
            $testimonials->image       = $save_url;
            $testimonials->save();

            $notification = array(
                'message'   => 'Testimonials Update Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {

            $testimonials = Testimonial::find($id);

            $testimonials->name  = $request->name;
            $testimonials->desination  = $request->desination;
            $testimonials->short_desc  = $request->short_desc;

            $testimonials->save();

            $notification = array(
                'message'   => 'Testimonials Update Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        $img = $testimonial->image;
        unlink($img);
        Testimonial::find($id)->delete();

        $notification = array(
            'message'   => 'State Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}