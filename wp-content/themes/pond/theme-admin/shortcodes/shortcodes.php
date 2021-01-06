<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Columns
/*-----------------------------------------------------------------------------------*/
function sr_one_half( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }	
   	return '<div class="column one-half '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div>';
}
add_shortcode('one_half', 'sr_one_half');

function sr_one_half_last( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column one-half last-col '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'sr_one_half_last');

function sr_one_third( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column one-third '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div>';
}
add_shortcode('one_third', 'sr_one_third');

function sr_one_third_last( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column one-third last-col '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'sr_one_third_last');

function sr_two_third( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }	
   return '<div class="column two-third '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div>';
}
add_shortcode('two_third', 'sr_two_third');

function sr_two_third_last( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column two-third last-col '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'sr_two_third_last');

function sr_one_fourth( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column one-fourth '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div>';
}
add_shortcode('one_fourth', 'sr_one_fourth');

function sr_one_fourth_last( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column one-fourth last-col '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'sr_one_fourth_last');

function sr_two_fourth( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column two-fourth '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div>';
}
add_shortcode('two_fourth', 'sr_two_fourth');

function sr_two_fourth_last( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }	
   return '<div class="column two-fourth last-col '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div><div class="clear"></div>';
}
add_shortcode('two_fourth_last', 'sr_two_fourth_last');

function sr_three_fourth( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }	
   return '<div class="column three-fourth '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div>';
}
add_shortcode('three_fourth', 'sr_three_fourth');

function sr_three_fourth_last( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column three-fourth last-col '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'sr_three_fourth_last');

function sr_one_fifth( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column one-fifth '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div>';
}
add_shortcode('one_fifth', 'sr_one_fifth');

function sr_one_fifth_last( $atts, $content = null ) {
	extract( shortcode_atts( array('bg' => '','animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }
	$startbg = ''; $endbg = ''; $colbg = '';
	if ($bg && $bg !== '') { $startbg='<div class="bg-col-inner">'; $endbg='</div>'; $colbg = 'style="background:'.$bg.';"'; }
   return '<div class="column one-fifth last-col '.esc_attr($addclass).'" '.esc_attr($adddelay).' '.esc_attr($colbg).'>'.$startbg.'' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . ''.$endbg.'</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'sr_one_fifth_last');



function sr_column_row( $atts, $content = null ) {
	extract( shortcode_atts( array('animation' => '','delay' => '0'), $atts ) ); $addclass = ''; $adddelay = '';
	if ($animation && $animation !== '') { $addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.$delay.'"'; }	
   return '<div class="column-section clearfix">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('column_row', 'sr_column_row');


/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Team
/*-----------------------------------------------------------------------------------*/
function sr_team_member( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
      'name' => 'MemberName',
	  'title' => 'MemberTitle',
	  'img' => '',
	  'fb' => '',
	  'tw' => '',
	  'gl' => '',
	  'li' => '',
	  'www' => '',
	  'mail' => '',
	  'width' => 'one-half',
	  'last' => ''
      ), $atts ) );
	  
   	/*$img_id = sr_get_attachment_id_from_src($img);
	$image = wp_get_attachment_image($img_id, '');*/
   
   	$output = '<div class="column '.esc_attr($width).' '.esc_attr($last).'">';
	if ($img) { 
		$output .= '<div class="imgoverlay overlay-dark overlay-transparent">';
		$output .= '<img src="'.esc_url($img).'" alt="'.esc_attr($name).'">';
		
		if ($name) {  
			$output .= '<div class="overlaycaption">';
			$output .= '<h4 class="overlay-name title-minimal"><strong>'.esc_html($name).'</strong></h4>';
			
			if ($fb || $tw || $gl || $li || $mail) { 
				$output .= '<div class="separator-small"><span></span></div>';
				$output .= '<ul class="socialmedia-widget alttitle">';
				if ($fb) { $output .= '<li class="facebook"><a href="'.esc_url($fb).'" target="_blank"></a></li>';  }
				if ($tw) { $output .= '<li class="twitter"><a href="'.esc_url($tw).'" target="_blank"></a></li>';  }
				if ($gl) { $output .= '<li class="googleplus"><a href="'.esc_url($gl).'" target="_blank"></a></li>';  }
				if ($li) { $output .= '<li class="linkedin"><a href="'.esc_url($li).'" target="_blank"></a></li>';  }
				if ($www) { $output .= '<li class="website"><a href="'.esc_url($www).'" target="_blank"></a></li>';  }
				if ($mail) { $output .= '<li class="mail"><a href="mailto:'.esc_url($mail).'" target="_blank"></a></li>';  }
				$output .= '</ul>';
			}
			
			$output .= '</div>';
		}
		
		$output .= '</div>'; 
	}			
	if ($title) { $output .= '<h6>'.esc_attr($title).'</h6>'; }			
    $output .= '<p>' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</p>';			
    $output .= '</div>';
   
   return $output;
}
add_shortcode('team_member', 'sr_team_member');




function sr_team_list( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
      'name' => 'MemberName',
	  'title' => 'MemberTitle',
	  'img' => '',
	  'fb' => '',
	  'tw' => '',
	  'gl' => '',
	  'li' => '',
	  'mail' => '',
	  'www' => '',
	  'pos' => 'left'
      ), $atts ) );
   
   	$output = '<div class="wrapper-small wrapper-team-list"><div class="column-section clearfix">';
	if ($img && $pos == 'left') { 
		$output .= '<div class="column one-half"><img src="'.esc_url($img).'"></div>';
		
		$output .= '<div class="column one-half last-col">
							<h4 class="title-minimal"><strong>'.esc_attr($name).'</strong></h4>
							<div class="separator-small"><span></span></div>
							<h6 class="alttitle">'.esc_attr($title).'</h6>
							<p>' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</p>';
		if ($fb || $tw || $gl || $li || $mail) { 
				$output .= '<ul class="socialmedia-widget alttitle">';
				if ($fb) { $output .= '<li class="facebook"><a href="'.esc_url($fb).'" target="_blank"></a></li>';  }
				if ($tw) { $output .= '<li class="twitter"><a href="'.esc_url($tw).'" target="_blank"></a></li>';  }
				if ($gl) { $output .= '<li class="googleplus"><a href="'.esc_url($gl).'" target="_blank"></a></li>';  }
				if ($li) { $output .= '<li class="linkedin"><a href="'.esc_url($li).'" target="_blank"></a></li>';  }
				if ($www) { $output .= '<li class="website"><a href="'.esc_url($www).'" target="_blank"></a></li>';  }
				if ($mail) { $output .= '<li class="mail"><a href="mailto:'.esc_url($mail).'" target="_blank"></a></li>';  }
				$output .= '</ul>';
			}
		$output .= '</div>';
		
	} else if ($img && $pos == 'right') { 		
		$output .= '<div class="column one-half align-right">
							<h4 class="title-minimal"><strong>'.esc_attr($name).'</strong></h4>
							<div class="separator-small"><span></span></div>
							<h6 class="alttitle">'.esc_attr($title).'</h6>
							<p>' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</p>';
		if ($fb || $tw || $gl || $li || $mail) { 
				$output .= '<ul class="socialmedia-widget alttitle">';
				if ($fb) { $output .= '<li class="facebook"><a href="'.esc_url($fb).'" target="_blank"></a></li>';  }
				if ($tw) { $output .= '<li class="twitter"><a href="'.esc_url($tw).'" target="_blank"></a></li>';  }
				if ($gl) { $output .= '<li class="googleplus"><a href="'.esc_url($gl).'" target="_blank"></a></li>';  }
				if ($li) { $output .= '<li class="linkedin"><a href="'.esc_url($li).'" target="_blank"></a></li>';  }
				if ($mail) { $output .= '<li class="mail"><a href="mailto:'.esc_url($mail).'" target="_blank"></a></li>';  }
				$output .= '</ul>';
			}
		$output .= '</div>';
		
		$output .= '<div class="column one-half last-col"><img src="'.esc_url($img).'"></div>';
	}
	$output .= '</div></div>'; 
	
	return $output;
}
add_shortcode('team_list', 'sr_team_list');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Buttons
/*-----------------------------------------------------------------------------------*/
function sr_button( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'color' => 'sr-button1',
      'size' => 'medium-button',
	  'url' => '',
      'target' => '_self',
	  'scrollto' => '',
	  'video' => '',
      ), $atts ) );
	
		
	if ($url && $target) { 
		return '<a href="'.esc_url($url).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).'"  target="'.esc_attr($target).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</a>';	
	} 
	
	if ($scrollto && $scrollto !== 'false') { 
		return '<a href="#section-'.esc_attr($scrollto).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).' scroll-to" >'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)). '</a>';	
	} 
	
	if ($video && $video !== 'false') { 
		return '<a href="'.esc_url($video).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).' openfancybox fancybox.iframe" >'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</a>';	
	} 
		
	
}
add_shortcode('button', 'sr_button');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Icons
/*-----------------------------------------------------------------------------------*/
function sr_iconfont( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => '',
      'size' => 'normal',
      'color' => ''
      ), $atts ) );
	
	$iconcolor = '';
	if ($color && $color !== '') { 
		$iconcolor = 'style="color:'.esc_attr($color).';"';
	}
	
	if ($type[0] == 'p') { 
		return '<i class="'.esc_attr($type).' pe-'.esc_attr($size).'" '.esc_attr($iconcolor).'></i>';	
	}  else {
		return '<i class="fa '.esc_attr($type).' fa-'.esc_attr($size).'" '.esc_attr($iconcolor).'></i>';	
	}
		
}
add_shortcode('iconfont', 'sr_iconfont');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Iconbox
/*-----------------------------------------------------------------------------------*/
function sr_iconbox( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'icon' => 'fa-heart',
      'color' => '',
      'position' => 'left',
      'animation' => '',
      'delay' => '0'
      ), $atts ) );
	
	
	if ($color && $color !== '') { 
		$iconcolor = 'style="color:'.esc_attr($color).';"';
	} else { $iconcolor = '';}
	
	$addclass ='';$adddelay='';
	if ($animation && $animation !== '') { 
		$addclass='sr-animation sr-animation-'.$animation; $adddelay='data-delay="'.esc_attr($delay).'"'; 
	}	
		
	return '<div class="iconbox position-'.esc_attr($position).' clearfix '.esc_attr($addclass).'" '.$adddelay.'>
				<i class="fa '.esc_attr($icon).' fa-2x fa-fw" '.$iconcolor.'></i>
					<div class="iconbox-content">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>
			  </div>';	
}
add_shortcode('iconbox', 'sr_iconbox');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Counter
/*-----------------------------------------------------------------------------------*/
function sr_counter( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'from' => '0',
      'to' => '1000',
      'speed' => '7',
      'sub' => 'Counter Name'
      ), $atts ) );
	
	
	
		
	return '<div class="counter align-center">
				<div class="counter-value" data-from="'.esc_attr($from).'" data-to="'.esc_attr($to).'" data-speed="'.esc_attr($speed).'">'.esc_html($from).'</div>
				<h6 class="counter-name alttitle title-minimal"><strong>'.esc_html($sub).'</strong></h6>
			</div>
			';	
}
add_shortcode('counter', 'sr_counter');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Toggles
/*-----------------------------------------------------------------------------------*/
function sr_toggle( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => 'Toggle',
      'size' => 'small',
      'open' => 'no'
      ), $atts ) );
			
	if ($open == 'yes') { $toggleopen = 'toggle-active'; } else { $toggleopen = ''; }
	
	return '	<div class="toggle '.esc_attr($size).'-toggle">
					<div class="toggle-title '.esc_attr($toggleopen).' clearfix">
						<div class="toggle-icon"><span></span></div>
						<h5 class="toggle-name">' . esc_html($title) . '</h5>
					</div>
					<div class="toggle-inner">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>
				</div>';
}
add_shortcode('toggle', 'sr_toggle');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Skills
/*-----------------------------------------------------------------------------------*/
function sr_skill( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'amount' => '55',
	  'name' => 'Skillname',
	  'color' => '#0d0d0d'
      ), $atts ) );
	
	$skill_slug = preg_replace('/[^a-z]/', "", strtolower($name));
	
	if ($color) { $skillcolor = 'background:'.esc_attr($color); } else { $skillcolor = '';  }
		
	return '<div class="skill">
				<h6 class="alttitle skill-name"><strong>'.esc_html($name).'</strong></h6>
				<div class="skill-bar"><div class="skill-active '.esc_attr($skill_slug).'" style="'.$skillcolor.'" data-perc="'.esc_attr($amount).'">
				<span class="tooltip">'.esc_html($amount).'%</span></div></div>
			</div>';	
}
add_shortcode('skill', 'sr_skill');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Tabs
/*-----------------------------------------------------------------------------------*/
function sr_tabs( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => ''
      ), $atts ) );
	
	$return = '<div class="tabs"><ul class="tab-nav clearfix">';
	
	$title = substr($title, 0, -1);
	$title = explode(',', $title);
	$i = 1;
	foreach ($title as $t) {
		if ($i == 1) { $addclass = 'class="active"'; } else { $addclass = ''; }
		$return .= '<li><a href="tabid'.esc_attr($i).'" '.$addclass.'>'.esc_html($t).'</a></li>';	
		$i++;
	}
	
	$return .= '</ul><div class="clear"></div><div class="tab-container">'.do_shortcode($content).'</div></div>';
	
	return $return;	
}
add_shortcode('tabs', 'sr_tabs');


