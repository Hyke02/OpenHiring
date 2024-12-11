@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-transparent border-b-2 border-b-gray-600 bg-gray-50 bg-opacity-30 text-black focus:bg-red focus:border-indigo-600 mb-1 rounded-md']) }}>
