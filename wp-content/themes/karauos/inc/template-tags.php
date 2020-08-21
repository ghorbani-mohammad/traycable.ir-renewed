<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

function seo_title() {
    if(is_singular()){
        $title = get_the_title();
    } elseif (is_category()) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $tax = get_taxonomy( get_queried_object()->taxonomy );
        $title = sprintf( $tax->labels->singular_name, single_term_title( '', false ) );
    } else {
        $title = wp_title( '' );
    }
    return $title;
}

if ( ! function_exists( 'karauos_the_posts_navigation' ) ) :
    /**
     * Documentation for function.
     */
    function karauos_the_posts_navigation($number) {
        the_posts_pagination(
            array(
                'mid_size' => $number,
                'prev_text' => ('<i class="fas fa-angle-double-left"></i>'),
                'next_text' => ('<i class="fas fa-angle-double-right"></i>'),
            )
        );
    }
endif;

if ( ! function_exists( 'karauos_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function karauos_post_thumbnail($size) {
        if (has_post_thumbnail()) :
            the_post_thumbnail($size, array('alt' => '' . get_the_title() . '', 'title' => '' . get_the_title() . ''));
        else :
            echo '<img src="' . wp_directory_uri . '/images/thumbnail.jpg" alt="' . get_the_title() . '" />';
        endif;
    }
endif;

if ( ! function_exists( 'excerpt_post' ) ) :
    function excerpt_post($number) {
        preg_match("/^([^.!?\s]*[\.!?\s]+){0,$number}/", strip_tags(get_the_content()), $abstract);echo $abstract[0] . '...';
    }
endif;

function add_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'karauos',
        [
            'title' => __( 'Karauos', 'karauos' ),
            'icon' => 'fa fa-plug',
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


/**
 * Get All POst Types
 * @return array
 */
function themento_get_post_types(){

    $themento_cpts = get_post_types( array( 'public'   => true, 'show_in_nav_menus' => true ) );
    $themento_exclude_cpts = array( 'elementor_library', 'attachment', 'product' );

    foreach ( $themento_exclude_cpts as $exclude_cpt ) {
        unset($themento_cpts[$exclude_cpt]);
    }

    $post_types = array_merge($themento_cpts);
    return $post_types;
}

function themento_post_type_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->term_id ] = $term->name;
        }
    }
    if( !empty($options) )
    return $options;
}

/**
 * Get Post Categories
 * @return array
 */
function themento_post_type_portfolio_cat(){
    $terms = get_terms( array(
        'taxonomy' => 'portfolio_cat',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->term_id ] = $term->name;
        }
    }
    if( !empty($options) )
        return $options;
}

class KarauosCustomElement
{

    private static $instance = null;

    public static function get_instance()
    {
        if (!self::$instance)
            self::$instance = new self;
        return self::$instance;
    }

    public function init()
    {
        add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));
    }

    public function widgets_registered()
    {

        // We check if the Elementor plugin has been installed / activated.
        if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {

            // We look for any theme overrides for this custom Elementor element.
            // If no theme overrides are found we use the default one in this plugin.

            $widget_file = wp_directory . '/inc/elementor.php';
            $template_file = locate_template($widget_file);
            if (!$template_file || !is_readable($template_file)) {
                $template_file = wp_directory . '/inc/elementor.php';
            }
            if ($template_file && is_readable($template_file)) {
                require_once $template_file;
            }
        }
    }
}

KarauosCustomElement::get_instance()->init();

function Karauos_add_cpt_support() {

    //if exists, assign to $cpt_support var
    $cpt_support = get_option( 'elementor_cpt_support' );

    //check if option DOESN'T exist in db
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio' ]; //create array of our default supported post types
        update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
    }

    //if it DOES exist, but portfolio is NOT defined
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio'; //append to array
        update_option( 'elementor_cpt_support', $cpt_support ); //update database
    }

    //otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action( 'after_switch_theme', 'Karauos_add_cpt_support' );

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
}

class TMT_Guard_Karauos
{

    private $name;

    private $slug;

    private $parent_slug;

