 	<?php
//get global prefix
global $sr_prefix;
global $query;
if ($query) { $query = $query; } else { $query = $wp_query; }

$readmore = get_option($sr_prefix.'_blogentriesreadmore');
$style = "masonry"; if (get_option($sr_prefix.'_blogentriesstyle')) { $style = get_option($sr_prefix.'_blogentriesstyle'); }

if ($style !== 'standard') { $entryClass = 'blog-masonry-entry masonry-item'; } else { $entryClass = 'blog-list-entry'; }

while ($query->have_posts()) : $query->the_post(); 

$format = get_post_format(); if( false === $format ) { $format = 'standard'; }
$dataPostType = ''; if ($format == 'video' || $format == 'audio' || $format == 'gallery') { $dataPostType = 'data-posttype="'.esc_attr($format).'"'; }

?>  
		
                   	<div class="blog-entry blog-masonry-entry masonry-item">
						
                        <?php if(has_post_thumbnail()) { ?>
                        <div class="blog-media" <?php echo $dataPostType; ?>>
							<a href="<?php the_permalink(); ?>" class="transition">
							<?php if ($style !== 'standard') { the_post_thumbnail('thumb-medium'); } else { the_post_thumbnail('thumb-big'); } ?>
                            </a>
						</div>
                        <?php } ?>
                        
                        <div class="blog-content">
							<div class="blog-headline">
								<span class="time"><?php the_time('M j, Y') ?></span>
								<h5 class="post-name"><a href="<?php the_permalink(); ?>" class="transition">
								<?php if (get_post_meta(get_the_ID(), $sr_prefix.'_alttitle', true)) { 
									echo get_post_meta(get_the_ID(), $sr_prefix.'_alttitle', true); }
									else { the_title(); } ?></a></h5>
							</div>
                            <?php if ($style !== 'standard') { } else {  ?>
                            	<?php echo content('excerpt', 50, false); ?>
                            <?php } ?>
                            <?php if (!$readmore) { ?>
                            <a href="<?php the_permalink(); ?>" class="read-more transition"><?php _e("Read More", 'sr_pond_theme'); ?></a>
                            <?php } ?>
						</div>
                        
					</div>
                
<?php endwhile; ?>