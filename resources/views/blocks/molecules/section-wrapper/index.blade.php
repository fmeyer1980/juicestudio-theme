@php
    $background = get_field('background') ?? 'light';
    $spacing = get_field('spacing') ?? '900';
@endphp

<InnerBlocks 
    class="section-wrapper relative mx-gutter  before:w-full before:absolute before:bg-light before:top-0 before:left-0 before:h-full before:z-[-1] before:rounded-2xl"
    template="<?php echo esc_attr(wp_json_encode([
        ['acf/intro'],
        ['acf/logo-carousel'],
        ['acf/benefit']
    ])); ?>"
    templateLock="all" 
/>