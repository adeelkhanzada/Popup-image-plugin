<?php
/**
 * @package Popup Image
 * @version 11.9
 */
/*
Plugin Name: Popup Image
Plugin URI: http://wordpress.org/plugins/Popup-Image/
Description: Simple popup image plugin some example here like shortcode [popup rel="image/popup_picture.jpg" img="image/picture.jpg"][/popup]
Version: 11.9
Author URI: http://webgenius.zxq.net/
*/ 
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );
/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_style( 'Popup', plugins_url( 'Popup/css/style.css' ) );
	wp_enqueue_style( 'Popup' );
}
function AllScript()
{
    // Deregister the included library
    wp_deregister_script( 'jquery' );
     
    // Register the library 
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), null, false );
     
    // Register the script like this for a plugin:
    wp_register_script( 'custom-script', plugins_url( '/js/Popup.js', __FILE__ ), array( 'jquery' ) );

    // Register the script like this for a theme:
    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/Popup.js', array( 'jquery' ) );
 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'AllScript' );

//  popup_shortcode - START ------------------------------
 
function popup_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'rel' => '',
      'img' => '',
      ), $atts ) );
  
   return '<a data-image="' . esc_attr($rel) . '"><img src="' . esc_attr($img) . '" alt="" /></a>';
}
 
add_shortcode( 'popup', 'popup_shortcode' );
add_filter('widget_text', 'do_shortcode');
 
// popup_shortcode - END ------------------------------

add_action( 'widgets_init', 'widgetcodename_widgets' );

function widgetcodename_widgets() {
    register_widget( 'widgetcodename' );
}
class widgetcodename extends WP_Widget {
 
    function widgetcodename() {
        /* Widget settings. */
        $widget_options = array( 'classname' => 'widgetcodename', 'description' => __('Popup image', 'widgetfrontname') ); 
 
        /* Widget control settings. */
        $control_options = array( 'width' => 400, 'height' => 350, 'id_base' => 'widgetcodename_widget' ); 
 
        /* Create the widget. */
        $this->WP_Widget( 'widgetcodename_widget', __('Popup Image'), $widget_options, $control_options );
    }
 
    function widget( $args, $instance ) {
        extract( $args );
 
        $rel = $instance['rel'];
        $image = $instance['image'];

        echo $before_widget;
   
        if ( $image )
            echo '<a data-image="'.$rel.'"><img src="'.$image.'" alt="" /></a>'; 
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance; 
        $instance['rel'] = $new_instance['rel']; 
        $instance['image'] = strip_tags( $new_instance['image'] );
        return $instance;
    }
    //
    function form( $instance ) {
  $defaults = array(
            'rel'     => __(''), 
            'image'     => __(''), 
            
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
       
        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'rel' ); ?>"><?php _e('Popup Image:'); ?></label><!-- variable name -->
            <input class="widefat" id="<?php echo $this->get_field_id( 'rel' ); ?>" name="<?php echo $this->get_field_name( 'rel' ); ?>" value="<?php echo $instance['rel']; ?>" style="width:98%; background:#fff;" /><!-- variable name -->
        </p>
 
        <!-- Widget Image: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image:'); ?></label><!-- variable name -->
            <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" style="width:98%; background:#fff;" /><!-- variable name -->
        </p>
    <?php
    }
}
 


