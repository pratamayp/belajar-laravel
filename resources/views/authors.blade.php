@extends('layouts/main')

@section('menu')
    @dump($authors)
    {{-- <h2 class="text-center m-5">Halaman Author</h2>
       <p>{{ $authors->name }}</p>
       <p>{{ $authors->email}}</p> --}}
@endsection