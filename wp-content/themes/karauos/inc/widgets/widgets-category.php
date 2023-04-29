<?php

/**
 * Adds Search widget.
 */
class TMT_Category_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'category_widget', // Base ID
			esc_html__( 'Karauos - Category', 'karauos' ), // Name
			array( 'description' => esc_html__( 'Category widget show', 'karauos' ), ) // Args
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
		$taxonomy = $instance['taxonomy'];

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$categories = get_terms( array(
			'taxonomy'    => $taxonomy,
			'depth'    => 1,
			'hide_empty' => 0
		) );
		?>
        <ul class="tmt-category-list">
		<?php foreach($categories as $category) {
		    $link = get_bloginfo('url') . '/' . $category->taxonomy . '/' . $category->slug;
		    ?>
            <li id="cat-<?php echo $category->term_id; ?>"><a href="<?php echo $link; ?>"><?php echo $category->name; ?></a><span><?php echo $category->count; ?></span></li>
		<?php } ?>
        </ul>

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
		$defaults = array('title' => __( 'Category', 'karauos' ), 'taxonomy' => 'category' );
		$instance = wp_parse_args((array) $instance, $defaults);
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Subject:', 'karauos' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $instance['title']; ?>">
		</p>

        <p>
            <label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php echo __( 'Post Type', 'karauos' ) ?></label>
            <select id="<?php echo $this->get_field_id( 'taxonomy' ); ?>" name="<?php echo $this->get_field_name( 'taxonomy' ); ?>" class="widefat post-type">
                <option value="category" <?php if( $instance['taxonomy'] == 'category' ) echo "selected=\"selected\""; else echo ""; ?>><?php echo esc_html__( 'Post Categorys', 'karauos' ); ?></option>
                <option value="portfolio_cat" <?php if( $instance['taxonomy'] == 'portfolio_cat' ) echo "selected=\"selected\""; else echo ""; ?>><?php echo esc_html__( 'Project Categorys', 'karauos' ); ?></option>
            </select>
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
		$instance['taxonomy']   = $new_instance['taxonomy'];
		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_tmt_category_widget() {
	register_widget( 'TMT_Category_Widget' );
}

add_action( 'widgets_init', 'register_tmt_category_widget' );