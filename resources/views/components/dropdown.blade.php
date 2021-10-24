@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white', 'active'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
$classes = ($active ?? false)
        ? 'border-b-2 border-teal-200 flex flex-row 
            font-bold text-gray-900 items-center w-full px-4 py-2 
            mt-2 text-sm font-semibold text-left bg-transparent rounded-lg 
            md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 
            hover:bg-teal-200 focus:bg-teal-200 focus:outline-none focus:shadow-outline'
        : 'border-b-2 border-transparent flex flex-row 
            font-bold text-gray-900 items-center w-full px-4 py-2 
            mt-2 text-sm font-semibold text-left bg-transparent rounded-lg 
            md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 
            hover:bg-teal-200 focus:bg-teal-200 focus:outline-none focus:shadow-outline'
@endphp

<div @click.away="open = false" class="relative" x-data="{ open: false }">
    <button @click="open = !open" {{ $attributes->merge(['class' => $classes]) }}>
     {{$trigger}}
    </button>
    <div x-show="open" 
            x-transition:enter="transition ease-out duration-100" 
            x-transition:enter-start="transform opacity-0 scale-95" 
            x-transition:enter-end="transform opacity-100 scale-100" 
            x-transition:leave="transition ease-in duration-75" 
            x-transition:leave-start="transform opacity-100 scale-100" 
            x-transition:leave-end="transform opacity-0 scale-95" 
            class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}">
      <div class="px-2 pt-2 pb-4 bg-white rounded-md shadow-lg dark-mode:bg-gray-700 z-10">
        <div class="grid">
          {{$content}}
        </div>
      </div>
    </div>
</div>
