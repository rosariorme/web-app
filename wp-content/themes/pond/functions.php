<?php 


/*-----------------------------------------------------------------------------------

	Theme Setup

-----------------------------------------------------------------------------------*/
$sr_prefix = '_sr'; 


/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width
/*-----------------------------------------------------------------------------------*/
if( ! isset( $content_width ) ) $content_width = 1100;




/*-----------------------------------------------------------------------------------*/
/*	Setup theme defaults
/*-----------------------------------------------------------------------------------*/
function sr_theme_setup() {
	
	/* Load Text Domain */
	load_theme_textdomain('sr_pond_theme', get_template_directory(). '/languages');

	/* Theme Supports */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_editor_style();
	add_theme_support( 'custom-background' );
	
	/* Theme images sizes */
	add_image_size( 'thumb-medium', 420);
	add_image_size( 'thumb-medium-crop', 420, 310, true );
	add_image_size( 'thumb-big', 800);
	add_image_size( 'thumb-big-crop', 800, 600, true );
	add_image_size( 'slider-pic', 1100);
	add_image_size( 'slider-pic-crop', 1100, 800, true);
	add_image_size( 'fullwidth-pic', 1690);

	/* Post Formats */
	add_theme_support( 'post-formats', array('audio','gallery','video'/*,'link','quote'*/) );
	
	/* Add Menus */
	add_action('init', 'sr_register_menu');

}
add_action( 'after_setup_theme', 'sr_theme_setup' );




