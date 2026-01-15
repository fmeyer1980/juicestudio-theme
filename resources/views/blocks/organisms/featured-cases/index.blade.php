<section class="pl-container border-l-gutter border-transparent space-y-gutter {{ $is_preview ?: block_padding($block) }}">
    <InnerBlocks 
        class="flow-y flow-space-1em prose-p:text-current/70 prose-p:max-w-[55ch]"
        allowedBlocks="{{ json_encode([
            'acf/headline',
            'acf/text'
        ]) }}"
        template="{{ json_encode([
            ['acf/headline'],
            ['acf/text']
        ]) }}"
        templateLock="false"
    />
    <div class="relative @container">
        <ul class="carousel">
            @foreach(get_field('cases') as $item)
                @include('components.case-card', ['item' => $item])
            @endforeach
        </ul>
    </div>
</section>