<div class="mx-auto px-40 px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
    <div {{$attributes->merge(['class' => 'm-2 mb-5 p-8 rounded-lg shadow-lg relative hover:shadow-2xl transition duration-500'])}}>
        {{-- <h1>{{$gender}}</h1> --}}
        <div class="flex justify-between mb-2 text-sm text-gray-600 mt-2">
            <h1 class="text-2xl text-white font-semibold mb-3">{{$name}}</h1>
            <h2 class="text-xl text-white font-light mb-3">{{$category}}</h2>
            {{-- <select class="form-input w-1/6 shadow rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none font-medium" name="category" id="category"></select> --}}
            {{-- <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex flex-row text-gray-900 items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-teal-200 focus:bg-teal-200 focus:outline-none focus:shadow-outline">
                    <span>{{$category}}</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </x-slot>
                <x-slot name="trigger">
                  <span>{{$category}}</span>
                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </x-slot>
                <x-slot name="content">
                </x-slot>
              </x-dropdown>  --}}
        </div>
        <div class="m-2  p-8 rounded-lg shadow-lg relative bg-white">
            <p class="text-gray-600 leading-6 tracking-normal">
                {{$post}}
            </p>
        </div>
        <div class="flex justify-between mb-2 text-sm text-white mt-2">
            <p>Last Update</p>
            <p>{{$updated_at}}</p>
        </div>
    </div>
</div>