<?php

/**
 * Template Name: برگه تمام عرض بدون المنتور
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

get_header();
get_template_part( 'template-parts/header/entry', 'header' );
?>

    <main class="container">
        <section class="article-single">
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'normal' );
			endwhile; // End of the loop.
			?>
        </section>
    </main>


<?php
get_footer();
