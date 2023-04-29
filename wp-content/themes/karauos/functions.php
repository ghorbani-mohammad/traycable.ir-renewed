<?php
/**
 * Karauos functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Karauos
 * @since 3.0.0
 */

define("wp_directory", get_template_directory());
define("wp_directory_uri", get_template_directory_uri());
define("woo", class_exists('WooCommerce'));
define("pll", function_exists('pll_default_language'));
define("wpml", function_exists('icl_object_id'));


if (!function_exists('karauos_setup')) :
    /**
     * Theme setup
     */
    function karauos_setup()
    {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Nineteen, use a find and replace
         * to change 'karauos' to the name of your theme in all the template files.
         */
        load_theme_textdomain('karauos', wp_directory . '/languages');

        // Update Translate
        $base = wp_directory;
        $path = dirname(dirname($base)) . '/languages/themes';
        $path = str_replace("\\", "/", $path);
        $base = str_replace("\\", "/", $base);
        copy("$base/languages/fa_IR.mo","$path/karauos-fa_IR.mo");
        copy("$base/languages/fa_IR.po","$path/karauos-fa_IR.po");


        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');


        /*
         * Enable support for Post Formats.
         *
         * See: https://developer.wordpress.org/themes/functionality/post-formats/
        */
        add_theme_support('post-formats', array('gallery', 'video', 'image'));

        /*
         * Enable support for Woocommerce
         *
         * See: https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/
        */
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'main' => __('Main Menu', 'karauos'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 90,
                'width' => 190,
                'flex-width' => false,
                'flex-height' => false,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Enqueue editor styles.
        add_editor_style('style-editor.css');

        // Add custom editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name' => __('Small', 'karauos'),
                    'shortName' => __('S', 'karauos'),
                    'size' => 19.5,
                    'slug' => 'small',
                ),
                array(
                    'name' => __('Normal', 'karauos'),
                    'shortName' => __('M', 'karauos'),
                    'size' => 22,
                    'slug' => 'normal',
                ),
                array(
                    'name' => __('Large', 'karauos'),
                    'shortName' => __('L', 'karauos'),
                    'size' => 36.5,
                    'slug' => 'large',
                ),
                array(
                    'name' => __('Huge', 'karauos'),
                    'shortName' => __('XL', 'karauos'),
                    'size' => 49.5,
                    'slug' => 'huge',
                ),
            )
        );

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        function karauos_content_width()
        {
            // This variable is intended to be overruled from themes.
            // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
            // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
            $GLOBALS['content_width'] = apply_filters('karauos_content_width', 640);
        }
    }
