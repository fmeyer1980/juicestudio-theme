@php
    $dividerColor = get_field('color');
@endphp

@include('components.divider', ['color' => $dividerColor])