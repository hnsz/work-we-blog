<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplyableController extends Controller
{
    // $commentreply, replyable_id
    public function reply(\App\Http\Requests\CommentReply $request, $replyabeleId)
    {
        $this->request =$request;
    }
    
}
