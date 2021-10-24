@extends('base')

@section('content')
<div class="w-full">
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($users as $user)
            <a href="{{url('authors', ['id'=>$user->id])}}">
                <div class="{{$user->gender === 'female'? 'bg-pink-400 hover:bg-pink-500' : 'bg-blue-400 hover:bg-blue-500' }} w-full rounded-lg shadow-lg p-12 flex flex-col justify-center items-center hover:shadow-2xl transform hover:scale-90 transition duration-500">
                    <div class="mb-8">
                        <img class="object-center object-cover rounded-full h-36 w-36" 
                            src="{{$user->gender === 'female' ? asset('images/female.jpg') : asset('images/male.jpg')}}" alt="photo">
                    </div>
                    <div class="text-center">
                        <p class="text-xl text-white font-bold mb-2">{{$user->name}}</p>
                        <p class="text-base text-white font-normal">Total Posts: {{$user->posts()->count()}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    <x-pagination-nav>
        {{ $users->links() }}
    </x-pagination-nav>
</div>
@endsection