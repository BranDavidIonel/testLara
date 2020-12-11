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
//Route::get('/', 'ArticleController@index')->name('article.index');
Route::get('/', function () {
    $name=request('name');
    return view('welcome',['name'=>$name]);
});
Route::get('/articles', 'ArticleController@index')->name('article.index');
Route::post('article/articles', 'ArticleController@store')->name('article.store');
Route::post('article/storeSendEmail', 'ArticleController@storeSendEmail')->name('article.storeSendEmail');

Route::get('/article/create', 'ArticleController@create')->name('article.create');
Route::get('/article/sendEmail', 'ArticleController@createSendEmail')->name('article.sendEmail');

Route::get('/article/show/{article}', 'ArticleController@show')->name('article.show');
Route::get('/article/edit/{article}', 'ArticleController@edit')->name('article.edit');
Route::get('/article/delete/{article}', 'ArticleController@delete')->name('article.delete');
Route::post('/article/update/{article}', 'ArticleController@update')->name('article.update');

Route::get('/article/notifications/{article}','ArticleNotificationController@show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('conversations', 'ConversationsController@index')->name('conversations.index');
Route::get('conversations/{conversation}', 'ConversationsController@show')->name('conversation.show')->middleware('can:view,conversation');;

Route::post('conversations/best-reply/{reply}','ConversationBestReplyController@store')->name('best-reply.update');
