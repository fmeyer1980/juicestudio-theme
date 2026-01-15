@php
    $image = get_field('image');
    $flip_content = get_field('revers_content');
    $focal_point = get_field('focal_point')
@endphp

<section class="wrapper grid md:grid-cols-2 gap-900 items-center {{ $is_preview ?: block_padding($block) }}">
    <InnerBlocks 
        class="content basis-0 grow-[999] min-w-[50%] prose-p:max-w-[55ch] prose-p:text-current/70 flow-y! flow-space-1em pt-xxl {{ $flip_content == true ? 'order-2' : 'order-1' }}"
        allowedBlocks="{{ json_encode([
            'acf/headline',
            'acf/text',
            'acf/button-group',
            'acf/dividere',
            'core/paragraph',
            'acf/title',
        ]) }}"
        template="{{ json_encode([
            ['acf/headline'],
            ['acf/text']
        ]) }}"
        templateLock="false"
    />
    <div class="relative overflow-clip rounded-xl h-full aspect-4/3 md:aspect-auto bg-light-shade grid place-content-center {{ $flip_content == true ? 'order-1' : 'order-2' }}">
        @if($image)
            <img class="absolute inset-0 w-full h-full object-cover" style="object-position: {{ $focal_point['x'] ?? '50' }}% {{ $focal_point['y'] ?? '50' }}%;" src="{{ $image['sizes']['large'] }}" alt="Alt tekst her">
        @else
            <b class="opacity-30">Upload billede</b>
        @endif
    </div>
</section>