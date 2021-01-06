<?php 
global $sr_prefix;
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- scaling not possible (for smartphones, ipad, etc.) -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?><?php wp_title(" | "); ?> | <?php bloginfo('description'); ?></title>

<?php sr_get_social_metas(); ?>
<?php wp_head(); ?>

</head>

<?php 
$bClass = 'bordered'; 
if (get_option($sr_prefix.'_viewportborder') == 'bigborder') { $bClass .= ' big-border'; } 
else if (get_option($sr_prefix.'_viewportborder') == 'noborder') { $bClass = ''; } ?>
<body <?php body_class($bClass); ?>>

<?php if ($bClass !== '') { ?>
<!-- BORDERS -->
<div id="bodyborder-left"></div>
<div id="bodyborder-right"></div>
<div id="bodyborder-top"></div>
<div id="bodyborder-bottom"></div>
<!-- BORDERS -->
<?php } ?>

<?php if (!get_option($sr_prefix.'_disablepreloader')) { ?>
<!-- PAGELOADER -->
<div id="page-loader" class="text-light">
	<div class="page-loader-inner">
		<?php 
			if (get_option($sr_prefix.'_preloaderlogo') == 'light') { $loaderLogo = get_option($sr_prefix.'_logolight'); } 
			else if (get_option($sr_prefix.'_preloaderlogo') == 'dark') { $loaderLogo = get_option($sr_prefix.'_logodark');  }
			else { $loaderLogo = get_option($sr_prefix.'_custompreloaderlogo');  }
		?>
    	<div class="loader-logo-name"><?php if ($loaderLogo) { ?><img src="<?php echo esc_url($loaderLogo); ?>" alt=""/><?php } ?></div>
		<h6 class="alttitle title-minimal">Loading</h6>
	</div>
</div>
<!-- PAGELOADER -->
<?php } ?>

