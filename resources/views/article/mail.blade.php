@extends('layout.header')

@section('content')
<div class="container">
<form method="POST" action="{{route('article.storeSendEmail')}}" >
@csrf
 <div>
	<label> Email Address </label>
	<input class="form-control"type="text" id="email" name="email" request>
	@error('email')
		<div class="text-warning"> {{$message}}</div>
	@enderror
	<button type="submit" class="btn btn-primary"> Email Me</button> 
 </div>
 @if(session('message'))
 <div>
	<p class="bg-info">
	{{session('message')}}
	</p>
</div>
 @endif
</form>
@endsection