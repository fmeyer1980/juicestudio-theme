<?php

if (!function_exists('placeholder')) {
    function placeholder($value, $default = '') {
        return empty($value) ? $default : $value;
    }
}

if (! function_exists('block_bg_color')) {
    /**
     * Return Tailwind bg class for a block
     */
    function block_bg_color($block): string
    {
        return match($block->backgroundColor ?? null) {
            'dark-glare' => 'bg-dark-glare',
            'dark' => 'bg-dark',
            'dark-shade' => 'bg-dark-shade',
            'primary-glare' => 'bg-primary-glare',
            'primary' => 'bg-primary',
            'primary-shade' => 'bg-primary-shade',
            'secondary-glare' => 'bg-secondary-glare',
            'secondary' => 'bg-secondary',
            'secondary-shade' => 'bg-secondary-shade',
            'light-glare' => 'bg-light-glare',
            'light' => 'bg-light',
            'light-shade' => 'bg-light-shade',
            default => 'bg-dark-shade',
        };
    }
}

if (! function_exists('block_text_color')) {
    /**
     * Return Tailwind bg class for a block
     */
    function block_text_color($block): string
    {
        return match($block->textColor ?? null) {
            'dark-glare' => 'text-dark-glare',
            'dark' => 'text-dark',
            'dark-shade' => 'text-dark-shade',
            'primary-glare' => 'text-primary-glare',
            'primary' => 'text-primary',
            'primary-shade' => 'text-primary-shade',
            'secondary-glare' => 'text-secondary-glare',
            'secondary' => 'text-secondary',
            'secondary-shade' => 'text-secondary-shade',
            'light-glare' => 'text-light-glare',
            'light' => 'text-light',
            'light-shade' => 'text-light-shade',
            default => 'text-dark-shade',
        };
    }
}



if (! function_exists('block_padding')) {
    /**
     * Return Tailwind padding-top and padding-bottom classes for a block
     */
    function block_padding($block): string
    {
        // Hent raw padding top og bottom
        $padding_top_raw = $block->style['spacing']['padding']['top'] ?? null;
        $padding_bottom_raw = $block->style['spacing']['padding']['bottom'] ?? null;

        // Fjern Gutenberg prefix
        $padding_top_slug = $padding_top_raw
            ? str_replace('var:preset|spacing|', '', $padding_top_raw)
            : null;

        $padding_bottom_slug = $padding_bottom_raw
            ? str_replace('var:preset|spacing|', '', $padding_bottom_raw)
            : null;

        // Map slug til Tailwind-klasse
        $padding_top_class = match($padding_top_slug) {
            '10' => 'pt-600',
            '20' => 'pt-800',
            '30' => 'pt-900',
            '40' => 'pt-lg', // eksempel
            '50' => 'pt-xl',
            default => '',
        };

        $padding_bottom_class = match($padding_bottom_slug) {
            '10' => 'pb-600',
            '20' => 'pb-800',
            '30' => 'pb-900',
            '40' => 'pb-lg', // eksempel
            '50' => 'pb-xl',
            default => '',
        };

        // Returnér begge klasser samlet
        return "{$padding_top_class} {$padding_bottom_class}";
    }
}

// Helper til at finde blocks inde i blocks
function find_block_recursive($blocks, $block_name) {
    foreach ($blocks as $block) {
        if ($block['blockName'] === $block_name) {
            return $block;
        }
        
        if (!empty($block['innerBlocks'])) {
            $found = find_block_recursive($block['innerBlocks'], $block_name);
            if ($found) {
                return $found;
            }
        }
    }
    return null;
}


