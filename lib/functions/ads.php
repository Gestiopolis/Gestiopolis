<?php
 
//Insert ads after second paragraph of single post content.

add_filter( 'the_content', 'insert_adman_ads' );

function insert_adman_ads( $content ) {
	
	$ad_code = '<div id="admanmedia"><script src="http://icarus-wings.admanmedia.com/intext/intext_vast.js?pmu=183f9431;pmb=216f0476;size=600x338;visibility=50"></script></div>';

	if ( is_single() && ! is_admin() ) {
		return prefix_insert_after_paragraph( $ad_code, 1, $content );
	}
	
	return $content;
}
 
// Parent Function that makes the magic happen
 
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {

		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}

		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[$index] .= $insertion;
		}
	}
	
	return implode( '', $paragraphs );
}