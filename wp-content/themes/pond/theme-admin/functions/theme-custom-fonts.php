<?php

/*-----------------------------------------------------------------------------------

	CUSTOM FONTS

-----------------------------------------------------------------------------------*/
global $sr_prefix;

$standard_fonts = array('default', 'Arial','Lucida Sans Unicode','Times New Roman','Verdana', 'Helvetica', 'Georgia','Tahoma');

$fonts = array( 'bodyfont','h1font','h2font','h3font','h4font','h5font','h6font','mainsectionfont','subsectionfont','navigationfont','buttonfont','miscfont');

$active_fonts = array();
$active_weights = array();
foreach($fonts as $font) {
	$family = get_option($sr_prefix.'_'.$font.'-font');	
	$weight = get_option($sr_prefix.'_'.$font.'-weight');	
	$boldweight = get_option($sr_prefix.'_'.$font.'-boldweight');
	
	if ($family) {	
		if(!in_array($family, $active_fonts) && $family ) {
			$active_fonts[] = $family;
		}
		if (!array_key_exists($family, $active_weights)) {
			$active_weights[$family] = $weight;
			if($weight !== $boldweight && $boldweight) {
				$active_weights[$family] .= ','.$boldweight;
			} 
		} else {
			$check = $active_weights[$family];
			if(strpos($check,$weight) === false) {
				$active_weights[$family] .= ','.$weight;
			}
			$check = $active_weights[$family];
			if(strpos($check,$boldweight) === false && $boldweight) {
				$active_weights[$family] .= ','.$boldweight;
			} 
		}
	}
} 


$allfonts = '';

foreach($active_fonts as $f) {
	if ($allfonts !== '') { $allfonts .='|'; }
	$allfonts .= str_replace(' ', '+', $f);
	$allfonts .= ':'.$active_weights[$f];
}


function sr_theme_fonts() {
	global $allfonts;
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'sr_fonts', "$protocol://fonts.googleapis.com/css?family=".$allfonts."&subset=latin,cyrillic-ext" );
}
add_action( 'wp_enqueue_scripts', 'sr_theme_fonts' );	

?>