/*-----------------------------------------------------------------------------------*/
/*	Register Custom Menus 
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_register_menu' ) ) {
    function sr_register_menu() {
		register_nav_menus(
			array(
				'primary-menu' => __('Primary Menu', 'sr_pond_theme' )
			));	
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Register and Enqueue front-end scripts
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'sr_enqueue_scripts' ) ) {
    function sr_enqueue_scripts() {
		global $sr_prefix;


		// Register scripts
		wp_register_script('pace', get_template_directory_uri() . '/files/js/jquery.pace.js', 'jquery', '1.0', true);
		wp_register_script('isotope', get_template_directory_uri() . '/files/js/jquery.isotope.min.js', 'jquery', '1.5.25', true);
		wp_register_script('easing', get_template_directory_uri() . '/files/js/jquery.easing.1.3.js', 'jquery', '1.3', true);
		wp_register_script('easing-compatibility', get_template_directory_uri() . '/files/js/jquery.easing.compatibility.js', 'jquery', '1.0', true);
		wp_register_script('fancybox', get_template_directory_uri() . '/files/js/jquery.fancybox.pack.js', 'jquery', '3.0.0', true);
		wp_register_script('jplayer', get_template_directory_uri() . '/files/jplayer/jquery.jplayer.min.js', 'jquery', '2.1.0', true);
		wp_register_script('visible', get_template_directory_uri() . '/files/js/jquery.visible.min.js', 'jquery', '1.0', true);
		wp_register_script('bgvideo', get_template_directory_uri() . '/files/js/jquery.bgvideo.min.js', 'jquery', '1.0', true);
		wp_register_script('counter', get_template_directory_uri() . '/files/js/jquery.counter.min.js', 'jquery', '1.0', true);
		wp_register_script('fitvids', get_template_directory_uri() . '/files/js/jquery.fitvids.min.js', 'jquery', '1.0', true);
		wp_register_script('parallax', get_template_directory_uri() . '/files/js/jquery.parallax.min.js', 'jquery', '1.2', true);
		wp_register_script('scrollto', get_template_directory_uri() . '/files/js/jquery.scroll.min.js', 'jquery', '1.0', true);
		wp_register_script('owlcarousel', get_template_directory_uri() . '/files/js/jquery.owl.carousel.min.js', 'jquery', '1.3.3', true);
		wp_register_script('pond-form', get_template_directory_uri() . '/files/js/pond-form.js', 'jquery', '1.0', true);
		wp_register_script('pond-header', get_template_directory_uri() . '/files/js/pond-header.js', 'jquery', '1.0', true);
		wp_register_script('script', get_template_directory_uri() . '/files/js/script.js', 'jquery', '1.0', true);
		
		// Register style
		wp_register_style('default-style', get_stylesheet_uri() , 'default-style', '1.4');
		wp_register_style('isotope-style', get_template_directory_uri() . '/files/css/isotope.css', 'isotope-style', '1.0');
		wp_register_style('fancybox-style', get_template_directory_uri() . '/files/css/fancybox.css', 'fancybox-style', '1.0');
		wp_register_style('jplayer-style', get_template_directory_uri() . '/files/jplayer/jplayer.css', 'jplayer-style', '1.0');
		wp_register_style('mqueries-style', get_template_directory_uri() . '/files/css/mqueries.css', 'mqueries-style', '1.0');
		wp_register_style('owlcarousel-style', get_template_directory_uri() . '/files/css/owl.carousel.css', 'owlcarousel-style', '1.0');
		wp_register_style('owltransitions-style', get_template_directory_uri() . '/files/css/owl.transitions.css', 'owlcarousel-style', '1.0');
		wp_register_style('fontawesome-style', get_template_directory_uri() . '/files/css/font-awesome.min.css', 'fontawesome-style', '3.2.1');
		wp_register_style('pixeden-style', get_template_directory_uri() . '/files/css/pe-icon-7-stroke.css', 'scrollbar-style', '3.2.1');
		wp_register_style('custom-style', get_template_directory_uri() . '/includes/custom-style.php', 'custom-style', '1.0');


		// Enqueue scripts
    	wp_enqueue_script('jquery');
       	if (!get_option($sr_prefix.'_disablepreloader')) { wp_enqueue_script('pace'); }
       	wp_enqueue_script('easing');
    	wp_enqueue_script('easing-compatibility');
    	wp_enqueue_script('visible');
		wp_enqueue_script('isotope');
		wp_enqueue_script('jplayer'); 
    	wp_enqueue_script('bgvideo');
    	wp_enqueue_script('fitvids');
    	wp_enqueue_script('fancybox');
    	wp_enqueue_script('parallax');
    	wp_enqueue_script('counter');
		if (is_page_template('template-onepage.php')) { wp_enqueue_script('scrollto'); }
    	wp_enqueue_script('owlcarousel');
		wp_enqueue_script('pond-form');
    	wp_enqueue_script('pond-header');
		wp_enqueue_script( 'comment-reply' );
		
		//localize settings
		$settings_vars = array('ajaxurl' => admin_url('admin-ajax.php'));
		wp_localize_script( 'script', 'srvars', $settings_vars );
    	wp_enqueue_script('script');
		
		// Enqueue styles
		wp_enqueue_style('default-style');
		wp_enqueue_style('fancybox-style');
		wp_enqueue_style('owlcarousel-style');
		wp_enqueue_style('owltransitions-style');
		wp_enqueue_style('fontawesome-style');
		wp_enqueue_style('pixeden-style');
		wp_enqueue_style('jplayer-style');
		wp_enqueue_style('isotope-style');
		
				
		// include mqueries if true
		if (!get_option($sr_prefix.'_responsive')) { 
			wp_enqueue_style('mqueries-style');
		}
		
		if (get_option($sr_prefix.'_method') !== 'html') { 
			wp_enqueue_style('custom-style');
		} else {
			function sr_custom_css() {
				global $sr_prefix;
				echo '<style type="text/css">'.sr_custom_style_logo().' '.sr_custom_style_typography().' '.sr_custom_style_portfolio().' 
				'.sr_pseudo_header().' '.sr_custom_style_color().' '.stripslashes(get_option($sr_prefix.'_customcss')).'</style>';
			}
			add_action('wp_head', 'sr_custom_css');	
		}
		    	
    }
}
add_action('wp_enqueue_scripts', 'sr_enqueue_scripts');




/*-----------------------------------------------------------------------------------*/
/*	Restyle admin bar when logged in
/*-----------------------------------------------------------------------------------*/
function sr_style_admin_bar() {
   //echo '<style type="text/css">#wpadminbar { z-index: 9999999; }</style>';
}
add_action( 'wp_head', 'sr_style_admin_bar' );

function sr_remove_admin_css() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'sr_remove_admin_css');




/*-----------------------------------------------------------------------------------*/
/*	Include Theme Admin
/*-----------------------------------------------------------------------------------*/
// Adding Theme Admin
include("theme-admin/theme-admin.php");




/*-----------------------------------------------------------------------------------*/
/*	Plugin Activation
/*-----------------------------------------------------------------------------------*/
require_once('plugin-activation/plugin-activation.php');

add_action( 'tgmpa_register', 'sr_plugin_activation' );
function sr_plugin_activation() {
	
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     				=> 'Revolution Slider', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugin-activation/plugins/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
	);

	// Change this to your theme text domain, used for internationalising strings
	
	
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'sr_pond_theme',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'sr_pond_theme' ),
			'menu_title'                       			=> __( 'Install Plugins', 'sr_pond_theme' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'sr_pond_theme' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'sr_pond_theme' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'sr_pond_theme' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'sr_pond_theme' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'sr_pond_theme' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}



//needed scripts
function sr_theme_scripts() {
	    wp_enqueue_style('wp-color-picker');
	    wp_enqueue_script('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'sr_theme_scripts');



/*-----------------------------------------------------------------------------------*/

/* Your Custom Functions
/* Place your custom functions below

/*-----------------------------------------------------------------------------------*/


?>