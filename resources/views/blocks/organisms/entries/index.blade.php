@php
    $section_heading = get_field('section_title') ?? 'Section overskrift';
    $class = 'grid md:grid-cols-[1fr_.7fr] rounded-custom-right overflow-clip @container';
@endphp

<section class="wrapper" aria-label="{{ $section_heading }}">
    <h2 class="sr-only">{{ $section_heading }}</h2>
    <ul class=" {{ $is_preview ? '' : $class }}">
        @if($is_preview)
        <InnerBlocks 
            class="*:min-h-[clamp(25rem,37cqi,45rem)] {{ $class }}"
            allowedBlocks="{{ json_encode([
                'acf/entry-card'
            ]) }}"
            template="{{ json_encode([
                ['acf/entry-card'],
                ['acf/entry-card']
            ]) }}"
        />
        @else
            {!! $content ?? '' !!}
        @endif
    </ul>
</section>