<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Add metaboxes
/*-----------------------------------------------------------------------------------*/

# Post types
function add_meta_video() {  
    add_meta_box(  
        'meta_video', // $id  
        __('Video', 'sr_pond_theme'), // $title  
        'show_meta_video', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
}  
add_action('add_meta_boxes', 'add_meta_video');

function add_meta_audio() {  
    add_meta_box(  
        'meta_audio', // $id  
        __('Selfhosted Audio', 'sr_pond_theme'), // $title  
        'show_meta_audio', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
}  
add_action('add_meta_boxes', 'add_meta_audio');

function add_meta_medias() {  
    add_meta_box(  
        'meta_medias', // $id  
        __('Medias', 'sr_pond_theme'), // $title  
        'show_meta_medias', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
}  
add_action('add_meta_boxes', 'add_meta_medias');
# Post types



function add_meta_subtitle() {  
    add_meta_box(  
        'meta_subtitle', // $id  
        __('Pagetitle / Section Title', 'sr_pond_theme'), // $title  
        'show_meta_subtitle', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	add_meta_box(  
        'meta_subtitle', // $id  
        __('Pagetitle / Hero', 'sr_pond_theme'), // $title  
        'show_meta_subtitle', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	add_meta_box(  
        'meta_subtitle', // $id  
        __('Pagetitle / Hero', 'sr_pond_theme'), // $title  
        'show_meta_subtitle', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority		
}  
add_action('add_meta_boxes', 'add_meta_subtitle');

function add_meta_pagesettings() {  
    add_meta_box(  
        'meta_pagesettings', // $id  
        __('Page / Section settings', 'sr_pond_theme'), // $title  
        'show_meta_pagesettings', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority
		
	 add_meta_box(  
        'meta_pagesettings', // $id  
        __('Page settings', 'sr_pond_theme'), // $title  
        'show_meta_pagesettings', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority		
}  
add_action('add_meta_boxes', 'add_meta_pagesettings');

function add_meta_headersettings() {  
    add_meta_box(  
        'meta_headersettings', // $id  
        __('Header/Footer Settings', 'sr_pond_theme'), // $title  
        'show_meta_headersettings', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	 add_meta_box(  
        'meta_headersettings', // $id  
        __('Header/Footer Settings', 'sr_pond_theme'), // $title  
        'show_meta_headersettings', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	 add_meta_box(  
        'meta_headersettings', // $id  
        __('Header/Footer Settings', 'sr_pond_theme'), // $title  
        'show_meta_headersettings', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority		
}  
add_action('add_meta_boxes', 'add_meta_headersettings');

function add_meta_quote() {  
    add_meta_box(  
        'meta_quote', // $id  
        __('Quote', 'sr_pond_theme'), // $title  
        'show_meta_quote', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	
}  
add_action('add_meta_boxes', 'add_meta_quote');

function add_meta_link() {  
    add_meta_box(  
        'meta_link', // $id  
        __('Link', 'sr_pond_theme'), // $title  
        'show_meta_link', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	
}  
add_action('add_meta_boxes', 'add_meta_link');

function add_meta_portfoliocategories() {  
    add_meta_box(  
        'meta_portfoliocategories', // $id  
        __('Portfolio Settings', 'sr_pond_theme'), // $title  
        'show_meta_portfoliocategories', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority */
}  
add_action('add_meta_boxes', 'add_meta_portfoliocategories');


/*-----------------------------------------------------------------------------------*/
/*	Define fields
/*-----------------------------------------------------------------------------------*/


/*  REVSLIDER */
$revolutionslider = array();
$revolutionslider[0] = array( "name" => __("No Slider", 'sr_pond_theme'), "value" => "false");

if(class_exists('RevSlider')){
	
	$slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[] = array( "name" => $revSlider->getTitle(), "value" => $revSlider->getAlias());
	}
}
/*  REVSLIDER */


$sr_prefix = '_sr';  

$sr_meta_subtitle = array( 
	array(  
		"label" => __("Page Title Settings", 'sr_pond_theme'),
	   	"desc" => __("Choose a settings for the Page Title", 'sr_pond_theme'),
	    'id'    => $sr_prefix.'_showpagetitle',  
	    'type'  => 'select-hiding'  ,
		'option' => array( 
						array(	"name" => __("Default (no background)", 'sr_pond_theme'), 
							  	"value"=> "default"),
						array(	"name" => __("Color Background", 'sr_pond_theme'), 
							  	"value"=> "color"),
						array(	"name" => __("Image Background", 'sr_pond_theme'), 
							  	"value"=> "image"),
						array(	"name" => __("Video Background", 'sr_pond_theme'), 
							  	"value"=> "video"),
						array(	"name" => __("Revolution Slider", 'sr_pond_theme'), 
							  	"value"=> "slider"),
						array(	"name" => __("Fullscreen Slider", 'sr_pond_theme'), 
							  	"value"=> "fullslider"),
						array(	"name" => __("No Page Title", 'sr_pond_theme'), 
							  	"value" => "false")
						)
	),
	
		// DEFAULT PAGE TITLE
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "default color image video",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Subtitle", 'sr_pond_theme'),  
				'desc'  => __("Enter your subtitle for this page.  Leave it empty if you don't want do show any subtitle.", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_subtitle',  
				'type'  => 'text'  
			),
			array(  
				'label' => __("Alternativ Main Title", 'sr_pond_theme'),  
				'desc'  => __("If empty, it will take the post name.", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_alttitle',  
				'type'  => 'text'  
			),
			array(  
				'label' => __("Big / Transparent Letter", 'sr_pond_theme'),  
				'desc'  => __("Do you want to display a big transparent letter behind the main title?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_bigletter',  
				'type'  => 'text'  
			),
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"type" => "hidinggroupend"
			),
			
						
		// COLOR BG	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "color",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "",
				"desc" => __("Color Background<br><i>These Settings will only have impact on the page itself, not if the page is a section of your one page.</i>", 'sr_pond_theme'),
				'type'  => 'info'  
			),
			
			array(  
				'label' => __("Background Color", 'sr_pond_theme'),  
				'desc'  => __("Choose a background for your page title", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_color_bgcolor',  
				'type'  => 'color', 
			),
			array(  
				'label' => __("Text Color", 'sr_pond_theme'),  
				'desc'  => __("Choose Text color", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_color_textcolor', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_pond_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_pond_theme'), 
							"value" => "dark")
					)
			),
		
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		// IMAGE BG	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "image",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "",
				"desc" => __("Image Background<br><i>These Settings will only have impact on the page itself, not if the page is a section of your one page.</i>", 'sr_pond_theme'),
				'type'  => 'info'  
			),
			
			array(  
				'label' => __("Background Image", 'sr_pond_theme'),  
				'desc'  => __("Add a background image for the section", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_image_bgimage',  
				'type'  => 'image', 
			),
			array(  
				'label' => __("Text Color", 'sr_pond_theme'),  
				'desc'  => __("Choose Text color", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_image_textcolor', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_pond_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_pond_theme'), 
							"value" => "dark")
					)
			),
			array(  
				'label' => __("Parallax Effect", 'sr_pond_theme'),  
				'desc'  => __("Do you want to have a parallax effect?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_image_parallax', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Yes", 'sr_pond_theme'), 
							"value" => "true"),
					array(	"name" => __("No", 'sr_pond_theme'), 
							"value" => "false")
					)
			),
			array(  
				'label' => __("Overlay Slider (revolution slider)", 'sr_pond_theme'),
				'desc' => __("The slider will overlay your bg image & replace the default page title! <b>Make sure to add transparent background to the slides</b>.", 'sr_pond_theme'),
				'id'    => $sr_prefix.'_image_slider',  
				'type'  => 'select'  ,
				'option' => $revolutionslider
			),
			
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		
		// VIDEO BG	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "video",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "",
				"desc" => __("Video Background<br><i>These Settings will only have impact on the page itself, not if the page is a section of your one page.</i>", 'sr_pond_theme'),
				'type'  => 'info'  
			),
			
			array(  
				'label' => __("MP4 file url", 'sr_pond_theme'),  
				'desc'  => __("The url to the M4V file", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_mp4',  
				'type'  => 'text', 
			),
			array(  
				'label' => __("WEBM file url", 'sr_pond_theme'),  
				'desc'  => __("The url to the WEBM file", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_webm',  
				'type'  => 'text', 
			),
			array(  
				'label' => __("OGV file url", 'sr_pond_theme'),  
				'desc'  => __("The url to the OGV file", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_oga',  
				'type'  => 'text', 
			),
			array(  
				'label' => __("Video Width", 'sr_pond_theme'),  
				'desc'  => __("Please enter the width of the video file", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_width',  
				'type'  => 'text', 
			),
			array(  
				'label' => __("Video Height", 'sr_pond_theme'),  
				'desc'  => __("Please enter the height of the video file", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_height',  
				'type'  => 'text', 
			),
			array(  
				'label' => __("Poster", 'sr_pond_theme'),  
				'desc'  => __("This image will be shown for devices which don't support background video. Please make sure that this image has the same height than the video itself", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_poster',  
				'type'  => 'image', 
			),
			array(  
				'label' => __("Text Color", 'sr_pond_theme'),  
				'desc'  => __("Choose Text color", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_textcolor', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_pond_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_pond_theme'), 
							"value" => "dark")
					)
			),
			array(  
				'label' => __("Parallax Effect", 'sr_pond_theme'),  
				'desc'  => __("Do you want to have a parallax effect?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_parallax', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Yes", 'sr_pond_theme'), 
							"value" => "true"),
					array(	"name" => __("No", 'sr_pond_theme'), 
							"value" => "false")
					)
			),
			array(  
				'label' => __("Overlay Color", 'sr_pond_theme'),  
				'desc'  => __("Leave it empty if you don't want any overlay color", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_overlaycolor',  
				'type'  => 'color', 
			),
			array(  
				'label' => __("Overlay opacity", 'sr_pond_theme'),  
				'desc'  => __("Choose the opacity for the overlay color", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_overlayopacity', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => "0.1", 
							"value" => "1"),
					array(	"name" => "0.2", 
							"value" => "2"),
					array(	"name" => "0.3", 
							"value" => "3"),
					array(	"name" => "0.4", 
							"value" => "4"),
					array(	"name" => "0.5", 
							"value" => "5"),
					array(	"name" => "0.6", 
							"value" => "6"),
					array(	"name" => "0.7", 
							"value" => "7"),
					array(	"name" => "0.8", 
							"value" => "8"),
					array(	"name" => "0.9", 
							"value" => "9")	
					)
			),
			array(  
				'label' => __("Sound", 'sr_pond_theme'),  
				'desc'  => __("Do you want to activate the sound of the video?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_video_sound', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("No", 'sr_pond_theme'), 
							"value" => "false"),
					array(	"name" => __("Yes", 'sr_pond_theme'), 
							"value" => "true")
					)
			),
			array(  
				'label' => __("Overlay Slider (revolution slider)", 'sr_pond_theme'),
				'desc' => __("The slider will overlay your video & replace the default page title! <b>Make sure to add transparent background to the slides</b>.", 'sr_pond_theme'),
				'id'    => $sr_prefix.'_video_slider',  
				'type'  => 'select'  ,
				'option' => $revolutionslider
			),
			
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		// REVOLUTION SLIDER	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "slider",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "",
				"desc" => __("Slider<br><i>These Settings will only have impact on the page itself, not if the page is a section of your one page.</i>", 'sr_pond_theme'),
				'type'  => 'info'  
			),
		
			array(  
				'label' => __("Revolution Slider", 'sr_pond_theme'),
				'desc' => __("Choose a Slider. The Slider will replace the default page title.", 'sr_pond_theme'),
				'id'    => $sr_prefix.'_slider_slider',  
				'type'  => 'select'  ,
				'option' => $revolutionslider
			),
		
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		
		// FULLSCREEN SLIDER	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "fullslider",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				'label' => __("Images", 'sr_pond_theme'),  
				'desc'  => __("Add your images", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_fullslider_images',  
				'type'  => 'gallery'  
			),
		
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		
		// HEIGHT OPTION
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "color image video",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Full Height", 'sr_pond_theme'),  
				'desc'  => __("Do you want the page title to take the full browser height?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_pagetitleheight',  
				'type'  => 'select-hiding', 
				'option' => array( 
					array(	"name" => __("No", 'sr_pond_theme'), 
							"value" => "no-fullheight"),
					array(	"name" => __("Yes", 'sr_pond_theme'), 
							"value" => "full-height")
					)
			),
			
			array( 
				"id" => $sr_prefix."_pagetitleheight",
				"hiding" => "full-height",	
				"type" => "hidinggroupstart"
			),
				array(  
					'label' => __("Title Position", 'sr_pond_theme'),  
					'desc'  => __("Usually used for Portfolio Page title", 'sr_pond_theme'),  
					'id'    => $sr_prefix.'_pagetitleposition',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("Default (Center Center)", 'sr_pond_theme'), 
								"value" => "default"),
						array(	"name" => __("Top Left", 'sr_pond_theme'), 
								"value" => "topleft"),
						array(	"name" => __("Top Center", 'sr_pond_theme'), 
								"value" => "topcenter"),
						array(	"name" => __("Top Right", 'sr_pond_theme'), 
								"value" => "topright"),
						array(	"name" => __("Bottom Left", 'sr_pond_theme'), 
								"value" => "bottomleft"),
						array(	"name" => __("Bottom Center", 'sr_pond_theme'), 
								"value" => "bottomcenter"),
						array(	"name" => __("Bottom Right", 'sr_pond_theme'), 
								"value" => "bottomright"),
						array(	"name" => __("Hide Title Text", 'sr_pond_theme'), 
								"value" => "false")
						)
				),
				
				array(  
					'label' => __("Scroll down Message", 'sr_pond_theme'),  
					'desc'  => __("Do you want to display a message to scroll down?", 'sr_pond_theme'),  
					'id'    => $sr_prefix.'_pagetitlescrolldown',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("No", 'sr_pond_theme'), 
								"value" => "false"),
						array(	"name" => __("Yes", 'sr_pond_theme'), 
								"value" => "true")
						)
				),
			array( 
					"id" => $sr_prefix."_pagetitleheight",
					"type" => "hidinggroupend"
				),
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"type" => "hidinggroupend"
			)
 );


$sr_meta_pagesettings = array( 
	array(  
		'label' => __("Padding Top", 'sr_pond_theme'),  
	    'desc'  => __("Do you want a top padding for this section/page? Choose 'no' if your section starts with any element which has a bakground.", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_paddingtop',  
		'type'  => 'select', 
		'option' => array( 
			array(	"name" => __("Yes", 'sr_pond_theme'), 
					"value" => "true"),
			array(	"name" => __("No", 'sr_pond_theme'), 
					"value" => "false")
			)
	),
	array(  
		'label' => __("Padding Bottom", 'sr_pond_theme'),  
	    'desc'  => __("Do you want a bottom padding for this section/page? Default is 'no'", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_paddingbottom',  
		'type'  => 'select', 
		'option' => array( 
			array(	"name" => __("No", 'sr_pond_theme'), 
					"value" => "false"),
			array(	"name" => __("Yes", 'sr_pond_theme'), 
					"value" => "true")
			)
	)		  
);



$sr_meta_headersettings = array( 

	array(  
		"label" => "main",
		"desc" => '<div class="sr_replacefield">This will only have impact if this page is a <strong>"standalone page (multipage)"</strong> or if you choosed the <strong>"One Page / "Front page"</strong> template for this page.<br><br>This means, if you\'re planning that this page will be a section of your one page site, you can dismiss these Header/Footer Settings.</div>',
		'id'  => 'header-info'  ,
		'type'  => 'info'  
	),
	
	array(  
		'label' => __("Header Style", 'sr_pond_theme'),  
	    'desc'  => __("Choose your Header Style", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_headerstyle',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Overlay", 'sr_pond_theme'), 
					"value" => "overlay"),
			array(	"name" => __("Sticky", 'sr_pond_theme'), 
					"value" => "sticky"),
			array(	"name" => __("No overlay", 'sr_pond_theme'), 
					"value" => "non-overlay")
			)
	),
		array( 
				"id" => $sr_prefix."_headerstyle",
				"hiding" => "overlay",	
				"type" => "hidinggroupstart"
			),
			
			array(  
				"label" => "",
				"desc" => __("<i>This will have no impact if you choose \"Default (no background)\" for the Page Title Settings above.</i>", 'sr_pond_theme'),
				'type'  => 'info'  
			),
			
			array( "label" => __("Overlay Logo Color", 'sr_pond_theme'),
				   "desc" => __("What color/Style for the overlay logo?", 'sr_pond_theme').'',
				   "id" => $sr_prefix."_overlaylogo",
				   "type" => "select",
				   "option" => array( 
						array(	"name" => __("Light", 'sr_pond_theme'), 
								"value"=> "light"),		 
						array(	"name" => __("Dark", 'sr_pond_theme'), 
								"value" => "dark")
						)
				  ),
				  
			array( "label" => __("Overlay Menu Color", 'sr_pond_theme'),
				   "desc" => __("Choose Light or Dark for the overlay menu", 'sr_pond_theme'),
				   "id" => $sr_prefix."_overlaymenu",
				   "type" => "select",
				   "option" => array( 
						array(	"name" => __("Light", 'sr_pond_theme'), 
								"value"=> "light"),		 
						array(	"name" => __("Dark", 'sr_pond_theme'), 
								"value" => "dark")
						)
				  ),
				  
			array( "label" => __("Overlay Position", 'sr_pond_theme'),
				   "desc" => __("Choose the position of the overlay header.", 'sr_pond_theme'),
				   "id" => $sr_prefix."_overlayposition",
				   "type" => "select",
				   "option" => array( 
						array(	"name" => __("Bottom", 'sr_pond_theme'), 
								"value"=> "bottom"),		 
						array(	"name" => __("Top", 'sr_pond_theme'), 
								"value" => "top")
						)
				  ),
			
		array( 
				"id" => $sr_prefix."_headerstyle",
				"type" => "hidinggroupend"
			),
	
	array(  
		'label' => __("Footer Style", 'sr_pond_theme'),  
	    'desc'  => __("Choose your Footer Style", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_footerstyle',  
		'type'  => 'select', 
		'option' => array( 
			array(	"name" => __("Sticky on scroll (default)", 'sr_pond_theme'), 
					"value" => "default"),
			array(	"name" => __("Sticky on pageload", 'sr_pond_theme'), 
					"value" => "sticky-footer")
			)
	)
			  
);


$sr_meta_medias = array(  
	array(  
		'label' => "",  
	    'desc'  => "",  
	    'id'    => "#02B6D9",  
		'type'  => 'accentborder'
	),
	
	array(  
	    'label' => __("Medias / Gallery", 'sr_pond_theme'),  
	    'desc'  => __("Add images or embedded videos, then drag and drop to arrange them.", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_medias',  
	    'type'  => 'medias'  
	),
	
	array(  
		"label" => __("Gallery Layout (Single View)", 'sr_pond_theme'),
	   	"desc" => __("If you choose 'List' the images will be displayed below each other instead of a slider.", 'sr_pond_theme'),
	    'id'    => $sr_prefix.'_mediaslayout',  
	    'type'  => 'select'  ,
		'option' => array( 
						array(	"name" => __("Slider", 'sr_pond_theme'), 
								"value" => "slider"),
						array(	"name" => __("List", 'sr_pond_theme'), 
								"value"=> "list")
						) 
	)
 );

$sr_meta_audio = array(  
	
	array(  
		'label' => "",  
	    'desc'  => "",  
	    'id'    => "#02B6D9",  
		'type'  => 'accentborder'
	),
	
	array(  
		'label' => __("Audio", 'sr_pond_theme'),  
	    'desc'  => __("Embedded Audio or Selfhosted?", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_audio',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Embedded Audio", 'sr_pond_theme'), 
					"value" => "embedded"),
			array(	"name" => __("Selfhosted Audio", 'sr_pond_theme'), 
					"value" => "selfhosted")
			)
	),
		
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "embedded",	
				"type" => "hidinggroupstart"
			),
				array(  
					"label" => __("Embedded Audio", 'sr_pond_theme'),
					"desc" => __("Include the embedded iframe.", 'sr_pond_theme'),
					'id'    => $sr_prefix.'_audio_embedded',  
					'type'  => 'textarea'  
				),
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "embedded",	
				"type" => "hidinggroupend"
			),
			
		
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
			),
				array(  
					"label" => __("MP3 File URL", 'sr_pond_theme'),
					"desc" => __("The url to the mp3 file", 'sr_pond_theme'),
					'id'    => $sr_prefix.'_audio_mp3',  
					'type'  => 'text'  
				),
				array(  
					"label" => __("OGA/OGG File URL", 'sr_pond_theme'),
					"desc" => __("The url to the oga/ogg file", 'sr_pond_theme'),
					'id'    => $sr_prefix.'_audio_oga',  
					'type'  => 'text'  
				),
				array(  
					'label' => __("Show Featured Image", 'sr_pond_theme'),  
					'desc'  => __("Do you want to show the featured image above the player?", 'sr_pond_theme'),  
					'id'    => $sr_prefix.'_audio_image',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("No", 'sr_pond_theme'), 
								"value" => "false"),
						array(	"name" => __("Yes", 'sr_pond_theme'), 
								"value" => "true")
						)
				),
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupend"
			),
			
		array(  
				'label' => __("Position", 'sr_pond_theme'),  
				'desc'  => __("Where do you want to display the audio?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_audio_position',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Default (above content)", 'sr_pond_theme'), 
							"value" => "default"),
					array(	"name" => __("In Page Title", 'sr_pond_theme'), 
							"value" => "pagetitle")
					)
			),
 );




