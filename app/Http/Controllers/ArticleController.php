<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\ContactMe;
use App\Mail\Contact;
use App\User;
USE DB;
class ArticleController extends Controller
{
    private $topic_message="topic Klaus Iohanis";

    public function index()
    {
        //$article=Article::get()->all();
        //var_dump($article);
        if(request('tag')){
            $article=Tag::where('name',request('tag'))->firstOrFail()->articles;
        }else{
            $article=Article::latest()->get();

        }
        //dd($article);
        //exit();
        return view('article.index',['article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag=Tag::get()->all();
        return view('article.create',['tags'=>$tag]);
        
    }
    public function createSendEmail()
    {
        
        return view('article.mail');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    //dump(request()->all());
      $validatedAttributes=request()->validate([
        //'title'=>['request','min:2','max:255 '],
        'title'=>'required',
        'excerpt'=>'required',
        'body'=>'required'
        
        ]);
        //return $validatedAttributes;
        //Article::create($validatedAttributes);
        /*
        ,
        'tags'=>'exists::tags,id'
        Article::create([
        'title'=>request('title'),
        'excerpt'=>request('ecerpt'),
        'body'=>request('body')
        ])
        */


      $article=new Article();
      $article->user_id=1;
      $article->title=request('title');
      $article->excerpt=request('excerpt');
      $article->body=request('body');

      $article->save();
      $article->tags()->attach(request('tags'));

      //var_dump(  $article->tags()->attach(request('tags')));

     // dd(request()->user());
     $article->notify(new PaymentReceived($article->excerpt));
      //request()->user()->notify(new PaymentReceived());
      return redirect('/');
      
    

    }
    public function storeSendEmail(Request $request){

   
        $validatedAttributes=request()->validate(['email'=>'required|email']);
        //$email=request('email');
        /*
        Mail::raw('merge', function($message){
            $message->to(request('email'))
                    ->subject('Hello there!');
        });
        */
        MAIL::to(request('email'))
              ->send(new Contact($this->topic_message));
        return redirect()->route('article.sendEmail')->with('message','Email sent !');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $article=Article::find($id);
     // dd($article->Tags);
      //exit();
      //$tags=$article->Tags
     return view('article.show',['article'=>$article]);
     

    }

  
    public function edit($id)
    {
        $tags_new=Tag::get()->all();
        //$article=DB::table('articles')->where('id',$id)->first();
        $article=Article::find($id);
      
        
        return view('article.edit',compact('article','tags_new'));

    }

 
    public function update(Request $request, $id)
    {
        //$oldImage=$request->old_image;
    $data=array();
    $data['title']=$request->title;
    $data['excerpt']=$request->excerpt;
    $data['body']=$request->body;
    $data['user_id']=1;
 
    //for a single image
    /*
    $image=$request->file('images');
    if($image){
        if($oldImage){
        unlink($oldImage);
        }
        $image_name=date('dmy_H_s_i');
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/media/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['images']=$image_url;
        $project=DB::table('articles')->where('id',$id)->update($data);
        return redirect()->route('home')
                        ->with('success','Article updated successfully!');
    }
    
    */
  
   // $project=DB::table('articles')->where('id',$id)->update($data);
   $project=Article::create($data);

    //$project->tags()->sync($request->tags);
    $project->tags()->attach($request->tags);

     return redirect()->route('article.index')
                        ->with('success','Article updated successfully!');


    }

  
    public function delete($id)
    {
        //search line 
        $data=DB::table('articles')->where('id',$id)->first();
        //get image adress
        /*
        $images_split=explode(',', $data->images);
        foreach($images_split as $image){
        if($image){
            unlink($image);
            }
        }
        */
        //dd($id);
        $article=DB::table('articles')->where('id',$id)->delete();
        return redirect()->route('article.index')
                         ->with('success','Article delete successfully!');
    }
}
