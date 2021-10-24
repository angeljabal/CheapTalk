@props(['value'])

<label {{ $attributes->merge(['class' => 'block mt-2 text-xs font-semibold text-gray-600 uppercase']) }}>
    {{ $value ?? $slot }}
</label>
