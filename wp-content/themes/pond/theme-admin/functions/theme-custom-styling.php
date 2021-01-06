<?php

/*-----------------------------------------------------------------------------------

	CUSTOM STYLING OPTIONS

-----------------------------------------------------------------------------------*/
global $sr_prefix;



/*-----------------------------------------------------------------------------------*/
/*	Logo Height Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_custom_style_logo' ) ) {
	function sr_custom_style_logo() {
		global $sr_prefix;
		
		$return='';
		
		if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } else { $theId = get_option( 'page_for_posts' ); }
		$overlayLogo = get_post_meta($theId, $sr_prefix.'_overlaylogo', true);
		
		$logoHeader = get_option($sr_prefix.'_logolight');
		if ($overlayLogo == 'dark' ) { $logoHeader = get_option($sr_prefix.'_logodark'); }
		
		if ($logoHeader) {
			$logoId =  sr_get_attachment_id_from_src($logoHeader);
			$logodata = wp_get_attachment_image_src( $logoId, "full" );
			$logoHeight = $logodata[2];
			
			$return .= '#logo, #logo img, nav#main-nav .nav-logo img, .non-overlay .open-nav, .non-overlay:not(.sticky-header) nav#traditional-nav > ul > li > a { height: '.$logoHeight.'px; line-height: '.$logoHeight.'px; }';
			//$return .= '.page-loader-inner .loader-logo-name img { max-height: '.$logoHeight.'px; }';
			$return .= '.overlay-bottom:not(.sticky-header) .open-nav, .overlay-bottom nav#traditional-nav > ul > li > a { margin-top: '.($logoHeight-20).'px; }';
			$return .= '.overlay-bottom nav#traditional-nav ul li .sub-menu { top: '.$logoHeight.'px; }';
			
		} 
		
		return $return;
	}
}
		
		
		
		
/*-----------------------------------------------------------------------------------*/
/*	Color Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_custom_style_color' ) ) {
	function sr_custom_style_color() {
		global $sr_prefix;
		
		/*
		GENERAL COLOR
		*/
		$return = '';
		
		if (get_option($sr_prefix.'_maincolor') == 'customcolor' && get_option($sr_prefix.'_customcolor')){ 
		
			$main_color = get_option($sr_prefix.'_customcolor');
			
			$return = '
.separator span, .separator-small span { background: '.$main_color.' !important; }
.colored { color: '.$main_color.'; }
p a:not(.sr-button):after { background: '.$main_color.'; }
.pace .pace-progress { background: '.$main_color.';}
[data-bigletter]:before { color: '.$main_color.'; }
.visible[data-bigletter]:before { opacity: 0.2; filter: alpha(opacity=20); -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=20)"; }
nav#main-nav .nav-inner ul li:hover > a, nav#main-nav .nav-inner ul li.current-menu-item > a, nav#traditional-nav ul li:hover > a, nav#traditional-nav ul li.current-menu-item > a { color: '.$main_color.'; }
nav#main-nav [data-bigletter]:before { color: #ffffff; }
.skill .skill-bar .skill-active { background: '.$main_color.'; }
footer #backtotop:after { background: '.$main_color.'; }
.filter li a:after { background: '.$main_color.'; }
imgoverlay.overlay-border > a { border-color: '.$main_color.'; }
.blog-content .post-name a:hover { color: '.$main_color.'; opacity: 1;filter: alpha(opacity=100);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";}
';
		
		} 		

	return $return;
		
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Typorgraphy Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_custom_style_typography' ) ) {
	function sr_custom_style_typography() {
		global $sr_prefix;
		
		$defaultfonts = array('body','h1','h2','h3','h4','h5','h6');
		
		// DEFAULT FONTS
		$return = '';
		foreach($defaultfonts as $font) {
			$family = get_option($sr_prefix.'_'.$font.'font-font');
			$weight = get_option($sr_prefix.'_'.$font.'font-weight');
			$boldweight = get_option($sr_prefix.'_'.$font.'font-boldweight');
			$size = get_option($sr_prefix.'_'.$font.'font-size');
			$lineheight = get_option($sr_prefix.'_'.$font.'font-height');
			if (!$lineheight) $lineheight = intval(intval($size)*1.4).'px';
			$spacing = get_option($sr_prefix.'_'.$font.'font-spacing');
			$transform = get_option($sr_prefix.'_'.$font.'font-transform');
			
			$return .= $font.' {';
				if ($family) { $return .= 'font-family: "'.$family.'";'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
				if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			if ($boldweight) { $return .= $font.' strong,'.$font.' b { font-weight: '.$boldweight.'; }'; }
			
			if ($font == 'body') {
			$return .= 'input[type=text], input[type=password], input[type=email], textarea, select { font-family: '.$family.'; font-weight: '.$weight.'; }';	
			}
			
			if ($font == 'h6') {
			$return .= '.counter-value { font-family: '.$family.'; font-weight: '.$boldweight.'; }';	
			}
			
			
			// Rev Slider Captions
			if ($font == 'h1') {
				$return .= '.tp-caption.pond-title-big-dark, .tp-caption.pond-title-big-white { ';
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.$weight.';'; }
					if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
				if ($boldweight) { $return .= '.tp-caption.pond-title-big-dark strong, .tp-caption.pond-title-big-white strong, .tp-caption.pond-title-big-dark b, .tp-caption.pond-title-big-white b { font-weight: '.$boldweight.'; }'; }	
			} else if ($font == 'h2') {
				$return .= '.tp-caption.pond-title-medium-dark, .tp-caption.pond-title-medium-white { ';
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.$weight.';'; }
					if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
				if ($boldweight) { $return .= '.tp-caption.pond-title-medium-dark strong, .tp-caption.pond-title-medium-white strong, .tp-caption.pond-title-medium-dark b, .tp-caption.pond-title-medium-white b { font-weight: '.$boldweight.'; }'; }
			} else if ($font == 'h3') {
				$return .= '.tp-caption.pond-title-small-dark, .tp-caption.pond-title-small-white { ';
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.$weight.';'; }
					if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
				if ($boldweight) { $return .= '.tp-caption.pond-title-small-dark strong, .tp-caption.pond-title-small-white strong, .tp-caption.pond-title-small-dark b, .tp-caption.pond-title-small-white b { font-weight: '.$boldweight.'; }'; }
			} else if ($font == 'h4') {
				$return .= '.tp-caption.pond-title-mini-dark, .tp-caption.pond-title-mini-white { ';
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.$weight.';'; }
					if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
				if ($boldweight) { $return .= '.tp-caption.pond-title-mini-dark strong, .tp-caption.pond-title-mini-white strong, .tp-caption.pond-title-mini-dark b, .tp-caption.pond-title-mini-white b { font-weight: '.$boldweight.'; }'; }
			} else if ($font == 'h5') {
				$return .= '#reply-title { font-size: '.$size.';line-height: '.$lineheight.'; } ';
			} else if ($font == 'h6') {
				$return .= '.tp-caption.pond-title-micro-dark, .tp-caption.pond-title-micro-white { ';
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.$weight.';'; }
					if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
				if ($boldweight) { $return .= '.tp-caption.pond-title-micro-dark strong, .tp-caption.pond-title-micro-white strong, .tp-caption.pond-title-micro-dark b, .tp-caption.pond-title-micro-white b { font-weight: '.$boldweight.'; }'; }
			}
			// Rev Slider Captions
			
		}
		// DEFAULT FONTS
		
		
		// SUB TITLE
			$family = get_option($sr_prefix.'_subtitle-font');
			$weight = get_option($sr_prefix.'_subtitle-weight');
			$boldweight = get_option($sr_prefix.'_subtitle-boldweight');
			
			$return .= '.alttitle {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
			$return .= '}';
			if ($boldweight) { $return .= '.alttitle b, .alttitle strong { font-weight: '.$boldweight.'; }'; }
		// SUB SECTION TITLE
		
		
		// MINIMAL TITLE
			$spacing = get_option($sr_prefix.'_minimalfont-spacing');
			$transform = get_option($sr_prefix.'_minimalfont-transform');
			
			$return .= '.title-minimal {';
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
		// MINIMAL TITLE
		
		
		// ULTRAMINIMAL TITLE
			$spacing = get_option($sr_prefix.'_ultraminimalfont-spacing');
			$transform = get_option($sr_prefix.'_ultraminimalfont-transform');
			
			$return .= '.title-ultraminimal {';
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
		// ULTRAMINIMAL TITLE
		
		
		// ROOT NAVIGATION
			$family = get_option($sr_prefix.'_navigationfont-font');
			$weight = get_option($sr_prefix.'_navigationfont-weight');
			$size = get_option($sr_prefix.'_navigationfont-size');
			$spacing = get_option($sr_prefix.'_navigationfont-spacing');
			
			$return .= 'nav#main-nav .nav-inner ul li a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
			$return .= '}';
			
			$return .= 'nav#traditional-nav ul li a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
			$return .= '}';
		// ROOT NAVIGATION
		
		
		// SUB NAVIGATION
			$family = get_option($sr_prefix.'_navigationsubfont-font');
			$weight = get_option($sr_prefix.'_navigationsubfont-weight');
			$size = get_option($sr_prefix.'_navigationsubfont-size');
			$spacing = get_option($sr_prefix.'_navigationsubfont-spacing');
			
			$return .= 'nav#main-nav .nav-inner ul li ul li a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
			$return .= '}';
		// SUB NAVIGATION
		
		
		// BUTTON
			$family = get_option($sr_prefix.'_buttonfont-font');
			$weight = get_option($sr_prefix.'_buttonfont-weight');
			$boldweight = get_option($sr_prefix.'_buttonfont-boldweight');
			$spacing = get_option($sr_prefix.'_buttonfont-spacing');
			$transform = get_option($sr_prefix.'_buttonfont-transform');
			
			$return .= 'input[type=submit], a.sr-button,
			.scroll-down-message, #backtoworks, .single-pagination li a, .entries-pagination li a, .filter li a, .blog-content a.read-more, .tabs ul.tab-nav li a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= '.open-nav span.open-nav-text, #load-more a, footer #backtotop, #social-share .show-share { font-family: '.$family.'; font-weight: '.$boldweight.'; letter-spacing: '.$spacing.'em; text-transform: '.$transform.'; }';
		// BUTTON
				
		return $return;
		
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Portfolio Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_custom_style_portfolio' ) ) {
	function sr_custom_style_portfolio() {
		global $sr_prefix;
		
		$spacing = get_option($sr_prefix.'_portfoliospacing');
		$hovercolor = get_option($sr_prefix.'_portfoliohovercolor');
		
		$return='';
		if ($spacing && $spacing !== '0') {
			$return .= '
			.masonry.masonry-spaced {	
				width: calc(113% - '.($spacing*2).'px);		
				margin-left: '.$spacing.'px;
				margin-bottom: -'.$spacing.'px;
				}	
				
			.masonry-spaced .masonry-item {
				margin-right: '.$spacing.'px;
				margin-bottom: '.$spacing.'px;
				}
			';
		}
		if ($hovercolor && $hovercolor !== '#000000') {
			$return .= '.portfolio-thumb .imgoverlay:after, .portfolio-carousel-item .imgoverlay:after {background: '.$hovercolor.';}'	;
		}		
		return $return;
		
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Page/Section Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_pseudo_header' ) ) {
	function sr_pseudo_header() {
		global $sr_prefix;
		
		$pHeight = 80;
		if (get_option($sr_prefix.'_viewportborder') == 'bigborder') { $pHeight = 120; }
		if (get_option($sr_prefix.'_viewportborder') == 'noborder') { $pHeight = 0; }
		
		
		if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } else { $theId = get_option( 'page_for_posts' ); }
		
		$hHeight = 0;
		if (get_post_meta($theId, $sr_prefix.'_headerstyle', true) == 'non-overlay') {
			$logoHeight = 0;
			if (get_option($sr_prefix.'_logolight')) {
			$logoId =  sr_get_attachment_id_from_src(get_option($sr_prefix.'_logolight'));
			$logodata = wp_get_attachment_image_src( $logoId, "full" );
			$logoHeight = $logodata[2];
			}
			$hHeight = $logoHeight+40;
		}
		
		return '#pseudo-header { height: '.($pHeight+$hHeight).'px; }';
		
	}
}

?>