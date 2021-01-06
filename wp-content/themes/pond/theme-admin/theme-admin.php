<?php

/*-----------------------------------------------------------------------------------

	Theme Admin

-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Includes
/*-----------------------------------------------------------------------------------*/

// Adding Option Panel
include("option-panel/option-panel.php");



// Adding Pagebuilder
include("pagebuilder/pagebuilder.php");



// Adding post/work meta boxes
include("functions/theme-postmeta.php");

// Adding Custom Post type
include("functions/theme-custom-post-types.php");

// Theme general frontend features
include("functions/theme-general-features.php");

// Get the custom style
include("functions/theme-custom-styling.php");

// Get the custom fonts
include("functions/theme-custom-fonts.php");

// Get the menu walker
include("functions/theme-onepage-features.php");



// Adding Shortcodes
include("shortcodes/shortcodes.php");




/*-----------------------------------------------------------------------------------*/
/*	Register Widget Areas
/*-----------------------------------------------------------------------------------*/
/*if( !function_exists( 'sr_widgets_init' ) ) {
	function sr_widgets_init() {
		global $sr_prefix;
		register_sidebar( array(
			'name' => __( 'Sidebar Blog', 'sr_pond_theme' ),
			'id' => 'sidebar-blog',
			'before_widget' => '<div class="widget clearfix">',
			'after_widget' => "</div>",
			'before_title' => '<h6 class="widget-title"><strong>',
			'after_title' => '</strong></h6>'
		) );
	}
}
add_action( 'widgets_init', 'sr_widgets_init' );*/




/*-----------------------------------------------------------------------------------*/
/*	Custom Wordpress Login Logo
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_custom_login_logo' ) ) {
	function sr_custom_login_logo() {
	   global $sr_prefix;
	   if (get_option($sr_prefix.'_loginlogo')) {
		echo '<style type="text/css">
			h1 a { 
				background-image: url('.esc_url(get_option($sr_prefix.'_loginlogo')).') !important;
				background-position: center center !important;
			}
		</style>';
		}
	} 
}
add_action('login_head', 'sr_custom_login_logo');





/*-----------------------------------------------------------------------------------*/
/*	Next/Prev links customization
/*-----------------------------------------------------------------------------------*/
add_filter('next_posts_link_attributes', 'add_prev_class');
add_filter('previous_posts_link_attributes', 'add_next_class');

function add_next_class() {
    return 'class="next"';
}

function add_prev_class() {
    return 'class="prev"';
}




/*-----------------------------------------------------------------------------------*/
/*	Comment Function
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_comment' ) ) {
    function sr_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        		
            <div id="comment-<?php comment_ID() ?>" class="comment-inner">
                <div class="user"><?php echo get_avatar( $comment, $size = '50'); ?></div>
                <div class="comment-content">
                    <h6 class="comment-name alttitle title-minimal"><strong><?php comment_author(); ?></strong> <span class="time"><?php comment_date('M j, Y'); ?></span>
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </h6>
                    <?php comment_text() ?>
                </div>
            </div>
        
    <?php
    }
}



/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_favicon' ) ) {
    function sr_favicon() {
    	global $sr_prefix;
    	if (get_option($sr_prefix . '_favicon') != '') {
    	echo '<link rel="shortcut icon" href="'. esc_url(get_option($sr_prefix . '_favicon')) .'"/>'."\n";
    	}
    	else { ?>
    	<link rel="shortcut icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/favicon.ico" />
    	<?php }
    }
    add_action('wp_head', 'sr_favicon');
}



/*-----------------------------------------------------------------------------------*/
/* Show analytics code
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_analytics' ) ) {
    function sr_analytics(){
    	global $sr_prefix;
    	$output = get_option($sr_prefix . '_analytics');
    	if ( $output <> "" ) 
    		echo stripslashes($output) . "\n";
    }
    add_action('wp_footer','sr_analytics');
}



/*-----------------------------------------------------------------------------------*/
/*	Passwort protection
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'content' ) ) {
	function sr_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$o = '<form class="protected-post-form checkform" action="' . get_option( 'siteurl' ) . '/wp-login.php?action=postpass" method="post">
		<div class="form-row clearfix">
			<label for="comment_form" class="req">'.__( "To view this protected post, enter the password below:", "sr_pond_theme" ).'</label>
			<div class="form-value"><input name="post_password" id="' . esc_attr($label) . '" type="password" size="20" /></div>
		</div>
		<div class="form-row clearfix"><input type="submit" name="Submit" value="' . __( "Submit", "sr_pond_theme" ) . '" /></div>
		</form>
		';
		echo $o;
	}
}
add_filter( 'the_password_form', 'sr_password_form' );




/*-----------------------------------------------------------------------------------*/
/*	Remove "Protected" from Title
/*-----------------------------------------------------------------------------------*/
function the_title_trim($title) {
	$title = esc_attr($title);
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');





/*-----------------------------------------------------------------------------------*/
/*	Custom function to limit the content
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'content' ) ) {
	function content($contenttype,$limit,$readmore) {
		global $post;
		global $sr_prefix;
		if ($contenttype == 'content') { $content = get_the_content(); }
		if ($contenttype == 'excerpt') { $content = get_the_excerpt(); }
		$content = preg_replace('/<img[^>]+./','', $content);
		$content = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $content );
		
		if ($readmore) { $redmorelink = '<a href="'.get_permalink().'" class="loadcontent color readmore" data-id="'.get_the_ID().'" data-slug="'.$post->post_name.'" data-type="post">'.$readmore.'</a>'; } else { $redmorelink = ''; }
		
		$content = explode(' ', $content, $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'... ';
		} else {
			$content = implode(" ",$content);
		}	
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		
		return $content.$redmorelink;
	}
}



/*-----------------------------------------------------------------------------------*/
/* Add meta datas for social share
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_get_social_metas' ) ) {
    function sr_get_social_metas() {
        global $sr_prefix;
        
		$customcss = '';
        
        // get post id
        global $wp_query;
        if( is_single() ) {
            $postid = $wp_query->post->ID;
			
			$og_title = get_the_title( $postid );
			$og_desc = get_post($postid);
			$og_desc = content('excerpt', 20, '');
			$og_desc = strip_tags($og_desc);
			$og_url = get_permalink( $postid );
			$og_img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'medium' );;
			$og_img = $og_img[0];
			
			echo '
			<meta property="og:title" content="'.esc_attr($og_title).' - '.esc_attr(get_bloginfo('name')).'" />
			<meta property="og:type" content="website" />
			<meta property="og:url" content="'.esc_attr($og_url).'" />
			<meta property="og:image" content="'.esc_attr($og_img).'" />
			<meta property="og:description" content="'.esc_attr($og_desc).'" />
			';
			
        }
	
    }

}




/*-----------------------------------------------------------------------------------*/
/* Get Current title
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_getTitle' ) ) {
	function sr_getTitle() {
		
		$sr_titles = array();
		
		if (is_404()) {
			$sr_titles['tax'] = false;
			$sr_titles['title'] = __("Page not found", 'sr_pond_theme');
		} else if (is_tag()) {
			$sr_titles['tax'] = single_tag_title('', false);
			$sr_titles['title'] = __("Tag", 'sr_pond_theme');
		} else if (is_category()) {
			$sr_titles['tax'] = single_cat_title('', false);
			$sr_titles['title'] = __("Category", 'sr_pond_theme');
		} else if (is_search()) {
			$sr_titles['tax'] = get_search_query();
			$sr_titles['title'] = __("Search", 'sr_pond_theme');
		} else if (is_tax('portfolio_category')) {
			$the_tax = get_term_by( 'slug', get_query_var( 'portfolio_category' ) , 'portfolio_category');
			$sr_titles['tax'] = $the_tax->name;
			$sr_titles['title'] = __("Portfolio", 'sr_pond_theme');
		} else if (is_tax('portfolio_tags')) {
			$the_tax = get_term_by( 'slug', get_query_var( 'portfolio_tags' ) , 'portfolio_tags');
			$sr_titles['tax'] = $the_tax->name;
			$sr_titles['title'] = __("Portfolio", 'sr_pond_theme');
		} else if (is_author()) {
			$sr_titles['tax'] = get_query_var('author_name');
			$sr_titles['title'] = __("Author", 'sr_pond_theme');
		} else if (is_archive()) {
			$sr_titles['tax'] = single_month_title(' ', false);
			$sr_titles['title'] = __("Archive", 'sr_pond_theme');
		} else if (is_home()) {
			if (get_option('page_for_posts') > 0) {
				$blog = get_post(get_option('page_for_posts'));
				$title = $blog->post_title;
			} else {
				$title = __("Home", 'sr_pond_theme');
			}
			$sr_titles['tax'] = false;
			$sr_titles['title'] = $title;
		} else {
			$sr_titles['tax'] = false;
			$sr_titles['title'] = get_the_title();
		}
		
		return $sr_titles;
	}
}


/*-----------------------------------------------------------------------------------*/
/* Custom post type parent fix
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'remove_parent' ) ) {
	function remove_parent($var)
	{
		// check for current page values, return false if they exist.
		if ($var == 'current_page_parent' || $var == 'current-menu-item' || $var == 'current-page-ancestor') { return false; }
		return true;
	}
}

if ( !function_exists( 'sr_remove_class_from_menu' ) ) {
	function sr_remove_class_from_menu($classes, $item)
	{
		if (is_singular('portfolio') || is_tax('portfolio_category') && $item->title == 'Blog' )
		{
			// we're viewing a custom post type, so remove the 'current-page' from all menu items.
			$classes = array_filter($classes, "remove_parent");
		}
		return $classes;
	}
}
add_filter('nav_menu_css_class', 'sr_remove_class_from_menu', 10, 2);



/*-----------------------------------------------------------------------------------*/
/*	Customize Comment form
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_comment_fields' ) ) {
	function sr_comment_fields($fields) {
		foreach($fields as $field){
			 // Add the class to your field's input
		}
		
		$fields =  array(
			'author' => '<div class="form-row">
						<label for="author" class="req">'.__('Name', 'sr_pond_theme').' *</label>
						<input type="text" name="author" class="author" id="author" value="" placeholder="'.__('Name', 'sr_pond_theme').' *" />
						</div>
						 ',
			'email'  => '<div class="form-row">
						 <label for="email" class="req">'.__('Email', 'sr_pond_theme').' *</label>
						 <input type="text" name="email" class="email" id="email" value="" placeholder="'.__('Email', 'sr_pond_theme').' *"/>
						 </div>',
			'url'    => '<div class="form-row last-formrow">
						 <label for="url">'.__('Website', 'sr_pond_theme').'</label>
						 <input type="text" name="url" class="url" id="url" value="" placeholder="'.__('Website', 'sr_pond_theme').'"/>
						 </div>'
		);
		
		return $fields;
	}
}
add_filter('comment_form_default_fields','sr_comment_fields');

$sr_comments_defaults = array( 
	'comment_field' => '<div class="clear"></div>
						<div class="form-row clearfix textbox">
						<label for="comment_form" class="req">'.__('Comment', 'sr_pond_theme').' *</label>
						<textarea name="comment" class="comment_form" id="comment_form" rows="15" cols="50" placeholder="'.__('Comment', 'sr_pond_theme').' *"></textarea>
						</div>',
	'comment_notes_before'  => '',
	'comment_notes_after'  => '',
	'title_reply'          => '<strong>'.__( 'Leave a comment', 'sr_pond_theme' ).'</strong><span class="separator-small"><span></span></span>',
	'title_reply_to'       => __( 'Leave a Comment to %s', 'sr_pond_theme' ),
	'cancel_reply_link'    => __( 'Cancel Reply', 'sr_pond_theme' ),
	'label_submit'         => __( 'Post Comment', 'sr_pond_theme' )
);
	



/*-----------------------------------------------------------------------------------*/
/*	Get attachement id from src
/*-----------------------------------------------------------------------------------*/
function sr_get_attachment_id_from_src($image_src) {
		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query);
		return $id;
	}



/*-----------------------------------------------------------------------------------*/
/*	Attachement Infos
/*-----------------------------------------------------------------------------------*/
function sr_get_attachment_infos( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}




/*-----------------------------------------------------------------------------------*/
/*	GET SOCIAL LINKS FROM THEME OPTIONS
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_get_sociallinks' ) ) {
	function sr_get_sociallinks($class) {
		global $sr_prefix;
		
		$socialLinksArray = array('facebook','twitter','googleplus','vimeo','pinterest','youtube','instagram','dribbble','behance','deviantart','tumblr','flickr','linkedin','xing','dropbox','rss');
		
		$sList = '';
		foreach($socialLinksArray as $s) {
			if ($s == 'rss') {
				if (!get_option($sr_prefix.'_'.$s)){ $sList .='<li class="'.$s.'"><a href="'.get_option($sr_prefix.'_'.$s).'" target="_blank"></a></li>';}
			} else {
				if (get_option($sr_prefix.'_'.$s)){ $sList .='<li class="'.$s.'"><a href="'.get_option($sr_prefix.'_'.$s).'" target="_blank"></a></li>';}
			}
		}
		echo '<ul class="socialmedia-widget '.esc_attr($class).'">'.$sList.'</ul>';
		
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Google Map  
/*-----------------------------------------------------------------------------------*/
function sr_googleMap($latlong, $text, $pin, $style, $id, $class, $color=null) {
	global $sr_prefix;
    	
		if (!$latlong) { $latlong = '-33.86938,151.204834'; }
		if (!$pin) { $pin = get_template_directory_uri().'/files/images/map-pin.png'; }
		if (!$id) { $id = 0; }
		
		$text = str_replace(chr(13),'<br>',$text);
        $text = str_replace(chr(10),'',$text);
		
		if ($color == 'greyscale') {
			$mapcolor = 'styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}],';	

		} else {
			$mapcolor = '';	
		}

		return '<div id="map'.$id.'" class="google-map '.$class.'" style="'.$style.'"></div>
        <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
			function mapinitialize'.$id.'() {
				var latlng = new google.maps.LatLng('.$latlong.');
				var myOptions = {
					zoom: 14,
					center: latlng,
					scrollwheel: false,
					scaleControl: false,
					disableDefaultUI: false,
					'.$mapcolor.'
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("map'.$id.'"),myOptions);
				
				var image = "'.$pin.'";
				var marker = new google.maps.Marker({
					map: map, 
					icon: image,
					position: map.getCenter()
				});
				
				var contentString = "'.$text.'";
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, "click", function() {
				  infowindow.open(map,marker);
				});
								
					
			}
			mapinitialize'.$id.'();
		</script>';
}




