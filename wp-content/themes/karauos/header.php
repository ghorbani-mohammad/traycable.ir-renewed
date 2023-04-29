<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, height=device-height">
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php
    $meta_description = get_theme_mod( 'meta_description' );
    $custom_css = get_theme_mod( 'custom_css' );
    $before_closing_head = get_theme_mod( 'before_closing_head' );
    if(!empty($meta_description)) { ?>
        <meta name="description" content="<?php echo $meta_description; ?>"/>
    <?php } ?>
    <?php wp_head(); ?>
    <?php if(!empty($custom_css)) { ?>
        <style type="text/css">
            <?php echo $custom_css; ?>
        </style>
    <?php } if($before_closing_head){
        echo $before_closing_head;
    }
    echo '</head>';
    ?>
<body <?php body_class(); ?>>
<?php
$style = $before_closing_head = get_theme_mod( 'header_style', 'style1' );
switch ($style) {
    case 'style1' :
        get_template_part( 'template-parts/header/header', '1' );
        break;
    case 'style2' :
        get_template_part( 'template-parts/header/header', '2' );
        break;
}

if (is_page()) {} elseif (woo && is_woocommerce()) {
    get_template_part( 'template-parts/header/product', 'header' );
}
else {
    get_template_part( 'template-parts/header/entry', 'header' );
}