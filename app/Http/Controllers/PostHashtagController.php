<?php

namespace App\Http\Controllers;

use App\PostHashtag;
use App\HashTag;
use App\Post;
use Illuminate\Http\Request;

class PostHashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostHashtag  $postHashtag
     * @return \Illuminate\Http\Response
     */
    public function show(PostHashtag $postHashtag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostHashtag  $postHashtag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostHashtag $postHashtag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostHashtag  $postHashtag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostHashtag $postHashtag)
    {
        //
    }
}
