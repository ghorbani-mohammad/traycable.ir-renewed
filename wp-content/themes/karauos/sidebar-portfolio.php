<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

?>

<aside class="sidebar sidebar-portfolio widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar Widget', 'karauos' ); ?>">
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('project-1')) : else : echo __( 'Please use the widgets to place the required tools.', 'karauos' ); endif; ?>
</aside>