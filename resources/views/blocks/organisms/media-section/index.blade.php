@php
    $media_type = get_field('media_type');
    $image = get_field('image');
    $video = get_field('video');
@endphp

<div class="wrapper {{ $is_preview ?: block_padding($block) }}">
    <div class="relative aspect-4/3 md:aspect-video lg:aspect-16/7 rounded-xl overflow-clip image-overlay">
        @if($media_type == 'video' and $video)
            <video class="w-full h-full object-cover" src="{{ $video['url'] }}"></video>
        @elseif($media_type == 'image' and $image)
            <img class="w-full h-full object-cover" src="{{ $image['sizes']['1536x1536'] }}" alt="{{ $image['alt'] }}">
        @endif
        @svg('juice-pattern', 'absolute left-0 bottom-gutter z-20 w-full h-auto text-light-glare')
    </div>
</div>