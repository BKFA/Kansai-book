@extends('pages.layouts.index')

@section('title', 'Home')

@section('content')

<div class="col-md-6 blog-main bg-white rounded box-shadow">
    <h3 class="pb-3 mb-4 border-bottom row justify-content-center align-items-center">
       Posts
    </h3>
    @foreach($post as $p)
        <div class="blog-post">
            <h5><a href="/posts/{{ $p['idpost'] }}/{{ $p['ansititle'] }}.html">{{$p->title}}</a></h5>
            <p class="blog-post-meta" style="font-size: small;">{{$p->created_at}} by <a href="#">{{$p->user->name}}</a></p>
            <p>{!! $p->description !!}</p>
            <hr>
        </div>
    @endforeach

    <div style="text-align: center;">
        {{ $post->links() }}
    </div>
</div>

@endsection