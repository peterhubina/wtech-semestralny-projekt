@extends('components.layout')

@section('title', 'Login')

@section('content')
    <main class="login-page">
        <div class="content-container my-5">
            <h1 class="mb-3">User Login</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1"
                    ><h4>Email</h4></label
                    >
                    <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                    />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"
                    ><h4>Password</h4></label
                    >
                    <input
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                    />
                </div>

                <button type="submit" class="btn btn-outline-dark mt-2">
                    Login
                </button>
            </form>
        </div>
    </main>
@endsection
