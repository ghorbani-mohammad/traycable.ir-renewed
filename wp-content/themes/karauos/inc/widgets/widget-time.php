<?php

/**
 * Adds Foo_Widget widget.
 */
class Time_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'time_widget', // Base ID
			esc_html__( 'Karauos - Business Hours', 'karauos' ), // Name
			array( 'description' => esc_html__( 'Display company business hours', 'karauos' ), ) // Args
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
		$time_text = $instance['time_text'];
		$text_field1 = $instance['text_field1'];
		$tell_field1 = $instance['tell_field1'];
		$text_field2 = $instance['text_field2'];
		$tell_field2 = $instance['tell_field2'];
		$text_field3 = $instance['text_field3'];
		$tell_field3 = $instance['tell_field3'];
		$text_field4 = $instance['text_field4'];
		$tell_field4 = $instance['tell_field4'];
		$text_field5 = $instance['text_field5'];
		$tell_field5 = $instance['tell_field5'];
		$text_field6 = $instance['text_field6'];
		$tell_field6 = $instance['tell_field6'];


		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
        <div class="work-time">
            <?php if ( ! empty( $instance['time_text'] ) ) { ?>
                <span><?php echo $instance['time_text']; ?></span>
            <?php } ?>
            <?php if ( ! empty( $instance['text_field1'] ) ) { ?>
            <div class="time flex justify-content-between align-items-center">
                <span><?php echo $instance['text_field1']; ?></span>
                <hr>
                <span><?php echo $instance['tell_field1']; ?></span>
            </div>
            <?php } ?>
	        <?php if ( ! empty( $instance['text_field2'] ) ) { ?>
                <div class="time flex justify-content-between align-items-center">
                    <span><?php echo $instance['text_field2']; ?></span>
                    <hr>
                    <span><?php echo $instance['tell_field2']; ?></span>
                </div>
	        <?php } ?>
	        <?php if ( ! empty( $instance['text_field3'] ) ) { ?>
                <div class="time flex justify-content-between align-items-center">
                    <span><?php echo $instance['text_field3']; ?></span>
                    <hr>
                    <span><?php echo $instance['tell_field3']; ?></span>
                </div>
	        <?php } ?>
	        <?php if ( ! empty( $instance['text_field4'] ) ) { ?>
                <div class="time flex justify-content-between align-items-center">
                    <span><?php echo $instance['text_field4']; ?></span>
                    <hr>
                    <span><?php echo $instance['tell_field4']; ?></span>
                </div>
	        <?php } ?>
	        <?php if ( ! empty( $instance['text_field5'] ) ) { ?>
                <div class="time flex justify-content-between align-items-center">
                    <span><?php echo $instance['text_field5']; ?></span>
                    <hr>
                    <span><?php echo $instance['tell_field5']; ?></span>
                </div>
	        <?php } ?>
	        <?php if ( ! empty( $instance['text_field6'] ) ) { ?>
                <div class="time flex justify-content-between align-items-center">
                    <span><?php echo $instance['text_field6']; ?></span>
                    <hr>
                    <span><?php echo $instance['tell_field6']; ?></span>
                </div>
	        <?php } ?>
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
		$defaults = array('title' => __( 'Subject', 'karauos' ), 'time_text' => __( '24-hour support at 7 days a week', 'karauos' ),'text_field1' => '', 'tell_field1' => '', 'text_field2' => '', 'tell_field2' => '', 'text_field3' => '', 'tell_field3' => '', 'text_field4' => '', 'tell_field4' => '', 'text_field5' => '', 'tell_field5' => '', 'text_field6' => '', 'tell_field6' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Subject', 'karauos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $instance['title']; ?>">
        </p>
        <div>
            <p><label for="<?php echo esc_attr( $this->get_field_id( 'time_text' ) ); ?>"><?php esc_attr_e( 'Text over business hours', 'karauos' ); ?></label></p>
            <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'time_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'time_text' ) ); ?>" type="text" value="<?php echo $instance['time_text']; ?>"></p>
        </div>
        <div style="display: flex;justify-content: space-between">
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'text_field1' ) ); ?>"><?php esc_attr_e( 'Day Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_field1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_field1' ) ); ?>" type="text" value="<?php echo $instance['text_field1']; ?>"></p>
            </div>
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'tell_field1' ) ); ?>"><?php esc_attr_e( 'Clock Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tell_field1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tell_field1' ) ); ?>" type="text" value="<?php echo $instance['tell_field1']; ?>"></p>
            </div>
        </div>
        <div style="display: flex;justify-content: space-between">
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'text_field2' ) ); ?>"><?php esc_attr_e( 'Day Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_field2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_field2' ) ); ?>" type="text" value="<?php echo $instance['text_field2']; ?>"></p>
            </div>
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'tell_field2' ) ); ?>"><?php esc_attr_e( 'Clock Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tell_field2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tell_field2' ) ); ?>" type="text" value="<?php echo $instance['tell_field2']; ?>"></p>
            </div>
        </div>
        <div style="display: flex;justify-content: space-between">
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'text_field3' ) ); ?>"><?php esc_attr_e( 'Day Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_field3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_field3' ) ); ?>" type="text" value="<?php echo $instance['text_field3']; ?>"></p>
            </div>
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'tell_field3' ) ); ?>"><?php esc_attr_e( 'Clock Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tell_field3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tell_field3' ) ); ?>" type="text" value="<?php echo $instance['tell_field3']; ?>"></p>
            </div>
        </div>
        <div style="display: flex;justify-content: space-between">
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'text_field4' ) ); ?>"><?php esc_attr_e( 'Day Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_field4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_field4' ) ); ?>" type="text" value="<?php echo $instance['text_field4']; ?>"></p>
            </div>
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'tell_field4' ) ); ?>"><?php esc_attr_e( 'Clock Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tell_field4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tell_field4' ) ); ?>" type="text" value="<?php echo $instance['tell_field4']; ?>"></p>
            </div>
        </div>
        <div style="display: flex;justify-content: space-between">
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'text_field5' ) ); ?>"><?php esc_attr_e( 'Day Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_field5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_field5' ) ); ?>" type="text" value="<?php echo $instance['text_field5']; ?>"></p>
            </div>
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'tell_field5' ) ); ?>"><?php esc_attr_e( 'Clock Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tell_field5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tell_field5' ) ); ?>" type="text" value="<?php echo $instance['tell_field5']; ?>"></p>
            </div>
        </div>
        <div style="display: flex;justify-content: space-between">
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'text_field6' ) ); ?>"><?php esc_attr_e( 'Day Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_field6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_field6' ) ); ?>" type="text" value="<?php echo $instance['text_field6']; ?>"></p>
            </div>
            <div style="width:45%">
                <p><label for="<?php echo esc_attr( $this->get_field_id( 'tell_field6' ) ); ?>"><?php esc_attr_e( 'Clock Field', 'karauos' ); ?></label></p>
                <p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tell_field6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tell_field6' ) ); ?>" type="text" value="<?php echo $instance['tell_field6']; ?>"></p>
            </div>
        </div>


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
		$instance['time_text'] = $new_instance['time_text'];
		$instance['text_field1'] = $new_instance['text_field1'];
		$instance['tell_field1'] = $new_instance['tell_field1'];
		$instance['text_field2'] = $new_instance['text_field2'];
		$instance['tell_field2'] = $new_instance['tell_field2'];
		$instance['text_field3'] = $new_instance['text_field3'];
		$instance['tell_field3'] = $new_instance['tell_field3'];
		$instance['text_field4'] = $new_instance['text_field4'];
		$instance['tell_field4'] = $new_instance['tell_field4'];
		$instance['text_field5'] = $new_instance['text_field5'];
		$instance['tell_field5'] = $new_instance['tell_field5'];
		$instance['text_field6'] = $new_instance['text_field6'];
		$instance['tell_field6'] = $new_instance['tell_field6'];

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_time_widget() {
	register_widget( 'Time_Widget' );
}
add_action( 'widgets_init', 'register_time_widget' );