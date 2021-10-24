@extends('base')
@section('content')
<div class="w-full h-screen text-gray-900 py-36 bg-center bg-cover bg-no-repeat"
    style="background:url({{asset('images/bg.jfif')}})">
    <div class="p-10 bg-teal-200 rounded-3xl bg-opacity-40 max-w-7xl 
                mx-auto px-4 sm:px-6 lg:px-4 flex items-center justify-center text-center">
        <div class="lg:w-3/6 lg:pr-0 pr-0">
            <h1 class="font-medium drop-shadow-lg text-5xl text-white">Welcome to CheapTalks!</h1>
            <p class="leading-relaxed mt-4 text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nihil. 
                Pariatur omnis quasi accusantium assumenda consequatur vero animi maxime 
                laudantium voluptates, aut ab temporibus rem facilis provident. 
                Dolor, necessitatibus nam.
            </p>
            @if (!Auth::check())
            <a href="{{url('/register')}}"
                class="mt-6 mb-12 md:mb-0 md:mt-10 inline-block py-3 px-8 
                    text-white bg-teal-500 hover:bg-teal-600 rounded-lg shadow">
            Get Started
            </a>
            @endif

        </div>
    </div>
</div>
@endsection