function sr_tab( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'id' => ''
      ), $atts ) );
	
	if ($id == 1) { $addclass = 'active'; } else { $addclass = ''; }
	return '<div class="tab-content tabid'.esc_attr($id).' '.esc_attr($addclass).'">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';	
}
add_shortcode('tab', 'sr_tab');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Quotes
/*-----------------------------------------------------------------------------------*/
function sr_quotes( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => ''
      ), $atts ) );
	
	$return = '<div class="owlslider testimonial-slider">'.do_shortcode($content).'</div>';
	
	return $return;	
}
add_shortcode('quoteslider', 'sr_quotes');


function sr_quote( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'name' => 'Quoter',
      'sub' => ''
      ), $atts ) );
	
	$return = '<div class="testimonial-item">
					<div class="testimonial-quote">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>
					<h6 class="testimonial-name"><strong>'.esc_html($name).'</strong></h6>';
	if ($sub) { $return .= '<h6 class="testimonial-namesub alttitle">'.esc_attr($sub).'</h6>';  }				
	$return .= '</div>';	
	
	return $return;	
}
add_shortcode('quote', 'sr_quote');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Accordion
/*-----------------------------------------------------------------------------------*/
function sr_accordion( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => 'Toggle',
      'open' => 'no'
      ), $atts ) );
			
	if ($open == 'yes') { $toggleopen = 'toggle-active'; } else { $toggleopen = ''; }
	
	return '	<div class="toggle-item">
				<div class="toggle-title '.esc_attr($toggleopen).'">
					<h6 class="alttitle toggle-name"><strong>' . esc_html($title) . '</strong></h6>
				</div>
				<div class="toggle-inner">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>
			</div>';		
}
add_shortcode('accordion', 'sr_accordion');


