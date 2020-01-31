<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Post;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
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
         
        $vm_post = $this->createViewModel($post);
        return view('posts.read', ['vm_post' => $vm_post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Post $post)
    {
        $vm_post = $this->createViewModel($post);
        return view('posts.edit', ['post' => $post]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // middleware auth

        
    }
    /**
     * Turn a post model into a viewmodel, to be used in template.
     *
     * @param \App\Post $post
     * @return Array an associative array
     */
    private function createViewModel(\App\Post $post)
    {
        // read/show
        $vm_post = $post->attributesToArray();
        $vm_post['author'] = $post->user->name;
        $vm_post['edit_url'] = action([PostController::class, 'edit'], ['post' => $post->id]);
        $vm_post['show_edit_url'] = (Auth::check() &&  $post->user_id === Auth::user()->id);

        // store
        // ... 

        // edit
        

        //update
        // ...
        $vm_post['user_logged_in'] = Auth::check();
        $vm_post['user_is_post_owner'] = ($post->user_id === Auth::user()->id);
            //policy

        //delete
        // ...


        return $vm_post;
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  middleware auth
    }
}
