<?php
/*
Template Name: One Page / Front Page
*/

//get global prefix
global $sr_prefix;

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();

?>
		<?php 
		// GET CONTENT FOR ONE-PAGE
		get_template_part( 'includes/page-section' ); ?>
		
		
		<?php 
		if(has_nav_menu('primary-menu')) {
		// GET & LOOP ALL OTHER SECTIONS SELECTED IN THE MENU
		$sections = sr_get_onepage_sections(); 
		$sectionargs = array('post_type' => 'page','post__in' => $sections,'orderby'=> 'post__in','posts_per_page' => count($sections));
		$sectionquery = new WP_Query($sectionargs);
		
		if( $sectionquery->have_posts()) { while ($sectionquery->have_posts()) : $sectionquery->the_post();?>
		
		<?php get_template_part( 'includes/page-section' ); ?>
		
		<?php endwhile; } wp_reset_query(); 
		}?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>