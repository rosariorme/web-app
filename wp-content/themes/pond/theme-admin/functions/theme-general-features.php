<?php

/*-----------------------------------------------------------------------------------

	General Frontend theme features

-----------------------------------------------------------------------------------*/
global $sr_prefix;



/*-----------------------------------------------------------------------------------*/
/*	Ajax Loader (Isotope)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_load_more_callback' ) ) {
	function sr_load_more_callback() {
		global $wpdb;
		global $sr_prefix;
		
		$page = intval( $_POST['page'] );
		$type =  $_POST['type'];
		$tax =  $_POST['tax'];
		
		if ($type == 'post') {
			query_posts( array(
				'post_type' => array('post'),
				'paged' => $page,
				'cat' => $tax
				) 
			);
			get_template_part( 'includes/loop', 'blog');
		} 
		else if ($type == 'portfolio') {
			$sr_portfoliocount = get_option($sr_prefix.'_portfoliocount');
			$taxes = explode(',',$tax);
			if ($taxes[0] == '' && count($taxes) < 2) { $taxquery = false; } else {
				$taxquery = array(
										array(
											'taxonomy' => 'portfolio_category',
											'field' => 'slug',
											'terms' => $taxes
										)
									);
			}
			
			query_posts( array(
				'posts_per_page'=> $sr_portfoliocount,
				'paged' => $page,
				'm' => get_query_var('m'),		   
				'w' => get_query_var('w'),
				'post_type' => array('portfolio'),
				'tax_query' => $taxquery
				) 
			);
			$portfoliolayout = get_option($sr_prefix.'_portfoliolayout');
			if (!$portfoliolayout) { $portfoliolayout = 'fullwidth'; }
			if ($portfoliolayout == 'fullwidth') {
				$portfoliosize = get_option($sr_prefix.'_portfoliosize');
				if (!$portfoliosize) { $portfoliosize = 'full-layout-big'; }
			} 
			global $portfoliosize;
			while (have_posts()) : the_post(); 
				get_template_part( 'includes/loop', 'portfolio');
			endwhile;
		}
		
		die(); // this is required to return a proper result
	}
}
add_action('wp_ajax_nopriv_sr_load_more', 'sr_load_more_callback'); 
add_action('wp_ajax_sr_load_more', 'sr_load_more_callback');



/*-----------------------------------------------------------------------------------*/
/*	Load more button (isotope)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'loadmore' ) ) {
	function loadmore($type, $max_num_page, $tax, $related, $class = null) {
		if (!$type) { $type = 'post'; }
		if ($max_num_page > 1) { 
			echo '<div id="load-more" class="'.esc_attr($class).'"><a href="#" data-maxnumpage="'.esc_attr($max_num_page).'" data-type="'.esc_attr($type).'" data-tax="'.esc_attr($tax).'" data-related="'.esc_attr($related).'">'.__('Load More', 'sr_pond_theme').'</a>
			<div class="loader-bar"><div class="bar-progress"></div></div>
			</div>';
		}
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Blog Metas
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_getBlogMeta' ) ) {
	function sr_getBlogMeta() {
		global $wp_query;	
		global $sr_prefix;
		
		// CATEGORY
		if ( !get_option($sr_prefix.'_blogpostsdisablecategory')) {
			$categories = get_the_category();
			$separator = ', ';
			$output = '';
			if($categories){
				$output .= '<span>in</span> ';
				foreach($categories as $category) {
					$output .= 	'<a class="cat-link transition" href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'sr_pond_theme' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
				}
				$metacategory = trim($output, $separator);
			} else { $metacategory = '';  }
		} else { $metacategory = '';  }
				
		
		// AUTHOR
		$metaauthor = '';
		if (!get_option($sr_prefix.'_blogpostsdisableauthor')) {
			/*$author_id = $wp_query->post->post_author;
			$author_name = get_the_author_meta('nickname',$author_id);
			$author_name = get_the_author_meta('nickname',$author_id);
			$metaauthor = __( "By", 'sr_pond_theme' ).' '.$author_name.' ';*/
     	}
		
		if ($metaauthor || $metacategory ) {
		return $metaauthor.$metacategory;
		}
				
		
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Pagination for pages
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_pagination' ) ) {
	function sr_pagination($prevtext = 'Previous', $nexttext = 'Next' )
	{
		global $query;
				
		// No pagination on single sites
		if(!is_single())	
		{	
			if ( get_option( 'page_on_front' ) == get_the_ID() ) { $current = get_query_var('page') == 0 ? 1 : get_query_var('page'); } 
			else { $current = get_query_var('paged') == 0 ? 1 : get_query_var('paged'); }
			$total = $query->max_num_pages;																
			
			// If there are more than 1 page
			if($total > 1)	
			{				
				echo '<ul id="blog-pagination" class="entries-pagination">';
				
				// Future-Button
				if ($current == 1) { $nextdisable = 'inactive'; } else { $nextdisable = '';  }
				echo '<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url(get_pagenum_link($current-1)).'" title="'.esc_attr($nexttext).'" class="transistion">'.$nexttext.'</a></li>';	
				
				// Past-Button
				if ($current == $total) { $prevdisable = 'inactive'; } else { $prevdisable = '';  }
				echo '<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url(get_pagenum_link($current+1)).'" title="'.esc_attr($prevtext).'" class="transistion">'.$prevtext.'</a></li>';
				
				echo '</ul> <!-- END #entries-pagination -->';
			} 
		}
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Pagination on single item view
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_singlepagination' ) ) {
	function sr_singlepagination($type,$id,$class,$prevtext = 'Previous', $nexttext = 'Next' ) {
		global $sr_prefix;
		
		$prev_item = get_adjacent_post(false,'',false) ; 
		$next_item = get_adjacent_post(false,'',true) ;
		
		if (is_single() && get_post_type() == 'portfolio' ) { $closelink = get_permalink( get_option($sr_prefix.'_portfoliopage') ); }
		else if (is_single() && get_post_type() == 'post' ) { $closelink = get_permalink( get_option('page_for_posts') ); }
			
			$idAdd = '';
			if ($id && $id !== '') { $idAdd = ' id="'.esc_attr($id).'"'; }
			echo '<ul'.$idAdd.' class="'.esc_attr($class).'">';
			
			
			if ($next_item && $next_item->ID) { 
				$next_post = get_post($next_item->ID);
				$nextdisable = ''; 
				$nextlink = get_permalink( $next_item->ID ); 
				$nexttitle = $next_post->post_title; 
				$nextslug = $next_item->post_name; 
				$nextid = $next_item->ID; 
			} else { 
				$nextdisable = 'inactive'; 
				$nextlink = '#'; 
				$nexttitle = ''; 
				$nextslug = ''; 
				$nextid =''; 
			}
				echo '	<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url($nextlink).'" title="'.esc_attr($nexttitle).'" class="transition" data-name="'.esc_attr($nexttitle).'">
						<i class="pagination-icon"></i> '.$nexttext.' <i class="pagination-icon"></i></a></li>'; 
			
			
			if ($prev_item && $prev_item->ID) { 
				$prev_post = get_post($prev_item->ID);
				$prevdisable = ''; 
				$prevlink = get_permalink( $prev_item->ID ); 
				$prevtitle = $prev_post->post_title; 
				$prevslug = $prev_item->post_name; 
				$previd = $prev_item->ID; 
			} else { 
				$prevdisable = 'inactive'; 
				$prevlink = '#'; 
				$prevtitle = ''; 
				$prevslug = ''; 
				$previd = ''; 
			}
				echo '	<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url($prevlink).'" title="'.esc_attr($prevtitle).'" class="transition" data-name="'.esc_attr($prevtitle).'">
						<i class="pagination-icon"></i> '.$prevtext.' <i class="pagination-icon"></i></a></li>';			
				
			echo '</ul>';
		
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Share
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_Share' ) ) {
	function sr_Share($type) {
		global $sr_prefix;
		global $wp_query;	
			
		$postid = $wp_query->post->ID;
		$og_img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'medium' );;
		$og_img = $og_img[0];
		
			?>
		<ul class="socialmedia-widget">
			<li class="facebook"><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','','width=900, height=500, toolbar=no, status=no'); return(false);"></a></li>
			
			<li class="twitter"><a href="" onclick="window.open('https://twitter.com/intent/tweet?text=Tweet%20this&amp;url=<?php the_permalink(); ?>','','width=650, height=350, toolbar=no, status=no'); return(false);"></a></li>
			
			<li class="googleplus"><a href="" onclick="window.open('https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>&amp;image<?php echo $og_img; ?>','','width=900, height=500, toolbar=no, status=no'); return(false);"></a></li>
			
			<li class="pinterest"><a href="" onclick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $og_img; ?>&amp;url=<?php the_permalink(); ?>','','width=650, height=350, toolbar=no, status=no'); return(false);"></a></li>
		</ul>
            <?php
		
	}						
}





/*-----------------------------------------------------------------------------------*/
/*	FILTER
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_filter' ) ) {
	function sr_filter($cats,$id,$class,$rel) {
		global $sr_prefix;
		global $wp_query;	
			
		echo '<ul id="'.esc_attr($id).'" class="'.esc_attr($class).'" data-related-grid="'.esc_attr($rel).'">
			<li><a class="active" data-option-value="*">All</a></li>';
		foreach ($cats as $c) { 
				$term = get_term_by('slug', $c, 'portfolio_category');
				$termlink = get_term_link($c, 'portfolio_category');
				if ($c !== '') {
				echo '<li><a data-option-value=".'.esc_attr($c).'" href="'.esc_url($termlink).'" title="'.esc_attr($term->name).'">'.$term->name.'</a></li>';
		} } 
		echo '</ul>';
		
	}						
}


?>