$sr_meta_video = array(  

	array(  
		'label' => "",  
	    'desc'  => "",  
	    'id'    => "#02B6D9",  
		'type'  => 'accentborder'
	),
	
	array(  
		'label' => __("Video", 'sr_pond_theme'),  
	    'desc'  => __("Embedded Video or Selfhosted?", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_video',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Embedded Video (iframe)", 'sr_pond_theme'), 
					"value" => "embedded"),
			array(	"name" => __("Selfhosted Video", 'sr_pond_theme'), 
					"value" => "selfhosted")
			)
	),
		
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "embedded",	
				"type" => "hidinggroupstart"
			),
			array(  
				"label" => __("Embedded Video", 'sr_pond_theme'),
				"desc" => __("Include the embedded iframe.", 'sr_pond_theme'),
				'id'    => $sr_prefix.'_video_embedded',  
				'type'  => 'textarea'  
			),
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "embedded",	
				"type" => "hidinggroupend"
			),
			
			
			
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
			),
			array(  
				"label" => __("M4V File URL", 'sr_pond_theme'),
				"desc" => __("The url to the M4V file", 'sr_pond_theme'),
				'id'    => $sr_prefix.'_video_m4v',  
				'type'  => 'text'  
			),
			array(  
				"label" => __("OGA/OGG File URL", 'sr_pond_theme'),
				"desc" => __("The url to the oga/ogg file", 'sr_pond_theme'),
				'id'    => $sr_prefix.'_video_oga',  
				'type'  => 'text'  
			),
			array(  
				"label" => __("WEBMV File URL", 'sr_pond_theme'),
				"desc" => __("The url to the webmv file", 'sr_pond_theme'),
				'id'    => $sr_prefix.'_video_webmv',  
				'type'  => 'text'  
			),
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupend"
			)
 );