function sr_accordiongroup( $atts, $content = null )
{	
	return '<div class="accordion">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';	
}
add_shortcode('accordiongroup', 'sr_accordiongroup');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Contact form
/*-----------------------------------------------------------------------------------*/
function sr_field( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => 'textfield',
	  'name' => 'Fieldname',
	  'slug' => 'slugname',
	  'required' => 'yes'
      ), $atts ) );
		
	
	if ($required == 'yes') { $label_req = 'class="req"'; $req = "*"; } else { $label_req = ''; $req = ""; }
	$input_name = strtolower($slug);
	
	
	$output = '';
	if ($type == 'textfield') {
		$output .= '<div class="form-row clearfix">
						<label for="'.esc_attr($input_name).'" '.$label_req.'>'.esc_html($name).' '.$req.'</label>
						<input type="text" name="'.esc_attr($input_name).'" class="'.esc_attr($input_name).'" id="'.esc_attr($input_name).'" value="" placeholder="'.$name.'" />
					</div>
					';
	} else if ($type == 'textarea') {
		$output .= '<div class="form-row clearfix textbox">
						<label for="'.esc_attr($input_name).'" '.$label_req.'>'.esc_html($name).' '.$req.'</label>
						<textarea name="'.esc_attr($input_name).'" class="'.esc_attr($input_name).'" id="'.esc_attr($input_name).'" rows="15" cols="50" placeholder="'.$name.'"></textarea>
					</div>
					';
	} 
	
	
	return $output;
	
}
add_shortcode('field', 'sr_field');

