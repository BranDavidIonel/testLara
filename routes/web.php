<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    //return view('welcome');
    $name=request('name');
    return view('test',['name'=>$name]);
});

Route::get('/posts/{post}', function ($post) {
    //return view('test');
    
    $posts=[
        'my-first-post'=>'hello, this is my first blog',
        'my-second-post'=>'Now I am  getting the hang of this'
    ];
    if(!array_key_exists($post,$posts)){
        abort(404,"Sorry, that post was not found");
    }
    return view('post',[
        'post'=>$posts[$post]?? "Nothing here yet."
    ]);
    
});
*/
//Route::get('/posts/{post}','PostsController@show');
Route::get('/', 'ArticleController@index')->name('article.index');


