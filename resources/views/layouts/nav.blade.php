
<div class="relative z-10 flex-shrink-0 flex h-16 md:max-w-6xl md:mx-auto md:flex md:items-center md:justify-between">
  <div class="flex justify-between items-center pl-10">
        <a href="{{url('/')}}" class="{{Route::is('landing') ? 'border-b-2 border-teal-200' : 'bg-transparent'}} 
                p-2 text-lg font-semibold tracking-widest text-teal-600 uppercase rounded-lg font-bold 
                focus:outline-none focus:shadow-outline">
          CheapTalks
        </a>
  </div>
  <div class="antialiase">
    <div class="w-full text-gray-700">
      <div x-data="{ open: true }" 
          class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
          <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
              <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
              <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" 
              class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
          <a class="{{Route::is('home') ? 'border-b-2 border-teal-200' : 'bg-transparent'}} 
                    px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 font-bold 
                    hover:text-gray-900 focus:text-gray-900 hover:bg-teal-200" href="{{url('/home')}}">
              Home
          </a>
          <x-dropdown align="right" width="48" :active="Route::is('categories')">
            <x-slot name="trigger">
              <span>Categories</span>
              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" 
                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd">
                    </path>
              </svg>
            </x-slot>
            <x-slot name="content">
              @foreach (App\Models\Category::whereHas('posts')->get()->sortBy('category') as $category)
              <x-dropdown-link href="{{url('categories', ['id'=>$category->id])}}">
                {{$category->category}}
              </x-dropdown-link>
              @endforeach
            </x-slot>
          </x-dropdown> 
          <a class="{{Route::is('authors') ? 'border-b-2 border-teal-200' : 'bg-transparent'}} 
                    px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 font-bold 
                    hover:text-gray-900 focus:text-gray-900 hover:bg-teal-200" href="{{url('/authors')}}">
            Authors</a>
          @if (Auth::check())
          <x-dropdown align="right" width="48" :active="Route::is('create-post')">
            <x-slot name="trigger">
              <span>{{auth()->user()->name}}</span>
              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" 
                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd">
                    </path>
              </svg>
            </x-slot>
            <x-slot name="content">
              <x-dropdown-link href="{{url('/user/create-post')}}">
                {{ __('Create Post') }}
              </x-dropdown-link>
              <x-dropdown-link href="{{url('authors', ['id'=>auth()->user()->id])}}">
                {{ __('My Posts') }}
              </x-dropdown-link>
              <x-dropdown-link href="{{url('/logout')}}">
                {{ __('Logout') }}
              </x-dropdown-link>
            </x-slot>
          </x-dropdown> 
          @else
          <a class="{{Route::is('login') ? 'border-b-2 border-teal-200' : 'bg-transparent'}} 
                    px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 font-bold 
                    hover:text-gray-900 focus:text-gray-900 hover:bg-teal-200" href="{{url('/login')}}">Login</a>
          @endif
        </nav>
      </div>

    </div>
  </div>

</div>