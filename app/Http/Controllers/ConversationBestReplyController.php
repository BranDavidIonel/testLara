<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply){
        //authorize that the current user has permission to set the best reply
        //for the conversation
        dd($reply);
        exit();
        //$this->authorize('update-conversation',$reply->conversation);
        //the set it 
        $reply->conversation->best_reply_id=$reply->id;
        $reply->conversation->save();
        return back();
        //redirect back to the conversation page

    }
}
