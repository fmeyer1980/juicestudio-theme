<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

require_once get_template_directory() . '/app/blocks.php';

/*
|--------------------------------------------------------------------------
| Custom Functions
|--------------------------------------------------------------------------
*/

/**
 * Allow SVG uploads
 */
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

/**
 * Inline SVG med currentColor support
 * 
 * @param string $url SVG URL fra ACF eller andet
 * @param string $classes CSS classes til SVG elementet
 * @return string|null Inline SVG eller null hvis ikke fundet
 */
if (!function_exists('inline_svg')) {
    function inline_svg($url, $classes = '') {
        if (empty($url) || !str_ends_with($url, '.svg')) {
            return null;
        }
        
        $upload_dir = wp_upload_dir();
        $svg_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $url);
        
        if (!file_exists($svg_path)) {
            return null;
        }
        
        $svg_content = file_get_contents($svg_path);
        
        // Erstat fill og stroke hex-farver med currentColor
        $svg_content = preg_replace('/fill="[#][0-9a-fA-F]{3,6}"/', 'fill="currentColor"', $svg_content);
        $svg_content = preg_replace('/stroke="[#][0-9a-fA-F]{3,6}"/', 'stroke="currentColor"', $svg_content);
        
        // Håndter fill/stroke i style-attributter
        $svg_content = preg_replace('/fill:\s*[#][0-9a-fA-F]{3,6}/', 'fill:currentColor', $svg_content);
        $svg_content = preg_replace('/stroke:\s*[#][0-9a-fA-F]{3,6}/', 'stroke:currentColor', $svg_content);
        
        // Håndter rgb/rgba farver
        $svg_content = preg_replace('/fill="rgba?\([^)]+\)"/', 'fill="currentColor"', $svg_content);
        $svg_content = preg_replace('/stroke="rgba?\([^)]+\)"/', 'stroke="currentColor"', $svg_content);
        
        if (!empty($classes)) {
            $svg_content = preg_replace(
                '/<svg/', 
                '<svg class="' . esc_attr($classes) . '"', 
                $svg_content, 
                1
            );
        }
        
        return $svg_content;
    }
}

// register_post_type('employee', [
//     'label' => 'Employees',
//     'public' => true,
//     'supports' => ['title', 'thumbnail'], // ingen 'editor'
// ]);

add_filter('use_block_editor_for_post_type', function ($use_block_editor, $post_type) {
    if ($post_type === 'employee') {
        return false;
    }
    return $use_block_editor;
}, 10, 2);

add_filter(
	'wp_speculation_rules_configuration',
	function ( $config ) {
		if ( is_array( $config ) ) {
			$config['mode']      = 'prerender';
			$config['eagerness'] = 'moderate';
		}
		return $config;
	}
);