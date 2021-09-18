@extends('layouts/main')

@section('menu')
    <div class="row justify-content-center">
        <div class="col-md-4">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center mb-4">Login Page</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="username" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="name@example.com" autofocus required value="{{ old('username') }}" autocomplete="off">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>

                    {{-- <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> --}}
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
                    <small class="d-block text-center mt-2">Not registered ? <a href="/register">Register here</a></small>
                </form>
            </main>
        </div>
    </div>
@endsection
