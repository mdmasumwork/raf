<?php

namespace raf\posts;

class Service {
    public static function boot() {
        add_action('init', [get_called_class(), 'registerServicePostType']);
        add_action('save_post_service', [get_called_class(), 'savePostMetaAtServiceUpdate'], 99, 2);
    }
    
    public static function savePostMetaAtServiceUpdate($service_id, $service)
    {
        $city = get_the_author_meta('city', $service->post_author);
        $state = get_the_author_meta('state', $service->post_author);
        
        update_post_meta($service_id, 'city', $city, false);
        update_post_meta($service_id, 'state', $state, false);
    }
    
    public static function registerServicePostType()
    {
        register_post_type( 'service',
            // CPT Options
            array(
                'labels' => array(
                    'name' => 'Services',
                    'singular_name' => 'Service'
                ),
                'supports' => array('title', 'editor', 'thumbnail', 'comments'),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'services')
            )
        );
    }
}