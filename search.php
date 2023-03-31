<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Roadside_Auto_Fix
 */

get_header();
?>
    <main id="primary" class="site-main align_full">
        <div class="search-bar-area">
            <div class="search-bar-area-content">
                <div class="state-select">
                    <select>
                        <option value="IA">Iowa</option>
                        <option value="NY">New York</option>
                        <option value="CA">California</option>
                    </select>
                </div>
                <div class="city-select">
                    <select>
                        <option value="IA">Iowa</option>
                        <option value="NY">New York</option>
                        <option value="CA">California</option>
                    </select>
                </div>
                <div class="search-button">
                    <button class="raf-button raf-button-secondary-solid">Search</button>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="filter-area"></div>
            <div class="content-area">
                <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', 'search' );
                    endwhile; // End of the loop.
                ?>
            </div>
        </div>

    </main><!-- #main -->
<?php
get_footer();