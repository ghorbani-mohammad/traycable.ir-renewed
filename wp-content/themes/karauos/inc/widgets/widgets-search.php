<?php

/**
 * Adds Search widget.
 */
class TMT_Search_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'search_widget', // Base ID
			esc_html__( 'Karauos - Search', 'karauos' ), // Name
			array( 'description' => esc_html__( 'Search widget show', 'karauos' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title      = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<form class="search-form tmt-search" method="get" action="<?php bloginfo('url'); ?>" >
			<input type="text" name="s" placeholder="<?php echo __('Search...', 'karauos'); ?>" />
			<button class="search-submit" type="submit" name="submit"><i class="fas fa-search"></i></button>
		</form>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$defaults = array('title' => __( 'Search', 'karauos' ));
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Subject:', 'karauos' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $instance['title']; ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public
	function update( $new_instance, $old_instance ) {
		$instance               = array();
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_tmt_search_widget() {
	register_widget( 'TMT_Search_Widget' );
}

add_action( 'widgets_init', 'register_tmt_search_widget' );