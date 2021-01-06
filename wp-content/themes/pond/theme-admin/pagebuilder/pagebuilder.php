<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Add Pagebuilder Metabox
/*-----------------------------------------------------------------------------------*/

function add_meta_pagebuilder() {  
    add_meta_box(  
        'meta_pagebuilder', // $id  
        __('Pagebuilder', 'sr_pond_theme'), // $title  
        'show_meta_pagebuilder', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority
		
	add_meta_box(  
        'meta_pagebuilder', // $id  
        __('Pagebuilder', 'sr_pond_theme'), // $title  
        'show_meta_pagebuilder', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority		
}  
add_action('add_meta_boxes', 'add_meta_pagebuilder');

	


/*-----------------------------------------------------------------------------------*/
/*	Pagebuilder (Options)
/*-----------------------------------------------------------------------------------*/
$sr_meta_pagebuilder = array(  
	array(  
		'builder' => __('Horizontal Section', 'sr_pond_theme'),
	   	'desc' => '',
	   	'id'    => 'horizontalsection',
		'fields' => array(
			
			array(
				"desc" => "<i>A horizontalsection is a fullwidth section which have a background (color,image,video) to seperate some specific content from default content.</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Name (*optional)', 'sr_pond_theme'),
				'desc' => 'Use a name for a better identification what it is about',
				'id' => $sr_prefix.'_horizontalsection_subname',
				'type' => 'text'
			),
			
			array(
				'label' => __('Background', 'sr_pond_theme'),
				'desc' => '',
				'id' => $sr_prefix.'_horizontalsection_background',
				'type' => 'select-hiding',
				'option' => array( 
					array(	'name' =>__('Color', 'sr_pond_theme'), 
							'value' => 'color'),			 	
					array(	'name' => __('Image', 'sr_pond_theme'), 
							'value'=> 'image'),
					array(	'name' => __('Video', 'sr_pond_theme'), 
							'value'=> 'video')
					)
			),
			
			// HS Color BAckground
			array( 
					"id" => $sr_prefix."_horizontalsection_background",
					"hiding" => "color",	
					"type" => "hidinggroupstart"
				),
				array( "label" => __("Background Color", 'sr_pond_theme'),
					   "desc" => 'Choose a background color for this section',
					   "id" => $sr_prefix.'_horizontalsection_colorbg',
					   "type" => "color"
				),
			array( 
					"id" => $sr_prefix."_horizontalsection_background",
					"type" => "hidinggroupend"
				),
				
			
			// HS IMAGE Background
			array( 
					"id" => $sr_prefix."_horizontalsection_background",
					"hiding" => "image",	
					"type" => "hidinggroupstart"
				),
				array( 	"label" => __("Background Image", 'sr_pond_theme'),
					   	"desc" => 'Choose a background color for this section',
					   	"id" => $sr_prefix."_horizontalsection_imagebg",
				  		"type" => "image"
					  ),	
					  
				array( 	"label" => __("Parallax Effect", 'sr_pond_theme'),
					   	"desc" => '',
					   	"id" => $sr_prefix."_horizontalsection_imageparallax",
					   	"type" => "select",
					   	"option" => array( 
							array(	"name" =>__("Yes", 'sr_pond_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_pond_theme'), 
									"value"=> "false")
							)
					  ),
			array( 
					"id" => $sr_prefix."_horizontalsection_background",
					"type" => "hidinggroupend"
				),
				
				
			// HS VIDEO Background
			array( 
					"id" => $sr_prefix."_horizontalsection_background",
					"hiding" => "video",	
					"type" => "hidinggroupstart"
				),
				array( "label" => __("MP4 file url", 'sr_pond_theme'),
					   "desc" => 'The url to the MP4 file',
					   "id" => $sr_prefix."_horizontalsection_videomp4",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("WEBM file url", 'sr_pond_theme'),
					   "desc" => 'The url to the WEBM file',
					   "id" => $sr_prefix."_horizontalsection_videowebm",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("OGV file url", 'sr_pond_theme'),
					   "desc" => 'The url to the OGV file',
					   "id" => $sr_prefix."_horizontalsection_videoogv",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Video Width", 'sr_pond_theme'),
					   "desc" => 'Please enter the width of the video file',
					   "id" => $sr_prefix."_horizontalsection_videowidth",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Video Height", 'sr_pond_theme'),
					   "desc" => 'Please enter the height of the video file',
					   "id" => $sr_prefix."_horizontalsection_videoheight",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Poster", 'sr_pond_theme'),
					   "desc" => "This image will be shown for devices which don't support background video. Please make sure that this image has the same height than the video itself",
					   "id" => $sr_prefix."_horizontalsection_videoposter",
				   		"type" => "image"
					  ),	
					  
				array( "label" => __("Parallax Effect", 'sr_pond_theme'),
					   "desc" => '',
					   "id" => $sr_prefix."_horizontalsection_videoparallax",
					   "type" => "select",
					   "option" => array( 
							array(	"name" =>__("Yes", 'sr_pond_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_pond_theme'), 
									"value"=> "false")
							)
					  ),
				
				array( "label" => __("Overlay Color", 'sr_pond_theme'),
					   "desc" => "Leave it empty if you don't want any overlay color",
					   "id" => $sr_prefix."_horizontalsection_videooverlay",
					   "type" => "color"
					  ),
					  
				array( "label" => __("Overlay Opacity", 'sr_pond_theme'),
					   "desc" => '',
					   "id" => $sr_prefix."_horizontalsection_videooverlayopacity",
					   "type" => "select",
					   "option" => array( 
							array(	"name" =>__("0.1", 'sr_pond_theme'), 
									"value" => "1"),			 	
							array(	"name" => __("0.2", 'sr_pond_theme'), 
									"value"=> "2"),
							array(	"name" => __("0.3", 'sr_pond_theme'), 
									"value"=> "3"),
							array(	"name" =>__("0.4", 'sr_pond_theme'), 
									"value" => "4"),			 	
							array(	"name" => __("0.5", 'sr_pond_theme'), 
									"value"=> "5"),
							array(	"name" => __("0.6", 'sr_pond_theme'), 
									"value"=> "6"),
							array(	"name" => __("0.7", 'sr_pond_theme'), 
									"value"=> "7"),
							array(	"name" => __("0.8", 'sr_pond_theme'), 
									"value"=> "8"),
							array(	"name" =>__("0.9", 'sr_pond_theme'), 
									"value" => "9")
							)
					  ),
			array( 
					"id" => $sr_prefix."_horizontalsection_background",
					"type" => "hidinggroupend"
				),
				
				
			array(
					'label' => __('Text color', 'sr_pond_theme'),
					'desc' => '',
					'id' => $sr_prefix.'_horizontalsection_textcolor',
					'type' => 'select',
					'option' => array( 
						array(	'name' =>__('Light', 'sr_pond_theme'), 
								'value' => 'text-light'),			 	
						array(	'name' => __('Dark', 'sr_pond_theme'), 
								'value'=> 'text-dark')
						)
				),
				
			array( 	"label" => __("Padding Top", 'sr_pond_theme'),
				   	"desc" => 'Don\'nt write "px" Example = 120',
				   	"id" => $sr_prefix."_horizontalsection_pdtop",
				   	"type" => "text",
					"default" => "120"
				),
				
			array( 	"label" => __("Padding Bottom", 'sr_pond_theme'),
				   	"desc" => 'Don\'nt write "px" Example = 120',
				   	"id" => $sr_prefix."_horizontalsection_pdbottom",
				   	"type" => "text",
					"default" => "120"
				),
				  		
		)  
	),
	
	array(  
		'builder' => __('Split Section', 'sr_pond_theme'),
	   	'desc' => '',
	   	'id'    => 'splitsection',
		'fields' => array(
		
			array(
				"desc" => "<i>A split section is a fullwidth section which is splitted into 2 sides (left/right).  You can choose any type of background or content for both sides.</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Split Size', 'sr_pond_theme'),
				'desc' => '',
				'id' => $sr_prefix.'_splitsection_size',
				'type' => 'select',
				'option' => array( 
					array(	'name' =>__('Left = half / Right = half', 'sr_pond_theme'), 
							'value' => 'split-half/split-half'),	
					array(	'name' => __('Left = small / Right = big', 'sr_pond_theme'), 
							'value' => 'split-onethird/split-twothird'),	
					array(	'name' => __('Left = big / Right = small', 'sr_pond_theme'), 
							'value' => 'split-twothird/split-onethird'),	
					)
			),
			
			array(
				'label' => __('Mobile order', 'sr_pond_theme'),
				'desc' => 'On mobile devices the left/right section will be aligned one below each other. Choose which one should be shown on first position.',
				'id' => $sr_prefix.'_splitsection_order',
				'type' => 'select',
				'option' => array( 
					array(	'name' =>__('Left first (default)', 'sr_pond_theme'), 
							'value' => 'left'),	
					array(	'name' => __('Right first', 'sr_pond_theme'), 
							'value' => 'right')
					)
			),
			
			// LEFT COL
			array( "label" => "Left Split Section", "id" => "left", "type" => "colstart" ),
			
			array(
				'label' => __('Name (*optional)', 'sr_pond_theme'),
				'desc' => 'Use a name for a better identification what it is about',
				'id' => $sr_prefix.'_splitsection_left_subname',
				'type' => 'text'
			),
			
			array(
				'label' => __('Background', 'sr_pond_theme'),
				'desc' => '',
				'id' => $sr_prefix.'_splitsection_left_background',
				'type' => 'select-hiding',
				'option' => array( 
					array(	'name' =>__('None', 'sr_pond_theme'), 
							'value' => 'false'),	
					array(	'name' =>__('Color', 'sr_pond_theme'), 
							'value' => 'color'),			 	
					array(	'name' => __('Image', 'sr_pond_theme'), 
							'value'=> 'image'),
					array(	'name' => __('Video', 'sr_pond_theme'), 
							'value'=> 'video'),
					array(	'name' => __('Google Map', 'sr_pond_theme'), 
							'value'=> 'map')	
					)
			),
			
			// left Color BAckground
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"hiding" => "color",	
					"type" => "hidinggroupstart"
				),
				array( "label" => __("Background Color", 'sr_pond_theme'),
					   "desc" => 'Choose a background color for this section',
					   "id" => $sr_prefix.'_splitsection_left_colorbg',
					   "type" => "color"
				),
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"type" => "hidinggroupend"
				),
				
			
			// left IMAGE Background
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"hiding" => "image",	
					"type" => "hidinggroupstart"
				),
				array( 	"label" => __("Background Image", 'sr_pond_theme'),
					   	"desc" => 'Choose a background color for this section',
					   	"id" => $sr_prefix."_splitsection_left_imagebg",
				  		"type" => "image"
					  ),	
					  
				array( 	"label" => __("Parallax Effect", 'sr_pond_theme'),
					   	"desc" => '',
					   	"id" => $sr_prefix."_splitsection_left_imageparallax",
					   	"type" => "select",
					   	"option" => array( 
							array(	"name" =>__("Yes", 'sr_pond_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_pond_theme'), 
									"value"=> "false")
							)
					  ),
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"type" => "hidinggroupend"
				),
				
				
			// left VIDEO Background
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"hiding" => "video",	
					"type" => "hidinggroupstart"
				),
				array( "label" => __("MP4 file url", 'sr_pond_theme'),
					   "desc" => 'The url to the MP4 file',
					   "id" => $sr_prefix."_splitsection_left_videomp4",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("WEBM file url", 'sr_pond_theme'),
					   "desc" => 'The url to the WEBM file',
					   "id" => $sr_prefix."_splitsection_left_videowebm",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("OGV file url", 'sr_pond_theme'),
					   "desc" => 'The url to the OGV file',
					   "id" => $sr_prefix."_splitsection_left_videoogv",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Video Width", 'sr_pond_theme'),
					   "desc" => 'Please enter the width of the video file',
					   "id" => $sr_prefix."_splitsection_left_videowidth",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Video Height", 'sr_pond_theme'),
					   "desc" => 'Please enter the height of the video file',
					   "id" => $sr_prefix."_splitsection_left_videoheight",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Poster", 'sr_pond_theme'),
					   "desc" => "This image will be shown for devices which don't support background video. Please make sure that this image has the same height than the video itself",
					   "id" => $sr_prefix."_splitsection_left_videoposter",
				   		"type" => "image"
					  ),	
					  
				array( "label" => __("Parallax Effect", 'sr_pond_theme'),
					   "desc" => '',
					   "id" => $sr_prefix."_splitsection_left_videoparallax",
					   "type" => "select",
					   "option" => array( 
							array(	"name" =>__("Yes", 'sr_pond_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_pond_theme'), 
									"value"=> "false")
							)
					  ),
				
				array( "label" => __("Overlay Color", 'sr_pond_theme'),
					   "desc" => "Leave it empty if you don't want any overlay color",
					   "id" => $sr_prefix."_splitsection_left_videooverlay",
					   "type" => "color"
					  ),
					  
				array( "label" => __("Overlay Opacity", 'sr_pond_theme'),
					   "desc" => '',
					   "id" => $sr_prefix."_splitsection_left_videooverlayopacity",
					   "type" => "select",
					   "option" => array( 
							array(	"name" =>__("0.1", 'sr_pond_theme'), 
									"value" => "1"),			 	
							array(	"name" => __("0.2", 'sr_pond_theme'), 
									"value"=> "2"),
							array(	"name" => __("0.3", 'sr_pond_theme'), 
									"value"=> "3"),
							array(	"name" =>__("0.4", 'sr_pond_theme'), 
									"value" => "4"),			 	
							array(	"name" => __("0.5", 'sr_pond_theme'), 
									"value"=> "5"),
							array(	"name" => __("0.6", 'sr_pond_theme'), 
									"value"=> "6"),
							array(	"name" => __("0.7", 'sr_pond_theme'), 
									"value"=> "7"),
							array(	"name" => __("0.8", 'sr_pond_theme'), 
									"value"=> "8"),
							array(	"name" =>__("0.9", 'sr_pond_theme'), 
									"value" => "9")
							)
					  ),
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"type" => "hidinggroupend"
				),
				
											
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"hiding" => "false color image video",	
					"type" => "hidinggroupstart"
				),
				array(
					'label' => __('Text color', 'sr_pond_theme'),
					'desc' => '',
					'id' => $sr_prefix.'_splitsection_left_textcolor',
					'type' => 'select',
					'option' => array( 
						array(	'name' =>__('Light', 'sr_pond_theme'), 
								'value' => 'text-light'),	
						array(	'name' =>__('Dark', 'sr_pond_theme'), 
								'value' => 'text-dark')	
						)
				),
				array(
					'label' => __('Content Size', 'sr_pond_theme'),
					'desc' => 'See documentation file for more infos',
					'id' => $sr_prefix.'_splitsection_left_csize',
					'type' => 'select',
					'option' => array( 
						array(	'name' =>__('Wrapped Content', 'sr_pond_theme'), 
								'value' => 'split-wrapped-content'),	
						array(	'name' =>__('Full Content (width padding)', 'sr_pond_theme'), 
								'value' => 'split-full-content'),	
						array(	'name' =>__('Full Content (no padding)', 'sr_pond_theme'), 
								'value'=> 'split-fullsize-content'),
						array(	'name' => __('Mini Content (limited to 400px width + centered)', 'sr_pond_theme'), 
								'value'=> 'split-mini-content')	
						)
				),
				array(
					'label' => __('Vertical Align?', 'sr_pond_theme'),
					'desc' => 'Do you want the content to be vertical aligned?  <br>IF YES, make sure that the right side is not a google map and taller than this side.',
					'id' => $sr_prefix.'_splitsection_left_valign',
					'type' => 'select',
					'option' => array( 
						array(	'name' =>__('No', 'sr_pond_theme'), 
								'value' => 'false'),	
						array(	'name' => __('Yes', 'sr_pond_theme'), 
								'value'=> 'true')	
						)
				),
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"hiding" => "content",	
					"type" => "hidinggroupend"
				),
				
			
				
			// left GOOGLE MAP Background
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"hiding" => "map",	
					"type" => "hidinggroupstart"
				),
				
				array( "label" => __("Latitude & Longitude", 'sr_pond_theme'),
					   "desc" => 'Enter the google map latitude & longitude using this tool:<br>http://itouchmap.com/latlong.html',
					   "id" => $sr_prefix."_splitsection_left_maplatlong",
				   		"type" => "text"
					  ),			
					  
				array( "label" => __("Pin Icon", 'sr_pond_theme'),
					   "desc" => 'Choose a custom pin icon',
					   "id" => $sr_prefix."_splitsection_left_mapicon",
				   		"type" => "image"
					  ),
					  
				array( 	"label" => __("Map Color Style", 'sr_pond_theme'),
					   	"desc" => '',
					   	"id" => $sr_prefix."_splitsection_left_mapcolor",
					   	"type" => "select",
					   	"option" => array( 
							array(	"name" =>__("Default", 'sr_pond_theme'), 
									"value" => "default"),			 	
							array(	"name" => __("Greyscale", 'sr_pond_theme'), 
									"value"=> "grey")
							)
					  ),
			
			array( 
					"id" => $sr_prefix."_splitsection_left_background",
					"type" => "hidinggroupend"
				),
				
			array( "id" => "left", "type" => "colend" ),
			
			// RIGHT COL
			array( "label" => "Right Split Section", "id" => "right", "type" => "colstart" ),
				
				array(
					'label' => __('Name (*optional)', 'sr_pond_theme'),
					'desc' => 'Use a name for a better identification what it is about',
					'id' => $sr_prefix.'_splitsection_right_subname',
					'type' => 'text'
				),
				
				array(
				'label' => __('Background', 'sr_pond_theme'),
				'desc' => '',
				'id' => $sr_prefix.'_splitsection_right_background',
				'type' => 'select-hiding',
				'option' => array( 
					array(	'name' =>__('None', 'sr_pond_theme'), 
							'value' => 'false'),	
					array(	'name' =>__('Color', 'sr_pond_theme'), 
							'value' => 'color'),			 	
					array(	'name' => __('Image', 'sr_pond_theme'), 
							'value'=> 'image'),
					array(	'name' => __('Video', 'sr_pond_theme'), 
							'value'=> 'video'),
					array(	'name' => __('Google Map', 'sr_pond_theme'), 
							'value'=> 'map')	
					)
			),
			
			// right Color BAckground
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"hiding" => "color",	
					"type" => "hidinggroupstart"
				),
				array( "label" => __("Background Color", 'sr_pond_theme'),
					   "desc" => 'Choose a background color for this section',
					   "id" => $sr_prefix.'_splitsection_right_colorbg',
					   "type" => "color"
				),
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"type" => "hidinggroupend"
				),
				
			
			// right IMAGE Background
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"hiding" => "image",	
					"type" => "hidinggroupstart"
				),
				array( 	"label" => __("Background Image", 'sr_pond_theme'),
					   	"desc" => 'Choose a background color for this section',
					   	"id" => $sr_prefix."_splitsection_right_imagebg",
				  		"type" => "image"
					  ),	
					  
				array( 	"label" => __("Parallax Effect", 'sr_pond_theme'),
					   	"desc" => '',
					   	"id" => $sr_prefix."_splitsection_right_imageparallax",
					   	"type" => "select",
					   	"option" => array( 
							array(	"name" =>__("Yes", 'sr_pond_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_pond_theme'), 
									"value"=> "false")
							)
					  ),
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"type" => "hidinggroupend"
				),
				
				
			// right VIDEO Background
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"hiding" => "video",	
					"type" => "hidinggroupstart"
				),
				array( "label" => __("MP4 file url", 'sr_pond_theme'),
					   "desc" => 'The url to the MP4 file',
					   "id" => $sr_prefix."_splitsection_right_videomp4",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("WEBM file url", 'sr_pond_theme'),
					   "desc" => 'The url to the WEBM file',
					   "id" => $sr_prefix."_splitsection_right_videowebm",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("OGV file url", 'sr_pond_theme'),
					   "desc" => 'The url to the OGV file',
					   "id" => $sr_prefix."_splitsection_right_videoogv",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Video Width", 'sr_pond_theme'),
					   "desc" => 'Please enter the width of the video file',
					   "id" => $sr_prefix."_splitsection_right_videowidth",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Video Height", 'sr_pond_theme'),
					   "desc" => 'Please enter the height of the video file',
					   "id" => $sr_prefix."_splitsection_right_videoheight",
				   		"type" => "text"
					  ),
					  
				array( "label" => __("Poster", 'sr_pond_theme'),
					   "desc" => "This image will be shown for devices which don't support background video. Please make sure that this image has the same height than the video itself",
					   "id" => $sr_prefix."_splitsection_right_videoposter",
				   		"type" => "image"
					  ),	
					  
				array( "label" => __("Parallax Effect", 'sr_pond_theme'),
					   "desc" => '',
					   "id" => $sr_prefix."_splitsection_right_videoparallax",
					   "type" => "select",
					   "option" => array( 
							array(	"name" =>__("Yes", 'sr_pond_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_pond_theme'), 
									"value"=> "false")
							)
					  ),
				
				array( "label" => __("Overlay Color", 'sr_pond_theme'),
					   "desc" => "Leave it empty if you don't want any overlay color",
					   "id" => $sr_prefix."_splitsection_right_videooverlay",
					   "type" => "color"
					  ),
					  
				array( "label" => __("Overlay Opacity", 'sr_pond_theme'),
					   "desc" => '',
					   "id" => $sr_prefix."_splitsection_right_videooverlayopacity",
					   "type" => "select",
					   "option" => array( 
							array(	"name" =>__("0.1", 'sr_pond_theme'), 
									"value" => "1"),			 	
							array(	"name" => __("0.2", 'sr_pond_theme'), 
									"value"=> "2"),
							array(	"name" => __("0.3", 'sr_pond_theme'), 
									"value"=> "3"),
							array(	"name" =>__("0.4", 'sr_pond_theme'), 
									"value" => "4"),			 	
							array(	"name" => __("0.5", 'sr_pond_theme'), 
									"value"=> "5"),
							array(	"name" => __("0.6", 'sr_pond_theme'), 
									"value"=> "6"),
							array(	"name" => __("0.7", 'sr_pond_theme'), 
									"value"=> "7"),
							array(	"name" => __("0.8", 'sr_pond_theme'), 
									"value"=> "8"),
							array(	"name" =>__("0.9", 'sr_pond_theme'), 
									"value" => "9")
							)
					  ),
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"type" => "hidinggroupend"
				),
		
				
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"hiding" => "false color image video",	
					"type" => "hidinggroupstart"
				),
				array(
					'label' => __('Text color', 'sr_pond_theme'),
					'desc' => '',
					'id' => $sr_prefix.'_splitsection_right_textcolor',
					'type' => 'select',
					'option' => array( 
						array(	'name' =>__('Light', 'sr_pond_theme'), 
								'value' => 'text-light'),	
						array(	'name' =>__('Dark', 'sr_pond_theme'), 
								'value' => 'text-dark')	
						)
				),
				array(
					'label' => __('Content Size', 'sr_pond_theme'),
					'desc' => 'See documentation file for more infos',
					'id' => $sr_prefix.'_splitsection_right_csize',
					'type' => 'select',
					'option' => array( 
						array(	'name' =>__('Wrapped Content', 'sr_pond_theme'), 
								'value' => 'split-wrapped-content'),	
						array(	'name' =>__('Full Content (width padding)', 'sr_pond_theme'), 
								'value' => 'split-full-content'),	
						array(	'name' =>__('Full Content (no padding)', 'sr_pond_theme'), 
								'value'=> 'split-fullsize-content'),
						array(	'name' => __('Mini Content (limited to 400px width + centered)', 'sr_pond_theme'), 
								'value'=> 'split-mini-content')	
						)
				),
				array(
					'label' => __('Vertical Align?', 'sr_pond_theme'),
					'desc' => 'Do you want the content to be vertical aligned?  <br>IF YES, make sure that the left side is not a google map and taller than this side.',
					'id' => $sr_prefix.'_splitsection_right_valign',
					'type' => 'select',
					'option' => array( 
						array(	'name' =>__('No', 'sr_pond_theme'), 
								'value' => 'false'),	
						array(	'name' => __('Yes', 'sr_pond_theme'), 
								'value'=> 'true')	
						)
				),
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"type" => "hidinggroupend"
				),
				
				
			// right GOOGLE MAP Background
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"hiding" => "map",	
					"type" => "hidinggroupstart"
				),
				
				array( "label" => __("Latitude & Longitude", 'sr_pond_theme'),
					   "desc" => 'Enter the google map latitude & longitude using this tool:<br>http://itouchmap.com/latlong.html',
					   "id" => $sr_prefix."_splitsection_right_maplatlong",
				   		"type" => "text"
					  ),
					  
					  
				array( "label" => __("Pin Icon", 'sr_pond_theme'),
					   "desc" => 'Choose a custom pin icon',
					   "id" => $sr_prefix."_splitsection_right_mapicon",
				   		"type" => "image"
					  ),
					  
				array( 	"label" => __("Map Color Style", 'sr_pond_theme'),
					   	"desc" => '',
					   	"id" => $sr_prefix."_splitsection_right_mapcolor",
					   	"type" => "select",
					   	"option" => array( 
							array(	"name" =>__("Default", 'sr_pond_theme'), 
									"value" => "default"),			 	
							array(	"name" => __("Greyscale", 'sr_pond_theme'), 
									"value"=> "greyscale")
							)
					  ),
			
			array( 
					"id" => $sr_prefix."_splitsection_right_background",
					"type" => "hidinggroupend"
				),
				
			array( "id" => "right", "type" => "colend" ),
					
		)
		
	),
	
	array(  
		'builder' => __('Text / Editor', 'sr_pond_theme'),
	   	'desc' => '',
	   	'id'    => 'text',
		'fields' =>  array(
		
			array(
				"desc" => "<i>Add a blank content area.</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Name (*optional)', 'sr_pond_theme'),
				'desc' => 'Use a name for a better identification what it is about',
				'id' => $sr_prefix.'_text_subname',
				'type' => 'text'
			),
		
			array(
				'label' => '',
				'desc' => '',
				'id' => $sr_prefix.'_text_content',
				'type' => 'editor'
			)
		
		)
	),
	
	array(  
		'builder' => __('Spacer', 'sr_pond_theme'),
	   	'desc' => '',
	   	'id'    => 'spacer',
		'fields' => array(
			
			array(
				"desc" => "<i>A spacer will add some space between your different sections.</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Spacer Size?', 'sr_pond_theme'),
				'desc' => 'Which size do you want for the spacer',
				'id' => $sr_prefix.'_spacer_size',
				'type' => 'select',
				'option' => array( 
					array(	'name' =>__('Big', 'sr_pond_theme'), 
							'value' => 'big'),	
					array(	'name' => __('Medium', 'sr_pond_theme'), 
							'value'=> 'medium'),
					array(	'name' => __('Small', 'sr_pond_theme'), 
							'value'=> 'small'),
					array(	'name' => __('Mini', 'sr_pond_theme'), 
							'value'=> 'mini')	
					)
			)
		
		)
		
	)
	
 );


