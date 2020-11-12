<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Tag;
class Article extends Model
{
    //protected $fillable = ['title','excerpt','body',Tag::class];
    protected $guarded=[];
    public function users(){
        //return $this->belongsTo(User::class); //user_id implicit
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function tags(){

        return $this->belongsToMany(Tag::class,'tag_id');
        //many to many with tags
    }

    //hasOane
//hasMany
//belongsTo
//belongsToMany
////
//morphMany
//morphToMany

}
