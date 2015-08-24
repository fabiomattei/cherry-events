<?php

/**
 * adding shortcode to display the events
 */
function RCEV_events_list($atts, $content){
	
	global $post;
	
	extract( shortcode_atts( array( // a few default values
		'posts_per_page' => '1',
		'post_type' => 'film',
		'caller_get_posts' => 1)
		, $atts));

	$posts = new WP_Query($atts);
	$output = '';
	
	if ($posts->have_posts())
	    while ($posts->have_posts()):
	        $posts->the_post();
	        $out = '<div class="film_box">
	            <h4>Film Name: <a href="'.get_permalink().'" title="' . get_the_title() . '">'.get_the_title() .'</a></h4>
	            <p class="Film_desc">'.get_the_content().'</p>';
	            // add here more...
	        $out .='</div>';
			
	/* these arguments will be available from inside $content
	    get_permalink()  
	    get_the_content()
	    get_the_category_list(', ')
	    get_the_title()
	    and custom fields
	    get_post_meta($post->ID, 'field_name', true);
	*/
	
		endwhile;
	else
		return; // no posts found

	wp_reset_query();
	return html_entity_decode($out);
}
add_shortcode( 'RCEVList', 'RCEV_events_list' );

// usage [RCEVList p=FILM_POST_ID]
