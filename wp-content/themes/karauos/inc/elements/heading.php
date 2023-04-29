<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Themento_heading extends Widget_Base {

    public function get_name() {
        return 'themento_heading';
    }

    public function get_title() {
        return __( 'Heading', 'karauos' );
    }

    public function get_categories() {
        return [ 'karauos' ];
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_keywords() {
        return [ 'heading', 'title', 'text' ];
    }

    protected function _register_controls() {
        $this->register_general_content_controls();
        $this->register_separator_content_controls();
        $this->register_style_content_controls();
        $this->register_heading_typo_content_controls();
        $this->register_desc_typo_content_controls();
        $this->register_imgicon_content_controls();
    }

    protected function register_general_content_controls() {

        $this->start_controls_section(
            'section_general_fields',
            [
                'label' => __( 'General', 'karauos' ),
            ]
        );
        $this->add_control(
            'heading_title',
            [
                'label'   => __( 'Heading', 'karauos' ),
                'type'    => Controls_Manager::TEXTAREA,
                'rows'    => '2',
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Design is a funny word', 'karauos' ),
            ]
        );
        $this->add_control(
            'heading_link',
            [
                'label'       => __( 'Link', 'karauos' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'karauos' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'heading_description',
            [
                'label'   => __( 'Description', 'karauos' ),
                'type'    => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function register_separator_content_controls() {
        $this->start_controls_section(
            'section_separator_field',
            [
                'label' => __( 'Separator', 'karauos' ),
            ]
        );
        $this->add_control(
            'heading_separator_style',
            [
                'label'       => __( 'Style', 'karauos' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'none',
                'label_block' => false,
                'options'     => [
                    'none'       => __( 'None', 'karauos' ),
                    'line'       => __( 'Line', 'karauos' ),
                    'line_icon'  => __( 'Line With Icon', 'karauos' ),
                    'line_image' => __( 'Line With Image', 'karauos' ),
                    'line_text'  => __( 'Line With Text', 'karauos' ),
                ],
            ]
        );
        $this->add_control(
            'heading_separator_position',
            [
                'label'       => __( 'Separator Position', 'karauos' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'center',
                'label_block' => false,
                'options'     => [
                    'center' => __( 'Between Heading & Description', 'karauos' ),
                    'top'    => __( 'Top', 'karauos' ),
                    'bottom' => __( 'Bottom', 'karauos' ),
                    'right'  => __( 'Heading Side', 'karauos' ),
                ],
                'condition'   => [
                    'heading_separator_style!' => 'none',
                ],
            ]
        );

        $this->add_control(
            'separator_long',
            [
                'label'        => __( 'Out Separator', 'karauos' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'karauos' ),
                'label_off'    => __( 'No', 'karauos' ),
                'return_value' => 'yes',
                'default'      => '',
                'condition'   => [
                    'heading_separator_position' => 'right',
                ],
                'separator'    => 'before',
            ]
        );

        /* Separator line with Icon */
        $this->add_control(
            'heading_icon',
            [
                'label' => __( 'Select Icon', 'text-domain' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'heading_separator_style' => 'line_icon',
                ],
            ]
        );

        /* Separator line with Image */
        $this->add_control(
            'heading_image_type',
            [
                'label'       => __( 'Photo Source', 'karauos' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'media',
                'label_block' => false,
                'options'     => [
                    'media' => __( 'Media Library', 'karauos' ),
                    'url'   => __( 'URL', 'karauos' ),
                ],
                'condition'   => [
                    'heading_separator_style' => 'line_image',
                ],
            ]
        );
        $this->add_control(
            'heading_image',
            [
                'label'     => __( 'Photo', 'karauos' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'   => [
                    'active' => true,
                ],
                'condition' => [
                    'heading_separator_style' => 'line_image',
                    'heading_image_type'      => 'media',
                ],
            ]
        );
        $this->add_control(
            'heading_image_link',
            [
                'label'         => __( 'Photo URL', 'karauos' ),
                'type'          => Controls_Manager::URL,
                'default'       => [
                    'url' => '',
                ],
                'show_external' => false, // Show the 'open in new tab' button.
                'condition'     => [
                    'heading_separator_style' => 'line_image',
                    'heading_image_type'      => 'url',
                ],
            ]
        );

        /* Separator line with text */
        $this->add_control(
            'heading_line_text',
            [
                'label'     => __( 'Enter Text', 'karauos' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => __( 'Wordpress', 'karauos' ),
                'condition' => [
                    'heading_separator_style' => 'line_text',
                ],
                'dynamic'   => [
                    'active' => true,
                ],
                'selector'  => '{{WRAPPER}} .themento-divider-text',
            ]
        );

        $this->end_controls_section();
    }
    protected function register_style_content_controls() {
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'General', 'karauos' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'heading_text_align',
            [
                'label'        => __( 'Overall Alignment', 'karauos' ),
                'type'         => Controls_Manager::CHOOSE,
                'default'     => 'center',
                'options'      => [
                    'right'   => [
                        'title' => __( 'Right', 'karauos' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'karauos' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'left'  => [
                        'title' => __( 'Left', 'karauos' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                ],
                'selectors'    => [
                    '{{WRAPPER}} .themento-heading,{{WRAPPER}} .themento-subheading, {{WRAPPER}} .themento-subheading *, {{WRAPPER}} .themento-separator-parent' => 'text-align: {{VALUE}};',
                ],
                'prefix_class' => 'themento%s-heading-align-',
            ]
        );

        $this->end_controls_section();
    }
    protected function register_heading_typo_content_controls() {
        $this->start_controls_section(
            'section_heading_typography',
            [
                'label' => __( 'Heading', 'karauos' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_tag',
            [
                'label'   => __( 'HTML Tag', 'karauos' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'karauos' ),
                    'h2' => __( 'H2', 'karauos' ),
                    'h3' => __( 'H3', 'karauos' ),
                    'h4' => __( 'H4', 'karauos' ),
                    'h5' => __( 'H5', 'karauos' ),
                    'h6' => __( 'H6', 'karauos' ),
                ],
                'default' => 'h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .themento-heading, {{WRAPPER}} .themento-heading a',
            ]
        );
        $this->add_control(
            'heading_color_type',
            [
                'label'        => __( 'Fill', 'karauos' ),
                'type'         => Controls_Manager::SELECT,
                'options'      => [
                    'color'    => __( 'Color', 'karauos' ),
                    'gradient' => __( 'Background', 'karauos' ),
                ],
                'default'      => 'color',
                'prefix_class' => 'themento-heading-fill-',
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .themento-heading-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'heading_color_type' => 'color',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'           => 'heading_color_gradient',
                'types'          => [ 'gradient', 'classic' ],
                'selector'       => '{{WRAPPER}} .themento-heading-text',
                'fields_options' => [
                    'background' => [
                        'scheme' => [
                            'type'  => Scheme_Color::get_type(),
                            'value' => Scheme_Color::COLOR_1,
                        ],
                    ],
                ],
                'condition'      => [
                    'heading_color_type' => 'gradient',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'heading_shadow',
                'selector' => '{{WRAPPER}} .themento-heading-text',
            ]
        );
        $this->add_control(
            'heading_margin',
            [
                'label'      => __( 'Heading Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'default'    => [
                    'top'      => '0',
                    'bottom'   => '15',
                    'left'     => '0',
                    'right'    => '0',
                    'unit'     => 'px',
                    'isLinked' => false,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->end_controls_section();
    }
    protected function register_desc_typo_content_controls() {

        $this->start_controls_section(
            'section_desc_typography',
            [
                'label'     => __( 'Description', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'heading_description!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'heading_desc_typography',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_3,
                'selector'  => '{{WRAPPER}} .themento-subheading',
                'condition' => [
                    'heading_description!' => '',
                ],
            ]
        );
        $this->add_control(
            'heading_desc_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
                'default'   => '',
                'condition' => [
                    'heading_description!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .themento-subheading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_desc_margin',
            [
                'label'      => __( 'Description Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'default'    => [
                    'top'      => '15',
                    'bottom'   => '0',
                    'left'     => '0',
                    'right'    => '0',
                    'unit'     => 'px',
                    'isLinked' => false,
                ],
                'condition'  => [
                    'heading_description!' => '',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-subheading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->end_controls_section();
    }
    protected function register_imgicon_content_controls() {

        $this->start_controls_section(
            'section_separator_line_style',
            [
                'label'     => __( 'Separator - Line', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'heading_separator_style!' => 'none',
                ],
            ]
        );

        $this->add_control(
            'heading_line_style',
            [
                'label'       => __( 'Style', 'karauos' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'solid',
                'label_block' => false,
                'options'     => [
                    'solid'  => __( 'Solid', 'karauos' ),
                    'dashed' => __( 'Dashed', 'karauos' ),
                    'dotted' => __( 'Dotted', 'karauos' ),
                    'double' => __( 'Double', 'karauos' ),
                ],
                'condition'   => [
                    'heading_separator_style!' => 'none',
                ],
                'selectors'   => [
                    '{{WRAPPER}} .themento-separator, {{WRAPPER}} .themento-separator-line > span' => 'border-top-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_line_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_4,
                ],
                'condition' => [
                    'heading_separator_style!' => 'none',
                ],
                'selectors' => [
                    '{{WRAPPER}} .themento-separator, {{WRAPPER}} .themento-separator-line > span, {{WRAPPER}} .themento-divider-text' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_line_thickness',
            [
                'label'      => __( 'Thickness', 'karauos' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range'      => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                ],
                'default'    => [
                    'size' => 2,
                    'unit' => 'px',
                ],
                'condition'  => [
                    'heading_separator_style!' => 'none',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-separator, {{WRAPPER}} .themento-separator-line > span ' => 'border-top-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_line_width',
            [
                'label'          => __( 'Width', 'karauos' ),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => [ '%', 'px' ],
                'range'          => [
                    'px' => [
                        'max' => 1000,
                    ],
                ],
                'default'        => [
                    'size' => 20,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'label_block'    => true,
                'condition'      => [
                    'heading_separator_style!' => 'none',
                    'separator_long!' => 'yes',
                ],
                'selectors'      => [
                    '{{WRAPPER}} .themento-separator, {{WRAPPER}} .themento-separator-wrap, {{WRAPPER}} .line-right .themento-separator-parent' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_imgicon_style',
            [
                'label'     => __( 'Separator - Icon / Image / Text', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'heading_separator_style' => [ 'line_icon', 'line_image', 'line_text' ],
                ],
            ]
        );

        $this->add_control(
            'heading_line_text_color',
            [
                'label'     => __( 'Text Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
                'condition' => [
                    'heading_separator_style' => 'line_text',
                ],
                'selectors' => [
                    '{{WRAPPER}} .themento-divider-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'heading_separator_typography',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_2,
                'condition' => [
                    'heading_separator_style' => 'line_text',
                ],
                'selector'  => '{{WRAPPER}} .themento-divider-text',
            ]
        );

        $this->add_responsive_control(
            'heading_icon_size',
            [
                'label'      => __( 'Icon Size', 'karauos' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range'      => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'condition'  => [
                    'heading_separator_style' => 'line_icon',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon i' => 'font-size: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}; text-align: center;',
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon,{{WRAPPER}} .themento-icon-wrap .themento-icon svg' => ' height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_image_size',
            [
                'label'      => __( 'Image Size', 'karauos' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range'      => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                ],
                'default'    => [
                    'size' => 50,
                    'unit' => 'px',
                ],
                'condition'  => [
                    'heading_separator_style' => 'line_image',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-image .themento-photo-img'   => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_icon_position',
            [
                'label'          => __( 'Position', 'karauos' ),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => [ '%' ],
                'range'          => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'        => [
                    'size' => 50,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'condition'      => [
                    'heading_separator_style' => [ 'line_icon', 'line_image', 'line_text' ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .themento-side-left'  => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .themento-side-right' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_icon_padding',
            [
                'label'      => __( 'Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'default'    => [
                    'top'      => '0',
                    'bottom'   => '0',
                    'left'     => '10',
                    'right'    => '10',
                    'unit'     => 'px',
                    'isLinked' => false,
                ],
                'condition'  => [
                    'heading_separator_style' => [ 'line_icon', 'line_image', 'line_text' ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-divider-content' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'heading_icon_fields',
            [
                'label'     => __( 'Style', 'karauos' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'heading_separator_style!' => [ 'none', 'line_text' ],
                ],
            ]
        );

        $this->add_control(
            'heading_imgicon_style_options',
            [
                'label'       => __( 'Select Style', 'karauos' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'simple',
                'label_block' => false,
                'options'     => [
                    'simple' => __( 'Simple', 'karauos' ),
                    'custom' => __( 'Design your own', 'karauos' ),
                ],
                'condition'   => [
                    'heading_separator_style!' => [ 'none', 'line_text' ],
                ],
            ]
        );
        $this->add_control(
            'headings_icon_color',
            [
                'label'     => __( 'Icon Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'condition' => [
                    'heading_imgicon_style_options' => 'simple',
                    'heading_separator_style'       => 'line_icon',
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon i'  => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'headings_icon_hover_color',
            [
                'label'     => __( 'Icon Hover Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'heading_imgicon_style_options' => 'simple',
                    'heading_separator_style'       => 'line_icon',
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon:hover i'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'headings_icon_animation',
            [
                'label'     => __( 'Hover Animation', 'karauos' ),
                'type'      => Controls_Manager::HOVER_ANIMATION,
                'condition' => [
                    'heading_imgicon_style_options' => 'simple',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
            ]
        );

        $this->start_controls_tabs( 'heading_imgicon_style' );

        $this->start_controls_tab(
            'heading_imgicon_normal',
            [
                'label'     => __( 'Normal', 'karauos' ),
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
            ]
        );

        $this->add_control(
            'heading_icon_color',
            [
                'label'     => __( 'Icon Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style'       => 'line_icon',
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon i'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon svg'  => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_icon_bgcolor',
            [
                'label'     => __( 'Background Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon, {{WRAPPER}} .themento-image .themento-image-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'heading_icon_bg_size',
            [
                'label'      => __( 'Background Size', 'karauos' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'size' => '0',
                    'unit' => 'px',
                ],
                'condition'  => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon, {{WRAPPER}} .themento-image .themento-image-content' => 'padding: {{SIZE}}{{UNIT}}; display:inline-block; box-sizing:content-box;',
                ],
            ]
        );

        $this->add_control(
            'heading_icon_border',
            [
                'label'       => __( 'Border Style', 'karauos' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'none',
                'label_block' => false,
                'options'     => [
                    'none'   => __( 'None', 'karauos' ),
                    'solid'  => __( 'Solid', 'karauos' ),
                    'double' => __( 'Double', 'karauos' ),
                    'dotted' => __( 'Dotted', 'karauos' ),
                    'dashed' => __( 'Dashed', 'karauos' ),
                ],
                'condition'   => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon, {{WRAPPER}} .themento-image .themento-image-content' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_icon_border_color',
            [
                'label'     => __( 'Border Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                    'heading_icon_border!'          => 'none',
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon, {{WRAPPER}} .themento-image .themento-image-content' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_icon_border_size',
            [
                'label'      => __( 'Border Width', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'default'    => [
                    'top'    => '1',
                    'bottom' => '1',
                    'left'   => '1',
                    'right'  => '1',
                    'unit'   => 'px',
                ],
                'condition'  => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                    'heading_icon_border!'          => 'none',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon, {{WRAPPER}} .themento-image .themento-image-content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; box-sizing:content-box;',
                ],
            ]
        );
        $this->add_control(
            'heading_icon_border_radius',
            [
                'label'      => __( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'default'    => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon, {{WRAPPER}} .themento-image .themento-image-content'   => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition'  => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'heading_imgicon_hover',
            [
                'label'     => __( 'Hover', 'karauos' ),
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
            ]
        );
        $this->add_control(
            'heading_icon_hover_color',
            [
                'label'     => __( 'Icon Hover Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style'       => 'line_icon',
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon:hover i'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon:hover svg'  => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'infobox_icon_hover_bgcolor',
            [
                'label'     => __( 'Background Hover Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon:hover, {{WRAPPER}} .themento-image-content:hover' => 'background-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'heading_icon_hover_border',
            [
                'label'     => __( 'Border Hover Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                    'heading_icon_border!'          => 'none',
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .themento-icon-wrap .themento-icon:hover, {{WRAPPER}} .themento-image-content:hover ' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_icon_animation',
            [
                'label'     => __( 'Hover Animation', 'karauos' ),
                'type'      => Controls_Manager::HOVER_ANIMATION,
                'condition' => [
                    'heading_imgicon_style_options' => 'custom',
                    'heading_separator_style!'      => [ 'none', 'line_text' ],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    public function render_separator( $pos, $settings ) {
        if ( 'none' != $settings['heading_separator_style'] && $pos == $settings['heading_separator_position'] ) {
            ?>
            <div class="themento-module-content themento-separator-parent <?php if ( 'right' == $settings['heading_separator_position'] && 'yes' == $settings['separator_long'] ) {echo 'separator-long';}?>">
                <?php if ( 'line_icon' == $settings['heading_separator_style'] || 'line_image' == $settings['heading_separator_style'] || 'line_text' == $settings['heading_separator_style'] ) { ?>
                    <div class="themento-separator-wrap">
                        <div class="themento-separator-line themento-side-left">
                            <span></span>
                        </div>
                        <div class="themento-divider-content">
                            <?php $this->render_image(); ?>
                            <?php
                            if ( 'line_text' == $settings['heading_separator_style'] ) {
                                echo '<span class="themento-divider-text elementor-inline-editing" data-elementor-setting-key="heading_line_text" data-elementor-inline-editing-toolbar="basic">' . $this->get_settings_for_display( 'heading_line_text' ) . '</span>';
                            }
                            ?>

                        </div>
                        <div class="themento-separator-line themento-side-right">
                            <span></span>
                        </div>
                    </div>
                <?php } ?>
                <?php if ( 'line' == $settings['heading_separator_style'] ) { ?>
                    <div class="themento-separator"></div>
                <?php } ?>
            </div>
            <?php
        }
    }
    public function render_image() {
        $settings = $this->get_settings_for_display();

        if ( 'line_icon' == $settings['heading_separator_style'] || 'line_image' == $settings['heading_separator_style'] ) {
            $anim_class = '';
            if ( 'simple' == $settings['heading_imgicon_style_options'] ) {
                $anim_class = $settings['headings_icon_animation'];
            } elseif ( 'custom' == $settings['heading_imgicon_style_options'] ) {
                $anim_class = $settings['heading_icon_animation'];
            }
            ?>
            <div class="themento-module-content themento-imgicon-wrap elementor-animation-<?php echo $anim_class; ?>"><?php /* Module Wrap */ ?>
                <?php /*Icon Html */ ?>
                <?php if ( 'line_icon' == $settings['heading_separator_style'] ) { ?>
                    <div class="themento-icon-wrap">
						<span class="themento-icon">
                            <?php Icons_Manager::render_icon( $settings['heading_icon']); ?>
						</span>
                    </div>
                <?php } // Icon Html End. ?>

                <?php /* Photo Html */ ?>
                <?php
                if ( 'line_image' == $settings['heading_separator_style'] ) {
                    if ( 'media' == $settings['heading_image_type'] ) {
                        if ( ! empty( $settings['heading_image']['url'] ) ) {
                            $this->add_render_attribute( 'heading_image', 'src', $settings['heading_image']['url'] );
                            $this->add_render_attribute( 'heading_image', 'alt', Control_Media::get_image_alt( $settings['heading_image'] ) );

                            $image_html = '<img class="themento-photo-img" ' . $this->get_render_attribute_string( 'heading_image' ) . '>';
                        }
                    }
                    if ( 'url' == $settings['heading_image_type'] ) {
                        if ( ! empty( $settings['heading_image_link'] ) ) {

                            $this->add_render_attribute( 'heading_image_link', 'src', $settings['heading_image_link']['url'] );

                            $image_html = '<img class="themento-photo-img" ' . $this->get_render_attribute_string( 'heading_image_link' ) . '>';
                        }
                    }
                    ?>
                    <div class="themento-image" itemscope itemtype="http://schema.org/ImageObject">
                        <div class="themento-image-content">
                            <?php echo $image_html; ?>
                        </div>
                    </div>
                <?php } // Photo Html End. ?>
            </div>
            <?php
        }
    }
    protected function render() {
        $html             = '';
        $settings         = $this->get_settings();
        $dynamic_settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'heading_title', 'basic' );
        $this->add_inline_editing_attributes( 'heading_description', 'advanced' );

        if ( empty( $dynamic_settings['heading_title'] ) ) {
            return;
        }

        if ( ! empty( $dynamic_settings['heading_link']['url'] ) ) {
            $this->add_render_attribute( 'url', 'href', $dynamic_settings['heading_link']['url'] );

            if ( $dynamic_settings['heading_link']['is_external'] ) {
                $this->add_render_attribute( 'url', 'target', '_blank' );
            }

            if ( ! empty( $dynamic_settings['heading_link']['nofollow'] ) ) {
                $this->add_render_attribute( 'url', 'rel', 'nofollow' );
            }
            $link = $this->get_render_attribute_string( 'url' );
        }
        ?>
        <div class="themento-module-content themento-heading-wrapper <?php if ( 'right' == $settings['heading_separator_position'] ) {echo 'flex align-items-center line-right flex-wrap';} ?>">
        <?php $this->render_separator( 'top', $settings ); ?>
        <?php $this->render_separator( 'right', $settings ); ?>

        <<?php echo $settings['heading_tag']; ?> class="themento-heading">
        <?php if ( ! empty( $dynamic_settings['heading_link']['url'] ) ) { ?>
        <a <?php echo $link; ?> >
    <?php } ?>
        <span class="themento-heading-text elementor-inline-editing" data-elementor-setting-key="heading_title" data-elementor-inline-editing-toolbar="basic" ><?php echo $this->get_settings_for_display( 'heading_title' ); ?></span>
        <?php if ( ! empty( $dynamic_settings['heading_link']['url'] ) ) { ?>
        </a>
    <?php } ?>
        </<?php echo $settings['heading_tag']; ?>>

        <?php $this->render_separator( 'center', $settings ); ?>

        <?php if ( '' != $dynamic_settings['heading_description'] ) { ?>
            <div class="themento-subheading elementor-inline-editing" data-elementor-setting-key="heading_description" data-elementor-inline-editing-toolbar="advanced" >
                <?php echo $this->get_settings_for_display( 'heading_description' ); ?>
            </div>
        <?php } ?>

        <?php $this->render_separator( 'bottom', $settings ); ?>
        </div>
        <?php
    }
    protected function _content_template() {
        ?>
        <#
        function render_separator( pos ) {
        if ( 'none' != settings.heading_separator_style && pos == settings.heading_separator_position ) {
        #>
        <div class="themento-module-content themento-separator-parent <# if ( 'right' == settings.heading_separator_position && 'yes' == settings.separator_long ) { #> separator-long <# } #>">
            <# if ( 'line_icon' == settings.heading_separator_style || 'line_image' == settings.heading_separator_style || 'line_text' == settings.heading_separator_style ) { #>
            <div class="themento-separator-wrap">
                <div class="themento-separator-line themento-side-left">
                    <span></span>
                </div>
                <div class="themento-divider-content">
                    <#
                    render_image();
                    if ( 'line_text' == settings.heading_separator_style ) { #>
                    <span class="themento-divider-text elementor-inline-editing" data-elementor-setting-key="heading_line_text" data-elementor-inline-editing-toolbar="basic">{{{ settings.heading_line_text }}}</span>
                    <# } #>
                </div>
                <div class="themento-separator-line themento-side-right">
                    <span></span>
                </div>
            </div>
            <# } #>
            <# if ( 'line' == settings.heading_separator_style ) { #>
            <div class="themento-separator"></div>
            <# } #>
        </div>
        <#
        }
        }
        #>


        <#
        function render_image() {
        if ( 'line_icon' == settings.heading_separator_style || 'line_image' == settings.heading_separator_style ) {

        view.addRenderAttribute( 'anim_class', 'class', 'themento-module-content themento-imgicon-wrap' );

        if ( 'simple' == settings.heading_imgicon_style_options ) {
        view.addRenderAttribute( 'anim_class', 'class', 'elementor-animation-' + settings.headings_icon_animation );
        }
        else if ( 'custom' == settings.heading_imgicon_style_options ) {
        view.addRenderAttribute( 'anim_class', 'class', 'elementor-animation-' + settings.heading_icon_animation );
        }
        #>
        <div {{{ view.getRenderAttributeString( 'anim_class' ) }}} >
        <# if ( 'line_icon' == settings.heading_separator_style ) {
        iconHTML = elementor.helpers.renderIcon( view, settings.heading_icon, { 'aria-hidden': true }, 'i' , 'object' );
        #>
        <div class="themento-icon-wrap">
							<span class="themento-icon">
								{{{ iconHTML.value }}}
							</span>
        </div>
        <# } #>
        <# if ( 'line_image' == settings.heading_separator_style ) { #>
        <div class="themento-image" itemscope itemtype="http://schema.org/ImageObject">
            <div class="themento-image-content">
                <#
                if ( 'media' == settings.heading_image_type ) {
                if ( '' != settings.heading_image.url ) {
                view.addRenderAttribute( 'heading_image', 'src', settings.heading_image.url );
                #>
                <img class="themento-photo-img" {{{ view.getRenderAttributeString( 'heading_image' ) }}}>
                <#
                }
                }
                if ( 'url' == settings.heading_image_type ) {
                if ( '' != settings.heading_image_link ) {
                view.addRenderAttribute( 'heading_image_link', 'src', settings.heading_image_link.url );
                #>
                <img class="themento-photo-img" {{{ view.getRenderAttributeString( 'heading_image_link' ) }}}>
                <#
                }
                } #>
            </div>
        </div>
        <# } #>
        </div>
        <#
        }
        }
        #>

        <#
        if ( '' == settings.heading_title ) {
        return;
        }
        if ( '' != settings.heading_link.url ) {
        view.addRenderAttribute( 'url', 'href', settings.heading_link.url );
        }
        #>
        <div class="themento-module-content themento-heading-wrapper <# if ( 'right' == settings.heading_separator_position ) { #> flex align-items-center line-right flex-wrap <# } #>">
            <# render_separator( 'top' ); #>
            <# render_separator( 'right' ); #>
            <{{{ settings.heading_tag }}} class="themento-heading">
            <# if ( '' != settings.heading_link.url ) { #>
            <a {{{ view.getRenderAttributeString( 'url' ) }}} >
            <# } #>
            <span class="themento-heading-text elementor-inline-editing" data-elementor-setting-key="heading_title" data-elementor-inline-editing-toolbar="basic" >{{{ settings.heading_title }}}</span>
            <# if ( '' != settings.heading_link.url ) { #>
            </a>
            <# } #>
        </div>

        <# render_separator( 'center' ); #>

        <# if ( '' != settings.heading_description ) { #>
        <div class="themento-subheading elementor-inline-editing" data-elementor-setting-key="heading_description" data-elementor-inline-editing-toolbar="basic" >
            {{{ settings.heading_description }}}
        </div>
        <# } #>
        <# render_separator( 'bottom' ); #>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_heading );