<?php
global $sr_prefix;

//get template header
get_header();

$image = get_option($sr_prefix.'_404_image_image');
$textcolor = get_option($sr_prefix.'_404_image_textcolor');
$text = get_option($sr_prefix.'_404_image_text');

?>
       
        <!-- 404 -->
        <section id="page-title" class="full-height" style="background:url(<?php if ($image) { echo esc_url($image); } ?>) center center;background-size:cover;">
            <div class="section-inner align-center text-<?php echo esc_attr($textcolor); ?>">
                <h1 data-bigletter="404"><strong>404</strong></h1> 
                <div class="separator"><span></span></div>
                <h5 class="alttitle title-minimal"><?php echo stripslashes($text); ?></h5>
            </div>
        </section>
        <!-- 404 --> 
        
<?php get_footer(); ?>