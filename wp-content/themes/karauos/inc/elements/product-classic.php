<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class Themento_product_classic extends Widget_Base {

    public function get_name(){return 'themento-product-classic';}
    public function get_title(){return __( 'Product Classic', 'karauos');}
    public function get_icon() {return 'eicon-products';}
    public function get_categories() {return [ 'karauos' ];}

    protected function _register_controls() {
        $this->register_general_product_grid_controls();
        $this->register_general_style_product_grid_controls();
        $this->register_image_style_product_grid_controls();
        $this->register_title_style_product_grid_controls();
        $this->register_rating_style_product_grid_controls();
        $this->register_price_style_product_grid_controls();
        $this->register_button_style_product_grid_controls();
        $this->register_badge_style_product_grid_controls();
    }

    protected function register_general_product_grid_controls() {
        $this->start_controls_section(
            'section_product_grid',
            [
                'label' => __( 'product Settings' ,'karauos')
            ]
        );
        $this->add_control(
            'product_grid_columns',
            [
                'label' => __( 'Number of Columns', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'columns-4',
                'options' => [
                    'columns-1' => __( 'Single Column', 'karauos' ),
                    'columns-2' => __( 'Two Columns',   'karauos' ),
                    'columns-3' => __( 'Three Columns', 'karauos' ),
                    'columns-4' => __( 'Four Columns',  'karauos' ),
                    'columns-5' => __( 'Five Columns',  'karauos' ),
                    'columns-6' => __( 'Six Columns',  'karauos' ),
                ],
            ]
        );
        $this->add_control(
            'products_count',
            [
                'label' => __( 'Number of Posts', 'karauos' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '4'
            ]
        );
        $this->add_control(
            'products_order',
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
        $product_categories = get_terms( 'product_cat' );

        $options = [];
        foreach ( $product_categories as $category ) {
            $options[ $category->slug ] = $category->name;
        }

        $this->add_control(
            'product_categories',
            [
                'label'       => esc_html__( 'Categories', 'karauos' ),
                'type'        => Controls_Manager::SELECT2,
                'options'     => $options,
                'default'     => [],
                'label_block' => true,
                'multiple'    => true,
            ]
        );
        $this->add_control(
            'exclude_products',
            [
                'label'       => esc_html__( 'Exclude Product(s)', 'karauos' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder'     => 'product_id',
                'label_block' => true,
                'description' => __( 'Write product id here, if you want to exclude multiple products so use comma as separator. Such as 1 , 2', 'karauos' ),
            ]
        );
        $this->add_control(
            'show_product_type',
            [
                'label'   => esc_html__( 'Show Product', 'karauos' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'total_sales',
                'options' => [
                    'all'      => esc_html__( 'All Products', 'karauos' ),
                    'onsale'   => esc_html__( 'On Sale', 'karauos' ),
                    'featured' => esc_html__( 'Featured', 'karauos' ),
                ],
            ]
        );
        $this->add_control(
            'hide_free',
            [
                'label'   => esc_html__( 'Hide Free', 'karauos' ),
                'type'    => Controls_Manager::SWITCHER,
            ]
        );


        $this->add_control(
            'hide_out_stock',
            [
                'label'   => esc_html__( 'Hide Out of Stock', 'karauos' ),
                'type'    => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order by', 'karauos' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date'  => esc_html__( 'Date', 'karauos' ),
                    'price' => esc_html__( 'Price', 'karauos' ),
                    'sales' => esc_html__( 'Sales', 'karauos' ),
                    'rand'  => esc_html__( 'Random', 'karauos' ),
                ],
            ]
        );
        $this->add_control(
            'show_pagination',
            [
                'label' => __( 'Show Pagination', 'karauos'),
                'type' => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_rating',
            [
                'label'   => esc_html__( 'Rating', 'karauos' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();
    }
    protected function register_general_style_product_grid_controls() {
        $this->start_controls_section(
            'general_style',
            [
                'label'     => esc_html__( 'General', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'item_gap',
            [
                'label'   => esc_html__( 'Column Gap', 'karauos' ),
                'type'    => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .products' => 'grid-column-gap: {{SIZE}}px',
                ],
            ]
        );
        $this->add_responsive_control(
            'row_gap',
            [
                'label'   => esc_html__( 'Row Gap', 'karauos' ),
                'type'    => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .products' => 'grid-row-gap: {{SIZE}}px',
                ],
            ]
        );
        $this->add_control(
            'alignment',
            [
                'label'   => esc_html__( 'Alignment', 'karauos' ),
                'type'    => Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'karauos' ),
                        'icon'  => 'fas fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'karauos' ),
                        'icon'  => 'fas fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'karauos' ),
                        'icon'  => 'fas fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product a.woocommerce-LoopProduct-link' => 'display: flex;flex-direction: column;align-items: {{VALUE}};',
                    '{{WRAPPER}} .product' => 'align-items: {{VALUE}};',
                ],
            ]
        );
        $this->start_controls_tabs( 'tabs_item_style' );

        $this->start_controls_tab(
            'tab_item_normal',
            [
                'label' => esc_html__( 'Normal', 'karauos' ),
            ]
        );

        $this->add_control(
            'item_background',
            [
                'label'     => esc_html__( 'Background', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'item_border',
                'label'       => esc_html__( 'Border Color', 'karauos' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .product',
                'separator'   => 'before',
            ]
        );

        $this->add_responsive_control(
            'item_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};overflow: hidden;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'item_shadow',
                'selector' => '{{WRAPPER}} .product',
            ]
        );

        $this->add_responsive_control(
            'item_padding',
            [
                'label'      => esc_html__( 'Item Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_item_hover',
            [
                'label' => esc_html__( 'Hover', 'karauos' ),
            ]
        );

        $this->add_control(
            'item_hover_background',
            [
                'label'     => esc_html__( 'Background', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_hover_border_color',
            [
                'label'     => esc_html__( 'Border Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'item_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .product:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'item_hover_shadow',
                'selector' => '{{WRAPPER}} .product:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    protected function register_image_style_product_grid_controls() {
        $this->start_controls_section(
            'image_style',
            [
                'label'     => esc_html__( 'Image', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Image Border', 'karauos' ),
                'selector' => '{{WRAPPER}} .product a img',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .product a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'    => 'image_shadow',
                'exclude' => [
                    'shadow_position',
                ],
                'selector' => '{{WRAPPER}} .product a img',
            ]
        );

        $this->end_controls_section();
    }
    protected function register_title_style_product_grid_controls() {
        $this->start_controls_section(
            'title_style',
            [
                'label'     => esc_html__( 'Title', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-loop-product__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_title_color',
            [
                'label'     => esc_html__( 'Hover Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product:hover .woocommerce-loop-product__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__( 'Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => esc_html__( 'Typography', 'karauos' ),
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .woocommerce-loop-product__title',
            ]
        );
        $this->end_controls_section();
    }
    protected function register_rating_style_product_grid_controls() {
        $this->start_controls_section(
            'style_rating',
            [
                'label'     => esc_html__( 'Rating', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_rating' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'rating_color',
            [
                'label'     => esc_html__( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#e7e7e7',
                'selectors' => [
                    '{{WRAPPER}} .star-rating:before' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'active_rating_color',
            [
                'label'     => esc_html__( 'Active Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFCC00',
                'selectors' => [
                    '{{WRAPPER}} .star-rating span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'rating_margin',
            [
                'label'      => esc_html__( 'Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .star-rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function register_price_style_product_grid_controls() {
        $this->start_controls_section(
            'style_price',
            [
                'label'     => esc_html__( 'Price', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'old_price_color',
            [
                'label'     => esc_html__( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price del' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'old_price_margin',
            [
                'label'      => esc_html__( 'Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'old_price_typography',
                'label'    => esc_html__( 'Typography', 'karauos' ),
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .price del',
            ]
        );

        $this->add_control(
            'sale_price_heading',
            [
                'label'     => esc_html__( 'Sale Price', 'karauos' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sale_price_color',
            [
                'label'     => esc_html__( 'Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price ins' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sale_price_margin',
            [
                'label'      => esc_html__( 'Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .price ins' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'sale_price_typography',
                'label'    => esc_html__( 'Typography', 'karauos' ),
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .price ins',
            ]
        );

        $this->end_controls_section();
    }
    protected function register_button_style_product_grid_controls() {
        $this->start_controls_section(
            'style_button',
            [
                'label'     => esc_html__( 'Button', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
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
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'     => esc_html__( 'Background Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'border',
                'label'       => esc_html__( 'Border', 'karauos' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'button_padding',
            [
                'label'      => esc_html__( 'Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'button_fullwidth',
            [
                'label'     => esc_html__( 'Fullwidth Button', 'karauos' ),
                'type'      => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button' => 'width: 100%;text-align:center',
                ],
                'separator' => 'before',
                'default'   => 'yes',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_shadow',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'button_typography',
                'label'     => esc_html__( 'Typography', 'karauos' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .woocommerce ul.products li.product .button,{{WRAPPER}} li.product .added_to_cart .button',
                'separator' => 'before',
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
            'hover_color',
            [
                'label'     => esc_html__( 'Text Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product:hover .button,{{WRAPPER}} li.product:hover .added_to_cart .button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color',
            [
                'label'     => esc_html__( 'Background Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product:hover .button,{{WRAPPER}} li.product:hover .added_to_cart .button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label'     => esc_html__( 'Border Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product:hover .button,{{WRAPPER}} li.product:hover .added_to_cart .button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    protected function register_badge_style_product_grid_controls() {
        $this->start_controls_section(
            'section_style_badge',
            [
                'label'     => esc_html__( 'Badge', 'karauos' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'badge_text_color',
            [
                'label'     => esc_html__( 'Text Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color',
            [
                'label'     => esc_html__( 'Background Color', 'karauos' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_padding',
            [
                'label'      => esc_html__( 'Padding', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'badge_margin',
            [
                'label'      => esc_html__( 'Margin', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'badge_border',
                'label'       => esc_html__( 'Border', 'karauos' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .woocommerce ul.products li.product .onsale',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'badge_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'karauos' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_shadow',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .onsale',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }
    protected function render( ) {
        $settings = $this->get_settings();

        $product_grid_columns = $settings['product_grid_columns'];

        echo "<div class='woocommerce'>"
        . "<ul class='products $product_grid_columns'>";
        $exclude_products = ($settings['exclude_products']) ? explode(',', $settings['exclude_products']) : [];
        $args = array(
            'posts_per_page' => $settings['products_count'],
            'post_status' => 'publish',
            'order' => $settings['products_order'],
            'post_type' => 'product',
            'post__not_in'        => $exclude_products,
        );
        if (!empty($settings['product_categories']) ) {
            $args['tax_query'][] = array(
                'taxonomy'           => 'product_cat',
                'field'              => 'slug',
                'terms'              => $settings['product_categories'],
                'post__not_in'       => $exclude_products,
            );
        }
        if ( 'yes' == $settings['hide_free'] ) {
            $args['meta_query'][] = array(
                'key'     => '_price',
                'value'   => 0,
                'compare' => '>',
                'type'    => 'DECIMAL',
            );
        }
        $product_visibility_term_ids = wc_get_product_visibility_term_ids();
        if ( 'yes' == $settings['hide_out_stock'] ) {
            $args['tax_query'][] = array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'term_taxonomy_id',
                    'terms'    => $product_visibility_term_ids['outofstock'],
                    'operator' => 'NOT IN',
                ),
            ); // WPCS: slow query ok.
        }
        switch ( $settings['show_product_type'] ) {
            case 'featured':
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'term_taxonomy_id',
                    'terms'    => $product_visibility_term_ids['featured'],
                );
                break;
            case 'onsale':
                $product_ids_on_sale    = wc_get_product_ids_on_sale();
                $product_ids_on_sale[]  = 0;
                $args['post__in'] = $product_ids_on_sale;
                break;
        }


        switch ( $settings['orderby'] ) {
            case 'price':
                $args['meta_key'] = '_price'; // WPCS: slow query ok.
                $args['orderby']  = 'meta_value_num';
                break;
            case 'rand':
                $args['orderby'] = 'rand';
                break;
            case 'sales':
                $args['meta_key'] = 'total_sales'; // WPCS: slow query ok.
                $args['orderby']  = 'meta_value_num';
                break;
            default:
                $args['orderby'] = 'date';
        }

        $query = new \WP_Query($args);
        if ( $query->have_posts() ):while ( $query->have_posts() ):$query->the_post();

            wc_get_template_part( 'content', 'product' );

        endwhile;
            echo "</ul>";
            if (( 'yes' === $settings['show_pagination'] )) {
                $GLOBALS['wp_query']->max_num_pages = $query->max_num_pages;
                the_posts_pagination( array(
                    'mid_size' => 3,
                    'prev_text' => ('<i class="fa fa-angle-double-right"></i>'),
                    'next_text' => ('<i class="fa fa-angle-double-left"></i>'),
                ) );
            };
        endif;
        echo "</div>";
    }
    protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_product_classic );