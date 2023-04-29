<?php
/**
 * Karauos: Customizer
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function customizer_social_media_array() {
    $social_sites = array(
        'twitter',
        'facebook',
        'youtube',
        'linkedin',
        'rss',
        'telegram',
        'instagram',
        'whatsapp',
        'aparat'
    );

    return $social_sites;
}

function social_media_icons() {

    $social_sites = customizer_social_media_array();

    foreach ( $social_sites as $social_site ) {
        if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }

    if ( ! empty( $active_sites ) ) {
        echo "<ul class='menu-social flex'>";
        foreach ( $active_sites as $active_site ) { ?>
        <li class="<?php echo $active_site; ?>">
            <a href="<?php echo get_theme_mod( $active_site ); ?>" target="_blank" title="<?php echo $active_site; ?>">
                <?php if ( $active_site == "telegram" ) {
                    echo '<i class="fas fa-paper-plane"></i>';
                } elseif ( $active_site == "aparat" ) { ?>
                    <svg><use xlink:href="<?php echo wp_directory_uri; ?>/images/icons.svg#aparat"></use></svg><?php
                }
                elseif ( $active_site == "linkedin" ) {
                    echo '<i class="fab fa-linkedin-in"></i>';
                }
                elseif ( $active_site == "facebook" ) {
                    echo '<i class="fab fa-facebook-f"></i>';
                }
                elseif ( $active_site == "rss" ) {
                    echo '<i class="fas fa-rss"></i>';
                }
                else { ?>
                <i class="fab fa-<?php echo $active_site; ?>"></i><?php
                } ?>
            </a>
            </li><?php
        }
        echo "</ul>";
    }
}

function custom_fonts_array() {
    $custom_fonts = array(
        "Shahab"    => __( "Shahab Font", 'karauos' ),
        "Behdad"    => __( "Behdad Font", 'karauos' ),
        "Nika"      => __( "Nika Font", 'karauos' ),
        "Farbod"    => __( "Farid Font", 'karauos' ),
        "Noon"      => __( "Noon Font", 'karauos' ),
        "Ganjnameh" => __( "Ganjnameh Font", 'karauos' ),
        "Yekan"     => __( "Yekan Font", 'karauos' ),
        "Nazanin"   => __( "Nazanin Font", 'karauos' ),
        "Vazir"     => __( "Vazir Font", 'karauos' ),
        "Iransans2"     => __( "Iransans Font", 'karauos' )
    );

    return $custom_fonts;
}

function karauos_customize_css() {
    //---- Main
    $one_color = get_theme_mod( 'light_color', '#eead16');
    $two_color = get_theme_mod( 'dark_color', '#051934');
    $custom_headings_font = get_theme_mod( 'custom_headings_font', 'Vazir');
    $custom_body_font = get_theme_mod( 'custom_body_font', 'Vazir');

    // Header
    $icon_color_header = get_theme_mod( 'icon_color_header', '#fff' );
    $hover_icon_color_header = get_theme_mod( 'hover_icon_color_header', 'var(--yellow)' );
    $bg_dropdown_header_color = get_theme_mod( 'bg_dropdown_header_color', '#fff' );
    $text_dropdown_header_color = get_theme_mod( 'text_dropdown_header_color', '#000' );
    $width_logo = get_theme_mod( 'width_logo', '56' );
    $font_size_logo_title = get_theme_mod( 'font_size_logo_title', '48' );
    $color_logo_title = get_theme_mod( 'color_logo_title', '#fff' );
    $font_size_logo_description = get_theme_mod( 'font_size_logo_description', '16' );
    $color_logo_description = get_theme_mod( 'color_logo_description', '#747171' );
    $Space_title_description = get_theme_mod( 'Space_title_description', '10' );
    $header_spacing_top = get_theme_mod( 'header_spacing_top', '40' );
    $header_spacing_bottom = get_theme_mod( 'header_spacing_bottom', '60' );
    $top_header_bg_color = get_theme_mod( 'top_header_bg_color', '#211f1f' );
    $top_header_text_color = get_theme_mod( 'top_header_text_color', '#fff' );
    $header_image = get_theme_mod( 'header_image' );
    $background_archive_header = get_theme_mod( 'background_archive_header', 'rgba(0,0,0,.7)' );
    $single_header_image = get_theme_mod( 'single_header_image' );
    $background_single_header = get_theme_mod( 'background_single_header', 'rgba(0,0,0,.7)' );
    $remove_single_header_image = get_theme_mod( 'remove_single_header_image' );
    $remove_archive_header_image = get_theme_mod( 'remove_archive_header_image' );
    $a_img = '';
    if($remove_archive_header_image == true){$a_img = 'display:none';}
    $s_img = '';
    if($remove_single_header_image == true){$s_img = 'display:none';}
    $w_img = '';
    if(woo) {
        $woo_header_image = get_theme_mod( 'woo_header_image' );
        $remove_woo_header_image = get_theme_mod( 'remove_woo_header_image' );
        if($remove_woo_header_image == true){$w_img = 'display:none';}
    }
    $middle_header_bg_color = get_theme_mod( 'middle_header_bg_color', '#051934' );
    $middle_header_icon_color = get_theme_mod( 'middle_header_icon_color', '#eead16' );
    $middle_header_first_field_color = get_theme_mod( 'middle_header_first_field_color', '#fff' );
    $middle_header_second_field_color = get_theme_mod( 'middle_header_second_field_color', '#747171' );
    $menu_bg_color = get_theme_mod( 'menu_bg_color', '#eead16' );
    $menu_text_color = get_theme_mod( 'menu_text_color', '#494525' );
    $menu_hover_text_color = get_theme_mod( 'menu_hover_text_color', '#fff' );
    $menu_hover_bg_text_color = get_theme_mod( 'menu_hover_bg_text_color', '#051934' );
    $search_text_color = get_theme_mod( 'search_text_color', '#fff' );
    $search_bg_text_color = get_theme_mod( 'search_bg_text_color', '#051934' );
    $menu_border_radius = get_theme_mod( 'menu_border_radius', '30' );
    $sub_menu_border_radius = get_theme_mod( 'sub_menu_border_radius', '15' );
    $responsive_menu_icon_toggle = get_theme_mod( 'responsive_menu_icon_toggle', '#eead16' );
    $responsive_menu_bg_icon_toggle = get_theme_mod( 'responsive_menu_bg_icon_toggle', '#051934' );
    $sub_menu_bg_color = get_theme_mod( 'sub_menu_bg_color', '#eead16' );
    $sub_menu_text_color = get_theme_mod( 'sub_menu_text_color', '#494525' );
    $mega_menu_title_color = get_theme_mod( 'mega_menu_title_color', '#051934' );
    $mega_menu_hover_link_color = get_theme_mod( 'mega_menu_hover_link_color', '#051934' );

    // Blog
    $blog_image_height = get_theme_mod( 'blog_image_height','370' );
    $color_blog_background_hover = get_theme_mod( 'color_blog_background_hover','var(--yellow)' );
    $color_blog_one = get_theme_mod( 'color_blog_one','#FFF' );
    $color_blog_two = get_theme_mod( 'color_blog_two','#051934' );
    $color_blog_three = get_theme_mod( 'color_blog_three','#051934' );
    $readmore_text_color = get_theme_mod( 'readmore_text_color','#051934' );
    $readmore_bg_color = get_theme_mod( 'readmore_bg_color','#eead16' );
    $readmore_hover_text_color = get_theme_mod( 'readmore_hover_text_color','#fff' );
    $readmore_hover_bg_color = get_theme_mod( 'readmore_hover_bg_color','#051934' );
    $navigation_bg_color_current = get_theme_mod( 'navigation_bg_color_current','#eead16' );
    $navigation_text_color_current = get_theme_mod( 'navigation_text_color_current','#fff' );
    $navigation_bg_color = get_theme_mod( 'navigation_bg_color','#fff' );
    $navigation_text_color = get_theme_mod( 'navigation_text_color','#000' );

    // Single
    $image_fit = get_theme_mod( 'image_fit',false );
    $featured_image_height = get_theme_mod( 'featured_image_height','400' );
    $single_content_text = get_theme_mod( 'single_content_text','#282828' );
    $single_content_link = get_theme_mod( 'single_content_link','#eead16' );
    $content_alignment = get_theme_mod( 'content_alignment');
    $content_line_height = get_theme_mod( 'content_line_height','28');

    //SideBar
    $sidebar_bg_color = get_theme_mod( 'sidebar_bg_color', '#211f1f' );
    $widgets_border_radius = get_theme_mod( 'widgets_border_radius', '10' );
    $sidebar_text_color = get_theme_mod( 'sidebar_text_color', '#fff' );
    $widgets_space = get_theme_mod( 'widgets_space', '20' );

    // Project
    $projects_image_height = get_theme_mod( 'projects_image_height', '350' );
    $projects_color_background_hover = get_theme_mod( 'projects_color_background_hover', '#051934' );
    $projects_icon_color = get_theme_mod( 'projects_icon_color', '#051934' );
    $projects_icon_bg_color = get_theme_mod( 'projects_icon_bg_color', '#fff' );
    $projects_hover_icon_color = get_theme_mod( 'projects_hover_icon_color', '#fff' );
    $projects_hover_icon_bg_color = get_theme_mod( 'projects_hover_icon_bg_color', '#eead16' );

    // Single
    $projects_image_fit = get_theme_mod( 'projects_image_fit',false );
    $projects_featured_image_height = get_theme_mod( 'projects_featured_image_height','400' );
    $projects_single_content_text = get_theme_mod( 'projects_single_content_text','#282828' );
    $projects_single_content_link = get_theme_mod( 'projects_single_content_link','#eead16' );
    $projects_content_alignment = get_theme_mod( 'projects_content_alignment');
    $projects_content_line_height = get_theme_mod( 'projects_content_line_height','28');

    //SideBar
    $projects_sidebar_bg_color = get_theme_mod( 'projects_sidebar_bg_color', '#211f1f' );
    $projects_widgets_border_radius = get_theme_mod( 'projects_widgets_border_radius', '10' );
    $projects_sidebar_text_color = get_theme_mod( 'projects_sidebar_text_color', '#fff' );
    $projects_widgets_space = get_theme_mod( 'projects_widgets_space', '20' );


    //Footer
    $footer_image = get_theme_mod( 'footer_image' );
    $footer_over_bg_color = get_theme_mod( 'footer_over_bg_color', 'rgba(0,0,0,.8)' );
    $back_to_top_bg_color = get_theme_mod( 'back_to_top_bg_color', '#eead16' );
    $back_to_top_border_radius = get_theme_mod( 'back_to_top_border_radius', '2' );
    $back_to_top_icon_color = get_theme_mod( 'back_to_top_icon_color', '#fff' );
    $back_to_top_bg_hover_color = get_theme_mod( 'back_to_top_bg_hover_color', '#051934' );
    $back_to_top_position = get_theme_mod( 'back_to_top_position' );
    $footer_space_top = get_theme_mod( 'footer_space_top', '50' );
    $footer_space_bottom = get_theme_mod( 'footer_space_bottom', '20' );
    ?>
    <style type="text/css">
        <?php
        // Main
        echo ":root {--yellow: $one_color;--darkBlue: $two_color}"
        . "h1, h2, h3, h4, h5, h6 {font-family: $custom_headings_font}"
        . "body, button, input, select, textarea {font-family: $custom_body_font;}"

        // Header
        . ".logo img {width: {$width_logo}%;}"
        . ".logo h1 a {font-size: {$font_size_logo_title}px;color:$color_logo_title;}"
        . ".logo h2 {font-size: {$font_size_logo_description}px;color:$color_logo_description;}"
        . ".logo h2 {margin-top:{$Space_title_description}px;}";
        if($header_image || $background_archive_header) {
            echo ".archive:not(.woocommerce) .bg-header-pages {background: url($header_image) no-repeat center center/cover;$a_img}"
            . ".archive .bg-header-pages .caption-page {background: $background_archive_header;}";
        }
        if($single_header_image || $background_single_header) {
            echo ".single:not(.woocommerce) .bg-header-pages {background: url($single_header_image) no-repeat center center/cover;$s_img}"
            . ".single .bg-header-pages .caption-page {background: $background_single_header;}";
        }
        if(woo && $woo_header_image) {
            echo ".woocommerce-page .bg-header-product {background: url($woo_header_image) no-repeat center center/cover;$w_img}";
        }
        echo ".mid-head-item {padding:{$header_spacing_top}px 0 {$header_spacing_bottom}px 0;}"
        . ".middle-header,.main-header {background-color: $middle_header_bg_color}"
        . ".top-header,.flags.dropdown:hover {background-color: $top_header_bg_color}"
        .".top-header ,.top-header a {color: $top_header_text_color}"
        . ".call-us i, .main-header .item i {color:$middle_header_icon_color}"
        . ".call-us h5, .call-us h5 a,.main-header .item div p:first-child {color:$middle_header_first_field_color}"
        . ".call-us h6, .call-us h6 a,.main-header .item div p:last-child {color:$middle_header_second_field_color}"
        . ".nav-header {background: $menu_bg_color;}"
        . ".nav-header .sub-menu li a,.nav-header .mega-menu > .sub-menu > li,.header-2 .nav-header ul li.current-menu-item a {background-color: $sub_menu_bg_color;color:$sub_menu_text_color}"
        . ".nav-header .mega-menu .sub-menu .menu-item-has-children > a {color:$mega_menu_title_color}"
        . ".nav-header .mega-menu li a:hover span {color: $mega_menu_hover_link_color}"
        . "@media (max-width: 767px) {.main-menu {background: $menu_bg_color;}}"
        . ".nav-header li a,.nav-header .sub-menu a {color:$menu_text_color}"
        . ".nav-header li a:hover,.nav-header li.current-menu-item a,.nav-header .sub-menu li a:hover {color:$menu_hover_text_color;background-color:$menu_hover_bg_text_color}"
        . ".search input {color:$search_text_color;background-color:$search_bg_text_color}"
        . ".search button {color:$search_text_color}"
        . ".nav-header li a,.search input,.nav-header {border-radius:{$menu_border_radius}px;}"
        . ".nav-header .sub-menu li:first-child > a {border-top-left-radius: {$sub_menu_border_radius}px;border-top-right-radius: {$sub_menu_border_radius}px}"
        . ".nav-header .sub-menu li:last-child > a {border-bottom-left-radius: {$sub_menu_border_radius}px;border-bottom-right-radius: {$sub_menu_border_radius}px}"
        . ".nav-header .mega-menu > .sub-menu > li:first-child {border-top-left-radius: {$sub_menu_border_radius}px;border-bottom-left-radius: {$sub_menu_border_radius}px}"
        . ".nav-header .mega-menu > .sub-menu > li:last-child {border-top-right-radius: {$sub_menu_border_radius}px;border-bottom-right-radius: {$sub_menu_border_radius}px}"
        . "body.rtl .nav-header .mega-menu > .sub-menu > li:first-child {border-top-left-radius:0;border-bottom-left-radius:0;border-top-right-radius: {$sub_menu_border_radius}px;border-bottom-right-radius: {$sub_menu_border_radius}px}"
        . "body.rtl .nav-header .mega-menu > .sub-menu > li:last-child {border-top-right-radius:0;border-bottom-right-radius:0;border-top-left-radius: {$sub_menu_border_radius}px;border-bottom-left-radius: {$sub_menu_border_radius}px}"
        . ".nav-header .mega-menu > .sub-menu:before {border-radius: {$sub_menu_border_radius}px}"
        . "#nav_btn {color:$responsive_menu_icon_toggle;background-color:$responsive_menu_bg_icon_toggle}"
        . ".icons_log .icon-drop-down i {color: $icon_color_header}"
        . ".icons_log .icon-drop-down:hover i {color: $hover_icon_color_header}"
        . ".slide-toggle {background-color: $bg_dropdown_header_color}"
        . ".slide-toggle, .slide-toggle a,.nav-header .slide-toggle a,.nav-header .slide-toggle a:hover {color: $text_dropdown_header_color}"
        . ".woocommerce-mini-cart__buttons.buttons a {border: 1px solid $text_dropdown_header_color;}"
        . ".woocommerce-mini-cart__buttons.buttons a:hover {background: $text_dropdown_header_color;color: $bg_dropdown_header_color}"

        // Blog
        . ".main-blog .article-item-blog {height: {$blog_image_height}px;}"
        . ".main-blog .article-item-blog:hover figure {background-color: $color_blog_background_hover;}"
        . ".main-blog .article-item-blog figure,.main-blog .article-item-blog i {background-color: $color_blog_one}"
        . ".main-blog .article-blog-bottom {border-color: $color_blog_one}"
        . ".main-blog .article-item-blog i:hover {color: $color_blog_one}"
        . ".main-blog .article-item-blog:hover i:hover {background-color: $color_blog_two}"
        . ".main-blog .article-item-blog:hover figure,.main-blog .article-blog-bottom {border-color: $color_blog_two}"
        . ".main-blog .article-blog-bottom .title-post,.main-blog .article-item-blog i {color: $color_blog_two}"
        . ".main-blog .meta-data,.main-blog .article-blog-text .date ,.main-blog .meta-data i,.main-blog .meta-data a,.main-blog .article-blog-text {color: $color_blog_three}"
        . ".main-blog .read-more a {color: $readmore_text_color;background-color: $readmore_bg_color}"
        . ".main-blog .read-more a:hover {color: $readmore_hover_text_color;background-color: $readmore_hover_bg_color}"
        . ".pagination .page-numbers {background-color: $navigation_bg_color;border-color: $navigation_bg_color_current;color: $navigation_text_color}"
        . ".pagination .current, .pagination > b, .pagination a:hover, .page-numbers a:hover, .pagination .next:hover, .pagination .prev:hover {background-color: $navigation_bg_color_current;border-color: $navigation_bg_color_current;color: $navigation_text_color_current}";

// if (TMT_Guard_Karauos::is_activated() === false && !is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {echo "\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x22\x70\x6F\x73\x69\x74\x69\x6F\x6E\x3A\x20\x66\x69\x78\x65\x64\x3B\x77\x69\x64\x74\x68\x3A\x20\x31\x30\x30\x25\x3B\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x30\x30\x25\x3B\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x3A\x20\x72\x67\x62\x61\x28\x30\x2C\x30\x2C\x30\x2C\x2E\x38\x29\x3B\x7A\x2D\x69\x6E\x64\x65\x78\x3A\x20\x39\x39\x39\x39\x39\x39\x3B\x63\x6F\x6C\x6F\x72\x3A\x20\x23\x46\x46\x46\x3B\x64\x69\x73\x70\x6C\x61\x79\x3A\x20\x66\x6C\x65\x78\x3B\x61\x6C\x69\x67\x6E\x2D\x69\x74\x65\x6D\x73\x3A\x20\x63\x65\x6E\x74\x65\x72\x3B\x6A\x75\x73\x74\x69\x66\x79\x2D\x63\x6F\x6E\x74\x65\x6E\x74\x3A\x20\x63\x65\x6E\x74\x65\x72\x3B\x22\x3E" . "\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x22\x77\x69\x64\x74\x68\x3A\x20\x35\x30\x25\x3B\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x32\x38\x70\x78\x3B\x74\x65\x78\x74\x2D\x61\x6C\x69\x67\x6E\x3A\x20\x63\x65\x6E\x74\x65\x72\x22\x3E" . "\x3C\x69\x6D\x67\x20\x73\x72\x63\x3D\x22" . get_template_directory_uri();echo "\x2F\x69\x6D\x61\x67\x65\x73\x2F\x6C\x6F\x67\x6F\x2D\x7A\x68\x61\x6B\x65\x74\x2E\x73\x76\x67\x22\x20\x77\x69\x64\x74\x68\x3D\x22\x22\x20\x73\x74\x79\x6C\x65\x3D\x22\x77\x69\x64\x74\x68\x3A\x32\x30\x30\x70\x78\x3B\x6D\x61\x72\x67\x69\x6E\x3A\x20\x30\x20\x61\x75\x74\x6F\x20\x35\x30\x70\x78\x20\x61\x75\x74\x6F\x3B\x22\x20\x61\x6C\x74\x3D\x22\x22\x3E" . "\x3C\x70\x3E\xD9\x84\xD8\xB7\xD9\x81\xD8\xA7\x20\xDA\xA9\xD9\x84\xDB\x8C\xD8\xAF\x20\xD9\x84\xD8\xA7\xDB\x8C\xD8\xB3\xD9\x86\xD8\xB3\x20\xD8\xAE\xD9\x88\xD8\xAF\x20\xD8\xB1\xD8\xA7\x20\xD9\x88\xD8\xA7\xD8\xB1\xD8\xAF\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x2E\x20\xD8\xAC\xD9\x87\xD8\xAA\x20\xD8\xAF\xD8\xB1\xDB\x8C\xD8\xA7\xD9\x81\xD8\xAA\x20\xDA\xA9\xD9\x84\xDB\x8C\xD8\xAF\x20\xD9\x84\xD8\xA7\xDB\x8C\xD8\xB3\xD9\x86\xD8\xB3\x20\xD9\x85\xD8\xAD\xD8\xB5\xD9\x88\xD9\x84\x20\xD8\xA8\xD9\x87\x20\xD9\xBE\xD9\x86\xD9\x84\x20\xDA\xA9\xD8\xA7\xD8\xB1\xD8\xA8\xD8\xB1\xDB\x8C\x20\xD8\xAE\xD9\x88\xD8\xAF\x20\xD8\xAF\xD8\xB1\x20\xDA\x98\xD8\xA7\xDA\xA9\xD8\xAA\x20\xD9\x82\xD8\xB3\xD9\x85\xD8\xAA\x20\xD8\xAF\xD8\xA7\xD9\x86\xD9\x84\xD9\x88\xD8\xAF\xD9\x87\xD8\xA7\x20\xD9\x85\xD8\xB1\xD8\xA7\xD8\xAC\xD8\xB9\xD9\x87\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x20\xD9\x88\x20\xD8\xAF\xD8\xB1\x20\x3C\x61\x20\x73\x74\x79\x6C\x65\x3D\x22\x63\x6F\x6C\x6F\x72\x3A\x20\x72\x65\x64\x22" . "\x68\x72\x65\x66\x3D\x22" . admin_url();echo "\x74\x68\x65\x6D\x65\x73\x2E\x70\x68\x70\x3F\x70\x61\x67\x65\x3D\x74\x6D\x74\x5F\x67\x75\x61\x72\x64\x5F\x72\x65\x67\x69\x73\x74\x65\x72\x22\x3E\xD8\xA7\xDB\x8C\xD9\x86\x20\xD9\x84\xDB\x8C\xD9\x86\xDA\xA9\x3C\x2F\x61\x3E\x20\x20\xD8\xAB\xD8\xA8\xD8\xAA\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x2E\x3C\x2F\x70\x3E" . "\x3C\x2F\x64\x69\x76\x3E\x0A\x20\x20\x20\x20\x3C\x2F\x64\x69\x76\x3E";}


        // Single
        if ($image_fit){echo ".article-single .single-content .thumbnail img {object-fit: cover;}";}
        echo ".article-single .single-content .thumbnail img {height: {$featured_image_height}px;}"
        . ".article-single .content {color: $single_content_text;line-height: {$content_line_height}px;}"
        . ".article-single .content a {color: $single_content_link;}";
        if($content_alignment) { echo ".article-single .content {text-align: $content_alignment;}";}

        // SideBar
        echo  ".widget {background-color:$sidebar_bg_color;border-radius: {$widgets_border_radius}px;}"
        . ".widget,.widget a,.widget .widget-title {color:$sidebar_text_color;}"
        . ".sidebar .widget {margin-bottom:{$widgets_space}px;}";

        // Project
        echo  ".best-projects .image-projects {height: {$projects_image_height}px;background-color: $projects_color_background_hover}"
        .  ".best-projects .image-projects:hover {border-color:$projects_color_background_hover}"
        .  ".best-projects .back a {color:$projects_icon_color;background-color:$projects_icon_bg_color}"
        .  ".best-projects .back a:hover {color:$projects_hover_icon_color;background-color:$projects_hover_icon_bg_color}"
        . ".best-projects .pagination .page-numbers {background-color: $navigation_bg_color;border-color: $navigation_bg_color_current;color: $navigation_text_color}"
        . ".best-projects .pagination .current,.best-projects .pagination > b,.best-projects .pagination a:hover,.best-projects .page-numbers a:hover,.best-projects .pagination .next:hover,.best-projects .pagination .prev:hover {background-color: $navigation_bg_color_current;border-color: $navigation_bg_color_current;color: $navigation_text_color_current}";

        // Single Project
        if ($projects_image_fit){echo ".portfolio-single .thumbnail img {object-fit: cover;}";}
        echo ".portfolio-single .thumbnail img {height: {$projects_featured_image_height}px;}"
        . ".portfolio-single .content {color: $projects_single_content_text;line-height: {$projects_content_line_height}px;}"
        . ".portfolio-single .content a {color: $projects_single_content_link;}";
        if($projects_content_alignment) { echo ".portfolio-single .content {text-align: $projects_content_alignment;}";}

        // SideBar Project
        echo  ".sidebar-portfolio .widget {background-color:$projects_sidebar_bg_color;border-radius: {$projects_widgets_border_radius}px;}"
        . ".sidebar-portfolio .widget,.sidebar-portfolio .widget a,.sidebar-portfolio .widget .widget-title {color:$projects_sidebar_text_color;}"
        . ".sidebar-portfolio .sidebar .widget {margin-bottom:{$projects_widgets_space}px;}";

        // Footer
        if ($footer_image) :
            echo "footer#footer {background: url($footer_image) no-repeat center center/cover;color: white;}";
        endif;
        echo ".shadow-bg {background-color: $footer_over_bg_color}"
        . "#top {background-color:$back_to_top_bg_color;border-radius: {$back_to_top_border_radius}px;color:$back_to_top_icon_color;}"
        . "#top:hover {background-color:$back_to_top_bg_hover_color}"
        . ".shadow-bg {padding-top: {$footer_space_top}px;}"
        . "footer .widget {margin-bottom: {$footer_space_bottom}px;}";
        if($back_to_top_position == 'left') {echo "#top {right: auto;left: 25px;}";}
        ?>

        <?php if ( woo ) {
            // Woocommerce
            $bg_color_price = get_theme_mod( 'bg_color_price', '#eead16');
            $color_price = get_theme_mod( 'color_price', '#051934');
            $bg_color_price_special_sale = get_theme_mod( 'bg_color_price_special_sale', '#051934');
            $color_price_special_sale = get_theme_mod( 'color_price_special_sale', '#eead16');
            $products_border_color = get_theme_mod( 'products_border_color', '#eead16');
            $products_title_color = get_theme_mod( 'products_title_color', '#051934');
            $single_product_title_size = get_theme_mod( 'single_product_title_size', '36');
            $products_hover_title_color = get_theme_mod( 'products_hover_title_color', '#eead16');
            $background_color_add_to_cart_button = get_theme_mod( 'background_color_add_to_cart_button', '#eead16');
            $color_add_to_cart_button = get_theme_mod( 'color_add_to_cart_button', '#051934');
            $background_added_to_cart_color = get_theme_mod( 'background_added_to_cart_color', '#eead16');
            $text_added_to_cart_color = get_theme_mod( 'text_added_to_cart_color', '#051934');
            $single_product_title = get_theme_mod( 'single_product_title', '#000');
            $single_product_price = get_theme_mod( 'single_product_price', '#eead16');
            $single_product_add_to_cart_button_background = get_theme_mod( 'single_product_add_to_cart_button_background', '#eead16');
            $single_product_add_to_cart_button_text = get_theme_mod( 'single_product_add_to_cart_button_text', '#051934');
            $single_product_add_to_cart_hover_button_background = get_theme_mod( 'single_product_add_to_cart_hover_button_background', '#051934');
            $single_product_add_to_cart_hover_button_text = get_theme_mod( 'single_product_add_to_cart_hover_button_text', '#fff');
            $sort_by_color = get_theme_mod( 'sort_by_color', '#282828');
            $sort_by_hover_bg_color = get_theme_mod( 'sort_by_hover_bg_color', '#eead16');
            $sort_by_hover_color = get_theme_mod( 'sort_by_hover_color', '#FFF');

            echo ".woocommerce ul.products li.product .price {background-color:$bg_color_price;color:$color_price;}"
            . ".woocommerce ul.products li.product .onsale, .woocommerce span.onsale {background-color:$bg_color_price_special_sale;color:$color_price_special_sale;}"
            . ".woocommerce ul.products li.product, .woocommerce-page ul.products li.product {border-color:$products_border_color;}"
            . ".product .woocommerce-loop-product__title {color:$products_title_color}"
            . ".product:hover .woocommerce-loop-product__title {color:$products_hover_title_color}"
            . ".woocommerce ul.products li.product .button {background-color:$background_color_add_to_cart_button;color:$color_add_to_cart_button;}"
            . ".woocommerce ul.products li.product a.added_to_cart {background-color:$background_added_to_cart_color;color:$text_added_to_cart_color;}"
            . ".woocommerce div.product .product_title {color:$single_product_title;font-size: {$single_product_title_size}px}"
            . ".woocommerce div.product p.price, .woocommerce div.product span.price {color:$single_product_price}"
            . ".woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {background-color:$single_product_add_to_cart_button_background;color:$single_product_add_to_cart_button_text;}"
            . ".woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {background-color: $single_product_add_to_cart_hover_button_background;color:$single_product_add_to_cart_hover_button_text}"
            . ".woocommerce .sort-by a {color:$sort_by_color;}"
            . ".woocommerce .sort-by a.active,.woocommerce .sort-by a:hover {color:$sort_by_hover_color;background-color:$sort_by_hover_bg_color;}";
        } ?>
    </style>
    <?php
}
add_action( 'wp_head', 'karauos_customize_css' );

if ( woo ) {
    function karauos_customize_js() {
        ?>
        <script type="text/javascript">
            jQuery( document ).ready( function( $ ) {
                wp.customize.section( 'woocommerce_archive_style', function( section ) {
                    section.expanded.bind( function( isExpanded ) {
                        if ( isExpanded ) {
                            wp.customize.previewer.previewUrl.set( '<?php echo esc_js( wc_get_page_permalink( 'shop' ) ); ?>' );
                        }
                    } );
                } );
            } );
        </script>
        <?php
    }
    add_action( 'customize_controls_print_scripts', 'karauos_customize_js', 30 );
}

add_filter('login_headerurl','ag_login_link');
function ag_login_link() {return home_url();}

add_action( 'login_enqueue_scripts', 'ag_login_logo' );
function ag_login_logo() { ?>
    <style type="text/css">
        #login {width: 364px !important;}
        #login h1 {background: transparent;padding: 20px;}
        <?php
        $login_logo = get_theme_mod( 'login_logo' );
        if ($login_logo) { ?>
        #login h1 a {background: url(<?php echo esc_url($login_logo) ?>)  no-repeat center center/contain;height:100px;margin: 0 auto;width:auto;max-width: 100%}
        <?php } ?>
        <?php $login_background_color_submit = get_theme_mod( 'login_background_color_submit' ); $login_color_submit = get_theme_mod( 'login_color_submit' );
        if (!empty($login_background_color_submit || $login_color_submit)) { ?>
        .wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {background:<?php echo $login_background_color_submit; ?>;color:<?php echo $login_color_submit; ?>;border: 0;border-radius: 0;box-shadow: none;font-weight: 700;height: 30px;line-height: 28px;padding: 1px 12px 2px;text-shadow: none;text-transform: uppercase;}
        <?php }
        $login_background_color_submit_hover = get_theme_mod( 'login_background_color_submit_hover' ); $login_color_submit_hover = get_theme_mod( 'login_color_submit_hover' );
        if (!empty($login_background_color_submit_hover || $login_color_submit_hover)) { ?>
        .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {background:<?php echo $login_background_color_submit_hover; ?> !important;color:<?php echo $login_color_submit_hover; ?> !important;}
        <?php }
        $login_image_bg = get_theme_mod( 'login_image_bg' );
        $login_color_bg = get_theme_mod( 'login_color_bg' );
        if (!empty($login_image_bg)) { ?>
        body {background: url(<?php echo esc_url($login_image_bg); ?>)  no-repeat center center/cover !important;width: 100%;height: 100%}
        <?php }
        elseif (!empty($login_color_bg)) { ?>
        body {background: <?php echo $login_color_bg; ?> !important;}
        <?php }
        $login_color_link = get_theme_mod( 'login_color_link' );
        if (!empty($login_color_link)) { ?>
        #nav a ,#backtoblog a {color: <?php echo $login_color_link; ?> !important;}
        <?php } ?>
    </style>
<?php }