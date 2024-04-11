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

                <button type="submit" class="btn btn-outline-dark mt-2">
                    Login
                </button>
            </form>

        </div>
    </main>
@endsection