function sr_contactgroup( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
      'fields' => '',
      'email' => 'Testemail',
      'subject' => 'Subject',
      'submit' => 'Send'
      ), $atts ) );
	
	if ($fields == '') { 
		return '<p><span class="error_message">Please check your Contact form. Your shortcode [contactgroup] needs a "fields" attribute</span></p>';
	} else {
   		return '<form id="contact-form" class="checkform" action="'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"].'" target="'.get_template_directory_uri().'/contact-form.php" method="post" >' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '
		<div id="form-note">
			<div class="alert alert-error">
				<strong>'.__("Error", 'sr_pond_theme').'</strong>: '.__("Please check your entries", 'sr_pond_theme').'!
			</div>
		</div>
		<div class="form-row form-submit"><input type="submit" name="submit_form" class="submit" value="'.$submit.'" /></div>
		<input type="hidden" name="subject" value="'.$subject.'" />
		<input type="hidden" name="fields" value="'.$fields.'" />
		<input type="hidden" name="sendto" value="'.$email.'" />
		</form>';
	}
}
add_shortcode('contactgroup', 'sr_contactgroup');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Gallery
/*-----------------------------------------------------------------------------------*/
function sr_gallery( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => 'gallery',
      'columns' => '4',
      'size' => '600',
      'fullwidth' => '',
      'lightbox' => '',
      'crop' => 'no',
      'bullets' => 'light',
      'arrows' => 'hide'
      ), $atts ) );
	
	global $sr_prefix;
	
	
	$return = '';
	if ($type == 'gallery') {
		$newContent = str_replace("]", ' col="'.esc_attr($columns).'" lightbox="'.esc_attr($lightbox).'" crop="'.esc_attr($crop).'" type="'.esc_attr($type).'"]', $content);
		if ($fullwidth == 'yes') { $return .= '</div>'; } // close wrapper
		$return .= '<ul class="sr-gallery gallery-col'.esc_attr($columns).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($newContent)).'</ul>';
		if ($fullwidth == 'yes') { if(is_single() && get_post_type() == 'post'){$return .='<div class="wrapper-small">';}else{ $return.= '<div class="wrapper">'; }}
	} else if ($type == 'masonry') {
		$newContent = str_replace("]", ' size="'.esc_attr($size).'"  lightbox="'.esc_attr($lightbox).'"  crop="'.esc_attr($crop).'" type="'.esc_attr($type).'"]', $content);
		if ($fullwidth == 'yes') { $return .= '</div>'; } // close wrapper
		$return .= '<div id="gallery-grid-sc" class="masonry clearfix" data-maxitemwidth="'.esc_attr($size).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($newContent)).'</div>';
		if ($fullwidth == 'yes') { if(is_single() && get_post_type() == 'post'){$return .='<div class="wrapper-small">';}else{ $return.= '<div class="wrapper">'; }}
	} else if ($type == 'slider') {
		$newContent = str_replace("]", ' lightbox="'.esc_attr($lightbox).'"  crop="'.esc_attr($crop).'" type="'.esc_attr($type).'"]', $content);
		$addOption = '';
		if ($bullets == 'hide') { $addOption .= ' data-pagination="false"'; }
		if ($arrows !== 'hide') { $addOption .= ' data-navigation="true"'; $bullets = $arrows; }
		$return .= '<div class="owlslider text-'.$bullets.'" '.$addOption.'>'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($newContent)).'</div>';
	}
	
	return $return;
	
}
add_shortcode('sr_gallery', 'sr_gallery');



