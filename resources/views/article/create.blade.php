@extends('layout.header')
@section('content')

<div class="container">
<div id="wrapper">
<div class="pull-right">
<a class="btn btn-success" href="{{url('/articles')}}" >  Back </a>
</div>
<div class="wrapper">
    <h1>New Article </h1>
</div>
</div>
<form method="POST" action="{{route('article.store')}}">
    @csrf
    <strong>Title</strong>
    <input type="text" name="title" class="form-control {{$errors->has('title') ? 'background-danger': ''}}" required/> 
    @if ($errors->has('title'))
    <p class="help is-danger">{{$errors->first('title')}} </p>
    @endif
    <strong>Excerpt </strong>
    <input type="text" name="excerpt" class="form-control {{$errors->has('excerpt') ? 'background-danger': ''}}" required/> 
    @if ($errors->has('excerpt'))
    <p class="help is-danger">{{$errors->first('excerpt')}} </p>
    @endif
    <strong>Description </strong>
    <textarea type="text" name="body" class="form-control {{$errors->has('body') ? 'is-danger': ''}}" placeholder="details" style="height:150px" required> 
    </textarea>
    @if ($errors->has('body'))
    <p class=" background-danger bg-danger" >{{$errors->first('body')}} </p>
    @endif
    <select
    name="tags[]" multiple required>
	@foreach($tags as $tag)
		<option value="{{ $tag->id}}">{{$tag->name}} </option>
	@endforeach
    </select>
    <div>
    @error('tags')
        <p> {{$message}} </p>
    @enderror
    <button type="submit" class="btn btn-primary">Submit </button>


</form>
</div>

@endsection