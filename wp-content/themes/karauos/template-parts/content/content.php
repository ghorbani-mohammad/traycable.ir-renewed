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

$readmore_text = get_theme_mod( 'readmore_text', __( 'Read More', 'karauos' ) );

echo '<article id="post-'; echo the_ID() .'"'; echo post_class() . '>'
    . '<div class="article-item-blog shadow-img"';echo 'onclick="' . "location.href='"; echo the_permalink() . "'" . '">'
    . '<figure>'; karauos_post_thumbnail('large'); echo '</figure>'
    . '<i class="fas fa-link fa-2x"></i>'
    . '<div class="article-blog-bottom flex align-items-center">'
    . '<h2 class="title-post">'. get_the_title() .'</h2>'
    . '</div></div>' . '<div class="article-blog-text"><div class="meta-data flex">'
    . '<div class="date"><i class="far fa-calendar-alt" aria-hidden="true"></i>';echo the_time('j F Y') . '</div>'
    . '<div class="author"><i class="far fa-user-circle" aria-hidden="true"></i>';the_author_posts_link();echo '</div>'
    . '</div>'; excerpt_post('50');
    echo '<div class="read-more"><a href="';echo the_permalink() .'">'; echo $readmore_text .'<i class="fas fa-angle-left"></i></a></div>'
. '</div></article>';