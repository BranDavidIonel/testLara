@extends('layout.header')

@section('content')
<div class="title">
<h2> {{$article->title}} </h2>
<h2> {{$article->excerpt}} </h2>
<h2> {{$article->body}} </h2>
</div>
<p> da
	@foreach ($article->Tags as $tag)
		<a href="{{route('article.index',['tag'=>$tag->name])}}"> {{ $tag->name}} </a>
	@endforeach


</p> 
@endsection