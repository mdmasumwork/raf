<?php

namespace raf;

class Blocks
{
    public static function boot()
    {
        add_action('acf/init', [get_called_class(), 'registerGutenbergBlocks']);
    }
    
    public static function registerGutenbergBlocks()
    {
        if (function_exists('acf_register_block_type')) {
            acf_register_block_type([
                'name' => 'front-cover',
                'title' => 'Front cover',
                'description' => 'Cover for the front page.',
                'render_template' => 'template-parts/blocks/front-cover.php',
                'enqueue_style' => get_template_directory_uri() . '/css/build/blocks/front-cover.css',
                'category' => 'roadside-auto-fix',
                'icon' => 'cover-image',
                'keywords' => ['front-cover'],
                'align' => 'full',
                'supports' => [
                    'align' => false
                ]
            ]);
    
            acf_register_block_type([
                'name' => 'category-display',
                'title' => 'Category display',
                'description' => 'Category display block for showing the categories in any page',
                'render_template' => 'template-parts/blocks/category-display.php',
                'enqueue_style' => get_template_directory_uri() . '/css/build/blocks/category-display.css',
                'category' => 'roadside-auto-fix',
                'icon' => 'admin-page',
                'keywords' => ['category display'],
                'align' => 'full',
                'supports' => [
                    'align' => false
                ]
            ]);
        }
    }
}