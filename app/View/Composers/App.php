<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    public function with()
    {
        $services_args = [
            'post_type' => 'service',
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ];

        return [
            'site_name' => $this->siteName(),
            'email' => get_field('email', 'option'),
            'phone' => get_field('phone', 'option'),
            'services_list' => get_posts($services_args),
        ];
    }

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }
}