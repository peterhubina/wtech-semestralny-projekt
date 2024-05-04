<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/templates.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="my-5 text-center">Admin Login</h2>
                <form method="POST" action="{{ route('admin-login') }}" class="d-flex flex-column align-items-center">
                    @csrf
                    <div class="form-group w-50">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group w-50">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>