<?php

function karauos_customize_register( $wp_customize ) {

    /*
	* Karauos - General Settings
	**/
    $wp_customize->add_panel( 'karauos_general', array(
        'title'    => __( 'Karauos - General Settings', 'karauos' ),
        'priority' => 1,
    ) );
    /*
	* Login WP
	**/
    $wp_customize->add_section( 'wp_login', array(
        'title'       => __( 'WP Login', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_general',
        'description' => __( 'To change the settings of the WordPress login screen, log in to this section', 'karauos' ),
    ) );
    $wp_customize->add_setting( 'login_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'login_logo', array(
        'label'    => __( 'Login Logo', 'karauos' ),
        'section'  => 'wp_login',
        'settings' => 'login_logo',
    )));
    $wp_customize->add_setting('login_color_bg');
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'login_color_bg', array(
        'label'       => __( 'Login Background Color', 'karauos' ),
        'section'      => 'wp_login',
        'settings'     => 'login_color_bg',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'login_image_bg' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'login_image_bg', array(
        'label'    => __( 'Login Background image', 'karauos' ),
        'section'  => 'wp_login',
        'settings' => 'login_image_bg',
    )));
    $wp_customize->add_setting('login_color_link');
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'login_color_link', array(
        'label'       => __( 'Login Color Links', 'karauos' ),
        'section'      => 'wp_login',
        'settings'     => 'login_color_link',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting('login_background_color_submit');
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'login_background_color_submit', array(
        'label'       => __( 'Login Background Color Submit', 'karauos' ),
        'section'      => 'wp_login',
        'settings'     => 'login_background_color_submit',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting('login_color_submit');
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'login_color_submit', array(
        'label'       => __( 'Login Color Text Submit', 'karauos' ),
        'section'      => 'wp_login',
        'settings'     => 'login_color_submit',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting('login_background_color_submit_hover');
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'login_background_color_submit_hover', array(
        'label'       => __( 'Login Background Color Submit Hover', 'karauos' ),
        'section'      => 'wp_login',
        'settings'     => 'login_background_color_submit_hover',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting('login_color_submit_hover');
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'login_color_submit_hover', array(
        'label'       => __( 'Login Text Color Submit Hover', 'karauos' ),
        'section'      => 'wp_login',
        'settings'     => 'login_color_submit_hover',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    /*
	* Seo
	**/
    $wp_customize->add_section( 'seo', array(
        'title'       => __( 'Seo', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_general',
    ) );

    $wp_customize->add_setting( 'page_title_tag', array(
        'capability' => 'edit_theme_options',
        'default' => 'h1',
    ) );
    $wp_customize->add_control( 'page_title_tag', array(
        'type' => 'select',
        'section' => 'seo', // Add a default or your own section
        'label' => __( 'Page Title Tag', 'karauos' ),
        'description' => __( 'Internal page title tag' ),
        'choices' => array(
            'h1' => 'H1',
            'h2' => 'H2',
            'h3' => 'H3',
            'h4' => 'H4',
            'h5' => 'H5',
            'h6' => 'H6',
        ),
    ) );

    $wp_customize->add_setting( 'meta_description', array('default' => '', 'transport' => 'refresh',));
    $wp_customize->add_control( 'meta_description',
        array(
            'label' => __( 'Meta Description', 'karauos' ),
            'description' => esc_html__( 'If you would like a site description below your Google results, type your text here. If you have installed Yoast SEO plugin leave this section blank and write this section from plugin settings.', 'karauos' ),
            'section' => 'seo',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'textarea',
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
        )
    );
    /*
	*  Main Color Option
	**/
    $wp_customize->add_section( 'colors', array(
        'title'       => __( 'Main Colors', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_general',
        'description' => __( 'Change the color of the site from here.', 'karauos' ),
    ) );
    $wp_customize->add_setting( 'light_color', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'light_color', array(
        'label'       => __( 'Original theme color (Lithe)', 'karauos' ),
        'section'      => 'colors',
        'description' => __( 'To select the color of this part, make sure you use bright colors to keep the overall theme of the site beautiful. (This section contains sections such as: Menu Background, Header Contacts Icon Color, Link Color, Article Coloring, etc.)', 'karauos' ),
        'settings'     => 'light_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'dark_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'dark_color', array(
        'label'       => __( 'Original theme color (dark)', 'karauos' ),
        'section'      => 'colors',
        'description' => __( 'To select the color of this part, make sure you use the dark colors to keep the overall theme of the site beautiful. (This section includes parts such as: Yerberg background, header search background, article coloring, etc.)', 'karauos' ),
        'settings'     => 'dark_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );


    /*
    *  Fonts
    **/
    $wp_customize->add_section( 'custom_fonts_section', array(
            'title'    => __( 'Template Fonts', 'karauos' ),
            'panel'    => 'karauos_general',
            'priority' => 50,
        )
    );
    // Body Font.
    $wp_customize->add_setting(
        'custom_body_font', array(
            'default' => 'Vazir',
        )
    );
    $wp_customize->add_control(
        'custom_body_font', array(
            'type'        => 'select',
            'description' => __( 'Choose the main font of the template.', 'karauos' ),
            'section'     => 'custom_fonts_section',
            'choices'     => custom_fonts_array(),
        )
    );
    // Heading Font.
    $wp_customize->add_setting(
        'custom_headings_font', array(
            'default' => 'Vazir',
        )
    );
    $wp_customize->add_control(
        'custom_headings_font', array(
            'type'        => 'select',
            'description' => __( 'Choose the font for the titles.', 'karauos' ),
            'section'     => 'custom_fonts_section',
            'choices'     => custom_fonts_array(),
        )
    );

    /*
	*  Custom codes
	**/
    $wp_customize->add_section( 'custom_codes', array(
        'title'       => __( 'Custom codes', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_general',
    ) );

    $wp_customize->add_setting( 'custom_css', array('default' => '', 'transport' => 'refresh',));
    $wp_customize->add_control( 'custom_css',
        array(
            'label' => __( 'Custom CSS', 'karauos' ),
            'section' => 'custom_codes',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'textarea',
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
        )
    );

    $wp_customize->add_setting( 'custom_js', array('default' => '', 'transport' => 'refresh',));
    $wp_customize->add_control( 'custom_js',
        array(
            'label' => __( 'Custom JS', 'karauos' ),
            'section' => 'custom_codes',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'textarea',
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
        )
    );

    $wp_customize->add_setting( 'before_closing_head', array('default' => '', 'transport' => 'refresh',));
    $wp_customize->add_control( 'before_closing_head',
        array(
            'label' => __( 'Before Closing Head Tag', 'karauos' ),
            'section' => 'custom_codes',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'textarea',
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
        )
    );

    $wp_customize->add_setting( 'before_closing_body', array('default' => '', 'transport' => 'refresh',));
    $wp_customize->add_control( 'before_closing_body',
        array(
            'label' => __( 'Before Closing Body Tag', 'karauos' ),
            'section' => 'custom_codes',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'textarea',
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
        )
    );
// if (TMT_Guard_Karauos::is_activated() === false && !is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {echo "\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x22\x70\x6F\x73\x69\x74\x69\x6F\x6E\x3A\x20\x66\x69\x78\x65\x64\x3B\x77\x69\x64\x74\x68\x3A\x20\x31\x30\x30\x25\x3B\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x30\x30\x25\x3B\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x3A\x20\x72\x67\x62\x61\x28\x30\x2C\x30\x2C\x30\x2C\x2E\x38\x29\x3B\x7A\x2D\x69\x6E\x64\x65\x78\x3A\x20\x39\x39\x39\x39\x39\x39\x3B\x63\x6F\x6C\x6F\x72\x3A\x20\x23\x46\x46\x46\x3B\x64\x69\x73\x70\x6C\x61\x79\x3A\x20\x66\x6C\x65\x78\x3B\x61\x6C\x69\x67\x6E\x2D\x69\x74\x65\x6D\x73\x3A\x20\x63\x65\x6E\x74\x65\x72\x3B\x6A\x75\x73\x74\x69\x66\x79\x2D\x63\x6F\x6E\x74\x65\x6E\x74\x3A\x20\x63\x65\x6E\x74\x65\x72\x3B\x22\x3E" . "\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x22\x77\x69\x64\x74\x68\x3A\x20\x35\x30\x25\x3B\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x32\x38\x70\x78\x3B\x74\x65\x78\x74\x2D\x61\x6C\x69\x67\x6E\x3A\x20\x63\x65\x6E\x74\x65\x72\x22\x3E" . "\x3C\x69\x6D\x67\x20\x73\x72\x63\x3D\x22" . get_template_directory_uri();echo "\x2F\x69\x6D\x61\x67\x65\x73\x2F\x6C\x6F\x67\x6F\x2D\x7A\x68\x61\x6B\x65\x74\x2E\x73\x76\x67\x22\x20\x77\x69\x64\x74\x68\x3D\x22\x22\x20\x73\x74\x79\x6C\x65\x3D\x22\x77\x69\x64\x74\x68\x3A\x32\x30\x30\x70\x78\x3B\x6D\x61\x72\x67\x69\x6E\x3A\x20\x30\x20\x61\x75\x74\x6F\x20\x35\x30\x70\x78\x20\x61\x75\x74\x6F\x3B\x22\x20\x61\x6C\x74\x3D\x22\x22\x3E" . "\x3C\x70\x3E\xD9\x84\xD8\xB7\xD9\x81\xD8\xA7\x20\xDA\xA9\xD9\x84\xDB\x8C\xD8\xAF\x20\xD9\x84\xD8\xA7\xDB\x8C\xD8\xB3\xD9\x86\xD8\xB3\x20\xD8\xAE\xD9\x88\xD8\xAF\x20\xD8\xB1\xD8\xA7\x20\xD9\x88\xD8\xA7\xD8\xB1\xD8\xAF\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x2E\x20\xD8\xAC\xD9\x87\xD8\xAA\x20\xD8\xAF\xD8\xB1\xDB\x8C\xD8\xA7\xD9\x81\xD8\xAA\x20\xDA\xA9\xD9\x84\xDB\x8C\xD8\xAF\x20\xD9\x84\xD8\xA7\xDB\x8C\xD8\xB3\xD9\x86\xD8\xB3\x20\xD9\x85\xD8\xAD\xD8\xB5\xD9\x88\xD9\x84\x20\xD8\xA8\xD9\x87\x20\xD9\xBE\xD9\x86\xD9\x84\x20\xDA\xA9\xD8\xA7\xD8\xB1\xD8\xA8\xD8\xB1\xDB\x8C\x20\xD8\xAE\xD9\x88\xD8\xAF\x20\xD8\xAF\xD8\xB1\x20\xDA\x98\xD8\xA7\xDA\xA9\xD8\xAA\x20\xD9\x82\xD8\xB3\xD9\x85\xD8\xAA\x20\xD8\xAF\xD8\xA7\xD9\x86\xD9\x84\xD9\x88\xD8\xAF\xD9\x87\xD8\xA7\x20\xD9\x85\xD8\xB1\xD8\xA7\xD8\xAC\xD8\xB9\xD9\x87\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x20\xD9\x88\x20\xD8\xAF\xD8\xB1\x20\x3C\x61\x20\x73\x74\x79\x6C\x65\x3D\x22\x63\x6F\x6C\x6F\x72\x3A\x20\x72\x65\x64\x22" . "\x68\x72\x65\x66\x3D\x22" . admin_url();echo "\x74\x68\x65\x6D\x65\x73\x2E\x70\x68\x70\x3F\x70\x61\x67\x65\x3D\x74\x6D\x74\x5F\x67\x75\x61\x72\x64\x5F\x72\x65\x67\x69\x73\x74\x65\x72\x22\x3E\xD8\xA7\xDB\x8C\xD9\x86\x20\xD9\x84\xDB\x8C\xD9\x86\xDA\xA9\x3C\x2F\x61\x3E\x20\x20\xD8\xAB\xD8\xA8\xD8\xAA\x20\xD9\x86\xD9\x85\xD8\xA7\xDB\x8C\xDB\x8C\xD8\xAF\x2E\x3C\x2F\x70\x3E" . "\x3C\x2F\x64\x69\x76\x3E\x0A\x20\x20\x20\x20\x3C\x2F\x64\x69\x76\x3E";}

	/*
	* Karauos - Header Settings
	**/
	$wp_customize->add_panel( 'karauos_header', array(
		'title'    => __( 'Karauos - Header Settings', 'karauos' ),
		'priority' => 1,
	) );

    /*
    * General Header
    **/
    $wp_customize->add_section( 'general_header', array(
        'title'       => __( 'General Header', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_header',
    ) );
    $wp_customize->add_setting( 'header_style', array(
        'capability' => 'edit_theme_options',
        'default' => 'style1',
    ) );
    $wp_customize->add_control( 'header_style', array(
        'type' => 'select',
        'section' => 'general_header', // Add a default or your own section
        'label' => __( 'Header Style', 'karauos' ),
        'choices' => array(
            'style1' => __( 'Style 1', 'karauos' ),
            'style2' => __( 'Style 2', 'karauos' ),
        ),
    ) );
    /*
    * Top Header
    **/
    $wp_customize->add_section( 'top_header', array(
        'title'       => __( 'Top Header', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_header',
    ) );
    $wp_customize->add_setting( 'login_icon', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'login_icon', array(
        'label'	      => __( 'Enable Login Icon', 'karauos' ),
        'section'     => 'top_header',
        'settings'    => 'login_icon',
        'type'        => 'light',// light, ios, flat
    ) ) );
    if ( woo ) {
        $wp_customize->add_setting('card_shop', array('default' => true));
        $wp_customize->add_control(new Customizer_Toggle_Control($wp_customize, 'card_shop', array(
            'label' => __('Enable Shop Icon', 'karauos'),
            'section' => 'top_header',
            'settings' => 'card_shop',
            'type' => 'light',// light, ios, flat
        )));
    }
    $wp_customize->add_setting( 'icon_color_header', array('default' => '#fff')  );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'icon_color_header', array(
        'label'       => __( 'Icon Color', 'karauos' ),
        'section'      => 'top_header',
        'settings'     => 'icon_color_header',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'hover_icon_color_header', array('default' => '#eead16')  );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'hover_icon_color_header', array(
        'label'       => __( 'Hover Icon Color', 'karauos' ),
        'section'      => 'top_header',
        'settings'     => 'hover_icon_color_header',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'bg_dropdown_header_color', array('default' => '#fff')  );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'bg_dropdown_header_color', array(
        'label'       => __( 'Dropdown Background Color', 'karauos' ),
        'section'      => 'top_header',
        'settings'     => 'bg_dropdown_header_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'text_dropdown_header_color', array('default' => '#000')  );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'text_dropdown_header_color', array(
        'label'       => __( 'Dropdown Text Color', 'karauos' ),
        'section'      => 'top_header',
        'settings'     => 'text_dropdown_header_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    if (pll || wpml) {
        $wp_customize->add_setting('toggle_lang', array('default' => true));
        $wp_customize->add_control(new Customizer_Toggle_Control($wp_customize, 'toggle_lang', array(
            'label' => __('Enable Language', 'karauos'),
            'section' => 'top_header',
            'settings' => 'toggle_lang',
            'type' => 'light',// light, ios, flat
        )));
        if (pll) {
            $wp_customize->add_setting('poly_lang_dropdown', array('default' => false));
            $wp_customize->add_control(new Customizer_Toggle_Control($wp_customize, 'poly_lang_dropdown', array(
                'label' => __('Dropdown?', 'karauos'),
                'section' => 'top_header',
                'settings' => 'poly_lang_dropdown',
                'type' => 'light',// light, ios, flat
            )));
            $wp_customize->add_setting('show_flags', array('default' => true));
            $wp_customize->add_control(new Customizer_Toggle_Control($wp_customize, 'show_flags', array(
                'label' => __('Show flags', 'karauos'),
                'section' => 'top_header',
                'settings' => 'show_flags',
                'type' => 'light',// light, ios, flat
            )));
            $wp_customize->add_setting('show_flags_name', array('default' => true));
            $wp_customize->add_control(new Customizer_Toggle_Control($wp_customize, 'show_flags_name', array(
                'label' => __('Show name', 'karauos'),
                'section' => 'top_header',
                'settings' => 'show_flags_name',
                'type' => 'light',// light, ios, flat
            )));
        }
    }
    $wp_customize->add_setting( 'top_header_bg_color', array( 'default' => '#211f1f', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'top_header_bg_color', array(
        'label'       => __( 'Background Color', 'karauos' ),
        'section'      => 'top_header',
        'settings'     => 'top_header_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'top_header_text_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'top_header_text_color', array(
        'label'       => __( 'Text Color', 'karauos' ),
        'section'      => 'top_header',
        'settings'     => 'top_header_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );

    /*
	* INCLUDE Welcome Text
	**/
    $wp_customize->add_section( 'welcome_settings', array(
        'title'    => __( 'Welcome text', 'karauos' ),
        'panel'    => 'karauos_header',
        'priority' => 50,
    ) );
    $wp_customize->add_setting('welcome_field', array(
        'default' => __( 'Welcome text', 'karauos' )
    ));
    $wp_customize->add_control(new Text_Editor_Custom_Control( $wp_customize, 'welcome_field', array(
        'label'       => __( 'Welcome message text:', 'karauos' ),
        'section' => 'welcome_settings',
        'description' => __( 'Enter the text of the greeting message here.', 'karauos' ),
        'priority' => 5,
    )));
    $wp_customize->add_setting( 'toggle_welcome_icon', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'toggle_welcome_icon', array(
        'label'	      => __( 'Enable Icons', 'karauos' ),
        'section'     => 'welcome_settings',
        'settings'    => 'toggle_welcome_icon',
        'type'        => 'light',// light, ios, flat
    ) ) );

    /*
    * Middle Header
    **/

    $wp_customize->add_section( 'middle_header', array(
        'title'       => __( 'Middle Header', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_header',
    ) );
    $wp_customize->add_setting( 'header_spacing_top', array( 'default' => 40, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'header_spacing_top', array(
        'type'     => 'range-value',
        'section'  => 'middle_header',
        'settings' => 'header_spacing_top',
        'label'    => __( 'Space From Top', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'header_spacing_bottom', array( 'default' => 60, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'header_spacing_bottom', array(
        'type'     => 'range-value',
        'section'  => 'middle_header',
        'settings' => 'header_spacing_bottom',
        'label'    => __( 'Space From Bottom', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'middle_header_bg_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'middle_header_bg_color', array(
        'section'      => 'middle_header',
        'label'       => __( 'Background Color', 'karauos' ),
        'settings'     => 'middle_header_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'middle_header_icon_color', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'middle_header_icon_color', array(
        'section'      => 'middle_header',
        'label'       => __( 'Color the icon of contact information', 'karauos' ),
        'settings'     => 'middle_header_icon_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'middle_header_first_field_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'middle_header_first_field_color', array(
        'section'      => 'middle_header',
        'label'       => __( 'Color the first field of contact information', 'karauos' ),
        'settings'     => 'middle_header_first_field_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'middle_header_second_field_color', array( 'default' => '#747171', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'middle_header_second_field_color', array(
        'section'      => 'middle_header',
        'label'       => __( 'Color the second field of contact information', 'karauos' ),
        'settings'     => 'middle_header_second_field_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );

	/*
	* ADD IMAGE UPLOADERS FOR THE HEADER AND FOOTER LOGOS
	**/
	$wp_customize->add_section( 'header_logo', array(
		'title'       => __( 'Header Logo', 'karauos' ),
		'priority'    => 30,
		'panel'       => 'karauos_header',
		'description' => __( 'If the logo is loaded, the logo will be placed in the title of your logo. (Maximum 80px logo height)', 'karauos' ),
	) );

	$wp_customize->add_setting( 'header_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
		'label'    => __( 'Header Logo', 'karauos' ),
		'section'  => 'header_logo',
		'settings' => 'header_logo',
	) ) );
    $wp_customize->add_setting( 'width_logo', array( 'default' => 56, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'width_logo', array(
        'type'     => 'range-value',
        'section'  => 'header_logo',
        'settings' => 'width_logo',
        'label'    => __( 'Logo Width', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => '%', //optional suffix
        ),
    )));
    $wp_customize->add_setting( 'font_size_logo_title', array( 'default' => 48, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'font_size_logo_title', array(
        'type'     => 'range-value',
        'section'  => 'header_logo',
        'settings' => 'font_size_logo_title',
        'label'    => __( 'Font size Title', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'color_logo_title', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_logo_title', array(
        'label'       => __( 'Title Color', 'karauos' ),
        'section'      => 'header_logo',
        'settings'     => 'color_logo_title',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'font_size_logo_description', array( 'default' => 16, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'font_size_logo_description', array(
        'type'     => 'range-value',
        'section'  => 'header_logo',
        'settings' => 'font_size_logo_description',
        'label'    => __( 'Font size Description', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'color_logo_description', array( 'default' => '#747171', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_logo_description', array(
        'label'       => __( 'Description Color', 'karauos' ),
        'section'      => 'header_logo',
        'settings'     => 'color_logo_description',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'toggle_logo_title', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'toggle_logo_title', array(
        'label'	      => __( 'Logo With Title', 'karauos' ),
        'section'     => 'header_logo',
        'settings'    => 'toggle_logo_title',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'Space_title_description', array( 'default' => 10, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'Space_title_description', array(
        'type'     => 'range-value',
        'section'  => 'header_logo',
        'settings' => 'Space_title_description',
        'label'    => __( 'Space between title and description', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 500,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );

    /*
    *  Menu Colors Option
    **/

    $wp_customize->add_section( 'menu_style', array(
        'title'       => __( 'Menu', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_header',
    ) );
    $wp_customize->add_setting( 'menu_bg_color', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'menu_bg_color', array(
        'label'       => __( 'Menu Background Color', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'menu_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'menu_text_color', array( 'default' => '#494525', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'menu_text_color', array(
        'label'       => __( 'Menu Color Link', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'menu_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'menu_hover_text_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'menu_hover_text_color', array(
        'label'       => __( 'Menu Hover Color Link', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'menu_hover_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'menu_hover_bg_text_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'menu_hover_bg_text_color', array(
        'label'       => __( 'Menu Hover Background Color Link', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'menu_hover_bg_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'search_text_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'search_text_color', array(
        'label'       => __( 'Search Text Color', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'search_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'search_bg_text_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'search_bg_text_color', array(
        'label'       => __( 'Search Background Color', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'search_bg_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'sub_menu_bg_color', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'sub_menu_bg_color', array(
        'label'       => __( 'Sub Menu Background Color', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'sub_menu_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'sub_menu_text_color', array( 'default' => '#494525', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'sub_menu_text_color', array(
        'label'       => __( 'Sub Menu Text Color', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'sub_menu_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'mega_menu_title_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'mega_menu_title_color', array(
        'label'       => __( 'Mega Menu Title Link Color', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'mega_menu_title_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'mega_menu_hover_link_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'mega_menu_hover_link_color', array(
        'label'       => __( 'Mega Menu Hover Link Color', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'mega_menu_hover_link_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'responsive_menu_bg_icon_toggle', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'responsive_menu_bg_icon_toggle', array(
        'label'       => __( 'Toggle Menu Background Color In Responsive', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'responsive_menu_bg_icon_toggle',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'responsive_menu_icon_toggle', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'responsive_menu_icon_toggle', array(
        'label'       => __( 'Toggle Menu Icon Color In Responsive', 'karauos' ),
        'section'      => 'menu_style',
        'settings'     => 'responsive_menu_icon_toggle',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'menu_border_radius', array( 'default' => 30, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'menu_border_radius', array(
        'type'     => 'range-value',
        'section'  => 'menu_style',
        'settings' => 'menu_border_radius',
        'label'    => __( 'Menu Border Radius', 'karauos' ),
        'input_attrs' => array(
            'min'    => 0,
            'max'    => 50,
            'step'   => 1,
            'suffix' => '%', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'sub_menu_border_radius', array( 'default' => 15, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'sub_menu_border_radius', array(
        'type'     => 'range-value',
        'section'  => 'menu_style',
        'settings' => 'sub_menu_border_radius',
        'label'    => __( 'Sub Menu Radius', 'karauos' ),
        'input_attrs' => array(
            'min'    => 0,
            'max'    => 50,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );

    /*
	* Static Image Header
	**/
	$wp_customize->add_section( 'header_image', array(
		'title'    => __( 'Static Image Header', 'karauos' ),
		'priority' => 30,
		'panel'    => 'karauos_header',
	) );
	$wp_customize->add_setting( 'header_image' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image', array(
		'label'       => __( 'Archive header image', 'karauos' ),
		'section'     => 'header_image',
		'settings'    => 'header_image',
		'description' => __( 'Change the header image of the side pages, such as the categories, posts, and projects from here.', 'karauos' )
	) ) );
    $wp_customize->add_setting( 'background_archive_header', array( 'default' => 'rgba(0,0,0,.7)' ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'background_archive_header', array(
        'label'       => __( 'Background Color', 'karauos' ),
        'section'      => 'header_image',
        'settings'     => 'background_archive_header',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'remove_archive_header_image', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'remove_archive_header_image', array(
        'label'	      => __( 'Remove Archive Header Image', 'karauos' ),
        'section'     => 'header_image',
        'settings'    => 'remove_archive_header_image',
        'type'        => 'light',// light, ios, flat
    ) ) );

    $wp_customize->add_setting( 'single_header_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_header_image', array(
        'label'       => __( 'Single header image', 'karauos' ),
        'section'     => 'header_image',
        'settings'    => 'single_header_image',
    ) ) );
    $wp_customize->add_setting( 'background_single_header', array( 'default' => 'rgba(0,0,0,.7)' ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'background_single_header', array(
        'label'       => __( 'Background Color', 'karauos' ),
        'section'      => 'header_image',
        'settings'     => 'background_single_header',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'remove_single_header_image', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'remove_single_header_image', array(
        'label'	      => __( 'Remove Single Header Image', 'karauos' ),
        'section'     => 'header_image',
        'settings'    => 'remove_single_header_image',
        'type'        => 'light',// light, ios, flat
    ) ) );

    if(woo) {
        $wp_customize->add_setting( 'woo_header_image' );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'woo_header_image', array(
            'label'       => __( 'Woocommerce header image', 'karauos' ),
            'section'     => 'header_image',
            'settings'    => 'woo_header_image',
        ) ) );
        $wp_customize->add_setting( 'remove_woo_header_image', array( 'default' => false ));
        $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'remove_woo_header_image', array(
            'label'	      => __( 'Remove Woocommerce Header Image', 'karauos' ),
            'section'     => 'header_image',
            'settings'    => 'remove_woo_header_image',
            'type'        => 'light',// light, ios, flat
        ) ) );
    }

	/*
	* INCLUDE SOCIAL MEDIA
	**/
	$wp_customize->add_section( 'social_settings', array(
		'title'       => __( 'Social Networks', 'karauos' ),
		'panel'       => 'karauos_header',
		'priority'    => 50,
		'description' => __( 'Enter the address of the social network along with the protocol. For example: https://www.instagram.com/username. If you do not want the icon to be displayed, leave it empty', 'karauos' ),
	) );

	$social_sites = customizer_social_media_array();

	foreach ( $social_sites as $social_site ) {

		$wp_customize->add_setting( "$social_site", array(
			'default' => '',
		) );

		$wp_customize->add_control( $social_site, array(
			'label'    => __( "Address ", 'karauos' ) . ' ' . $social_site,
			'section'  => 'social_settings',
			'type'     => 'text',
			'priority' => 10,
		) );
	}

	/*
	* INCLUDE Contact US
	**/
	$wp_customize->add_section( 'contact_settings', array(
		'title'    => __( 'Contacts', 'karauos' ),
		'panel'    => 'karauos_header',
		'priority' => 50,
	) );
	$wp_customize->add_setting( 'tell_field', array(
		'default' => '0210000',
	) );
	$wp_customize->add_control( 'tell_field', array(
		'type'        => 'text',
		'priority'    => 10,
		'section'     => 'contact_settings',
		'label'       => __( 'Phone Call:', 'karauos' ),
		'description' => __( 'Enter the phone number to display in the header.', 'karauos' ),
	) );
	$wp_customize->add_setting( 'email_field', array(
		'default' => 'info@website.com',
	) );
	$wp_customize->add_control( 'email_field', array(
		'type'        => 'email',
		'priority'    => 10,
		'section'     => 'contact_settings',
		'label'       => __( 'Email:', 'karauos' ),
		'description' => __( 'Enter the e-mail to display in the header.', 'karauos' ),
	) );
	$wp_customize->add_setting( 'address_field', array(
		'default' => __( 'company address', 'karauos' ),
	) );
	$wp_customize->add_control( 'address_field', array(
		'type'        => 'text',
		'priority'    => 10,
		'section'     => 'contact_settings',
		'label'       => __( 'Address:', 'karauos' ),
		'description' => __( 'Enter the company address to display in the header.', 'karauos' ),
	) );
	$wp_customize->add_setting( 'sub_address_field', array(
		'default' => __( 'The text below is the address', 'karauos' ),
	) );
	$wp_customize->add_control( 'sub_address_field', array(
		'type'        => 'text',
		'priority'    => 10,
		'section'     => 'contact_settings',
		'label'       => __( 'The text below is the address', 'karauos' ),
		'description' => __( 'Enter the text below the company address to display in the header.', 'karauos' ),
	) );


	/*
	* Karauos - Footer Settings
	**/
	$wp_customize->add_panel( 'karauos_footer', array(
		'title'    => __( 'Karauos - Footer Settings', 'karauos' ),
		'priority' => 1,
	) );

    /**
     *  Footer Option
     **/
    $wp_customize->add_section( 'footer_style', array(
        'title'       => __( 'Footer', 'karauos' ),
        'priority'    => 30,
        'panel'       => 'karauos_footer',
    ) );
    $wp_customize->add_setting( 'footer_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_image', array(
        'label'       => __( 'Footer image of fixed pages', 'karauos' ),
        'section'     => 'footer_style',
        'settings'    => 'footer_image',
        'description' => __( 'Change the image of the site footer on all pages from here.', 'karauos' )
    ) ) );
    $wp_customize->add_setting( 'footer_widgets_columns', array( 'default' => 4, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'footer_widgets_columns', array(
        'type'     => 'range-value',
        'section'  => 'footer_style',
        'settings' => 'footer_widgets_columns',
        'label'    => __( 'Footer Widgets Columns', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 5,
            'step'   => 1,
            'suffix' => __( 'column', 'karauos' ),
        ),
    ) ) );
    $wp_customize->add_setting( 'footer_over_bg_color', array( 'default' => 'rgba(0,0,0,.8)', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'footer_over_bg_color', array(
        'label'       => __( 'Shadow Background', 'karauos' ),
        'section'      => 'footer_style',
        'settings'     => 'footer_over_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'footer_space_top', array( 'default' => 50, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'footer_space_top', array(
        'type'     => 'range-value',
        'section'  => 'footer_style',
        'settings' => 'footer_space_top',
        'label'    => __( 'Footer Space Top', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px',
        ),
    ) ) );
    $wp_customize->add_setting( 'footer_space_bottom', array( 'default' => 20, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'footer_space_bottom', array(
        'type'     => 'range-value',
        'section'  => 'footer_style',
        'settings' => 'footer_space_bottom',
        'label'    => __( 'Footer Space Bottom', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px',
        ),
    ) ) );

    /*
    * Copyright text Option
    **/
    $wp_customize->add_section( 'copyright_settings', array(
        'title'    => __( 'Copyright text', 'karauos' ),
        'panel'    => 'karauos_footer',
        'priority' => 50,
    ) );
    $wp_customize->add_setting('copyright_field', array(
        'default' => __( 'All rights reserved.', 'karauos' ),
    ));
    $wp_customize->add_control(new Text_Editor_Custom_Control( $wp_customize, 'copyright_field', array(
        'label'  => __( 'Copyright text', 'karauos' ),
        'section' => 'copyright_settings',
        'description' => __( 'Write the copyright text here.', 'karauos' ),
        'priority' => 5,
    )));

    /**
     *  Footer back to top
     **/
    $wp_customize->add_section( 'back_to_top', array(
            'title'    => __( 'Back to Top', 'karauos' ),
            'panel'    => 'karauos_footer',
            'priority' => 50,
        )
    );
    $wp_customize->add_setting( 'back_to_top_toggle', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'back_to_top_toggle', array(
        'label'	      => __( 'Enable Back to Top', 'karauos' ),
        'section'     => 'back_to_top',
        'settings'    => 'back_to_top_toggle',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'back_to_top_bg_color', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'back_to_top_bg_color', array(
        'label'       => __( 'Background Color', 'karauos' ),
        'section'      => 'back_to_top',
        'settings'     => 'back_to_top_bg_color',
        'show_opacity' => true,
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'back_to_top_bg_hover_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'back_to_top_bg_hover_color', array(
        'label'       => __( 'Background Hover Color', 'karauos' ),
        'section'      => 'back_to_top',
        'settings'     => 'back_to_top_bg_hover_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'back_to_top_icon_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'back_to_top_icon_color', array(
        'label'       => __( 'Icon Color', 'karauos' ),
        'section'      => 'back_to_top',
        'settings'     => 'back_to_top_icon_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'back_to_top_border_radius', array( 'default' => 2, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'back_to_top_border_radius', array(
        'type'     => 'range-value',
        'section'  => 'back_to_top',
        'settings' => 'back_to_top_border_radius',
        'label'    => __( 'Border Radius', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 50,
            'step'   => 1,
            'suffix' => '%', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'back_to_top_position', array(
        'capability' => 'edit_theme_options',
        'default' => 'right',
    ) );
    $wp_customize->add_control( 'back_to_top_position', array(
        'type' => 'select',
        'section' => 'back_to_top', // Add a default or your own section
        'label' => __( 'Position', 'karauos' ),
        'choices' => array(
            'right' => __('Right', 'karauos'),
            'left' => __('Left', 'karauos'),
        ),
    ) );

    /*
    * Karauos - Blog Settings
    **/
    $wp_customize->add_panel( 'karauos_blog', array(
        'title'    => __( 'Karauos - Blog Settings', 'karauos' ),
        'priority' => 1,
    ) );


    $wp_customize->add_section( 'blog_style', array(
            'title'    => __( 'Blog', 'karauos' ),
            'panel'    => 'karauos_blog',
            'priority' => 50,
        )
    );
    $wp_customize->add_setting( 'sidebar_blog_toggle', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'sidebar_blog_toggle', array(
        'label'	      => __( 'Enable Sidebar', 'karauos' ),
        'section'     => 'blog_style',
        'settings'    => 'sidebar_blog_toggle',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'sidebar_position', array(
        'capability' => 'edit_theme_options',
        'default' => is_rtl() ? 'left' : 'right',
    ) );
    $wp_customize->add_control( 'sidebar_position', array(
        'type' => 'select',
        'section' => 'blog_style', // Add a default or your own section
        'label' => __( 'Sidebar position', 'karauos' ),
        'choices' => array(
            'left' => __( 'Left Sidebar', 'karauos' ),
            'right' => __( 'Right Sidebar', 'karauos' ),
        ),
    ) );

    $wp_customize->add_setting( 'readmore_text', array('capability' => 'edit_theme_options', 'default' => __( 'Read More', 'karauos' ), 'sanitize_callback' => 'sanitize_text_field',) );
    $wp_customize->add_control( 'readmore_text', array(
        'type' => 'text',
        'section' => 'blog_style', // Add a default or your own section
        'label' => __( 'Read more text', 'karauos' ),
    ) );
    $wp_customize->add_setting( 'blog_image_height', array( 'default' => 370 )  );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'blog_image_height', array(
        'type'     => 'range-value',
        'section'  => 'blog_style',
        'settings' => 'blog_image_height',
        'label'    => __( 'Blog image height', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 2000,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'color_blog_background_hover', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_blog_background_hover', array(
        'label'       => __( 'Hover Background Color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'color_blog_background_hover',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'color_blog_one', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_blog_one', array(
        'label'       => __( 'Blog Color #1', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'color_blog_one',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'color_blog_two', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_blog_two', array(
        'label'       => __( 'Blog Color #2', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'color_blog_two',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'color_blog_three', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_blog_three', array(
        'label'       => __( 'Blog Color #3', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'color_blog_three',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'readmore_text_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'readmore_text_color', array(
        'label'       => __( 'Read More Text Color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'readmore_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'readmore_bg_color', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'readmore_bg_color', array(
        'label'       => __( 'Read More background Color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'readmore_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'readmore_hover_text_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'readmore_hover_text_color', array(
        'label'       => __( 'Read More Hover Text Color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'readmore_hover_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'readmore_hover_bg_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'readmore_hover_bg_color', array(
        'label'       => __( 'Read More Hover background Color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'readmore_hover_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'navigation_bg_color_current', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'navigation_bg_color_current', array(
        'label'       => __( 'Navigation current background color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'navigation_bg_color_current',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'navigation_text_color_current', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'navigation_text_color_current', array(
        'label'       => __( 'Navigation current text color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'navigation_text_color_current',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'navigation_bg_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'navigation_bg_color', array(
        'label'       => __( 'Navigation background color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'navigation_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'navigation_text_color', array( 'default' => '#000', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'navigation_text_color', array(
        'label'       => __( 'Navigation text color', 'karauos' ),
        'section'      => 'blog_style',
        'settings'     => 'navigation_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );


    /*
    * Karauos - Single Settings
    **/
    $wp_customize->add_section( 'single_style', array(
            'title'    => __( 'Single', 'karauos' ),
            'panel'    => 'karauos_blog',
            'priority' => 50,
        )
    );
    $wp_customize->add_setting( 'sidebar_single_toggle', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'sidebar_single_toggle', array(
        'label'	      => __( 'Enable Sidebar', 'karauos' ),
        'section'     => 'single_style',
        'settings'    => 'sidebar_single_toggle',
        'type'        => 'light',// light, ios, flat
    ) ) );

    $wp_customize->add_setting( 'single_sidebar_position', array(
        'capability' => 'edit_theme_options',
        'default' => is_rtl() ? 'left' : 'right',
    ) );
    $wp_customize->add_control( 'single_sidebar_position', array(
        'type' => 'select',
        'section' => 'single_style', // Add a default or your own section
        'label' => __( 'Sidebar position', 'karauos' ),
        'choices' => array(
            'left' => __( 'Left Sidebar', 'karauos' ),
            'right' => __( 'Right Sidebar', 'karauos' ),
        ),
    ) );

    $wp_customize->add_setting( 'featured_image', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'featured_image', array(
        'label'	      => __( 'Enable featured image', 'karauos' ),
        'section'     => 'single_style',
        'settings'    => 'featured_image',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'image_fit', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'image_fit', array(
        'label'	      => __( 'Enable image fit', 'karauos' ),
        'section'     => 'single_style',
        'settings'    => 'image_fit',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'featured_image_height', array( 'default' => 390 )  );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'featured_image_height', array(
        'type'     => 'range-value',
        'section'  => 'single_style',
        'settings' => 'featured_image_height',
        'label'    => __( 'Featured image height', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 2000,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'author_box', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'author_box', array(
        'label'	      => __( 'Enable author box', 'karauos' ),
        'section'     => 'single_style',
        'settings'    => 'author_box',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'tags', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'tags', array(
        'label'	      => __( 'Enable tags', 'karauos' ),
        'section'     => 'single_style',
        'settings'    => 'tags',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'category', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'category', array(
        'label'	      => __( 'Enable category', 'karauos' ),
        'section'     => 'single_style',
        'settings'    => 'category',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'single_content_text', array( 'default' => '#282828', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_content_text', array(
        'label'       => __( 'Single content text Color', 'karauos' ),
        'section'      => 'single_style',
        'settings'     => 'single_content_text',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );

    $wp_customize->add_setting( 'single_content_link', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_content_link', array(
        'label'       => __( 'Single content link Color', 'karauos' ),
        'section'      => 'single_style',
        'settings'     => 'single_content_link',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'content_alignment', array('capability' => 'edit_theme_options') );
    $wp_customize->add_control( 'content_alignment', array(
        'type' => 'select',
        'section' => 'single_style', // Add a default or your own section
        'label' => __( 'Content alignment', 'karauos' ),
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
            'center' => 'Center',
            'justify' => 'Justify',
        ),
    ) );
    $wp_customize->add_setting( 'content_line_height', array( 'default' => 28 )  );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'content_line_height', array(
        'type'     => 'range-value',
        'section'  => 'single_style',
        'settings' => 'content_line_height',
        'label'    => __( 'Content line height', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 50,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );

    /*
    * Karauos - Sidebar Settings
    **/

    $wp_customize->add_section( 'sidebar_style', array(
            'title'    => __( 'Sidebar', 'karauos' ),
            'panel'    => 'karauos_blog',
            'priority' => 50,
        )
    );
    $wp_customize->add_setting( 'widgets_space', array( 'default' => 20, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'widgets_space', array(
        'type'     => 'range-value',
        'section'  => 'sidebar_style',
        'settings' => 'widgets_space',
        'label'    => __( 'Space between widgets', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'widgets_border_radius', array( 'default' => 5, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'widgets_border_radius', array(
        'type'     => 'range-value',
        'section'  => 'sidebar_style',
        'settings' => 'widgets_border_radius',
        'label'    => __( 'Border Radius', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'sidebar_bg_color', array( 'default' => '#211f1f', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'sidebar_bg_color', array(
        'label'       => __( 'Background Color', 'karauos' ),
        'section'      => 'sidebar_style',
        'settings'     => 'sidebar_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'sidebar_text_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'sidebar_text_color', array(
        'label'       => __( 'Text Color', 'karauos' ),
        'section'      => 'sidebar_style',
        'settings'     => 'sidebar_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );

    /*
    * Karauos - Projects Settings
    **/
    $wp_customize->add_panel( 'karauos_projects', array(
        'title'    => __( 'Karauos - Projects Settings', 'karauos' ),
        'priority' => 1,
    ) );

    $wp_customize->add_section( 'projects_style', array(
            'title'    => __( 'Project', 'karauos' ),
            'panel'    => 'karauos_projects',
            'priority' => 50,
        )
    );
    $wp_customize->add_setting( 'projects_sidebar_toggle', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'projects_sidebar_toggle', array(
        'label'	      => __( 'Enable Sidebar', 'karauos' ),
        'section'     => 'projects_style',
        'settings'    => 'projects_sidebar_toggle',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'projects_sidebar_position', array(
        'capability' => 'edit_theme_options',
        'default' => is_rtl() ? 'left' : 'right',
    ) );
    $wp_customize->add_control( 'projects_sidebar_position', array(
        'type' => 'select',
        'section' => 'projects_style', // Add a default or your own section
        'label' => __( 'Sidebar position', 'karauos' ),
        'choices' => array(
            'left' => __( 'Left Sidebar', 'karauos' ),
            'right' => __( 'Right Sidebar', 'karauos' ),
        ),
    ) );
    $wp_customize->add_setting( 'project_column', array( 'default' => 3 )  );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'project_column', array(
        'type'     => 'range-value',
        'section'  => 'projects_style',
        'settings' => 'project_column',
        'label'    => __( 'Project column', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 6,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'projects_image_height', array( 'default' => 350 )  );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'projects_image_height', array(
        'type'     => 'range-value',
        'section'  => 'projects_style',
        'settings' => 'projects_image_height',
        'label'    => __( 'Blog image height', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 1000,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'projects_color_background_hover', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_color_background_hover', array(
        'label'       => __( 'Hover Background Color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_color_background_hover',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );

    $wp_customize->add_setting( 'projects_icon_color', array( 'default' => '#051934', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_icon_color', array(
        'label'       => __( 'Icon Color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_icon_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_icon_bg_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_icon_bg_color', array(
        'label'       => __( 'Icon background Color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_icon_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_hover_icon_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_hover_icon_color', array(
        'label'       => __( 'Hover Icon Color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_hover_icon_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_hover_icon_bg_color', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_hover_icon_bg_color', array(
        'label'       => __( 'Hover Icon background Color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_hover_icon_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_navigation_bg_color_current', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_navigation_bg_color_current', array(
        'label'       => __( 'Navigation current background color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_navigation_bg_color_current',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_navigation_text_color_current', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_navigation_text_color_current', array(
        'label'       => __( 'Navigation current text color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_navigation_text_color_current',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_navigation_bg_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_navigation_bg_color', array(
        'label'       => __( 'Navigation background color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_navigation_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_navigation_text_color', array( 'default' => '#000', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_navigation_text_color', array(
        'label'       => __( 'Navigation text color', 'karauos' ),
        'section'      => 'projects_style',
        'settings'     => 'projects_navigation_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );


    /*
    * Karauos - Projects Single Settings
    **/
    $wp_customize->add_section( 'projects_single_style', array(
            'title'    => __( 'Single', 'karauos' ),
            'panel'    => 'karauos_projects',
            'priority' => 50,
        )
    );
    $wp_customize->add_setting( 'projects_single_sidebar_toggle', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'projects_single_sidebar_toggle', array(
        'label'	      => __( 'Enable Sidebar', 'karauos' ),
        'section'     => 'projects_single_style',
        'settings'    => 'projects_single_sidebar_toggle',
        'type'        => 'light',// light, ios, flat
    ) ) );

    $wp_customize->add_setting( 'projects_single_sidebar_position', array(
        'capability' => 'edit_theme_options',
        'default' => is_rtl() ? 'left' : 'right',
    ) );
    $wp_customize->add_control( 'projects_single_sidebar_position', array(
        'type' => 'select',
        'section' => 'projects_single_style', // Add a default or your own section
        'label' => __( 'Sidebar position', 'karauos' ),
        'choices' => array(
            'left' => __( 'Left Sidebar', 'karauos' ),
            'right' => __( 'Right Sidebar', 'karauos' ),
        ),
    ) );

    $wp_customize->add_setting( 'projects_featured_image', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'projects_featured_image', array(
        'label'	      => __( 'Enable featured image', 'karauos' ),
        'section'     => 'projects_single_style',
        'settings'    => 'projects_featured_image',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'projects_image_fit', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'projects_image_fit', array(
        'label'	      => __( 'Enable image fit', 'karauos' ),
        'section'     => 'projects_single_style',
        'settings'    => 'projects_image_fit',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'projects_featured_image_height', array( 'default' => 390 )  );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'projects_featured_image_height', array(
        'type'     => 'range-value',
        'section'  => 'projects_single_style',
        'settings' => 'projects_featured_image_height',
        'label'    => __( 'Featured image height', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 2000,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'projects_author_box', array( 'default' => false ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'projects_author_box', array(
        'label'	      => __( 'Enable author box', 'karauos' ),
        'section'     => 'projects_single_style',
        'settings'    => 'projects_author_box',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'projects_tags', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'projects_tags', array(
        'label'	      => __( 'Enable tags', 'karauos' ),
        'section'     => 'projects_single_style',
        'settings'    => 'projects_tags',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'projects_category', array( 'default' => true ));
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'projects_category', array(
        'label'	      => __( 'Enable category', 'karauos' ),
        'section'     => 'projects_single_style',
        'settings'    => 'projects_category',
        'type'        => 'light',// light, ios, flat
    ) ) );
    $wp_customize->add_setting( 'projects_single_content_text', array( 'default' => '#282828', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_single_content_text', array(
        'label'       => __( 'Single content text Color', 'karauos' ),
        'section'      => 'projects_single_style',
        'settings'     => 'projects_single_content_text',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );

    $wp_customize->add_setting( 'projects_single_content_link', array( 'default' => '#eead16', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_single_content_link', array(
        'label'       => __( 'Single content link Color', 'karauos' ),
        'section'      => 'projects_single_style',
        'settings'     => 'projects_single_content_link',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_content_alignment', array('capability' => 'edit_theme_options') );
    $wp_customize->add_control( 'projects_content_alignment', array(
        'type' => 'select',
        'section' => 'projects_content_alignment', // Add a default or your own section
        'label' => __( 'Content alignment', 'karauos' ),
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
            'center' => 'Center',
            'justify' => 'Justify',
        ),
    ) );
    $wp_customize->add_setting( 'projects_content_line_height', array( 'default' => 28 )  );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'projects_content_line_height', array(
        'type'     => 'range-value',
        'section'  => 'projects_single_style',
        'settings' => 'projects_content_line_height',
        'label'    => __( 'Content line height', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 50,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );

    /*
    * Karauos - Projects Sidebar Settings
    **/

    $wp_customize->add_section( 'projects_sidebar_style', array(
            'title'    => __( 'Sidebar', 'karauos' ),
            'panel'    => 'karauos_projects',
            'priority' => 50,
        )
    );
    $wp_customize->add_setting( 'projects_widgets_space', array( 'default' => 20, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'projects_widgets_space', array(
        'type'     => 'range-value',
        'section'  => 'projects_sidebar_style',
        'settings' => 'projects_widgets_space',
        'label'    => __( 'Space between widgets', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'projects_widgets_border_radius', array( 'default' => 5, ) );
    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'projects_widgets_border_radius', array(
        'type'     => 'range-value',
        'section'  => 'projects_sidebar_style',
        'settings' => 'projects_widgets_border_radius',
        'label'    => __( 'Border Radius', 'karauos' ),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 100,
            'step'   => 1,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );
    $wp_customize->add_setting( 'projects_sidebar_bg_color', array( 'default' => '#211f1f', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_sidebar_bg_color', array(
        'label'       => __( 'Background Color', 'karauos' ),
        'section'      => 'projects_sidebar_style',
        'settings'     => 'projects_sidebar_bg_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );
    $wp_customize->add_setting( 'projects_sidebar_text_color', array( 'default' => '#fff', ) );
    $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'projects_sidebar_text_color', array(
        'label'       => __( 'Text Color', 'karauos' ),
        'section'      => 'projects_sidebar_style',
        'settings'     => 'projects_sidebar_text_color',
        'show_opacity' => true, // Optional.
        'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
    ) ) );



    if ( woo ) {
        /*
        * Karauos - General Settings
        **/
        $wp_customize->add_panel( 'karauos_woocommerce', array(
            'title'    => __( 'Karauos - Woocommerce Settings', 'karauos' ),
            'priority' => 1,
        ) );
        /**
         *  WooCommerce Archive
         **/
        $wp_customize->add_section( 'woocommerce_archive_style', array(
            'title'       => __( 'Archive Style', 'karauos' ),
            'priority'    => 30,
            'panel'       => 'karauos_woocommerce',
        ) );
        $wp_customize->add_setting( 'woocamerce_sidebar_toggle', array( 'default' => false ));
        $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'woocamerce_sidebar_toggle', array(
            'label'	      => __( 'Enable Sidebar', 'karauos' ),
            'section'     => 'woocommerce_archive_style',
            'settings'    => 'woocamerce_sidebar_toggle',
            'type'        => 'light',// light, ios, flat
        ) ) );
        $wp_customize->add_setting( 'sort_by_color', array( 'default' => '#282828', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'sort_by_color', array(
            'label'       => __( 'Sort by text color', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'sort_by_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'sort_by_hover_bg_color', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'sort_by_hover_bg_color', array(
            'label'       => __( 'Sort by hover background color', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'sort_by_hover_bg_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'sort_by_hover_color', array( 'default' => '#FFF', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'sort_by_hover_color', array(
            'label'       => __( 'Sort by hover text color', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'sort_by_hover_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'color_price', array( 'default' => '#051934', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_price', array(
            'label'       => __( 'Color Price', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'color_price',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'bg_color_price', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'bg_color_price', array(
            'label'       => __( 'Background Color Price', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'bg_color_price',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'color_price_special_sale', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_price_special_sale', array(
            'label'       => __( 'Color Price Special Sale', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'color_price_special_sale',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'bg_color_price_special_sale', array( 'default' => '#051934', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'bg_color_price_special_sale', array(
            'label'       => __( 'Background Color Price Special Sale', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'bg_color_price_special_sale',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'products_border_color', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'products_border_color', array(
            'label'       => __( 'Products Border Color', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'products_border_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'products_title_color', array( 'default' => '#051934', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'products_title_color', array(
            'label'       => __( 'Products Title Color', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'products_title_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'products_hover_title_color', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'products_hover_title_color', array(
            'label'       => __( 'Products Hover Title Color', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'products_hover_title_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'background_color_add_to_cart_button', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'background_color_add_to_cart_button', array(
            'label'       => __( 'Background Color Add To Cart Button', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'background_color_add_to_cart_button',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'color_add_to_cart_button', array( 'default' => '#051934', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'color_add_to_cart_button', array(
            'label'       => __( 'Text Color Add To Cart Button', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'color_add_to_cart_button',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'background_added_to_cart_color', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'background_added_to_cart_color', array(
            'label'       => __( 'Background Color Added To Cart Button', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'background_added_to_cart_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'text_added_to_cart_color', array( 'default' => '#051934', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'text_added_to_cart_color', array(
            'label'       => __( 'Text Color Added To Cart Button', 'karauos' ),
            'section'      => 'woocommerce_archive_style',
            'settings'     => 'text_added_to_cart_color',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );

        /**
         *  WooCommerce Single
         **/
        $wp_customize->add_section( 'woocommerce_single_style', array(
            'title'       => __( 'Single Style', 'karauos' ),
            'priority'    => 30,
            'panel'       => 'karauos_woocommerce',
        ) );

        $wp_customize->add_setting( 'single_product_title', array( 'default' => '#000', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_product_title', array(
            'label'       => __( 'Single Product Title', 'karauos' ),
            'section'      => 'woocommerce_single_style',
            'settings'     => 'single_product_title',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'single_product_title_size', array( 'default' => 36, ) );
        $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'single_product_title_size', array(
            'type'     => 'range-value',
            'section'  => 'woocommerce_single_style',
            'settings' => 'single_product_title_size',
            'label'    => __( 'Title Size', 'karauos' ),
            'input_attrs' => array(
                'min'    => 1,
                'max'    => 100,
                'step'   => 1,
                'suffix' => 'px', //optional suffix
            ),
        ) ) );
        $wp_customize->add_setting( 'single_product_price', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_product_price', array(
            'label'       => __( 'Single Product Price', 'karauos' ),
            'section'      => 'woocommerce_single_style',
            'settings'     => 'single_product_price',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'single_product_add_to_cart_button_background', array( 'default' => '#eead16', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_product_add_to_cart_button_background', array(
            'label'       => __( 'Single Product Add To Cart Button Background', 'karauos' ),
            'section'      => 'woocommerce_single_style',
            'settings'     => 'single_product_add_to_cart_button_background',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'single_product_add_to_cart_button_text', array( 'default' => '#051934', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_product_add_to_cart_button_text', array(
            'label'       => __( 'Single Product Add To Cart Button Text', 'karauos' ),
            'section'      => 'woocommerce_single_style',
            'settings'     => 'single_product_add_to_cart_button_text',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'single_product_add_to_cart_hover_button_background', array( 'default' => '#051934', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_product_add_to_cart_hover_button_background', array(
            'label'       => __( 'Single Product Add To Cart Hover Button Background', 'karauos' ),
            'section'      => 'woocommerce_single_style',
            'settings'     => 'single_product_add_to_cart_hover_button_background',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
        $wp_customize->add_setting( 'single_product_add_to_cart_hover_button_text', array( 'default' => '#fff', ) );
        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'single_product_add_to_cart_hover_button_text', array(
            'label'       => __( 'Single Product Add To Cart Hover Button Text', 'karauos' ),
            'section'      => 'woocommerce_single_style',
            'settings'     => 'single_product_add_to_cart_hover_button_text',
            'show_opacity' => true, // Optional.
            'palette'      => array( '#000','#fff','#df312c', '#df9a23','#eef000','#7ed934','#1571c1','#8309e7' )
        ) ) );
    }

}

add_action( 'customize_register', 'karauos_customize_register' );