<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function isBest(conversation $conversation){
        if($conversation->best_reply_id===$this->id){
            return true;
        }else{
            return false;
        }

    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }
}
