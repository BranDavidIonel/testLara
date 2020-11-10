<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
        //select * FROM user where project_id=1
    }
}
//hasOane
//hasMany
//belongsTo
//belongsToMany
////
//morphMany
//morphToMany