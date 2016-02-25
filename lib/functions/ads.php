<?php
 
//http://wordpress.stackexchange.com/questions/52662/check-if-first-paragraph-is-an-image-then-show-custom-code-right-after-it
//http://premium.wpmudev.org/blog/wordpress-style-first-paragraph/
//http://stackoverflow.com/questions/25888630/place-ads-in-between-text-only-paragraphs
//http://www.labnol.org/internet/adsense-custom-size-ads/28352/
//Inserta admanmedia ads después del primer párrafo
add_filter( 'the_content', 'insert_adman_ads' );
//http://www.gestiopolis.com/la-etica-empresarial-como-fuente-de-ventajas-competitivas/
function insert_adman_ads( $content ) {
    global $post;
	
	$despegar = '<div id="admanmedia" class="hidden-xs"><script type="text/javascript">
    sas.call("std", {
        siteId:     78378,
        pageId:     574794,
        formatId:   32469,
        target:     \'\'
    });
</script>
<noscript>
    <a href="http://www5.smartadserver.com/ac?jump=1&nwid=1371&siteid=78378&pgname=all_site&fmtid=32469&visit=m&tmstp=[timestamp]&out=nonrich" target="_blank">                
        <img src="http://www5.smartadserver.com/ac?out=nonrich&nwid=1371&siteid=78378&pgname=all_site&fmtid=32469&visit=m&tmstp=[timestamp]" border="0" alt="" /></a>
</noscript>
<div id="contPauta"></div></div>';
$adman = '<div id="admanmedia" class="hidden-xs"><script src="http://icarus-wings.admanmedia.com/intext/intext_vast.js?pmu=183f9431;pmb=216f0476;size=600x338;visibility=50"></script></div>';
$teads = '<div id="admanmedia" class="hidden-xs"><script type="text/javascript">
window._ttf = window._ttf || [];
_ttf.push({
pid          : 35670
,lang        : "es"
,slot        : \'.post-content .entry-content > p\'
,format      : "inread"
,minSlot     : 7
,css         : "margin: 32px 0px;"
});

(function (d) {
var js, s = d.getElementsByTagName(\'script\')[0];
js = d.createElement(\'script\');
js.async = true;
js.src = \'//cdn.teads.tv/media/format.js\';
s.parentNode.insertBefore(js, s);
})(window.document);
</script></div>';
$netsonic = '<!-- NETSONIC.TV - ALL IN ONE (Intext) VIDEO 1.0 -->
<script type="text/javascript">
var NS_allinone_options = {
   formato: \'intext\', // infirst | miniplayer | intext | interstitial
   pub: \'CO_gestiopolis.com\',
   vpcategory: \'netsonic_gestiopolis.com_intext\',
   vpcategorymob: \'netsonic_gestiopolis.com_mobile\',
   divID: "netsonic_divid_target", // div destino
   position: 0, // 0: en la posicion | 1: antes | 2:despues | 3: dentro antes div hijo | 4: dentro despues contenido
   vptags: "",
   environment: "",
   vpcontentid: "",
   async : true,
   version_aio: "1.0",
   player: "flash-html5",   
   width: "640",
   height: "360",
   volume: ".5",
   title: undefined,
   wait: false,
   forceshow: false,
   forceCloseButton: false,
   mClick: undefined,
   mPrint: undefined,
   mFinish: undefined,
   mNoad: undefined,
   divClassName: "",
   divClassNameNumber: 1,
   miniplayer_click: false,
   miniplayer_autosize: false,
   rnd: Math.random().toString().substring (2, 11),
   enabled: true
}; 
if (NS_allinone_options.enabled){ document.write("<scr"+"ipt type=\'text\/javascript\' src=\'http:\/\/cdn.netsonic.tv\/res\/allinone\/"+NS_allinone_options.version_aio+"\/aio.min.js?pub="+NS_allinone_options.pub+"&vpcategory="+NS_allinone_options.vpcategory+"&vpcategorymob="+NS_allinone_options.vpcategorymob+"&formato="+NS_allinone_options.formato+"&divID="+NS_allinone_options.divID+"&player="+NS_allinone_options.player+"&vptags="+NS_allinone_options.vptags+"&async="+NS_allinone_options.async+"&width="+NS_allinone_options.width+"&height="+NS_allinone_options.height+"&volume="+NS_allinone_options.volume+"&position="+NS_allinone_options.position+"&miniplayer_click="+NS_allinone_options.miniplayer_click+"&miniplayer_autosize="+NS_allinone_options.miniplayer_autosize+"&rnd="+NS_allinone_options.rnd+"\'><\/scr"+"ipt>");};

</script>
<!-- !NETSONIC.TV - ALL IN ONE (Intext) VIDEO 1.0 -->';
$anuncios = array($adman,$netsonic);
$ad_code = $anuncios[rand(0,1)];
//$ad_code = $anuncios[0];

	if ( is_single() && ! is_admin() && get_post_meta($post->ID, "all2html_htmlcontent", true) == "" ) {
        //if(!is_single(28207 )){
    		return prefix_insert_after_paragraph( $ad_code, 4, $content );
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
        if( 12 >= $count ) {
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
                $adsense = array( 'ad1' => '<div class="adsce"><script type="text/javascript"><!--
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
                $sulvo = array( 'ad1' => '<div class="adsce"><!-- Sulvo Surge Pricing Unit - gestiopolis.com_300x250 -->
<ins class="adsbysulvo"
   data-ad-slot="sulvo_ikhlhb7p"
   data-ad-size="300x250"
></ins>
<script src="//sulvo.co/v1/ads.js"></script></div>' );
$anuncios = array($adsense,$sulvo);
$ad_code = $anuncios[rand(0,1)];
                $ad = $ad_code;
            }else if( $key_total == 1 ){
                $ad = array( 'ad2' => '<div class="adsce"><script type="text/javascript">
    google_ad_client = "ca-pub-2753881743271989";
    google_ad_slot = "9288290921";
    google_ad_width = 300;
    google_ad_height = 250;
</script>
<!-- post-mitad-contenido -->
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>' );
            }/* else if( $key_total == 2 ){
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

function footer_dataxpand() {
    echo '
    <script type="text/javascript">
      (function () {
        var tagjs = document.createElement("script");
        var s = document.getElementsByTagName("script")[0];
        tagjs.async = true;
        tagjs.src = "//dataxpand.script.ag/tag.js#site=63UCMvc";
        s.parentNode.insertBefore(tagjs, s);
      }());
    </script>
    ';
}
add_action('wp_footer', 'footer_dataxpand', 100);

function head_scripts_ads() {
    global $post;
    if (is_single()) {
    /*echo '<script type=\'text/javascript\'>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
  (function() {
    var gads = document.createElement(\'script\');
    gads.async = true;
    gads.type = \'text/javascript\';
    var useSSL = \'https:\' == document.location.protocol;
    gads.src = (useSSL ? \'https:\' : \'http:\') +
      \'//www.googletagservices.com/tag/js/gpt.js\';
    var node = document.getElementsByTagName(\'script\')[0];
    node.parentNode.insertBefore(gads, node);
  })();
</script>

<script type=\'text/javascript\'>
  googletag.cmd.push(function() {
    googletag.defineSlot(\'/1007663/post-comienzo-contenido\', [300, 250], \'div-gpt-ad-1433261534384-0\').addService(googletag.pubads());
    googletag.defineSlot(\'/1007663/post-2do-parrafo-contenido\', [300, 250], \'div-gpt-ad-1433261534384-1\').addService(googletag.pubads());
    googletag.defineSlot(\'/1007663/post-3er-parrafo-contenido\', [600, 338], \'div-gpt-ad-1433303077158-0\').addService(googletag.pubads());
    googletag.defineSlot(\'/1007663/post-mitad-contenido\', [300, 250], \'div-gpt-ad-1433261534384-3\').addService(googletag.pubads());
    var mapping = googletag.sizeMapping().
    addSize([0, 0], [300, 250]).
        addSize([750, 450], [[300, 250], [728, 90], [580, 400], [336, 280]])
        .build();
    googletag.defineSlot(\'/1007663/post-doc-fondo-contenido\', [[300, 250], [728, 90], [580, 400], [336, 280]], \'div-gpt-ad-1433261534384-4\').defineSizeMapping(mapping).addService(googletag.pubads());
    var mapping1 = googletag.sizeMapping().
    addSize([0, 0], [300, 250]).
        addSize([550, 200], [468, 60]).
        addSize([768, 200], [728, 90]).
        build();
    googletag.defineSlot(\'/1007663/docs-comienzo-contenido\', [[300, 250], [728, 90], [468, 60]], \'div-gpt-ad-1433261534384-5\').defineSizeMapping(mapping1).addService(googletag.pubads());
    var mapping2 = googletag.sizeMapping().
    addSize([0, 0], [300, 250]).
        addSize([550, 200], [468, 60]).
        addSize([768, 200], [728, 90]).
        build();
    googletag.defineSlot(\'/1007663/docs-2da-pagina-contenido\', [[300, 250], [728, 90], [468, 60]], \'div-gpt-ad-1433261534384-6\').defineSizeMapping(mapping2).addService(googletag.pubads());
    var mapping3 = googletag.sizeMapping().
    addSize([0, 0], [300, 250]).
        addSize([550, 200], [468, 60]).
        addSize([768, 200], [728, 90]).
        build();
    googletag.defineSlot(\'/1007663/docs-mitad-contenido\', [[300, 250], [728, 90], [468, 60]], \'div-gpt-ad-1433261534384-7\').defineSizeMapping(mapping3).addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.pubads().collapseEmptyDivs();
    googletag.enableServices();
  });
</script>';*/
echo '
<script src=\'http://www5.smartadserver.com/config.js?nwid=1371\' type="text/javascript"></script>
<script type="text/javascript">
    sas.setup({ domain: \'http://www5.smartadserver.com\'});
</script>';
}
}
add_action('wp_head', 'head_scripts_ads', 1);

function footer_adsense_script() {
    
        $adslive = '<script type=\'text/javascript\'>
  (function() {
    var useSSL = \'https:\' == document.location.protocol;
    var src = (useSSL ? \'https:\' : \'http:\') +
        \'//www.googletagservices.com/tag/js/gpt.js\';
    document.write(\'<scr\' + \'ipt src="\' + src + \'"></scr\' + \'ipt>\');
  })();
</script>

<script type=\'text/javascript\'>
  googletag.cmd.push(function() {
    googletag.defineOutOfPageSlot(\'/11322282/GestioPolis.com_I//1x1\', \'div-gpt-ad-1436976370032-0\').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.pubads().enableSyncRendering();
    googletag.enableServices();
  });
</script>

<!-- /11322282/GestioPolis.com_I//1x1 -->
<div id=\'div-gpt-ad-1436976370032-0\'>
<script type=\'text/javascript\'>
googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1436976370032-0\'); });
</script>
</div>
<!--<script type="text/javascript" src="http://as.ebz.io/api/choixPubJS.htm?pid=1138158&screenLayer=1&mode=NONE&home=http://www.gestiopolis.com"></script>-->
';
$plads= '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2753881743271989",
    enable_page_level_ads: true
  });
</script>';
$fbads='<style>
     #ad_root {
        display: none;
        font-size: 14px;
        height: 250px;
        line-height: 16px;
        position: relative;
        width: 300px;
      }

      .thirdPartyMediaClass {
        height: 157px;
        width: 300px;
      }

      .thirdPartyTitleClass {
        font-weight: 600;
        font-size: 16px;
        margin: 8px 0 4px 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }

      .thirdPartyBodyClass {
        display: -webkit-box;
        height: 32px;
        -webkit-line-clamp: 2;
        overflow: hidden;
      }

      .thirdPartyCallToActionClass {
        color: #326891;
        font-family: sans-serif;
        font-weight: 600;
        margin-top: 8px;
      }
    </style>
    <script>
      window.fbAsyncInit = function() {
        FB.Event.subscribe(
          \'ad.loaded\',
          function(placementId) {
            console.log(\'Audience Network ad loaded\');
            document.getElementById(\'ad_root\').style.display = \'block\';
          }
        );
        FB.Event.subscribe(
          \'ad.error\',
          function(errorCode, errorMessage, placementId) {
            console.log(\'Audience Network error (\' + errorCode + \') \' + errorMessage);
          }
        );
      };
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk/xfbml.ad.js#xfbml=1&version=v2.5&appId=154786858571";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, \'script\', \'facebook-jssdk\'));
    </script>
    <fb:ad placementid="154786858571_10154565912493572" format="native" nativeadid="ad_root" testmode="false"></fb:ad>
    <div id="ad_root">
      <a class="fbAdLink">
        <div class="fbAdMedia thirdPartyMediaClass"></div>
        <div class="fbAdTitle thirdPartyTitleClass"></div>
        <div class="fbAdBody thirdPartyBodyClass"></div>
        <div class="fbAdCallToAction thirdPartyCallToActionClass"></div>
      </a>
    </div>';
//$anuncios = array($plads,$adslive,$plads,$adslive,$plads,$plads,$plads,$plads,$plads,$plads);
//echo $anuncios[rand(0,9)];
//echo $unipiloto;
    echo $fbads;
}
add_action('wp_footer', 'footer_adsense_script', 1);
?>
