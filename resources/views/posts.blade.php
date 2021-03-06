@extends('layouts/main')

@section('menu')
    <h2 class="text-center mb-4">{{ $title }}</h2>

    <div class="row justify-content-center mb-2">
        <div class="col-md-5">
            <form action="/posts" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">

                <h3 class="card-title">{{ $posts[0]->title }}</h3>

                <a href="/posts?category={{ $posts[0]->category->slug }}"
                    class="badge bg-info text-white">{{ $posts[0]->category->name }}
                </a><br>

                <small>
                    Penulis : <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a><br>
                    Last update {{ $posts[0]->created_at->diffForHumans() }}
                </small>

                <p class="card-text">{{ $posts[0]->brief }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read more..</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute p-2" style="background-color: rgba(0, 0, 0, 0.6)">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="text-white">{{ $post->category->name }}</a>
                            </div>
                            <img src="https://source.unsplash.com/600x300?{{ $post->category->name }}"
                                class="card-img-top" alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <small>
                                    Penulis : <a
                                        href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a><br>
                                    Last update {{ $post->created_at->diffForHumans() }}
                                </small>
                                <p class="card-text">{{ $post->brief }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More..</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @else
        <p class="text-center fs-4">No posts found</p>
    @endif
    <section class="d-flex justify-content-center">
        {{ $posts->links() }}
    </section>

@endsection