@extends('components.layout')

@section('title', 'Register')

@section('stylesheets')
    @vite('resources/css/user-login.css')
@endsection

@section('content')
    <main class="login-page">
        <div class="content-container my-5">
            <h1 class="mb-3">User Registration</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="email"><h4>Email</h4></label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
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
                <div class="form-group">
                    <label for="password_confirmation"><h4>Confirm Password</h4></label>
                    <input
                        type="password"
                        class="form-control"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                    />
                </div>

                <button type="submit" class="btn btn-outline-dark mt-2">
                    Register
                </button>
            </form>
        </div>
    </main>
@endsection