$sr_meta_quote = array(  
	array(  
		"label" => __("Quote", 'sr_pond_theme'),
	   	"desc" => __("Enter the quote.", 'sr_pond_theme'),
	    'id'    => $sr_prefix.'_quote',  
	    'type'  => 'textarea'  
	)
 );


$sr_meta_link = array(  
	array(  
		"label" => __("Link", 'sr_pond_theme'),
	   	"desc" => __("Link url", 'sr_pond_theme'),
	    'id'    => $sr_prefix.'_link',  
	    'type'  => 'text'  
	)
 );

 
 
 $sr_meta_portfoliocategories = array(  
	array(  
		"label" => __("Category", 'sr_pond_theme'),
	   	"desc" => __("Choose the portfolio category you want to show for this page", 'sr_pond_theme'),
	    'id'    => $sr_prefix.'_portfoliocategories',  
	    'type'  => 'portfoliocategories'  
	),
	array(  
		"label" => __("Show Filter", 'sr_pond_theme'),
	   	"desc" => __("Do you want to show the Filter?", 'sr_pond_theme'),
	    'id'    => $sr_prefix.'_portfoliofilter',  
	    'type'  => 'select'  ,
		'option' => array( 
						array(	"name" => __("Yes", 'sr_pond_theme'), 
							  	"value" => "yes"),
						array(	"name" => __("No", 'sr_pond_theme'), 
							  	"value"=> "no")
						)
	),
	array(  
		'label' => __("Type", 'sr_pond_theme'),  
	    'desc'  => __("Masonry, Split Section or Fullscreen Carousel?", 'sr_pond_theme'),  
	    'id'    => $sr_prefix.'_portfoliotype',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Masonry", 'sr_pond_theme'), 
					"value" => "masonry"),
			array(	"name" => __("Split Section", 'sr_pond_theme'), 
					"value" => "split"), 
			array(	"name" => __("Fullscreen Carousel", 'sr_pond_theme'), 
					"value" => "carousel")		
			)
	),
		array( 
				"id" => $sr_prefix."_portfoliotype",
				"hiding" => "masonry",	
				"type" => "hidinggroupstart"
			),
			
			array(  
				'label' => __("Grid Size", 'sr_pond_theme'),  
				'desc'  => "",  
				'id'    => $sr_prefix.'_portfoliogridsize',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Fullwidth (Default)", 'sr_pond_theme'), 
							"value" => "fullwidth"),
					array(	"name" => __("Content width (1080px)", 'sr_pond_theme'), 
							"value" => "content"),
					array(	"name" => __("Small Content width (780px)", 'sr_pond_theme'), 
							"value" => "small")
					)
			),
			
		array( 
				"id" => $sr_prefix."_portfoliotype",
				"hiding" => "masonry",	
				"type" => "hidinggroupend"
			),
			
			
			
		array( 
				"id" => $sr_prefix."_portfoliotype",
				"hiding" => "split",	
				"type" => "hidinggroupstart"
			),
			
			array(  
				'label' => __("Portfolio Position", 'sr_pond_theme'),  
				'desc'  => __("Where should the portfolio be positioned?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_portfoliosplitposition',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Left", 'sr_pond_theme'), 
							"value" => "left"),
					array(	"name" => __("Right", 'sr_pond_theme'), 
							"value" => "right")
					)
			),
			array(  
				'label' => __("Background Color", 'sr_pond_theme'),  
				'desc'  => __("Background color for the text section.", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_portfoliosplitcolor',  
				'type'  => 'color',
				'default' => '#000000'
			),
			array(  
				'label' => __("Text color", 'sr_pond_theme'),  
				'desc'  => __("Text color for the text section?", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_portfoliosplittext',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_pond_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_pond_theme'), 
							"value" => "dark")
					)
			),
			array(  
				'label' => __("Split Text Content", 'sr_pond_theme'),  
				'desc'  => __("This is the content for the split section which contains the text.  Be aware that the filter will placed below this content.", 'sr_pond_theme'),  
				'id'    => $sr_prefix.'_portfoliosplitcontent',  
				'type'  => 'tinymce'
			),
			
		array( 
				"id" => $sr_prefix."_portfoliotype",
				"hiding" => "yes",	
				"type" => "hidinggroupend"
			),
			
		
		array( 
				"id" => $sr_prefix."_portfoliotype",
				"hiding" => "carousel",	
				"type" => "hidinggroupstart"
			),
			
			array(  
				"label" => "main",
				"desc" => '<div class="sr_replacefield">! Show Filter is not possible for Carousel.</div>',
				'id'  => 'header-info',
				'type'  => 'info'  
			),
			
		array( 
				"id" => $sr_prefix."_portfoliotype",
				"hiding" => "carousel",	
				"type" => "hidinggroupend"
			)
			
			
 );
 
 
 

