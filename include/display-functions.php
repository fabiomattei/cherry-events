<?php

/**
 * This functions check the loaded post, in case a shortcode is present id loads
 * necessary css in order to show the gallery
 */
function RCEV_Cherry_Event_ShortCode_Detect() {
    global $wp_query;
    $Posts = $wp_query->posts;
    $Pattern = get_shortcode_regex();
    foreach ($Posts as $Post) {
		if ( strpos($Post->post_content, 'RCEventsListHome' ) ) {
			// loading css scripts
			wp_enqueue_style('rcev-css', RCEV_PLUGIN_URL.'css/rcevents.css');

            break;
        } //end of if
    } //end of foreach
}
add_action( 'wp', 'RCEV_Cherry_Event_ShortCode_Detect' );

