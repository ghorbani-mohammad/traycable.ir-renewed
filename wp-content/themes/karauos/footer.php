<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

$footer_widgets_columns = get_theme_mod( 'footer_widgets_columns', '4' );
$back_to_top_toggle = get_theme_mod( 'back_to_top_toggle', true);
$copyright_field = get_theme_mod( 'copyright_field' );

?>
<footer id="footer">
    <div class="shadow-bg">
        <div class="container footer-item columns-<?php echo $footer_widgets_columns ?> grid justify-content-between align-content-center">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-1')) : else : echo __( 'Please use the widgets to place the required tools.', 'karauos' ); endif; ?>
        </div>
	    <?php
	    if ($copyright_field) : ?>
        <div class="container copyright">
            <?php echo $copyright_field; ?>
        </div>
	    <?php endif; ?>
    </div>
</footer>
<?php
if($back_to_top_toggle) {echo '<a href="#top" id="top" title="Back to Top"><i class="fas fa-arrow-up"></i></a>';}
wp_footer();
$custom_js = get_theme_mod( 'custom_js' );
$before_closing_body = get_theme_mod( 'before_closing_body' );
if(!empty($custom_js)) { ?>
    <script type="text/javascript">
        <?php echo $custom_js; ?>
    </script>
<?php } if($before_closing_body){
    echo $before_closing_body;
} ?>
</body>
</html>