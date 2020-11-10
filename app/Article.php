<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','excerpt','body'];

    public function user(){

    }

    //hasOane
//hasMany
//belongsTo
//belongsToMany
////
//morphMany
//morphToMany

}