    private $text_domain;

    private static $option_name;

    private $product_token;

    // public static $api_url = 'http://guard.zhaket.com/api/';


    private static $instance = null;

    public function __construct(array $settings)
    {

        $defaults = [
            'name' => __('Karauos', 'karauos'),
            'slug' => 'tmt_guard_register',
            'parent_slug' => 'themes.php', // Read this: https://developer.wordpress.org/reference/functions/add_submenu_page/#parameters
            'text_domain' => 'karauos',
            'product_token' => 'a02b8b76-ec9e-4890-931d-54494569d858', // Get it from here: https://zhaket.com/dashboard/licenses/
            'option_name' => 'tmt_option_karauos_guard'
        ];
        foreach ($settings as $key => $setting) {
            if (array_key_exists($key, $defaults) && !empty($setting)) {
                $defaults[$key] = $setting;
            }
        }
        $this->name = $defaults['name'];
        $this->slug = $defaults['slug'];
        $this->parent_slug = $defaults['parent_slug'];
        $this->text_domain = $defaults['text_domain'];
        self::$option_name = $defaults['option_name'];
        $this->product_token = $defaults['product_token'];

        add_action('admin_menu', array($this, 'admin_menu'));

        add_action('wp_ajax_' . $this->slug, array($this, 'wp_starter'));

        add_action('wp_ajax_' . $this->slug . '_revalidate', array($this, 'revalidate_starter'));

        add_action('init', array($this, 'schedule_programs'));

        add_action($this->slug . '_daily_validator', array($this, 'daily_event'));

        // add_action('admin_notices', array($this, 'admin_notice'));

    }



    public function admin_menu()
    {
        add_submenu_page(
            $this->parent_slug,
            __('Register version', $this->text_domain),
            __('Register version', $this->text_domain),
            'manage_options',
            $this->slug,
            array($this, 'menu_content')
        );
    }


