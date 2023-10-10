@props(['active'])

@php
$classes = ($active ?? false)
            ? 'btn btn-link nav-link active'
            : 'btn btn-link nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} 
    data-bs-toggle="collapse" 
    aria-expanded="false" 
    aria-controls="{{ $attributes['aria-controls'] }}" 
    role="button">
    {!! $slot !!}
</a>