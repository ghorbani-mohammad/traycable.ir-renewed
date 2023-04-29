<?php class AdvWidget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'adv_widget', // Base ID
			esc_html__( 'Karauos - Banner', 'karauos' ), // Name
			array( 'description' => esc_html__( 'Advertisement Banner', 'karauos' ), ) // Args
		);
	}

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Advertisement', 'karauos' ) : esc_html( $instance['title'] ) );
		$use_relpath = isset($instance['use_relpath']) ? $instance['use_relpath'] : false;
		$new_window = isset($instance['new_window']) ? $instance['new_window'] : false;
		$bannerPath[1] = empty($instance['bannerOnePath']) ? '' : esc_attr($instance['bannerOnePath']);
		$bannerUrl[1] = empty($instance['bannerOneUrl']) ? '' : esc_url($instance['bannerOneUrl']);
		$bannerTitle[1] = empty($instance['bannerOneTitle']) ? '' : esc_attr($instance['bannerOneTitle']);

		$bannerPath[2] = empty($instance['bannerTwoPath']) ? '' : esc_attr($instance['bannerTwoPath']);
		$bannerUrl[2] = empty($instance['bannerTwoUrl']) ? '' : esc_url($instance['bannerTwoUrl']);
		$bannerTitle[2] = empty($instance['bannerTwoTitle']) ? '' : esc_attr($instance['bannerTwoTitle']);

		$bannerPath[3] = empty($instance['bannerThreePath']) ? '' : esc_attr($instance['bannerThreePath']);
		$bannerUrl[3] = empty($instance['bannerThreeUrl']) ? '' : esc_url($instance['bannerThreeUrl']);
		$bannerTitle[3] = empty($instance['bannerThreeTitle']) ? '' : esc_attr($instance['bannerThreeTitle']);

		$bannerPath[4] = empty($instance['bannerFourPath']) ? '' : esc_attr($instance['bannerFourPath']);
		$bannerUrl[4] = empty($instance['bannerFourUrl']) ? '' : esc_url($instance['bannerFourUrl']);
		$bannerTitle[4] = empty($instance['bannerFourTitle']) ? '' : esc_attr($instance['bannerFourTitle']);

		$bannerPath[5] = empty($instance['bannerFivePath']) ? '' : esc_attr($instance['bannerFivePath']);
		$bannerUrl[5] = empty($instance['bannerFiveUrl']) ? '' : esc_url($instance['bannerFiveUrl']);
		$bannerTitle[5] = empty($instance['bannerFiveTitle']) ? '' : esc_attr($instance['bannerFiveTitle']);

		$bannerPath[6] = empty($instance['bannerSixPath']) ? '' : esc_attr($instance['bannerSixPath']);
		$bannerUrl[6] = empty($instance['bannerSixUrl']) ? '' : esc_url($instance['bannerSixUrl']);
		$bannerTitle[6] = empty($instance['bannerSixTitle']) ? '' : esc_attr($instance['bannerSixTitle']);

		$bannerPath[7] = empty($instance['bannerSevenPath']) ? '' : esc_attr($instance['bannerSevenPath']);
		$bannerUrl[7] = empty($instance['bannerSevenUrl']) ? '' : esc_url($instance['bannerSevenUrl']);
		$bannerTitle[7] = empty($instance['bannerSevenTitle']) ? '' : esc_attr($instance['bannerSevenTitle']);

		$bannerPath[8] = empty($instance['bannerEightPath']) ? '' : esc_attr($instance['bannerEightPath']);
		$bannerUrl[8] = empty($instance['bannerEightUrl']) ? '' : esc_url($instance['bannerEightUrl']);
		$bannerTitle[8] = empty($instance['bannerEightTitle']) ? '' : esc_attr($instance['bannerEightTitle']);

		echo $before_widget;

		if ( $title )
		echo $before_title . $title . $after_title;
