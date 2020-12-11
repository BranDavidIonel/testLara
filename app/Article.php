<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

//use Tag;
class Article extends Model
{
    use Notifiable;
    //protected $fillable = ['title','excerpt','body',Tag::class];
    protected $guarded=[];
    public function users(){
        //return $this->belongsTo(User::class); //user_id implicit
        return $this->belongsTo(User::class,'user_id');
    }
    //hasOane
    //hasMany
    //belongsTo
    //belongsToMany
    ////
    //morphMany
    //morphToMany
    public function tags(){

        return $this->belongsToMany(Tag::class,'article_tag')->withTimestamps();
        
        //return $this->belongsToMany(Tag::class,'article_tag');
        //many to many with tags
    }

    
    public function routeNotificationForNexmo($notification)
    {
        return '40754823387';
    }

}
