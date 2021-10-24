@extends('base')
@section('content')
<div class="flex flex-col bg-opacity-40">
    <div class="grid place-items-center my-8">
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 
            px-6 py-10 sm:px-10 sm:py-6 
            bg-yellow-100 rounded-lg shadow-md lg:shadow-lg">
            <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                Register
            </h2>
            <div class="my-10">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
            <form action="{{url('/register')}}" method="post" class="mt-10">
                {{ csrf_field() }}
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" type="name" name="name" autocomplete="name" required></x-input>

                <x-label for="gender" :value="__('Gender')" />
                <div class="main flex overflow-hidden m-4 select-none">
                    <label class="flex radio p-2 cursor-pointer">
                      <input class="my-auto transform scale-125" type="radio" name="gender" value="male"/>
                      <div class="title px-2">Male</div>
                    </label>
                  
                    <label class="flex radio p-2 cursor-pointer">
                      <input class="my-auto transform scale-125" type="radio" name="gender" value="female"/>
                      <div class="title px-2">Female</div>
                    </label>
                </div>

                <x-label for="email" :value="__('Email')" />
                <x-input id="email" type="email" name="email" autocomplete="email" required></x-input>

                <x-label for="password" :value="__('Password')" />
                <x-input id="password" type="password" name="password" autocomplete="current-password" required></x-input>

                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" autocomplete="password_confirmation" required></x-input>
                    
                <x-button>{{ __('Register') }}</x-button>

                <div class="mt-8 sm:mb-4 text-sm text-right">
                    <a href="login" class="flex-2 underline hover:text-teal-600">
                        Already have an account?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection