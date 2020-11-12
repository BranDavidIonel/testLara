@extends('layout.header')

@section('content')
<h2> All Articles : </h2>
<table class="table table-bordered">
<tr>
<th>Title</th>
<th>Excerpt</th>
<th>Body</th>
<th>Edit</th>
<th>Delete</th>
<th>Show</th>
</tr>
@foreach($article as $line)
<tr>
<td>{{ $line->title }}</td>
<td>{{ $line->excerpt }}</td>
<td>{{ $line->body }}</td>
<td>
 <a class ="btn btn-primary" href="{{URL:: to('article/edit/'.$line->id)}}">Edit </a>
 </td>
 <td>
 <a class ="btn btn-danger" href="{{URL::to('article/delete/'.$line->id)}}" onclick="return confirm ('Are you sure?')">Delete </a>
</td>
<td><a class="btn btn-primary"  href="{{URL:: to('article/show/'.$line->id)}}"> Show </a></td>

@endforeach
</table> 


@endsection