    public function menu_content()
    {
        $option = get_option(self::$option_name);
        $now = json_decode(get_option($option));
        $starter = (isset($now->starter) && !empty($now->starter)) ? base64_decode($now->starter) : '';
        if (isset($_GET['debugger']) && !empty($_GET['debugger']) && $_GET['debugger'] === 'show') {
            $data_show = $option;
        } else {
            $data_show = '';
        }
        ?>
        <style>
            form.register_version_form,
            .current_license {
                width: 30%;
                background: #fff;
                margin: 0 auto;
                padding: 20px 30px;
            }

            form.register_version_form .license_key {
                padding: 5px 10px;
                width: calc(100% - 100px);
            }

            form.register_version_form button {
                width: 80px;
                text-align: center;
            }

            form.register_version_form .result, .current_license .check_result {
                width: 100%;
                padding: 30px 0 15px;
                text-align: center;
                display: none;
            }

            .current_license .check_result {
                padding: 20px 0;
                float: right;
                width: 100%;
            }

            form.register_version_form .result .spinner,
            .current_license .check_result .spinner {
                width: auto;
                background-position: right center;
                padding-right: 30px;
                margin: 0;
                float: none;
                visibility: visible;
                display: none;
            }

            .current_license.waiting .check_result .spinner,
            form.register_version_form .result.show .spinner {
                display: inline-block;
            }

            .current_license {
                width: 40%;
                text-align: center;
            }

            .current_license > .current_label {
                line-height: 25px;
                height: 25px;
                display: inline-block;
                font-weight: bold;
                margin-left: 10px;
            }

            .current_license > code {
                line-height: 25px;
                height: 25px;
                padding: 0 5px;
                color: #c7254e;
                margin-left: 10px;
                display: inline-block;
                -webkit-transform: translateY(2px);
                -moz-transform: translateY(2px);
                -ms-transform: translateY(2px);
                -o-transform: translateY(2px);
                transform: translateY(2px);
            }

            .current_license .action {
                color: #fff;
                line-height: 25px;
                height: 25px;
                padding: 0 5px;
                display: inline-block;
            }

            .current_license .last_check {
                line-height: 25px;
                height: 25px;
                padding: 0 5px;
                display: inline-block;
            }

            .current_license .action.active {
                background: #4CAF50;
            }

            .current_license .action.inactive {
                background: #c7254e;
            }

            .current_license .keys {
                float: right;
                width: 100%;
                text-align: center;
                padding-top: 20px;
                border-top: 1px solid #ddd;
                margin-top: 20px;
            }

            .current_license .keys .wpmlr_revalidate {
                margin-left: 30px;
            }

            .current_license .register_version_form {
                display: none;
                padding: 0;
                float: right;
                width: 80%;
                margin: 20px 10%;
            }

            .zhk_guard_notice {
                background: #fff;
                border: 1px solid rgba(0, 0, 0, .1);
                border-right: 4px solid #00a0d2;
                padding: 5px 15px;
                margin: 5px;
            }

            .zhk_guard_danger {
                background: #fff;
                border: 1px solid rgba(0, 0, 0, .1);
                border-right: 4px solid #DC3232;
                padding: 5px 15px;
                margin: 5px;
            }

            .zhk_guard_success {
                background: #fff;
                border: 1px solid rgba(0, 0, 0, .1);
                border-right: 4px solid #46b450;
                padding: 5px 15px;
                margin: 5px;
            }

            @media (max-width: 1024px) {
                form.register_version_form, .current_license {
                    width: 90%;
                }
            }
        </style>
        <div class="wrap wpmlr_wrap" data-show="<?php echo $data_show ?>">
            <h1><?php _e('Register version', $this->text_domain); ?></h1>
            <?php if (isset($now) && !empty($now)): ?>
                <p><?php _e('You already register your license key. to re validate it, you can use this form.', $this->text_domain); ?></p>
                <div class="current_license">
                    <span class="current_label"><?php _e('Your current license:', $this->text_domain); ?></span>
                    <code><?php echo $starter; ?></code>
                    <div class="action <?php echo ($now->action == 1) ? 'active' : 'inactive'; ?>">
                        <?php if ($now->action == 1): ?>
                            <span class="dashicons dashicons-yes"></span>
                            <?php echo $now->message; ?>
                        <?php else: ?>
                            <span class="dashicons dashicons-no-alt"></span>
                            <?php echo $now->message; ?>
                        <?php endif; ?>
                    </div>
                    <div class="keys">
                        <a href="#" class="button button-primary wpmlr_revalidate"
                           data-key="<?php echo $starter; ?>"><?php _e('Revalidate', $this->text_domain); ?></a>
                        <a href="#"
                           class="button zhk_guard_new_key"><?php _e('Delete and submit another license', $this->text_domain); ?></a>
                    </div>

                    <form action="#" method="post" class="register_version_form">
                        <input type="text" class="license_key"
                               placeholder="<?php _e('New license key', $this->text_domain); ?>">
                        <button class="button button-primary"><?php _e('Register version', $this->text_domain); ?></button>
                        <div class="result">
                            <div class="spinner"><?php _e('Please wait...', $this->text_domain); ?></div>
                            <div class="result_text"></div>
                        </div>
                    </form>

                    <div class="check_result">
                        <div class="spinner"><?php _e('Please wait...', $this->text_domain); ?></div>
                        <div class="result_text"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php else: ?>
                <p><?php _e('Please activate plugin with your license key to all features work.', $this->text_domain); ?></p>
                <form action="#" method="post" class="register_version_form">
                    <input type="text" class="license_key"
                           placeholder="<?php _e('License key', $this->text_domain); ?>">
                    <button class="button button-primary"><?php _e('Register version', $this->text_domain); ?></button>
                    <div class="result">
                        <div class="spinner"><?php _e('Please wait...', $this->text_domain); ?></div>
                        <div class="result_text"></div>
                    </div>
                </form>
            <?php endif; ?>
            <script>
                jQuery(document).ready(function ($) {
                    var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
                    jQuery(document).on('submit', '.register_version_form', function (event) {
                        event.preventDefault();
                        var starter = jQuery(this).find('.license_key').val(),
                            thisEl = jQuery(this);
                        thisEl.addClass('waiting');
                        thisEl.find('.result').slideDown(300).addClass('show');
                        thisEl.find('.button').addClass('disabled');
                        thisEl.find('.result_text').slideUp(300).html('');
                        jQuery.ajax({
                            url: ajax_url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                action: '<?php echo $this->slug; ?>',
                                starter: starter
                            },
                        })
                            .done(function (result) {
                                thisEl.find('.result_text').append(result.data).slideDown(150)
                            })
                            .fail(function (result) {
                                thisEl.find('.result_text').append('<div class="zhk_guard_danger"><?php _e('Something goes wrong please try again.', $this->text_domain); ?></div>').slideDown(150)
                            })
                            .always(function (result) {
                                console.log(result);
                                thisEl.removeClass('waiting');
                                thisEl.find('.result').removeClass('show');
                                thisEl.find('.button').removeClass('disabled');
                            });
                    });

                    $(document).on('click', '.wpmlr_revalidate', function (event) {
                        event.preventDefault();
                        var starter = $(this).data('key'),
                            thisEl = $(this).parents('.current_license');
                        thisEl.addClass('waiting');
                        thisEl.find('.check_result').slideDown(300);
                        thisEl.find('.button').addClass('disabled');
                        thisEl.find('.result_text').slideUp(300).html('');
                        thisEl.find('.register_version_form').slideUp(300)
                        $.ajax({
                            url: ajax_url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                action: '<?php echo $this->slug; ?>_revalidate',
                                starter: starter
                            },
                        })
                            .done(function (result) {
                                thisEl.find('.check_result .result_text').append(result.data).slideDown(150)
                            })
                            .fail(function (result) {
                                thisEl.find('.check_result .result_text').append('<div class="wpmlr_danger"><?php _e('Something goes wrong please try again.', $this->text_domain); ?></div>').slideDown(150)
                            })
                            .always(function (result) {
                                thisEl.removeClass('waiting');
                                thisEl.find('.button').removeClass('disabled');
                            });
                    });


                    $(document).on('click', '.zhk_guard_new_key', function (event) {
                        event.preventDefault();
                        var thisEl = $(this).parents('.current_license');
                        thisEl.find('.result_text').slideUp(300).html('');
                        thisEl.find('.register_version_form').slideDown(300)
                    });
                });
            </script>

        </div>
        <?php

    }

    public function wp_starter()
    {
        $starter = sanitize_text_field($_POST['starter']);
        if (empty($starter)) {
            wp_send_json_error('<div class="zhk_guard_danger">' . __('Please insert your license code', $this->text_domain) . '</div>');
        }

        $private_session = get_option('tmt_option_karauos_guard');
        delete_option($private_session);

        $product_token = $this->product_token;
        $result = self::install($starter, $product_token);
        $output = '';

        if ($result->status == 'successful') {
            $rand_key = md5(wp_generate_password(12, true, true));
            update_option(self::$option_name, $rand_key);
            $result = array(
                'starter' => base64_encode($starter),
                'action' => 1,
                'message' => __('License code is valid.', $this->text_domain),
                'timer' => time(),
            );
            update_option($rand_key, json_encode($result));
            $output = '<div class="zhk_guard_success">' . __('Thanks! Your license activated successfully.', $this->text_domain) . '</div>';
            wp_send_json_success($output);
        } else {
            if (!is_object($result->message)) {
                $output = '<div class="zhk_guard_danger">' . $result->message . '</div>';
                wp_send_json_error($output);
            } else {
                foreach ($result->message as $message) {
                    foreach ($message as $msg) {
                        $output .= '<div class="zhk_guard_danger">' . $msg . '</div>';
                    }
                }
                wp_send_json_error($output);
            }
        }
    }


    public function admin_notice()
    {
        $private_session = get_option('tmt_option_karauos_guard');
        $now = json_decode(get_option($private_session));
        ?>
        <?php if (empty($now)): ?>
        <div class="notice notice-error">
            <p>
                <?php printf(__('To activating your %s please insert you license key', $this->text_domain), $this->name); ?>
                <a href="<?php echo admin_url('admin.php?page=' . $this->slug); ?>"
                   class="button button-primary"><?php _e('Register Now', $this->text_domain); ?></a>
            </p>
        </div>
    <?php elseif ($now->action != 1): ?>
        <div class="notice notice-error">
            <p>
                <?php printf(__('There is something wrong with your %s license. please check it.', $this->text_domain), $this->name); ?>
                <a href="<?php echo admin_url('admin.php?page=' . $this->slug); ?>"
                   class="button button-primary"><?php _e('Check Now', $this->text_domain); ?></a>
            </p>
        </div>
    <?php endif; ?>
        <?php
    }


    public function revalidate_starter()
    {
        $starter = sanitize_text_field($_POST['starter']);
        if (empty($starter)) {
            wp_send_json_error('<div class="zhk_guard_danger">' . __('Please insert your license code', $this->text_domain) . '</div>');
        }

        $result = self::is_valid($starter);
        if ($result->status == 'successful') {
            $rand_key = md5(wp_generate_password(12, true, true));
            update_option(self::$option_name, $rand_key);
            $how = array(
                'starter' => base64_encode($starter),
                'action' => 1,
                'message' => $result->message,
                'timer' => time(),
            );
            update_option($rand_key, json_encode($how));
            $output = '<div class="zhk_guard_success">' . __('Thanks! Your license activated successfully.', $this->text_domain) . '</div>';
            wp_send_json_success($output);
        } else {
            $rand_key = md5(wp_generate_password(12, true, true));
            update_option(self::$option_name, $rand_key);
            $how = array(
                'starter' => base64_encode($starter),
                'action' => 0,
                'timer' => time(),
            );
            if (!is_object($result->message)) {
                $how['message'] = $result->message;
            } else {
                foreach ($result->message as $message) {
                    foreach ($message as $msg) {
                        $how['message'] = $msg;
                    }
                }
            }
            update_option($rand_key, json_encode($how));
            $output = '<div class="zhk_guard_danger">' . $how['message'] . '</div>';
            wp_send_json_success($output);
        }

    }


    public function schedule_programs()
    {
        if (!wp_next_scheduled($this->slug . '_daily_validator')) {
            wp_schedule_event(time(), 'daily', $this->slug . '_daily_validator');
        }
    }


    public function daily_event()
    {
        $private_session = get_option('tmt_option_karauos_guard');
        $now = json_decode(get_option($private_session));
        if (isset($now) && !empty($now)) {
            $starter = (isset($now->starter) && !empty($now->starter)) ? base64_decode($now->starter) : '';
            $result = self::is_valid($starter);
            if ($result != null) {
                if ($result->status == 'successful') {
                    delete_option($private_session);
                    $rand_key = md5(wp_generate_password(12, true, true));
                    update_option(self::$option_name, $rand_key);
                    $how = array(
                        'starter' => base64_encode($starter),
                        'action' => 1,
                        'message' => $result->message,
                        'timer' => time(),
                    );
                    update_option($rand_key, json_encode($how));
                } else {

                    delete_option($private_session);
                    $rand_key = md5(wp_generate_password(12, true, true));
                    update_option(self::$option_name, $rand_key);
                    $how = array(
                        'starter' => base64_encode($starter),
                        'action' => 0,
                        'timer' => time(),
                    );
                    if (!is_object($result->message)) {
                        $how['message'] = $result->message;
                    } else {
                        foreach ($result->message as $message) {
                            foreach ($message as $msg) {
                                $how['message'] = $msg;
                            }
                        }
                    }
                    update_option($rand_key, json_encode($how));
                }
            }
        }
    }


    public static function is_activated()
    {
        $private_session = get_option('tmt_option_karauos_guard');
        $now = json_decode(get_option($private_session));
        if (empty($now)) {
            return false;
        } elseif ($now->action != 1) {
            return false;
        } else {
            return true;
        }
    }


    public static function send_request($method, $params = array())
    {
        $param_string = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,
            self::$api_url . $method . '?' . $param_string
        );
        $content = curl_exec($ch);
        return json_decode($content);
    }


    public static function is_valid($license_token)
    {
        $result = self::send_request('validation-license', array('token' => $license_token, 'domain' => self::get_host()));
        return $result;
    }

    public static function install($license_token, $product_token)
    {
        $result = self::send_request('install-license', array('product_token' => $product_token, 'token' => $license_token, 'domain' => self::get_host()));
        return $result;
    }

    public static function get_host()
    {
        $possibleHostSources = array('HTTP_X_FORWARDED_HOST', 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR');
        $sourceTransformations = array(
            "HTTP_X_FORWARDED_HOST" => function ($value) {
                $elements = explode(',', $value);
                return trim(end($elements));
            }
        );
        $host = '';
        foreach ($possibleHostSources as $source) {
            if (!empty($host)) break;
            if (empty($_SERVER[$source])) continue;
            $host = $_SERVER[$source];
            if (array_key_exists($source, $sourceTransformations)) {
                $host = $sourceTransformations[$source]($host);
            }
        }

        $host = preg_replace('/:\d+$/', '', $host);
        $host = str_ireplace('www.', '', $host);

        return trim($host);
    }


    public static function instance($settings)
    {
        if (self::$instance == null) {
            self::$instance = new self($settings);
        }
        return self::$instance;
    }

}

