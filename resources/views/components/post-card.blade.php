<div class="mx-auto px-40 px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
    <div {{$attributes->merge(['class' => 'm-2 mb-5 p-8 rounded-lg shadow-lg relative hover:shadow-2xl transition duration-500'])}}>
        <div class="flex justify-between mb-2 text-sm text-gray-600 mt-2">
            <h1 class="text-2xl text-white font-semibold mb-3">{{$name}}</h1>
            {{$content}}
        </div>
        <div class="m-2  p-8 rounded-lg shadow-lg relative bg-white">
            <p class="text-gray-600 leading-6 tracking-normal">
                {{$post}}
            </p>
        </div>
        <div class="text-right mb-2 text-sm text-white mt-2">
            <p>Published: {{$created_at}}</p>
        </div>
    </div>
</div>