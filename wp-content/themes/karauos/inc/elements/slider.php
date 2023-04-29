<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class Themento_slider_widget extends Widget_Base{

    public function get_name(){
        return 'themento_slides';
    }

    public function get_title(){
        return __( 'Slider', 'karauos' );
    }

    public function get_icon() {
        return 'eicon-slider-device';
    }

    public function get_categories() {
        return [ 'karauos' ];
    }

    public function get_keywords() {
        return [ 'slides', 'carousel', 'image', 'title', 'slider' ];
    }

    public static function get_button_sizes() {
        return [
	        'xs' => __( 'Extra Small', 'karauos' ),
	        'sm' => __( 'Small', 'karauos' ),
	        'md' => __( 'Medium', 'karauos' ),
	        'lg' => __( 'Large', 'karauos' ),
	        'xl' => __( 'Extra Large', 'karauos' ),
        ];
    }

    protected function _register_controls() {
        $this->register_general_slide_controls();
        $this->register_general_slide_setting_controls();
        $this->register_general_slide_style_controls();
        $this->register_general_slide_title_style_controls();
        $this->register_general_slide_description_style_controls();
        $this->register_general_slide_button_style_controls();
        $this->register_general_slide_navigation_style_controls();
    }

    protected function register_general_slide_controls() {
        $this->start_controls_section(
            'section_slides',
            [
                'label' => __( 'Slides', 'karauos' ),
            ]
        );

        $repeater = new Repeater();
        $repeater->start_controls_tabs( 'slides_repeater' );
        $repeater->start_controls_tab( 'background', [ 'label' => __( 'Background', 'karauos' ) ] );

        $repeater->add_control(
            'background_color',
            [
                'label' => __( 'Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#bbbbbb',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-bg' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $repeater->add_control(
            'background_image',
            [
                'label' => _x( 'Image', 'Background Control', 'karauos' ),
                'type' => Controls_Manager::MEDIA,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-bg' => 'background-image: url({{URL}})',
                ],
            ]
        );
        $repeater->add_control(
            'background_size',
            [
                'label' => _x( 'Size', 'Background Control', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => _x( 'Cover', 'Background Control', 'karauos' ),
                    'contain' => _x( 'Contain', 'Background Control', 'karauos' ),
                    'auto' => _x( 'Auto', 'Background Control', 'karauos' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-bg' => 'background-size: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'animation_bg',
            [
                'label' => __( 'Background Animate', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'animation_bg_style',
            [
                'label' => __( 'Background Animation Type', 'karauos' ),
                'type' => Controls_Manager::ANIMATION,
                'default' => 'bounceIn',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'animation_bg',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'animation_bg_speed',
            [
                'label' => __( 'Background Animation Speed', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 's' ],
                'range' => [
                    's' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 2,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'animation_bg',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .animation-bg' => '-webkit-animation-duration: {{SIZE}}{{UNIT}}; animation-duration: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $repeater->add_control(
            'animation_text',
            [
                'label' => __( 'Text Animate', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'animation_text_style',
            [
                'label' => __( 'Text Animation Type', 'karauos' ),
                'type' => Controls_Manager::ANIMATION,
                'default' => 'bounceIn',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'animation_text',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'background_overlay',
            [
                'label' => __( 'Background Overlay', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'background_overlay_color',
            [
                'label' => __( 'Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.5)',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_overlay',
                            'value' => 'yes',
                        ],
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner .elementor-background-overlay' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $repeater->add_control(
            'background_overlay_blend_mode',
            [
                'label' => __( 'Blend Mode', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __( 'Normal', 'karauos' ),
                    'multiply' => 'Multiply',
                    'screen' => 'Screen',
                    'overlay' => 'Overlay',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'color-dodge' => 'Color Dodge',
                    'color-burn' => 'Color Burn',
                    'hue' => 'Hue',
                    'saturation' => 'Saturation',
                    'color' => 'Color',
                    'exclusion' => 'Exclusion',
                    'luminosity' => 'Luminosity',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_overlay',
                            'value' => 'yes',
                        ],
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner .elementor-background-overlay' => 'mix-blend-mode: {{VALUE}}',
                ],
            ]
        );
        $repeater->end_controls_tab();
        $repeater->start_controls_tab( 'content', [ 'label' => __( 'Content', 'karauos' ) ] );

        $repeater->add_control(
            'heading',
            [
                'label' => __( 'Title & Description', 'karauos' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Slide Heading', 'karauos' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'karauos' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'karauos' ),
                'show_label' => false,
            ]
        );
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'karauos' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Click Here', 'karauos' ),
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'karauos' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'karauos' ),
            ]
        );
        $repeater->add_control(
            'link_click',
            [
                'label' => __( 'Apply Link On', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'slide' => __( 'Whole Slide', 'karauos' ),
                    'button' => __( 'Button Only', 'karauos' ),
                ],
                'default' => 'slide',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'link[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );
        $repeater->end_controls_tab();
        $repeater->start_controls_tab( 'style', [ 'label' => __( 'Style', 'karauos' ) ] );
        $repeater->add_control(
            'custom_style',
            [
                'label' => __( 'Custom', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'description' => __( 'Set custom style that will only affect this specific slide.', 'karauos' ),
            ]
        );
        $repeater->add_control(
            'horizontal_position',
            [
                'label' => __( 'Horizontal Position', 'karauos' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'karauos' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'karauos' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'karauos' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner .elementor-slide-content' => '{{VALUE}}',
                ],
                'selectors_dictionary' => [
                    'left' => 'margin-right: auto',
                    'center' => 'margin: 0 auto',
                    'right' => 'margin-left: auto',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'custom_style',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'vertical_position',
            [
                'label' => __( 'Vertical Position', 'karauos' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'karauos' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => __( 'Middle', 'karauos' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'karauos' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner' => 'align-items: {{VALUE}}',
                ],
                'selectors_dictionary' => [
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'custom_style',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'text_align',
            [
                'label' => __( 'Text Align', 'karauos' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'karauos' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'karauos' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'karauos' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner' => 'text-align: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'custom_style',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner .elementor-slide-heading' => 'color: {{VALUE}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner .elementor-slide-description' => 'color: {{VALUE}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-inner .elementor-slide-button' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'custom_style',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'slides',
            [
                'label' => __( 'Slides', 'karauos' ),
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'heading' => __( 'Slide 1 Heading', 'karauos' ),
                        'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'karauos' ),
                        'button_text' => __( 'Click Here', 'karauos' ),
                        'background_color' => '#833ca3',
                    ],
                    [
                        'heading' => __( 'Slide 2 Heading', 'karauos' ),
                        'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'karauos' ),
                        'button_text' => __( 'Click Here', 'karauos' ),
                        'background_color' => '#4054b2',
                    ],
                    [
                        'heading' => __( 'Slide 3 Heading', 'karauos' ),
                        'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'karauos' ),
                        'button_text' => __( 'Click Here', 'karauos' ),
                        'background_color' => '#1abc9c',
                    ],
                ],
                'title_field' => '{{{ heading }}}',
            ]
        );
        $this->add_responsive_control(
            'slides_height',
            [
                'label' => __( 'Height', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 400,
                ],
                'size_units' => [ 'px', 'vh', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-slide' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_slide_setting_controls() {
        $this->start_controls_section(
            'section_slider_options',
            [
                'label' => __( 'Slider Options', 'karauos' ),
                'type' => Controls_Manager::SECTION,
            ]
        );
        $this->add_control(
            'navigation',
            [
                'label' => __( 'Navigation', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'both',
                'options' => [
                    'both' => __( 'Arrows and Dots', 'karauos' ),
                    'arrows' => __( 'Arrows', 'karauos' ),
                    'dots' => __( 'Dots', 'karauos' ),
                    'none' => __( 'None', 'karauos' ),
                ],
            ]
        );
        $this->add_control(
            'pause_on_hover',
            [
                'label' => __( 'Pause on Hover', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed', 'karauos' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 2000,
                'condition' => [
                    'autoplay' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-slide-bg' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
                ],
            ]
        );
        $this->add_control(
            'infinite',
            [
                'label' => __( 'Infinite Loop', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'transition',
            [
                'label' => __( 'Transition', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'slide',
                'options' => [
                    'slide' => __( 'Slide', 'karauos' ),
                    'fade' => __( 'Fade', 'karauos' ),
                ],
            ]
        );
        $this->add_control(
            'transition_speed',
            [
                'label' => __( 'Transition Speed', 'karauos' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 500,
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_slide_style_controls() {
        $this->start_controls_section(
            'section_style_slides',
            [
                'label' => __( 'Slides', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_max_width',
            [
                'label' => __( 'Content Width', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => [ '%', 'px' ],
                'default' => [
                    'size' => '66',
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slides_padding',
            [
                'label' => __( 'Padding', 'karauos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-slide-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slides_border_radius',
            [
                'label' => __( 'Border Radius', 'karauos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'slides_horizontal_position',
            [
                'label' => __( 'Horizontal Position', 'karauos' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'default' => 'center',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'karauos' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'karauos' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'karauos' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                ],
                'prefix_class' => 'elementor--h-position-',
            ]
        );
        $this->add_control(
            'slides_vertical_position',
            [
                'label' => __( 'Vertical Position', 'karauos' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'default' => 'middle',
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'karauos' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => __( 'Middle', 'karauos' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'karauos' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'prefix_class' => 'elementor--v-position-',
            ]
        );
        $this->add_control(
            'slides_text_align',
            [
                'label' => __( 'Text Align', 'karauos' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'right' => [
                        'title' => __( 'Right', 'karauos' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'karauos' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'left' => [
                        'title' => __( 'Left', 'karauos' ),
                        'icon' => 'fa fa-align-left',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .slick-slide-inner' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_slide_title_style_controls() {
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => __( 'Title', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_spacing',
            [
                'label' => __( 'Spacing', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-slide-inner .elementor-slide-heading:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Text Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-heading' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .elementor-slide-heading',
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_slide_description_style_controls() {
        $this->start_controls_section(
            'section_style_description',
            [
                'label' => __( 'Description', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'description_spacing',
            [
                'label' => __( 'Spacing', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-slide-inner .elementor-slide-description:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-description' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .elementor-slide-description',
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_slide_button_style_controls() {
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => __( 'Button', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'button_size',
            [
                'label' => __( 'Size', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'sm',
                'options' => self::get_button_sizes(),
            ]
        );
        $this->add_control( 'button_color',
            [
                'label' => __( 'Text Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button' => 'color: {{VALUE}}; border-color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .elementor-slide-button',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );
        $this->add_control(
            'button_border_width',
            [
                'label' => __( 'Border Width', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->start_controls_tabs( 'button_tabs' );
        $this->start_controls_tab( 'normal', [ 'label' => __( 'Normal', 'karauos' ) ] );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_background_color',
            [
                'label' => __( 'Background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_border_color',
            [
                'label' => __( 'Border Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab( 'hover', [ 'label' => __( 'Hover', 'karauos' ) ] );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __( 'Text Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_hover_background_color',
            [
                'label' => __( 'Background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slide-button:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    protected function register_general_slide_navigation_style_controls() {
        $this->start_controls_section(
            'section_style_navigation',
            [
                'label' => __( 'Navigation', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'navigation' => [ 'arrows', 'dots', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'heading_style_arrows',
            [
                'label' => __( 'Arrows', 'karauos' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'arrows_position',
            [
                'label' => __( 'Arrows Position', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'inside',
                'options' => [
                    'inside' => __( 'Inside', 'karauos' ),
                    'outside' => __( 'Outside', 'karauos' ),
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'arrows_size',
            [
                'label' => __( 'Arrows Size', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 60,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:before' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->start_controls_tabs( 'arrows_icon_tabs' );
        $this->start_controls_tab( 'arrows_icon_normal', [ 'label' => __( 'Normal', 'karauos' ) ] );

        $this->add_control(
            'arrows_color',
            [
                'label' => __( 'Icon Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:before' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'arrows_background_color',
            [
                'label' => __( 'Background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab( 'arrows_icon_hover', [ 'label' => __( 'Hover', 'karauos' ) ] );

        $this->add_control(
            'arrows_hover_color',
            [
                'label' => __( 'Icon Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:hover:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:hover:before' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'arrows_hover_background_color',
            [
                'label' => __( 'Background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:hover:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:hover:before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'heading_style_dots',
            [
                'label' => __( 'Dots', 'karauos' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'navigation' => [ 'dots', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'dots_position',
            [
                'label' => __( 'Dots Position', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'inside',
                'options' => [
                    'outside' => __( 'Outside', 'karauos' ),
                    'inside' => __( 'Inside', 'karauos' ),
                ],
                'condition' => [
                    'navigation' => [ 'dots', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'dots_size',
            [
                'label' => __( 'Dots Size', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 15,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .elementor-slides .slick-dots li button:before' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation' => [ 'dots', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'dots_color',
            [
                'label' => __( 'Dots Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .elementor-slides .slick-dots li button:before' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'dots', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'dot_active_size',
            [
                'label' => __( 'Active Dot Color', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .elementor-slides .slick-dots li.slick-active button:before' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation' => [ 'dots', 'both' ],
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        if ( empty( $settings['slides'] ) ) {
            return;
        }

        $slides = [];
        $slide_count = 0;

        foreach ( $settings['slides'] as $slide ) {
            $slide_html = '';
            $btn_attributes = '';
            $slide_attributes = '';
            $slide_element = 'div';
            $btn_element = 'div';
            $slide_url = $slide['link']['url'];

            if ( ! empty( $slide_url ) ) {
                $this->add_render_attribute( 'slide_link' . $slide_count, 'href', $slide_url );

                if ( $slide['link']['is_external'] ) {
                    $this->add_render_attribute( 'slide_link' . $slide_count, 'target', '_blank' );
                }

                if ( 'button' === $slide['link_click'] ) {
                    $btn_element = 'a';
                    $btn_attributes = $this->get_render_attribute_string( 'slide_link' . $slide_count );
                } else {
                    $slide_element = 'a';
                    $slide_attributes = $this->get_render_attribute_string( 'slide_link' . $slide_count );
                }
            }

            $txt_ani_class = '';
            if ( '' != $slide['animation_text'] ) {
                $txt_ani_class = ' elementor-ken-' . $slide['animation_text_style'];
            }

            if ( ! empty( $settings['button_size'] ) ) {
                $button_size_class = ' elementor-size-' . $settings['button_size'];
            }

            $ken_class = '';
            if ( '' != $slide['animation_bg'] ) {
                $ken_class = ' animation-bg elementor-ken-' . $slide['animation_bg_style'];
            }

            if ( 'yes' === $slide['background_overlay'] ) {
                $slide_html .= '<div class="elementor-background-overlay' . $ken_class . '"></div>';
            }

            $slide_html .= '<div class="elementor-slide-content">';

            if ( $slide['heading'] ) {
                $slide_html .= '<div class="elementor-slide-heading' . $txt_ani_class . '">' . $slide['heading'] . '</div>';
            }

            if ( $slide['description'] ) {
                $slide_html .= '<div class="elementor-slide-description' . $txt_ani_class . '">' . $slide['description'] . '</div>';
            }

            if ( $slide['button_text'] ) {
                $button_text = $slide['button_text'];
                $slide_html .= "<$btn_element $btn_attributes class='elementor-button elementor-slide-button $txt_ani_class $button_size_class'>$button_text</$btn_element>";
            }

            $slide_html .= '</div>';
            $slide_html = '<div class="slick-slide-bg' . $ken_class . '"></div><' . $slide_element . ' ' . $slide_attributes . ' class="slick-slide-inner">' . $slide_html . '</' . $slide_element . '>';
            $slides[] = '<div class="elementor-repeater-item-' . $slide['_id'] . ' slick-slide">' . $slide_html . '</div>';
            $slide_count++;
        }

        $is_rtl = is_rtl();
        $direction = $is_rtl ? 'rtl' : 'ltr';
        $show_dots = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
        $show_arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );

        $slick_options = [
            'slidesToShow' => absint( 1 ),
            'autoplaySpeed' => absint( $settings['autoplay_speed'] ),
            'autoplay' => ( 'yes' === $settings['autoplay'] ),
            'infinite' => ( 'yes' === $settings['infinite'] ),
            'pauseOnHover' => ( 'yes' === $settings['pause_on_hover'] ),
            'speed' => absint( $settings['transition_speed'] ),
            'arrows' => $show_arrows,
            'dots' => $show_dots,
            'rtl' => $is_rtl,
        ];

        if ( 'fade' === $settings['transition'] ) {
            $slick_options['fade'] = true;
        }

        $carousel_classes = [ 'elementor-slides' ];

        if ( $show_arrows ) {
            $carousel_classes[] = 'slick-arrows-' . $settings['arrows_position'];
        }

        if ( $show_dots ) {
            $carousel_classes[] = 'slick-dots-' . $settings['dots_position'];
        }

        $this->add_render_attribute( 'slides', [
            'class' => $carousel_classes,
            'data-slick' => wp_json_encode( $slick_options ),
        ] );

        ?>
        <div class="elementor-slides-wrapper elementor-slick-slider" dir="<?php echo esc_attr( $direction ); ?>">
            <div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>
                <?php echo implode( '', $slides ); ?>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <#
        var isRtl           = <?php echo is_rtl() ? 'true' : 'false'; ?>,
        direction       = isRtl ? 'rtl' : 'ltr',
        navi            = settings.navigation,
        showDots        = ( 'dots' === navi || 'both' === navi ),
        showArrows      = ( 'arrows' === navi || 'both' === navi ),
        autoplay        = ( 'yes' === settings.autoplay ),
        infinite        = ( 'yes' === settings.infinite ),
        speed           = Math.abs( settings.transition_speed ),
        autoplaySpeed   = Math.abs( settings.autoplay_speed ),
        fade            = ( 'fade' === settings.transition ),
        buttonSize      = settings.button_size,
        sliderOptions = {
        "initialSlide": Math.max( 0, editSettings.activeItemIndex-1 ),
        "slidesToShow": 1,
        "autoplaySpeed": autoplaySpeed,
        "autoplay": false,
        "infinite": infinite,
        "pauseOnHover":true,
        "pauseOnFocus":true,
        "speed": speed,
        "arrows": showArrows,
        "dots": showDots,
        "rtl": isRtl,
        "fade": fade
        }
        sliderOptionsStr = JSON.stringify( sliderOptions );
        if ( showArrows ) {
        var arrowsClass = 'slick-arrows-' + settings.arrows_position;
        }

        if ( showDots ) {
        var dotsClass = 'slick-dots-' + settings.dots_position;
        }

        #>
        <div class="elementor-slides-wrapper elementor-slick-slider" dir="{{ direction }}">
            <div data-slick="{{ sliderOptionsStr }}" class="elementor-slides {{ dotsClass }} {{ arrowsClass }}">
                <# _.each( settings.slides, function( slide ) { #>
                <div class="elementor-repeater-item-{{ slide._id }} slick-slide">
                    <#
                    var kenClass = '';

                    if ( '' != slide.animation_bg ) {
                    kenClass = ' animation-bg elementor-ken-' + slide.animation_bg_style;
                    }

                    var txtAniClass = '';

                    if ( '' != slide.animation_text ) {
                    txtAniClass = ' elementor-ken-' + slide.animation_text_style;
                    }
                    #>
                    <div class="slick-slide-bg{{ kenClass }}"></div>
                    <div class="slick-slide-inner">
                        <# if ( 'yes' === slide.background_overlay ) { #>
                        <div class="elementor-background-overlay{{ kenClass }}"></div>
                        <# } #>
                        <div class="elementor-slide-content">
                            <# if ( slide.heading ) { #>
                            <div class="elementor-slide-heading{{ txtAniClass }}">{{{ slide.heading }}}</div>
                            <# }
                            if ( slide.description ) { #>
                            <div class="elementor-slide-description{{ txtAniClass }}">{{{ slide.description }}}</div>
                            <# }
                            if ( slide.button_text ) { #>
                            <div class="elementor-button elementor-slide-button{{ txtAniClass }} elementor-size-{{ buttonSize }}">{{{ slide.button_text }}}</div>
                            <# } #>
                        </div>
                    </div>
                </div>
                <# } ); #>
            </div>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_slider_widget );