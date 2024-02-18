<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Roadside_Auto_Fix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-content-area'); ?>>
    
    <div class="gallery-area">
        <?php roadside_auto_fix_post_thumbnail(); ?>
    </div>
    
    <div class="service-content-area">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <h3 class="price-tag">Price: $<?= get_field('price') ?></h3>
        <h3>Service provider: <?= get_the_author() ?></h3>
        <div>
            <button class="raf-button raf-button-primary-solid">Take Service</button>
        </div>
        <?php
        the_content(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'roadside-auto-fix' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            )
        );
        
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'roadside-auto-fix' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .post-content-area -->
</article><!-- #post-<?php the_ID(); ?> -->
