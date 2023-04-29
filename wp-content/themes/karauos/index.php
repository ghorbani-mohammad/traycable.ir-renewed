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

$sidebar_blog_toggle = get_theme_mod( 'sidebar_blog_toggle', true );
$sidebar_position = get_theme_mod( 'sidebar_position', 'left' );
?>
<main class="<?php if($sidebar_blog_toggle == true){echo "sidebar-page flex justify-content-between sidebar-$sidebar_position";} ?> container main-blog">
	<section class="article-blog main-content">
		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {the_post(); get_template_part( 'template-parts/content/content' );}

			// Previous/next page navigation.
            karauos_the_posts_navigation(3);

		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );
		}
		?>
	</section>
    <?php if($sidebar_blog_toggle == true){get_sidebar();} ?>
</main>


<?php get_footer(); ?>
