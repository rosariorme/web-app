<?php

global $sr_prefix;

?>

<?php if(has_post_thumbnail()) { ?>
    <div class="blog-media">
		<?php the_post_thumbnail('thumb-big'); ?>
	</div> <!-- END .entry-media -->
<?php } ?>