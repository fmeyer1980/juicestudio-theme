@php
    $image = get_field('image');
    $video = get_field('video');
@endphp

<section class="intro wrapper flex flex-wrap gap-y-900 gap-x-lg {{ $is_preview ?: block_bg_color($block) . ' ' . block_text_color($block) . ' ' . block_padding($block) }}">
    <InnerBlocks 
        class="content basis-0 grow-[999] min-w-[50%] prose-p:max-w-[70ch] prose-p:text-current/80 flow-y! flow-space-1em prose-hr:mt-700! prose-hr:relative!"
        allowedBlocks="{{ json_encode([
            'acf/title',
            'acf/headline',
            'acf/text',
            'acf/button-group',
            'acf/logo-carousel',
            'acf/dividere'
        ]) }}"
        template="{{ json_encode([
            ['acf/title'],
            ['acf/headline'],
            ['acf/text']
        ]) }}"
        templateLock="false"
    />
    <div class="relative overflow-clip h-auto min-h-[20rem] basis-[20rem] grow rounded-2xl image-overlay" {!! acf_inline_toolbar_editing_attrs(['video']) !!} >
        @if($video)
            <video loop autoplay preload="auto" muted class="absolute inset-0 w-full h-full object-cover" src="{{ $video['url'] }}"></video>
        @elseif($image)
            <img loading="eager" class="w-full h-full object-cover" src="{{ $image['sizes']['medium_large'] }}" alt="">
        @else
            <p>Uploade et billede eller video</p>
        @endif
    </div>
</section>
