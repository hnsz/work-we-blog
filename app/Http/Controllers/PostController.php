<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Post;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //middlewareauth, redirect login (/register)
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //middlewareauth, redirect maybe session ended, login + flash data
	    $validator = Validator::make($request->all(), [

	    'title' => [
		    'required',
		    'between:5,199;',
		    'string',

	    ],

	    'body' => [
		    'required',
		    'string'
	    ]

	    ] );
	    if($validator->fails()) {
		    return back()
			    ->withErrors($validator)
			    ->withInput();
	    }
	    else {
            $now = Carbon::now();
            
            $initlist = $request->all();
            $initlist['created_at'] = $now;
            $initlist['published_at'] = $now;
            
            $post = Auth::user()->posts()->create($initlist);


            $post->save();

                        

            return redirect('/posts')->with('message', 'Successfully added your post. You should find it in the list below.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Post $post)
    {
        // Auth::loginUsingId(4);
         
        $viewmodel = ['post' => $post];
        return view('posts.show', $viewmodel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Post $post)
    {
        $viewmodel = ['post' => $post];
        return view('posts.edit', $viewmodel);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Post $post)
    {
        $fields = ['title', 'body'];
        if($request->has($fields)) {
            $formvalues = $request->only($fields);
        }
        foreach($formvalues as $key => $value) {
            $post->setAttribute($key, $value);
        }
        $post->save();
        return redirect("/posts/{$post->id}/");
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Post $post)
    {
        //  middleware auth
        $post->delete();
        // TODO,DELTHIS: with flashdata post id en dan undo optie thrashed
        return redirect("/dashboard/");
    }
}
