<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Themento_post_widget extends Widget_Base{

	public function get_name(){
		return 'themento-post-grid';
	}

	public function get_title(){
		return __( 'Post Grid', 'karauos' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'karauos' ];
	}

	protected function _register_controls() {
		$this->register_general_post_grid_controls();
		$this->register_general_post_grid_style_controls();
		$this->register_title_post_grid_style_controls();
		$this->register_icon_post_grid_style_controls();
		$this->register_pagination_post_grid_style_controls();
		$this->register_mata_tag_post_grid_style_controls();
		$this->register_excerpt_post_grid_style_controls();
		$this->register_btn_post_grid_style_controls();
	}
	protected function register_general_post_grid_controls() {
		$this->start_controls_section(
			'section_post_grid',
			[
				'label' => __( 'Post Settings', 'karauos' )
			]
		);
		$this->add_control(
			'post_grid_style',
			[
				'label' => __( 'Post Style', 'karauos' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-one',
				'options' => [
					'style-one' => __( 'Style One', 'karauos' ),
					'style-two' => __( 'Style Two',   'karauos' ),
					'style-three' => __( 'Style Three', 'karauos' ),
				],
			]
		);
		$this->add_control(
			'post_type_grid',
			[
				'label' => __( 'Post Type', 'karauos' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'post' => __( 'Posts', 'karauos' ),
					'portfolio' => __( 'Project', 'karauos' ),
				],
				'default' => 'post',

			]
		);
		$this->add_control(
			'post_grid_columns',
			[
				'label' => __( 'Number of Columns', 'karauos' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'column-three',
				'options' => [
					'column-one' => __( 'Single Column', 'karauos' ),
					'column-two' => __( 'Two Columns',   'karauos' ),
					'column-three' => __( 'Three Columns', 'karauos' ),
					'column-four' => __( 'Four Columns',  'karauos' ),
				],
			]
		);
		$this->add_control(
			'category_grid',
			[
				'label' => __( 'Categories', 'karauos' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => themento_post_type_categories(),
				'condition' => [
					'post_type_grid' => 'post'
				]
			]
		);
		$this->add_control(
			'portfolio_grid',
			[
				'label' => __( 'Categories', 'karauos' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => themento_post_type_portfolio_cat(),
				'condition' => [
					'post_type_grid' => 'portfolio'
				]
			]
		);
		$this->add_control(
			'posts_count',
			[
				'label' => __( 'Number of Posts', 'karauos' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '6'
			]
		);

		$this->add_control(
			'post_order',
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
            'title_tag',
            [
                'label' => __( 'Title Tag', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'multiple' => true,
                'options' => themento_title_tags(),
                'default' => 'h2',
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
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Show Pagination', 'karauos' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'show_icon_post',
            [
                'label' => __( 'Show Icon', 'karauos' ),
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
                'separator' => 'before',
                'default' => '1'
            ]
        );
		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Show excerpt', 'karauos' ),
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
				'condition' => [
					'post_grid_style' => 'style-two'
				],
				'separator' => 'before',
				'default' => '1'
			]
		);
		$this->add_control(
			'excerpt_length',
			[
				'label' => __( 'Excerpt Words', 'karauos' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '40',
				'condition' => [
					'show_excerpt' => '1',
					'post_grid_style' => 'style-two'
				]
			]
		);
		$this->add_control(
			'show_more_link',
			[
				'label' => __( 'Show Read More', 'karauos' ),
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
				'condition' => [
					'post_grid_style' => 'style-two'
				],
				'separator' => 'before',
				'default' => '1'
			]
		);
		$this->add_control(
			'text_more_link',
			[
				'label' => __( 'Read More Text', 'karauos' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'karauos' ),
				'condition' => [
					'show_more_link' => '1',
					'post_grid_style' => 'style-two'
				]
			]
		);
		$this->add_control(
			'show_meta_data',
			[
				'label' => __( 'Show Meta', 'karauos' ),
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
				'condition' => [
					'post_grid_style' => 'style-two'
				],
				'separator' => 'before',
				'default' => '1'
			]
		);
		$this->add_control(
			'meta_data',
			[
				'label' => __( 'Meta Post', 'karauos' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'default' => [ 'date', 'comments' ],
				'multiple' => true,
				'options' => [
					'author' => __( 'Author', 'karauos' ),
					'date' => __( 'Date', 'karauos' ),
					'time' => __( 'Time', 'karauos' ),
					'comments' => __( 'Comments', 'karauos' ),
				],
				'condition' => [
					'show_meta_data' => '1',
					'post_grid_style' => 'style-two'
				],
			]
		);
		$this->end_controls_section();
	}
	protected function register_general_post_grid_style_controls() {
		$this->start_controls_section(
			'section_post_grid_style',
			[
				'label' => __( 'Post Grid Style', 'karauos' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_responsive_control(
			'post_grid_height',
			[
				'label' => __( 'Post Grid Height', 'karauos' ),
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
					'size' => 450,
				],
				'size_units' => [ 'px', 'vh' ],
				'selectors' => [
					'{{WRAPPER}} .article-item, {{WRAPPER}} .article-item-blog,{{WRAPPER}} .image-projects' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'post_grid_column_gap',
			[
				'label' => __( 'Spacing Between Columns', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .article-box' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'post_grid_row_gap',
			[
				'label' => __( 'Spacing Between Row', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .article-box' => 'grid-row-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'style_post_grid_basics',
			[
				'label'     => __( 'Border', 'karauos' ),
				'type'      => Controls_Manager::HEADING,
				'separator'    => 'before',
			]
		);
		$this->start_controls_tabs('style_post_grid_tabs');
		$this->start_controls_tab('style_normal_tab', ['label' => __( 'Normal', 'karauos' ),]);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_grid_border',
				'selector' => '{{WRAPPER}} .article-item, {{WRAPPER}} .article-item-blog figure, {{WRAPPER}} .image-projects',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab('style_hover_tab', ['label' => __( 'Hover', 'karauos' ),]);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_grid_hover_border',
				'selector' => '{{WRAPPER}} .article-item:hover, {{WRAPPER}} .article-item-blog:hover figure, {{WRAPPER}} .image-projects:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'post_grid_border_radius',
			[
				'label' => __( 'Border Radius', 'karauos' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .article-item, {{WRAPPER}} .article-item img, {{WRAPPER}} .article-item-blog figure, {{WRAPPER}} .article-item-blog, {{WRAPPER}} .image-projects' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'post_grid_box_shadow',
				'selector' => '{{WRAPPER}} .article-item, {{WRAPPER}} .article-item-blog figure, {{WRAPPER}} .image-projects',
			]
		);
		$this->add_control(
			'post_grid_bg_hover_color',
			[
				'label' => __( 'Hover Post Background Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eead16',
				'separator'    => 'before',
				'selectors' => [
					'{{WRAPPER}} .article-item, {{WRAPPER}} .article-item-blog figure, {{WRAPPER}} .image-projects' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_section();
	}
	protected function register_title_post_grid_style_controls() {
		$this->start_controls_section(
			'section_title_post_grid_style',
			[
				'label' => __( 'Title Style', 'karauos' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
        $this->add_control(
            'title_position',
            [
                'label' => __( 'Title Position', 'karauos' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'in',
                'options' => [
                    'in'  => __( 'In Thumbnail', 'karauos' ),
                    'out' => __( 'Out Thumbnail', 'karauos' ),
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_grid_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title-post, {{WRAPPER}} .title-portfolio',
			]
		);
		$this->add_responsive_control(
			'post_grid_title_alignment',
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
					'{{WRAPPER}} .article-item-footer, {{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio' => 'text-align: {{VALUE}};justify-content: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'post_grid_title_height',
			[
				'label' => __( 'Height', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 150,
					],
					'%' => [
						'min' => 10,
						'max' => 30,
					],
				],
				'default' => [
					'size' => 100,
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .article-item-footer' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'post_grid_style' => 'style-one'
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'post_grid_title_padding',
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
					'{{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
				'condition' => [
					'post_grid_style' => [ 'style-three', 'style-two' ]
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'post_grid_title_width',
			[
				'label' => __( 'Title Width', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 10,
						'max' => 100,
					],
					'px' => [
						'min' => 50,
						'max' => 500,
					],
				],
				'default' => [
					'size' => '90',
					'unit' => '%',
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .article-item-footer, {{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'post_grid_title_space',
            [
                'label' => __( 'Title Space', 'karauos' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'size_units' => [ '%', 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .article-item-footer, {{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );
		$this->start_controls_tabs( 'post_grid_title_tabs' );
		$this->start_controls_tab( 'normal', [ 'label' => __( 'Normal', 'karauos' ) ] );

		$this->add_control(
			'post_grid_title_color',
			[
				'label' => __( 'Title Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#051934',
				'selectors' => [
					'{{WRAPPER}} .title-post a, {{WRAPPER}} .title-portfolio' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'post_grid_bg_title_color',
			[
				'label' => __( 'Title Background', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .article-item-footer, {{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio' => 'background-color: {{VALUE}}',
				]

			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_grid_bg_title_border',
				'selector' => '{{WRAPPER}} .article-item-footer, {{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab( 'hover', [ 'label' => __( 'Hover', 'karauos' ) ] );

		$this->add_control(
			'post_grid_title_hover_color',
			[
				'label' => __( 'Title Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .article-item:hover .title-post a, {{WRAPPER}} .article-item-blog:hover .title-post, {{WRAPPER}} .title-portfolio:hover' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'post_grid_bg_hover_title_color',
			[
				'label' => __( 'Title Background', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#051934',
				'selectors' => [
					'{{WRAPPER}} .article-item:hover .article-item-footer, {{WRAPPER}} .article-item-blog:hover .article-blog-bottom, {{WRAPPER}} .title-portfolio:hover' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_grid_bg_c_hover_border',
				'selector' => '{{WRAPPER}} .article-item:hover .article-item-footer, {{WRAPPER}} .article-item-blog:hover .article-blog-bottom, {{WRAPPER}} .title-portfolio:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'post_grid_border_radius_title',
			[
				'label' => __( 'Border Radius', 'karauos' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .article-item-footer, {{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'post_grid_title_box_shadow',
				'selector' => '{{WRAPPER}} .article-item-footer,{{WRAPPER}} .article-blog-bottom, {{WRAPPER}} .title-portfolio',
			]
		);

		$this->end_controls_section();
	}
	protected function register_icon_post_grid_style_controls() {
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'karauos' ),
				'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_icon_post' => '1'
                ],
			]
		);
        $this->add_control(
            'post_grid_icon',
            [
                'label'            => __( 'Select Icon', 'myco' ),
                'type'             => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'fas fa-link',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'section_post_grid' => [ 'style-one', 'style-two' ],
                    'show_icon_post' => '1'
                ],
            ]
        );
		$this->add_responsive_control(
			'post_grid_icon_size',
			[
				'label' => __( 'Icon Size', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 12,
						'max' => 100,
					],
					'em' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'default' => [
					'unit' => 'em',
					'size' => 2,
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .article-item i, {{WRAPPER}} .article-item-blog i, {{WRAPPER}} .back a' => 'font-size: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'show_icon_post' => '1'
                ],
			]
		);
		$this->add_control(
			'post_grid_icon_border_radius',
			[
				'label' => __( 'Border Radius', 'karauos' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .article-item i, {{WRAPPER}} .article-item-blog i, {{WRAPPER}} .back a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'separator' => 'after',
                'condition' => [
                    'show_icon_post' => '1'
                ],
			]
		);
		$this->start_controls_tabs('style_icon_tabs');
		$this->start_controls_tab('style_icon_normal_tab', ['label' => __( 'Normal', 'karauos' ),]);

		$this->add_control(
			'post_grid_icon_color',
			[
				'label' => __( 'Icon Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#051934',
				'selectors' => [
					'{{WRAPPER}} .article-item i, {{WRAPPER}} .article-item-blog i, {{WRAPPER}} .back a' => 'color: {{VALUE}}',
				],
                'condition' => [
                    'show_icon_post' => '1'
                ],
			]
		);
		$this->add_control(
			'post_grid_icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .article-item i, {{WRAPPER}} .article-item-blog i, {{WRAPPER}} .back a' => 'background-color: {{VALUE}}',
				],
                'condition' => [
                    'show_icon_post' => '1'
                ],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab('style_icon_hover_tab', ['label' => __( 'Hover', 'karauos' ),]);
		$this->add_control(
			'post_grid_icon_hover_color',
			[
				'label' => __( 'Icon Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .article-item i:hover, {{WRAPPER}} .article-item-blog i:hover, {{WRAPPER}} .back a:hover' => 'color: {{VALUE}}',
				],
                'condition' => [
                    'show_icon_post' => '1'
                ],
			]
		);
		$this->add_control(
			'post_grid_icon_hover_bg_color',
			[
				'label' => __( 'Icon Background Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#051934',
				'selectors' => [
					'{{WRAPPER}} .article-item i:hover, {{WRAPPER}} .article-item-blog i:hover, {{WRAPPER}} .back a:hover' => 'background-color: {{VALUE}}',
				],
                'condition' => [
                    'show_icon_post' => '1'
                ],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	protected function register_pagination_post_grid_style_controls() {
		$this->start_controls_section(
			'section_pagination_post_grid_style',
			[
				'label' => __( 'Pagination', 'karauos' ),
				'condition' => [
					'show_pagination' => 'yes'
				],
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_responsive_control(
			'post_grid_pagination_alignment',
			[
				'label' => __( 'Pagination Alignment', 'karauos' ),
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
					'{{WRAPPER}} .pagination' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->start_controls_tabs('style_pagination_tabs');
		$this->start_controls_tab('style_pagination_normal_tab', ['label' => __( 'Normal', 'karauos' ),]);

		$this->add_control(
			'post_grid_pagination_number_color',
			[
				'label' => __( 'Pagination Number Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eead16',
				'selectors' => [
					'{{WRAPPER}} .navigation a' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'post_grid_pagination_bg_color',
			[
				'label' => __( 'Pagination Background Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .navigation a' => 'background-color: {{VALUE}}',
				]

			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_grid_pagination_border',
				'selector' => '{{WRAPPER}} .navigation a',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab('style_pagination_hover_tab', ['label' => __( 'Hover', 'karauos' ),]);

		$this->add_control(
			'post_grid_pagination_number_hover_color',
			[
				'label' => __( 'Pagination Number Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .navigation a:hover , {{WRAPPER}} .pagination .current' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'post_grid_pagination_bg_hover_color',
			[
				'label' => __( 'Pagination Background Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eead16',
				'selectors' => [
					'{{WRAPPER}} .navigation a:hover , {{WRAPPER}} .pagination .current' => 'background-color: {{VALUE}}',
				]

			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_grid_pagination_hover_border',
				'selector' => '{{WRAPPER}} .navigation a:hover , {{WRAPPER}} .pagination .current',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'post_grid_pagination_border_radius',
			[
				'label' => __( 'Border Radius', 'karauos' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .navigation a, {{WRAPPER}} .pagination .current' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
		$this->add_control(
			'pagination_size',
			[
				'label' => __( 'Pagination Size', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'em' => [
						'min' => 2,
						'max' => 5,
					],
				],
				'default' => [
					'unit' => 'em',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .navigation a, {{WRAPPER}} .pagination .current' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	protected function register_mata_tag_post_grid_style_controls() {
		$this->start_controls_section(
			'section_mata_tag_post_grid_style',
			[
				'label' => __( 'Meta Style', 'karauos' ),
				'condition' => [
					'show_meta_data' => '1',
					'post_grid_style' => 'style-two'
				],
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'post_grid_mata_tag_color',
			[
				'label' => __( 'Meta Text Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#051934',
				'selectors' => [
					'{{WRAPPER}} .meta-data, {{WRAPPER}} .meta-data a,{{WRAPPER}} .article-blog-text .date' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'post_grid_mata_tag_icon_color',
			[
				'label' => __( 'Meta Icon Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .meta-data i' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'mata_tag_size',
			[
				'label' => __( 'Meta Text Size', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 12,
						'max' => 36,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .meta-data' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'mata_tag_margin',
			[
				'label' => __( 'Spacing', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .meta-data' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	protected function register_excerpt_post_grid_style_controls() {
		$this->start_controls_section(
			'section_excerpt_post_grid_style',
			[
				'label' => __( 'Post Excerpt', 'karauos' ),
				'condition' => [
					'show_excerpt' => '1',
					'post_grid_style' => 'style-two'
				],
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'post_grid_excerpt_color',
			[
				'label' => __( 'Text Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .article-blog-text .excerpt, {{WRAPPER}} .article-blog-text .excerpt p' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_responsive_control(
			'post_grid_excerpt_alignment',
			[
				'label' => __( 'Alignment', 'karauos' ),
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
					],
					'justify' => [
						'title' => __( 'Justify', 'karauos' ),
						'icon' => 'fa fa-align-justify',
					]
				],
				'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .article-blog-text .excerpt,{{WRAPPER}} .article-blog-text .excerpt p' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'post_grid_excerpt_margin',
			[
				'label' => __( 'Spacing', 'karauos' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .article-blog-text .excerpt,{{WRAPPER}} .article-blog-text .excerpt p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	protected function register_btn_post_grid_style_controls() {
		$this->start_controls_section(
			'section_btn_post_grid_style',
			[
				'label' => __( 'Read More', 'karauos' ),
				'condition' => [
					'show_more_link' => '1',
					'post_grid_style' => 'style-two'
				],
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->start_controls_tabs('style_btn_tabs');
		$this->start_controls_tab('style_btn_normal_tab', ['label' => __( 'Normal', 'karauos' ),]);
		$this->add_control(
			'post_grid_btn_color',
			[
				'label' => __( 'Text Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#051934',
				'selectors' => [
					'{{WRAPPER}} .read-more a' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'post_grid_btn_bg_color',
			[
				'label' => __( 'Background Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eead16',
				'selectors' => [
					'{{WRAPPER}} .read-more a' => 'background-color: {{VALUE}}',
				]

			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab('style_btn_hover_tab', ['label' => __( 'Hover', 'karauos' ),]);
		$this->add_control(
			'post_grid_btn_hover_color',
			[
				'label' => __( 'Text Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .read-more a:hover' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'post_grid_btn_bg_hover_color',
			[
				'label' => __( 'Background Color', 'karauos' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#051934',
				'selectors' => [
					'{{WRAPPER}} .read-more a:hover' => 'background-color: {{VALUE}}',
				]

			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'post_grid_btn_alignment',
			[
				'label' => __( 'Alignment', 'karauos' ),
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
				'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'text-align: {{VALUE}};',
				]
			]
		);
        $this->add_control(
            'post_grid_btn_padding',
            [
                'label' => __( 'Padding', 'karauos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .read-more a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
	}
	protected function render( ) {
		$settings = $this->get_settings();

		$post_type = $settings['post_type_grid'];
		switch($post_type)
		{
			case 'post':
				$get_taxonomy = $settings['category_grid'];
				$taxonomy = 'category';
				break;
			case 'portfolio':
				$get_taxonomy = $settings['portfolio_grid'];
				$taxonomy = 'portfolio_cat';
				break;
		}
		$meta_data = $settings['meta_data'];
		$title_position = $settings['title_position'];
		$show_icon_post = $settings['show_icon_post'];
		echo '<div class="article-box grid justify-content-between ' . $settings['post_grid_columns'] . '">';
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'posts_per_page' => $settings['posts_count'],
			'post_type' => $settings['post_type_grid'],
			'post_status' => 'publish',
			'order' => $settings['post_order'],
			'paged'=> $paged,
		);
		if ( ! empty($get_taxonomy) ) $args['tax_query'] = array(array('taxonomy' => $taxonomy, 'terms' => $get_taxonomy,));
		$query = new \WP_Query($args);
        $image_size = $settings['image_size'];
        $id = $this->get_id();
        if('custom' == $image_size) {
            $width = $settings['image_custom_dimension']['width'];
            $height = $settings['image_custom_dimension']['height'];
            add_image_size( "custom-$id", $width, $height, true );
        }
		if ( $query->have_posts() ):while ( $query->have_posts() ):$query->the_post();
            $title_tag = $settings['title_tag'];
            $title = get_the_title();
            $permalink = get_the_permalink();
			$post_grid_style = $settings['post_grid_style'];
			switch ($post_grid_style) {
				case "style-one":
					echo '<article class="Themento-Posts">'
					     . '<div class="article-item"'; if (Plugin::$instance->editor->is_edit_mode() ) {echo '>';} else {echo ' onclick="' . "location.href='"; echo $permalink . "'" . '">';}
                    if('custom' == $image_size) {
                        karauos_post_thumbnail("$image_size-$id");
                    } else {
                        karauos_post_thumbnail($image_size);
                    }
                    if ($show_icon_post == '1') {Icons_Manager::render_icon( $settings['post_grid_icon']);}
					     echo '<div class="article-item-footer flex align-items-center justify-content-'. $settings['post_grid_title_alignment'] .'">'
					     . "<$title_tag class='title-post'>$title</$title_tag></div></div></article>";
					break;
				case "style-two":
					echo '<article class="Themento-Posts">';
					echo '<div class="blog-items">'
					     . '<div class="article-item-blog shadow-img"'; if (Plugin::$instance->editor->is_edit_mode() ) {echo '>';} else {echo ' onclick="' . "location.href='"; echo $permalink . "'" . '">';}
					echo '<figure>';
					if('custom' == $image_size) {
                    karauos_post_thumbnail("$image_size-$id");
                    } else {
                        karauos_post_thumbnail($image_size);
                    }
                echo '</figure>';
                    if ($show_icon_post == '1') {Icons_Manager::render_icon( $settings['post_grid_icon']);}
                    if ($title_position == 'in') {
                        echo '<div class="article-blog-bottom flex align-items-center justify-content-' . $settings['post_grid_title_alignment'] . '">'
                            . "<$title_tag class='title-post'><a href='$permalink'>$title</a></$title_tag>"
                            . '</div>';
                    }
                    echo '</div>'
                    . '<div class="article-blog-text">';
                    if ($title_position == 'out') {
                        echo '<div class="article-blog-bottom flex align-items-center justify-content-' . $settings['post_grid_title_alignment'] . '">'
                            . "<$title_tag class='title-post'><a href='$permalink'>$title</a></$title_tag>"
                            . '</div>';
                    }
					if($settings['show_meta_data'] == '1'){
						echo '<div class="meta-data flex">';
						if (in_array('date', $meta_data)) {echo '<div class="date"><i class="far fa-calendar-alt"></i>';echo the_time('j F Y') . '</div>';}
						if (in_array('time', $meta_data)) {echo '<div class="time"><i class="far fa-clock"></i>';echo the_time('H:i') . '</div>';}
						if (in_array('author', $meta_data)) {echo '<div class="author"><i class="far fa-user-circle"></i>';the_author_posts_link();echo '</div>';}
						if (in_array('comments', $meta_data)) {echo '<div class="comments"><i class="far fa-comment"></i>';echo comments_number() . '</div>';}
						echo '</div>';
					}
					if($settings['show_excerpt'] == '1'){echo '<div class="excerpt">'; excerpt_post($settings['excerpt_length']); echo '</div>';}
					if($settings['show_more_link'] == '1'){echo '<div class="read-more"><a href="'; echo $permalink . '">'. $settings['text_more_link'] . '<i class="fas fa-angle-left"></i></a></div>';}
					echo '</div></div></article>';
					break;
				case "style-three":
					echo '<div class="image-projects"'; if (Plugin::$instance->editor->is_edit_mode() ) {echo '>';} else {if ($show_icon_post == '1') {echo ' onclick="' . "location.href='"; echo $permalink . "'" . '">';}}
						echo '<figure>';
                    if('custom' == $image_size) {
                        karauos_post_thumbnail("$image_size-$id");
                    } else {
                        karauos_post_thumbnail($image_size);
                    } $post_grid_title_alignment = $settings['post_grid_title_alignment'];
					 echo '</figure>'
					     . "<$title_tag class='title-portfolio flex align-items-center justify-content-$post_grid_title_alignment'>$title</$title_tag>";
                    if ($show_icon_post == '1') {
                        echo '<div class="back-item flex justify-content-between">'
                            . '<div class="back"><a href="'; echo $permalink; echo '"><i class="fas fa-link"></i></a></div>'
                            . '<div class="back"><a href="';if (has_post_thumbnail()) {echo the_post_thumbnail_url('large');} else {echo wp_directory_uri . '/images/thumbnail.jpg';}echo '" data-fancybox="gallery" data-caption="';echo $title;echo '"><i class="fas fa-search"></i></a></div>'
                        . '</div>';
                    }
                    echo '</div>';
					break;
			}
		endwhile;
			echo '</div>';
			if (( 'yes' === $settings['show_pagination'] )) {
				$GLOBALS['wp_query']->max_num_pages = $query->max_num_pages;
                karauos_the_posts_navigation(3);
			};
		endif;
	}
	protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Themento_post_widget );