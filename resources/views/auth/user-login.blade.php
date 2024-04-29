@extends('components.layout')

@section('title', 'Login')

@section('stylesheets')
    @vite('resources/css/user-login.css')
@endsection

@section('content')
    <main class="login-page">
        <div class="content-container my-5">
            <h1 class="mb-3">User Login</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email"><h4>Email</h4></label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    aria-describedby="emailHelp"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password"><h4>Password</h4></label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    required
                    />
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex mt-2">
                    <button type="submit" class="btn btn-outline-dark">
                        Login
                    </button>
                    <p class="px-2 m-0 align-self-center">Not a member? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
        </div>
    </main>
@endsection
