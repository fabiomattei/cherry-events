<?php

/**
 * This function handle the short code
 */
function RCEV_events_list( $Id ) {
    ob_start();

	// TODO implement
	
    return ob_get_clean();
}
add_shortcode( 'RCEV', 'RCEV_events_list' );
