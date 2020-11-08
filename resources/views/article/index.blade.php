@extends('layout.header')

@section('content')
<h2> All Articles : </h2>
<table class="table table-bordered">
<tr>
<th>Title</th>
<th>Excerpt</th>
<th>Body</th>
</tr>
@foreach($articles as $line)
<tr>
<td>{{ $line->title }}</td>
<td>{{ $line->excerpt }}</td>
<td>{{ $line->body }}</td>

@endforeach
</table>

@endsection

