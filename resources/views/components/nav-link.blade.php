@props(['active'])

@php

$classes = $active ?? false ? 'link--active' : '';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>

    {{ $slot }}

</a>
