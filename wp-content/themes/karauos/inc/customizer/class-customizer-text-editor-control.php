<?php
// text editor
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * Class to create a custom tags control
 */
class Text_Editor_Custom_Control extends WP_Customize_Control {
    /**
     * Render the content on the theme customizer page
     */
    public function render_content()
    {
        ?>
        <label>
            <span class="customize-text_editor"><?php echo esc_html( $this->label ); ?></span>
            <input class="wp-editor-area" type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
            <?php
            $settings = array(
                'textarea_name' => $this->id,
                'media_buttons' => true,
                'drag_drop_upload' => true,
                'teeny' => true,
                'textarea_rows' => 8,
                'tabindex' => 4,
            );
            $this->filter_editor_setting_link();
            wp_editor($this->value(), $this->id, $settings );
            ?>
        </label>
        <?php
        do_action('admin_footer');
        do_action('admin_print_footer_scripts');
    }
    private function filter_editor_setting_link() {
        add_filter( 'the_editor', function( $output ) { return preg_replace( '/<textarea/', '<textarea ' . $this->get_link(), $output, 1 ); } );
    }
}

function editor_customizer_script() {
    wp_enqueue_script( 'wp-editor-customizer', wp_directory_uri . '/inc/customizer/js/customizer-text-editor-control.js', array( 'jquery' ), rand(), true );
}
add_action( 'customize_controls_enqueue_scripts', 'editor_customizer_script' );