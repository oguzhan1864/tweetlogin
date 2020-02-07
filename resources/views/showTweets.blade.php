@extends('master')

@section('title')
Tweets
@endsection

@section('content')

@foreach ($tweets as $tweet)
<p>{{$tweet->tweet}}</p>
<p><strong>{{$tweet->author}}</strong></p>
<form action="/deletePost" method="post">
    @csrf
    <button name="id" type="submit" value="{{ $tweet->id }}">Delete Post</button>
</form>
<form action="/editPost" method="post">
    @csrf
    <button name="id" type="submit">Edit Post</button>
</form>
@endforeach
<br>
<form action="/profile" method="post">
    @csrf
    <input type="text" name="author" value='author'>
    <input type="text" name="content" value='tweet'>
    <input type="submit" value="Create Tweet">
</form>
@endsection
