<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
class PostsController extends Controller
{
    function show($slug){
        //$post=DB::table('posts')->where('slug',$slug)->first();
        $post=Post::where('slug',$slug)->firstOrFail();
        //dd($post);
        /*
        $posts=[
            'my-first-post'=>'hello, this is my first blog',
            'my-second-post'=>'Now I am  getting the hang of this'
        ];
        if(!array_key_exists($slug,$posts)){
            abort(404,"Sorry, that post was not found");
        }
        return view('post',[
            'post'=>$posts[$post]?? "Nothing here yet."
        ]);
        
        if(!$post){
            abort(404);
        }
        */
        return view('post',[
            'post'=>$post
        ]);
    }
}
