<?php

/*
* Main Blog page
*/

//get global prefix
global $sr_prefix;
global $wp_query;

//get template header
get_header();

if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  }

$blog = get_post(get_option( 'page_for_posts' )); $slug = $blog->post_name;

$style = "masonry"; if (get_option($sr_prefix.'_blogentriesstyle')) { $style = get_option($sr_prefix.'_blogentriesstyle'); }
$size = 370; if (get_option($sr_prefix.'_blogentriessize')) { $size = get_option($sr_prefix.'_blogentriessize'); }


?>

		<!-- SECTION -->
		<section id="section-<?php echo esc_attr($slug); ?>" <?php if (is_tag() || is_category() || is_search() || is_archive() || is_tax()) { ?>class="notoppadding"<?php } ?>>
			<div class="section-inner clearfix">	
            
				<?php
                //** QUERY IF SEARCH
                if (get_query_var('s')) {
                    $query = new WP_Query(array(
                        'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                        's' => get_query_var('s'),
                        'post_type' => array('post')
                    ));
                } 
                
                //** NO POST INFO
                if (!have_posts()) { echo '<div class="wrapper nopost"><h5>'.__("No posts has been found!", 'sr_pond_theme').'</h5></div>'; } else {
                ?>
                
                <?php if ($style !== 'standard') { ?>
                
            	<div id="blog-grid" class="masonry blog-entries masonry-spaced clearfix" data-maxitemwidth="<?php echo esc_attr($size); ?>">
					<?php get_template_part( 'includes/loop', 'blog'); ?>
				</div> <!-- END #blog-entries -->
                
                <?php } else { ?>
                
                <div id="blog-list" class="blog-entries clearfix wrapper-small">
					<?php get_template_part( 'includes/loop', 'blog'); ?>
				</div> <!-- END #blog-entries -->
                
                <?php }  ?>
                
                <?php if ($query->max_num_pages > 1) { ?>
                <div class="wrapper">
					<?php sr_pagination(__('Older Post <i class="pagination-icon"></i>', 'sr_pond_theme'), __('Newer Post <i class="pagination-icon"></i>', 'sr_pond_theme')); ?>  
                </div>
                <?php } else { ?>
                <div class="spacer spacer-big"></div>
                <?php } ?>
                
				<?php } // END else have_post ?>

			</div>
		</section>
		<!-- SECTION -->

<?php get_footer(); ?>