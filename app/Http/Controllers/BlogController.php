<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{


    public function __construct()
    {
        //هذه الدالة تعمل كجدار للتحقق من المتخدم هل هو مسجل دخول او لا
        $this->middleware("auth")->only(['create', 'myBlogs']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //categories
        $categories = Category::get();
        return view("theme.blogs.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        //1. get the image from the requeste
        $image = $request->image;
        //2. change the image name
        $newImageName = time() . "-" . $image->getClientOriginalName();
        //3. move the image to my project folder (storage>app>public)
        $image->storeAs('blogs', $newImageName, 'public');
        //4. save new name image to database
        $data['image'] = $newImageName;
        $data['user_id'] = Auth::user()->id;
        //create new blog record
        Blog::create($data);
        return back()->with('blogCreateStatus', 'Your blog has been created successfully');
        //php artisan storage:link
        //ما يصير ابقي مكان وصول الصور بمكان خاص بالمطور فـ استخدمت هذا الايعاز حتى اربط ملف حفظ الصور بالملف العام الي يكدر يوصلة المستخدم
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $bloge)
    {
        return view("theme.single_blog", compact('bloge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $bloge)
    {
        if ($bloge->user_id == Auth::user()->id) {
            $categories = Category::get();
            return view("theme.blogs.edit", compact('categories', 'bloge'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $bloge)
    {
        if ($bloge->user_id == Auth::user()->id) {

            // dd($request->all());
            $data = $request->validated();
            if ($request->hasFile('image')) {
                //0. delete the image
                Storage::delete("public/blogs/$bloge->image");
                //1. get the image from the requeste
                $image = $request->image;
                //2. change the image name
                $newImageName = time() . "-" . $image->getClientOriginalName();
                //3. move the image to my project folder (storage>app>public)
                $image->storeAs('blogs', $newImageName, 'public');
                //4. save new name image to database
                $data['image'] = $newImageName;
            }

            //Update blog record
            $bloge->update($data);
            return back()->with('blogUpdateStatus', 'Your blog has been Updated successfully');
            //php artisan storage:link
            //ما يصير ابقي مكان وصول الصور بمكان خاص بالمطور فـ استخدمت هذا الايعاز حتى اربط ملف حفظ الصور بالملف العام الي يكدر يوصلة المستخدم
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $bloge)
    {
        if ($bloge->user_id == Auth::user()->id) {

            Storage::delete("public/blogs/$bloge->image");
            $bloge->delete();
            return back()->with('blogDeleteStatus', 'Your blog has been Deleted successfully');
        }
        abort(403);
    }
    public function myBlogs()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->cursorPaginate(10);
        return view('theme.blogs.myBlogs', compact('blogs'));
    }
}