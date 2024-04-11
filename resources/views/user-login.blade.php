@extends('components.layout')

@section('title', 'Login')

@section('stylesheets')
    @vite('resources/css/user-login.css')
@endsection

@section('content')
    <main class="login-page">
        <div class="content-container my-5">
            <h1 class="mb-3">User Login</h1>
            <form method="POST" action="{{ route('login.show') }}">
                @csrf
                <div class="form-group">
                    <label for="email"><h4>Email</h4></label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        aria-describedby="emailHelp"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for="password"><h4>Password</h4></label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        required
                    />
                </div>

                <div class="d-flex mt-2">
                    <button type="submit" class="btn btn-outline-dark">
                        Login
                    </button>
                    <p class="px-2 m-0 align-self-center">Not a member? <a href="{{ route('register.show') }}">Register</a></p>
                </div>
            </form>

        </div>
    </main>
@endsection
