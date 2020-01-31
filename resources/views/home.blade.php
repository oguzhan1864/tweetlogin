@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                {{--@foreach ($tweets as $tweet)
                <p>{{$tweet->content}}</p>
                <p>{{$tweet->author}}</p>--}}
                <form action="/deletePost" method="post">
                @csrf
                <button name="id" type="submit">Delete Post</button>
                </form>
                <form action="/editPost" method="post">
                @csrf
                <button name="id" type="submit">Edit Post</button>
                </form>
                {{--@endforeach--}}

                <form action="/" method="post">
                    @csrf
                    <input type="text" name="author" value='author'>
                    <input type="text" name="content" value='tweet'>
                    <input type="submit" value="Create Tweet">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
