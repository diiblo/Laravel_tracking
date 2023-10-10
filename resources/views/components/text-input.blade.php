@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#266ba2] focus:ring-[#266ba2] rounded-md shadow-sm']) !!}>
