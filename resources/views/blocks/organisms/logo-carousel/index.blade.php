
<div class="scroller {{ $is_preview ?: block_padding($block) }}">
    <ul class="scroller__inner">
        @if($is_preview)
        <InnerBlocks 
            class="grow flex items-center gap-gutter justify-between"
            allowedBlocks="{{ json_encode([
                'acf/logo'
            ]) }}"
            template="{{ json_encode([
                ['acf/logo'],
                ['acf/logo'],
                ['acf/logo'],
                ['acf/logo'],
            ]) }}"
            templateLock="false"
        />
        @else
            {!! $content ?? '' !!}
        @endif
    </ul>


</div>

