@extends('layouts/main')

@section('menu')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>{{ $post->title }}</h2>
                <p>Ditulis oleh : <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a></p>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid"
                    alt="{{ $post->category->name }}">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="../posts">Back to posts</a>
            </div>
        </div>
    </div>

@endsection
