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
$featured_image = get_theme_mod( 'projects_featured_image', false );
$author_box = get_theme_mod( 'projects_author_box', false );
$tags = get_theme_mod( 'projects_tags', true );
$category = get_theme_mod( 'projects_category', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-content">
        <?php if($featured_image) { ?>
            <div class="thumbnail">
                <?php karauos_post_thumbnail('large'); ?>
            </div>
        <?php } echo "<div class='content'>"; the_content(); echo "</div>"; ?>
    </div>
    <?php if($author_box) { ?>
        <div class="single-item2">
            <div class="admin-post flex align-items-center">
                <figure><?php echo get_avatar( get_the_author_meta( 'ID' ), 56 ); ?></figure>
                <div class="post-info">
                    <h6><?php the_author_posts_link(); ?></h6>
                    <span><?php the_time('j F Y'); ?></span>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="single-tags flex justify-content-between align-content-center flex-wrap">
        <?php if($category) { ?>
            <?php echo get_the_term_list( $post->ID, 'portfolio_cat', '<div class="single-tag1 flex flex-wrap align-items-center"><a><i class="fas fa-folder-open"></i></a>', ' ', '</div>' ); ?>
        <?php } ?>
        <?php if($tags) { ?>
            <?php echo get_the_term_list( $post->ID, 'portfolio_tags', '<div class="single-tag2 flex flex-wrap align-items-center"><a><i class="fas fa-tags"></i></a>', ' ', '</div>' ); ?>
        <?php } ?>
    </div>
</article><!-- #post-${ID} -->
