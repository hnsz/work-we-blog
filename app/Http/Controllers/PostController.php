<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Post;
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
        return view('std.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //middlewareauth, redirect login (/register)
        return view('std.posts.create');
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
            //userfromsession
            //user->posts->create(initlist)
            
            
            $initlist['published_at'] = new \Datetime();
            $initlist['title'] = $request->get('title');
            $initlist['body'] = $request->get('body');
            $post = Auth::user()->posts->create($initlist);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //middeware auth
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
