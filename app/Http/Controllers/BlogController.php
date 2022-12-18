<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Blog::all();
        // dd($all);
        return view('admin.blog.list')->with(['all' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'des' => 'required',
        ],[
        'title.required' => 'Title is required',
        'des.required' => 'Description is required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $blog = Blog::create(
            [
                'title' => $request->title,
                'des' => $request->des,
            ]);

        if($blog){
            return redirect()->route('blog.index')->with('message', 'New blog Added Successfully!');
        }
        return redirect()->route('blog.index')->with('message', 'Some thing went wrong!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $pad
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show')->with(['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $pad
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit')->with(['blog' => $blog]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $pad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'des' => 'required',
        ],[
        'title.required' => 'Title is required',
        'des.required' => 'Description is required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $blog->title = $request->title;
        $blog->des = $request->des;

        if($blog->save()){
            return redirect()->route('blog.index')->with('message', 'Blog Post Updated Successfully!');
        }
        return redirect()->back()->with('message', 'Some thing went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('message', 'Blog deleted successfully!');;
    }
}