// add_action('init', 'tmt_guard_init');
/**
 * Initialize function for class and hook it to wordpress init action
 */
function tmt_guard_init()
{
    $settings = [
        'name' => __('Karauos', 'karauos'),
        'slug' => 'tmt_guard_register',
        'parent_slug' => 'themes.php', // Read this: https://developer.wordpress.org/reference/functions/add_submenu_page/#parameters
        'text_domain' => 'karauos',
        'product_token' => 'a02b8b76-ec9e-4890-931d-54494569d858', // Get it from here: https://zhaket.com/dashboard/licenses/
        'option_name' => 'tmt_option_karauos_guard'
    ];
    TMT_Guard_Karauos::instance($settings);
}

function themento_position() {
    $position_options = [
        ''              => esc_html__('Default', 'karauos'),
        'top-left'      => esc_html__('Top Left', 'karauos') ,
        'top-center'    => esc_html__('Top Center', 'karauos') ,
        'top-right'     => esc_html__('Top Right', 'karauos') ,
        'center'        => esc_html__('Center', 'karauos') ,
        'center-left'   => esc_html__('Center Left', 'karauos') ,
        'center-right'  => esc_html__('Center Right', 'karauos') ,
        'bottom-left'   => esc_html__('Bottom Left', 'karauos') ,
        'bottom-center' => esc_html__('Bottom Center', 'karauos') ,
        'bottom-right'  => esc_html__('Bottom Right', 'karauos') ,
    ];

    return $position_options;
}