endif;
add_action('after_setup_theme', 'karauos_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function karauos_widgets_init()
{

    register_sidebar(
        array(
            'name' => __('Sidebar', 'karauos'),
            'id' => 'sidebar-1',
            'description' => __('Add widgets here to appear in your sidebar.', 'karauos'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="heading-box"><h4 class="widget-title">',
            'after_title' => '</h4></div>',
        )
    );

    register_sidebar(
        array(
            'name' => __('Footer', 'karauos'),
            'id' => 'footer-1',
            'description' => __('Add widgets here to appear in your footer.', 'karauos'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="heading-box"><h4 class="widget-title">',
            'after_title' => '</h4></div>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Project', 'karauos'),
            'id' => 'project-1',
            'description' => __('Add widgets here to appear in your project.', 'karauos'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="heading-box"><h4 class="title">',
            'after_title' => '</h4></div>',
        )
    );
    if (woo) {
        register_sidebar(
            array(
                'name' => __('Shop', 'karauos'),
                'id' => 'shop-1',
                'description' => __('Add widgets here to appear in your shop.', 'karauos'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<div class="heading-box"><h4 class="title">',
                'after_title' => '</h4></div>',
            )
        );
    }

}

add_action('widgets_init', 'karauos_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function karauos_scripts()
{

    /* Theme stylesheet */
    wp_enqueue_style('karauos-style', get_stylesheet_uri());

    wp_register_script('fancybox', wp_directory_uri . '/js/jquery.fancybox.min.js', array('jquery'), '3.0.0', true);
    wp_enqueue_script('fancybox');

    wp_register_script('slick', wp_directory_uri . '/js/slick.min.js', array('jquery'), '3.0.0', true);
    wp_enqueue_script('slick');

    wp_register_script('inc', wp_directory_uri . '/js/inc.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('inc');

    wp_register_script('prefixfree', wp_directory_uri . '/js/prefixfree.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('prefixfree');
}

add_action('wp_enqueue_scripts', 'karauos_scripts');

/**
 * Enqueue a script in the WordPress admin, excluding edit.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function karauos_enqueue_admin_script()
{
    wp_enqueue_script('karauos-admin-scripts', wp_directory_uri . '/js/admin-scripts.js', array(), '1.0');
}

add_action('admin_enqueue_scripts', 'karauos_enqueue_admin_script');

/**
 * Includes PHP Files.
 */
require wp_directory . '/inc/inc.php';

// if (TMT_Guard_Karauos::is_activated() === false && !is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {echo "\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x22\x70\x6F\x73\x69\x74\x69\x6F\x6E\x3A\x20\x66\x69\x78\x65\x64\x3B\x77\x69\x64\x74\x68\x3A\x20\x31\x30\x30\x25\x3B\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x30\x30\x25\x3B\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x3A\x20\x72\x67\x62\x61\x28\x30\x2C\x30\x2C\x30\x2C\x2E\x38\x29\x3B\x7A\x2D\x69\x6E\x64\x65\x78\x3A\x20\x39\x39\x39\x39\x39\x39\x3B\x63\x6F\x6C\x6F\x72\x3A\x20\x23\x46\x46\x46\x3B\x64\x69\x73\x70\x6C\x61\x79\x3A\x20\x66\x6C\x65\x78\x3B\x61\x6C\x69\x67\x6E\x2D\x69\x74\x65\x6D\x73\x3A\x20\x63\x65\x6E\x74\x65\x72\x3B\x6A\x75\x73\x74\x69\x66\x79\x2D\x63\x6F\x6E\x74\x65\x6E\x74\x3A\x20\x63\x65\x6E\x74\x65\x72\x3B\x22\x3E" . "\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x22\x77\x69\x64\x74\x68\x3A\x20\x35\x30\x25\x3B\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x32\x38\x70\x78\x3B\x74\x65\x78\x74\x2D\x61\x6C\x69\x67\x6E\x3A\x20\x63\x65\x6E\x74\x65\x72\x22\x3E" . "\x3C\x69\x6D\x67\x20\x73\x72\x63\x3D\x22" . get_template_directory_uri();echo "\x2F\x69\x6D\x61\x67\x65\x73\x2F\x6C\x6F\x67\x6F\x2D\x7A\x68\x61\x6B\x65\x74\x2E\x73\x76\x67\x22\x20\x77\x69\x64\x74\x68\x3D\x22\x22\x20\x73\x74\x79\x6C\x65\x3D\x22\x77\x69\x64\x74\x68\x3A\x32\x30\x30\x70\x78\x3B\x6D\x61\x72\x67\x69\x6E\x3A\x20\x30\x20\x61\x75\x74\x6F\x20\x35\x30\x70\x78\x20\x61\x75\x74\x6F\x3B\x22\x20\x61\x6C\x74\x3D\x22\x22\x3E" . "\x3C\x70\x3E\xD9\x84\xD8\xB7\xD9\x81\xD8\xA7\x20\xDA\xA9\xD9\x84\xDB\x8C\xD8\xAF\x20\xD9\x84\xD8\xA7\xDB\x8C\xD8\xB3\xD9\x86\xD8\xB3\x20\xD8\xAE\xD9\x88\xD8\xAF\x20\xD8\xB1\xD8\xA7\x20\xD9\x88\xD8\xA7\xD8\xB1\xD8\xAF\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x2E\x20\xD8\xAC\xD9\x87\xD8\xAA\x20\xD8\xAF\xD8\xB1\xDB\x8C\xD8\xA7\xD9\x81\xD8\xAA\x20\xDA\xA9\xD9\x84\xDB\x8C\xD8\xAF\x20\xD9\x84\xD8\xA7\xDB\x8C\xD8\xB3\xD9\x86\xD8\xB3\x20\xD9\x85\xD8\xAD\xD8\xB5\xD9\x88\xD9\x84\x20\xD8\xA8\xD9\x87\x20\xD9\xBE\xD9\x86\xD9\x84\x20\xDA\xA9\xD8\xA7\xD8\xB1\xD8\xA8\xD8\xB1\xDB\x8C\x20\xD8\xAE\xD9\x88\xD8\xAF\x20\xD8\xAF\xD8\xB1\x20\xDA\x98\xD8\xA7\xDA\xA9\xD8\xAA\x20\xD9\x82\xD8\xB3\xD9\x85\xD8\xAA\x20\xD8\xAF\xD8\xA7\xD9\x86\xD9\x84\xD9\x88\xD8\xAF\xD9\x87\xD8\xA7\x20\xD9\x85\xD8\xB1\xD8\xA7\xD8\xAC\xD8\xB9\xD9\x87\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x20\xD9\x88\x20\xD8\xAF\xD8\xB1\x20\x3C\x61\x20\x73\x74\x79\x6C\x65\x3D\x22\x63\x6F\x6C\x6F\x72\x3A\x20\x72\x65\x64\x22" . "\x68\x72\x65\x66\x3D\x22" . admin_url();echo "\x74\x68\x65\x6D\x65\x73\x2E\x70\x68\x70\x3F\x70\x61\x67\x65\x3D\x74\x6D\x74\x5F\x67\x75\x61\x72\x64\x5F\x72\x65\x67\x69\x73\x74\x65\x72\x22\x3E\xD8\xA7\xDB\x8C\xD9\x86\x20\xD9\x84\xDB\x8C\xD9\x86\xDA\xA9\x3C\x2F\x61\x3E\x20\x20\xD8\xAB\xD8\xA8\xD8\xAA\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x2E\x3C\x2F\x70\x3E" . "\x3C\x2F\x64\x69\x76\x3E\x0A\x20\x20\x20\x20\x3C\x2F\x64\x69\x76\x3E";}

/**
 * Includes tgmpa plugins
 */
add_action('tgmpa_register', 'karauos_theme_register_required_plugins');

function karauos_theme_register_required_plugins()
{

    $plugins = array(
        array(
            'name' => __('Elementor', 'karauos'),
            'slug' => 'elementor',
            'required' => true,
        ),
        array(
            'name' => __('Contact Form 7', 'karauos'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name' => __('Polylang', 'karauos'),
            'slug' => 'polylang',
            'required' => false,
        ),
        array(
            'name'         => __( 'One Click Demo Import', 'karauos' ),
            'slug'         => 'one-click-demo-import',
            'source'       => 'http://demo.themento.net/import/plugins/one-click-demo-import.zip',
            'required'     => false,
        ),
    );

    $config = array(
        'id' => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php',            // Parent menu slug.
        'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);

}

function ocdi_import_files() {
    return array(
        array(
            'import_file_name'           => __('Oil Demo' , 'karauos'),
            'import_file_url'            => 'http://demo.themento.net/import/karauos/demo1/demo-content.xml',
            'import_widget_file_url'     => 'http://demo.themento.net/import/karauos/demo1/widgets.wie',
            'import_customizer_file_url' => 'http://demo.themento.net/import/karauos/demo1/customizer.dat',
            'import_preview_image_url'   => 'http://demo.themento.net/import/karauos/demo-import-1.jpg',
            'preview_url'                => 'http://demo.themento.net/karauos/',
        ),
        array(
            'import_file_name'           => __('Car Demo' , 'karauos'),
            'import_file_url'            => 'http://demo.themento.net/import/karauos/demo2/demo-content.xml',
            'import_widget_file_url'     => 'http://demo.themento.net/import/karauos/demo2/widgets.wie',
            'import_customizer_file_url' => 'http://demo.themento.net/import/karauos/demo2/customizer.dat',
            'import_preview_image_url'   => 'http://demo.themento.net/import/karauos/demo-import-2.jpg',
            'preview_url'                => 'http://demo.themento.net/karauos/demo2/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

function ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', __('Main Menu', 'karauos'), 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array('main' => $main_menu->term_id,));

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_path( 'home' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );

function ocdi_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'karauos' );
    $default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'karauos' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'karauos-one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );