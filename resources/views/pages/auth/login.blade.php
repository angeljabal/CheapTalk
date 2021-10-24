@extends('base')
@section('content')
<div class="flex flex-col h-screen bg-opacity-40">
    <div class="grid place-items-center  mt-8">
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 
            px-6 py-10 sm:px-10 sm:py-6 
            bg-yellow-100 rounded-lg shadow-md lg:shadow-lg">
            <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                Login
            </h2>
            <div class="my-10">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                @if (session('Error'))
                <div class="mb-4">
                    <div class="font-medium text-justify text-red-600">
                        {{session('Error')}}
                    </div>
                </div>
                @endif
            </div>

            <form action="{{url('/login')}}" method="post" class="mt-10">
                {{ csrf_field() }}
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" type="email" name="email" autocomplete="email" required></x-input>

                <x-label for="password" :value="__('Password')" />
                <x-input id="password" type="password" name="password" autocomplete="current-password" required></x-input>

                <x-button>{{ __('Login') }}</x-button>

                <div class="mt-8 sm:mb-4 text-sm text-right">
                    <a href="register" class="flex-2 underline hover:text-teal-600">
                        Create an Account
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection