<?php
/*
Plugin Name: Wd-easy-responsive-slider-xoss
Plugin URI: http://www.wordpressdriver.com
Description: awesome easy responsive slider plugin.
Author: Rezaul haque
Author URI: http://www.wordpressdriver.com
Version: 1.0
*/



function wd_easy_responsive_slider_wordpress_jQuery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'wd_easy_responsive_slider_wordpress_jQuery');




function wd_easy_responsive_slider_wordpress_script_add() {
    wp_enqueue_script( 'wd_easy_slider_min_js', plugins_url( '/js/pgwslider.js', __FILE__ ), array('jquery'), false);
    wp_enqueue_style( 'wd_easy_slider_roundabout_css', plugins_url( '/css/pgwslider.css', __FILE__ ));

}

add_action('init','wd_easy_responsive_slider_wordpress_script_add');


function wd_easy_responsive_slider_active () {?>
	<script type="text/javascript">
jQuery(document).ready(function() {
 jQuery(".pgwSlider").pgwSlider({
transitionDuration:500,
intervalDuration: 5000,
});
});
</script>
<?php
}
add_action('wp_head','wd_easy_responsive_slider_active');



/* wd responsive slider shortcode settings */
function wd_slider_shortcode($atts, $content = null) {
	return'<div class="pgslider_main"><ul class="pgwSlider">'.do_shortcode($content).'</ul></div>';
}
add_shortcode('wdslide', 'wd_slider_shortcode'); 

function wd_slider_items_shortcode($atts) {
	extract( shortcode_atts( array(
		'link' => '',
		'title' => '',
		'des' => '',
	), $atts ) );
	
	return'<li><img src="'.$link.'" alt="'.$title.'" data-description="'.$des.'"></li>';
}
add_shortcode('wditem', 'wd_slider_items_shortcode');

?>