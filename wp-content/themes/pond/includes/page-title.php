<?php
/*-----------------------------------------------------------------------------------

	WRITE PAGE TITLE
	
-----------------------------------------------------------------------------------*/

global $sr_prefix;


/*************
GET DEFAULT TITLE
**************/
$titles = sr_getTitle();
if ($titles['tax']) { $pagetitle =  $titles['tax'];	$pagesub =  $titles['title']; } else { $pagetitle =  $titles['title']; }
/*************
GET DEFAULT TITLE
**************/



/*************
GET CURRENT POST ID
**************/
if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } else { $theId = get_option( 'page_for_posts' ); }
/*************
GET CURRENT POST ID
**************/



/*************
GET PAGE OPTIONS
**************/

// ALTERNATIVE MAIN TITLE
if (isset($theId) && get_post_meta($theId, $sr_prefix.'_alttitle', true)) { $pagetitle = get_post_meta($theId, $sr_prefix.'_alttitle', true); } 
// GET SUBTITLE
if (isset($theId) && get_post_meta($theId, $sr_prefix.'_subtitle', true)) { $pagesub = get_post_meta($theId, $sr_prefix.'_subtitle', true); }

if (is_tag() || is_category() || is_search() || is_archive() || is_tax()) {
if ($titles['tax']) { $pagetitle =  $titles['tax'];	$pagesub =  $titles['title']; } else { $pagetitle =  $titles['title']; }
}

// GET OPTIONS
$showPagetitle = "default";
if (isset($theId)) { $showPagetitle = get_post_meta($theId, $sr_prefix.'_showpagetitle', true); }
if (is_tag() || is_category() || is_search() || is_archive() || is_tax()) { $showPagetitle = "default"; }

/*************
GET PAGE OPTIONS
**************/