/*-----------------------------------------------------------------------------------*/
/*	Callback Show fields
/*-----------------------------------------------------------------------------------*/

function show_meta_subtitle() {  
 	global $sr_meta_subtitle, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_subtitle_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	show_fields($sr_meta_subtitle);  
}


function show_meta_pagesettings() {  
 	global $sr_meta_pagesettings, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_pagesettings_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	show_fields($sr_meta_pagesettings);  
}


function show_meta_headersettings() {  
 	global $sr_meta_headersettings, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_headersettings_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	show_fields($sr_meta_headersettings);  
}


function show_meta_medias() {  
 	global $sr_meta_medias, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_medias_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	show_fields($sr_meta_medias);  
}


function show_meta_audio() {  
 	global $sr_meta_audio, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_audio_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
	show_fields($sr_meta_audio);  
}




function show_meta_video() {  
 	global $sr_meta_video, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_video_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	show_fields($sr_meta_video);  
}


function show_meta_quote() {  
 	global $sr_meta_quote, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_quote_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    show_fields($sr_meta_quote);  
}


function show_meta_link() {  
 	global $sr_meta_link, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_link_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    show_fields($sr_meta_link);  
}


function show_meta_portfoliocategories() {  
 	global $sr_meta_portfoliocategories, $post;
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_portfoliocategories_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	show_fields($sr_meta_portfoliocategories);  
}


