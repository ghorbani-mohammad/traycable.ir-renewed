<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Themento_Video extends Widget_Base {

    public function get_name() {
        return 'themento_video';
    }

    public function get_title() {
        return __( 'Aparat', 'karauos' );
    }

    public function get_categories() {
        return [ 'karauos' ];
    }

    public function get_icon() {
        return 'eicon-play';
    }

    public function get_keywords() {
        return [ 'heading', 'header', 'page' ];
    }

    protected function _register_controls() {
        $this->register_general_style_controls();
    }

    protected function register_general_style_controls() {
        $this->start_controls_section(
            'section_general_style',
            [
                'label' => __( 'Content', 'karauos' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'aparat_id',
            [
                'label' => __( 'Aparat ID', 'karauos' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'aMt62', 'karauos' ),
                'description' => __( 'Paste the video ID from the address bar For example the video address https://www.aparat.com/v/aMt62 Just put aMt62 ID', 'karauos' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        echo '<div class="h_iframe-aparat_embed_frame"><span class="aparat_embed_frame_span"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/'. $settings['aparat_id'] . '/vt/frame" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>';

    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_Video );