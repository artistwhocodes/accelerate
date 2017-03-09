<?php
/**
 * Accelerate Marketing Child functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

function create_custom_post_types() {
 
    
 
        register_post_type( 'case_studies',
        array(
            'labels' => array(
                'name' => __( 'Case Studies' ),
                'singular_name' => __( 'Case Study' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'case-studies' ),
        )
    );
      register_post_type( 'our_services',
        array(
            'labels' => array(
                'name' => __( 'Our Services' ),
                'singular_name' => __( 'Our Services' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'our-services' ),
        )
    );
}
add_action( 'init', 'create_custom_post_types' );



add_filter( 'body_class','accelerate_body_classes' );
function accelerate_body_classes( $classes ) {
 
  if (is_page('contact-us') ) {
    $classes[] = 'contact';
  }
    return $classes;
     
}


 function accelerate_theme_child_widget_init() {
	
	register_sidebar( array(
	    'name' =>__( 'Homepage sidebar', 'accelerate-theme-child'),
	    'id' => 'sidebar-2',
	    'description' => __( 'Twitter widget', 'accelerate-theme-child' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' =>  '<h4 class="widget-title">',
	    'after_title' => '</h4>',   
        
	) );
	
}
add_action( 'widgets_init', 'accelerate_theme_child_widget_init' );
 
 // Hook into Simple Twitter Tweets widget on Front page and dynamically add handle after title-tag
function add_twitter_handle( $title ) {
		// Fetch handle that is stored in options table but not output by STT widget
    	$stt_options = get_option( 'widget_pi_simpletwittertweets' );
			$twitter_handle = $stt_options[2]['name'];
			if ( !is_front_page() ) {
				return $title;
			}
    	return $title .= '<h2>@'. $twitter_handle . '</h2>';
		}
add_filter('widget_title', 'add_twitter_handle'); 

function get_twitter_handle( $url ) {
		// Fetch handle that is stored in options table but not output by STT widget
    	$stt_options = get_option( 'widget_pi_simpletwittertweets' );
			$twitter_handle = $stt_options[2]['name'];
			if ( !is_front_page() ) {
				return $url;
			}
    	return $url .= 'https://twitter.com/'. $twitter_handle  ;
		}
 

 