function show_meta_pagebuilder() {  
	global $sr_meta_pagebuilder, $post; 
	
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_pagebuilder_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />'; 
	sr_write_pagebuilder($sr_meta_pagebuilder);
}




/*-----------------------------------------------------------------------------------*/
/*	WRITE PAGEBUILDER
/*-----------------------------------------------------------------------------------*/
function sr_write_pagebuilder($a) {
	global $sr_prefix, $post; 
	
	$classActive = '';
	if (get_post_meta($post->ID, $sr_prefix.'_pagebuilder_active', true) == 'yes') { $classActive = 'active'; }
	
	// pagebuilder textarea (parse)
	echo '<div id="sr-pagebuilder" class="'.$classActive.'">';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder" id="'.$sr_prefix.'_pagebuilder">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder', true).'</textarea>';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_json" id="'.$sr_prefix.'_pagebuilder_json">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true).'</textarea>';
	
	// BACKUP FIELDS
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_backup_one" id="'.$sr_prefix.'_pagebuilder_backup_one">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder', true).'</textarea>';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_json_backup_one" id="'.$sr_prefix.'_pagebuilder_json_backup_one">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true).'</textarea>';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_json_backup_one_tmp" id="'.$sr_prefix.'_pagebuilder_json_backup_one_tmp">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json_backup_one', true).'</textarea>';
	
	
	echo '<input type="hidden" name="'.$sr_prefix.'_pagebuilder_active" class="'.$sr_prefix.'_pagebuilder_active" id="'.$sr_prefix.'_pagebuilder_active" value="'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder_active', true).'">';
	echo '<a href="#meta_pagebuilder" class="sr-enable-pagebuilder">Activate Pagebuilder</a>';
	echo '<a href="#" class="sr-disable-pagebuilder">Deactivate Pagebuilder</a>';	
	
	
	// 		********
	//		Pagebuilder VISUAL
	// 		********	
	echo '<div id="sr-pagebuilder-visual" class="sortable-container">';
	if (get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true) !== '') {
	$json = json_decode(get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true));
	//print_r($json);
	if($json) {
	foreach($json->section as $section) {
			
		echo '<div class="visualsection '.$section->shortcode.'">';
		echo '<div class="title-bar"><strong>'.$section->name.'</strong> <span>('.$section->subname.')</span><a href="#" class="delete"></a>';
		echo '<a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit">edit</a>';
		echo '</div>';	
		switch($section->shortcode) {
			
			// spacer
			case 'spacer':
				echo '<textarea class="shortcode">[spacer ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
			break;
			
			// text
			case 'text':
				echo '<textarea class="shortcode">***CONTENT***</textarea>';
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName !== 'content') { echo ' '.$o->oName.'="'.$o->oVal.'"'; }
					else { $thisContent =  $o->oVal;}
				}
				echo '<textarea class="content">'.$thisContent.'</textarea><a href="#" class="open-text"><span></span>Edit Content</a>';
			break;
			
			// horizontalsection
			case 'horizontalsection':
				echo '<textarea class="shortcode">';
				echo '[horizontalsection';
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName !== 'content') { echo ' '.$o->oName.'="'.$o->oVal.'"'; }
					else if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				echo ']***CONTENT***[/horizontalsection]';
				echo '</textarea><textarea class="content">'.$thisContent.'</textarea><div class="hor-bg"></div><a href="#" class="open-text"><span></span>Edit Content</a>';
			break;
			
			// splitsection
			case 'splitsection':
			
				if (isset($section->order)) { $order = $section->order; } else { $order = "left"; }
			
				echo '<textarea name="json" class="json json-split">{"shortcode": "splitsection","name": "Split Section","subname": "","size": "'.$section->size.'","order": "'.$order.'","optionsleft":***SPLITLEFT***,"optionsright":***SPLITRIGHT***}</textarea>';
			
				echo '<div class="split-section">';
				
				$leftSubname = false;
				$leftContent = false;
				$leftWidth = false;
				$leftShortcode = '';
				foreach ($section->optionsleft as $o) {
					if ($o->oName !== 'content' && $o->oName !== 'subname') { $leftShortcode .= ' '.$o->oName.'="'.$o->oVal.'"'; }
					else if ($o->oName == 'content') { $leftContent =  $o->oVal;}
					else if ($o->oName == 'subname') { $leftSubname =  $o->oVal;}
					if ($o->oName == 'size') { $leftWidth = $o->oVal; }
				}
				$leftSlashes = addcslashes($leftContent, '"\\/');
				//$leftJson = str_replace($leftSlashes, "***CONTENT***", json_encode($section->optionsleft, JSON_UNESCAPED_UNICODE));
				// JSON_UNESCAPED_UNICODE > php since 5.4.0
				
				# bug (1.2) special character
				$leftJson = substr(json_encode($section->optionsleft), 0, strpos(json_encode($section->optionsleft), '"oName":"content",'));
				$leftJson = $leftJson.'"oName":"content","oVal":"***CONTENT***"}]';
				
				$leftJson = str_replace('"oVal":""', '"oVal":"***CONTENT***"', $leftJson);
				echo '<div class="split-left '.$leftWidth.'"><span class="split-title">'.$leftSubname.'</span><textarea class="shortcode">[splitsection position="left"'.$leftShortcode.']***CONTENT***[/splitsection]</textarea><textarea class="content" data-site="left" data-order="'.$order.'">'.$leftContent.'</textarea><a href="#" class="open-text"><span></span>Edit Content</a><textarea class="json json-left">'.$leftJson.'</textarea></div>';
				
				$rightSubname = false;
				$rightContent = false;
				$rightWidth = false;
				$rightShortcode = '';
				foreach ($section->optionsright as $o) {
					if ($o->oName !== 'content' && $o->oName !== 'subname') { $rightShortcode .= ' '.$o->oName.'="'.$o->oVal.'"'; }
					else if ($o->oName == 'content') { $rightContent =  $o->oVal;}
					else if ($o->oName == 'subname') { $rightSubname =  $o->oVal;}
					if ($o->oName == 'size') { $rightWidth = $o->oVal; }
				}
				$rightSlashes = addcslashes($rightContent, '"\\/');
				
				# bug (1.2) special character
				$rightJson = substr(json_encode($section->optionsright), 0, strpos(json_encode($section->optionsright), '"oName":"content",'));
				$rightJson = $rightJson.'"oName":"content","oVal":"***CONTENT***"}]';
				
				$rightJson = str_replace('"oVal":""', '"oVal":"***CONTENT***"', $rightJson);
				echo '<div class="split-right '.$rightWidth.'"><span class="split-title">'.$rightSubname.'</span><textarea class="shortcode">[splitsection position="right"'.$rightShortcode.']***CONTENT***[/splitsection]</textarea><textarea class="content" data-site="right" data-order="'.$order.'">'.$rightContent.'</textarea><a href="#" class="open-text"><span></span>Edit Content</a><textarea class="json json-right">'.$rightJson.'</textarea></div>';
				
				//echo '<textarea>'.$rightJson.'</textarea>';
				//echo '<textarea>'.$rightSlashes.'</textarea>';
				//echo '<textarea>'.json_encode($section->optionsright).'</textarea>';
				
				echo '</div>';
			break;
			
		} // END switch
		
		if ($section->shortcode !== 'splitsection') {
			
			# bug (1.2) special character
			if (strpos(json_encode($section), '"oName":"content",')) {
				$jsonContent = substr(json_encode($section), 0, strpos(json_encode($section), '"oName":"content",'));
				$jsonContent = $jsonContent.'"oName":"content","oVal":"***CONTENT***"}]}';
			} else {
				// for all json which have no content
				$jsonContent = json_encode($section)	;
			}
			
			/*
			$contentSlashes = addcslashes($thisContent, '"\\/');
			$jsonContent = str_replace($contentSlashes, "***CONTENT***", json_encode($section));
			$jsonContent = str_replace('"oVal":""', '"oVal":"***CONTENT***"', $jsonContent);*/
			echo '<textarea class="json">'.$jsonContent.'</textarea>';
		}
		echo '</div>';
		
	} // END foreach section
	} // END if json
	
	
	else {
		// If json code has errors (!is_array) we display a message and a restore button
		if (get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json_backup_one', true) && get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json_backup_one', true) !== '') {
		echo '<div class="pagebuilder-message alert-message">Unfortunately something went wrong.<br>It\'s recommended to resore the pagebuilder in order not to loose your previous savings.</div>';	
		echo '<input type="hidden" name="sr-pagebuilder-restore" id="sr-pagebuilder-restore" value="false">';
		echo '<a href="#" id="restore-pagebuilder">Restore Now</a>';	
		}
	}
	
	
	}
	echo '</div>';
	echo '<div id="sr-add-element"><a href="#" class="sr-open-popup-elements"><span></span><br>Add Element</a></div>';
	// 		********
	//		Pagebuilder VISUAL
	// 		********
	
	
	
	
	
	// 		********
	//		Pagebuilder EDIT CONTENT
	// 		********
	echo '<div id="sr-pagebuilder-popup-tinymce" class="sr-pagebuilder-popup">';
	echo '<div class="title">Edit Content <a class="update-content" href="#">update</a></div>';
	echo '<div class="popup-inner">';
	wp_editor( '', $sr_prefix.'_buildereditor',array('textarea_rows' => 13));
	echo '</div>';
	echo '</div>';
	// 		********
	//		Pagebuilder EDIT CONTENT
	// 		********
	
	
	
	
	
	// 		********
	//		Pagebuilder POPUP ($sr_meta_pagebuilder)
	// 		********
	echo '<div id="sr-pagebuilder-popup-bg"></div>';
	
	/* Popup Element Choose */
	echo '<div id="sr-pagebuilder-popup-elements" class="sr-pagebuilder-popup">';
	echo '<div class="title">Choose Element <a class="close-popup" href="#">close</a></div>';
	echo '<div class="popup-inner">';
	echo '<div class="sr-pagebuilder-options">';
	foreach ($a as $builder) {
		echo '<a href="#sr-pagebuilder-popup-'.$builder['id'].'">'.$builder['builder'].'</a>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	/* Popup Element Choose */
	
	
	/* Popup Element Options */
	foreach ($a as $builder) {
		echo '<div id="sr-pagebuilder-popup-'.$builder['id'].'" class="sr-pagebuilder-popup sr-pagebuilder-popup-option">';
		echo '<div class="title">'.$builder['builder'].' <a class="close-popup" href="#">close</a></div>';
		echo '<div class="popup-inner">';
			
			// FIELDS
			foreach ($builder['fields'] as $field) {
				
				
				if ($field['type'] == 'info') {
					echo '<div class="builder-info">'.$field['desc'].'</div>';
				} else if ($field['type'] == 'colstart') {
					echo '<div class="col-'.$field['id'].'"><span class="col-title">'.$field['label'].'</span>';
				} else if ($field['type'] == 'hidinggroupstart') {
					$relatedArray = explode(' ',$field['hiding']);
					$hideClass = '';
					foreach ($relatedArray as $r) { $hideClass .= $field['id'].'_'.$r.' '; }
					echo '<div class="hidinggroup hide'.$field['id'].' '.$hideClass.'">';
				} else if ($field['type'] == 'hidinggroupend' || $field['type'] == 'colend') {
					echo '</div>';
					if ($field['type'] == 'colend' && $field['id'] == 'right') { echo '<div style="clear:both;"></div>';}
				} else {
				
				$default = '';
				if (isset($field['default']) && $field['default'] !== '') { $default = $field['default']; }
				
				echo '<div class="form-row">';
				
				$formValClass = '';
				if ($field['type'] !== 'editor') {
				echo '<label for="'.$field['id'].'"><b>'.$field['label'].'</b><br /><span class="sr_description">'.$field['desc'].'</span></label>';
				} else { $formValClass = 'editor-val'; }
				
				echo '<div class="form-val '.$formValClass.'">';
				switch($field['type']) {
					
					
					// text
    				case 'text':
						echo '<input type="text" name="builder'.$field['id'].'" id="'.$field['id'].'" class="builder'.$field['id'].'" value="'.$default.'" size="30" />';
					break;
					
					// textarea
    				case 'textarea':
						echo '<textarea name="builder'.$field['id'].'" id="'.$field['id'].'" class="builder'.$field['id'].'">'.$default.'</textarea>';
					break;
					
					// editor
    				case 'editor':
						wp_editor( '', 'builder'.$field['id'],array('textarea_rows' => 13));
					break;
										
					
					//color
					case "color":
						echo '<input type="text" name="builder'.$field['id'].'" id="'.$field['id'].'" value="" class="builder'.$field['id'].' sr-color-field" />';
					break;
					
					
					// select
					case 'select':  
					    echo '<div class="select">
								<select name="builder'.$field['id'].'" id="'.$field['id'].'" class="builder'.$field['id'].'">';
						foreach ($field['option'] as $var) {
							echo '<option value="'.$var['value'].'" /> '.$var['name'].'</option>';
						}			  
						echo '</select></div>';   
					break;	
					
					
					// select-hiding
					case 'select-hiding':  
					    echo '<div class="select-hiding">
								<select name="builder'.$field['id'].'" id="'.$field['id'].'" class="builder'.$field['id'].'">';
						foreach ($field['option'] as $var) {
							echo '<option value="'.$var['value'].'" /> '.$var['name'].'</option>';
						}			  
						echo '</select></div>';   
					break;	
					
					
					// image  
					case 'image':  
						echo '	<div class="single-image">
								<input class="upload_image builder'.$field['id'].'" type="text" name="builder'.$field['id'].'" id="builder'.$field['id'].'" value="" size="30" />
								<input class="add_singleimage sr-button" type="button" value="Add Image" /><br />
								<span class="preview_image"><img class="'.$field['id'].'"  src="" alt="" /></span>
						</div>';		
					break;
					
					
				}
				echo '</div>';
				
				echo '<div style="clear:both;"></div></div>'; // END form-row
				
				} // END else hidinggroup
				
			} // END foreach
			
			echo '
				<div class="pagebuilder-add-element">
					<a href="" id="insertbuilder_'.$builder['id'].'" class="submit-builder">'.__("Add Element", 'sr_pond_theme').'</a>
					<a href="" id="editbuilder_'.$builder['id'].'" class="edit-builder">'.__("Edit Element", 'sr_pond_theme').'</a>
				</div>'; // END op-content
			
		echo '</div>'; // popup-inner
		echo '</div>'; // End sr-pagebuilder-popup
		
	} // END foreach
	/* Popup Element Options */
	
	// 		********
	//		Pagebuilder POPUP ($sr_meta_pagebuilder)
	// 		********
	
	
	
	echo '</div>'; // END #sr-pagebuilder
}




