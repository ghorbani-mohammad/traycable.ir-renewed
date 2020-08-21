<?php

require wp_directory .'/inc/elements/post-grid.php';
require wp_directory .'/inc/elements/slider.php';
require wp_directory .'/inc/elements/info-box.php';
require wp_directory .'/inc/elements/heading.php';
require wp_directory .'/inc/elements/heading-advanced.php';
require wp_directory .'/inc/elements/post-carousel.php';
require wp_directory .'/inc/elements/header.php';
require wp_directory .'/inc/elements/gallery.php';
require wp_directory .'/inc/elements/flip-box.php';
require wp_directory .'/inc/elements/info-box-advanced.php';
require wp_directory .'/inc/elements/member.php';
require wp_directory .'/inc/elements/accordion.php';
require wp_directory .'/inc/elements/list.php';
require wp_directory .'/inc/elements/svg.php';
require wp_directory .'/inc/elements/video.php';
if(woo) {
    require wp_directory .'/inc/elements/product.php';
    require wp_directory .'/inc/elements/product-classic.php';
}
if (class_exists( 'WPCF7_ContactForm' ) ) {
    require wp_directory .'/inc/elements/cf-styler.php';
}
if ( class_exists( 'GFCommon' ) ) {
    require wp_directory . '/inc/elements/gravity-forms.php';
}