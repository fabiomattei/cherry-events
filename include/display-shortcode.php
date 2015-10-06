<?php

/**
 * This function handle the short code
 */
function RCEV_events_list( $atts, $content ) {
	global $post;
	
	$atts = array( // a few default values
		'posts_per_page' => '3',
		'post_type' => RCEV_SLUG
		);
		
	$posts = new WP_Query( $atts );
	$out = '<div class="externaleventboxcontainer">
					<div class="eventstitlewrapper">
						<h5 class="eventstitle">Events</h5>
					</div>
					<div class="eventboxcontainer">
						<ul>';
	
	if ($posts->have_posts()) {
	
	    while ($posts->have_posts()) {
	        $posts->the_post();
			
			
	
	        $out .= '<li><input type="checkbox" checked><i></i>' . 
				'<h2>' . get_the_title() . '</h2>'.
			    '<p>'.get_the_content().'</p></li>';
	
	/* these arguments will be available from inside $content
	    get_permalink()  
	    get_the_content()
	    get_the_category_list(', ')
	    get_the_title()
	    and custom fields
	    get_post_meta($post->ID, 'field_name', true);
	*/
	
		} // end while loop
	
	} else {
		return; // no posts found
	}
	$out .= '</div>'; // ending eventbox
	$out .= '</div>'; // ending eventboxcontainer
	
	ob_start();

	echo $out;
	
	return ob_get_clean();
}
add_shortcode( 'RCEventsListHome', 'RCEV_events_list' );

// usage [RCEventsListHom]
