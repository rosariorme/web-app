<?php
/*
Template Name: Portfolio
*/

//get global prefix
global $sr_prefix;

//get template header
get_header();


// GET OPTIONS
$size = get_option($sr_prefix.'_portfoliothumbsize'); if (!$size) { $size = 600; }
$spacing = get_option($sr_prefix.'_portfoliospacing'); if ($spacing && $spacing !== '0') { $spaced = 'masonry-spaced'; } else { $spaced = ''; }

$pTop = ''; if (get_post_meta(get_the_ID(), $sr_prefix.'_paddingtop', true) == 'false') { $pTop = "notoppadding"; }
$pBottom = get_post_meta(get_the_ID(), $sr_prefix.'_paddingbottom', true); 

$gridsize = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogridsize', true);

$portfolioType = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliotype', true);
$splitPos = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliosplitposition', true);
$splitPosText = 'right'; if ($splitPos == 'right') { $splitPosText = 'left'; }
$splitColor = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliosplitcolor', true);
$splitText = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliosplittext', true);
$splitContent = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliosplitcontent', true);

$content_post = get_post(get_the_ID());
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);

?>
			
		<!-- SECTION -->
		<section id="section-<?php echo esc_attr($post->post_name); ?>" class="<?php echo esc_attr($pTop); ?>">
          	<div class="section-inner"> 
				
            	<?php 
					/*
					** GET CATEGORIES TO SHOW
					*/
				
					$category = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliocategories', true);
          			if (get_query_var('portfolio_category')) { $category = get_query_var('portfolio_category'); }
        			$sr_portfoliocount = get_option($sr_prefix.'_portfoliocount');
					
					if ($category[0] == '') {
						$allCatsTmp = get_terms( 'portfolio_category');
						$category = array();
						foreach ($allCatsTmp as $c) { $category[] = $c->slug; }
					}
					if (count($category) < 1) { $taxquery = false; } else {
						$taxquery = array(	array(
										'taxonomy' => 'portfolio_category',
										'field' => 'slug',
										'terms' => $category
									));
					}					
					
					$loadmorecats = '';
					foreach ($category as $c) { $loadmorecats .= $c.','; }
					$loadmorecats = substr_replace($loadmorecats ,"",-1);
				 
					if ( get_option( 'page_on_front' ) == get_the_ID() ) { $pagenumber = ( get_query_var('page') ? get_query_var('page') : 1 ); } 
					else { $pagenumber = ( get_query_var('paged') ? get_query_var('paged') : 1 ); }  
                    $query = new WP_Query(array(
                        'posts_per_page'=> $sr_portfoliocount,
                        'paged' => $pagenumber,
                        'm' => get_query_var('m'),		   
                        'w' => get_query_var('w'),
                        'post_type' => array('portfolio'),
						'tax_query' => $taxquery
                    ) );
					
					$related = 'grid-'.$post->post_name;
                ?>
                
                <?php if (!have_posts($query)) { echo '<div class="nopost"><h3>'.__("No posts has been found!", 'sr_pond_theme').'</h3></div>'; } ?>
                
                <?php if ($portfolioType == 'split') { 
					// SPLIT SECTION // ?>
                <div id="portfolio-split" class="split-section clearfix" style="background:<?php echo esc_attr($splitColor); ?>;">
					<div class="split-<?php echo esc_attr($splitPosText); ?> split-onethird">
						<div class="split-wrapped-content text-<?php echo esc_attr($splitText); ?>">
							<div class="main-title">
								<?php if (isset($splitContent) && $splitContent !== '') { echo apply_filters("the_content", $splitContent); } 
								if (get_post_meta(get_the_ID(), $sr_prefix.'_portfoliofilter', true) !== 'no' && count($category) > 1 && is_array($category)) {
								sr_filter($category,'portfolio-filter-standard','filter clearfix',$related); } ?>
							</div> <!-- END .main-title .wrapper -->
						</div>
					</div> <!-- END .split-onethird -->
                    
                    <div class="split-<?php echo esc_attr($splitPos); ?> split-twothird">
                    	<div id="<?php echo esc_attr($related); ?>" class="masonry portfolio-entries clearfix <?php echo esc_attr($spaced); ?>" data-maxitemwidth="<?php echo esc_attr($size); ?>">
                        <?php  while ($query->have_posts()) { $query->the_post(); get_template_part( 'includes/loop', 'portfolio'); } ?>
                   		</div>
                        <?php $max_num_page = $query->max_num_pages; loadmore('portfolio', $max_num_page, $loadmorecats, $related, 'text-'.$splitText); wp_reset_query(); ?>
					</div> <!-- END .split-twothird -->
                </div>
                <?php } else if ($portfolioType == 'carousel') { ?>
                <div class="owlcarousel portfolio-carousel" data-pagination="false" data-navigation="true">
                	<?php  while ($query->have_posts()) { $query->the_post(); include(locate_template('includes/loop-portfolio.php')); }  wp_reset_query(); ?>
                </div>
                <?php } else { 
					// NO SPLIT SECTION // ?>
					<?php 
                    if (get_post_meta(get_the_ID(), $sr_prefix.'_portfoliofilter', true) !== 'no' && count($category) > 1 && is_array($category)) {
                        echo '<div class="wrapper align-center">';
                        sr_filter($category,'portfolio-filter-standard','filter clearfix',$related);
                        echo '</div><div class="spacer spacer-small"></div>';
                    } ?>
                    <?php if ($gridsize == 'content') { echo '<div class="wrapper">'; } else if ($gridsize == 'small') { echo '<div class="wrapper-small">'; } ?>
                    <div id="<?php echo esc_attr($related); ?>" class="masonry portfolio-entries clearfix <?php echo esc_attr($spaced); ?>" data-maxitemwidth="<?php echo esc_attr($size); ?>">
                        <?php  while ($query->have_posts()) { $query->the_post(); get_template_part( 'includes/loop', 'portfolio'); } ?>
                    </div>
                    <?php $max_num_page = $query->max_num_pages; loadmore('portfolio', $max_num_page, $loadmorecats, $related); wp_reset_query(); ?>
                    <?php if ($gridsize == 'content' || $gridsize == 'small') { echo '</div>'; } ?>
                <?php }  ?>
				<?php if (isset($content) && $content !== '') { echo '<div class="wrapper">'.$content.'</div>'; } ?>
                
				<?php if ($pBottom == 'true') { ?>
				<div class="spacer spacer-big"></div>
				<?php } ?>
			</div>
		</section>
		<!-- SECTION -->
                
<?php get_footer(); ?>