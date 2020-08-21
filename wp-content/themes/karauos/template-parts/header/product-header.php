<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

$style = get_theme_mod( 'header_style', 'style1' );
?>
<div class="bg-header-product flex align-items-center<?php if($style == 'style2') {echo ' shop-bg-header-2';} ?>">
    <div class="shop-shadow"><div class="container flex justify-content-between align-items-center">
        <h2><?php echo seo_title(); ?></h2>
        <?php
        $args = array(
            'delimiter' => '<i class="fas fa-long-arrow-alt-left"></i>',
        );
        ?>
        <?php woocommerce_breadcrumb($args); ?>
    </div></div>
</div>
