<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Roadside_Auto_Fix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
    <?php roadside_auto_fix_post_thumbnail(); ?>
    <div class="card-content">
        <h2><?= the_title() ?></h2>
        <p><?= the_excerpt() ?></p>
        <h3>$<?= get_field('price') ?></h3>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
