<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

?>
<header>
    <div class="top-header">
        <div class="container">
            <div class="top-head-item flex align-items-center justify-content-between">
                <?php
                $welcome_field = get_theme_mod('welcome_field');
                $toggle_welcome_icon = get_theme_mod('toggle_welcome_icon');
                if ($welcome_field) : echo '<span class="flex align-items-center welcome-text">';
                    if ($toggle_welcome_icon == true) {
                        echo '<i class="fas fa-bolt"></i>';
                    }
                    echo $welcome_field;
                    if ($toggle_welcome_icon == true) {
                        echo '<i class="fas fa-bolt"></i>';
                    }
                    echo '</span>'; endif; ?>
                <?php
                $toggle_lang = get_theme_mod('toggle_lang', true);
                if ($toggle_lang) {
                    if (pll) {
                        $poly_lang_dropdown = get_theme_mod('poly_lang_dropdown', false);
                        $show_flags = get_theme_mod('show_flags', true);
                        $show_flags_name = get_theme_mod('show_flags_name', true);
                        $dropdown = '';
                        if($poly_lang_dropdown){$dropdown = 'dropdown';}
                        if($show_flags){$new_show_flags = 1;} else {$new_show_flags = 0;}
                        if($show_flags_name){$new_show_flags_name = 1;} else {$new_show_flags_name = 0;}
                        echo "<div class='language $dropdown'><ul class='flex flags align-content-center'>";
                        pll_the_languages(array('show_flags' => $new_show_flags, 'show_names' => $new_show_flags_name));
                        echo '</ul></div>';
                    } elseif (wpml) {
                        do_action('wpml_add_language_selector');
                    }
                }
                ?>
                <div class="social_header text-center flex align-items-center">
                    <?php
                    social_media_icons();
                    $card_shop = get_theme_mod('card_shop', true);
                    $login_icon = get_theme_mod('login_icon', true);
                    if ($login_icon || $card_shop) {
                    ?>
                    <div class="icons_log" style="display:none;">
                        <?php if ($card_shop && woo) { ?>
                            <div class="shopping-cart icons">
                                <div class="icon-drop-down">
                                    <i class="fas fa-shopping-cart"></i><?php $cartcount = WC()->cart->get_cart_contents_count();
                                    if ($cartcount > 0) {
                                        echo '<span class="numm">' . $cartcount . '</span>';
                                    } ?></div>
                                <?php
                                echo "<div class='slide-toggle woocommerce widget_shopping_cart'>"
                                    . '<div class="widget_shopping_cart_content"></div>'
                                    . "</div>";
                                ?>
                            </div>
                        <?php }
                        if ($login_icon) {
                            echo '<div class="user-login icons">'
                                . '<div class="icon-drop-down"><i class="far fa-user-circle"></i></div>'
                                . "<div class='slide-toggle'>";
                            if (!is_user_logged_in()) {
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
                            }
                            echo "</div>"
                                . '</div>';

                        }
                        echo '</div>';
                        }
                        echo '</div>'
                            . '</div>'
                            . '</div>'
                            . '</div>';
                        ?>
                        <div class="middle-header color-white">
                            <div class="container">
                                <div class="mid-head-item flex align-items-center justify-content-between">
                                    <div class="logo">
                                        <?php $header_logo = get_theme_mod('header_logo');
                                        $blog_url = get_bloginfo('url');
                                        $blog_name = get_bloginfo('name');
                                        if (get_theme_mod('toggle_logo_title') == true) { ?>
                                            <div class="flex align-items-center">
                                                <a href="<?php echo $blog_url; ?>" title="<?php echo $blog_name; ?>" rel="home"><img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo $blog_name; ?>"></a>
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
                                    <div class="call-us flex">
                                        <?php $tell_field = get_theme_mod('tell_field');
                                        $email_field = get_theme_mod('email_field');
                                        if ($tell_field) : ?>
                                            <div class="call-num flex">
                                                <span class="margin0-20"><i class="fas fa-phone fa-3x"></i></span>
                                                <div class="number">
                                                    <h5>
                                                        <a href="tel:<?php echo esc_html($tell_field); ?>"><?php echo esc_html($tell_field); ?></a>
                                                    </h5>
                                                    <h6><a class="site"
                                                           href="mailto:<?php echo esc_html($email_field); ?>"><?php echo esc_html($email_field); ?></a>
                                                    </h6>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php $address_field = get_theme_mod('address_field');
                                        $sub_address_field = get_theme_mod('sub_address_field');
                                        if ($address_field) : ?>
                                            <div class="address flex">
                                                <span class="home margin0-20"><i class="fas fa-home fa-3x"></i></span>
                                                <div class="address-item">
                                                    <h5><?php echo $address_field; ?></h5>
                                                    <h6><?php echo $sub_address_field; ?></h6>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-header container flex align-items-center justify-content-between background-yellow">
                            <nav>
                                <span id="nav_btn"><i class="fas fa-bars"></i></span>
                                <?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'main-menu menu flex', 'walker' => new TMT_Cat_Menu_Walker(), 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',)); ?>
                            </nav>
                            <form class="search flex" method="get" action="<?php echo $blog_url; ?>">
                                <input class="background-blue color-white" name="s" type="text" placeholder="<?php echo __('Search...', 'karauos'); ?>">
                                <button class="radius30" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
</header>