// Title Tags
function themento_title_tags() {
    $title_tags = [
        'h1'   => esc_html__( 'H1', 'karauos' ),
        'h2'   => esc_html__( 'H2', 'karauos' ),
        'h3'   => esc_html__( 'H3', 'karauos' ),
        'h4'   => esc_html__( 'H4', 'karauos' ),
        'h5'   => esc_html__( 'H5', 'karauos' ),
        'h6'   => esc_html__( 'H6', 'karauos' ),
        'div'  => esc_html__( 'div', 'karauos' ),
        'span' => esc_html__( 'span', 'karauos' ),
        'p'    => esc_html__( 'p', 'karauos' ),
    ];

    return $title_tags;
}


function themento_gravity_forms_options() {


    if ( class_exists( 'GFCommon' ) ) {
        $contact_forms = RGFormsModel::get_forms( null, 'title' );
        $form_options = ['0' => esc_html__( 'Select Form', 'karauos' )];
        if ( ! empty( $contact_forms ) && ! is_wp_error( $contact_forms ) ) {
            foreach ( $contact_forms as $form ) {
                $form_options[ $form->id ] = $form->title;
            }
        }
    } else {
        $form_options = ['0' => esc_html__( 'Form Not Found!', 'karauos' ) ];
    }

    return $form_options;
}