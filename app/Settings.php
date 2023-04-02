<?php

namespace raf;

class Settings
{
    public static function boot()
    {
        add_action('init', [get_called_class(), 'initForSettings']);
        add_action('pre_get_posts', [get_called_class(), 'posts_for_current_author']);
        add_filter('ajax_query_attachments_args', [get_called_class(), 'wpb_show_current_user_attachments']);
        add_filter('excerpt_length', [get_called_class(), 'raf_custom_excerpt_length'], 999);
        add_filter('excerpt_more', [get_called_class(), 'custom_excerpt_more'], 21);
        add_filter('manage_service_posts_columns', [get_called_class(), 'set_custom_service_columns']);
        add_filter('query_vars', [get_called_class(), 'rafRegisterQueryVars']);
    }
    
    public static function set_custom_service_columns($columns) {
        $columns['author'] = "Author";
        
        return $columns;
    }
    
    public static function custom_excerpt_more($more) {
        global $post;
        return ' ... <a href="' . get_permalink($post->ID) . '">Read more</a>';
    }
    
    public static function raf_custom_excerpt_length($length) {
        return 30;
    }
    
    public static function initForSettings()
    {
        add_role( 'shop', 'Shop', get_role( 'author' )->capabilities );
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
    }
    
    public static function wpb_show_current_user_attachments($query)
    {
        $user_id = get_current_user_id();
        if ( $user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts') ) {
            $query['author'] = $user_id;
        }
        return $query;
    }
    
    public static function rafRegisterQueryVars($vars) {
        $vars[] = 'city';
        $vars[] = 'state';
        return $vars;
    }
}