@props(['value'])

<label {{ $attributes->merge(['class' => 'font-radikal block font-bold text-sm text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
