@extends('components.layout')

@section('title', 'Info')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite('resources/css/templates.css')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
@endsection

@section('content')
    <div class="flex flex-col xl:items-center gap-10 xl:gap-20 py-20 px-10 sm:px-20 xl:px-0">
        <div class="flex flex-col xl:flex-row items-center gap-10 xl:gap-[80px]">
            <div class="flex flex-col gap-6 xl:gap-10">
                <h2 class="text-2xl lg:text-3xl xl:text-4xl" id="about">About</h2>
                <p class="xl:w-[460px] text-base xl:text-xl">
                    🌱 At <a href="/" class="hover:text-black">TheUrbanGardener.com</a>, we're passionate about bringing
                    modern gardening solutions right to your
                    fingertips! 🌱<br>
                    Discover top-quality gardening supplies and inspiration to transform your urban space into a green
                    oasis. From tools to plants, we have everything you need to cultivate your own garden sanctuary.
                    Join our community and let's grow together! 🌻🏙️ Visit <a href="/" class="hover:text-black">TheUrbanGardener.com</a>
                    today and start your
                    urban gardening journey.<br>
                    Happy gardening! 🌿✨
                </p>
            </div>
            <img src="{{ asset('assets/img/img-gardening.webp') }}" alt="our shop garden" width="600">
        </div>
        <div class="flex flex-col xl:flex-row items-center gap-10 xl:gap-[80px]">
            <div class="flex flex-col gap-6 xl:gap-10 w-full">
                <h2 class="text-2xl lg:text-3xl xl:text-4xl" id="contact">Contact</h2>
                <div class="flex flex-col gap-6">
                    <p class="xl:w-[460px] text-base xl:text-xl">Feel free to contact us via
                        one of the following methods:
                    </p>
                    <div class="flex flex-col gap-4 text-base xl:text-xl">
                        <a href="mailto:info@theurbangardener.com"
                           class="hover:text-black">info@theurbangardener.com </a>
                        <a href="tel:+421420420420" class="hover:text-black">+421 420 420 420</a>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/img/img-gardening.webp') }}" alt="our shop garden" width="600">
        </div>
        <div class="flex flex-col xl:flex-row items-center gap-10 xl:gap-[80px]">
            <div class="flex flex-col gap-6 xl:gap-10">
                <h2 class="text-2xl lg:text-3xl xl:text-4xl" id="visit">Visit us</h2>
                <p class="xl:w-[460px] text-base xl:text-xl text-balance">🌿 Visit us at our physical address: Adress
                    123, City 420
                    69, Slovakia🏙️<br>Step into our shop and explore our wide selection of plants in person. Immerse
                    yourself in
                    the greenery and discover the perfect additions to your urban garden! 🌱
                </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26419.81917081952!2d18.036070666674957!3d48.89542316664679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c87908a85bfc5%3A0x400af0f661d61b0!2sTren%C4%8D%C3%ADn%2C%20Slovakia!5e0!3m2!1sen!2sus!4v1647419173681!5m2!1sen!2sus"
                height="400" allowfullscreen="" loading="lazy" class="w-full xl:w-[600px]">
            </iframe>
        </div>
    </div>
@endsection