?>
<div class="adwrap">
<?php $i = 1;
while ($i <= 8):
if ($bannerPath[$i] <> '') { ?>
<?php if ($bannerTitle[$i] == '') $bannerTitle[$i] = __( 'Advertisement', 'karauos' ); ?>
	<a href="<?php echo $bannerUrl[$i] ?>" <?php if ($new_window == 1) echo('target="_blank"') ?>><img src="<?php if ($use_relpath == 1) echo home_url(); else echo $bannerPath[$i]; ?><?php if ($use_relpath == 1 ) echo ("/" . $bannerPath[$i]); ?>" alt="<?php echo $bannerTitle[$i]; ?>" title="<?php echo $bannerTitle[$i]; ?>" /></a>
<?php }; $i++;
endwhile; ?>
</div> <!-- end adwrap -->
<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['use_relpath'] = 0;
		$instance['new_window'] = 0;
		if ( isset($new_instance['use_relpath']) ) $instance['use_relpath'] = 1;
		if ( isset($new_instance['new_window']) ) $instance['new_window'] = 1;
		$instance['bannerOnePath'] = esc_attr($new_instance['bannerOnePath']);
		$instance['bannerOneUrl'] = esc_url($new_instance['bannerOneUrl']);
		$instance['bannerOneTitle'] = esc_attr($new_instance['bannerOneTitle']);

		$instance['bannerTwoPath'] = esc_attr($new_instance['bannerTwoPath']);
		$instance['bannerTwoUrl'] = esc_url($new_instance['bannerTwoUrl']);
		$instance['bannerTwoTitle'] = esc_attr($new_instance['bannerTwoTitle']);

		$instance['bannerThreePath'] = esc_attr($new_instance['bannerThreePath']);
		$instance['bannerThreeUrl'] = esc_url($new_instance['bannerThreeUrl']);
		$instance['bannerThreeTitle'] = esc_attr($new_instance['bannerThreeTitle']);

		$instance['bannerFourPath'] = esc_attr($new_instance['bannerFourPath']);
		$instance['bannerFourUrl'] = esc_url($new_instance['bannerFourUrl']);
		$instance['bannerFourTitle'] = esc_attr($new_instance['bannerFourTitle']);

		$instance['bannerFivePath'] = esc_attr($new_instance['bannerFivePath']);
		$instance['bannerFiveUrl'] = esc_url($new_instance['bannerFiveUrl']);
		$instance['bannerFiveTitle'] = esc_attr($new_instance['bannerFiveTitle']);

		$instance['bannerSixPath'] = esc_attr($new_instance['bannerSixPath']);
		$instance['bannerSixUrl'] = esc_url($new_instance['bannerSixUrl']);
		$instance['bannerSixTitle'] = esc_attr($new_instance['bannerSixTitle']);

		$instance['bannerSevenPath'] = esc_attr($new_instance['bannerSevenPath']);
		$instance['bannerSevenUrl'] = esc_url($new_instance['bannerSevenUrl']);
		$instance['bannerSevenTitle'] = esc_attr($new_instance['bannerSevenTitle']);

		$instance['bannerEightPath'] = esc_attr($new_instance['bannerEightPath']);
		$instance['bannerEightUrl'] = esc_url($new_instance['bannerEightUrl']);
		$instance['bannerEightTitle'] = esc_attr($new_instance['bannerEightTitle']);

		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>__( 'Advertisement', 'karauos' ), 'use_relpath' => false, 'new_window' => true, 'bannerOnePath'=>'', 'bannerOneUrl'=>'', 'bannerOneTitle'=>'','bannerTwoPath'=>'', 'bannerTwoUrl'=>'', 'bannerTwoTitle'=>'','bannerThreePath'=>'', 'bannerThreeUrl'=>'','bannerThreeTitle'=>'','bannerFourPath'=>'', 'bannerFourUrl'=>'','bannerFourTitle'=>'','bannerFivePath'=>'', 'bannerFiveUrl'=>'','bannerFiveTitle'=>'','bannerSixPath'=>'', 'bannerSixUrl'=>'','bannerSixTitle'=>'', 'bannerSevenPath'=>'', 'bannerSevenUrl'=>'','bannerSevenTitle'=>'','bannerEightPath'=>'', 'bannerEightUrl'=>'','bannerEightTitle'=>'') );

		$title = esc_html($instance['title']);
		$bannerPath[1] = esc_attr($instance['bannerOnePath']);
		$bannerUrl[1] = esc_url($instance['bannerOneUrl']);
		$bannerTitle[1] = esc_attr($instance['bannerOneTitle']);

		$bannerPath[2] = esc_attr($instance['bannerTwoPath']);
		$bannerUrl[2] = esc_url($instance['bannerTwoUrl']);
		$bannerTitle[2] = esc_attr($instance['bannerTwoTitle']);

		$bannerPath[3] = esc_attr($instance['bannerThreePath']);
		$bannerUrl[3] = esc_url($instance['bannerThreeUrl']);
		$bannerTitle[3] = esc_attr($instance['bannerThreeTitle']);

		$bannerPath[4] = esc_attr($instance['bannerFourPath']);
		$bannerUrl[4] = esc_url($instance['bannerFourUrl']);
		$bannerTitle[4] = esc_attr($instance['bannerFourTitle']);

		$bannerPath[5] = esc_attr($instance['bannerFivePath']);
		$bannerUrl[5] = esc_url($instance['bannerFiveUrl']);
		$bannerTitle[5] = esc_attr($instance['bannerFiveTitle']);

		$bannerPath[6] = esc_attr($instance['bannerSixPath']);
		$bannerUrl[6] = esc_url($instance['bannerSixUrl']);
		$bannerTitle[6] = esc_attr($instance['bannerSixTitle']);

		$bannerPath[7] = esc_attr($instance['bannerSevenPath']);
		$bannerUrl[7] = esc_url($instance['bannerSevenUrl']);
		$bannerTitle[7] = esc_attr($instance['bannerSevenTitle']);

		$bannerPath[8] = esc_attr($instance['bannerEightPath']);
		$bannerUrl[8] = esc_url($instance['bannerEightUrl']);
		$bannerTitle[8] = esc_attr($instance['bannerEightTitle']);

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . __( 'Subject:', 'karauos' ) . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>'; ?>

		<input class="checkbox" type="checkbox" <?php checked($instance['use_relpath'], true) ?> id="<?php echo $this->get_field_id('use_relpath'); ?>" name="<?php echo $this->get_field_name('use_relpath'); ?>" />
		<label for="<?php echo $this->get_field_id('use_relpath'); ?>"><?php echo __( 'Use the relative picture', 'karauos' ) ?></label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['new_window'], true) ?> id="<?php echo $this->get_field_id('new_window'); ?>" name="<?php echo $this->get_field_name('new_window'); ?>" />
		<label for="<?php echo $this->get_field_id('new_window'); ?>"><?php echo __( 'Open the image in a new window', 'karauos' ) ?></label><br /><br />

		<?php	# Banner #1 Image
		echo '<p><label for="' . $this->get_field_id('bannerOnePath') . '">' . __( 'Image address', 'karauos' ) . ' #1' . '</label><input class="widefat" id="' . $this->get_field_id('bannerOnePath') . '" name="' . $this->get_field_name('bannerOnePath') . '" type="text" value="' . $bannerPath[1] . '" /></p>';
		# Banner #1 Url
		echo '<p><label for="' . $this->get_field_id('bannerOneUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #1' . '</label><input class="widefat" id="' . $this->get_field_id('bannerOneUrl') . '" name="' . $this->get_field_name('bannerOneUrl') . '" type="text" value="' . $bannerUrl[1] . '" /></p>';
		# Banner #1 Title
		echo '<p><label for="' . $this->get_field_id('bannerOneTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #1' . '</label><input class="widefat" id="' . $this->get_field_id('bannerOneTitle') . '" name="' . $this->get_field_name('bannerOneTitle') . '" type="text" value="' . $bannerTitle[1] . '" /></p>';
		# Banner #2 Image
		echo '<p><label for="' . $this->get_field_id('bannerTwoPath') . '">' . __( 'Image address', 'karauos' ) . ' #2' . '</label><input class="widefat" id="' . $this->get_field_id('bannerTwoPath') . '" name="' . $this->get_field_name('bannerTwoPath') . '" type="text" value="' . $bannerPath[2] . '" /></p>';
		# Banner #2 Url
		echo '<p><label for="' . $this->get_field_id('bannerTwoUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #2' . '</label><input class="widefat" id="' . $this->get_field_id('bannerTwoUrl') . '" name="' . $this->get_field_name('bannerTwoUrl') . '" type="text" value="' . $bannerUrl[2] . '" /></p>';
		# Banner #2 Title
		echo '<p><label for="' . $this->get_field_id('bannerTwoTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #2' . '</label><input class="widefat" id="' . $this->get_field_id('bannerTwoTitle') . '" name="' . $this->get_field_name('bannerTwoTitle') . '" type="text" value="' . $bannerTitle[2] . '" /></p>';
		# Banner #3 Image
		echo '<p><label for="' . $this->get_field_id('bannerThreePath') . '">' . __( 'Image address', 'karauos' ) . ' #3' . '</label><input class="widefat" id="' . $this->get_field_id('bannerThreePath') . '" name="' . $this->get_field_name('bannerThreePath') . '" type="text" value="' . $bannerPath[3] . '" /></p>';
		# Banner #3 Url
		echo '<p><label for="' . $this->get_field_id('bannerThreeUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #3' . '</label><input class="widefat" id="' . $this->get_field_id('bannerThreeUrl') . '" name="' . $this->get_field_name('bannerThreeUrl') . '" type="text" value="' . $bannerUrl[3] . '" /></p>';
		# Banner #3 Title
		echo '<p><label for="' . $this->get_field_id('bannerThreeTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #3' . '</label><input class="widefat" id="' . $this->get_field_id('bannerThreeTitle') . '" name="' . $this->get_field_name('bannerThreeTitle') . '" type="text" value="' . $bannerTitle[3] . '" /></p>';
		# Banner #4 Image
		echo '<p><label for="' . $this->get_field_id('bannerFourPath') . '">' . __( 'Image address', 'karauos' ) . ' #4' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFourPath') . '" name="' . $this->get_field_name('bannerFourPath') . '" type="text" value="' . $bannerPath[4] . '" /></p>';
		# Banner #4 Url
		echo '<p><label for="' . $this->get_field_id('bannerFourUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #4' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFourUrl') . '" name="' . $this->get_field_name('bannerFourUrl') . '" type="text" value="' . $bannerUrl[4] . '" /></p>';
		# Banner #4 Title
		echo '<p><label for="' . $this->get_field_id('bannerFourTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #4' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFourTitle') . '" name="' . $this->get_field_name('bannerFourTitle') . '" type="text" value="' . $bannerTitle[4] . '" /></p>';
		# Banner #5 Image
		echo '<p><label for="' . $this->get_field_id('bannerFivePath') . '">' . __( 'Image address', 'karauos' ) . ' #5' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFivePath') . '" name="' . $this->get_field_name('bannerFivePath') . '" type="text" value="' . $bannerPath[5] . '" /></p>';
		# Banner #5 Url
		echo '<p><label for="' . $this->get_field_id('bannerFiveUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #5' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFiveUrl') . '" name="' . $this->get_field_name('bannerFiveUrl') . '" type="text" value="' . $bannerUrl[5] . '" /></p>';
		# Banner #5 Title
		echo '<p><label for="' . $this->get_field_id('bannerFiveTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #5' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFiveTitle') . '" name="' . $this->get_field_name('bannerFiveTitle') . '" type="text" value="' . $bannerTitle[5] . '" /></p>';
		# Banner #6 Image
		echo '<p><label for="' . $this->get_field_id('bannerSixPath') . '">' . __( 'Image address', 'karauos' ) . ' #6' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSixPath') . '" name="' . $this->get_field_name('bannerSixPath') . '" type="text" value="' . $bannerPath[6] . '" /></p>';
		# Banner #6 Url
		echo '<p><label for="' . $this->get_field_id('bannerSixUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #6' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSixUrl') . '" name="' . $this->get_field_name('bannerSixUrl') . '" type="text" value="' . $bannerUrl[6] . '" /></p>';
		# Banner #6 Title
		echo '<p><label for="' . $this->get_field_id('bannerSixTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #6' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSixTitle') . '" name="' . $this->get_field_name('bannerSixTitle') . '" type="text" value="' . $bannerTitle[6] . '" /></p>';
		# Banner #7 Image
		echo '<p><label for="' . $this->get_field_id('bannerSevenPath') . '">' . __( 'Image address', 'karauos' ) . ' #7' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSevenPath') . '" name="' . $this->get_field_name('bannerSevenPath') . '" type="text" value="' . $bannerPath[7] . '" /></p>';
		# Banner #7 Url
		echo '<p><label for="' . $this->get_field_id('bannerSevenUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #7' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSevenUrl') . '" name="' . $this->get_field_name('bannerSevenUrl') . '" type="text" value="' . $bannerUrl[7] . '" /></p>';
		# Banner #7 Title
		echo '<p><label for="' . $this->get_field_id('bannerSevenTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #7' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSevenTitle') . '" name="' . $this->get_field_name('bannerSevenTitle') . '" type="text" value="' . $bannerTitle[7] . '" /></p>';
		# Banner #8 Image
		echo '<p><label for="' . $this->get_field_id('bannerEightPath') . '">' . __( 'Image address', 'karauos' ) . ' #8' . '</label><input class="widefat" id="' . $this->get_field_id('bannerEightPath') . '" name="' . $this->get_field_name('bannerEightPath') . '" type="text" value="' . $bannerPath[8] . '" /></p>';
		# Banner #8 Url
		echo '<p><label for="' . $this->get_field_id('bannerEightUrl') . '">' . __( 'Image Link', 'karauos' ) . ' #8' . '</label><input class="widefat" id="' . $this->get_field_id('bannerEightUrl') . '" name="' . $this->get_field_name('bannerEightUrl') . '" type="text" value="' . $bannerUrl[8] . '" /></p>';
		# Banner #8 Title
		echo '<p><label for="' . $this->get_field_id('bannerEightTitle') . '">' . __( 'Image Title', 'karauos' ) . ' #8' . '</label><input class="widefat" id="' . $this->get_field_id('bannerEightTitle') . '" name="' . $this->get_field_name('bannerEightTitle') . '" type="text" value="' . $bannerTitle[8] . '" /></p>';
		echo '<p><small>'. __( 'If you do not want to display some banners - leave appropriate fields blank', 'karauos' ) .'</small></p>';
	}

}// end AdvWidget class

function AdvWidgetInit() {
	register_widget('AdvWidget');
}

add_action('widgets_init', 'AdvWidgetInit');

?>