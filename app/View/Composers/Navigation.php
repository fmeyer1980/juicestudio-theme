<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Navigation extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
        'partials.primary-navigation',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'menuItems' => $this->menuItems(),
            'services' => $this->services(),
        ];
    }

    /**
     * Get menu items with processed metadata
     */
    public function menuItems()
    {
        $locations = get_nav_menu_locations();
        $menu_id = $locations['primary_navigation'] ?? null;
        $items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
        
        if (!$items) {
            return [];
        }
        
        $services = $this->services();
        $current_url = home_url($_SERVER['REQUEST_URI']);
        
        // Process each item and add metadata
        return collect($items)->map(function ($item) use ($services, $current_url) {
            $item->is_services = in_array('services-menu-item', $item->classes ?? []);
            $item->has_children = $item->is_services && !empty($services);
            
            // Compare URLs for current state
            $item->is_current = $item->url === $current_url || 
                                rtrim($item->url, '/') === rtrim($current_url, '/');
            
            $item->is_top_level = $item->menu_item_parent == 0;
            
            return $item;
        })->all();
    }

    /**
     * Get all services with current state
     */
    public function services()
    {
        $services = get_posts([
            'post_type' => 'service',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'publish',
        ]);
        
        $current_id = get_the_ID();
        
        // Add is_current to each service
        return collect($services)->map(function ($service) use ($current_id) {
            $service->is_current = $current_id === $service->ID;
            return $service;
        })->all();
    }
}