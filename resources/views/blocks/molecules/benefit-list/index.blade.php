@php
$_class = "w-full grid grid-cols-3 *:border-r *:border-r-dark-shade *:border-l *:border-l-light-glare/10 *:first:border-l-0 *:last:border-r-0 *:first:pl-0 *:last:pr-0"

@endphp


<ul class="benefit-list bg-linear-90 from-dark via-dark-glare/30 to-dark {{ $_class }}">
    @if($is_preview)
        <InnerBlocks 
            class="contents"
            allowedBlocks="{{ json_encode(['acf/icon-textbox']) }}"
            template="{{ json_encode([['acf/icon-textbox'],['acf/icon-textbox'],['acf/icon-textbox']]) }}"
        />
    @else
        {!! $content ?? '' !!}
    @endif
</ul>