function sr_galleryitem( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'id' => '',
      'lightbox' => 'no',
      'url' => '',
      'video' => '',
      'type' => '',
      'col' => '',
      'crop' => 'no',
      'size' => '600'
      ), $atts ) );
	
	
	$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
	$img_big = wp_get_attachment_image_src($id, 'slider-pic');
	if ($type == 'gallery') {
		$el = 'li';
		$elClass = '';
		if ($crop == 'yes') {
			if ($col == '2') { $img_thumb = wp_get_attachment_image_src($id, 'slider-pic-crop'); } else
			if ($col == '3') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-big-crop'); } else
			if ($col == '4') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-big-crop'); } else
			if ($col == '5') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-medium-crop'); } else
			if ($col == '6') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-medium-crop'); } 
		} else {
			if ($col == '2') { $img_thumb = wp_get_attachment_image_src($id, 'slider-pic'); } else
			if ($col == '3') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-big'); } else
			if ($col == '4') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-big'); } else
			if ($col == '5') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-medium'); } else
			if ($col == '6') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-medium'); } 
		}
	} else if ($type == 'masonry') {
		$el = 'div';
		$elClass = ' class="masonry-item"';
		if ($size == '300') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-medium'); } else
		if ($size == '420') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-medium'); } else
		if ($size == '600') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-big'); } else
		if ($size == '800') { $img_thumb = wp_get_attachment_image_src($id, 'thumb-big'); } else
		{ $img_thumb = wp_get_attachment_image_src($id, 'thumb-big'); }		
	} else if ($type == 'slider') {
		$el = 'div';
		$elClass = '';
		$img_thumb = wp_get_attachment_image_src($id, 'slider-pic');
	}
	
	
	if ($lightbox == 'yes') {
		return '<'.$el.$elClass.'><a href="'.esc_url($img_big[0]).'" rel="gallery_sc" class="openfancybox"><img src="'.esc_url($img_thumb[0]).'" alt="'.esc_attr($alt).'"/></a></'.$el.'>';
	} else {
		return '<'.$el.$elClass.'><img src="'.esc_url($img_thumb[0]).'" alt="'.$alt.'"/></'.$el.'>';
	}		
	
}
add_shortcode('sr_gitem', 'sr_galleryitem');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Carousel
/*-----------------------------------------------------------------------------------*/
function sr_carousel( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'items' => '4',
      'pagination' => 'yes',
      'autoplay' => '6000'
      ), $atts ) );
	
	global $sr_prefix;
		
	return '<div class="owlcarousel content-carousel" data-autoplay="'.esc_attr($autoplay).'" data-pagination="'.esc_attr($pagination).'" data-items="'.esc_attr($items).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</div>';
	
	
}
add_shortcode('sr_carousel', 'sr_carousel');



