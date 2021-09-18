@extends('dashboard/layouts/main')

@section('dashboardContainer')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-10">

                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="py-1 my-2 btn-sm bg-success text-decoration-none text-white">Back</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit"
                    class="py-1 my-2 btn-sm bg-warning text-decoration-none text-white">Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn-sm bg-danger border-0 text-white"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid"
                    alt="{{ $post->category->name }}"> --}}
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>

@endsection
