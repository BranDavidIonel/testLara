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
    <div>
    <select
    name="tags[]" multiple required>
        @foreach($tags_new as $tag)
		<option  class="list-group-item list-group-item-secondary" value="{{ $tag->id}}">{{$tag->name}} </option>
	    @endforeach
    </select>
    </div>
    <div>
    <strong>Old tags</strong>
    <ul class="list-group">
	@foreach($article->Tags as $tag)
		<li  class="list-group-item list-group-item-success" value="{{ $tag->id}}">{{$tag->name}} </li>
	@endforeach
    </ul>

    @error('tags')
        <p> {{$message}} </p>
    @enderror
    <button type="submit" class="btn btn-primary">Submit </button>
    </div>
    </div>
</div>
</div>
</form>

@endsection