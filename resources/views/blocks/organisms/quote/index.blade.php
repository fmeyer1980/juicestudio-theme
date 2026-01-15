@php
    $text = get_field('text');
    $relationship = get_field('author');
    $author = $relationship[0] ?? null;
@endphp

<div class="wrapper {{ $is_preview ?: block_bg_color($block) . ' ' . block_text_color($block) . ' ' . block_padding($block) }}">
    <div class="flex gap-lg items-start @container">
        <div>
            @svg('quote', 'h-[11cqh] w-auto mt-100 mb-400')
            <b>{{ $author->post_title }}</b>
            <p class="flex items-center gap-[.2em] text-current/70"><span>{{ $author->postion }}, </span><span>{{ get_bloginfo('name') }}</span></p>
        </div>
        <p class="text-600 font-light max-w-[50ch] text-current/80"  {!! acf_inline_text_editing_attrs('text') !!}>{{ $text }}</p>
    </div>
</div>