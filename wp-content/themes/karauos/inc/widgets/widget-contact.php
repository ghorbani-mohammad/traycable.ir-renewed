<?php

/**
 * Adds Foo_Widget widget.
 */
class Contact_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'contact_widget', // Base ID
			esc_html__( 'Karauos - Contact Info', 'karauos' ), // Name
			array( 'description' => esc_html__( 'Contact info your company show here', 'karauos' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$address = $instance['address'];
		$tell = $instance['tell'];
		$email = $instance['email'];

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
        <div class="contact-info">
            <div class="flex text-icon align-items-center">
                <div class="icon text-center">
                    <i class="fas fa-map-marker-alt radius-50"></i>
                </div>
                <p><?php echo $instance['address']; ?></p>
            </div>
            <div class="flex text-icon align-items-center">
                <div class="icon text-center">
                    <i class="fas fa-phone radius-50"></i>
                </div>
                <p><?php echo $instance['tell']; ?></p>
            </div>
            <div class="flex text-icon align-items-center">
                <div class="icon text-center">
                    <i class="fas fa-envelope radius-50"></i>
                </div>
                <p><?php echo $instance['email']; ?></p>
            </div>
        </div>

		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$defaults = array('title' => __( 'Subject', 'karauos' ), 'address' => __( 'Your Address Here', 'karauos' ),'tell' => '021000000', 'email' => 'info@test.com');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Subject:', 'karauos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $instance['title']; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_attr_e( 'Company Address:', 'karauos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" value="<?php echo $instance['address']; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tell' ) ); ?>"><?php esc_attr_e( 'Tell:', 'karauos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tell' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tell' ) ); ?>" type="text" value="<?php echo $instance['tell']; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email:', 'karauos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo $instance['email']; ?>">
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
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['address'] = $new_instance['address'];
		$instance['tell'] = $new_instance['tell'];
		$instance['email'] = $new_instance['email'];

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_contact_widget() {
	register_widget( 'Contact_Widget' );
}
add_action( 'widgets_init', 'register_contact_widget' );