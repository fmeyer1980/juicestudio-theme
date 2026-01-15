{{--
  Title: Columns Block
  Description: Flexible columns layout
  Category: layout
  Icon: columns
  Keywords: columns layout grid
--}}


@php
$layout = '2-columns';

$templates = [
    '2-columns' => [
        ['acf/col'],
        ['acf/col'],
    ],
    '1-columns' => [
        ['acf/col'],
    ],
];

$template = $templates[$layout] ?? $templates['2-columns'];
@endphp

<div class="wrapper layout-{{ $layout }} block_padding($block)">
    <InnerBlocks
        class="grid md:grid-cols-[.7fr_1fr] md:divide-x divide-dark-shade/10 gap-y-[1em] gap-x-xl prose-headings:pr-900 prose-p:text-current/70"
        template='{!! json_encode($template) !!}'
        templateLock="false"
    />
</div>
