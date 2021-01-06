<?php 
$sr_prefix = "_sr";
header("Content-type: text/css");
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp . '/wp-load.php' );
?>

/* HEIGHT MENU */
<?php echo sr_custom_style_logo(); ?>

/* CUSTOM FONTS */
<?php echo sr_custom_style_typography(); ?> 

/* PORTFOLIO STYLING */
<?php echo sr_custom_style_portfolio(); ?>

/* PSEUDO HEADER */
<?php echo sr_pseudo_header(); ?>

/* COLOR */
<?php echo sr_custom_style_color(); ?>

/* CUSTOM CSS (Theme Options) */
<?php 
/***********************
GET CUSTOM CSS
***********************/
if (get_option($sr_prefix.'_customcss')){
    echo stripslashes(get_option($sr_prefix.'_customcss')); 
}  
?>