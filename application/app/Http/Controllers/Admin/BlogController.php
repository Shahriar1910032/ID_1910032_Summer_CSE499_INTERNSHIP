<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index()
    {
        $pageTitle = 'Category List';
        $blogs = Blog::latest()->get();

        return view('admin.blog.index', compact('pageTitle', 'blogs'));
    }

    public function create()
    {
        $pageTitle = 'Category List';
        $categorise = BlogCategory::latest()->get();

        return view('admin.blog.create', compact('pageTitle', 'categorise'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $image = $request->file('image');
        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 250)->save('application/public/upload/blog/' . $name_gen);
            $save_url = 'application/public/upload/blog/' . $name_gen;
        }

        $blogs = new Blog();

        $blogs->title            = $request->title;
        $blogs->slug             = strtolower(str_replace(' ', '-', $request->title));
        $blogs->category_id      = $request->category_id;
        $blogs->user_id          = Auth::user()->id;
        $blogs->meta_description = $request->meta_description;
        $blogs->description      = $request->description;
        $blogs->tags             = $request->tags;

        if ($user->role == 'agent') {
            $blogs->status = 2;
        }

        $blogs->created_at       = Carbon::now();
        $blogs->image            = $save_url;
        $blogs->save();

        $notification = array(
            'message'   => 'Testimonial Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.blog.index')->with($notification);
    }

    public function edit($id)
    {
        $pageTitle = 'Property Details';

        $blog = Blog::find($id);
        $categorise = BlogCategory::active()->latest()->get();

        return view('admin.blog.edit', compact('pageTitle', 'blog', 'categorise'));
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

            $blogs = Blog::find($id);

            $blogs->title            = $request->title;
            $blogs->slug             = strtolower(str_replace(' ', '-', $request->title));
            $blogs->category_id      = $request->category_id;
            $blogs->meta_description = $request->meta_description;
            $blogs->description      = $request->description;
            $blogs->tags             = $request->tags;
            $blogs->updated_at       = Carbon::now();
            $blogs->image            = $save_url;
            $blogs->save();

            $notification = array(
                'message'   => 'Testimonials Update Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {

            $blogs = Blog::find($id);

            $blogs->title            = $request->title;
            $blogs->slug             = strtolower(str_replace(' ', '-', $request->title));
            $blogs->category_id      = $request->category_id;
            $blogs->meta_description = $request->meta_description;
            $blogs->description      = $request->description;
            $blogs->tags             = $request->tags;
            $blogs->updated_at       = Carbon::now();
            $blogs->save();

            $notification = array(
                'message'   => 'Blog Update Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $img = $blog->image;
        unlink($img);
        Blog::find($id)->delete();

        $notification = array(
            'message'   => 'Blog Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function changeStatus()
    {
        $status         = $_POST['status'];
        $blogId     = $_POST['dataId'];

        if ($status && $blogId) {
            $blogs = Blog::findOrFail($blogId);
            if ($status == 1) {
                $blogs->status = 2;
                $message = 'Blog Deactive';
            } else {
                $blogs->status = 1;
                $message = 'Blog Active';
            }
            if ($blogs->update()) {
                $response = array('output' => 'success', 'statusId' => $blogs->status, 'dataId' => $blogs->id, 'message' => $message, 'active' => 'Active', 'deactive' => 'Deactive');
                return response()->json($response);
            }
        }
    }
}
