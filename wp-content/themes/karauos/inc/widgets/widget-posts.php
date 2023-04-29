<?php

/**
 * Adds Foo_Widget widget.
 */
class Posts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'posts_widget', // Base ID
			esc_html__( 'Karauos - Post', 'karauos' ), // Name
			array( 'description' => esc_html__( 'post and project show', 'karauos' ), ) // Args
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
		$post_type = $instance['post_type'];
		$categories = $instance['categories'];
		$style = $instance['style'];
		$posts = $instance['posts'];

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		

		if('all' == $categories) {
			switch ($post_type) {
				case "category":
					$type = 'post';
					break;
				case "portfolio_cat":
					$type = 'portfolio';
					break;
			}
			$widgets_post = new WP_Query(
				array(
					'posts_per_page' => $posts,
                    'post_type'      => $type
				) );
        } else {
			$widgets_post = new WP_Query(
				array(
					'posts_per_page' => $posts,
					'tax_query' => array(
						array(
							'taxonomy' => $post_type,
							'field' => 'term_id',
							'terms' => $categories,
						),
					),
				) );
        }
            $style_blog = $instance['style'];
			switch ($style_blog) {
				case "style_one":
				    echo '<div class="projects grid">';
                    if ( $widgets_post->have_posts() ):while ( $widgets_post->have_posts() ):$widgets_post->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php karauos_post_thumbnail('thumbnail'); ?></a>
					<?php endwhile;endif;
                    echo '</div>'; ?>
                <?php break; case "style_two":
                if ( $widgets_post->have_posts() ):while ( $widgets_post->have_posts() ):$widgets_post->the_post(); ?>
                    <div class="news-item flex" onclick="location.href='<?php the_permalink(); ?>'">
                        <?php karauos_post_thumbnail('thumbnail'); ?>
                        <div class="text-news grid align-content-between">
                            <h3><?php echo get_the_title(); ?></h3>
                            <span><i class="far fa-calendar-alt"></i> <?php the_time('j F Y'); ?></span>
                        </div>
                    </div>
				<?php endwhile;endif; ?>
				<?php break; } ?>

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
		$defaults = array('title' => __( 'Subject', 'karauos' ), 'posts' => 5,'categories' => 'all', 'post_type' => 'category' , 'style' => 'style_one');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Subject:', 'karauos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $instance['title']; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php echo __( 'Post Type', 'karauos' ) ?></label>
            <select id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" class="widefat post-type">
                <option value="category" <?php if( $instance['post_type'] == 'category' ) echo "selected=\"selected\""; else echo ""; ?>>نوشته ها</option>
                <option value="portfolio_cat" <?php if( $instance['post_type'] == 'portfolio_cat' ) echo "selected=\"selected\""; else echo ""; ?>>پروژه ها</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('categories'); ?>"><?php echo __( 'Categories', 'karauos' ) ?></label>
            <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories">
                <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php echo __( 'All Categories', 'karauos' ) ?></option>
				<?php
				$post_type = $instance['post_type'];
				$categories = get_terms( array(
					'taxonomy'    => $post_type,
					'depth'    => 1,
					'hide_empty' => 0
				) );
                ?>
				<?php foreach($categories as $category) { ?>
                    <option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->name; ?></option>
				<?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php echo __( 'Style', 'karauos' ) ?></label>
            <select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat">
                <option value="style_one" <?php if( $instance['style'] == 'style_one' ) echo "selected=\"selected\""; else echo ""; ?>><?php echo __( 'Style One', 'karauos' ) ?></option>
                <option value="style_two" <?php if( $instance['style'] == 'style_two' ) echo "selected=\"selected\""; else echo ""; ?>><?php echo __( 'Style Two', 'karauos' ) ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>"><?php esc_attr_e( 'Number of Posts', 'karauos' ); ?></label>
            <input class="widefat" style="width:10%;" id="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts' ) ); ?>" type="text" value="<?php echo $instance['posts']; ?>">
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
		$instance['post_type'] = $new_instance['post_type'];
		$instance['posts'] = $new_instance['posts'];
		$instance['style'] = $new_instance['style'];
		$instance['categories'] = $new_instance['categories'];

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_posts_widget() {
	register_widget( 'Posts_Widget' );
}
add_action( 'widgets_init', 'register_posts_widget' );