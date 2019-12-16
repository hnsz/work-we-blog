<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentReply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Tests\Unit\CommentReplyRequestTest;

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
    public function createComment(Request $commentReply)
    {
        
        $user = $this->getUserOrFail();
        $commentData = $commentReply->get('title');
        
        $comment = $user->comments()->create($commentData);
        
    }
    private function getUserOrFail(): User
    {
        if (Auth::check()) {
            return Auth::user();
        } else {
            throw new \Exception("You have to log in to post a comment.");
        }
    }
 
    
}
