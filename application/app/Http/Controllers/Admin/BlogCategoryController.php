<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $pageTitle = 'Category List';
        $categories = BlogCategory::latest()->get();

        return view('admin.category.index', compact('pageTitle', 'categories'));
    }

    public function store(Request $request)
    {
        $categories = new BlogCategory();

        $categories->name = $request->name;
        $categories->slug = strtolower(str_replace(' ', '-', $request->name));

        // $slug = Str::slug($request->name, '-');
        // $same_slug_count = BlogCategory::where('slug', 'LIKE', $slug . '%')->count();
        // $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        // $slug .= $slug_suffix;
        // $categories->slug = $slug;

        $categories->save();

        $notification = array(
            'message'   => 'Category Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.blog.category.index')->with($notification);
    }

    public function edit($id)
    {
        $categories = BlogCategory::find($id);

        return response()->json($categories);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        BlogCategory::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);

        $notification = array(
            'message'   => 'Category Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.blog.category.index')->with($notification);
    }

    public function delete($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message'   => 'State Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
