<?php 

global $sr_prefix;

?>
	<?php if ( !is_404() ) { ?>
    
		<?php if (!get_option($sr_prefix.'_disablebacktotop') || get_option($sr_prefix.'_footerlogo') || !get_option($sr_prefix.'_socialdisable') || get_option($sr_prefix.'_copyright_text')) { 
		
		/* FOOTER SETTINGS */
		if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } else { $theId = get_option( 'page_for_posts' ); }
		
		$footerStyle = get_post_meta($theId, $sr_prefix.'_footerstyle', true);
		if ($footerStyle == 'sticky-footer') { $footerStyle .= ' stickonload'; } 
		/* FOOTER SETTINGS */
		
		?>
		<!-- FOOTER -->  
		<footer class="<?php echo esc_attr($footerStyle); ?>">
			<div class="footer-inner wrapper">
				<?php if (!get_option($sr_prefix.'_disablebacktotop')) { ?>
				<a id="backtotop" href="#">To Top</a>
				<?php } ?>
				
				<?php if(!get_option($sr_prefix.'_socialdisable')) { sr_get_sociallinks('left-float'); } ?>
				
				<?php if(get_option($sr_prefix.'_copyright_text')) { ?>
				<div class="copyright right-float"><?php echo stripslashes(get_option($sr_prefix.'_copyright_text')) ?></div>
				<?php } ?>
         	</div>
    	</footer>
      	<!-- FOOTER --> 
		<?php } ?>
	
	</div> <!-- END #page-body -->
	<!-- PAGEBODY -->
	
    <?php } ?>
    
</div> <!-- END #page-content -->
<!-- PAGE CONTENT -->

<div id="pseudo-header"></div>

<?php wp_footer(); ?>

</body>
</html>