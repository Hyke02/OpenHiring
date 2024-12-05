@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
