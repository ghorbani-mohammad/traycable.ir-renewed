<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class Themento_Member extends Widget_Base {
    public function get_name() {
        return 'themento_member';
    }

    public function get_title() {
        return __( 'Member', 'karauos' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return [ 'karauos' ];
    }

    public function get_keywords() {
        return [ 'member', 'team', 'experts' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content_layout',
            [
                'label' => __( 'Layout', 'karauos' ),
            ]
        );
        $this->add_control(
            'member_style',
            [
                'label' => __( 'Member Style', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-one',
                'options' => [
                    'style-one' => __( 'Style One', 'karauos' ),
                    'style-two' => __( 'Style Two',   'karauos' ),
                    'style-three' => __( 'Style Three', 'karauos' ),
                    'style-four' => __( 'Style Four', 'karauos' ),
                ],
            ]
        );
        $this->add_control(
            'photo',
            [
                'label'   => __( 'Choose Photo', 'karauos' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'default' => [
                    'url' => wp_directory_uri . '/images/member.svg',
                ],
            ]
        );

        $this->add_control(
            'name',
            [
                'label'       => __( 'Name', 'karauos' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Ali Amini', 'karauos' ),
                'placeholder' => __( 'Member Name', 'karauos' ),
                'dynamic'     => [ 'active' => true ],
            ]
        );

        $this->add_control(
            'role',
            [
                'label'       => __( 'Role', 'karauos' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Managing Director', 'karauos' ),
                'placeholder' => __( 'Member Role', 'karauos' ),
                'dynamic'     => [ 'active' => true ],
            ]
        );

        $this->add_control(
            'description_text',
            [
                'label'       => __( 'Description', 'karauos' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Type here some info about this team member, the man very important person of our company.', 'karauos' ),
                'placeholder' => __( 'Member Description', 'karauos' ),
                'rows'        => 10,
                'condition'   => ['member_style' => ['style-one', 'style-three']],
                'dynamic'     => [ 'active' => true ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section( 'section_content_social_link', [ 'label' => __( 'Social Icon', 'karauos' ), ] );

        $repeater = new Repeater();

        $repeater->add_control(
            'social_link_title',
            [
                'label'   => __( 'Title', 'karauos' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Facebook',
            ]
        );

        $repeater->add_control(
            'social_link',
            [
                'label'   => __( 'Link', 'karauos' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'http://www.facebook.com/test/', 'karauos' ),
            ]
        );

        $repeater->add_control(
            'social_icon',
            [
                'label'   => __( 'Choose Icon', 'karauos' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'icon_background',
            [
                'label'     => __( 'Icon Background', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icons {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icons {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'social_link_list',
            [
                'type'    => Controls_Manager::REPEATER,
                'fields'  => array_values( $repeater->get_controls() ),
                'default' => [
                    [
                        'social_link'       => __( 'https://www.facebook.com/test/', 'karauos' ),
                        'social_icon'       => ['value' => 'fab fa-facebook-f', 'library' => 'fa-solid'],
                        'social_link_title' => 'Facebook',
                    ],
                    [
                        'social_link'       => __( 'https://www.twitter.com/test/', 'karauos' ),
                        'social_icon'       => ['value' => 'fab fa-twitter', 'library' => 'fa-solid'],
                        'social_link_title' => 'Twitter',
                    ],
                    [
                        'social_link'       => __( 'https://www.instagram.com/themento.net/', 'karauos' ),
                        'social_icon'       => ['value' => 'fab fa-instagram', 'library' => 'fa-solid'],
                        'social_link_title' => 'Instagram',
                    ],
                    [
                        'social_link'       => __( 'https://www.telegram.me/test/', 'karauos' ),
                        'social_icon'       => ['value' => 'fab fa-telegram-plane', 'library' => 'fa-solid'],
                        'social_link_title' => 'Telegram',
                    ],
                ],
                'title_field' => '{{{ social_link_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label'     => __( 'Member', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'member_style' => 'style-one',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label'   => __( 'Text Alignment', 'karauos' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'karauos' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'karauos' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'karauos' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'karauos' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tmt-member' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'member_border',
                'label'       => __( 'Border', 'karauos' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .tmt-member',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'member_border_radius',
            [
                'label'      => __( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'member_box_shadow',
                'label' => __( 'Box Shadow', 'karauos' ),
                'selector' => '{{WRAPPER}} .tmt-member',
            ]
        );

        $this->add_control(
            'desc_padding',
            [
                'label'      => __( 'Description Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'separator'   => 'before',
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member .tmt-member-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section( 'section_style_photo', [ 'label' => __( 'Photo', 'karauos' ), 'tab'   => Controls_Manager::TAB_STYLE, ] );

        $this->start_controls_tabs('tabs_photo_style');

        $this->start_controls_tab(
            'tab_photo_normal',
            [
                'label' => __( 'Normal', 'karauos' ),
            ]
        );

        $this->add_control(
            'photo_background',
            [
                'label'     => __( 'Background', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-photo' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'photo_border',
                'label'       => __( 'Border', 'karauos' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .tmt-member .tmt-member-photo',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'photo_border_radius',
            [
                'label'      => __( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member .tmt-member-photo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};overflow: hidden;',
                ],
            ]
        );

        $this->add_control(
            'photo_opacity',
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
                    '{{WRAPPER}} .tmt-member .tmt-member-photo img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'image_padding',
            [
                'label'      => __( 'Image Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member-photo-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_margin',
            [
                'label'      => __( 'Image Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member-photo-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab( 'tab_photo_hover', [ 'label' => __( 'Hover', 'karauos' ), ] );

        $this->add_control(
            'photo_hover_border_color',
            [
                'label'     => __( 'Border Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-photo:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'photo_hover_opacity',
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
                    '{{WRAPPER}} .tmt-member .tmt-member-photo:hover img,{{WRAPPER}} .tmt-member-skin-phaedra:hover img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'photo_hover_animation',
            [
                'label'   => __( 'Animation', 'karauos' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    ''     => 'None',
                    'up'   => 'Scale Up',
                    'down' => 'Scale Down',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_name',
            [
                'label' => __( 'Name', 'karauos' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'selector' => '{{WRAPPER}} .tmt-member .tmt-member-name',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'name_bottom_space',
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
                    '{{WRAPPER}} .tmt-member-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_role',
            [
                'label' => __( 'Role', 'karauos' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'role_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-role' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'role_bottom_space',
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
                    '{{WRAPPER}} .tmt-member .tmt-member-role' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'role_typography',
                'selector' => '{{WRAPPER}} .tmt-member .tmt-member-role',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_text',
            [
                'label'     => __( 'Text', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'member_style' => 'style-one',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'text_typography',
                'selector' => '{{WRAPPER}} .tmt-member .tmt-member-text',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_social_icon',
            [
                'label' => __( 'Social Icon', 'karauos' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_content_background',
            [
                'label'     => __( 'Icons Background', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icons' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_icon_content_padding',
            [
                'label'      => __( 'Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icons' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_icon_content_margin',
            [
                'label'      => __( 'Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icons' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_icon_content_border_radius',
            [
                'label'      => __( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icons' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( 'tabs_social_icon_style' );

        $this->start_controls_tab(
            'tab_social_icon_normal',
            [
                'label' => __( 'Normal', 'karauos' ),
            ]
        );

        $this->add_control(
            'icon_background',
            [
                'label'     => __( 'Background', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'social_icons_top_border_color',
            [
                'label'     => __( 'Top Border Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icons' => 'border-top-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'social_icon_border',
                'label'       => __( 'Border', 'karauos' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .tmt-member .tmt-member-icon',
            ]
        );

        $this->add_control(
            'social_icon_border_radius',
            [
                'label'      => __( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_icon_padding',
            [
                'label'      => __( 'Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_size',
            [
                'label'     => __( 'Icon Size', 'karauos' ),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon i'        => 'min-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tmt-member .tmt-member-icon i:before' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_indent',
            [
                'label'     => __( 'Icon Spacing', 'karauos' ),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon + .tmt-member-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_social_icon_hover',
            [
                'label' => __( 'Hover', 'karauos' ),
            ]
        );

        $this->add_control(
            'icon_hover_background',
            [
                'label'     => __( 'Background', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label'     => __( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_border_color',
            [
                'label'     => __( 'Border Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'social_icon_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tmt-member .tmt-member-icon:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        $member_style = $settings['member_style'];
        switch ($member_style) {
            case "style-one": ?>
                <div class="tmt-member tmt-member-skin-default tmt-transition-toggle">
                <?php

                if ( ! empty( $settings['photo']['url'] ) ) :
                    if ($settings['photo_hover_animation']) :
                        $this->add_render_attribute( 'photo_hover_animation', 'class', 'tmt-transition-scale-'.$settings['photo_hover_animation'] );
                    endif;
                ?>
                    <div class="tmt-member-photo-wrapper">
                    <div class="tmt-member-photo">
                        <div <?php echo $this->get_render_attribute_string( 'photo_hover_animation' ); ?>>
							<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'photo' ); ?>
						</div>
                    </div>
                    </div>
                <?php endif; ?>

                <div class="tmt-member-description">
                    <?php if ( ! empty( $settings['name'] ) ) : ?>
                        <span class="tmt-member-name"><?php echo $settings['name']; ?></span>
                    <?php endif; ?>
                    <?php if ( ! empty( $settings['role'] ) ) : ?>
                        <span class="tmt-member-role"><?php echo $settings['role']; ?></span>
                    <?php endif; ?>
                    <?php if ( ! empty( $settings['description_text'] ) ) : ?>
                        <div class="tmt-member-text tmt-content-wrap"><?php echo $settings['description_text']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="tmt-member-icons">
                    <?php
                    foreach ( $settings['social_link_list'] as $link ) : ?>

                        <a href="<?php echo esc_url( $link['social_link'] ); ?>" class="tmt-member-icon elementor-repeater-item-<?php echo $link['_id']; ?>" target="_blank" title="<?php echo $link['social_link_title']; ?>">
                            <?php Icons_Manager::render_icon($link["social_icon"]); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                </div>
                <?php
                break;
            case "style-two": ?>
                <div class="tmt-member tmt-member-skin-calm tmt-transition-toggle tmt-inline">
                    <?php

                    if ( ! empty( $settings['photo']['url'] ) ) :
                        $photo_hover_animation = ( '' != $settings['photo_hover_animation'] ) ? ' tmt-transition-scale-'.$settings['photo_hover_animation'] : ''; ?>

                        <div class="tmt-member-photo-wrapper">

                            <div class="tmt-member-photo">
                                <div class="<?php echo ($photo_hover_animation); ?>">
							<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'photo' ); ?>
						</div>
                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="tmt-member-overlay tmt-overlay tmt-position-bottom tmt-text-center">
                        <div class="tmt-member-desc">
                            <div class="tmt-member-description tmt-transition-slide-bottom-small">
                                <?php if ( ! empty( $settings['name'] ) ) : ?>
                                    <span class="tmt-member-name"><?php echo $settings['name']; ?></span>
                                <?php endif; ?>

                                <?php if ( ! empty( $settings['role'] ) ) : ?>
                                    <span class="tmt-member-role"><?php echo $settings['role']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="tmt-member-icons tmt-transition-slide-bottom">
                                <?php
                                foreach ( $settings['social_link_list'] as $link ) : ?>
                                    <a href="<?php echo esc_url( $link['social_link'] ); ?>" class="tmt-member-icon elementor-repeater-item-<?php echo $link['_id']; ?>" target="_blank" title="<?php echo $link['social_link_title']; ?>">
                                        <?php Icons_Manager::render_icon($link["social_icon"]); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
            case "style-three": ?>
                <div class="tmt-member tmt-member-skin-partait">
                    <div class="tmt-grid tmt-grid-collapse tmt-child-width-1-2@m" tmt-grid>
                        <?php
                        if ( ! empty( $settings['photo']['url'] ) ) :
                        $photo_hover_animation = ( '' != $settings['photo_hover_animation'] ) ? ' tmt-transition-scale-'.$settings['photo_hover_animation'] : ''; ?>

                        <div class="tmt-member-photo-wrapper">
                            <div class="tmt-member-photo">
                                <div class="<?php echo ($photo_hover_animation); ?>">
								<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'photo' ); ?>
							</div>
                            </div>
                    </div>

                    <?php endif; ?>

                    <div class="tmt-member-desc tmt-position-relative">
                        <div class="tmt-position-center tmt-text-center">
                            <div class="tmt-member-description">
                                <?php if ( ! empty( $settings['name'] ) ) : ?>
                                    <span class="tmt-member-name"><?php echo $settings['name']; ?></span>
                                <?php endif; ?>

                                <?php if ( ! empty( $settings['role'] ) ) : ?>
                                    <span class="tmt-member-role"><?php echo $settings['role']; ?></span>
                                <?php endif; ?>

                                <?php if ( ! empty( $settings['description_text'] ) ) : ?>
                                    <div class="tmt-member-text tmt-content-wrap"><?php echo $settings['description_text']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="tmt-member-icons">
                                <?php
                                foreach ( $settings['social_link_list'] as $link ) : ?>
                                    <a href="<?php echo esc_url( $link['social_link'] ); ?>" class="tmt-member-icon elementor-repeater-item-<?php echo $link['_id']; ?>" target="_blank" title="<?php echo $link['social_link_title']; ?>">
                                        <?php Icons_Manager::render_icon($link["social_icon"]); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                break;
            case "style-four": ?>
                <div class="tmt-member tmt-member-skin-phaedra tmt-transition-toggle">
                    <?php

                    if ( ! empty( $settings['photo']['url'] ) ) :
                        $photo_hover_animation = ( '' != $settings['photo_hover_animation'] ) ? ' tmt-transition-scale-'.$settings['photo_hover_animation'] : ''; ?>

                        <div class="tmt-member-photo-wrapper">

                            <div class="tmt-member-photo">
                                <div class="<?php echo ($photo_hover_animation); ?>">
							<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'photo' ); ?>
						</div>
                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="tmt-member-overlay tmt-overlay-default tmt-position-cover tmt-transition-fade">
                        <div class="tmt-member-desc tmt-position-center tmt-text-center">
                            <div class="tmt-member-description tmt-transition-slide-top-small">
                                <?php if ( ! empty( $settings['name'] ) ) : ?>
                                    <span class="tmt-member-name"><?php echo $settings['name']; ?></span>
                                <?php endif; ?>
                                <?php if ( ! empty( $settings['role'] ) ) : ?>
                                    <span class="tmt-member-role"><?php echo $settings['role']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="tmt-member-icons tmt-transition-slide-bottom-small">
                                <?php
                                foreach ( $settings['social_link_list'] as $link ) : ?>

                                    <a href="<?php echo esc_url( $link['social_link'] ); ?>" class="tmt-member-icon elementor-repeater-item-<?php echo $link['_id']; ?>" target="_blank" title="<?php echo $link['social_link_title']; ?>">
                                        <?php Icons_Manager::render_icon($link["social_icon"]); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
        }
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_Member );