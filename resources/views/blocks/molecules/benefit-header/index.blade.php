<InnerBlocks 
    class="flex items-center gap-lg pb-800 border-b border-light-glare/10 prose-headings:min-w-[30cqi] prose-p:text-current/70 @container"
    allowedBlocks="{{ json_encode([
        'acf/headline',
        'acf/text'
    ]) }}"
    template="{{ json_encode([
        ['acf/headline'],
        ['acf/text']
    ]) }}"
    templateLock="true"
/>