<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentReply;
use Illuminate\Http\Response;

class ReplyableController extends Controller
{
    public $req;
    // $commentreply, replyable_id

    public function reply(CommentReply $request,\App\Post  $post)
    {
        $this->req = $request;

        $this->threadstarter = $post->threadstarter();

        
        $headers = ["x-accept-message" => "We accept your gift in the same spirit with which it was given, human."];
        return new Response("GOOD TIMES! All is well..", 202,  $headers);
    }
    public function createComment()
    {
        

    }
    
    
}
