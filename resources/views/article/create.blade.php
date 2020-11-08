@extends('layout.header')
@section('content')

<div class="container">
<div id="wrapper">
<div class="pull-right">
<a class="btn btn-success" href="{{url('/')}}" >  Back </a>
</div>
<div class="wrapper">
    <h1>New Article </h1>
</div>
</div>
<form method="POST" action="{{route('article.store')}}">
    @csrf
    <strong>Title </strong>
    <input type="text" name="title" class="form-control"> 
    <strong>Excerpt </strong>
    <input type="text" name="excerpt" class="form-control"> 
    <strong>Description </strong>
    <textarea type="text" name="body" class="form-control" placeholder="details" style="height:150px"> 
    </textarea>
    
    <button type="submit" class="btn btn-primary">Submit </button>


</form>
</div>

@endsection