<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */
get_header();
?>
<main class="container text-center">
	<div class="error-404 not-found">
		<header class="page-header">
			<h1 class="title404">404</h1>
		</header><!-- .page-header -->
		<div class="page-content404">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'karauos' ); ?></p>
			<div class="search404">
				<?php get_search_form(); ?>
			</div>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->
</main>
<?php get_footer(); ?>