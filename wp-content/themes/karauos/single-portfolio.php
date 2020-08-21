<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

get_header();
$sidebar_single_toggle = get_theme_mod( 'projects_single_sidebar_toggle', false );
$single_sidebar_position = get_theme_mod( 'projects_single_sidebar_position', 'left' );
?>
<main class="<?php if($sidebar_single_toggle == true){echo "sidebar-page flex align-content-between sidebar-$single_sidebar_position";} ?> container main-blog">
    <section class="portfolio-single main-content">
        <?php

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content/content', 'portfolio' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        endwhile; // End of the loop.
        ?>
    </section>
    <?php if($sidebar_single_toggle == true){get_sidebar('portfolio');} ?>
</main>


<?php get_footer(); ?>
