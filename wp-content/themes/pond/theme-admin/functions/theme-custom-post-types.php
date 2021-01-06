<?php


/*-----------------------------------------------------------------------------------

	CUSTOM POST TYPES 

-----------------------------------------------------------------------------------*/
global $sr_prefix;


/*-----------------------------------------------------------------------------------*/
/*	Register new Post-type
/*-----------------------------------------------------------------------------------*/
add_action('init', 'sr_portfolio_post_type');

function sr_portfolio_post_type(){
	
	register_post_type('portfolio', array(
		'labels' => array(
				'name' => __("Portfolio", 'sr_pond_theme'),
				'singular_name' => __("Project", 'sr_pond_theme')
			),
		'public' => true,
		'show_ui' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'comments'),
		'menu_icon' => get_stylesheet_directory_uri() . '/theme-admin/functions/images/portfolio.png',
		'rewrite' => array(
			'slug' => 'portfolio',
			'with_front' => false
			),
		'has_archive' => false,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'exclude_from_search' => true,
		'publicly_queryable' => true
	) );
	
}




/*-----------------------------------------------------------------------------------*/
/*	Add taxonomies
/*-----------------------------------------------------------------------------------*/
add_action('init', 'sr_portfolio_taxonomies', 0);

function sr_portfolio_taxonomies(){
	
	// Categories Portfolio
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'label' => __("Portfolio categories", 'sr_pond_theme'),
			'query_var' => true,
			'rewrite' => true
		)
	);
	
	
}




/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/
add_filter("manage_posts_columns", "sr_posts_edit_columns");
function sr_posts_edit_columns($columns){
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => 'Title',
		'author' => 'Author',
		'categories' => 'Categories',
		'tags' => 'Tags',
		'comments' => '<span class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></span>',
		//'viewslikes' => __("Views / Likes", 'sr_pond_theme'),
		'date' => 'Date'
	);
    return $columns;  
}

add_filter("manage_edit-portfolio_columns", "sr_portfolio_edit_columns");
function sr_portfolio_edit_columns($columns){
	$columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => __("Title", 'sr_pond_theme'),
		"portfolio_category" => __("Category", 'sr_pond_theme'),
		//"portfolio_tags" => __("Tags", 'sr_pond_theme'),
		//"viewslikes" => __("Views / Likes", 'sr_pond_theme'),
		"date" => __("Date", 'sr_pond_theme')
	);
	return $columns;
}



add_action("manage_posts_custom_column",  "sr_portfolio_custom_columns");
function sr_portfolio_custom_columns($column){
	global $post;
	global $sr_prefix;
	switch ($column){
		case "intro":
			$custom = get_post_custom();
			if ( isset($custom[$sr_prefix."_intro"][0]) && $custom[$sr_prefix."_intro"][0] !== '' ) { echo  $custom[$sr_prefix."_intro"][0]; }
		break;
		case "portfolio_category":
			if (get_the_term_list($post->ID, 'portfolio_category', '', ', ','') !== '') { $val = wp_get_object_terms($post->ID, 'portfolio_category'); foreach($val as $v){ echo $v->name . ', '; }  }
		break;
		case "portfolio_tags":
			if (get_the_term_list($post->ID, 'portfolio_tags', '', ', ','') !== '') { $val = wp_get_object_terms($post->ID, 'portfolio_tags'); foreach($val as $v){ echo $v->name . ', ';	}  }
		break;
		case "viewslikes":
			echo sr_getPostMeta(get_the_ID(), 'views').' / '.sr_getPostMeta(get_the_ID(), 'likes');
		break;
		
	}
}


add_filter('manage_media_columns', 'posts_columns_attachment_id', 1);
add_action('manage_media_custom_column', 'posts_custom_columns_attachment_id', 1, 2);
function posts_columns_attachment_id($defaults){
    $defaults['wps_post_attachments_id'] = __('ID');
    return $defaults;
}
function posts_custom_columns_attachment_id($column_name, $id){
        if($column_name === 'wps_post_attachments_id'){
        echo $id;
    }
}

?>