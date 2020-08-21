<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.4
 */

get_header();

    echo '<main>';
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content/content', 'page' );
        endwhile; // End of the loop.
    echo '</main>';

get_footer();
