<section class="wrapper">
   <InnerBlocks
        class="bg-dark text-light-glare rounded-custom-right p-900 pb-0"
        allowedBlocks="{{ json_encode([
            'acf/benefit-header',
            'acf/benefit-list'
        ]) }}"
        template="{{ json_encode([
            ['acf/benefit-header'],
            ['acf/benefit-list']
        ]) }}"
        templateLock="all"
    />
</section>