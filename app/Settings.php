<?php

namespace raf;

class Settings
{
    public static function boot()
    {
        add_action('init', [get_called_class(), 'initForSettings']);
        add_action('pre_get_posts', [get_called_class(), 'posts_for_current_author']);
        add_filter('ajax_query_attachments_args', [get_called_class(), 'wpb_show_current_user_attachments']);
    }
    
    public static function initForSettings()
    {
        add_role( 'shop', 'Shop', get_role( 'author' )->capabilities );
    
        register_post_type( 'service',
            // CPT Options
            array(
                'labels' => array(
                    'name' => 'Services',
                    'singular_name' => 'Service'
                ),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'services')
            )
        );
    }
    
    public static function posts_for_current_author($query)
    {
        global $pagenow;
    
        if( 'edit.php' != $pagenow || !$query->is_admin )
            return $query;
    
        if( !current_user_can( 'manage_options' ) ) {
            global $user_ID;
            $query->set('author', $user_ID );
        }
        return $query;
    }
    
    public static function wpb_show_current_user_attachments($query)
    {
        $user_id = get_current_user_id();
        if ( $user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts') ) {
            $query['author'] = $user_id;
        }
        return $query;
    }
}