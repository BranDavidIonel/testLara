<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply){
        //authorize that the current user has permission to set the best reply
        //for the conversation
        //dd($reply);
        //exit();
        /*
        if (Gate::denies('update-conversation',$reply->conversation)){
            die('handle it');
        }
        */
        $this->authorize('update',$reply->conversation);
        //the set it 
        $reply->conversation->setBestReply($reply);
        return back();
        //redirect back to the conversation page

    }
}
