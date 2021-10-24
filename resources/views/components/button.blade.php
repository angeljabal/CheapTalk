<button {{ $attributes->merge(['type' => 'submit', 
            'class' => 'w-full py-3 mt-10 bg-teal-500 rounded-sm
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-teal-700 hover:shadow-none 
                    ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'])}}>
    {{ $slot }}
</button>
