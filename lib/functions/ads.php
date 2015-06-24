<?php
 
//http://wordpress.stackexchange.com/questions/52662/check-if-first-paragraph-is-an-image-then-show-custom-code-right-after-it
//http://premium.wpmudev.org/blog/wordpress-style-first-paragraph/
//http://stackoverflow.com/questions/25888630/place-ads-in-between-text-only-paragraphs
//http://www.labnol.org/internet/adsense-custom-size-ads/28352/
//Inserta admanmedia ads después del primer párrafo
//add_filter( 'the_content', 'insert_adman_ads' );
//http://www.gestiopolis.com/la-etica-empresarial-como-fuente-de-ventajas-competitivas/
function insert_adman_ads( $content ) {
    global $post;
	
	$ad_code = '<div id="admanmedia" class="hidden-xs"><script src="http://icarus-wings.admanmedia.com/intext/intext_vast.js?pmu=183f9431;pmb=216f0476;size=600x338;visibility=50"></script></div>';

	if ( is_single() && ! is_admin() && get_post_meta($post->ID, "all2html_htmlcontent", true) == "" ) {
        //if(!is_single(28207 )){
    		return prefix_insert_after_paragraph( $ad_code, 3, $content );
        //}
	}
	
	return $content;
}

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
//http://www.gestiopolis.com/valor-economico-agregado-eva-y-gerencia-basada-en-valor-gbv/
function insert_ads_all2html( $content ) {
	$pages = preg_split("/(?=<div id=\"pf)/", $content, null, PREG_SPLIT_DELIM_CAPTURE);
    $count = count($pages)-1;
    if($count <= 4){
        $pos2 = -1;
        $pos3 = -1;
        $pos4 = -1;
    }/* elseif ($count > 4 && $count <= 16) {
        $pos2 = floor($count / 2);
        $pos3 = -1;
        $pos4 = -1;
    } elseif ($count > 16 && $count <= 48) {
        $breakpoint = floor($count / 3);
        $pos2 = $breakpoint;
        $pos3 = $breakpoint*2;
        $pos4 = -1;
    }else {
        $breakpoint = floor($count / 4);
        $pos2 = $breakpoint;
        $pos3 = $breakpoint*2;
        $pos4 = $breakpoint*3;
    }*/
    else {
        $pos2 = floor($count / 2);
        $pos2 = $pos2 -($pos2*0.25);
    }
	foreach ($pages as $index => $page) {

		/*if ( 1 == $index ) {
			$pages[$index] .= '<div class="adsce"><div id=\'div-gpt-ad-1433261534384-6\'>
<script type=\'text/javascript\'>
googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1433261534384-6\'); });
</script>
</div></div>';
		}

		if ( $pos2 == $index ) {
			$pages[$index] .= '<div class="adsce"><div id=\'div-gpt-ad-1433261534384-7\'>
<script type=\'text/javascript\'>
googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1433261534384-7\'); });
</script>
</div></div>';
		}*/

        if ( 1 == $index ) {
            $pages[$index] .= '<div class="adsce"><div id="google-ads-docs-2"></div>
 
          <script type="text/javascript"> 
           
              /* Calculate the width of available ad space */
              ad = document.getElementById(\'google-ads-docs-2\');
           
              if (ad.getBoundingClientRect().width) {
                  adWidth = ad.getBoundingClientRect().width; // for modern browsers 
              } else {
                  adWidth = ad.offsetWidth; // for old IE 
              }
           
              /* Replace ca-pub-XXX with your AdSense Publisher ID */ 
              google_ad_client = "ca-pub-1187873112185798";
           
              /* Replace 1234567890 with the AdSense Ad Slot ID */ 
              google_ad_slot = "6811811574";
            
              /* Do not change anything after this line */
              if ( adWidth >= 727 )
                google_ad_size = ["728", "90"];  /* Leaderboard 728x90 */
              else if (adWidth >= 467 && adWidth < 727)
                google_ad_size = ["468", "60"]; /* Button (125 x 125) */
              else
                google_ad_size = ["300", "250"]; /* Button (125 x 125) */
           
              google_ad_width = google_ad_size[0];
            google_ad_height=google_ad_size[1];
           
          </script>
          <script type="text/javascript"
                  src="//pagead2.googlesyndication.com/pagead/show_ads.js">
                  </script></div>';
        }

        if ( $pos2 == $index ) {
            $pages[$index] .= '<div class="adsce"><div id="google-ads-docs-3"></div>
 
          <script type="text/javascript"> 
           
              /* Calculate the width of available ad space */
              ad = document.getElementById(\'google-ads-docs-3\');
           
              if (ad.getBoundingClientRect().width) {
                  adWidth = ad.getBoundingClientRect().width; // for modern browsers 
              } else {
                  adWidth = ad.offsetWidth; // for old IE 
              }
           
              /* Replace ca-pub-XXX with your AdSense Publisher ID */ 
              google_ad_client = "ca-pub-1187873112185798";
           
              /* Replace 1234567890 with the AdSense Ad Slot ID */ 
              google_ad_slot = "8288519454";
            
              /* Do not change anything after this line */
              if ( adWidth >= 727 )
                google_ad_size = ["728", "90"];  /* Leaderboard 728x90 */
              else if (adWidth >= 467 && adWidth < 727)
                google_ad_size = ["468", "60"]; /* Button (125 x 125) */
              else
                google_ad_size = ["300", "250"]; /* Button (125 x 125) */
           
               google_ad_width = google_ad_size[0];
            google_ad_height=google_ad_size[1];
           
          </script>
          <script type="text/javascript"
                  src="//pagead2.googlesyndication.com/pagead/show_ads.js">
                  </script></div>';
        }

        /*if ( $pos3 == $index ) {
            $pages[$index] .= '<div class="adsce"><!-- 4-anuncio-prueba-p-3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2753881743271989"
     data-ad-slot="3425167724"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>';
        }

        if ( $pos4 == $index ) {
            $pages[$index] .= '<div class="adsce"><!-- 5-anuncio-prueba-p-4 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2753881743271989"
     data-ad-slot="3285566922"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>';
        }*/
	}
	
	return implode( '', $pages );
}

add_filter( 'the_content', 'so_25888630_ad_between_paragraphs' );

function so_25888630_ad_between_paragraphs($content){
    /**-----------------------------------------------------------------------------
     *
     *  @author       Pieter Goosen <http://stackoverflow.com/users/1908141/pieter-goosen>
     *  @return       Ads in between $content
     *  @link         http://stackoverflow.com/q/25888630/1908141
     * 
     *  Special thanks to the following answers on my questions that helped me to
     *  to achieve this
     *     - http://stackoverflow.com/a/26032282/1908141
     *     - http://stackoverflow.com/a/25988355/1908141
     *     - http://stackoverflow.com/a/26010955/1908141
     *     - http://wordpress.stackexchange.com/a/162787/31545
     *
    *------------------------------------------------------------------------------*/ 
    //http://www.gestiopolis.com/autogerencia/
    //http://www.gestiopolis.com/gestion-de-mantenimiento-e-iso-55000-sobre-manejo-de-activos-fisicos/
    //http://www.gestiopolis.com/posicionamiento-estrategico-de-la-empresa/
    //if( (is_single(9624) || is_single(332873) || is_single(332832)) && ! is_admin() ){ //Simply make sure that these changes effect the main query only
    if( is_single() && ! is_admin() && !is_single(333666) ){

        /**-----------------------------------------------------------------------------
         *
         *  wptexturize is applied to the $content. This inserts p tags that will help to  
         *  split the text into paragraphs. The text is split into paragraphs after each
         *  closing p tag. Remember, each double break constitutes a paragraph.
         *  
         *  @todo If you really need to delete the attachments in paragraph one, you want
         *        to do it here before you start your foreach loop
         *
        *------------------------------------------------------------------------------*/ 
        $closing_p = '</p>';
        //$paragraphs = explode( $closing_p, wptexturize($content) );
        $paragraphs = preg_split("/(?=<\/p>)/", $content, null, PREG_SPLIT_DELIM_CAPTURE);
        
        /**-----------------------------------------------------------------------------
         *
         *  The amount of paragraphs is counted to determine add frequency. If there are
         *  less than four paragraphs, only one ad will be placed. If the paragraph count
         *  is more than 4, the text is split into two sections, $first and $second according
         *  to the midpoint of the text. $totals will either contain the full text (if 
         *  paragraph count is less than 4) or an array of the two separate sections of
         *  text
         *
         *  @todo Set paragraph count to suite your needs
         *
        *------------------------------------------------------------------------------*/ 
        $count = count( $paragraphs );
        if( 6 >= $count ) {
            $totals = array( $paragraphs ); 
        }/*else if( $count > 4 && $count <= 20 ){
            $midpoint = floor($count / 2);
            $first = array_slice($paragraphs, 0, $midpoint );
            if( $count%2 == 1 ) {
                $second = array_slice( $paragraphs, $midpoint, $midpoint, true );
            }else{
                $second = array_slice( $paragraphs, $midpoint, $midpoint-1, true );
            }
            $totals = array( $first, $second );
        } else if ($count > 20 && $count <= 40){
            $breakpoint = floor($count / 3);
            $first = array_slice($paragraphs, 0, $breakpoint );
            $second = array_slice( $paragraphs, $breakpoint, $breakpoint, true );
            $diff = $count - ($breakpoint*2);
            $third = array_slice( $paragraphs, $breakpoint*2, $diff, true );
            $totals = array( $first, $second, $third );
        } else {
            $breakpoint = floor($count / 4);
            $first = array_slice($paragraphs, 0, $breakpoint );
            $second = array_slice( $paragraphs, $breakpoint, $breakpoint, true );
            $third = array_slice( $paragraphs, $breakpoint*2, $breakpoint, true );
            $diff = $count - ($breakpoint*3);
            $fourth = array_slice( $paragraphs, $breakpoint*3, $diff, true );
            $totals = array( $first, $second, $third, $fourth );
        }*/
        /*else {
            $midpoint = floor($count / 2);
            $first = array_slice($paragraphs, 0, $midpoint );
            if( $count%2 == 1 ) {
                $second = array_slice( $paragraphs, $midpoint, $midpoint, true );
            }else{
                $second = array_slice( $paragraphs, $midpoint, $midpoint-1, true );
            }
            $totals = array( $first, $second );
        }*/
        else {
            $midpoint = floor($count / 2);
            $first = array_slice($paragraphs, 0, $midpoint );
            $diff = $count - $midpoint;
            $second = array_slice( $paragraphs, $midpoint, $diff+1, true );
            $totals = array( $first, $second );
        }
        

        $new_paras = array();
        foreach ( $totals as $key_total=>$total ) {
            /**-----------------------------------------------------------------------------
             *
             *  This is where all the important stuff happens
             *  The first thing that is done is a work count on every paragraph
             *  Each paragraph is is also checked if the following tags, a, li and ul exists
             *  If any of the above tags are found or the text count is less than 10, 0 is 
             *  returned for this paragraph. ($p will hold these values for later checking)
             *  If none of the above conditions are true, 1 will be returned. 1 will represent
             *  paragraphs that qualify for add insertion, and these will determine where an ad 
             *  will go
             *  returned for this paragraph. ($p will hold these values for later checking)
             *
             *  @todo You can delete or add rules here to your liking
             *
            *------------------------------------------------------------------------------*/ 
            $p = array();
            foreach ( $total as $key_paras=>$paragraph ) {
                $word_count = count(explode(' ', $paragraph));
                if( preg_match( '~<(?:img|ul|li)[ >]~', $paragraph ) || $word_count < 10 ) {  
                    $p[$key_paras] = 0; 
                }else{
                    $p[$key_paras] = 1; 
                }   
            }
            /**-----------------------------------------------------------------------------
             *
             *  Return a position where an add will be inserted
             *  This code checks if there are two adjacent 1's, and then return the second key
             *  The ad will be inserted between these keys
             *  If there are no two adjacent 1's, "no_ad" is returned into array $m
             *  This means that no ad will be inserted in that section
             *
            *------------------------------------------------------------------------------*/ 
            $m = array();
            foreach ( $p as $key=>$value ) {
                if( 1 === $value && array_key_exists( $key-1, $p ) && $p[$key] === $p[$key-1] && !$m){
                    $m[] = $key+2;
                }elseif( !array_key_exists( $key+1, $p ) && !$m ) {
                    $m[] = 'no-ad';
                }
            }

            /**-----------------------------------------------------------------------------
             *
             *  Use two different ads, one for each section
             *  Only ad1 is displayed if there is less than 4 paragraphs
             *
             *  @todo Replace "PLACE YOUR ADD NO 1 HERE" with your add or code. Leave p tags
             *  @todo I will try to insert widgets here to make it dynamic
             *
            *------------------------------------------------------------------------------*/ 
            if( $key_total == 0 ){
                $ad = array( 'ad1' => '<div class="adsce"><script type="text/javascript"><!--
google_ad_client = "ca-pub-1187873112185798";
/* Ad Segundo Párrafo (300x250)  */
google_ad_slot = "6234192054";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>' );
            }/*else if( $key_total == 1 ){
                $ad = array( 'ad2' => '<div class="adsce"><div id=\'div-gpt-ad-1433261534384-3\'>
<script type=\'text/javascript\'>
googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1433261534384-3\'); });
</script>
</div></div>' );
            }*//* else if( $key_total == 2 ){
                $ad = array( 'ad3' => '<div class="adsce"><!-- 4-anuncio-prueba-p-3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2753881743271989"
     data-ad-slot="3425167724"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>' );
            }else{
                $ad = array( 'ad4' => '<div class="adsce"><!-- 5-anuncio-prueba-p-4 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2753881743271989"
     data-ad-slot="3285566922"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>' );
            }*/

            /**-----------------------------------------------------------------------------
             *
             *  This code loops through all the paragraphs and checks each key against $mail
             *  and $key_para
             *  Each paragraph is returned to an array called $new_paras. $new_paras will
             *  hold the new content that will be passed to $content.
             *  If a key matches the value of $m (which holds the array key of the position
             *  where an ad should be inserted) an add is inserted. If $m holds a value of
             *  'no_ad', no ad will be inserted
             *
            *------------------------------------------------------------------------------*/ 
            foreach ( $total as $key_para=>$para ) {
                if( !in_array( 'no_ad', $m ) && $key_para === $m[0] ){
                    $new_paras[key($ad)] = $ad[key($ad)];
                    $new_paras[$key_para] = $para;
                }else{
                    $new_paras[$key_para] = $para;
                }
            }
        }

        /**-----------------------------------------------------------------------------
         *
         *  $content should be a string, not an array. $new_paras is an array, which will
         *  not work. $new_paras are converted to a string with implode, and then passed
         *  to $content which will be our new content
         *
        *------------------------------------------------------------------------------*/ 
        $content =  implode( ' ', $new_paras );
    }
    return $content;
}
?>