function sr_carouselitem( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'id' => '',
      ), $atts ) );
	
	$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
	$img_thumb = wp_get_attachment_image_src($id, 'thumb-medium-crop');
	
	return '<div class="align-center"><img src="'.esc_url($img_thumb[0]).'" alt="'.esc_attr($alt).'"/></div>';
	
}
add_shortcode('sr_citem', 'sr_carouselitem');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Google Map
/*-----------------------------------------------------------------------------------*/
function sr_mapshortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'latlong' => '-33.86938,151.204834',
      'icon' => get_template_directory_uri().'/files/images/map-pin.png',
      'style' => 'height:400px;',
      'id' => '0',
      'color' => 'default',
      'fullwidth' => 'no'
      ), $atts ) );
	
	$text = preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));
	
	$return = '';
	if ($fullwidth == 'yes') { $return .= '</div>'; }	
	$return .= sr_googleMap($latlong, $text, $icon, $style, 1, '', $color);
	if ($fullwidth == 'yes') { if(is_single() && get_post_type() == 'post'){$return .='<div class="wrapper-small">';}else{ $return.= '<div class="wrapper">'; }}	
	
	return $return;
	
}
add_shortcode('googlemap', 'sr_mapshortcode');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Separator
/*-----------------------------------------------------------------------------------*/
function sr_separator( $atts, $content = null )
{		
	extract( shortcode_atts( array(
      'size' => 'separator-small',
      'align' => 'center'
      ), $atts ) );
	  
	return '<div class="'.esc_attr($size).' align-'.esc_attr($align).'"><span></span></div>';	
}
add_shortcode('separator', 'sr_separator');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Section Title
/*-----------------------------------------------------------------------------------*/
function sr_title( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'type' => '',
      'size' => 'h4',
      'style' => '',
      'bigletter' => '',
      'alignment' => 'center'
      ), $atts ) );	
	  
	  
	$return =   '<'.$size.' class="'.esc_attr($style).' '.esc_attr($type).' align-'.esc_attr($alignment).'" data-bigletter="'.esc_attr($bigletter).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</'.$size.'>';
	return $return;	
}
add_shortcode('title', 'sr_title');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Horizontal Section
/*-----------------------------------------------------------------------------------*/
function sr_horizontalsection( $atts, $content = null )
{		
	extract( shortcode_atts( array(
      'background' => '',
      'textcolor' => 'text-light',
      'pdtop' => '120',
      'pdbottom' => '120',
	  
      'colorbg' => '',
	  
	  'imagebg' => '',
      'imageparallax' => 'true',
	  
	  'videomp4' => '',
      'videowebm' => '',
      'videoogv' => '',
      'videowidth' => '',
      'videoheight' => '',
      'videoposter' => '',
      'videoparallax' => 'false',
      'videooverlay' => '',
      'videooverlayopacity' => '5'
      ), $atts ) );
		
	$styleInner = 'padding-top:'.esc_attr($pdtop).'px;';
	$styleInner .= 'padding-bottom:'.esc_attr($pdbottom).'px;';
	$classMain = $textcolor;
	
	$return = '</div>'; // close .wrapper
	if ($background == 'color') {
		$styleMain = 'background:'.esc_attr($colorbg).';';
		$return .= '
			<div class="horizontalsection '.esc_attr($classMain).'" style="'.$styleMain.'">
				<div class="horizontalinner" style="'.$styleInner.'">
				<div class="wrapper">
				'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
				</div>
				</div>
			</div>
		';	
	} else if ($background == 'image') {
		if ($imageparallax == 'true') { $classMain.= ' parallax-section'; $dataMain = 'data-parallax-image="'.esc_attr($imagebg).'"'; $styleMain = ''; }
		else { $styleMain= 'background:url('.esc_url($imagebg).') center center; background-size:cover;'; $dataMain = ''; }
		$return .= '
			<div class="horizontalsection '.esc_attr($classMain).'" style="'.$styleMain.'" '.$dataMain.'>
				<div class="horizontalinner" style="'.$styleInner.'">
				<div class="wrapper">
				'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
				</div>
				</div>
			</div>
		';	
	} else if ($background == 'video') {
		$classMain.= ' videobg-section'; $dataMain = 'data-videomp4="'.esc_attr($videomp4).'" data-videowebm="'.esc_attr($videowebm).'" data-videooga="'.esc_attr($videoogv).'" data-videowidth="'.esc_attr($videowidth).'" data-videoheight="'.esc_attr($videoheight).'" data-videoposter="'.esc_attr($videoposter).'" data-videoparallax="'.esc_attr($videoparallax).'" data-videooverlaycolor="'.esc_attr($videooverlay).'" data-videooverlayopacity="0.'.esc_attr($videooverlayopacity).'"'; 
		$return .= '
			<div class="horizontalsection '.esc_attr($classMain).'" '.$dataMain.'>
				<div class="horizontalinner" style="'.$styleInner.'">
				<div class="wrapper">
				'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
				</div>
				</div>
			</div>
		';	
	}
	if(is_single() && get_post_type() == 'post'){$return .='<div class="wrapper-small">';}else{ $return.= '<div class="wrapper">'; } // reopen .wrapper
	return $return;
	
}
add_shortcode('horizontalsection', 'sr_horizontalsection');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Split Section
/*-----------------------------------------------------------------------------------*/
function sr_splitsection( $atts, $content = null )
{		
	extract( shortcode_atts( array(
      'position' => 'left',
      'order' => 'left',
	  'size' => 'split-half',
	  'background' => 'false',
	  'csize' => 'split-wrapped-content',
	  'valign' => 'false',
      'textcolor' => 'text-dark',
	  
      'colorbg' => '',
	  
	  'imagebg' => '',
      'imageparallax' => 'true',
	  
	  'videomp4' => '',
      'videowebm' => '',
      'videoogv' => '',
      'videowidth' => '',
      'videoheight' => '',
      'videoposter' => '',
      'videoparallax' => 'false',
      'videooverlay' => '',
      'videooverlayopacity' => '5',

      'maplatlong' => '',
      'mapicon' => '',
      'mapcolor' => 'default',
      'style' => ''
      ), $atts ) );
	  
		
	$return = ''; 
	if ($position == 'left' && $order == 'left' || $position == 'right' && $order == 'right') { $return .= '</div><div class="split-section clearfix">'; } // close .wrapper & open split
	
	$return .= '<div class="split-'.$position.' '.$size.' '.$textcolor.'">';
	
		
		if ($valign == 'true') { $align = 'vertical-center'; } else { $align = ''; }
		if ($background !== 'map') {	$return .= '<div class="'.$csize.' '.$align.'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</div>';	}
		
		if ($background == 'color') {
			$return .= '<div class="split-bg" style="background:'.$colorbg.';"></div>';
		} else if ($background == 'image') {
			if ($imageparallax == 'true') { $classSplit = ' parallax-section'; $dataSplit = 'data-parallax-image="'.$imagebg.'"'; $styleSplit = ''; }
			else { $styleSplit = 'style="background:url('.$imagebg.') center center; background-size:cover;"'; $dataSplit = ''; $classSplit = ''; }
			$return .= '<div class="split-bg '.$classSplit.'" '.$styleSplit.' '.$dataSplit.'></div>';
		} else if ($background == 'video') {
			$classSplit = ' videobg-section'; 
			$dataSplit = 'data-videomp4="'.$videomp4.'" data-videowebm="'.$videowebm.'" data-videooga="'.$videoogv.'" data-videowidth="'.$videowidth.'" data-videoheight="'.$videoheight.'" data-videoposter="'.$videoposter.'" data-videoparallax="'.$videoparallax.'" data-videooverlaycolor="'.$videooverlay.'" data-videooverlayopacity="0.'.$videooverlayopacity.'"';
			$return .= '<div class="split-bg '.$classSplit.'" '.$dataSplit.'></div>';
		} else if ($background == 'map') {
			$return .= '<div class="split-bg">'.sr_googleMap($maplatlong, preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)), $mapicon, $style, 999, '',$mapcolor).'</div>';
		}
		
	$return .= '</div> <!-- END .split-'.$position.' -->';
	
	if ($position == 'left' && $order == 'right' || $position == 'right' && $order == 'left') { $return .= '</div> <!-- END .split-section -->';
		if(is_single() && get_post_type() == 'post'){$return .='<div class="wrapper-small">';}else{ $return.= '<div class="wrapper">'; } // reopen .wrapper
	}
	return $return;	
}
add_shortcode('splitsection', 'sr_splitsection');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Selfhosted Audio
/*-----------------------------------------------------------------------------------*/
function sr_selhostedtaudio( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'mp3' => '',
      'oga' => '',
      'pic' => '',
      'id' => '0'
      ), $atts ) );
	
	$picid = sr_get_attachment_id_from_src($pic);
	$picimage = wp_get_attachment_image($picid, 'full');
	
	return $picimage.''.sr_selfaudio($mp3, $oga, $pic, $id);
	
}
add_shortcode('selhostedtaudio', 'sr_selhostedtaudio');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Selfhosted Video
/*-----------------------------------------------------------------------------------*/
function sr_selhostedtvideo( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'm4v' => '',
      'oga' => '',
      'webmv' => '',
      'pic' => '',
      'id' => '0'
      ), $atts ) );
	
	return sr_selfvideo($m4v, $oga, $webmv, $pic, $id);
	
}
add_shortcode('selhostedtvideo', 'sr_selhostedtvideo');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Spacer
/*-----------------------------------------------------------------------------------*/
function sr_spacer( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'size' => 'big'
      ), $atts ) );
	
	return '<div class="spacer spacer-'.esc_attr($size).'"></div>';
	
}
add_shortcode('spacer', 'sr_spacer');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Wrapper Small
/*-----------------------------------------------------------------------------------*/
function sr_wrappersmall( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'size' => 'big'
      ), $atts ) );
	
	$return = '</div><div class="wrapper-small">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</div>';
	if(is_single() && get_post_type() == 'post'){$return .='<div class="wrapper-small">';}else{ $return.= '<div class="wrapper">'; } // reopen .wrapper
	return $return;
	
}
add_shortcode('wrapper_small', 'sr_wrappersmall');





