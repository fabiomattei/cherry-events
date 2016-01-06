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
	$out = '<div class="external-accordion-box-container">
					<div class="accordion-title-wrapper">
						<h5 class="accordion-title">Events</h5>
					</div>
					<div class="accordion-box-container">
						<ul>';
	
	if ($posts->have_posts()) {
	
	    while ($posts->have_posts()) {
	        $posts->the_post();
			
	        $out .= '<li><input type="checkbox" checked><i></i>' . 
				'<h2>' . get_the_title() . '</h2>'.
			    '<p>'.get_the_content().'</p></li>';	
	
		} // end while loop
	
	} else {
		return; // no posts found
	}
	$out .= '</div>'; // ending accordion-box-container
	$out .= '</div>'; // ending external-accordion-box-container
	
	ob_start();

	echo $out;
	
	return ob_get_clean();
}

add_shortcode( 'RCEventsListHome', 'RCEV_events_list' );
