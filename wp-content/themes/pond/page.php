<?php
/*
* Main Page (Default Template)
*/

//get global prefix
global $sr_prefix;

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();

$pTop = '';
if (get_post_meta(get_the_ID(), $sr_prefix.'_paddingtop', true) == 'false') { $pTop = "notoppadding"; }

// title options
$showPagetitle = "default"; $showPagetitle = get_post_meta(get_the_ID(), $sr_prefix.'_showpagetitle', true); 
if ($showPagetitle == "default" || $showPagetitle == "false") { $pTop = "notoppadding"; }

if  (get_the_content() != '') {
?>
		
		<!-- SECTION -->
		<section id="section-<?php echo esc_attr($post->post_name); ?>" class="<?php echo esc_attr($pTop); ?>">
          	<div class="section-inner"> 
							
				<div class="wrapper">
				<?php the_content(); ?>
				</div>
				
				<?php if (get_post_meta(get_the_ID(), $sr_prefix.'_paddingbottom', true) == 'true') { ?>
				<div class="spacer spacer-big"></div>
				<?php } ?>
			</div>
		</section>
		<!-- SECTION -->

<?php } ?>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>