<?php

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

?>

		<!-- SECTION PORTFOLIO -->
		<section id="portfolio-single" class="<?php echo esc_attr($pTop); ?>">
			<div class="section-inner">				
           		
          	<?php if  (get_the_content() != '') { ?>
           		<div class="wrapper">
				<?php the_content(); ?>
				</div>
                
                <?php if (get_post_meta(get_the_ID(), $sr_prefix.'_paddingbottom', true) == 'true' && get_option($sr_prefix.'_portfoliopagination') !== 'nonfixed') { ?>
				<div class="spacer spacer-big"></div>
				<?php } ?>
       		<?php } ?>
                                
                <?php 
				if (get_option($sr_prefix.'_portfoliopagination') !== 'false') {
					echo '<div class="wrapper">';
					sr_singlepagination('portfolio','','single-pagination '.get_option($sr_prefix.'_portfoliopagination'),'Previous Project','Next Project');
					echo '</div>';  
				}
				?>
                
			</div>
		</section>
		<!-- SECTION PORTFOLIO -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>