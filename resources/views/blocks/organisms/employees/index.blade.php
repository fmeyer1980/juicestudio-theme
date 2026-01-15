@php
    $employees = get_posts([
        'post_type' => 'employee',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'order' => 'DESC',
    ]);

    
@endphp

<section class="wrapper {{ $is_preview ?: block_padding($block) }}">
    <ul class="auto-grid auto-grid-lg gap-900">
        @foreach($employees as $item)
            <li class="flex flex-col">
                <p class="font-heading text-400 uppercase order-2 leading-flat">{{ $item->post_title }}</p>
                <p class="text-primary/60 order-3 uppercase text-xs">{{ $item->postion }}</p>
                @if(has_post_thumbnail($item->ID))
                    <img class="w-full h-full object-cover order-1 rounded-xl mb-400" src="{{ get_the_post_thumbnail_url($item->ID, 'medium') }}" alt="{{ $item->post_title }}">
                @endif
            </li>
        @endforeach
    </ul>

</section>