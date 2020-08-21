<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

?>
<header class="header-2">
    <div class="main-header flex align-items-center justify-content-between">
        <div class="logo">
            <?php $header_logo = get_theme_mod('header_logo');
            $blog_url = get_bloginfo('url');
            $blog_name = get_bloginfo('name');
            if (get_theme_mod('toggle_logo_title') == true) { ?>
                <div class="flex align-items-center">
                    <a href="<?php echo $blog_url; ?>" title="<?php echo $blog_name; ?>" rel="home"><img
                                src="<?php echo esc_url($header_logo); ?>" alt="<?php echo $blog_name; ?>"></a>
                    <div class="logo-title">
                        <h1><a href="<?php echo $blog_url; ?>"><?php echo $blog_name; ?></a>
                        </h1>
                        <h2><?php bloginfo('description'); ?></h2>
                    </div>
                </div>
            <?php } else {
                if ($header_logo) :
                    ?>
                    <a href="<?php echo $blog_url; ?>" title="<?php echo $blog_name; ?>"
                       rel="home">
                        <img src="<?php echo esc_url($header_logo); ?>"
                             alt="<?php echo $blog_name; ?>">
                    </a>
                <?php else : ?>
                    <h1><a href="<?php echo $blog_url; ?>"><?php echo $blog_name; ?></a>
                    </h1>
                    <h2><?php bloginfo('description'); ?></h2>
                <?php endif;
            }
            ?>
        </div>
        <div class="header-info flex align-items-center">
            <?php $tell_field = get_theme_mod('tell_field');
            $email_field = get_theme_mod('email_field');
            if ($tell_field) : ?>
                <div class="item flex">
                    <i class="fas fa-phone fa-3x"></i>
                    <div>
                        <p><?php echo $email_field; ?></p>
                        <p><a href="tel:<?php echo $tell_field; ?>"><?php echo $tell_field; ?></a></p>
                    </div>
                </div>
            <?php endif; ?>
            <?php $address_field = get_theme_mod('address_field');
            $sub_address_field = get_theme_mod('sub_address_field');
            if ($address_field) : ?>
                <div class="item flex">
                    <i class="fas fa-home fa-3x"></i>
                    <div>
                        <p><?php echo $sub_address_field; ?></p>
                        <p><?php echo $address_field; ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="nav-header flex align-items-center justify-content-between">
        <?php social_media_icons(); ?>
        <nav>
            <span id="nav_btn"><i class="fas fa-bars"></i></span>
            <?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'main-menu menu flex', 'walker' => new TMT_Cat_Menu_Walker(), 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',)); ?>
        </nav>
        <div class="social_header text-center flex align-items-center">
            <?php
            $card_shop = get_theme_mod('card_shop', true);
            $login_icon = get_theme_mod('login_icon', true);
                ?>
                <div class="icons_log">
                    <?php if ($card_shop && woo) { ?>
                        <div class="shopping-cart icons">
                            <div class="icon-drop-down">
                                <i class="fas fa-shopping-cart"></i><?php $cartcount = WC()->cart->get_cart_contents_count();
                                if ($cartcount > 0) {
                                    echo '<span class="numm">' . $cartcount . '</span>';
                                } ?>
                            </div>
                            <div class="slide-toggle woocommerce widget_shopping_cart">
                                <div class="widget_shopping_cart_content"></div>
                            </div>
                        </div>
                    <?php }
                    if ($login_icon) { ?>
                        <div class="user-login icons">
                            <div class="icon-drop-down"><i class="far fa-user-circle"></i></div>
                            <div class='slide-toggle'>
                        <?php if (!is_user_logged_in()) {
                            wp_login_form();
                        } else {
                            echo "<div class='user flex align-items-center flex-wrap'>";
                            global $current_user;
                            wp_get_current_user();
                            $wp_login_url = get_dashboard_url();
                            $wp_logout_url = wp_logout_url();
                            echo get_avatar($user_ID, $size = '40') . __('Welcome', 'karauos') . ' ' . $current_user->display_name;
                            echo "<div class='wp-url'><a href='$wp_login_url'>" . __('Dashboard', 'karauos') . "</a>" . "<a href='$wp_logout_url'>" . __('Log Out', 'karauos') . "</a></div>";
                            echo "</div>";
                        } ?>
                        </div>
                        </div>
                    <?php } ?>
                    <div class="user-login icons">
                        <div class="icon-drop-down"><i class="fa fa-globe"></i></div>
                        <div class='slide-toggle language'>
                                <?php
                                $toggle_lang = get_theme_mod('toggle_lang', true);
                                if ($toggle_lang) {
                                if (pll) {
                                $show_flags = get_theme_mod('show_flags', true);
                                $show_flags_name = get_theme_mod('show_flags_name', true);
                                $dropdown = '';
                                if($show_flags){$new_show_flags = 1;} else {$new_show_flags = 0;}
                                if($show_flags_name){$new_show_flags_name = 1;} else {$new_show_flags_name = 0;}
                                echo "<ul class='flex flex-column flags align-content-center'>";
                                        pll_the_languages(array('show_flags' => $new_show_flags, 'show_names' => $new_show_flags_name));
                                        echo '</ul>';
                                } elseif (wpml) {
                                do_action('wpml_add_language_selector');
                                }
                                } ?>
                            </div>
                    </div>
                </div>
        </div>
    </div>
</header>