/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/
add_action( 'save_post', 'pagebuilder_save_postdata' );
function pagebuilder_save_postdata( $post_id ) {
	global $sr_prefix; 
	
	// verify nonce  
    if (!isset($_POST['meta_pagebuilder_nonce']) || !wp_verify_nonce($_POST['meta_pagebuilder_nonce'], basename(__FILE__))) 
        return $post_id; 
	
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
	
  	// check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    } 
	
	
	// check if restore
	if (isset($_POST['sr-pagebuilder-restore']) && $_POST['sr-pagebuilder-restore'] == 'true') {
		
		// restore the main fields
		update_post_meta($post_id, $sr_prefix.'_pagebuilder', get_post_meta($post_id, $sr_prefix.'_pagebuilder_backup_one', true));
		update_post_meta($post_id, $sr_prefix.'_pagebuilder_json',$_POST[$sr_prefix.'_pagebuilder_json_backup_one_tmp']);
		update_post_meta($post_id, $sr_prefix.'_pagebuilder_active', 'yes');
		
	} else {
	
		$saveFields = array($sr_prefix.'_pagebuilder',$sr_prefix.'_pagebuilder_json',$sr_prefix.'_pagebuilder_backup_one',$sr_prefix.'_pagebuilder_json_backup_one',$sr_prefix.'_pagebuilder_active');
		// loop through fields and save the data  
		foreach ($saveFields as $field) {  
			$old = get_post_meta($post_id, $field, true);  
			$new = $_POST[$field]; 
			//echo $field.' = '.$new.'<br>'; 
			if ('' == $new && $old) {  
				delete_post_meta($post_id, $field);  
			} else if ($new !== $old) {  
				update_post_meta($post_id, $field, $new);  
			}  
		} // end foreach 
	
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Register and load function javascript
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_pagebuilder_scripts' ) ) {
    function sr_pagebuilder_scripts($hook) {
		global $pagenow;

		wp_register_script('pagebuilder-script', get_template_directory_uri() . '/theme-admin/pagebuilder/js/pagebuilder.js', 'jquery');
		wp_enqueue_script('pagebuilder-script');
		
		wp_register_style('pagebuilder-style', get_template_directory_uri() . '/theme-admin/pagebuilder/css/pagebuilder.css');
		wp_enqueue_style('pagebuilder-style');
    }
    add_action('admin_enqueue_scripts','sr_pagebuilder_scripts',10,1);
}


?>