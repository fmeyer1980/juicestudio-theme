@php 
    $image = get_field('featured_image', $item->ID);
@endphp

<li class="relative flex flex-col gap-400">
    <div class="order-2 flow-y flow-space-100 pr-gutter">
        <h3 class="text-500"><a class="link-parent" href="{{ $is_preview ? '#' : get_permalink($item->ID) }}">{{ $item->post_title }}</a></h3>
        <p class="text-xs text-current/70 line-clamp-2 flow-space-05em">"{{ $item->teaser }}"</p>
        @include('components.service-list', ['services' => get_field('services', $item->ID)])
    </div>
    <div class="relative aspect-video rounded-xl overflow-clip order-1 image-overlay" style="view-transition-name: case-image-{{ $item->ID }};">
        @if($image)
            <img class="absolute inset-0 w-full h-full object-cover" src="{{ $image['sizes']['large'] }}">
        @endif
    </div>
   
</li>
