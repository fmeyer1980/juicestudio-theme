@php
    // Hent content fra den specifikke service post
    $blocks = parse_blocks($item->post_content);
    
    // Find første acf/headline block (også inde i innerBlocks)
    $first_headline_block = find_block_recursive($blocks, 'acf/headline');
    
    // Hent headline teksten fra block data
    $headline = null;
    if ($first_headline_block && isset($first_headline_block['attrs']['data']['headline'])) {
        $headline = $first_headline_block['attrs']['data']['headline'];
    }
@endphp

<li class="relative group aspect-[5/3] flex flex-col justify-between bg-primary text-light-glare py-500 px-600 rounded-xl w-[calc((100%_-_var(--_gap)_*_2)_/_3)]">
    <span class="ml-auto text-xxs border border-light-glare/30 rounded-full py-[.3em] px-[1em] group-hover:bg-light-glare group-hover:text-dark transition-colors duration-300">{{ $item->post_title }}</span>
    <div class="flex gap-100 items-end justify-between prose-headings:leading-flat ">
        <h3>
            <a class="link-parent leading-flat" href="{{ get_permalink($item->ID) }}">
                {{ $headline ?? $item->post_title }}
            </a>
        </h3>
        <span class="size-650 border text-light-glare rounded-full flex items-center justify-center shrink-0 group-hover:bg-light-glare group-hover:text-dark transition-colors duration-300">@svg('heroicon-o-chevron-right', 'h-[60%] translate-x-[4%] w-auto')</span>
    </div>
</li>