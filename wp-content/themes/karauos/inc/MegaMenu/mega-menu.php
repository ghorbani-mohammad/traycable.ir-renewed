<?php
require_once wp_directory .'/inc/MegaMenu/class-menu-item-custom-fields.php';

class TMT_Cat_Menu_Walker extends Walker_Nav_Menu {

	protected $custom_css = array();

	/*public function head_css() {
		echo '<style type="text/css">' . join( "\n", $this->custom_css ) . '</style>' . PHP_EOL;
	}*/

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		//add_action( 'wp_head', array( $this, 'head_css' ) );

		$title           = $item->title;
		$item_attr_title = $item->attr_title;
		$permalink       = $item->url;
		$classes         = $item->classes;
		$item_target     = $item->target;
		$item_xfn        = $item->xfn;
		//$object_id       = $item->object_id;
		$icon        = get_post_meta( $item->ID, 'menu-item-icon', true );
		$active_mega = get_post_meta( $item->ID, 'menu-item-active_mega', true );
		$col_count   = get_post_meta( $item->ID, 'menu-item-col_count', true );
		$bg_img      = get_post_meta( $item->ID, 'menu-item-bg_img', true );
		$x_align     = get_post_meta( $item->ID, 'menu-item-x_align', true );
		$y_align     = get_post_meta( $item->ID, 'menu-item-y_align', true );

		if ( is_array( $classes ) ) {
			$classes[] = 'menu-item-' . $item->ID;
			$classes[] = 'list-inline-item';

			if ( $active_mega && $col_count ) {
				$classes[] = 'mega-menu mega-menu-col-' . $col_count;
			}
		}

		if ( ! $x_align ) {
			$x_align = 'left';
		}

		if ( ! $y_align ) {
			$y_align = 'bottom';
		}

		if ( $depth == 0 && $active_mega && $col_count ) {
			$this->custom_css[] = '.menu-item-' . $item->ID . ' > ul::before {background-image: url(' . $bg_img . ');background-position: ' . $x_align . ' ' . $y_align . ' ;}';
			echo '<style type="text/css">@media (min-width: 992px) {' . join( "\n", $this->custom_css ) . '}</style>' . PHP_EOL;
		}

		if ( is_array( $classes ) ) {
			$output .= "<li class='" . implode( " ", $classes ) . "'>";
		}

		if ( $permalink ) {
			$attr_title = '';
			if ( $item_attr_title ) {
				$attr_title = 'title="' . $item_attr_title . '"';
			}

			$target = '';
			if ( $item_target ) {
				$target = 'target="_blank"';
			}

			$xfn = '';
			if ( $item_xfn ) {
				$xfn = 'rel="' . $item_xfn . '"';
			}

			$output .= '<a class="nav-link" href="' . $permalink . '" ' . $target . ' ' . $xfn . ' ' . $attr_title . '>';
		} else {
			$output .= '<span>';
		}

		if ( $icon && ! empty( $icon ) ) {
			$output .= '<i class="fa fas fa-' . esc_html( $icon ) . '"></i>';
		}

		$output .= '<span class="title">' . $title . '</span>';

		if ( $permalink ) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"sub-menu nav\">\n";
	}
}

class Themento_Custom_Nav_Fields {

	protected static $fields = array();

	public static function init() {
		add_action( 'wp_nav_menu_item_custom_fields', array( __CLASS__, '_fields' ), 10, 4 );
		add_action( 'wp_update_nav_menu_item', array( __CLASS__, '_save' ), 10, 3 );
		add_filter( 'manage_nav-menus_columns', array( __CLASS__, '_columns' ), 99 );

		self::$fields = array(
			'active_mega' => __('MegaMenu', 'karauos'),
			'col_count'   => __('Number of Columns', 'karauos'),
			'bg_img'      => __('Background Image', 'karauos'),
			'x_align'     => __('Horizontal Alignment', 'karauos'),
			'y_align'     => __('Vertical alignment', 'karauos'),
			'icon'        => __('Icon', 'karauos'),
		);
	}

	/**
	 * Save custom field value
	 *
	 * @wp_hook action wp_update_nav_menu_item
	 *
	 * @param int $menu_id Nav menu ID
	 * @param int $menu_item_db_id Menu item ID
	 * @param array $menu_item_args Menu item data
	 */
	public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

