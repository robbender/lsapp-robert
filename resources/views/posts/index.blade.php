@extends('layout')

@section('content')

    <h1>Posts</h1>
    <br>
 @if(count($posts) > 0)
 {{-- @if ($posts->count()) --}}

        @foreach($posts as $post)

            <div class="well">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <small>Written on {{ $post->created_at }}</small>
            </div>
            <br>

        @endforeach
        {{ $posts->links() }}

    @else
        <p>No post found</p>

@endif


@endsection