/*************
USE THE OPTIONS
**************/	
$classSection = '';		
$incSection = '';		
$classSectionInner = '';
$fullHeight = get_post_meta($theId, $sr_prefix.'_pagetitleheight', true);
$tPosition = get_post_meta($theId, $sr_prefix.'_pagetitleposition', true);
$scrollDown = get_post_meta($theId, $sr_prefix.'_pagetitlescrolldown', true);
$slider = '';
if ($showPagetitle == 'default') {
	$fullHeight = '';
} else if ($showPagetitle == 'color') {
	$colorBg = get_post_meta($theId, $sr_prefix.'_color_bgcolor', true);
	$colorText = get_post_meta($theId, $sr_prefix.'_color_textcolor', true);
	
	$incSection = 'style="background-color:'.$colorBg.'"';	
	$classSection = 'text-'.$colorText;
} else if ($showPagetitle == 'image') {
	$image = get_post_meta($theId, $sr_prefix.'_image_bgimage', true);
	$imageText = get_post_meta($theId, $sr_prefix.'_image_textcolor', true);
	$imageParallax = get_post_meta($theId, $sr_prefix.'_image_parallax', true);
	$slider = get_post_meta($theId, $sr_prefix.'_image_slider', true);
	
	if ($imageParallax == 'true') {
		$classSection = 'parallax-section text-'.$imageText;
		$incSection = 'data-parallax-image="'.esc_url($image).'"';	
	} else if ($imageParallax == 'false') {
		$classSection = 'text-'.$imageText;
		$incSection = 'style="background:url('.esc_url($image).') center center;background-size:cover;"';	
	}
} else if ($showPagetitle == 'video') {
	$mp4 = get_post_meta($theId, $sr_prefix.'_video_mp4', true);
	$webm = get_post_meta($theId, $sr_prefix.'_video_webm', true);
	$oga = get_post_meta($theId, $sr_prefix.'_video_oga', true);
	$vWidth = get_post_meta($theId, $sr_prefix.'_video_width', true);
	$vHeight = get_post_meta($theId, $sr_prefix.'_video_height', true);
	$poster = get_post_meta($theId, $sr_prefix.'_video_poster', true);
	$videoText = get_post_meta($theId, $sr_prefix.'_video_textcolor', true);
	$parallax = get_post_meta($theId, $sr_prefix.'_video_parallax', true);
	$oColor = get_post_meta($theId, $sr_prefix.'_video_overlaycolor', true);
	$oOpacity = get_post_meta($theId, $sr_prefix.'_video_overlayopacity', true);
	$sound = get_post_meta($theId, $sr_prefix.'_video_sound', true);
	$slider = get_post_meta($theId, $sr_prefix.'_video_slider', true);
	if (isset($slider) && $slider && $slider !== 'false') { $fullHeight = ''; }
	
	$classSection = 'videobg-section text-'.$videoText;
	$incSection = '			data-videomp4="'.esc_attr($mp4).'" 
						   data-videowebm="'.esc_attr($webm).'" 
						   data-videooga="'.esc_attr($oga).'" 
						   data-videowidth="'.esc_attr($vWidth).'"
						   data-videoheight="'.esc_attr($vHeight).'"
						   data-videoposter="'.esc_attr($poster).'"
						   data-videoparallax="'.esc_attr($parallax).'"
						   data-videooverlaycolor="'.esc_attr($oColor).'"
						   data-videooverlayopacity="0.'.esc_attr($oOpacity).'"
						   data-sound="'.esc_attr($sound).'"';	
} else if ($showPagetitle == 'slider') {
	$slider = get_post_meta($theId, $sr_prefix.'_slider_slider', true);
	$fullHeight = '';	
} else if ($showPagetitle == 'fullslider') {
	$fullslider = get_post_meta($theId, $sr_prefix.'_fullslider_images', true);	
	$images = explode('|||', $fullslider);
	$outputSlider = '<div class="owlslider fullscreen-slider text-light" data-pagination="true">';
	foreach ($images as $i) { 
		$object = explode('~~', $i); $type = $object[0]; $id = $object[1];
		if ($type == 'image') { 
			$image = wp_get_attachment_image_src($id, 'fullwidth-pic'); $image = $image[0];
			$outputSlider .= '<div class="fullscreen-slider-item" style="background-image:url('.$image.');"></div>';
		}
	}
	$outputSlider .= '</div>';
	$fullHeight = '';
}


// POSITION
if ($fullHeight == 'full-height' && $showPagetitle !== 'false' && $showPagetitle !== 'default' && $showPagetitle !== 'fullslider') {
	if ($tPosition == 'topleft') { $classSectionInner .= ' vTop'; }
	else if ($tPosition == 'topcenter') { $classSectionInner .= ' align-center vTop'; } 
	else if ($tPosition == 'topright') { $classSectionInner .= ' align-right vTop'; } 
	else if ($tPosition == 'bottomleft') { $classSectionInner .= ' vBottom'; } 
	else if ($tPosition == 'bottomcenter') { $classSectionInner .= ' align-center vBottom'; } 
	else if ($tPosition == 'bottomright') { $classSectionInner .= ' align-right vBottom'; } 
	else { $classSectionInner .= ' align-center'; }
} else if ($showPagetitle !== 'fullslider') {
	$classSectionInner .= ' align-center';
}
/*************
USE THE OPTIONS
**************/	

/*************
DEPENDENCIES (single)
**************/
$titleWrite = '<h2 data-bigletter="'.get_post_meta($theId, $sr_prefix.'_bigletter', true).'"><strong>'.$pagetitle.'</strong></h2>';
$separator = 'separator';
if (isset($pagesub) && $pagesub !== '') { $subWrite = '<h5 class="alttitle title-minimal">'.$pagesub.'</h5>'; }
if (is_single() && get_post_type() == 'portfolio') {	
	$cats = wp_get_object_terms($post->ID, 'portfolio_category'); $pagesub = ''; foreach($cats as $c){ $pagesub .= $c->name.', ';} $pagesub=substr($pagesub, 0, -2);
	$titleWrite = '<h4 class="title-minimal"><strong>'.$pagetitle.'</strong></h4>';
	$separator = 'separator-small';
	if (isset($pagesub) && $pagesub !== '') { $subWrite = '<h6 class="alttitle title-minimal">'.$pagesub.'</h6>'; }
}