		foreach ( self::$fields as $_key => $_value ) {
			$key = sprintf( 'menu-item-%s', $_key );
			if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
				$value = $_POST[ $key ][ $menu_item_db_id ];
			} else {
				$value = null;
			}

			if ( ! is_null( $value ) ) {
				update_post_meta( $menu_item_db_id, $key, $value );
			} else {
				delete_post_meta( $menu_item_db_id, $key );
			}
		}
	}

	/**
	 * Print field
	 *
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args Menu item args.
	 * @param int $id Nav menu ID.
	 *
	 * @return string Form fields
	 */
	public static function _fields( $id, $item, $depth, $args ) {
		if ( $depth == 0 ) {
			$key_active_mega   = sprintf( 'menu-item-%s', array_keys( self::$fields )[0] );
			$id_active_mega    = sprintf( 'edit-%s-%s', $key_active_mega, $item->ID );
			$name_active_mega  = sprintf( '%s[%s]', $key_active_mega, $item->ID );
			$value_active_mega = get_post_meta( $item->ID, $key_active_mega, true );
			$class_active_mega = sprintf( 'field-%s', array_keys( self::$fields )[0] );

			$key_col_count   = sprintf( 'menu-item-%s', array_keys( self::$fields )[1] );
			$id_col_count    = sprintf( 'edit-%s-%s', $key_col_count, $item->ID );
			$name_col_count  = sprintf( '%s[%s]', $key_col_count, $item->ID );
			$value_col_count = get_post_meta( $item->ID, $key_col_count, true );
			$class_col_count = sprintf( 'field-%s', array_keys( self::$fields )[1] );

			$key_img_bg   = sprintf( 'menu-item-%s', array_keys( self::$fields )[2] );
			$id_img_bg    = sprintf( 'edit-%s-%s', $key_img_bg, $item->ID );
			$name_img_bg  = sprintf( '%s[%s]', $key_img_bg, $item->ID );
			$value_img_bg = get_post_meta( $item->ID, $key_img_bg, true );
			$class_img_bg = sprintf( 'field-%s', array_keys( self::$fields )[2] );

			$key_x_align   = sprintf( 'menu-item-%s', array_keys( self::$fields )[3] );
			$id_x_align    = sprintf( 'edit-%s-%s', $key_x_align, $item->ID );
			$name_x_align  = sprintf( '%s[%s]', $key_x_align, $item->ID );
			$value_x_align = get_post_meta( $item->ID, $key_x_align, true );
			$class_x_align = sprintf( 'field-%s', array_keys( self::$fields )[3] );

			$key_y_align   = sprintf( 'menu-item-%s', array_keys( self::$fields )[4] );
			$id_y_align    = sprintf( 'edit-%s-%s', $key_y_align, $item->ID );
			$name_y_align  = sprintf( '%s[%s]', $key_y_align, $item->ID );
			$value_y_align = get_post_meta( $item->ID, $key_y_align, true );
			$class_y_align = sprintf( 'field-%s', array_keys( self::$fields )[4] );

			$key_icon   = sprintf( 'menu-item-%s', array_keys( self::$fields )[5] );
			$id_icon    = sprintf( 'edit-%s-%s', $key_icon, $item->ID );
			$name_icon  = sprintf( '%s[%s]', $key_icon, $item->ID );
			$value_icon = get_post_meta( $item->ID, $key_icon, true );
			$class_icon = sprintf( 'field-%s', array_keys( self::$fields )[5] );
			?>
            <p class="description description-wide <?php echo esc_attr( $class_active_mega ); ?>">
                <input type="checkbox" id="<?php echo esc_attr( $id_active_mega ); ?>" class="widefat <?php echo esc_attr( $id_active_mega ); ?>" name="<?php echo esc_attr( $name_active_mega ); ?>" value="1" <?php checked( $value_active_mega, 1 ); ?>>
                <label for="<?php echo esc_attr( $id_active_mega ); ?>"><?php echo array_values( self::$fields )[0]; ?></label>
            </p>
            <p class="description description-wide <?php echo esc_attr( $class_col_count ); ?>">
                <label for="<?php echo esc_attr( $id_col_count ); ?>"><?php echo array_values( self::$fields )[1];
					?></label>
                <select id="<?php echo esc_attr( $id_col_count ); ?>" class="widefat <?php echo esc_attr( $id_col_count ); ?>" name="<?php echo esc_attr( $name_col_count ); ?>" dir="ltr">
                    <option></option>
                    <option value="2" <?php selected( $value_col_count, 2 ); ?>>2</option>
                    <option value="3" <?php selected( $value_col_count, 3 ); ?>>3</option>
                    <option value="4" <?php selected( $value_col_count, 4 ); ?>>4</option>
                    <option value="5" <?php selected( $value_col_count, 5 ); ?>>5</option>
                    <option value="6" <?php selected( $value_col_count, 6 ); ?>>6</option>
                </select>
            </p>
            <p class="description description-wide <?php echo esc_attr( $class_img_bg ); ?>">
                <label><?php echo array_values( self::$fields )[2]; ?></label>
                <span style="display: block; text-align: center; margin: 5px 0;">
                    <img src="<?php echo esc_attr( $value_img_bg ); ?>" id="<?php echo esc_attr( $id_img_bg ); ?>" alt="" style="max-width: 100%; height: auto;">
                </span>
                <input type="hidden" id="<?php echo esc_attr( $id_img_bg ); ?>_input" class="widefat <?php echo esc_attr( $id_img_bg ); ?>" name="<?php echo esc_attr( $name_img_bg ); ?>" value="<?php echo esc_attr( $value_img_bg ); ?>">
                <a href="#" class="button select-uploader" data-target="<?php echo esc_attr( $id_img_bg ); ?>" data-target-type="image"><?php echo __('Select image', 'karauos') ?></a>
                <a href="#" class="button remove-uploader" data-target="<?php echo esc_attr( $id_img_bg ); ?>"><?php echo __('Remove image', 'karauos') ?></a>
            </p>
            <?php wp_enqueue_media(); ?>
            <p class="description description-wide <?php echo esc_attr( $class_x_align ); ?>">
                <label for="<?php echo esc_attr( $id_x_align ); ?>"><?php echo array_values( self::$fields )[3]; ?></label>
                <select id="<?php echo esc_attr( $id_x_align ); ?>" class="widefat <?php echo esc_attr( $id_x_align ); ?>" name="<?php echo esc_attr( $name_x_align ); ?>">
                    <option></option>
                    <option value="right" <?php selected( $value_x_align, 'right' ); ?>><?php echo __('Right', 'karauos') ?></option>
                    <option value="center" <?php selected( $value_x_align, 'center' ); ?>><?php echo __('Center', 'karauos') ?></option>
                    <option value="left" <?php selected( $value_x_align, 'left' ); ?>><?php echo __('Left', 'karauos') ?></option>
                </select>
            </p>
            <p class="description description-wide <?php echo esc_attr( $class_y_align ); ?>">
                <label for="<?php echo esc_attr( $id_y_align ); ?>"><?php echo array_values( self::$fields )[4];
					?></label>
                <select id="<?php echo esc_attr( $id_y_align ); ?>" class="widefat <?php echo esc_attr( $id_y_align ); ?>" name="<?php echo esc_attr( $name_y_align ); ?>">
                    <option></option>
                    <option value="top" <?php selected( $value_y_align, 'top' ); ?>><?php echo __('Top', 'karauos') ?></option>
                    <option value="center" <?php selected( $value_y_align, 'center' ); ?>><?php echo __('Center', 'karauos') ?></option>
                    <option value="bottom" <?php selected( $value_y_align, 'bottom' ); ?>><?php echo __('Bottom', 'karauos') ?></option>
                </select>
            </p>
            <p class="description description-wide <?php echo esc_attr( $class_icon ); ?>">
                <label><?php echo array_values( self::$fields )[5]; ?></label>
                <input type="text" id="<?php echo esc_attr( $id_icon ); ?>_input" class="widefat <?php echo esc_attr( $id_icon ); ?>" name="<?php echo esc_attr( $name_icon ); ?>" value="<?php echo esc_attr( $value_icon ); ?>" dir="ltr">
                <?php echo __('<small>Get the icons <a href="https://fontawesome.com/icons/" target="_blank">here</a></small>', 'karauos') ?>
            </p>
			<?php
		}
	}

	/**
	 * Add our fields to the screen options toggle
	 *
	 * @param array $columns Menu item columns
	 *
	 * @return array
	 */
	public static function _columns( $columns ) {
		$columns = array_merge( $columns, self::$fields );

		return $columns;
	}
}

Themento_Custom_Nav_Fields::init();