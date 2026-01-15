<InnerBlocks 
    class="flow-y!"
    allowedBlocks="{{ json_encode([
        'acf/title',
        'acf/headline',
        'acf/text',
        'acf/button-group',
    ]) }}"
    template="{{ json_encode([
        ['acf/headline'],
        ['acf/text'],
    ]) }}"
/>