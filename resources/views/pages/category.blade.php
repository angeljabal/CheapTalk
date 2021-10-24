@extends('base')

@section('content')
<div class="z-1">
    <x-div-title>{{ __($category->category . ' Posts') }}</x-div-title>
    @foreach ($posts as $post)
        <div>
            <x-post-card class="{{$post->user->gender === 'female' ? 'bg-pink-400 hover:bg-pink-500' : 'bg-blue-400 hover:bg-blue-500'}}">
                <x-slot name="name">{{$post->user->name}}</x-slot>
                <x-slot name="category">{{$post->category->category}}</x-slot>
                <x-slot name="post">{{$post->post}}</x-slot>
                <x-slot name="created_at">{{$post->created_at}}</x-slot>
                <x-slot name="content">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                          <span>{{$post->category->category}}</span>
                          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </x-slot>
                        <x-slot name="content">
                          @foreach (App\Models\User::byCategory($post->category_id) as $user)
                          <x-dropdown-link href="{{url('authors', ['id'=>$user->id])}}">
                              {{$user->name}}
                          </x-dropdown-link>
                        @endforeach
                        </x-slot>
                    </x-dropdown>
                </x-slot>
            </x-post-card>
        </div>
    @endforeach
    <x-pagination-nav>
        {{ $posts->links() }}
    </x-pagination-nav>
</div>

@endsection