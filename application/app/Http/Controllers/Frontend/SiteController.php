<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyMessage;
use App\Models\PropertyType;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function templates()
    {
        $pageTitle = 'Template';

        return view('templates.home', compact('pageTitle'));
    }

    public function propertyCategories()
    {
        $pageTitle = 'Property Categories';
        $propertyTypes = PropertyType::latest()->get();
        $property = Property::where('status', '1')->where('featured', '1')->latest()->limit(3)->get();

        return view('templates.details.property_categories', compact('pageTitle', 'propertyTypes', 'property'));
    }

    public function property_details($slug)
    {
        $property = Property::where('slug', $slug)->first();

        $pageTitle = $property->name;

        $property_id  = $property->id;
        $images = MultiImage::where('property_id', $property_id)->get();
        // dd($images);
        $amenities_id = explode(',', $property->amenities_id);
        $amenities = Amenities::whereIn('id', $amenities_id)->pluck('name');

        $facilities = Facility::where('property_id', $property_id)->get();

        $relatedProperty = Property::where('ptype_id', $property->ptype_id)->where('id', '!=', $property_id)->orderBy('id', 'DESC')->limit(3)->get();


        return view('templates.details.property', compact('property', 'pageTitle', 'images', 'amenities', 'facilities', 'relatedProperty'));
    }

    public function propertyList()
    {
        $pageTitle = 'Property List';
        $property = Property::latest()->paginate(2);

        $buyProperty = Property::where('property_status', 'for buy')->get();
        $rentProperty = Property::where('property_status', 'for rent')->get();

        return view('templates.details.property_list', compact('pageTitle', 'property', 'buyProperty', 'rentProperty'));
    }

    public function message(Request $request)
    {
        $property_id = $request->property_id;
        $agent_id    = $request->agent_id;

        if (Auth::check()) {

            PropertyMessage::insert([
                'user_id'     => Auth::user()->id,
                'agent_id'    => $agent_id,
                'property_id' => $property_id,
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'message'     => $request->message,
                'created_at'  => Carbon::now(),
            ]);
        } else {
            $notification = array(
                'message'   => 'Please Login Your Account',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message'   => 'Send Message Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function agentDetails($slug)
    {
        $pageTitle = "Agent Details";

        $agent = User::find($slug);
        $property = Property::where('agent_id', $agent->id)->limit(5)->get();
        $featured = Property::where('featured', 1)->limit(3)->get();
        $rentProperty = Property::where('property_status', 'for rent')->get();
        $buyProperty = Property::where('property_status', 'for buy')->get();

        return view('templates.details.agent_details', compact('pageTitle', 'agent', 'property', 'featured', 'rentProperty', 'buyProperty'));
    }

    public function agentMessage(Request $request)
    {
        $agent_id    = $request->agent_id;

        if (Auth::check()) {

            PropertyMessage::insert([
                'user_id'     => Auth::user()->id,
                'agent_id'    => $agent_id,
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'message'     => $request->message,
                'created_at'  => Carbon::now(),
            ]);
        } else {
            $notification = array(
                'message'   => 'Please Login Your Account',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message'   => 'Send Message Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function rentProperty()
    {
        $pageTitle = 'Rent Property Page';

        $rentProperty = Property::where('status', '1')->where('property_status', 'for rent')->paginate(2);
        $buyProperty = Property::where('property_status', 'for buy')->get();

        return view('templates.details.rent_property', compact('pageTitle', 'rentProperty', 'buyProperty'));
    }

    public function buyProperty()
    {
        $pageTitle = 'Buy Property Page';

        $buyProperty = Property::where('status', '1')->where('property_status', 'for buy')->paginate(2);
        $rentProperty = Property::where('property_status', 'for rent')->get();

        return view('templates.details.buy_property', compact('pageTitle', 'rentProperty', 'buyProperty'));
    }

    public function propertyType($id)
    {
        $property = Property::where('status', '1')->where('ptype_id', $id)->get();

        $category = PropertyType::find($id);
        $pageTitle = $category->type_name ?? '';

        $buyProperty = Property::where('property_status', 'for buy')->get();
        $rentProperty = Property::where('property_status', 'for rent')->get();

        return view('templates.details.property_type', compact('pageTitle', 'property', 'buyProperty', 'rentProperty'));
    }

    public function palaceDetails($id)
    {
        $pageTitle = 'Property Palace';
        $property = Property::where('status', '1')->where('state', $id)->get();
        $state = State::where('id', $id)->first();

        $buyProperty = Property::where('property_status', 'for buy')->get();
        $rentProperty = Property::where('property_status', 'for rent')->get();

        return view('templates.details.palace', compact('pageTitle', 'property', 'buyProperty', 'rentProperty', 'state'));
    }

    public function buySearch(Request $request)
    {
        $pageTitle = 'Buy Property Search';

        $request->validate(['search' => 'required']);
        $item  = $request->search;
        $state = $request->state;
        $property_type = $request->property;

        $property = Property::where('name', 'like', '%' . $item . '%')->where('property_status', 'for buy')->with('type', 'stateName')
            ->whereHas('stateName', function ($q) use ($state) {
                $q->where('name', 'like', '%' . $state . '%');
            })
            ->whereHas('type', function ($q) use ($property_type) {
                $q->where('type_name', 'like', '%' . $property_type . '%');
            })->get();

        $buyProperty = Property::where('property_status', 'for buy')->get();
        $rentProperty = Property::where('property_status', 'for rent')->get();

        return view('templates.search.buy_search', compact('pageTitle', 'property', 'buyProperty', 'rentProperty'));
    }

    public function rentSearch(Request $request)
    {
        $pageTitle = 'Rent Property Search';

        $request->validate(['search' => 'required']);
        $item  = $request->search;
        $state = $request->state;
        $property_type = $request->property;

        $property = Property::where('name', 'like', '%' . $item . '%')->where('property_status', 'for rent')->with('type', 'stateName')
            ->whereHas('stateName', function ($q) use ($state) {
                $q->where('name', 'like', '%' . $state . '%');
            })
            ->whereHas('type', function ($q) use ($property_type) {
                $q->where('type_name', 'like', '%' . $property_type . '%');
            })->get();

        $buyProperty = Property::where('property_status', 'for buy')->get();
        $rentProperty = Property::where('property_status', 'for rent')->get();

        return view('templates.search.rent_search', compact('pageTitle', 'property', 'buyProperty', 'rentProperty'));
    }

    public function propertySearch(Request $request)
    {
        $pageTitle = 'Rent Property Search';

        $property_status  = $request->property_status;
        $state = $request->state;
        $property_type = $request->property_type;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;

        $property = Property::where('status', '1')->where('bedrooms', $bedrooms)
            ->where('bathrooms', 'like', '%' . $bathrooms . '%')
            ->where('property_status', $property_status)
            ->with('type', 'stateName')
            ->whereHas('stateName', function ($q) use ($state) {
                $q->where('name', 'like', '%' . $state . '%');
            })
            ->whereHas('type', function ($q) use ($property_type) {
                $q->where('type_name', 'like', '%' . $property_type . '%');
            })->get();

        $buyProperty = Property::where('property_status', 'for buy')->get();
        $rentProperty = Property::where('property_status', 'for rent')->get();

        return view('templates.search.search_property', compact('pageTitle', 'property', 'buyProperty', 'rentProperty'));
    }

    public function blog_details($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $pageTitle = $blog->title;
        $tag = $blog->tags;
        $tags = explode(',', $tag);

        $category = BlogCategory::active()->limit(5)->latest()->get();
        $recentBlog = Blog::active()->limit(3)->latest()->get();

        return view('templates.details.blog', compact('blog', 'pageTitle', 'tags', 'category', 'recentBlog'));
    }

    public function blogType($slug)
    {
        $blogs = Blog::active()->where('category_id', $slug)->get();

        $category = BlogCategory::find($slug);
        $pageTitle = $category->name ?? '';

        $categoryList = BlogCategory::active()->limit(5)->latest()->get();

        return view('templates.details.blog_type', compact('pageTitle', 'blogs', 'categoryList'));
    }

    public function blogs()
    {
        $pageTitle = 'Blog List';
        $blogs = Blog::active()->latest()->get();
        return view('templates.details.blog_list', compact('pageTitle', 'blogs'));
    }

    public function blogComment(Request $request)
    {
        // dd($request->all());
        $blogId = $request->id;

        Comment::insert([
            'user_id'   => Auth::user()->id,
            'blog_id'   => $blogId,
            'parent_id' => null,
            'subject'   => $request->subject,
            'message'   => $request->message,
            'created_at'=> Carbon::now()
        ]);

        $notification = array(
            'message'   => 'Comment Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function contact()
    {
        $pageTitle = 'Contact Page';
        return view('templates.details.contact', compact('pageTitle'));
    }

    public function contactMessage(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        Contact::insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'subject'    => $request->subject,
            'message'    => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message'   => 'Contact Message Send Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
