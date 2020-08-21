<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class Themento_Flip_Box extends Widget_Base {
    
    public function get_name() {
        return 'themento_flip_box';
    }

    public function get_title() {
        return __( 'Flip Box', 'karauos' );
    }

    public function get_icon() {
        return 'eicon-flip-box';
    }

    public function get_categories() {
        return [ 'karauos' ];
    }

	public function get_keywords() {
		return [ 'flip', 'box', '3d' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_side_a_content',
			[
				'label' => __( 'Front', 'karauos' ),
			]
		);

		$this->start_controls_tabs( 'front_content_tabs' );

		$this->start_controls_tab( 'front_content_tab', [ 'label' => __( 'Content', 'karauos' ) ] );

		$this->add_control(
			'graphic_element',
			[
				'label'   => __( 'Icon Type', 'karauos' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'none' => [
						'title' => __( 'None', 'karauos' ),
						'icon'  => 'fa fa-ban',
					],
					'image' => [
						'title' => __( 'Image', 'karauos' ),
						'icon'  => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => __( 'Icon', 'karauos' ),
						'icon'  => 'fa fa-star',
					],
				],
				'default' => 'icon',
			]
		);

		$this->add_control(
			'image',
			[
				'label'   => __( 'Choose Image', 'karauos' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'graphic_element' => 'image',
				],
				'dynamic'     => [ 'active' => true ],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image',
				'label'     => __( 'Image Size', 'karauos' ),
				'default'   => 'thumbnail',
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label'     => __( 'Icon', 'karauos' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_view',
			[
				'label'   => __( 'View', 'karauos' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'karauos' ),
					'stacked' => __( 'Stacked', 'karauos' ),
					'framed'  => __( 'Framed', 'karauos' ),
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_shape',
			[
				'label'   => __( 'Shape', 'karauos' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'circle',
				'options' => [
					'circle' => __( 'Circle', 'karauos' ),
					'square' => __( 'Square', 'karauos' ),
				],
				'condition' => [
					'icon_view!'      => 'default',
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'front_title_text',
			[
				'label'       => __( 'Title & Description', 'karauos' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [ 'active' => true ],
				'default'     => __( 'This is the heading', 'karauos' ),
				'placeholder' => __( 'Your Title', 'karauos' ),
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'front_description_text',
			[
				'label'       => __( 'Description', 'karauos' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [ 'active' => true ],
				'default'     => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'karauos' ),
				'placeholder' => __( 'Your Description', 'karauos' ),
				'title'       => __( 'Input image text here', 'karauos' ),
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'front_background_tab', [ 'label' => __( 'Background', 'karauos' ) ] );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'front_background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tmt-flip-box-front',
			]
		);

		$this->add_control(
			'front_background_overlay',
			[
				'label'     => __( 'Background Overlay', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-overlay' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'front_background_image[id]!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_back_content',
			[
				'label' => __( 'Back', 'karauos' ),
			]
		);

		$this->start_controls_tabs( 'back_content_tabs' );

		$this->start_controls_tab( 'back_content_tab', [ 'label' => __( 'Content', 'karauos' ) ] );

		$this->add_control(
			'back_title_text',
			[
				'label'       => __( 'Title & Description', 'karauos' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [ 'active' => true ],
				'default'     => __( 'This is the heading', 'karauos' ),
				'placeholder' => __( 'Your Title', 'karauos' ),
			]
		);

		$this->add_control(
			'back_description_text',
			[
				'label'       => __( 'Description', 'karauos' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [ 'active' => true ],
				'default'     => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'karauos' ),
				'placeholder' => __( 'Your Description', 'karauos' ),
				'title'       => __( 'Input image text here', 'karauos' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'     => __( 'Button Text', 'karauos' ),
				'type'      => Controls_Manager::TEXT,
				'dynamic'   => [ 'active' => true ],
				'default'   => __( 'Click Here', 'karauos' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => __( 'Link', 'karauos' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [ 'active' => true ],
				'placeholder' => __( 'http://your-link.com', 'karauos' ),
			]
		);

		$this->add_control(
			'link_click',
			[
				'label'   => __( 'Apply Link On', 'karauos' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'box'    => __( 'Whole Box', 'karauos' ),
					'button' => __( 'Button Only', 'karauos' ),
				],
				'default'   => 'button',
				'condition' => [
					'link[url]!' => '',
				],
			]
		);

		$this->add_control(
			'button_size',
			[
				'label' => __( 'Size', 'karauos' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => [
					'xs' => __( 'Extra Small', 'karauos' ),
					'sm' => __( 'Small', 'karauos' ),
					'md' => __( 'Medium', 'karauos' ),
					'lg' => __( 'Large', 'karauos' ),
					'xl' => __( 'Extra Large', 'karauos' ),
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'back_background_tab', [ 'label' => __( 'Background', 'karauos' ) ] );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'back_background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tmt-flip-box-back',
			]
		);

		$this->add_control(
			'back_background_overlay',
			[
				'label' => __( 'Background Overlay', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-overlay' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'back_background_image[id]!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_box_settings',
			[
				'label' => __( 'Settings', 'karauos' ),
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => __( 'Height', 'karauos' ),
				'type'  => Controls_Manager::SLIDER,
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
				'size_units' => [ 'px', 'vh' ],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => __( 'Border Radius', 'karauos' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-layer, {{WRAPPER}} .tmt-flip-box-layer-overlay' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'flip_effect',
			[
				'label'   => __( 'Flip Effect', 'karauos' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'flip',
				'options' => [
					'flip'     => __( 'Flip', 'karauos' ),
					'slide'    => __( 'Slide', 'karauos' ),
					'push'     => __( 'Push', 'karauos' ),
					'zoom-in'  => __( 'Zoom In', 'karauos' ),
					'zoom-out' => __( 'Zoom Out', 'karauos' ),
					'fade'     => __( 'Fade', 'karauos' ),
				],
				'prefix_class' => 'tmt-flip-box-effect-',
			]
		);

		$this->add_control(
			'flip_direction',
			[
				'label'   => __( 'Flip Direction', 'karauos' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'karauos' ),
					'right' => __( 'Right', 'karauos' ),
					'up'    => __( 'Up', 'karauos' ),
					'down'  => __( 'Down', 'karauos' ),
				],
				'condition' => [
					'flip_effect!' => [
							'fade',
							'zoom-in',
							'zoom-out',
						],
				],
				'prefix_class' => 'tmt-flip-box-direction-',
			]
		);

		$this->add_control(
			'flip_3d',
			[
				'label'        => __( '3D Depth', 'karauos' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'prefix_class' => 'tmt-flip-box-3d-',
				'condition' => [
					'flip_effect' => 'flip',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_front',
			[
				'label' => __( 'Front', 'karauos' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'front_padding',
			[
				'label' => __( 'Padding', 'karauos' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'front_alignment',
			[
				'label' => __( 'Alignment', 'karauos' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
                        'title' => is_rtl() ? __( 'Left', 'karauos' ) : __( 'Right', 'karauos' ),
                        'icon' => is_rtl() ? 'eicon-h-align-left' : 'eicon-h-align-right',
					],
					'center' => [
						'title' => __( 'Center', 'karauos' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
                        'title' => is_rtl() ? __( 'Right', 'karauos' ) : __( 'Left', 'karauos' ),
                        'icon' => is_rtl() ? 'eicon-h-align-right' : 'eicon-h-align-left',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-overlay' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'front_vertical_position',
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
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-overlay' => 'justify-content: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		$this->start_controls_tabs( 'front_style_tabs' );

		$this->start_controls_tab(
			'front_image_style_tab',
			[
				
				'label'     => __( 'Image', 'karauos' ),
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'image_spacing',
			[
				'label' => __( 'Spacing', 'karauos' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'image_width',
			[
				'label'      => __( 'Size (%)', 'karauos' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'default'    => [
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-image img' => 'width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'image_opacity',
			[
				'label'   => __( 'Opacity (%)', 'karauos' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-image' => 'opacity: {{SIZE}};',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'image_border',
				'label'     => __( 'Image Border', 'karauos' ),
				'selector'  => '{{WRAPPER}} .tmt-flip-box-image img',
				'condition' => [
					'graphic_element' => 'image',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-image img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(
		'front_icon_style_tab',
			[ 
				'label' => __( 'Icon', 'karauos' ),
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_spacing',
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
					'{{WRAPPER}} .elementor-icon-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_primary_color',
			[
				'label' => __( 'Icon Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-view-stacked .elementor-icon' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .elementor-view-framed .elementor-icon, {{WRAPPER}} .elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}}',
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_secondary_color',
			[
				'label' => __( 'Secondary Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-view-framed .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Icon Padding', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view!' => 'default',
				],
			]
		);

		$this->add_control(
			'icon_rotate',
			[
				'label' => __( 'Icon Rotate', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label' => __( 'Border Width', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view' => 'framed',
				],
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'karauos' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view!' => 'default',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		'front_title_style_tab',
			[ 
				'label' => __( 'Title', 'karauos' ),
				'condition' => [
					'front_title_text!' => '',
				],
			]
		);

		$this->add_control(
			'front_title_spacing',
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
					'{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'front_description_text!' => '',
				],
			]
		);

		$this->add_control(
			'front_title_color',
			[
				'label' => __( 'Text Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-title' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'front_title_typography',
				'label'    => __( 'Typography', 'karauos' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-title',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		'front_description_style_tab',
			[ 
				'label' => __( 'Description', 'karauos' ),
				'condition' => [
					'front_description_text!' => '',
				],
			]
		);

		$this->add_control(
			'front_description_color',
			[
				'label'     => __( 'Text Color', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f5f5f5',
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-desc' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'front_description_typography',
				'label'    => __( 'Typography', 'karauos' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .tmt-flip-box-front .tmt-flip-box-layer-desc',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'front_border',
				'selector'  => '{{WRAPPER}} .tmt-flip-box-front',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_back',
			[
				'label' => __( 'Back', 'karauos' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'back_padding',
			[
				'label' => __( 'Padding', 'karauos' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'back_alignment',
			[
				'label' => __( 'Alignment', 'karauos' ),
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-overlay' => 'text-align: {{VALUE}}',
					'{{WRAPPER}} .tmt-flip-box-button' => 'margin-{{VALUE}}: 0',
				],
			]
		);

		$this->add_control(
			'back_vertical_position',
			[
				'label'       => __( 'Vertical Position', 'karauos' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'top' => [
						'title' => __( 'Top', 'karauos' ),
						'icon'  => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', 'karauos' ),
						'icon'  => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'karauos' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'selectors_dictionary' => [
					'top'    => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-overlay' => 'justify-content: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);


		$this->start_controls_tabs( 'back_style_tabs' );

		$this->start_controls_tab(
		'back_title_style_tab',
			[ 
				'label' => __( 'Title', 'karauos' ),
				'condition' => [
					'back_title_text!' => '',
				],
			]
		);

		$this->add_control(
			'back_title_spacing',
			[
				'label' => __( 'Spacing', 'karauos' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'back_title_text!' => '',
				],
			]
		);

		$this->add_control(
			'back_title_color',
			[
				'label'     => __( 'Text Color', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-title' => 'color: {{VALUE}}',

				],
				'condition' => [
					'back_title_text!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'back_title_typography',
				'label'     => __( 'Typography', 'karauos' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-title',
				'condition' => [
					'back_title_text!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		'back_description_style_tab',
			[ 
				'label' => __( 'Description', 'karauos' ),
				'condition' => [
					'back_description_text!' => '',
				],
			]
		);

		$this->add_control(
			'back_description_spacing',
			[
				'label' => __( 'Spacing', 'karauos' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'back_description_color',
			[
				'label' => __( 'Text Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-desc' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'description_typography_b',
				'label'     => __( 'Typography', 'karauos' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_3,
				'selector'  => '{{WRAPPER}} .tmt-flip-box-back .tmt-flip-box-layer-desc',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'back_border',
				'selector'  => '{{WRAPPER}} .tmt-flip-box-back',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button',
			[
				'label' => __( 'Button', 'karauos' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'button_text!' => '',
				],
			]
		);


		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'karauos' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .tmt-flip-box-button',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name'        => 'button_border',
				'label'       => esc_html__( 'Border', 'karauos' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .tmt-flip-box-button',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'karauos' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tmt-flip-box-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'karauos' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tmt-flip-box-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'label'    => esc_html__( 'Typography', 'karauos' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tmt-flip-box-button',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'karauos' ),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__( 'Text Color', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label'     => esc_html__( 'Background Color', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_hover_box_shadow',
				'selector' => '{{WRAPPER}} .tmt-flip-box-button:hover',
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'karauos' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tmt-flip-box-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_animation',
			[
				'label' => esc_html__( 'Animation', 'karauos' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings    = $this->get_settings_for_display();
		$animation   = ($settings['button_hover_animation']) ? ' elementor-animation-'.$settings['button_hover_animation'] : '';
		$wrapper_tag = 'div';
		$button_tag  = 'a';
		$link_url    = empty( $settings['link']['url'] ) ? '#' : $settings['link']['url'];

		$this->add_render_attribute( 'button', 'class', [
				'tmt-flip-box-button',
				'elementor-button',
				'elementor-size-' . $settings['button_size'],
				$animation,
			]
		);

		$this->add_render_attribute( 'wrapper', 'class', 'tmt-flip-box-layer tmt-flip-box-back' );

		if ( 'box' === $settings['link_click'] ) {
			$wrapper_tag = 'a';
			$button_tag = 'button';
			$this->add_render_attribute( 'wrapper', 'href', $link_url );
			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'wrapper', 'target', '_blank' );
			}
		} else {
			$this->add_render_attribute( 'button', 'href', $link_url );
			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}
		}

		if ( 'icon' === $settings['graphic_element'] ) {
			$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-icon-wrapper' );
			$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-view-' . $settings['icon_view'] );
			if ( 'default' != $settings['icon_view'] ) {
				$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-shape-' . $settings['icon_shape'] );
			}
			if ( ! empty( $settings['icon'] ) ) {
				$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
			}
		}

		?>
		<div class="tmt-flip-box">
			<div class="tmt-flip-box-layer tmt-flip-box-front">
				<div class="tmt-flip-box-layer-overlay">
					<div class="tmt-flip-box-layer-inner">
						<?php if ( 'image' === $settings['graphic_element'] && ! empty( $settings['image']['url'] ) ) : ?>
							<div class="tmt-flip-box-image">
								<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
							</div>
						<?php elseif ( 'icon' === $settings['graphic_element'] && ! empty( $settings['icon'] ) ) : ?>
							<div <?php echo $this->get_render_attribute_string( 'icon-wrapper' ); ?>>
								<div class="elementor-icon">
									<?php Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => 'fa-fw' ] ); ?>
								</div>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $settings['front_title_text'] ) ) : ?>
							<h3 class="tmt-flip-box-layer-title">
								<?php echo $settings['front_title_text']; ?>
							</h3>
						<?php endif; ?>

						<?php if ( ! empty( $settings['front_description_text'] ) ) : ?>
							<div class="tmt-flip-box-layer-desc">
								<?php echo $settings['front_description_text']; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<<?php echo $wrapper_tag; ?> <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
				<div class="tmt-flip-box-layer-overlay">
					<div class="tmt-flip-box-layer-inner">
						<?php if ( ! empty( $settings['back_title_text'] ) ) : ?>
							<h3 class="tmt-flip-box-layer-title">
								<?php echo $settings['back_title_text']; ?>
							</h3>
						<?php endif; ?>

						<?php if ( ! empty( $settings['back_description_text'] ) ) : ?>
							<div class="tmt-flip-box-layer-desc">
								<?php echo $settings['back_description_text']; ?>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $settings['button_text'] ) ) : ?>
							<<?php echo $button_tag; ?> <?php echo $this->get_render_attribute_string( 'button' ); ?>>
								<?php echo $settings['button_text']; ?>
							</<?php echo $button_tag; ?>>
						<?php endif; ?>
					</div>
				</div>
			</<?php echo $wrapper_tag; ?>>
		</div>
		<?php
	}

	protected function _content_template() {
		?>
		<#
			var buttonClass = 'tmt-flip-box-button elementor-button elementor-size-' + settings.button_size + ' elementor-animation-' + settings.button_hover_animation;

			if ( 'image' === settings.graphic_element && '' !== settings.image.url ) {
				var image = {
					id: settings.image.id,
					url: settings.image.url,
					size: settings.image_size,
					dimension: settings.image_custom_dimension,
					model: view.getEditModel()
				};

				var imageUrl = elementor.imagesManager.getImageUrl( image );
			}

			var wrapperTag = 'div',
				buttonTag = 'a';

			if ( 'box' === settings.link_click ) {
				wrapperTag = 'a';
				buttonTag = 'button';
			}

			if ( 'icon' === settings.graphic_element ) {
				var iconWrapperClasses = 'elementor-icon-wrapper';
					iconWrapperClasses += ' elementor-view-' + settings.icon_view;
				if ( 'default' !== settings.icon_view ) {
					iconWrapperClasses += ' elementor-shape-' + settings.icon_shape;
				}
			}

        iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': true }, 'i' , 'object' );
		#>

		<div class="tmt-flip-box">
			<div class="tmt-flip-box-layer tmt-flip-box-front">
				<div class="tmt-flip-box-layer-overlay">
					<div class="tmt-flip-box-layer-inner">
						<# if ( 'image' === settings.graphic_element && '' !== settings.image.url ) { #>
							<div class="tmt-flip-box-image">
								<img src="{{ imageUrl }}">
							</div>
						<#  } else if ( 'icon' === settings.graphic_element && settings.icon ) { #>
							<div class="{{ iconWrapperClasses }}" >
								<div class="elementor-icon">
                                    {{{ iconHTML.value }}}
								</div>
							</div>
						<# } #>

						<# if ( settings.front_title_text ) { #>
							<h3 class="tmt-flip-box-layer-title">{{{ settings.front_title_text }}}</h3>
						<# } #>

						<# if ( settings.front_description_text ) { #>
							<div class="tmt-flip-box-layer-desc">{{{ settings.front_description_text }}}</div>
						<# } #>
					</div>
				</div>
			</div>
			<{{ wrapperTag }} class="tmt-flip-box-layer tmt-flip-box-back">
				<div class="tmt-flip-box-layer-overlay">
					<div class="tmt-flip-box-layer-inner">
						<# if ( settings.back_title_text ) { #>
							<h3 class="tmt-flip-box-layer-title">{{{ settings.back_title_text }}}</h3>
						<# } #>

						<# if ( settings.back_description_text ) { #>
							<div class="tmt-flip-box-layer-desc">{{{ settings.back_description_text }}}</div>
						<# } #>

						<# if ( settings.button_text ) { #>
							<{{ buttonTag }} href="#" class="{{ buttonClass }}">{{{ settings.button_text }}}</{{ buttonTag }}>
						<# } #>
					</div>
				</div>
			</{{ wrapperTag }}>
		</div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_Flip_Box );