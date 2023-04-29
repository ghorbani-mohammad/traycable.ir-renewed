<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

$style = get_theme_mod( 'header_style', 'style1' );
$style_class = "";
if($style == 'style2') {$style_class = ' bg-header-2';}
$page_title_tag = get_theme_mod( 'page_title_tag','h1' );

// echo "<div class='bg-header-pages$style_class'>"
//     ."<div class='caption-page flex justify-content-center align-items-center flex-column'>"
//     . "<$page_title_tag>" . seo_title() . "</$page_title_tag>"
//     . mj_wp_breadcrumb()
//     . "</div>"
//     . "</div>";