<!-- PAGE CONTENT -->
<div id="page-content" <?php if (!get_option($sr_prefix.'_disablefixedheader')) { ?>class="fixed-header"<?php } ?>>
	
	<?php
		/* HEADER SETTINGS */
		if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } else { $theId = get_option( 'page_for_posts' ); }
		
		$showPagetitle = get_post_meta($theId, $sr_prefix.'_showpagetitle', true);
		if (is_tag() || is_category() || is_search() || is_archive() || is_tax()) { $showPagetitle = "default"; }
		$headerStyle = get_post_meta($theId, $sr_prefix.'_headerstyle', true);
		$overlayLogo = get_post_meta($theId, $sr_prefix.'_overlaylogo', true);
		$overlayMenu = get_post_meta($theId, $sr_prefix.'_overlaymenu', true);
		$overlayPosition = get_post_meta($theId, $sr_prefix.'_overlayposition', true);
		
		$classHeader = 'non-overlay';
		$logoHeader = get_option($sr_prefix.'_logolight');
		$classMenu = '';
		if ($headerStyle == 'overlay') { $classHeader = 'overlay-'.$overlayPosition; } else if ($headerStyle == 'sticky') { $classHeader = 'sticky-header';  }
		if ($overlayLogo == 'dark' ) { $logoHeader = get_option($sr_prefix.'_logodark'); }
		if ($overlayMenu == 'dark' ) { $classMenu = 'nav-dark'; }
		if ($showPagetitle == 'default' && $headerStyle == 'overlay') { 
			$classHeader = 'non-overlay'; 
			$logoHeader = get_option($sr_prefix.'_logolight');
			$classMenu = '';
		}
		/* HEADER SETTINGS */
	?>
	
	<!-- HEADER -->
	<header id="header" class="<?php echo esc_attr($classHeader); ?>">        
		<div class="header-inner clearfix">
			
			<?php if (	(is_single() && get_post_type() == 'portfolio'  && get_option($sr_prefix.'_portfolioaltheader') !== 'false') || 
						(is_single() && get_post_type() == 'post'  && get_option($sr_prefix.'_blogaltheader') !== 'false')) { ?>
			<!-- FIXED HEADER CONTENT -->
			<div class="fixed-header-content"> 
				<h1 id="header-name" class="alttitle title-minimal left-float"><strong><?php  wp_title(""); ?></strong></h1>
				
				<?php if (get_post_type() == 'portfolio' && get_option($sr_prefix.'_portfoliobacktoworks') !== 'false') { ?>
                    <a href="<?php sr_get_backtoworks_link(); ?>" id="backtoworks" class="transition">
                    	<span class="icon"></span>
                    	<span class="text"><?php _e("Back to Works", 'sr_pond_theme'); ?></span>
                    </a>
				<?php } ?>
				
				<?php if (get_post_type() == 'portfolio'  && !get_option($sr_prefix.'_portfoliodisableshare') || get_post_type() == 'post'  && !get_option($sr_prefix.'_blogdisableshare')) { ?>
				<div id="social-share" class="right-float">
					<a href="#" class="show-share"><?php _e("Share", 'sr_pond_theme'); ?></a>
					<?php sr_Share(get_post_type()); ?>
				</div>
				<?php } ?>
			</div>
			<!-- FIXED HEADER CONTENT -->
			<?php } ?>
			
           <!-- DEFAULT HEADER CONTENT -->
		   	<div class="default-header-content">                 
				<div id="logo" class="<?php if (get_option($sr_prefix.'_headerlogomenu') == 'opposite') { ?>right-float<?php } else { ?>left-float<?php } ?>">
					<?php if ($logoHeader) { ?><a id="default-logo" class="logotype" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($logoHeader); ?>" alt="Logo"></a><?php } ?>
					<?php if (get_option($sr_prefix.'_logodark')) { ?><a id="fixed-logo" class="logotype" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_option($sr_prefix.'_logodark')); ?>" alt="Logo"></a><?php } ?>
				</div>    
				
				<?php if(has_nav_menu('primary-menu')) {  ?>
				<div class="menu <?php if (get_option($sr_prefix.'_headerlogomenu') == 'opposite') { ?>left-float<?php } else { ?>right-float<?php } ?> clearfix">
					
                    <?php if (get_option($sr_prefix.'_headermenuappearence') == 'traditional') { ?>
                    	<?php	
							wp_nav_menu(  
								array(  
									'theme_location'  => 'primary-menu', 
									'container'       => 'nav',  			        
									'container_id'    => 'traditional-nav',  
									'container_class' => '',  
									'menu_class'      => $classMenu, 
									'menu_id'         => 'primary' ,
									'before'          => '',
									'after'           => '',
									'walker' 			=> new sr_menu_output()
								)
							);  
						?>
                    <?php } ?>
                    
                    
                    <a href="#" class="open-nav <?php echo esc_attr($classMenu); ?>"><span class="hamburger"></span>
                    <?php if (get_option($sr_prefix.'_headermenuappearence') == 'texticon') { ?>
                    <span class="open-nav-text">Menu</span>
                    <?php } ?>
                    </a>
					<nav id="main-nav" class="text-light">
						<div class="nav-logo"><?php if (get_option($sr_prefix.'_logolight')) { ?><img src="<?php echo esc_url(get_option($sr_prefix.'_logolight')); ?>" alt="Logo Menu"><?php } ?></div>
						<?php	
							wp_nav_menu(  
								array(  
									'theme_location'  => 'primary-menu', 
									'container'       => 'div',  			        
									'container_id'    => '',  
									'container_class' => 'nav-inner',  
									'menu_class'      => '', 
									'menu_id'         => 'primary' ,
									'before'          => '',
									'after'           => '',
									'walker' 			=> new sr_menu_output()
								)
							);  
						?>
						<?php if(!get_option($sr_prefix.'_socialdisable')) { ?>
						<div class="nav-social"><?php sr_get_sociallinks(false); ?></div>
						<?php } ?>
						<div class="nav-bg"></div>
					</nav>
				</div>
				<?php } // END if has_nav_menu ?>
			</div>
           <!-- DEFAULT HEADER CONTENT -->
                    
		</div> <!-- END .header-inner -->
	</header> <!-- END header -->
	<!-- HEADER -->
	
    <?php if ( !is_404() ) { ?>
    
	<?php $inHeader = true; include(locate_template('includes/page-title.php')); $inHeader = false; ?>
	
	<!-- PAGEBODY -->
	<div id="page-body">
    
    <?php } ?>