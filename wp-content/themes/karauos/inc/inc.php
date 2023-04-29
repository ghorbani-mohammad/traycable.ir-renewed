<?php
require wp_directory .'/inc/template-tags.php';
require wp_directory .'/inc/mj-wp-breadcrumb.php';
require wp_directory .'/inc/post-type.php';
require wp_directory .'/inc/taxonomy.php';
require wp_directory .'/inc/customizer.php';
require wp_directory . '/inc/customizer-enqueue.php';
require wp_directory .'/inc/MegaMenu/mega-menu.php';
require wp_directory .'/inc/tgmpa.php';
require wp_directory .'/inc/customizer/customizer-polylang.php';
if ( class_exists( 'WP_Customize_Control' ) ) {
    require  wp_directory . '/inc/customizer/class-customizer-range-value-control.php';
    require  wp_directory . '/inc/customizer/class-customizer-toggle-control.php';
    require  wp_directory . '/inc/customizer/class-customizer-alpha-color-picker-control.php';
    require  wp_directory . '/inc/customizer/class-customizer-text-editor-control.php';
}
require wp_directory . '/inc/widgets/widget-ads.php';
require wp_directory . '/inc/widgets/widget-posts.php';
require wp_directory . '/inc/widgets/widget-contact.php';
require wp_directory . '/inc/widgets/widget-time.php';
require wp_directory . '/inc/widgets/widgets-category.php';
require wp_directory . '/inc/widgets/widgets-search.php';