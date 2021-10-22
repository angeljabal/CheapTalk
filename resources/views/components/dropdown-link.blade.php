{{-- <a class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
{{$slot}}
</a> --}}
<a {{ $attributes->merge(['class' => 'flex flex text-sm row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-teal-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline']) }}>{{ $slot }}</a>
