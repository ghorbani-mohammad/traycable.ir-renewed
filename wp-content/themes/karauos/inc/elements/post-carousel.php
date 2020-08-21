<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Themento_Post_Carousel extends Widget_Base {

    public function get_name() {
        return 'themento_post_carousel';
    }

    public function get_title() {
        return __( 'Post Carousel', 'karauos' );
    }

    public function get_categories() {
        return [ 'karauos' ];
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    protected function _register_controls() {
        $this->register_general_post_carousel_controls();
        $this->register_general_post_carousel_slider_setting_controls();
        $this->register_general_post_carousel_style_controls();
        $this->register_general_post_carousel_style_slider_controls();
        $this->register_post_carousel_title_style_controls();
        $this->register_post_carousel_icon_style_controls();
    }

    protected function register_general_post_carousel_controls() {
        $this->start_controls_section(
            'section_post_carousel',
            [
                'label' => __( 'Post Settings', 'karauos' )
            ]
        );
        $this->add_control(
            'post_type_carousel',
            [
                'label' => __( 'Post Type', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
	                'post' => __( 'Posts', 'karauos' ),
	                'portfolio' => __( 'Project', 'karauos' ),
                ],
                'default' => 'portfolio',

            ]
        );
        $this->add_control(
            'category_carousel',
            [
                'label' => __( 'Categories', 'karauos' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => themento_post_type_categories(),
                'condition' => [
                    'post_type_carousel' => 'post'
                ]
            ]
        );
        $this->add_control(
            'portfolio_carousel',
            [
                'label' => __( 'Categories', 'karauos' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => themento_post_type_portfolio_cat(),
                'condition' => [
                    'post_type_carousel' => 'portfolio'
                ]
            ]
        );
        $this->add_control(
            'posts_count_carousel',
            [
	            'label' => __( 'Number of Posts', 'karauos' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '6'
            ]
        );
        $this->add_control(
            'post_order_carousel',
            [
	            'label' => __( 'Order', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'asc' => __( 'Ascending', 'karauos' ),
					'desc' => __( 'Descending', 'karauos' )
				],
                'default' => 'desc',

            ]
        );
        $this->add_control(
            'post_carousel_columns',
            [
	            'label' => __( 'Number of Columns', 'karauos' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title Tag', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'multiple' => true,
                'options' => themento_title_tags(),
                'default' => 'h3',
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $this->add_control(
            'object_fit',
            [
                'label' => __( 'Image Fit', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'inherit' => __( 'None', 'karauos' ),
                    'cover' => __( 'Cover', 'karauos' ),
                    'contain' => __( 'Contain', 'karauos' ),
                    'fill' => __( 'Fill', 'karauos' ),
                    'scale-down' => __( 'Scale Down', 'karauos' ),
                ],
                'default' => 'inherit',
                'selectors' => [
                    '{{WRAPPER}} img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_post_carousel_slider_setting_controls() {
        $this->start_controls_section(
            'section_post_carousel_slider',
            [
                'label' => __( 'Slider Settings', 'karauos' )
            ]
        );
        $this->add_control(
            'navigation',
            [
                'label' => __( 'Navigation', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'dots',
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
                    '{{WRAPPER}} .slick-slide' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
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
            'centerMode',
            [
                'label' => __( 'Center Mode', 'karauos' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_title',
            [
                'label' => __( 'Show Title', 'karauos' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    '1' => [
                        'title' => __( 'Yes', 'karauos' ),
                        'icon' => 'fa fa-check',
                    ],
                    '0' => [
                        'title' => __( 'No', 'karauos' ),
                        'icon' => 'fa fa-ban',
                    ]
                ],
                'default' => '1'
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_post_carousel_style_controls() {
        $this->start_controls_section(
            'section_post_carousel_style',
            [
	            'label' => __( 'Post Carousel Style', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
            'themento_thumbnail_overlay_color',
            [
	            'label' => __( 'Hover Post Background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .slider-item' => 'background-color: {{VALUE}}',
                ]

            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'themento_post_carousel_border',
                'selector' => '{{WRAPPER}} .elementor-slick-slider .slick-slide img',
            ]
        );
        $this->add_control(
            'themento_post_carousel_border_radius',
            [
                'label' => __( 'Border Radius', 'karauos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slick-slider .slick-slide, {{WRAPPER}} .elementor-slick-slider .slick-slide img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'themento_post_carousel_box_shadow',
                'selector' => '{{WRAPPER}} .elementor-slick-slider .slick-slide',
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_post_carousel_style_slider_controls() {
        $this->start_controls_section(
            'section_post_style_slider',
            [
                'label' => __( 'Slider Style', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
            'post_carousel_height',
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
                    'size' => 300,
                ],
                'size_units' => [ 'px', 'vh', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-slide' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
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
                    '{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:before,{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'arrows_border_radius',
            [
                'label' => __( 'Arrows Radius', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-show .slick-arrow' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
        $this->add_control(
            'arrows_color',
            [
	            'label' => __( 'Arrows Color', 'karauos' ),
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
            'arrows_bg_color',
            [
                'label' => __( 'Arrows background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-arrow' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'arrows', 'both' ],
                ],
            ]
        );
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
                    '{{WRAPPER}} .elementor-slick-slider ul.slick-dots li button::before' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-slick-slider ul.slick-dots li button::before' => 'color: {{VALUE}};',
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
                        'max' => 20,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-slick-slider ul.slick-dots li.slick-active button::before' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation' => [ 'dots', 'both' ],
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function register_post_carousel_title_style_controls() {
        $this->start_controls_section(
            'section_title_post_carousel_style',
            [
	            'label' => __( 'Title Style', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'post_carousel_title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .title-portfolio',
            ]
        );
        $this->add_responsive_control(
            'post_carousel_title_alignment',
            [
	            'label' => __( 'Title Alignment', 'karauos' ),
	            'type' => Controls_Manager::CHOOSE,
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
		            ]
	            ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio' => 'text-align: {{VALUE}};justify-content: {{VALUE}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'post_carousel_title_height',
            [
	            'label' => __( 'Height', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'size' => 15,
                ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio' => 'padding: {{SIZE}}{{UNIT}} 0;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'post_carousel_title_width',
            [
	            'label' => __( 'Title Width', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default'        => [
                    'unit' => '%',
                ],
                'size_units' => '%',
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->start_controls_tabs( 'post_carousel_title_tabs' );
        $this->start_controls_tab( 'normal', [ 'label' => __( 'Normal', 'karauos' ) ] );

        $this->add_control(
            'post_carousel_title_color',
            [
	            'label' => __( 'Title Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio' => 'color: {{VALUE}}',
                ]

            ]
        );
        $this->add_control(
            'post_carousel_bg_title_color',
            [
	            'label' => __( 'Title Background', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio' => 'background-color: {{VALUE}}',
                ]

            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'post_carousel_bg_title_border',
                'selector' => '{{WRAPPER}} .title-portfolio',
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab( 'hover', [ 'label' => __( 'Hover', 'karauos' ) ] );

        $this->add_control(
            'post_carousel_title_hover_color',
            [
	            'label' => __( 'Title Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio:hover' => 'color: {{VALUE}}',
                ]

            ]
        );
        $this->add_control(
            'post_carousel_bg_hover_title_color',
            [
	            'label' => __( 'Title Background', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio:hover' => 'background-color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'post_carousel_bg_c_hover_border',
                'selector' => '{{WRAPPER}} .title-portfolio:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'post_carousel_border_radius_title',
            [
                'label' => __( 'Border Radius', 'karauos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .title-portfolio' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'post_carousel_title_box_shadow',
                'selector' => '{{WRAPPER}} .title-portfolio',
            ]
        );

        $this->end_controls_section();
    }
    protected function register_post_carousel_icon_style_controls() {
        $this->start_controls_section(
            'section_icon_style',
            [
	            'label' => __( 'Icons', 'karauos' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
            'post_carousel_icon_size',
            [
	            'label' => __( 'Icon', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    'px' => [
                        'min' => 12,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'em',
                    'size' => 2.4,
                ],
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .back a' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'post_carousel_icon_border_radius',
            [
	            'label' => __( 'Border Radius', 'karauos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .back a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'after',
            ]
        );
        $this->start_controls_tabs('style_icon_tabs');
        $this->start_controls_tab('style_icon_normal_tab', ['label' => __( 'Normal', 'karauos' ),]);

        $this->add_control(
            'post_carousel_icon_color',
            [
	            'label' => __( 'Icon Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#eead16',
                'selectors' => [
                    '{{WRAPPER}} .back a' => 'color: {{VALUE}}',
                ]

            ]
        );
        $this->add_control(
            'post_carousel_icon_bg_color',
            [
	            'label' => __( 'Icon Background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .back a' => 'background-color: {{VALUE}}',
                ]

            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab('style_icon_hover_tab', ['label' => __( 'Hover', 'karauos' ),]);
        $this->add_control(
            'post_carousel_icon_hover_color',
            [
	            'label' => __( 'Icon Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .back a:hover' => 'color: {{VALUE}}',
                ]

            ]
        );
        $this->add_control(
            'post_carousel_icon_hover_bg_color',
            [
	            'label' => __( 'Icon Background Color', 'karauos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#eead16',
                'selectors' => [
                    '{{WRAPPER}} .back a:hover' => 'background-color: {{VALUE}}',
                ]

            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $post_type = $settings['post_type_carousel'];
        switch($post_type)
        {
            case 'post':
                $get_taxonomy = $settings['category_carousel'];
                $taxonomy = 'category';
                break;
            case 'portfolio':
                $get_taxonomy = $settings['portfolio_carousel'];
                $taxonomy = 'portfolio_cat';
                break;
        }
        $is_rtl = is_rtl();
        $direction = $is_rtl ? 'rtl' : 'ltr';
        $show_dots = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
        $show_arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );
        $data_slick = [
            'slidesToShow' => $settings['post_carousel_columns'],
            'slidesToScroll' => 1,
            'autoplay' => ( 'yes' === $settings['autoplay'] ),
            'infinite' => ( 'yes' === $settings['infinite'] ),
            'speed' => absint( $settings['autoplay_speed'] ),
            'pauseOnHover' => ( 'yes' === $settings['pause_on_hover'] ),
            'autoplaySpeed' => 2000,
            'arrows' => $show_arrows,
            'dots' => $show_dots,
            'rtl' => $is_rtl,
            'centerMode' => ( 'yes' === $settings['centerMode'] ),
        ];

        $this->add_render_attribute( 'slides', [
            'data-slick' => wp_json_encode( $data_slick ),
        ] );
        $show_arrows_carousel = '';
        if ( $show_arrows ) {
            $show_arrows_carousel = 'slick-arrows-' . $settings['arrows_position'];
        }
        $image_size = $settings['image_size'];
        $id = $this->get_id();
        if('custom' == $image_size) {
            $width = $settings['image_custom_dimension']['width'];
            $height = $settings['image_custom_dimension']['height'];
            add_image_size( "custom-$id", $width, $height, true );
        }

        echo '<div class="elementor-slides-wrapper elementor-slick-slider" dir="' . esc_attr( $direction ) . '"> <div class="slider-show slick-slider '.$show_arrows_carousel.'" '.$this->get_render_attribute_string( 'slides' ).'>' ;
        $args = array(
            'posts_per_page' => $settings['posts_count_carousel'],
            'post_type' => $settings['post_type_carousel'],
            'post_status' => 'publish',
            'order' => $settings['post_order_carousel'],
        );
        if ( ! empty($get_taxonomy) ) $args['tax_query'] = array(array('taxonomy' => $taxonomy, 'terms' => $get_taxonomy,));
        $query = new \WP_Query($args);
            if ( $query->have_posts() ):while ( $query->have_posts() ):$query->the_post();
                $title_tag = $settings['title_tag'];
                $post_carousel_title_alignment = $settings['post_carousel_title_alignment'];
                $title = get_the_title();
                echo "<div class='slider-item'>";
                if('custom' == $image_size) {
                    karauos_post_thumbnail("$image_size-$id");
                } else {
                    karauos_post_thumbnail($image_size);
                }
                    if( '1' === $settings['show_title'] ){echo "<$title_tag class='title-portfolio flex align-items-center justify-content-$post_carousel_title_alignment'>$title</$title_tag>";}
                    echo "<div class='back-item flex justify-content-between'>"
                        . "<div class='back'><a href='"; if(has_post_thumbnail()){echo the_post_thumbnail_url('large');} else{echo wp_directory_uri . '/images/thumbnail.jpg';} echo "' data-fancybox='gallery' data-caption='$title'><i class='fas fa-search'></i></a></div>"
                        . "<div class='back'>"
                        . "<a href='" . get_the_permalink() . "'><i class='fas fa-link'></i></a>"
                    . "</div>"
                . '</div></div>';
            endwhile;endif;
        echo '</div></div>';
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_Post_Carousel );