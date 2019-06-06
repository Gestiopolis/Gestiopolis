<?php
 
//http://wordpress.stackexchange.com/questions/52662/check-if-first-paragraph-is-an-image-then-show-custom-code-right-after-it
//http://premium.wpmudev.org/blog/wordpress-style-first-paragraph/
//http://stackoverflow.com/questions/25888630/place-ads-in-between-text-only-paragraphs
//http://www.labnol.org/internet/adsense-custom-size-ads/28352/
//Inserta admanmedia ads después del primer párrafo

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
    }else {
        $pos2 = floor($count / 2);
        $pos2 = $pos2 -($pos2*0.25);
    }
	foreach ($pages as $index => $page) {

		if ( 1 == $index ) {

            /* Si es movil */
            if(wp_is_mobile()){
                
            $pages[$index] .= 

            /* ADS Pluss - antes de la segunda página*/

            "
                <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
                <script>
                 var googletag = googletag || {};
                 googletag.cmd = googletag.cmd || [];
                </script>
                <script>
                 googletag.cmd.push(function() {
                   googletag.defineSlot('/21673142571/6__gestiopolis.com__mobile__320x50_1', [320, 50], 'div-gpt-ad-1527492820290-0').addService(googletag.pubads());
                   googletag.enableServices();
                 });
                </script>
                <div id='div-gpt-ad-1527492820290-0' style='height:50px; width:320px;text-align:center !important;margin: 0 auto !important;'>
                <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1527492820290-0'); });
                </script>
                </div>

            "


            /* ADS Pluss - antes de la segunda página*/
            ;

            /* Si no es movil */
            }else{

            $pages[$index] .= 

                "
                    <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
                    <script>
                     var googletag = googletag || {};
                     googletag.cmd = googletag.cmd || [];
                    </script>
                    <script>
                     googletag.cmd.push(function() {
                       googletag.defineSlot('/21673142571/6__gestiopolis.com__desktop__728x90_1', [728, 90], 'div-gpt-ad-1525094074934-1').addService(googletag.pubads());
                       googletag.enableServices();
                     });
                    </script>
                    <div id='div-gpt-ad-1525094074934-1' style='height:90px; width:728px; text-align:center !important;margin: 0 auto !important;'>
                    <script>
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1525094074934-1'); });
                    </script>
                    </div>

                "
            ;

            }

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
        }else {
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
                
                // $ad = array( 'ad1' => 
                
                /* Aqui va otro anuncio que se muestra luego del 3 parrafo */
                // );
                /*
                $ad = array( 'ad1' => 
                '<div class="adsce"><!-- /1007663/Post-4Parrafo-BTF-300x250 -->
                <div id=\'div-gpt-ad-1460590183368-6\'>
                <script type=\'text/javascript\'>
                googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1460590183368-6\'); });
                </script>
                </div></div>' );
                */
            }else if( $key_total == 1 ){
                $ad = array( 'ad2' => 

                /* Sulvo - Mitad del contenido */
                '
                
                ' 
                /* Sulvo - Mitad del contenido */
                );
                
            }
            
            
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
                $ad['ad'] = '';
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



// Dataxpand Audiencias
function footer_dataxpand() {

    echo '<script type="text/javascript" src="https://tc.dataxpand.com/tc/4ccf3bf.js" async></script>';
    
}
add_action('wp_footer', 'footer_dataxpand', 100);




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

$plads= 
'<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
//echo $anuncios[mt_rand(0,9)];
//echo $unipiloto;
    echo '<script type=\'text/javascript\' src=\'https://www.googletagservices.com/tag/js/gpt.js\'>
  googletag.pubads().definePassback(\'/1007663/Footer-Moviles\', [1, 1]).display();
</script>';
}
add_action('wp_footer', 'footer_adsense_script', 1);


//Sulvo Surge Pricing Unit - gestiopolis.com_sticky_mobile_bottom_mobile-sulvo
function sticky_mobile_sulvo(){

echo '<div data-ad="gestiopolis.com_sticky_mobile_bottom_mobile-sulvo" data-devices="m:1,t:0,d:0" class="demand-supply"></div>';
}

add_action('wp_footer','sticky_mobile_sulvo');



//Sulvo Dektop 728 x 90 Footer
function sticky_dektop_sulvo(){

        if(is_single()){

            echo '

                <div data-ad="gestiopolis.com_728x90_sticky_display_bottom_sticky728abajo" data-devices="m:0,t:0,d:1" class="demand-supply" data-position="center" data-offset="80px"></div>
            '
            ;

        }else{

            echo '<div data-ad="gestiopolis.com_728x90_sticky_display_bottom_sticky728abajo" data-devices="m:0,t:0,d:1" class="demand-supply"></div>';
        }

    
    }

add_action('wp_footer','sticky_dektop_sulvo');




//Insertar ads o contenido propio después 8 parrafo
    function insert_post_ads_post8( $content ) {
        $ad_code = '<div style="text-align:center !important;margin:0 auto !important;">

                   
                <!-- /1007663/Post_Octavo_P -->
                <div id="div-gpt-ad-1559753635001-0" style="height:1px; width:1px;"">
                <script>
                googletag.cmd.push(function() { googletag.display("div-gpt-ad-1559753635001-0"); });
                </script>
                </div>

            </div>

        ';
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 8, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_post8' );




 //Insertar ads o contenido propio después 5 parrafo
    function insert_post_ads( $content ) {
        $ad_code = '<div style="width:300px !important;height:250px !important; text-align:center !important;margin:0 auto !important">

                   <!-- /1007663/5to-Parrafo-Ads -->
                    <div id="div-gpt-ad-1558568181323-0" style="height:250px; width:300px;"">
                    <script>
                    googletag.cmd.push(function() { googletag.display("div-gpt-ad-1558568181323-0"); });
                    </script>
                    </div>

                    </div>

        ';
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 5, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads' );


     
    // Función para insertar el contenido
    function insert_ads_after_paragraph( $insertion, $paragraph_id, $content ) {
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




    /* Tercer parrafo VIDEO */

    function insert_post_ads_two( $content ) {
        $ad_code = '

            <!-- /1007663/Post-3Parrafo-VideoAds -->
            <div id="div-gpt-ad-1526505979755-0" style="height:auto; width:1px;">
            <script>
            googletag.cmd.push(function() { googletag.display("div-gpt-ad-1526505979755-0"); });
            </script>
            </div>
        ';
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 3, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_two' );



    /* 10 parrafo Wearenative Dektop*/

    function insert_post_wearenative( $content ) {
        $ad_code = '

        <script src="//web-clients.mynativeplatform.com/web-clients/bootloaders/hkztwFrmebDNzQoza3SKYo/bootloader.js" async="true" data-version="3" data-url="[PAGE_URL]" data-zone="[ZONE]" data-organic-clicks="[ORGANIC_TRACKING_PIXEL]" data-paid-clicks="[PAID_TRACKING_PIXEL]"></script>
        ';
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 11, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_wearenative' );


    /* 10 parrafo Wearenative Mobile*/

    function insert_post_wearenative_mobile( $content ) {

        if(wp_is_mobile()){
            $ad_code = '

            <script src="//web-clients.mynativeplatform.com/web-clients/bootloaders/rLkATbwTVMgrGdxeTsz6cq/bootloader.js" async="true" data-version="3" data-url="[PAGE_URL]" data-zone="[ZONE]" data-organic-clicks="[ORGANIC_TRACKING_PIXEL]" data-paid-clicks="[PAID_TRACKING_PIXEL]"></script>
            ';
        }
     
        if ( is_single() && ! is_admin() ) {
            $ad_code = '';
            return insert_ads_after_paragraph( $ad_code, 11, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_wearenative_mobile' );


    /* Tercer parrafo solo en mobile Ads ++ */


    function insert_post_ads_3_mobile( $content ) {

        if(wp_is_mobile()){

        $ad_code = "

            <div style='text-align:center !important'>

                <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
                <script>
                 var googletag = googletag || {};
                 googletag.cmd = googletag.cmd || [];
                </script>
                <script>
                 googletag.cmd.push(function() {
                   googletag.defineSlot('/21673142571/6__gestiopolis.com__desktop__300x250_1', [300, 250], 'div-gpt-ad-1525094074934-0').addService(googletag.pubads());
                   googletag.enableServices();
                 });
                </script>
                <div id='div-gpt-ad-1525094074934-0' style='height:250px; width:300px;'>
                <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1525094074934-0'); });
                </script>
                </div>

            </div>
            ";
        
        }
        
        if ( is_single() && ! is_admin() ) {
            $ad_code = '';
            return insert_ads_after_paragraph( $ad_code, 3, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_3_mobile' );



    /* 8 parrafo Ads ++ solo mobil */


    function insert_post_ads_8_mobile( $content ) {

        if(wp_is_mobile()){

        $ad_code = "

            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
                <script>
                  var googletag = googletag || {};
                  googletag.cmd = googletag.cmd || [];
                </script>
                <script>
                  googletag.cmd.push(function() {
                    googletag.defineSlot('/21673142571/6__gestiopolis.com__mobile__300x250_1', [300, 250], 'div-gpt-ad-1535454175930-0').addService(googletag.pubads());
                    googletag.enableServices();
                  });
                </script>
                <div id='div-gpt-ad-1535454175930-0' style='height:250px; width:300px;'>
                <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1535454175930-0'); });
                </script>
                </div>


            ";
        
        }
        
        if ( is_single() && ! is_admin() ) {
            $ad_code = '';
            return insert_ads_after_paragraph( $ad_code, 8, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_8_mobile' );
  


    /* DFP Tercer parrafo Head*/
    function head_DFP_tercer_parrafo(){
        echo "
        <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
        <script>
         var googletag = googletag || {};
         googletag.cmd = googletag.cmd || [];
        </script>

        <script>
         googletag.cmd.push(function() {
           googletag.defineSlot('/1007663/Post-3Parrafo-VideoAds', [1, 1], 'div-gpt-ad-1526505979755-0').addService(googletag.pubads());
           googletag.pubads().enableSingleRequest();
           googletag.enableServices();
         });
        </script>";
    }

    add_filter('wp_head', 'head_DFP_tercer_parrafo');

    //
    function head_DFP_quinto_parrafo(){

        echo "

            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
            <script>
             var googletag = googletag || {};
             googletag.cmd = googletag.cmd || [];
            </script>

            <script>
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/5to-Parrafo-Ads', [300, 250], 'div-gpt-ad-1558568181323-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>
        
        ";
    }


    add_filter('wp_head', 'head_DFP_quinto_parrafo');

    //
    function head_DFP_flotante_lateral_izq(){
        echo "
            
            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
            <script>
             var googletag = googletag || {};
             googletag.cmd = googletag.cmd || [];
            </script>

            <script>
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/Lateral-Izq-Abajo-', [300, 250], 'div-gpt-ad-1558568608847-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>
        
        ";
    }

    add_filter('wp_head', 'head_DFP_flotante_lateral_izq');

    // function head_rich_media(){

    //     echo "<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
    //         <script>
    //           var googletag = googletag || {};
    //           googletag.cmd = googletag.cmd || [];
    //         </script>

    //         <script>
    //           googletag.cmd.push(function() {
    //             googletag.defineSlot('/40135427/gestiopolis_Rich_Media', [1, 1], 'div-gpt-ad-1524772394317-0').addService(googletag.pubads());
    //             googletag.pubads().enableSingleRequest();
    //             googletag.enableServices();
    //           });
    //         </script>";
    // }

    // add_filter('wp_head', 'head_rich_media');



    // function footer_rich_media(){

    //     echo "
    //         <!-- /40135427/gestiopolis_Rich_Media -->
    //         <div id='div-gpt-ad-1524772394317-0' style='height:1px; width:1px;'>
    //         <script>
    //         googletag.cmd.push(function() { googletag.display('div-gpt-ad-1524772394317-0'); });
    //         </script>
    //         </div>
    //     ";
    // }

    // add_filter('wp_footer', 'footer_rich_media');


    function dfp_header(){
        echo "

            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
            <script>
             var googletag = googletag || {};
             googletag.cmd = googletag.cmd || [];
            </script>

            <script>
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/Header-Video', [1, 1], 'div-gpt-ad-1539814453304-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>

            <!-- /1007663/Header-Video -->
            <div id='div-gpt-ad-1539814453304-0' style='height:1px; width:1px;'>
            <script>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1539814453304-0'); });
            </script>
            </div>
        ";


    }

    add_filter('wp_head', 'dfp_header');


// Head taboola category and tags

function head_taboola_category_tags(){

    if (is_home() || is_front_page()){
        
        echo "
            <script type='text/javascript'>
              window._taboola = window._taboola || [];
              _taboola.push({home:'auto'});
              !function (e, f, u, i) {
                if (!document.getElementById(i)){
                  e.async = 1;
                  e.src = u;
                  e.id = i;
                  f.parentNode.insertBefore(e, f);
                }
              }(document.createElement('script'),
              document.getElementsByTagName('script')[0],
              '//cdn.taboola.com/libtrc/embimedia-gestiopolis/loader.js',
              'tb_loader_script');
              if(window.performance && typeof window.performance.mark == 'function')
                {window.performance.mark('tbl_ic');}
            </script>
        
        ";
    }elseif(is_category() || is_tag() ){
        echo "
            <script type='text/javascript'>
              window._taboola = window._taboola || [];
              _taboola.push({category:'auto'});
              !function (e, f, u, i) {
                if (!document.getElementById(i)){
                  e.async = 1;
                  e.src = u;
                  e.id = i;
                  f.parentNode.insertBefore(e, f);
                }
              }(document.createElement('script'),
              document.getElementsByTagName('script')[0],
              '//cdn.taboola.com/libtrc/embimedia-gestiopolis/loader.js',
              'tb_loader_script');
              if(window.performance && typeof window.performance.mark == 'function')
                {window.performance.mark('tbl_ic');}
            </script>
        ";

    }elseif (is_single( )) {
        echo "
                
            <script type='text/javascript'>
              window._taboola = window._taboola || [];
              _taboola.push({article:'auto'});
              !function (e, f, u, i) {
                if (!document.getElementById(i)){
                  e.async = 1;
                  e.src = u;
                  e.id = i;
                  f.parentNode.insertBefore(e, f);
                }
              }(document.createElement('script'),
              document.getElementsByTagName('script')[0],
              '//cdn.taboola.com/libtrc/embimedia-gestiopolis/loader.js',
              'tb_loader_script');
              if(window.performance && typeof window.performance.mark == 'function')
                {window.performance.mark('tbl_ic');}
            </script>

        ";
    }


}

add_filter('wp_head','head_taboola_category_tags');



// Footer taboola category, tags y home

function footer_taboola_category_tag(){

    if (is_category() || is_tag() || is_home() || is_front_page()) {

        echo "
            
            <script type='text/javascript'>
              window._taboola = window._taboola || [];
              _taboola.push({flush: true});
            </script>

        ";
    }

}


add_filter('wp_footer','footer_taboola_category_tag');



// Head taboola home

function head_taboola_home(){

    if (is_category() || is_tag() || is_home() || is_front_page()) {
        
        echo "
            <script type='text/javascript'>
              window._taboola = window._taboola || [];
              _taboola.push({home:'auto'});
              !function (e, f, u, i) {
                if (!document.getElementById(i)){
                  e.async = 1;
                  e.src = u;
                  e.id = i;
                  f.parentNode.insertBefore(e, f);
                }
              }(document.createElement('script'),
              document.getElementsByTagName('script')[0],
              '//cdn.taboola.com/libtrc/embimedia-gestiopolis/loader.js',
              'tb_loader_script');
              if(window.performance && typeof window.performance.mark == 'function')
                {window.performance.mark('tbl_ic');}
            </script>
        
        ";
    }


}

add_filter('wp_head','head_taboola_home');




/** Vidweb-Intext **/

function VidwebIntext(){


    echo "

        <!--    Start LKQD tag - Part 1/2, head section -->
          <script type='text/javascript'>

        (function()
        {
          var lkqdSettings = {
            pid: 410,
            sid: 966224,
            playerContainerId: 'insert_value_here',
            playerId: '',
            playerWidth: '640',
            playerHeight: '360',
            execution: 'outstream',
            placement: 'incontent',
            playInitiation: 'auto',
            volume: 100,
            trackImp: '',
            trackClick: '',
            custom1: '',
            custom2: '',
            custom3: '',
            pubMacros: '',
            dfp: false,
            gdpr: '',
            gdprcs: '',
            lkqdId: new Date().getTime().toString() + Math.round(Math.random()*1000000000).toString()
          };

          var lkqdVPAID;
          var creativeData = '';
          var environmentVars = { slot: document.getElementById(lkqdSettings.playerContainerId), videoSlot: document.getElementById(lkqdSettings.playerId), videoSlotCanAutoPlay: true, lkqdSettings: lkqdSettings };

          function onVPAIDLoad()
          {
            lkqdVPAID.subscribe(function() { lkqdVPAID.startAd(); }, 'AdLoaded');
            lkqdVPAID.subscribe(function() { lkqdVPAID.pauseAd(); }, 'AdNotViewable');
            lkqdVPAID.subscribe(function() { lkqdVPAID.resumeAd(); }, 'AdViewable');
          }

          var vpaidFrame = document.createElement('iframe');
          vpaidFrame.id = lkqdSettings.lkqdId;
          vpaidFrame.name = lkqdSettings.lkqdId;
          vpaidFrame.style.display = 'none';
          var vpaidFrameLoaded = function() {
            vpaidFrame.contentWindow.addEventListener('lkqdFormatsLoad', function() {
              lkqdVPAID = vpaidFrame.contentWindow.getVPAIDAd();
              onVPAIDLoad();
              lkqdVPAID.handshakeVersion('2.0');
              lkqdVPAID.initAd(lkqdSettings.playerWidth, lkqdSettings.playerHeight, 'normal', 600, creativeData, environmentVars);
            });
            vpaidLoader = vpaidFrame.contentWindow.document.createElement('script');
            vpaidLoader.setAttribute('async','async');
            vpaidLoader.src = 'https://ad.lkqd.net/vpaid/formats.js';
            vpaidFrame.contentWindow.document.body.appendChild(vpaidLoader);
          };
          vpaidFrame.onload = vpaidFrameLoaded;
          vpaidFrame.onerror = vpaidFrameLoaded;
          document.documentElement.appendChild(vpaidFrame);
        })();
        </script>
        <!-- End LKQD Format tag- Part 1/2, head section --> 
        

        <!-- Mobile -->

        <!--	Start LKQD tag - Part 1/2, head section -->
  <script type='text/javascript'>

(function()
{
  var lkqdSettings = {
    pid: 410,
    sid: 966225,
    playerContainerId: 'vidweb-mobile',
    playerId: '',
    playerWidth: '',
    playerHeight: '',
    execution: 'outstream',
    placement: 'incontent',
    playInitiation: 'auto',
    volume: 100,
    trackImp: '',
    trackClick: '',
    custom1: '',
    custom2: '',
    custom3: '',
    pubMacros: '',
    dfp: false,
    gdpr: '',
    gdprcs: '',
    lkqdId: new Date().getTime().toString() + Math.round(Math.random()*1000000000).toString()
  };

  var lkqdVPAID;
  var creativeData = '';
  var environmentVars = { slot: document.getElementById(lkqdSettings.playerContainerId), videoSlot: document.getElementById(lkqdSettings.playerId), videoSlotCanAutoPlay: true, lkqdSettings: lkqdSettings };

  function onVPAIDLoad()
  {
    lkqdVPAID.subscribe(function() { lkqdVPAID.startAd(); }, 'AdLoaded');
    lkqdVPAID.subscribe(function() { lkqdVPAID.pauseAd(); }, 'AdNotViewable');
    lkqdVPAID.subscribe(function() { lkqdVPAID.resumeAd(); }, 'AdViewable');
  }

  var vpaidFrame = document.createElement('iframe');
  vpaidFrame.id = lkqdSettings.lkqdId;
  vpaidFrame.name = lkqdSettings.lkqdId;
  vpaidFrame.style.display = 'none';
  var vpaidFrameLoaded = function() {
    vpaidFrame.contentWindow.addEventListener('lkqdFormatsLoad', function() {
      lkqdVPAID = vpaidFrame.contentWindow.getVPAIDAd();
      onVPAIDLoad();
      lkqdVPAID.handshakeVersion('2.0');
      lkqdVPAID.initAd(lkqdSettings.playerWidth, lkqdSettings.playerHeight, 'normal', 600, creativeData, environmentVars);
    });
    vpaidLoader = vpaidFrame.contentWindow.document.createElement('script');
    vpaidLoader.setAttribute('async','async');
    vpaidLoader.src = 'https://ad.lkqd.net/vpaid/formats.js';
    vpaidFrame.contentWindow.document.body.appendChild(vpaidLoader);
  };
  vpaidFrame.onload = vpaidFrameLoaded;
  vpaidFrame.onerror = vpaidFrameLoaded;
  document.documentElement.appendChild(vpaidFrame);
})();
</script>
<!-- End LKQD Format tag- Part 1/2, head section -->
 

    ";
}

add_filter('wp_head','VidwebIntext');



// Vidoomy head

function head_vidoomy(){

    if(wp_is_mobile()){

    echo "<script type='text/javascript' src='//ads.vidoomy.com/gestiopolisslider_1236.js' ></script>";

    }
}

add_filter('wp_head', 'head_vidoomy');


// function DFP head 8 parrafo

function head_dfp(){

    // Unicamente las categorias

    if (is_category()) {
        echo "
                
            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
            <script>
             var googletag = googletag || {};
             googletag.cmd = googletag.cmd || [];
            </script>

            <script>
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/Categoria-Top-728x90', [728, 90], 'div-gpt-ad-1559755405415-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>

        ";
    }


    // Unicamente los tags
    if (is_tag()) {
        echo "
            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
            <script>
             var googletag = googletag || {};
             googletag.cmd = googletag.cmd || [];
            </script>

            <script>
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/Tag-Top-728x90', [728, 90], 'div-gpt-ad-1559754535644-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>
    
        ";
    }


    // Unicamente el index

    if (is_home() || is_front_page()) {
        echo "
            
            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
            <script>
             var googletag = googletag || {};
             googletag.cmd = googletag.cmd || [];
            </script>

            <script>
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/Home-Top-728x90', [728, 90], 'div-gpt-ad-1559754130804-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>

        ";
    }



    // head parrafo 8 single
    if (is_single()) {


        echo "
                
            <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
            <script>
             var googletag = googletag || {};
             googletag.cmd = googletag.cmd || [];
            </script>

            <script>
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/Post_Octavo_P', [1, 1], 'div-gpt-ad-1559753635001-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>
        ";
    }
}

add_filter('wp_head', 'head_dfp');