/*-----------------------------------------------------------------------------------*/
/*	Show fields
/*-----------------------------------------------------------------------------------*/
function show_fields($a) {
 	global $post; 
	
	// Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($a as $field) {  
		
		if ($field['type'] == 'accentborder') {
			
			echo '<div class="accentborder" style="border-color:'.$field['id'].';"></div>';
			
		} else if ($field['type'] == 'info') {	
			
			if (isset($field['id']) && ($post->post_type !== 'portfolio' && $post->post_type !== 'post' && $field['id'] == 'header-info')) {
			echo '<tr><th></th><td class="sr_meta_info">';
			if ($field['label'] !== 'main') {
				echo '<br>------------------------<br><b>'.$field['desc'].'</b><br>------------------------';
			} else {
				echo '<br><b>'.$field['desc'].'</b>';
			}
			echo '</td></tr>';
			}
			
		} else if ($field['type'] == 'hidinggroupstart') {
			$relatedArray = explode(' ',$field['hiding']);
			$hideClass = '';
			foreach ($relatedArray as $r) { $hideClass .= $field['id'].'_'.$r.' '; }
			echo '<tbody class="hidinggroup hide'.$field['id'].' '.$hideClass.'">';
		} else if ($field['type'] !== 'hidinggroupend' && $field['type'] !== 'nested-hidinggroupend') {
			
    	// get value of this field if it exists for this post  
    	$meta = get_post_meta($post->ID, $field['id'], true);  
		if ($meta == '' && (isset($field['default']) && $field['default'] !== '')) { $meta = $field['default']; }
    	// begin a table row with  
    	echo '<tr> 
    			<th><label for="'.$field['id'].'"><b>'.$field['label'].'</b></label><br /><span class="sr_description">'.$field['desc'].'</span></th> 
    			<td>';  
    			switch($field['type']) {  
                    					
					// text
    				case 'text':
						if ($post->post_type == 'portfolio' && $field['id'] == '_sr_subtitle') { 
							echo '<div class="sr_replacefield">The assigned category will be shown as "subtitle"</div>
							<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="" />'; }
						else if ($post->post_type == 'post' && $field['id'] == '_sr_subtitle') { 
							echo '<div class="sr_replacefield">The date will be shown as "subtitle"</div>
							<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="" />'; }
						else {  
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />';
						}
					break;
					
					// textarea
					case 'textarea':  
					    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>';  
					break;
					
					// tinymce
					case 'tinymce':  
					    wp_editor( $meta, $field['id'], array(
								'wpautop'       => true,
								'media_buttons' => false,
								'textarea_name' => $field['id'],
								'textarea_rows' => 5
							) );  
					break;
										
					// select
					case 'select':  
					    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
						$i = 0;
						foreach ($field['option'] as $var) {
							if ($meta == $var['value']) { $selected = 'selected="selected"'; } else { if ($meta == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
							echo '<option value="'.$var['value'].'" '.$selected.' /> '.$var['name'].'</option>';
						$i++;	
						}			  
						echo '</select>';   
					break;
					
					// select-hiding
					case 'select-hiding':  
					    echo '<div class="select-hiding">
								<select name="'.$field['id'].'" id="'.$field['id'].'">';
						$i = 0;
						foreach ($field['option'] as $var) {
							if ($meta == $var['value']) { $selected = 'selected="selected"'; } else { if ($meta == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
							echo '<option value="'.$var['value'].'" '.$selected.' /> '.$var['name'].'</option>';
						$i++;	
						}			  
						echo '</select></div>';   
					break;
					
					//color
					case "color":
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" class="sr-color-field" />';
					break;
					
					// image  
					case 'image':  
						echo '	<div class="single-image">
								<input class="upload_image" type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<input class="add_singleimage sr-button" type="button" value="Add Image" /><br />
								<span class="preview_image"><img class="'.$field['id'].'"  src="'.$meta.'" alt="" /></span>
						</div>';		
					break;
					
					// portfoliocategories
					case 'portfoliocategories':  
						$categories = get_terms( 'portfolio_category');
						 
					    echo '<select name="'.$field['id'].'[]" id="'.$field['id'].'" size="5" multiple>';
					    if ($meta[0] == 'all' || $meta[0] == '') { echo '<option value="" selected="selected">All</option>'; } 
						else { echo '<option value="">All</option>'; }
						$i = 0;
						foreach ($categories as $cat) {
							$selected = '';
							foreach ($meta as $m) { if (term_exists( $m , 'portfolio_category' ) && $m == $cat->slug) { $selected = 'selected="selected"'; } } 
							echo '<option value="'.$cat->slug.'" '.$selected.'>'.$cat->name.'</option>';
						$i++;	
						}			  
						echo '</select>';   
					break;
					
					//gallery_post
					case "gallery_post":
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
							  $gal = get_posts( array('post_type' => 'gallery') );
							  foreach ( $gal as $g ) {
								if ($g->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
								$option = '<option value="' . $g->ID . '" '.$active.'>';
								$option .= $g->post_title;
								$option .= '</option>';
								echo $option;
							  }
						echo '</select>';
					break;
					
					//slider_post
					case "slider_post":
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
							  $gal = get_posts( array('post_type' => 'slider') );
							  foreach ( $gal as $g ) {
								if ($g->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
								$option = '<option value="' . $g->ID . '" '.$active.'>';
								$option .= $g->post_title;
								$option .= '</option>';
								echo $option;
							  }
						echo '</select>';
					break;
					
					// gallery  
					case 'gallery':  
						echo '<div id="sortable'.$field['id'].'" class="sortable-medias">';
						echo '	<input class="add_image button" type="button" value="'.__("Add Images", 'sr_pond_theme').'" />
								<textarea name="'.$field['id'].'" style="display: none;" class="media-value">'.$meta.'</textarea>';
						echo '<ul id="sortable" class="media-elements">';		
					    if ($meta) {
							$meta = explode('|||', $meta);
					        foreach($meta as $row) {
								$object = explode('~~', $row);
								$type = $object[0];
								$val = $object[1];
								if ($type == 'image') {
									$image = wp_get_attachment_image_src($val, 'thumbnail'); $image = $image[0];
									echo '<li class="ui-state-default" title="image"><img src="'.$image.'" class="'.$val.'"><div class="delete"><span></span></div></li>';
								} else if ($type == 'video') {
									echo '<li class="ui-state-default" title="video"><div class="move">move</div><textarea name="videovalue">'.$val.'</textarea><div class="delete"><span></span></div></li>';
								}
					        }  
					    }  
					    echo '</ul>';
						echo '</div>';				
					break;
					
					// medias  
					case 'medias':
						echo '<div id="sortable'.$field['id'].'" class="sortable-medias">';
						echo '	<input class="add_image button" type="button" value="'.__("Add Images", 'sr_pond_theme').'" /> 
								<input class="add_video button" type="button" value="'.__("Add Video", 'sr_pond_theme').'" />
								<textarea name="'.$field['id'].'" style="display: none;" class="media-value">'.$meta.'</textarea>';
						echo '<ul id="sortable" class="media-elements">';		
					    if ($meta) {
							$meta = explode('|||', $meta);
					        foreach($meta as $row) {
								$object = explode('~~', $row);
								$type = $object[0];
								$val = $object[1];
								if ($type == 'image') {
									$image = wp_get_attachment_image_src($val, 'thumbnail'); $image = $image[0];
									echo '<li class="ui-state-default" title="image"><img src="'.$image.'" class="'.$val.'"><div class="delete"><span></span></div></li>';
								} else if ($type == 'video') {
									echo '<li class="ui-state-default" title="video"><div class="move">move</div><textarea name="videovalue">'.$val.'</textarea><div class="delete"><span></span></div></li>';
								}
					        }  
					    }  
					    echo '</ul>';
						echo '</div>';
					break;
					
					// sortable
    				case 'sortable':
						echo '<div id="sortable-elements">';
						
						// Create the selectbox + Count + Hiddenfield
						$hiddenfields = '';
						$elements = '';
						$count = 0;
						foreach ($field['options'] as $option) {
							$hiddenfields .= '<div class="'.$option['element'].'">
												<li class="ui-state-default" title="'.$option['element'].'">
												<div class="edit"><span></span></div><div class="move">'.$option['name'].' ()</div><div class="delete"><span></span></div>
												<div class="editcontent">';
							foreach ($option['fields'] as $f) {
								switch($f['type']) { 
									case 'text':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
											<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value=""></div>
										</div>';
									break;
									case 'textarea':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
											<div class="rowvalue"><textarea name="'.$f['id'].'" class="'.$f['id'].'"></textarea></div>
										</div>';
									break;
									case 'singleimage':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
											<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value="">
												<input type="button" name="add-singleimage" class="add_singleimage" value="'.__('Add Image', 'sr_pond_theme').'"></div>
										</div>';
									break;
									case 'select':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
										$hiddenfields .= '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">';	
										$y = 0;
										foreach ($f['options'] as $var) {
											$hiddenfields .= '<option value="'.$var['value'].'" /> '.$var['name'].'</div>';
										$y++;	
										}			  
										$hiddenfields .= '</select></div></div>';   
									break;
									case 'sliderselect':  
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
										$hiddenfields .= '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">
												<option value="no">'.__("Select Slider", 'sr_pond_theme').' ...</option>';
										  $pages = get_posts( array( 'post_type' => 'slider' ) ); 
										  foreach ( $pages as $page ) {
											$hiddenfields .= '<option value="' . $page->ID . '">'.$page->post_title.'</option>';
										  }
										$hiddenfields .= '</select></div></div>';   
									break;
								} # END switch $f
							}					
							$hiddenfields .= '</div>
												</li>
											</div>';
							
							$elements .= '<option value="'.$option['element'].'">'.$option['name'].'</option>';
							$count++;
							}
						if ($count > 1) { $elements = '<select name="element-sortable" class="element-sortable">'.$elements.'</select>'; }
						else { $elements = '<select name="element-sortable" class="element-sortable" style="display:none;">'.$elements.'</select>'; }
						// END	
						
						// display the saved values
						$values = explode('|||', $meta);
						echo '<ul id="sortable" class="visual-elements visual-slides">';
						foreach ($values as $v) {
							$item = explode('|', $v);
							
							foreach ($field['options'] as $option) {
								if ($option['element'] == $item[0]) {
									$value = explode('~~', $item[1]);
									
									echo '<li class="ui-state-default" title="'.$option['element'].'"><div class="edit"><span></span></div><div class="move">'.$option['name'].' ('.$value[0].')</div><div class="delete"><span></span></div>';
									echo '<div class="editcontent">';
									
									$i = 0;
									foreach ($option['fields'] as $f) {
										switch($f['type']) { 
											case 'text':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
													<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value="'.$value[$i].'"></div>
												</div>';
											break;
											case 'textarea':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
													<div class="rowvalue"><textarea name="'.$f['id'].'" class="'.$f['id'].'">'.$value[$i].'</textarea></div>
												</div>';
											break;
											case 'singleimage':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
													<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value="'.$value[$i].'">
														<input type="button" name="add-singleimage" class="add_singleimage" value="'.__('Add Image', 'sr_pond_theme').'"></div>
												</div>';
											break;
											case 'select':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
												echo '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">';	
												$y = 0;
												foreach ($f['options'] as $var) {
													if ($value[$i] == $var['value']) { $selected = 'selected="selected"'; 
													} else { if ($value[$i] == '' && $y == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
													echo '<option value="'.$var['value'].'" '.$selected.' /> '.$var['name'].'</div>';
												$y++;	
												}			  
												echo '</select></div></div>';   
											break;
											case 'sliderselect':  
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
												echo '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">
														<option value="no">'.__("Select Slider", 'sr_pond_theme').' ...</option>';
												  $pages = get_posts( array( 'post_type' => 'slider' ) ); 
												  foreach ( $pages as $page ) {
													if ($page->ID == $value[$i]) { $active = 'selected="selected"'; }  else { $active = ''; } 
													$option = '<option value="' . $page->ID . '" '.$active.'>';
													$option .= $page->post_title;
													$option .= '</option>';
													echo $option;
												  }
												echo '</select></div></div>';   
											break;
										} # END switch $f
										$i++;	
									}
									echo '</div></li>';
								}	
							}
						}
						echo '</ul>';
						// END
						
						echo '	<input type="button" name="add-element" class="add-element add-slide" value="'.__('Add Item', 'sr_pond_theme').'"/>
								'.$elements.'
								<textarea name="'.$field['id'].'" id="'.$field['id'].'" class="value-elements value-slides">'.$meta.'</textarea>';
						
						// HIDDEN ELEMENTS FOR JS
						echo '<div id="hiddenelements" style="display: none;">'.$hiddenfields.'</div>';
						
						echo '</div>';
					break;
					
					
					 
                 } //end switch  
    	 echo '</td></tr>';  
		} // END if info
		
		if ($field['type'] == 'hidinggroupend') {
			echo '</tbody>';
		}
		
	} // end foreach  
	echo '</table>'; // end table
}



/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/

function save_meta_subtitle($post_id) {  
    global $sr_meta_subtitle;  
  
    // verify nonce  
    if (!isset($_POST['meta_subtitle_nonce']) || !wp_verify_nonce($_POST['meta_subtitle_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
     foreach ($sr_meta_subtitle as $field) {  
        if ($field['type'] !== 'info') {
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new !== '' && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
		}  
    } // end foreach  
}  
add_action('save_post', 'save_meta_subtitle');


function save_meta_pagesettings($post_id) {  
    global $sr_meta_pagesettings;  
  
    // verify nonce  
    if (!isset($_POST['meta_pagesettings_nonce']) || !wp_verify_nonce($_POST['meta_pagesettings_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_pagesettings as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new !== '' && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_meta_pagesettings');


function save_meta_headersettings($post_id) {  
    global $sr_meta_headersettings;  
  
    // verify nonce  
    if (!isset($_POST['meta_headersettings_nonce']) || !wp_verify_nonce($_POST['meta_headersettings_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_headersettings as $field) {  
        if ($field['type'] !== 'info') {
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new !== '' && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
		} 
    } // end foreach  
}  
add_action('save_post', 'save_meta_headersettings');


function save_meta_medias($post_id) {  
    global $sr_meta_medias;  
  
    // verify nonce  
    if (!isset($_POST['meta_medias_nonce']) || !wp_verify_nonce($_POST['meta_medias_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_medias as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			}  
		}
    } // end foreach  
}  
add_action('save_post', 'save_meta_medias');


function save_meta_audio($post_id) {  
    global $sr_meta_audio;  
  
    // verify nonce  
    if (!isset($_POST['meta_audio_nonce']) || !wp_verify_nonce($_POST['meta_audio_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_audio as $field) {  
        if ($field['type'] !== 'info') {
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			}  
		}
		}  
    } // end foreach  
}  
add_action('save_post', 'save_meta_audio');





function save_meta_video($post_id) {  
    global $sr_meta_video;  
  
    // verify nonce  
    if (!isset($_POST['meta_video_nonce']) || !wp_verify_nonce($_POST['meta_video_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_video as $field) {
		if ($field['type'] !== 'info') {
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			}  
		}
		}
    } // end foreach  
}  
add_action('save_post', 'save_meta_video');



function save_meta_quote($post_id) {  
    global $sr_meta_quote;  
  
    // verify nonce  
    if (!isset($_POST['meta_quote_nonce']) || !wp_verify_nonce($_POST['meta_quote_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_quote as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new !== '' && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_meta_quote');



function save_meta_link($post_id) {  
    global $sr_meta_link;  
  
    // verify nonce  
    if (!isset($_POST['meta_link_nonce']) || !wp_verify_nonce($_POST['meta_link_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_link as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new !== '' && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_meta_link');



function save_meta_portfoliocategories($post_id) {  
    global $sr_meta_portfoliocategories;  
  
    // verify nonce  
    if (!isset($_POST['meta_portfoliocategories_nonce']) || !wp_verify_nonce($_POST['meta_portfoliocategories_nonce'], basename(__FILE__))) 
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
  
    // loop through fields and save the data  
    foreach ($sr_meta_portfoliocategories as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			} 
		}
    } // end foreach  
}  
add_action('save_post', 'save_meta_portfoliocategories');



/*-----------------------------------------------------------------------------------*/
/*	Register and load function javascript
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_admin_meta_js' ) ) {
    function sr_admin_meta_js($hook) {
		global $pagenow;

		wp_register_script('functions-script', get_template_directory_uri() . '/theme-admin/functions/js/functions_script.js', 'jquery');
		wp_enqueue_script('functions-script');
		
		if ( 
			(isset($_GET['post']) && (isset($_GET['action']) && $_GET['action'] == 'edit') && (get_post_type( $_GET['post'] )  == 'post' || get_post_type( $_GET['post'] )  == 'page') )
			|| ($pagenow == 'post-new.php' && (!isset($_GET['post_type']) || $_GET['post_type'] == 'page')) ) {
			wp_register_script('customfields-script', get_template_directory_uri() . '/theme-admin/functions/js/customfields_script.js', 'jquery');
			wp_enqueue_script('customfields-script');
		}
		
		wp_register_style('functions-style', get_template_directory_uri() . '/theme-admin/functions/css/functions.css');
		wp_enqueue_style('functions-style');
    }
    
    add_action('admin_enqueue_scripts','sr_admin_meta_js',10,1);
}


?>