@extends('pages.landing')
@section('content')
<div class="z-1">
    <x-div-title>{{ __('Recent Posts') }}</x-div-title>
    @foreach ($posts as $post)
        <div>
            <x-recent-post-card class="{{$post->user->gender === 'female' ? 'bg-pink-400' : 'bg-blue-400'}}">
                <x-slot name="name">{{$post->user->name}}</x-slot>
                <x-slot name="category">{{$post->category->category}}</x-slot>
                <x-slot name="post">{{$post->post}}</x-slot>
                <x-slot name="updated_at">{{$post->updated_at}}</x-slot>
            </x-recent-post-card>
        </div>
    @endforeach
    
</div>

@endsection

{{-- <div class="mx-auto px-40 px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
    <div class="{{$post->user->gender === 'female' ? 'bg-pink-400' : 'bg-blue-400'}} m-2 mb-5 p-8 rounded-lg shadow-lg relative hover:shadow-2xl transition duration-500">
        <div class="flex justify-between mb-2 text-sm text-gray-600 mt-2">
            <h1 class="text-2xl text-white font-semibold mb-3">{{$post->user->name}}</h1>
            <h2 class="text-xl text-white font-light mb-3">{{$post->category->category}}</h2>
            {{-- <select class="form-input w-1/6 shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none font-medium" name="category" id="category"></select> --}}
        {{-- </div>
        <div class="m-2  p-8 rounded-lg shadow-lg relative bg-white">
            <p class="text-gray-600 leading-6 tracking-normal">
                {{$post->post}}
            </p>
        </div>
        <div class="flex justify-between mb-2 text-sm text-white mt-2">
            <p>Last Update</p>
            <p>{{$post->updated_at}}</p>
        </div>
    </div>
</div> --}}