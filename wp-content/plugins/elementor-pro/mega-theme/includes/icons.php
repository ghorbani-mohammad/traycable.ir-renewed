<?php
defined('ABSPATH') || exit ("no access");

// enqueue css file into editor
function megatheme_new_icon(){
    wp_enqueue_style( 'mega-theme-icon', ELEMENTOR_PRO_URL. 'mega-theme/includes/icon/style.css');
}
add_action( 'elementor/editor/after_enqueue_styles', 'megatheme_new_icon' );
//enqueue css file for front-end
function megatheme_core_assets() {
    wp_enqueue_style( 'mega-theme-icon', ELEMENTOR_PRO_URL . 'mega-theme/includes/icon/style.css');
}
add_action( 'wp_enqueue_scripts', 'megatheme_core_assets' );



add_filter( 'elementor/icons_manager/native', 'add_megatheme_to_icon_manager');

function add_megatheme_to_icon_manager( $settings ) {
    $json_dir=__DIR__.'/icon/config.json';
    if (!file_exists($json_dir)){
            $style_file=__DIR__.'/icon/style.css';
            if (!file_exists($style_file)) return $settings;
            $style_file=file_get_contents($style_file);
            preg_match_all('/\.m-icon-(.*)?:/',$style_file,$icon_list);
            if (isset($icon_list[1])){
                $icon_list=$icon_list[1];
            }
            $icon_list=implode('","',$icon_list);
            $icon_list='{ "icons": [ "'.$icon_list.'" ] }';
            file_put_contents($json_dir,$icon_list);
    }

    $json_url = ELEMENTOR_PRO_URL . 'mega-theme/includes/icon/config.json';

    $settings['eicons'] = [
        'name'          => 'آیکون های ایرانی',
        'label'         => 'آیکون های ایرانی',
        'url'           => false,
        'enqueue'       => false,
        'prefix'        => 'm-icon-',
        'displayPrefix' => '',
        'labelIcon'     => 'megatheme',
        'ver'           => '1.0.0',
        'fetchJson'     => $json_url,
        'native'        => true,
    ];

    return $settings;
}