if (is_single() && get_post_type() == 'post') {
	$time = get_the_time('M j, Y');
	$titleWrite = '<h4 class="post-name title-minimal"><strong>'.$pagetitle.'</strong></h4>';
	$separator = '';
	$pagesub = sr_getBlogMeta();
	if (isset($pagesub) && $pagesub !== '') { $subWrite = '<h6 class="post-meta alttitle title-minimal">'.$pagesub.'</h6>'; }
}
/*************
DEPENDENCIES (single)
**************/	
				

?>
				
			<?php if ($showPagetitle !== 'false') { ?>
				
				<?php if (isset($inHeader) && $inHeader) {?>
				
				<!-- PAGE TITLE -->
                <?php $ptId = 'page-title'; $pTop=''; if ((isset($slider) && $slider && $slider !== 'false') || (isset($outputSlider) && $outputSlider !== '')) { 
					$pTop=' notoppadding'; $ptId = 'section-page-title'; } 
				?>
				<section id="<?php echo esc_attr($ptId); ?>" class="<?php echo esc_attr($classSection).' '.esc_attr($fullHeight.$pTop); ?>" <?php echo $incSection; ?>>
					<div class="section-inner <?php echo esc_attr($classSectionInner); ?>">
                    	
                       <?php 
					   	if (isset($slider) && $slider && $slider !== 'false') { 
					 		if(class_exists('RevSlider')){ 
								echo putRevSlider($slider); 
							}
					   	} else if (isset($outputSlider) && $outputSlider !== '') {
							echo $outputSlider; 
						} else if ($tPosition !== "false") { ?>
                        
                       	<?php if ($fullHeight == 'full-height' && $showPagetitle !== 'default') { ?>
						<div class="main-title">
                       	<?php } else { ?>
						<div class="main-title wrapper<?php if (get_post_type() == 'post') { echo '-small'; } ?>">
                       	<?php } ?>
						<?php if (isset($time) && $time !== '') { ?><span class="time"><?php echo $time; ?></span><?php } ?>
						<?php echo $titleWrite; ?> 
						<?php if (isset($pagesub) && $pagesub !== '') { ?>
							<?php if (isset($separator) && $separator !== '') { ?><div class="<?php echo esc_attr($separator); ?>"><span></span></div><?php } ?>
							<?php echo $subWrite; ?> 
						<?php } ?> 
                        </div>
                        
                        <?php 
							// If audio in pagetitle (blog post)
							if (get_post_format() == 'audio' && get_post_meta($post->ID, $sr_prefix.'_audio_position', true) == 'pagetitle') { 
							get_template_part( 'includes/post-type', 'audio' ); }
						?>
                        
                        <?php } ?>
                                                                        
					</div>
                    
					<?php
                    // Scroll Down Message
                    if ($fullHeight == 'full-height' && $scrollDown == 'true' ) {
                    ?>
                    <a href="#page-body" class="scroll-down-message">
                        <span class="icon"></span>
                        <span class="text"><?php _e("Scroll Down","sr_pond_theme"); ?></span>
                    </a>
                    <?php } ?> 
                                           
				</section>
				<!-- PAGE TITLE -->
				
				<?php } else { // else if not in header.php ?>
				
				<div class="main-title align-center wrapper">
					<?php echo $titleWrite ?>
					<div class="separator"><span></span></div>
					<?php if (isset($pagesub) && $pagesub !== '') { ?>
						<?php echo $subWrite ?>
					<?php } ?>
                    <div class="spacer spacer-big"></div>
				</div>
				
				<?php } ?>
				
			<?php } ?>
    
