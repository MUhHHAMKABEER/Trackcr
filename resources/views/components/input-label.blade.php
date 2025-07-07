@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-base font-semibold text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
