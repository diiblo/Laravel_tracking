@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#266ba2]']) }}>
    {{ $value ?? $slot }}
</label>
