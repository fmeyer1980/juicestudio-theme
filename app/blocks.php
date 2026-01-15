<?php

namespace App;

function render_acf_block($block, $content = '', $is_preview = false, $post_id = 0, $wp_block = null) {
    // Fjern BÅDE 'acf/' OG 'acf-' prefix
    $slug = str_replace(['acf/', 'acf-'], '', $block['name']);
    
    // Tjek om view findes i undermapper
    $possible_views = [
        "blocks.atoms.{$slug}.index",
        "blocks.molecules.{$slug}.index",
        "blocks.organisms.{$slug}.index",
        "blocks.sections.{$slug}.index",
        "blocks.{$slug}.index",
    ];
    
    $view = null;
    foreach ($possible_views as $possible_view) {
        if (\Roots\view()->exists($possible_view)) {
            $view = $possible_view;
            break;
        }
    }

    // ACF 6.7+ Block object med API v3 support
    if ($wp_block) {
        // API v3 - brug WP_Block object
        $block_object = (object) array_merge((array) $block, [
            'wp_block' => $wp_block,
        ]);
    } else {
        // Fallback til ældre API
        $block_object = (object) $block;
    }

    // Wrapper attributes - brug get_block_wrapper_attributes() hvis tilgængelig
    if (function_exists('get_block_wrapper_attributes')) {
        $wrapper_attributes = get_block_wrapper_attributes([
            'class' => !empty($block['className']) ? $block['className'] : '',
        ]);
    } else {
        // Fallback til manuel opbygning
        $classes = ['wp-block-acf-' . str_replace('/', '-', $block['name'])];
        
        if (!empty($block['className'])) {
            $classes[] = $block['className'];
        }
        
        if (!empty($block['align'])) {
            $classes[] = 'align' . $block['align'];
        }

        $attributes = [
            'class="' . esc_attr(implode(' ', $classes)) . '"',
            'id="' . esc_attr($block['id']) . '"',
        ];

        if (!empty($block['anchor'])) {
            $attributes[] = 'id="' . esc_attr($block['anchor']) . '"';
        }

        $wrapper_attributes = implode(' ', $attributes);
    }
    
    $block_object->htmlAttributes = new class($wrapper_attributes) {
        private $attributes;
        
        public function __construct($attributes) {
            $this->attributes = $attributes;
        }
        
        public function __toString() {
            return $this->attributes;
        }
    };

    if ($view) {
        echo \Roots\view($view, [
            'block'       => $block_object,
            'content'     => $content,
            'is_preview'  => $is_preview,
            'post_id'     => $post_id,
            'wp_block'    => $wp_block,
        ]);
    } else {
        echo "<p>❌ Blade view ikke fundet: blocks.{$slug}.index</p>";
    }
}