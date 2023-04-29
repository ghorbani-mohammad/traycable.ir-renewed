<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

$title = get_the_title();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="image-projects">
        <figure>
            <?php karauos_post_thumbnail('large'); ?>
        </figure>
        <h3 class="title-portfolio"><?php echo $title; ?></h3>
        <div class="back-item flex justify-content-between">
            <div class="back"><a href="<?php the_permalink(); ?>"><i class="fas fa-link"></i></a></div>
            <div class="back"><a href="<?php the_post_thumbnail_url( 'full' ); ?>" data-fancybox="gallery" data-caption="<?php echo $title; ?>"><i class="fas fa-search"></i></a></div>
        </div>
    </div>
</article><!-- #post-${ID} -->
