<?php

//get global prefix
global $sr_prefix;

//get template header
get_header();

$pTop = '';
// title options
$showPagetitle = "default"; $showPagetitle = get_post_meta(get_the_ID(), $sr_prefix.'_showpagetitle', true); 
if ($showPagetitle == "default" || $showPagetitle == "false") { $pTop = "notoppadding"; }


if (have_posts()) : while (have_posts()) : the_post();
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }
?>
		
        <section id="blog-single" <?php post_class($pTop); ?>>
			<div class="section-inner clearfix">			
           	
            	<?php if ($format == 'video' || $format == 'gallery' || $format == 'standard' || ($format == 'audio' && get_post_meta($post->ID, $sr_prefix.'_audio_position', true) !== 'pagetitle') ) { echo '<div class="wrapper-small">'; get_template_part( 'includes/post-type', $format ); echo '</div>'; } ?>
            
            	<div class="blog-content">
                	<div class="wrapper-small">	
            		<?php the_content(); ?>
                    </div>
            	</div> <!-- END .blog-content -->
                
                <div class="wrapper-small">	
                <?php if ( !get_option($sr_prefix.'_blogpostsdisabletags') ) { ?>
                <div class="blog-tags clearfix"><i class="pe-7s-ticket"></i><?php the_tags( '', '', ''); ?></div>
                <?php } ?>
				
                <?php if (!get_option($sr_prefix.'_blogcomments') && comments_open() && !post_password_required() ) { ?>
                <?php comments_template( '', true ); ?>
                <?php } ?>
                
                <?php if (get_option($sr_prefix.'_blogpagination') !== 'nonfixed') { ?><div class="spacer spacer-big"></div><?php } ?>
                
                <?php 
				if (get_option($sr_prefix.'_blogpagination') !== 'false') {
					sr_singlepagination('blog','','single-pagination '.get_option($sr_prefix.'_blogpagination'),'Previous Post','Next Post');  
				}
				wp_link_pages();
				?>
              	</div>  
                
			</div>
		</section>
        
<?php endwhile; endif; ?>
<?php get_footer(); ?>