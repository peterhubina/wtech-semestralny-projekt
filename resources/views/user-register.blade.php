@extends('components.layout')

@section('title', 'Registration')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite('resources/css/templates.css')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
@endsection

@section('content')
<div class="relative overflow-hidden max-h-52 md:max-h-80 lg:max-h-full">
    <img src="{{ asset('assets/img/bg-small.png') }}" alt="background image"
         class="translate-y-[-40%] lg:hidden md:translate-y-[-40%] object-fill">
    <img src="{{ asset('assets/img/home-background.webp') }}" alt="background image" class="hidden lg:block">
    <span class="lg:hidden absolute inset-0 bg-white opacity-50"></span>
</div>
<main class="lg:absolute lg:left-[62%] lg:top-[12%] p-10 lg:px-0 md:px-40 md:py-20 min-w-64 lg:min-w-80">
    <h1 class="text-xl md:text-2xl pb-3">User registration</h1>
    <form class="flex flex-col gap-3">
        <div class="flex flex-col">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                   class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5">
        </div>
        <div class="flex flex-col">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"
                   class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5">
        </div>
        <div class="flex flex-col">
            <label for="password_repeated">Password repeated</label>
            <input type="password" name="password_repeated" id="password_repeated"
                   class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5">
        </div>
    </form>
    <button class="flex items-center justify-center p-3 mt-4 bg-black text-white rounded-xl w-full">
        Register
    </button>
</main>
@endsection
