<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access WordPress
require_once( $path_to_wp . '/wp-load.php' );



$sc = 'sc';
/*-----------------------------------------------------------------------------------*/
/*	Sections & Options
/*-----------------------------------------------------------------------------------*/

$options = array(
	
	array( "name" => __("Accordion", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "accordion",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => "Group",
				   "id" => $sc."_accordiongroup",
				   "type" => "groupstart"
				  ),
							
				array( "name" => __("Open", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_accordionopen",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" =>"No", 
									"value" => "no"),			 	
							array(	"name" =>"Yes", 
									"value" => "yes")
							)
					  ),
				
				array( "name" => __("Title", 'sr_pond_theme'),
				   	   "desc" => "",
					   "id" => $sc."_accordiontitle",
					   "type" => "text"
					  ),
				
				array( "name" => __("Text", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_accordiontext",
					   "type" => "textarea"
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_accordiongroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add Accordion", 'sr_pond_theme'),
				   "id" => $sc."_accordionduplicater",
				   "group" => $sc."_accordiongroup",
				   "type" => "grouduplicater"
				  ),

	array ( "name" => __("Accordion", 'sr_pond_theme'),
		   	"id" => "accordion",
		    "type" => "sectionend"),
	
	
	array( "name" => __("Buttons", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "buttons",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => __("Button Size", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_buttonsize",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => __("Mini", 'sr_pond_theme'), 
							  	"value" => "mini-button"),
						array(	"name" => __("Small", 'sr_pond_theme'), 
							  	"value" => "small-button"),		
						array(	"name" => __("Medium", 'sr_pond_theme'), 
							  	"value"=> "medium-button"),
						array(	"name" => __("Big", 'sr_pond_theme'), 
							  	"value"=> "big-button")
						)
				  ),
			
			array( "name" => __("Button Color", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_buttoncolor",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => __("Default (dark)", 'sr_pond_theme'), 
							  	"value" => "sr-button1"),
						array(	"name" => __("White (light button for dark backgrounds)", 'sr_pond_theme'), 
							  	"value" => "sr-button2"),
						)
				  ),
				  
			array( "name" => __("Button Text", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_buttontext",
				   "type" => "text"
				  ),	  					  
							  
			array( "name" => __("Go To", 'sr_pond_theme'),
				   "desc" => "What type should the button open?",
				   "id" => $sc."_buttongoto",
				   "type" => "selectbox-hiding",
				   "option" => array( 
						array(	"name" => __("URL", 'sr_pond_theme'), 
							  	"value" => "url"),
						array(	"name" => __("Scroll to section", 'sr_pond_theme'), 
							  	"value"=> "scrollto"),
						array(	"name" => __("Open Lightbox Video", 'sr_pond_theme'), 
							  	"value"=> "video")		
						)
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "url",
				   "type" => "hidinggroupstart"
				  ),
		
				array( "name" => __("Button URL", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_button_url_url",
					   "type" => "text"
					  ),	  
				  
				array( "name" => __("Button Target", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_button_url_target",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Same page", 'sr_pond_theme'), 
									"value" => "_self"),
							array(	"name" => __("New Page", 'sr_pond_theme'), 
									"value"=> "_blank")		
							)
					  ),		  
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "color",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "scrollto",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("Scroll to Section", 'sr_pond_theme'),
					   "desc" => "Make sure that this section is inlcuded in the same page.",
					   "id" => $sc."_button_scroll_section",
					   "type" => "scrolltosection"
					  ),		  
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "scrollto",
				   "type" => "hidinggroupend"
				  ),
				  
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "video",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("Video URL", 'sr_pond_theme'),
					   "desc" => "Make sure to enter the url which is provided on the embedded iframe code on 'src'<br><br>Example Vimeo: http://player.vimeo.com/video/VIMEOID<br><br>Example Youtube: http://www.youtube.com/embed/YOUTUBEID",
					   "id" => $sc."_button_video_video",
					   "type" => "text"
					  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "video",
				   "type" => "hidinggroupend"
				  ),
			
	
	array( "name" => __("Buttons", 'sr_pond_theme'),
		   	"id" => "buttons",
		    "type" => "sectionend"),
	
	
	
	
	
	array( "name" => __("Carousel", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "carousel",
		   "type" => "sectionstart"
		  ),
		  
		  
		  	array( "name" => __("Select images", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_carouselimages",
				   "type" => "medias"
				  ),
				  
			array( "name" => __("Items (per Page)", 'sr_pond_theme'),
				   "desc" => "This will apply on screens bigger than 900px.",
				   "id" => $sc."_carouselitems",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => "3", 
							  	"value" => "3"),
						array(	"name" => "4", 
							  	"value"=> "4"),
						array(	"name" => "5", 
							  	"value"=> "5"),
						array(	"name" => "6", 
							  	"value"=> "6")	
						)
				  ),
				  
			array( "name" => __("Bullets (Pagination)", 'sr_pond_theme'),
				   "desc" => "Do you want to display the bullets (pagination)",
				   "id" => $sc."_carouselpagination",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" =>"Yes", 
							  	"value" => "true"),
						array( 	"name"=>"No", 
							  	"value"=> "false")
						)
				  ),
				  
			array( "name" => __("Autoplay", 'sr_pond_theme'),
				   "desc" => "Do you want to enable the autoplay?",
				   "id" => $sc."_carouselautoplay",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" =>"Yes", 
							  	"value" => "6000"),
						array( 	"name"=>"No", 
							  	"value"=> "false")
						)
				  ),
		  
	array( "name" => __("Carousel", 'sr_pond_theme'),
		   "id" => "carousel",
		    "type" => "sectionend"),
	
	
	
	
	
	array( "name" => __("Columns", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "columns",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => __("Column Layout", 'sr_pond_theme'),
				   "desc" => __("Choose your layout for the columns you want include.", 'sr_pond_theme'),
				   "id" => $sc."_columnlayout",
				   "type" => "radiocustom",
				   "option" => array( 
						array(	"name" =>"Layout 2 x one_half", 
							  	"value" => "layout_onehalf-onehalf"),
						array( 	"name"=>"Layout one_third + two_third", 
							  	"value"=> "layout_onethird-twothird"),
						array( 	"name"=>"Layout two_third + one_third", 
							  	"value"=> "layout_twothird-onethird"),
						array(	"name" =>"Layout 3 x one_third", 
							  	"value"=> "layout_onethird-onethird-onethird"),
						array(	"name" =>"Layout one_half + 2 x one_fourth", 
							  	"value"=> "layout_onehalf-onefourth-onefourth"),
						array(	"name" =>"Layout 4 x one_fourth", 
							  	"value"=> "layout_onefourth-onefourth-onefourth-onefourth"),
						array(	"name" =>"Layout 5 x one_fifth", 
							  	"value"=> "layout_onefifth-onefifth-onefifth-onefifth-onefifth")
						)
				  ),
				  
			array( "name" => "Group",
				   "id" => $sc."_group_column_one",
				   "type" => "groupstart"
				  ),
	
				array( "name" => __("Column 1", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_column_one",
					   "type" => "textarea"
					  ),
					  
			array( "name" => "Group END",
				   "id" => $sc."_group_column_one",
				   "type" => "groupend"
				  ),
			
			array( "name" => "Group",
				   "id" => $sc."_group_column_two",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Column 2", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_column_two",
					   "type" => "textarea"
					  ),
			
			array( "name" => "Group END",
				   "id" => $sc."_group_column_two",
				   "type" => "groupend"
				  ),
				  
			array( "name" => "Group",
				   "id" => $sc."_group_column_three",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Column 3", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_column_three",
					   "type" => "textarea"
					  ),
					  
			array( "name" => "Group END",
				   "id" => $sc."_group_column_three",
				   "type" => "groupend"
				  ),
				  
			array( "name" => "Group",
				   "id" => $sc."_group_column_four",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Column 4", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_column_four",
					   "type" => "textarea"
					  ),
					  
			array( "name" => "Group END",
				   "id" => $sc."_group_column_four",
				   "type" => "groupend"
				  ),
				  
			array( "name" => "Group",
				   "id" => $sc."_group_column_five",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Column 5", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_column_five",
					   "type" => "textarea"
					  ),
				  
			array( "name" => "Group END",
				   "id" => $sc."_group_column_three",
				   "type" => "groupend"
				  ),
	
	array( "name" => __("Columns", 'sr_pond_theme'),
		   	"id" => "columns",
		    "type" => "sectionend"),
			
			
	
	
	
	array( "name" => __("Contact Form", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "contact",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("Recipient Email", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_contactsendto",
				   "type" => "text"
				  ),
			
			array( "name" => __("Subject", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_contactsubject",
				   "type" => "text"
				  ),
			
			array( "name" => __("Submit Button", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_contactsubmit",
				   "type" => "text"
				  ),
			
			array( "name" => "Group",
				   "id" => $sc."_contactgroup",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Fieltype", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_contacttype",
					   "type" => "selectbox",
					   "option" => array( 
						array(	"name" => __("Textfield", 'sr_pond_theme'), 
							  	"value" => "textfield"),
						array(	"name" => __("Textarea", 'sr_pond_theme'), 
							  	"value"=> "textarea")
						)
					  ),
				
				array( "name" => __("Fieldname / Label", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_contactname",
					   "type" => "text"
					  ),
				
				array( "name" => __("Slugname", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_contactslug",
					   "type" => "text"
					  ),
				
				array( "name" => __("Required field?", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_contactreq",
					   "type" => "selectbox",
					   "option" => array( 
						array(	"name" =>"Yes", 
							  	"value" => "yes"),
						array( 	"name"=>"No", 
							  	"value"=> "no")
						)
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_contactgroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add FIeld", 'sr_pond_theme'),
				   "id" => $sc."_contactduplicater",
				   "group" => $sc."_contactgroup",
				   "type" => "grouduplicater"
				  ),

	array( "name" => __("Contact Form", 'sr_pond_theme'),
		   	"id" => "contact",
		    "type" => "sectionend"),
			
			
	
	
	array( "name" => __("Counter", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "counter",
		   "type" => "sectionstart"
		  ),
		  
		  	array( "name" => __("Count From", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_countfrom",
				   "type" => "text"
				  ),
			
			array( "name" => __("Count To", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_countto",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Speed", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_countspeed",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Subline", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_countsub",
				   "type" => "text"
				  ),
		  
	array( "name" => __("Counter", 'sr_pond_theme'),
		   	"id" => "counter",
		    "type" => "sectionend"),
			
			
	
	
	array( "name" => __("Gallery / Slider", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "gallery",
		   "type" => "sectionstart"
		  ),
		  				  
			array( "name" => __("Select images", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_galleryimages",
				   "type" => "medias"
				  ),
		  				  
			array( "name" => __("Type", 'sr_pond_theme'),
				   "desc" => "Gallery OR Slider?",
				   "id" => $sc."_gallerytype",
				   "type" => "selectbox-hiding",
				   "option" => array( 
						array(	"name" => __("Gallery", 'sr_pond_theme'), 
							  	"value" => "gallery"),
						array(	"name" => __("Slider", 'sr_pond_theme'), 
							  	"value"=> "slider"),
						array(	"name" => __("Masonry", 'sr_pond_theme'), 
							  	"value"=> "masonry")	
						)
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_gallerytype",
				   "hiding" => "gallery",
				   "type" => "hidinggroupstart"
				  ),
				  
				  array( "name" => __("Columns", 'sr_pond_theme'),
						   "desc" => "",
						   "id" => $sc."_gallerycolumns",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => "2", 
										"value" => "2"),
								array(	"name" => "3", 
										"value" => "3"),	
								array(	"name" => "4", 
										"value" => "4"),
								array(	"name" => "5", 
										"value" => "5"),	
								array(	"name" => "6", 
										"value" => "6"),
								)
						  ),
						  
					array( "name" => __("Fullwidth", 'sr_pond_theme'),
						   "desc" => "Do you want to use the fullwidth?",
						   "id" => $sc."_galleryfullwidth",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => "Yes", 
										"value" => "yes"),
								array(	"name" => "No", 
										"value" => "no")
								)
						  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_gallerytype",
				   "hiding" => "gallery",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_gallerytype",
				   "hiding" => "slider",
				   "type" => "hidinggroupstart"
				  ),
				  
				  	array( "name" => __("Bullets", 'sr_pond_theme'),
						   "desc" => "What style for the bullets",
						   "id" => $sc."_sliderbullets",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => "Light / White", 
										"value" => "light"),
								array(	"name" => "Dark / Black", 
										"value" => "dark"),
								array(	"name" => "Hide Bullets", 
										"value" => "hide")
								)
						  ),
						  
					array( "name" => __("Arrows (left / right)", 'sr_pond_theme'),
						   "desc" => "Do youw ant to display the left / right arrows",
						   "id" => $sc."_sliderarrows",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => "Hide Arrows", 
										"value" => "hide"),
								array(	"name" => "Light / White", 
										"value" => "light"),
								array(	"name" => "Dark / Black", 
										"value" => "dark")
								)
						  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_gallerytype",
				   "hiding" => "slider",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_gallerytype",
				   "hiding" => "masonry",
				   "type" => "hidinggroupstart"
				  ),
				  
				  array( "name" => __("Tile Size", 'sr_pond_theme'),
						   "desc" => "Make sure that your images have the right width size.",
						   "id" => $sc."_masonrysize",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => "Small (300)", 
										"value" => "300"),
								array(	"name" => "Medium (420)", 
										"value" => "420"),	
								array(	"name" => "Big (600)", 
										"value" => "600"),
								array(	"name" => "Ultra (800)", 
										"value" => "800")
								)
						  ),
						  
					array( "name" => __("Fullwidth", 'sr_pond_theme'),
						   "desc" => "Do you want to use the fullwidth?",
						   "id" => $sc."_masonryfullwidth",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => "Yes", 
										"value" => "yes"),
								array(	"name" => "No", 
										"value" => "no")
								)
						  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_gallerytype",
				   "hiding" => "masonry",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => __("Lightbox?", 'sr_pond_theme'),
				   "desc" => "Do you want to activate the lightbox option",
				   "id" => $sc."_gallerylightbox",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => __("No", 'sr_pond_theme'), 
							  	"value" => "no"),
						array(	"name" => __("Yes", 'sr_pond_theme'), 
							  	"value"=> "yes")	
						)
				  ),
		
		  
	array( "name" => __("Gallery", 'sr_pond_theme'),
		   	"id" => "gallery",
		    "type" => "sectionend"),
			
			
	
	
	array( "name" => __("Google Map", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "map",
		   "type" => "sectionstart"
		  ),
						
			array( "name" => __("Latitude & Longitude", 'sr_pond_theme'),
				   "desc" => __("Enter the google map latitude & longitude using this tool:<br>http://itouchmap.com/latlong.html", 'sr_pond_theme'),
				   "id" => $sc."_maplatlong",
				   "type" => "text"
				  ),
			
			array( "name" => __("Infotext", 'sr_pond_theme'),
				   "desc" => __("This Text will be displayed on the Google Map", 'sr_pond_theme'),
				   "id" => $sc."_maptext",
				   "type" => "textarea"
				  ),
			
			array( "name" => __("Pin Icon", 'sr_pond_theme'),
				   "desc" => __("choose a custom pin icon", 'sr_pond_theme'),
				   "id" => $sc."_mapicon",
				   "type" => "image"
				  ),
			
			array( "name" => __("Height", 'sr_pond_theme'),
				   "desc" => __("Default is 400.  Width is 100% of parent container.", 'sr_pond_theme'),
				   "id" => $sc."_mapheight",
				   "type" => "text"
				  ),
				  
			array(  "name" => __("Map Color Style", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_mapcolor",
				   "type" => "selectbox",
				  	"option" => array(			 	
						array(	"name" =>__("Default", 'sr_pond_theme'), 
								"value" => "default"),			 	
						array(	"name" => __("Greyscale", 'sr_pond_theme'), 
								"value"=> "greyscale")
						)
				  	),
					
			array(  "name" => __("Fullwidth", 'sr_pond_theme'),
				   "desc" => "Do youw ant to use the full screen width for the map?",
				   "id" => $sc."_mapwidth",
				   "type" => "selectbox",
				  	"option" => array(			 	
						array(	"name" =>__("No", 'sr_pond_theme'), 
								"value" => "no"),			 	
						array(	"name" => __("Yes", 'sr_pond_theme'), 
								"value"=> "yes")
						)
				  	),
			
			/*array( "name" => __("Map ID", 'sr_pond_theme'),
				   "desc" => __("This is important if you want to use more maps in the same page.", 'sr_pond_theme'),
				   "id" => $sc."_mapid",
				   "type" => "text"
				  ),*/
	
	array( "name" => __("Google map", 'sr_pond_theme'),
		   "id" => "map",
		    "type" => "sectionend"),
	
	
	
	
	array( "name" => __("Divider / Seperator", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "devider",
		   "type" => "sectionstart"
		  ),
		  
		  	array(  "name" => __("Size", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_devidersize",
				   "type" => "selectbox",
				  	"option" => array(			 	
						array(	"name" =>"Small", 
								"value" => "separator-small"),
						array(	"name" =>"Big (with centered circle)", 
								"value" => "separator")
						)
				  	),
					
			array(  "name" => __("Align", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_devideralign",
				   "type" => "selectbox",
				  	"option" => array(			 	
						array(	"name" =>"Left", 
								"value" => "left"),
						array(	"name" =>"Center", 
								"value" => "center"),
						array(	"name" =>"Right", 
								"value" => "right")
						)
				  	),
		  
	array( "name" => __("Divider", 'sr_pond_theme'),
		   "id" => "devider",
		   "type" => "sectionend"),
	
	
	
	array( "name" => __("Icon", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "icon",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("Size", 'sr_pond_theme'),
				   "desc" => '',
				   "id" => $sc."_iconsize",
				   "type" => "selectbox",
				   "option" => array(			 	
						array(	"name" =>"Normal", 
								"value" => "normal"),
						array(	"name" =>"2x", 
								"value" => "2x"),
						array(	"name" =>"3x", 
								"value" => "3x"),
						array(	"name" =>"4x", 
								"value" => "4x"),
						array(	"name" =>"5x", 
								"value" => "5x")
						)
				  ),
			
			array( 	"name" => __("Color", 'sr_pond_theme'),
					"desc" => "",
					"id" => $sc."_iconcolor",
					"type" => "color"
				  	),
			
			array( "name" => __("Choose Icon", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_iconfont",
				   "type" => "icons"
				  ),
	
	array( "name" => __("Icon", 'sr_pond_theme'),
		   "id" => "icon",
		    "type" => "sectionend"),
			
		
			
	
	array( "name" => __("Quote Slider", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "quote",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => "Group",
				   "id" => $sc."_quotegroup",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Quote Name", 'sr_pond_theme'),
				   	   "desc" => "",
					   "id" => $sc."_quotename",
					   "type" => "text"
					  ),
					  
				array( "name" => __("Name Subline", 'sr_pond_theme'),
				   	   "desc" => "",
					   "id" => $sc."_quotesub",
					   "type" => "text"
					  ),
				
				array( "name" => __("Quote Text", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_quotetext",
					   "type" => "textarea"
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_testimonialgroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add Testimonial", 'sr_pond_theme'),
				   "id" => $sc."_quoteduplicater",
				   "group" => $sc."_quotegroup",
				   "type" => "grouduplicater"
				  ),

	array ( "name" => __("Quote Slider", 'sr_pond_theme'),
		   	"id" => "quote",
		    "type" => "sectionend"),
	
		
	
	
	array( "name" => __("Selfhosted Audio", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "selhostedaudio",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("MP3 File URL", 'sr_pond_theme'),
				   "desc" => __("The url to the mp3 file", 'sr_pond_theme'),
				   "id" => $sc."_selhostedaudiomp3",
				   "type" => "text"
				  ),
			
			array( "name" => __("OGA/OGG File URL", 'sr_pond_theme'),
				   "desc" => __("The url to the oga/ogg file", 'sr_pond_theme'),
				   "id" => $sc."_selhostedaudiooga",
				   "type" => "text"
				  ),
			
			array( "name" => __("Image (Optional)", 'sr_pond_theme'),
				   "desc" => __("Enter the url of one of your media image", 'sr_pond_theme'),
				   "id" => $sc."_selhostedaudiopic",
				   "type" => "text"
				  ),
			
			array( "name" => __("ID", 'sr_pond_theme'),
				   "desc" => __("This is important if you want to add multiple audios/videos. Use a unique value.", 'sr_pond_theme'),
				   "id" => $sc."_selhostedaudioid",
				   "type" => "text"
				  ),
	
	array( "name" => __("Selhosted Audio", 'sr_pond_theme'),
		   "id" => "selhostedaudio",
		   "type" => "sectionend"),
	
	
	
	array( "name" => __("Selfhosted Video", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "selhostedvideo",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("M4V File URL", 'sr_pond_theme'),
				   "desc" => __("The url to the m4v file", 'sr_pond_theme'),
				   "id" => $sc."_selhostedvideom4v",
				   "type" => "text"
				  ),
			
			array( "name" => __("OGA/OGG File URL", 'sr_pond_theme'),
				   "desc" => __("The url to the oga/ogg file", 'sr_pond_theme'),
				   "id" => $sc."_selhostedvideooga",
				   "type" => "text"
				  ),
			
			array( "name" => __("WEBMV File URL", 'sr_pond_theme'),
				   "desc" => __("The url to the webmv file", 'sr_pond_theme'),
				   "id" => $sc."_selhostedvideowebmv",
				   "type" => "text"
				  ),
			
			array( "name" => __("Image (Optional)", 'sr_pond_theme'),
				   "desc" => __("Choose an image", 'sr_pond_theme'),
				   "id" => $sc."_selhostedvideopic",
				   "type" => "image"
				  ),
			
			array( "name" => __("ID", 'sr_pond_theme'),
				   "desc" => __("This is important if you want to add multiple audios/videos. Use a unique value.", 'sr_pond_theme'),
				   "id" => $sc."_selhostedvideoid",
				   "type" => "text"
				  ),
	
	array( "name" => __("Selhosted Video", 'sr_pond_theme'),
		   "id" => "selhostedvideo",
		   "type" => "sectionend"),
	
	
	
	array( "name" => __("Skills", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "skills",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => "Group",
				   "id" => $sc."_skillgroup",
				   "type" => "groupstart"
				  ),
				
				array( "name" => __("Percent Amount", 'sr_pond_theme'),
				   	   "desc" => "",
					   "id" => $sc."_skillpercent",
					   "type" => "text"
					  ),
				
				array( "name" => __("Name", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_skillname",
					   "type" => "text"
					  ),
				
				array( "name" => __("Color", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_skillcolor",
					   "type" => "color"
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_skillgroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add Skill", 'sr_pond_theme'),
				   "id" => $sc."_skillduplicater",
				   "group" => $sc."_skillgroup",
				   "type" => "grouduplicater"
				  ),

	array ( "name" => __("Skills", 'sr_pond_theme'),
		   	"id" => "skills",
		    "type" => "sectionend"),
	
	
	array( "name" => __("Spacer / Margin", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "spacer",
		   "type" => "sectionstart"
		  ),
	
		array( "name" => __("Size", 'sr_pond_theme'),
				   "desc" => '',
				   "id" => $sc."_spacersize",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" =>"Mini (15px)", 
								"value" => "mini"),
						array(	"name" =>"Small (40px)", 
								"value" => "small"),	
						array(	"name" =>"Medium (60px)", 
								"value" => "medium"),
						array(	"name" =>"Big (120px)", 
								"value" => "big")
						)
				  ),
	
	array( "name" => __("Spacer", 'sr_pond_theme'),
		   "id" => "spacer",
		   "type" => "sectionend"
		  ),	
	
	
	array( "name" => __("Tabs", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "tab",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => "Group",
				   "id" => $sc."_tabgroup",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Tab Name", 'sr_pond_theme'),
				   	   "desc" => "",
					   "id" => $sc."_tabname",
					   "type" => "text"
					  ),
				
				array( "name" => __("Tab Text", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_tabtext",
					   "type" => "textarea"
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_tabgroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add Tab", 'sr_pond_theme'),
				   "id" => $sc."_tabduplicater",
				   "group" => $sc."_tabgroup",
				   "type" => "grouduplicater"
				  ),

	array ( "name" => __("Tabs", 'sr_pond_theme'),
		   	"id" => "tab",
		    "type" => "sectionend"),
			
	
	
	array( "name" => __("Team Member", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "team",
		   "type" => "sectionstart"
		  ),
		  
		  	array( "name" => __("Layout", 'sr_pond_theme'),
				   "desc" => "What type should the button open?",
				   "id" => $sc."_teamtype",
				   "type" => "selectbox-hiding",
				   "option" => array( 
						array(	"name" => __("Column Layout", 'sr_pond_theme'), 
							  	"value" => "column"),
						array(	"name" => __("List (one below the other)", 'sr_pond_theme'), 
							  	"value"=> "list")		
						)
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_teamtype",
				   "hiding" => "column",
				   "type" => "hidinggroupstart"
				  ),
			
				array( "name" => __("Team Layout", 'sr_pond_theme'),
					   "desc" => __("Choose a layout", 'sr_pond_theme'),
					   "id" => $sc."_teamlayout",
					   "type" => "radiocustom",
					   "option" => array( 
							array(	"name" =>"Layout 2 x one_half", 
									"value" => "layout_onehalf-onehalf"),
							array(	"name" =>"Layout 3 x one_third", 
									"value"=> "layout_onethird-onethird-onethird"),
							array(	"name" =>"Layout 4 x one_fourth", 
									"value"=> "layout_onefourth-onefourth-onefourth-onefourth")
							)
					  ),
			
			array( "name" => "Hidinggroup",
				   "id" => $sc."_teamtype",
				   "hiding" => "colum",
				   "type" => "hidinggroupend"
				  ),
				  
			
			array( "name" => "Hidinggroup",
				   "id" => $sc."_teamtype",
				   "hiding" => "list",
				   "type" => "hidinggroupstart"
				  ),
			
				array( "name" => __("Number of members", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamcount",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("1", 'sr_pond_theme'), 
									"value" => "1"),
							array(	"name" => __("2", 'sr_pond_theme'), 
									"value"=> "2"),
							array(	"name" => __("3", 'sr_pond_theme'), 
									"value"=> "3"),
							array(	"name" => __("4", 'sr_pond_theme'), 
									"value"=> "4")		
							)
					  ),
			
			array( "name" => "Hidinggroup",
				   "id" => $sc."_teamtype",
				   "hiding" => "list",
				   "type" => "hidinggroupend"
				  ),
	
			array( "name" => "Group",
				   "id" => $sc."_teamgroup_one",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Image", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamimage_one",
					   "type" => "image"
					  ),
				
				array( "name" => __("Name", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamname_one",
					   "type" => "text"
					  ),
				
				array( "name" => __("Title", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtitle_one",
					   "type" => "text"
					  ),
				
				array( "name" => __("Text", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtext_one",
					   "type" => "textarea"
					  ),
				
				array( "name" => __("Facebook Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamfacebook_one",
					   "type" => "text"
					  ),
				
				array( "name" => __("Twitter Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtwitter_one",
					   "type" => "text"
					  ),
				
				array( "name" => __("Google Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamgoogle_one",
					   "type" => "text"
					  ),
				
				array( "name" => __("LinkedIn Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamlinkedin_one",
					   "type" => "text"
					  ),
					  
				array( "name" => __("Website Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamwebsite_one",
					   "type" => "text"
					  ),
				
				array( "name" => __("Mail Adress", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teammail_one",
					   "type" => "text"
					  ),
				
			array( "name" => "Groupend",
				   "id" => $sc."_teamgroup_one",
				   "type" => "groupend"
				  ),
			
			array( "name" => "Group",
				   "id" => $sc."_teamgroup_two",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Image", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamimage_two",
					   "type" => "image"
					  ),
				
				array( "name" => __("Name", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamname_two",
					   "type" => "text"
					  ),
				
				array( "name" => __("Title", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtitle_two",
					   "type" => "text"
					  ),
				
				array( "name" => __("Text", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtext_two",
					   "type" => "textarea"
					  ),
				
				array( "name" => __("Facebook Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamfacebook_two",
					   "type" => "text"
					  ),
				
				array( "name" => __("Twitter Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtwitter_two",
					   "type" => "text"
					  ),
				
				array( "name" => __("Google Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamgoogle_two",
					   "type" => "text"
					  ),
				
				array( "name" => __("LinkedIn Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamlinkedin_two",
					   "type" => "text"
					  ),
					  
				array( "name" => __("Website Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamwebsite_two",
					   "type" => "text"
					  ),
				
				array( "name" => __("Mail Adress", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teammail_two",
					   "type" => "text"
					  ),
				
			array( "name" => "Groupend",
				   "id" => $sc."_teamgroup_two",
				   "type" => "groupend"
				  ),
			
			array( "name" => "Group",
				   "id" => $sc."_teamgroup_three",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Image", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamimage_three",
					   "type" => "image"
					  ),
			
				array( "name" => __("Name", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamname_three",
					   "type" => "text"
					  ),
				
				array( "name" => __("Title", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtitle_three",
					   "type" => "text"
					  ),
				
				array( "name" => __("Text", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtext_three",
					   "type" => "textarea"
					  ),
				
				array( "name" => __("Facebook Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamfacebook_three",
					   "type" => "text"
					  ),
				
				array( "name" => __("Twitter Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtwitter_three",
					   "type" => "text"
					  ),
				
				array( "name" => __("Google Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamgoogle_three",
					   "type" => "text"
					  ),
				
				array( "name" => __("LinkedIn Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamlinkedin_three",
					   "type" => "text"
					  ),
					  
				array( "name" => __("Website Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamwebsite_three",
					   "type" => "text"
					  ),
				
				array( "name" => __("Mail Adress", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teammail_three",
					   "type" => "text"
					  ),
				
			array( "name" => "Groupend",
				   "id" => $sc."_teamgroup_three",
				   "type" => "groupend"
				  ),
			
			array( "name" => "Group",
				   "id" => $sc."_teamgroup_four",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Image", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamimage_four",
					   "type" => "image"
					  ),
			
				array( "name" => __("Name", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamname_four",
					   "type" => "text"
					  ),
				
				array( "name" => __("Title", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtitle_four",
					   "type" => "text"
					  ),
				
				array( "name" => __("Text", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtext_four",
					   "type" => "textarea"
					  ),
				
				array( "name" => __("Facebook Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamfacebook_three",
					   "type" => "text"
					  ),
				
				array( "name" => __("Twitter Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamtwitter_four",
					   "type" => "text"
					  ),
				
				array( "name" => __("Google Profile", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamgoogle_four",
					   "type" => "text"
					  ),
				
				array( "name" => __("LinkedIn Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamlinkedin_four",
					   "type" => "text"
					  ),
					  
				array( "name" => __("Website Link", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teamwebsite_four",
					   "type" => "text"
					  ),
				
				array( "name" => __("Mail Adress", 'sr_pond_theme'),
					   "desc" => "",
					   "id" => $sc."_teammail_four",
					   "type" => "text"
					  ),
				
			array( "name" => "Groupend",
				   "id" => $sc."_teamgroup_four",
				   "type" => "groupend"
				  ),
			
			
	array( "name" => __("Team Member", 'sr_pond_theme'),
		   "id" => "team",
		    "type" => "sectionend"),
			
			
			
			
	array( "name" => __("Title", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "sectiontitle",
		   "type" => "sectionstart"
		  ),
		  
		  
		  	array( "name" => __("Type", 'sr_pond_theme'),
					"desc" => "",
					"id" => $sc."_sectiontitle_type",
					"type" => "selectbox",
					"option" => array(			 	
						array(	"name" =>"Default", "value" => ""),
						array(	"name" =>"Subtitle", "value" => "alttitle")
						)
				  ),	 
			
		  	array( "name" => __("Title Name", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_sectiontitle_main",
				   "type" => "text"
				  ),
				  				  
		  	array( "name" => __("Size", 'sr_pond_theme'),
					"desc" => "",
					"id" => $sc."_sectiontitle_mainsize",
					"type" => "selectbox",
					"option" => array(			 	
						array(	"name" =>"h1", "value" => "h1"),
						array(	"name" =>"h2", "value" => "h2"),
						array(	"name" =>"h3", "value" => "h3"),
						array(	"name" =>"h4", "value" => "h4"),
						array(	"name" =>"h5", "value" => "h5"),
						array(	"name" =>"h6", "value" => "h6")
						)
				  ),
				  				  
			array( "name" => __("Style", 'sr_pond_theme'),
					"desc" => "",
					"id" => $sc."_sectiontitle_style",
					"type" => "selectbox",
					"option" => array(			 	
						array(	"name" =>"Default", "value" => ""),
						array(	"name" =>"Minimal", "value" => "title-minimal"),
						array(	"name" =>"Ultra Minimal", "value" => "title-ultraminimal")
						)
				  ),	  
				  				  
			array( "name" => __("Big / Transparent Letter", 'sr_pond_theme'),
				   "desc" => "Do you want to display a big transparent letter behind the main title?",
				   "id" => $sc."_sectiontitle_bigletter",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Title Alignment", 'sr_pond_theme'),
					"desc" => "",
					"id" => $sc."_sectiontitle_alignment",
					"type" => "selectbox",
					"option" => array(			 	
						array(	"name" =>"Center", "value" => "center"),
						array(	"name" =>"Left", "value" => "left"),
						array(	"name" =>"Right", "value" => "right")
						)
				  ),	
		  
	array( "name" => __("Title", 'sr_pond_theme'),
		   "id" => "sectiontitle",
		   "type" => "sectionend"),
		   		
	
		
	
	array( "name" => __("Toggle", 'sr_pond_theme'),
		   "desc" => "",
		   "id" => "toggle",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("Toggle Size", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_togglesize",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" =>"Small", 
							  	"value" => "small"),
						array(	"name" =>"Big", 
							  	"value" => "big")
						)
				  ),
			
			array( "name" => __("Toggle Open", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_toggleopen",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" =>"No", 
							  	"value" => "no"),			 	
						array(	"name" =>"Yes", 
							  	"value" => "yes")
						)
				  ),
	
			array( "name" => __("Toggle Title", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_toggletitle",
				   "type" => "text"
				  ),
			
			array( "name" => __("Toggle Text", 'sr_pond_theme'),
				   "desc" => "",
				   "id" => $sc."_toggletext",
				   "type" => "textarea"
				  ),
						
	
	array( "name" => __("Toggle", 'sr_pond_theme'),
		   "id" => "toggle",
		    "type" => "sectionend"),
			
			
			
	
	array( "name" => __("Wrapper Small", 'sr_pond_theme'),
		   "desc" => "This will add a small wrapper element which will reduce the default content width (1080px) to a smaller content width (780px).<br><br><b>Example:</b><br><i>[wrapper_small]<br>##YOURCONTENT##<br>[/wrapper-small]</i>",
		   "id" => "wrapper",
		   "type" => "sectionstart"
		  ),
		  
	
	array( "name" => __("Wrapper", 'sr_pond_theme'),
		   "id" => "wrapper",
		    "type" => "sectionend")
	
	
);
?>
<!DOCTYPE html>
<html>
<head>
<title>Shortcodes</title>

<!--style-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/theme-admin/'; ?>shortcodes/css/shortcodes-style.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/files/'; ?>css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/files/'; ?>css/pe-icon-7-stroke.css" />

<!--scripts-->
<script src="<?php echo get_template_directory_uri() . '/theme-admin/'; ?>shortcodes/js/shortcode-functions.js"></script>


</head>

<body>	

<div id="shortcodes">

	<div class="sc_option_panel">
    	<ul class="sc_list">
		<?php 
        
        foreach ($options as $opt) {
            if ($opt['type'] == 'sectionstart') {
                echo '<li class="'.$opt['id'].'"><a href="'.$opt['id'].'"><b>'.$opt['name'].'</b></a></li>';	 
            }
        }
        
        ?>
		</ul>
	</div> <!-- END .sc_option_panel -->

	
    <div class="sc_option">
    	<?php 
        
        foreach ($options as $option) {
            switch ( $option['type'] ) {
		
			//sectionstart
			case "sectionstart":
				echo '	<div id="'.$option['id'].'" class="sc-option-content">
						<div class="sc-option-title"><b>'.$option['name'].'</b><br /><span><i>'.$option['desc'].'</i></span></div>
						<form id="form_'.$option['id'].'" action="" method="get" accept-charset="utf-8">
						';
			break;
			
			//sectionend
			case "sectionend":
				echo '	<a href="" id="insert_'.$option['id'].'" class="submit">'.__("Insert", 'sr_pond_theme').'</a> 
						</form>
						</div>';
			break;
			
			//groupstart
			case "groupstart":
				echo '	<div id="'.$option['id'].'" class="group">';
			break;
			
			//groupend
			case "groupend":
				echo '	</div>';
			break;
			
			//groupstart
			case "hidinggroupstart":
				echo '	<div id="'.$option['id'].'" class="group hidinggroup hide'.$option['id'].' '.$option['id'].'_'.$option['hiding'].'">';
			break;
			
			//groupend
			case "hidinggroupend":
				echo '	</div>';
			break;
			
			//grouduplicater
			case "grouduplicater";
				echo '	<a href="'.$option['group'].'" id="'.$option['id'].'" class="groupduplicater">&raquo; '.$option['name'].'</a><br>';
			break;
			
			//infotext
			case "infotext":
				echo '<div id="'.$option['id'].'" class="sc-option sc-infotext clear">';
					echo '<p>'.$option['desc'].'</p>';
				echo '</div>';
			break;
			
			//text
			case "text":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="" size="30" />
							</div>';
				echo '</div>';
			break;
			
			// selectbox  
			case 'selectbox':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<select name="'.$option['id'].'" id="'.$option['id'].'">';
								$i = 0;
								foreach ($option['option'] as $var) {
									echo '<option value="'.$var['value'].'"> '.$var['name'].'</option>';
								$i++;	
								}			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			
			// selectbox-hiding 
			case 'selectbox-hiding':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value select-hiding">
								<select name="'.$option['id'].'" id="'.$option['id'].'">';
								$i = 0;
								foreach ($option['option'] as $var) {
									echo '<option value="'.$var['value'].'"> '.$var['name'].'</option>';
								$i++;	
								}			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			//textarea
			case "textarea":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<textarea name="'.$option['id'].'" id="'.$option['id'].'"></textarea>
							</div>';
				echo '</div>';
			break;
			
			//color
			case "color":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="" class="sr-color-field" />
							</div>';
				echo '</div>';
			break;
			
			//radiocustom
			case "radiocustom":
				echo '<div id="'.$option['id'].'" class="sc-option clear radiocustom">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">';
					
					$i = 0;
					foreach ($option['option'] as $var) {
						echo '<input type="radio" name="'.$option['id'].'" id="'.$var['value'].'" value="'.$var['value'].'" />
						<a class="customradio '.$var['value'].'" href="'.$var['value'].'"><span>'.$var['name'].'</span></a>';
					$i++;	
					}
	
					echo '	</div>';		
				echo '</div>';
			break;
			
			//image
			case "image":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value single-image">
								<span class="preview-image"><img src="test" /></span>
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="" style="display:none;" />
								<a href="#" class="upload-sc-image">'.__('Add Image', 'sr_pond_theme').'</a>
								<a href="#" class="remove-sc-image" style="display: none;">' . __('Remove Image', 'sr_pond_theme') . '</a>
							</div>';
				echo '</div>';
			break;
			
			// selectbox  
			case 'scrolltosection':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<select name="'.$option['id'].'" id="'.$option['id'].'">';
								$pages = get_pages();
								  foreach ( $pages as $p ) {
									if ($p->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
									$option = '<option value="' . $p->post_name . '" '.$active.'>';
									$option .= $p->post_title;
									$option .= '</option>';
									echo $option;
								  }			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			
			
			// medias  
			case 'medias':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					
					echo '<div id="sortable'.$option['id'].'" class="sortable-medias-shortcode">';
					echo '	<input class="add_image button" type="button" value="'.__("Add Images", 'sr_pond_theme').'" />
							<textarea name="'.$option['id'].'" id="'.$option['id'].'" style="display:none;" class="media-value"></textarea>';
					
					echo '<ul id="sortable" class="media-elements">';
					echo '</ul>';
					echo '</div>';
							
					
				echo '</div>';
			break;
			
			
			
			
			//icons
			case "icons":
			
				$fonawesomeicons = array('fa-glass','fa-music','fa-search','fa-envelope-o','fa-heart','fa-star','fa-star-o','fa-user','fa-film','fa-th-large','fa-th','fa-th-list','fa-check','fa-times','fa-search-plus','fa-search-minus','fa-power-off','fa-signal','fa-cog','fa-trash-o','fa-home','fa-file-o','fa-clock-o','fa-road','fa-download','fa-arrow-circle-o-down','fa-arrow-circle-o-up','fa-inbox','fa-play-circle-o','fa-repeat','fa-refresh','fa-list-alt','fa-lock','fa-flag','fa-headphones','fa-volume-off','fa-volume-down','fa-volume-up','fa-qrcode','fa-barcode','fa-tag','fa-tags','fa-book','fa-bookmark','fa-print','fa-camera','fa-font','fa-bold','fa-italic','fa-text-height','fa-text-width','fa-align-left','fa-align-center','fa-align-right','fa-align-justify','fa-list','fa-outdent','fa-indent','fa-video-camera','fa-picture-o','fa-pencil','fa-map-marker','fa-adjust','fa-tint','fa-pencil-square-o','fa-share-square-o','fa-check-square-o','fa-arrows','fa-step-backward','fa-fast-backward','fa-backward','fa-play','fa-pause','fa-stop','fa-forward','fa-fast-forward','fa-step-forward','fa-eject','fa-chevron-left','fa-chevron-right','fa-plus-circle','fa-minus-circle','fa-times-circle','fa-check-circle','fa-question-circle','fa-info-circle','fa-crosshairs','fa-times-circle-o','fa-check-circle-o','fa-ban','fa-arrow-left','fa-arrow-right','fa-arrow-up','fa-arrow-down','fa-share','fa-expand','fa-compress','fa-plus','fa-minus','fa-asterisk','fa-exclamation-circle','fa-gift','fa-leaf','fa-fire','fa-eye','fa-eye-slash','fa-exclamation-triangle','fa-plane','fa-calendar','fa-random','fa-comment','fa-magnet','fa-chevron-up','fa-chevron-down','fa-retweet','fa-shopping-cart','fa-folder','fa-folder-open','fa-arrows-v','fa-arrows-h','fa-bar-chart-o','fa-twitter-square','fa-facebook-square','fa-camera-retro','fa-key','fa-cogs','fa-comments','fa-thumbs-o-up','fa-thumbs-o-down','fa-star-half','fa-heart-o','fa-sign-out','fa-linkedin-square','fa-thumb-tack','fa-external-link','fa-sign-in','fa-trophy','fa-github-square','fa-upload','fa-lemon-o','fa-phone','fa-square-o','fa-bookmark-o','fa-phone-square','fa-twitter','fa-facebook','fa-github','fa-unlock','fa-credit-card','fa-rss','fa-hdd-o','fa-bullhorn','fa-bell','fa-certificate','fa-hand-o-right','fa-hand-o-left','fa-hand-o-up','fa-hand-o-down','fa-arrow-circle-left','fa-arrow-circle-right','fa-arrow-circle-up','fa-arrow-circle-down','fa-globe','fa-wrench','fa-tasks','fa-filter','fa-briefcase','fa-arrows-alt','fa-users','fa-link','fa-cloud','fa-flask','fa-scissors','fa-files-o','fa-paperclip','fa-floppy-o','fa-square','fa-bars','fa-list-ul','fa-list-ol','fa-strikethrough','fa-underline','fa-table','fa-magic','fa-truck','fa-pinterest','fa-pinterest-square','fa-google-plus-square','fa-google-plus','fa-money','fa-caret-down','fa-caret-up','fa-caret-left','fa-caret-right','fa-columns','fa-sort','fa-sort-asc','fa-sort-desc','fa-envelope','fa-linkedin','fa-undo','fa-gavel','fa-tachometer','fa-comment-o','fa-comments-o','fa-bolt','fa-sitemap','fa-umbrella','fa-clipboard','fa-lightbulb-o','fa-exchange','fa-cloud-download','fa-cloud-upload','fa-user-md','fa-stethoscope','fa-suitcase','fa-bell-o','fa-coffee','fa-cutlery','fa-file-text-o','fa-building-o','fa-hospital-o','fa-ambulance','fa-medkit','fa-fighter-jet','fa-beer','fa-h-square','fa-plus-square','fa-angle-double-left','fa-angle-double-right','fa-angle-double-up','fa-angle-double-down','fa-angle-left','fa-angle-right','fa-angle-up','fa-angle-down','fa-desktop','fa-laptop','fa-tablet','fa-mobile','fa-circle-o','fa-quote-left','fa-quote-right','fa-spinner','fa-circle','fa-reply','fa-github-alt','fa-folder-o','fa-folder-open-o','fa-smile-o','fa-frown-o','fa-meh-o','fa-gamepad','fa-keyboard-o','fa-flag-o','fa-flag-checkered','fa-terminal','fa-code','fa-reply-all','fa-mail-reply-all','fa-star-half-o','fa-location-arrow','fa-crop','fa-code-fork','fa-chain-broken','fa-question','fa-info','fa-exclamation','fa-superscript','fa-subscript','fa-eraser','fa-puzzle-piece','fa-microphone','fa-microphone-slash','fa-shield','fa-calendar-o','fa-fire-extinguisher','fa-rocket','fa-maxcdn','fa-chevron-circle-left','fa-chevron-circle-right','fa-chevron-circle-up','fa-chevron-circle-down','fa-html5','fa-css3','fa-anchor','fa-unlock-alt','fa-bullseye','fa-ellipsis-h','fa-ellipsis-v','fa-rss-square','fa-play-circle','fa-ticket','fa-minus-square','fa-minus-square-o','fa-level-up','fa-level-down','fa-check-square','fa-pencil-square','fa-external-link-square','fa-share-square','fa-compass','fa-caret-square-o-down','fa-caret-square-o-up','fa-caret-square-o-right','fa-eur','fa-gbp','fa-usd','fa-inr','fa-jpy','fa-rub','fa-krw','fa-btc','fa-file','fa-file-text','fa-sort-alpha-asc','fa-sort-alpha-desc','fa-sort-amount-asc','fa-sort-amount-desc','fa-sort-numeric-asc','fa-sort-numeric-desc','fa-thumbs-up','fa-thumbs-down','fa-youtube-square','fa-youtube','fa-xing','fa-xing-square','fa-youtube-play','fa-dropbox','fa-stack-overflow','fa-instagram','fa-flickr','fa-adn','fa-bitbucket','fa-bitbucket-square','fa-tumblr','fa-tumblr-square','fa-long-arrow-down','fa-long-arrow-up','fa-long-arrow-left','fa-long-arrow-right','fa-apple','fa-windows','fa-android','fa-linux','fa-dribbble','fa-skype','fa-foursquare','fa-trello','fa-female','fa-male','fa-gittip','fa-sun-o','fa-moon-o','fa-archive','fa-bug','fa-vk','fa-weibo','fa-renren','fa-pagelines','fa-stack-exchange','fa-arrow-circle-o-right','fa-arrow-circle-o-left','fa-caret-square-o-left','fa-dot-circle-o','fa-wheelchair','fa-vimeo-square','fa-try','fa-plus-square-o');
				
				$pixedenicons = array('pe-7s-cloud-upload','pe-7s-cash','pe-7s-close','pe-7s-bluetooth','pe-7s-cloud-download','pe-7s-way','pe-7s-close-circle','pe-7s-id','pe-7s-angle-up','pe-7s-wristwatch','pe-7s-angle-up-circle','pe-7s-world','pe-7s-angle-right','pe-7s-volume','pe-7s-angle-right-circle','pe-7s-users','pe-7s-angle-left','pe-7s-user-female','pe-7s-angle-left-circle','pe-7s-up-arrow','pe-7s-angle-down','pe-7s-switch','pe-7s-angle-down-circle','pe-7s-scissors','pe-7s-wallet','pe-7s-safe','pe-7s-volume','pe-7s-volume','pe-7s-voicemail','pe-7s-video','pe-7s-user','pe-7s-upload','pe-7s-unlock','pe-7s-umbrella','pe-7s-trash','pe-7s-tools','pe-7s-timer','pe-7s-ticket','pe-7s-target','pe-7s-sun','pe-7s-study','pe-7s-stopwatch','pe-7s-star','pe-7s-speaker','pe-7s-signal','pe-7s-shuffle','pe-7s-shopbag','pe-7s-share','pe-7s-server','pe-7s-search','pe-7s-film','pe-7s-science','pe-7s-disk','pe-7s-ribbon','pe-7s-repeat','pe-7s-refresh','pe-7s-add-user','pe-7s-refresh-cloud','pe-7s-paperclip','pe-7s-radio','pe-7s-note','pe-7s-print','pe-7s-network','pe-7s-prev','pe-7s-mute','pe-7s-power','pe-7s-medal','pe-7s-portfolio','pe-7s-like','pe-7s-plus','pe-7s-left-arrow','pe-7s-play','pe-7s-key','pe-7s-plane','pe-7s-joy','pe-7s-photo-gallery','pe-7s-pin','pe-7s-phone','pe-7s-plug','pe-7s-pen','pe-7s-right-arrow','pe-7s-paper-plane','pe-7s-delete-user','pe-7s-paint','pe-7s-bottom-arrow','pe-7s-notebook','pe-7s-note','pe-7s-next','pe-7s-news-paper','pe-7s-musiclist','pe-7s-music','pe-7s-mouse','pe-7s-more','pe-7s-moon','pe-7s-monitor','pe-7s-micro','pe-7s-menu','pe-7s-map','pe-7s-map-marker','pe-7s-mail','pe-7s-mail-open','pe-7s-mail-open-file','pe-7s-magnet','pe-7s-loop','pe-7s-look','pe-7s-lock','pe-7s-lintern','pe-7s-link','pe-7s-like','pe-7s-light','pe-7s-less','pe-7s-keypad','pe-7s-junk','pe-7s-info','pe-7s-home','pe-7s-help1','pe-7s-help2','pe-7s-graph1','pe-7s-graph2','pe-7s-graph3','pe-7s-graph','pe-7s-global','pe-7s-gleam','pe-7s-glasses','pe-7s-gift','pe-7s-folder','pe-7s-flag','pe-7s-filter','pe-7s-file','pe-7s-expand1','pe-7s-exapnd2','pe-7s-edit','pe-7s-drop','pe-7s-drawer','pe-7s-download','pe-7s-display1','pe-7s-display2','pe-7s-diskette','pe-7s-date','pe-7s-cup','pe-7s-culture','pe-7s-crop','pe-7s-credit','pe-7s-copy-file','pe-7s-config','pe-7s-compass','pe-7s-comment','pe-7s-coffee','pe-7s-cloud','pe-7s-clock','pe-7s-check','pe-7s-chat','pe-7s-cart','pe-7s-camera','pe-7s-call','pe-7s-calculator','pe-7s-browser','pe-7s-box1','pe-7s-box2','pe-7s-bookmarks','pe-7s-bicycle','pe-7s-bell','pe-7s-battery','pe-7s-ball','pe-7s-back','pe-7s-attention','pe-7s-anchor','pe-7s-albums','pe-7s-alarm','pe-7s-airplay');
			
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<select name="icon-type" id="icon-type">
								<option value="fontawesome">Font Awesome</option>
								<option value="pixeden">Pixeden</option>
							</select><br><br>';
					
					echo '<ul class="iconfonts fontawesome">';		
					foreach ($fonawesomeicons as $fi) {
						echo '<li><input type="radio" name="'.$option['id'].'" value="'.$fi.'"><i class="iconcheck fa '.$fi.'"></i></li>';
					}
					echo '</ul>';
					
					echo '<ul class="iconfonts pixeden">';		
					foreach ($pixedenicons as $pi) {
						echo '<li><input type="radio" name="'.$option['id'].'" value="'.$pi.'"><i class="iconcheck '.$pi.'"></i></li>';
					}
					echo '</ul>';
				echo '</div>';
				
				
			break;
			
			}
			
        }
        
        ?>
    </div> <!-- END .sc_sc-option-->
	
</div>

</div>
</body>
</html>