/*-----------------------------------------------------------------------------------*/
/*	Register Buttons
/*-----------------------------------------------------------------------------------*/
function init_buttons() {
	// If user has permission
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_buttons_plugin");
		add_filter('mce_buttons', 'register_buttons');
	}
}
add_action('init', 'init_buttons');

function add_buttons_plugin($plugin_array) {
   $plugin_array['popupbutton'] = get_template_directory_uri() . '/theme-admin/shortcodes/tinymcepopup.js';
	return $plugin_array;
}

function register_buttons($buttons) {
	array_push( $buttons, "popup" );
	return $buttons;
}



/*-----------------------------------------------------------------------------------*/
/*	Wordpress Bugfix for shortcodes (paragraph issue)
/*-----------------------------------------------------------------------------------*/
add_filter("the_content", "the_content_filter");
 
function the_content_filter($content) {
 
	// array of custom shortcodes requiring the fix
	$block = join("|",array(	"accordiongroup",
								"accordion",
								"alert",
								"column_row",
								"contactgroup",
								"counter",
								"field",
								"horizontalsection",
								"iconbox",
								"quoteslider",
								
								"one_half",
								"one_half_last",
								"one_third",
								"one_third_last",
								"two_third",
								"two_third_last",
								"one_fourth",
								"one_fourth_last",
								"two_fourth",
								"two_fourth_last",
								"three_fourth",
								"three_fourth_last",
								"one_fifth",
								"one_fifth_last",
								"team_member",
								"team_list",
								
								"tabs",
								"tab",
								"title",
								"toggle",
								"separator",
								"skill",
								"sr_carousel",
								"sr_citem",
								"sr_gallery",
								"sr_gitem",
								"spacer",
								"splitsection",
								"wrapper_small"
								));
	 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	return $rep;
 
}


?>