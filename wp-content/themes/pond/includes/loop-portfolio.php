<?php 
global $sr_prefix;
/*-----------------------------------------------------------------------------------

	PORTFOLIO LOOP
	
-----------------------------------------------------------------------------------*/


// GET CATEGORIES
$categories = wp_get_object_terms($post->ID, 'portfolio_category'); 
$current_cats = '';
$masonry_cats = '';
$private = false;
foreach($categories as $cat){
	$category = $cat->slug; 
	$current_cats .= $cat->name.', ';
	$category = strtolower($category);
	if ($category == 'private') { $private = true; }
	$replace = array(" ", "'", '"', "&amp;",  "amp;", "&");
	$category = str_replace($replace, "", $category);
	$masonry_cats .= $category.' ';
}
$current_cats = substr($current_cats, 0, -2);

// GET OPTIONS
$categoryname = get_option($sr_prefix.'_portfoliocategory');
$crop = get_option($sr_prefix.'_portfoliothumbcrop');
$overlayTransparent = get_option($sr_prefix.'_portfoliohovertransparent');
$overlayText = get_option($sr_prefix.'_portfoliohovertext');
?>

					
                    <?php if (!isset($portfolioType) || $portfolioType !== 'carousel' ) { ?>
                    <div class="portfolio-masonry-entry masonry-item <?php echo esc_attr($masonry_cats); ?>">
						<div class="entry-thumb portfolio-thumb">
                    <?php } else { 
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-big' );
						$thumbUrl = $thumb['0'];
					?>
                    <div class="portfolio-carousel-item" style="background-image:url(<?php echo esc_url($thumbUrl); ?>);">
                    <?php } ?>
                    
							<div class="imgoverlay overlay-<?php echo esc_attr($overlayText); ?> <?php if (!$overlayTransparent) {echo 'overlay-transparent'; } ?> name-hidden">
								<?php 
								if (!isset($portfolioType) || $portfolioType !== 'carousel' ) {
									if (!$crop) { the_post_thumbnail('thumb-big-crop'); } 
									else { the_post_thumbnail('thumb-big'); }
								}
								?>
								<div class="overlaycaption">
									<h5 class="overlay-name title-minimal"><strong><?php the_title(); ?></strong></h5>
									<div class="separator-small"><span></span></div>
                                    <?php if (!$categoryname) {  ?><h6 class="alttitle"><?php echo $current_cats; ?></h6><?php } ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="transition"></a>
							</div>
                            
                    <?php if (!isset($portfolioType) || $portfolioType !== 'carousel' ) { ?>
                    	</div>
					</div> <!-- END .portfolio-masonry-entry -->
                    <?php } else { ?>
					</div> <!-- END .portfolio-carousel-item -->
                    <?php }  ?>   