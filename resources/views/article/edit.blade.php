@extends('layout.header')

@section('content')
<div class="container">
<form action="{{url('article/update/' .$article->id)}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <strong>Title </strong>
    <input type="text" name="title" class="form-control" value="{{$article->title}}"> 
    <strong>Excerpt </strong>
    <input type="text" name="excerpt" class="form-control" value="{{$article->excerpt}}"> 
    <strong>Body</strong>
    <textarea type="text" name="body" class="form-control" 
    placeholder="details" style="height:250px"> 
    {{$article->body}}
    </textarea>
    
    <button type="submit" class="btn btn-primary">Submit </button>
    </div>
</div>
</div>
</form>

@endsection