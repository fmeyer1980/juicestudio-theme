<?php

namespace App;

/**
 * Register Block Patterns
 */
add_action('init', function () {
    // Registrer pattern kategori
    register_block_pattern_category('sage-patterns', [
        'label' => __('Sage Patterns', 'sage')
    ]);

    // Find alle .blade.php filer i patterns mappen
    $pattern_files = glob(get_template_directory() . '/resources/views/blocks/templates/*.blade.php');

    foreach ($pattern_files as $file) {
        $file_data = get_file_data($file, [
            'title'       => 'Title',
            'slug'        => 'Slug',
            'description' => 'Description',
            'categories'  => 'Categories',
        ]);

        if (empty($file_data['title']) || empty($file_data['slug'])) {
            continue;
        }

        // Læs fil indhold og skip PHP header
        $content = file_get_contents($file);
        $content = preg_replace('/^<\?php.*?\?>\s*/s', '', $content);

        register_block_pattern($file_data['slug'], [
            'title'       => $file_data['title'],
            'description' => $file_data['description'] ?? '',
            'content'     => $content,
            'categories'  => array_map('trim', explode(',', $file_data['categories'] ?? 'featured')),
        ]);
    }
});