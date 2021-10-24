@extends('base')
@section('content')
<div class="flex flex-col mb-5 w-full h-screen">
    <div class="grid place-items-center mt-8">
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 
            px-6 py-10 sm:px-10 sm:py-6 
            bg-yellow-100 rounded-lg shadow-md lg:shadow-lg">
            <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                Create Post
            </h2>
            <div class="my-10">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
            <form action="{{url('/user/create-post')}}" method="post" class="mt-10">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <x-label for="category" :value="__('Category')" />
                <select class="form-input mt-2 w-full shadow border rounded py-2 px-3 text-gray-700 leading-tight 
                            focus:outline-none font-medium" name="category_id" id="category_id">
                    <option selected="true" disabled="disabled">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>

                <x-label for="post" :value="__('Post')" />
                <textarea id="post" type="text" name="post" autocomplete="post"
                    class="form-input mt-2 w-full shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none font-medium"
                    rows="3"
                    required></textarea>
                
                <x-button>{{__('Publish')}}</x-button>
            </form>
        </div>
    </div>
</div>
@endsection