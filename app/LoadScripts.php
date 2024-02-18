<?php

namespace raf;

class LoadScripts
{
    public static function boot() {
        add_action('wp_enqueue_scripts', [get_called_class(), 'load_raf_Scripts']);
        add_action('enqueue_block_editor_assets', [get_called_class(), 'loadEditorScripts']);
    }
    
    public static function load_raf_Scripts() {
        wp_enqueue_style('dashicons');
        wp_enqueue_style( 'roadside-auto-fix-style', get_stylesheet_directory_uri() . '/css/build/main.css', array(), _S_VERSION );
        wp_style_add_data( 'roadside-auto-fix-style', 'rtl', 'replace' );
        
        wp_enqueue_script( 'roadside-auto-fix-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_script( 'roadside-auto-fix-search-bar', get_template_directory_uri() . '/js/search-bar.js', array('jquery'), _S_VERSION, true );
    }
    
    public static function loadEditorScripts() {
        add_theme_support('editor_styles');
        wp_enqueue_style( 'roadside-auto-fix-editor-style', get_stylesheet_directory_uri() . '/css/build/main.css', array(), _S_VERSION );
    }
}