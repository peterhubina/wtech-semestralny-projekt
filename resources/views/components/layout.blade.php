<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <!-- Application CSS -->

    @vite('resources/css/templates.css')
    @vite('resources/js/app.js')
    @yield('stylesheets')

    <title>@yield('title', 'Main Page')</title>
</head>
<body>
<div class="wrapper">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>
