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
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email"><h4>Email</h4></label>
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
                    <button type="submit" class="btn btn-dark">
                        Login
                    </button>
                    <p class="px-2 m-0 align-self-center">Not a member? <a class="inline-block align-baseline font-bold text-sm text-black-500 hover:text-blue-800" href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
            </div>
        </div>
    </main>
@endsection
