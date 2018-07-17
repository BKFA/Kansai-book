@extends('pages.layouts.index')

@section('content')

<div class="col-md-6 blog-main bg-white rounded box-shadow">
    <div class="blog-post">

        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">{{{ $post->user->name }}}</a></p>
        <p>{!! $post->contentpost !!}</p>
        <hr>
        <p><a href="/posts/update/{{ $post->idpost }}/{{ $post->ansititle }}">Update!</a>

            @if(auth::check())
                @if(auth::user()->iduser==$post->iduser)
                    <a href="posts/delete/{{$post->idpost}}">  Delete!</a>
                @endif
            @endif
        </p>
    </div>

    <div class="fb-comments" 
        data-href="https://developers.facebook.com/docs/plugins/comments#bkfa{{ $post->idpost }}" 
        data-width="100%" 
        data-numposts="5">

    </div>
</div>

@endsection