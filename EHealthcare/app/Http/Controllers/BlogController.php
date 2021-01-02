<?php

namespace App\Http\Controllers;

use App\blog;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $blog=New blog;
        $blog->title=$req->title;
        $blog->details=$req->details;
        $blog->user_id=Auth::user()->id;
        $image=$req->file('image');
        $img=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('images/'.$img);
        Image::make($image)->save($location);
        $blog->photo=$img;

        $blog->save();
        session()->flash('success',' New post Added');
        return redirect()->route('admin.blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = blog::find($id);
        $blog->delete();
        session()->flash('success','  Blog Deleted Successfully');
        return redirect()->route('admin.blogs');
    }
}
