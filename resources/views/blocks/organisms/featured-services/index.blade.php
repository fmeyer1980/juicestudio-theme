@php
    $services = get_posts([
        'post_type' => 'service',
        'posts_per_page' => 5,
        'post_status' => 'publish',
        'order' => 'DESC',
    ]);
@endphp

<section class="wrapper space-y-600 {{ $is_preview ?: block_padding($block) }}">
     <InnerBlocks 
        class="flow-y flow-space-1em prose-p:text-current/70 flex flex-col items-center text-center"
        allowedBlocks="{{ json_encode([
            'acf/headline',
            'acf/text',
            'acf/button-group',
        ]) }}"
        template="{{ json_encode([
            ['acf/headline']
        ]) }}"
        templateLock="false"
    />
    <ul class="[--_gap:var(--size-200)] flex flex-wrap gap-(--_gap) justify-center transition-opacity *:duration-300 [&_li:has(~_:hover),_&_li:has(:hover)_~_li]:opacity-60">
        @foreach($services as $item)
            @include('components.service-card', ['item' => $item])
        @endforeach
    </ul>
</section>
