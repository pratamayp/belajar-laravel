@extends('dashboard/layouts/main')

@section('dashboardContainer')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">
            Create new posts
        </a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="py-2">{{ $loop->iteration }}</td>
                        <td class="py-2">{{ $post->title }}</td>
                        <td class="py-2">{{ $post->category->name }}</td>
                        <td class="py-2">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="text-dark badge">
                                <span data-feather="chevron-right"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