/*-----------------------------------------------------------------------------------*/
/*	Audio 
/*-----------------------------------------------------------------------------------*/
function sr_selfaudio($mp3, $oga, $pic, $id) {
	global $sr_prefix;
		
		$supplied = '';
		$options = '';
		if($pic != '') { $options .= 'poster: "'.$pic.'",'; }
		if($oga != '') { $supplied .= 'oga,'; $options .= 'mp3: "'.$mp3.'",'; }
		if($mp3 != '') { $supplied .= 'mp3,'; $options .= 'oga: "'.$oga.'",'; }
		$supplied .= 'all';
		$options .= 'end: ""';

		return '<script type="text/javascript">
                jQuery(document).ready(function(){
                    if(jQuery().jPlayer) {
                        jQuery("#jquery_jplayer_audio'.$id.'").jPlayer({
                            ready: function () {
                                jQuery(this).jPlayer("setMedia", {
                                    '.$options.'
                                });
                            },
                            swfPath: "'.get_template_directory_uri().'/files/jplayer",
                            cssSelectorAncestor: "#jp_interface_audio'.$id.'",
                            supplied: "'.$supplied.'"
                        });
                    
                    }
                });
            </script>
			
			<div id="jquery_jplayer_audio'.$id.'" class="jp-jplayer jp-jplayer-audio"></div>

            <div class="jp-audio-container">
                <div class="jp-audio">
                    <div class="jp-type-single">
                        <div id="jp_interface_audio'.$id.'" class="jp-interface">
                            <ul class="jp-controls">

                                <li><div class="seperator-first"></div></li>
                                <li><div class="seperator-second"></div></li>
                                <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                            </ul>

                            <div class="jp-progress-container">
                                <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                        <div class="jp-play-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="jp-volume-bar-container">
                                <div class="jp-volume-bar">

                                    <div class="jp-volume-bar-value"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			';
}




/*-----------------------------------------------------------------------------------*/
/*	VIDEO 
/*-----------------------------------------------------------------------------------*/
function sr_selfvideo($m4v, $oga, $webmv, $pic, $id) {
	global $sr_prefix;
		
		$supplied = '';
		$options = '';
		if($m4v != '') { $supplied .= 'm4v,'; $options .= 'm4v: "'.$m4v.'",'; }
		if($oga != '') { $supplied .= 'ogv,'; $options .= 'ogv: "'.$oga.'",'; }
		if($webmv != '') { $supplied .= 'webmv,'; $options .= 'webmv: "'.$webmv.'",'; }
		$supplied .= 'all';
		$options .= 'poster: "'.$pic.'"';

		return '<script type="text/javascript">				
				jQuery(document).ready(function(){
		
					if(jQuery().jPlayer) {
						jQuery("#jquery_jplayer_video'.$id.'").jPlayer({
							ready: function () {
								jQuery(this).jPlayer("setMedia", {
								'.$options.'
                                });
							},
							size: {
					          width: "100%",
					          height: "auto"
					        },
							swfPath: "'.get_template_directory_uri().'/files/jplayer",
							cssSelectorAncestor: "#jp_interface_video'.$id.'",
							supplied: "'.$supplied.'"
						});
					}
				});
            </script>
        
            <div id="jquery_jplayer_video'.$id.'" class="jp-jplayer jp-jplayer-video"></div>

           <div class="jp-video-container">
                <div class="jp-video">
                    <div class="jp-type-single">
                        <div id="jp_interface_video'.$id.'" class="jp-interface">

                            <ul class="jp-controls">

                                <li><div class="seperator-first"></div></li>
                                <li><div class="seperator-second"></div></li>
                                <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>

                            </ul>

                            <div class="jp-progress-container">
                                <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                        <div class="jp-play-bar"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="jp-volume-bar-container">
                                <div class="jp-volume-bar">

                                    <div class="jp-volume-bar-value"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

			';
}


?>