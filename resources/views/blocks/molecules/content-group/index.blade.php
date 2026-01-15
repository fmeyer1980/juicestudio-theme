<InnerBlocks 
    class="content relative z-20 flow-y flow-space-600 max-w-max prose-headings:max-w-[20ch] prose-p:max-w-[55ch] [&_p:not(.title)]:opacity-70"
    allowedBlocks="{{ json_encode([
        'acf/headline',
        'acf/text',
        'acf/button-group',
        'acf/simple-form'
    ]) }}"
    template="{{ json_encode([
        ['acf/headline'],
        ['acf/text']
    ]) }}"
/>