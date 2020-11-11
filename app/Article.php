<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','excerpt','body'];

    public function user(){
        //return $this->belongsTo(User::class); //user_id implicit
        return $this->belongsTo(User::class,'user_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
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
