<?php

namespace raf;

class CustomQuery
{
    public static function boot() {
        add_filter('pre_get_posts', [get_called_class(), 'rafEditSearchPageQuery']);
    }
    
    public static function rafEditSearchPageQuery($query) {
        // check if the user is requesting an admin page
        // or current query is not the main query
        if (is_admin() || ! $query->is_main_query()) {
            return;
        }
    
        // Return if it is any other page rather than the search result page
        if (!is_search()) {
            return;
        }
        
        $meta_query = [];
    
        $city = get_query_var('city');
        if (!empty($city)) {
            $meta_query[] = array(
                'key' => 'city',
                'value' => $city,
                'compare' => 'LIKE',
            );
        }
    
        $state = get_query_var('state');
        if (!empty($state)) {
            $meta_query[] = array(
                'key'     => 'state',
                'value'   => $state,
                'compare' => 'LIKE',
            );
        }
    
        if (count($meta_query) > 1) {
            $meta_query['relation'] = 'AND';
        }
        
//        echo "<pre>";
//        print_r($meta_query);
//        echo "</pre>";
    
        $query->set('post_type', 'service');
        $query->set('meta_query', $meta_query);
    }
}