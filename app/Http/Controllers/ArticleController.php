<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
USE DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article=Article::latest()->get();
        
        return view('article.index',['articles'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
        
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
        Article::create($validatedAttributes);
        /*
        Article::create([
        'title'=>request('title'),
        'excerpt'=>request('ecerpt'),
        'body'=>request('body')
        ])
        */


      $article=new Article();
      $article->title=request('title');
      $article->excerpt=request('excerpt');
      $article->body=request('body');
      $article->save();
      return redirect('/');
      
    

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
     return view('article.show',['article'=>$article]);
     

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=DB::table('articles')->where('id',$id)->first();
        return view('article.edit',compact('article'));

    }

 
    public function update(Request $request, $id)
    {
        //$oldImage=$request->old_image;
    $data=array();
    $data['title']=$request->title;
    $data['excerpt']=$request->excerpt;
    $data['body']=$request->body;
 
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
  
    $project=DB::table('articles')->where('id',$id)->update($data);
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
