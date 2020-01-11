<?php
/****************************************
*****************************************
      Aqui comienzan los head
*****************************************
*****************************************/
  /* VIDEO.TV DISPLAY IN POST */
  function head_videotv_inpost(){
    echo '<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
  <script>
  window.googletag = window.googletag || {cmd: []};
   googletag.cmd.push(function() {
     googletag.defineSlot("/21682672808/Publishers/gestipolis_300x250", [300, 250], "div-gpt-ad-1573753388873-0").addService(googletag.pubads());
     googletag.pubads().enableSingleRequest();
     googletag.enableServices();
   });
  </script>';
  }

  add_filter('wp_head', 'head_videotv_inpost');

/* DFP Tercer parrafo Head*/
    function head_DFP_tercer_parrafo(){
        echo "
        <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
        <script>
         window.googletag = window.googletag || {cmd: []};
         googletag.cmd.push(function() {
           googletag.defineSlot('/1007663/Post-3Parrafo-VideoAds', [1, 1], 'div-gpt-ad-1565898763476-0').addService(googletag.pubads());
           googletag.pubads().enableSingleRequest();
           googletag.pubads().collapseEmptyDivs();
           googletag.enableServices();
         });
        </script>
               
        <script>
         window.googletag = window.googletag || {cmd: []};
         googletag.cmd.push(function() {
           googletag.defineSlot('/1007663/Tercer-Parrafo-Display', [[336, 280], [1, 1], [300, 250], [728, 90]], 'div-gpt-ad-1570826580296-0').addService(googletag.pubads());
           googletag.pubads().enableSingleRequest();
           googletag.pubads().collapseEmptyDivs();
           googletag.enableServices();
         });
        </script>
        ";
    }

    add_filter('wp_head', 'head_DFP_tercer_parrafo');


// DFP head quinto parrafo
    function head_DFP_quinto_parrafo(){

        echo "
            <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
            <script>
             window.googletag = window.googletag || {cmd: []};
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/Post_Quinto_Parrafo', [[1, 1], [300, 250]], 'div-gpt-ad-1568760235572-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>  
        ";
    }


    //add_filter('wp_head', 'head_DFP_quinto_parrafo');



    // DFP head 8 parrafo
    function head_DFP_parrafo_8(){

        echo "

          <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
          <script>
           window.googletag = window.googletag || {cmd: []};
           googletag.cmd.push(function() {
             googletag.defineSlot('/1007663/Post_Octavo_P', [[1, 1], [300, 250]], 'div-gpt-ad-1567180150839-0').addService(googletag.pubads());
             googletag.pubads().enableSingleRequest();
             googletag.enableServices();
           });
          </script>
        
        ";
    }


    //add_filter('wp_head', 'head_DFP_parrafo_8');


    // OPT AD 360 8vo parrafo
    function opt_ad_parrafo_8(){
        echo "<script async src='//www.statsforads.com/tag/495277a1-5b85-4d9a-b7e6-d34b536286c2.min.js'></script>";
    }

    add_filter('wp_head', 'opt_ad_parrafo_8');




// function DFP

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

}

add_filter('wp_head', 'head_dfp');


/****************************************
*****************************************
  Insertar Posts en medio del single
*****************************************
*****************************************/


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




/* 1 parrafo taboola embi */

    function insert_post_ads_one( $content ) {
        $ad_code = '

            <script type="text/javascript">
              window._taboola = window._taboola || [];
              _taboola.push({home:"auto"});
              !function (e, f, u, i) {
                if (!document.getElementById(i)){
                  e.async = 1;
                  e.src = u;
                  e.id = i;
                  f.parentNode.insertBefore(e, f);
                }
              }(document.createElement("script"),
              document.getElementsByTagName("script")[0],
              "//cdn.taboola.com/libtrc/embimedia-gestiopolis/loader.js",
              "tb_loader_script");
              if(window.performance && typeof window.performance.mark == "function")
                {window.performance.mark("tbl_ic");}
            </script>
        ';

        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 1, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_one' );



/* Tercer parrafo VIDEO */

    function insert_post_ads_two( $content ) {
        $ad_code = '

            <!-- /1007663/Post-3Parrafo-VideoAds -->
            <div id="div-gpt-ad-1565898763476-0" style="width: 1px; height: 1px;">
             <script>
               googletag.cmd.push(function() { googletag.display("div-gpt-ad-1565898763476-0"); });
             </script>
            </div>
            
            <!-- /1007663/Tercer-Parrafo-Display -->
            <div id="div-gpt-ad-1570826580296-0">
             <script>
               googletag.cmd.push(function() { googletag.display("div-gpt-ad-1570826580296-0"); });
             </script>
            </div>
        ';

        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 3, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_two' );





 //Insertar ads o contenido propio después 5 parrafo - scroller flotante
    function insert_post_ads( $content ) {

            /*$ad_code = '<div style="text-align:center !important;margin:0 auto !important">
                        <script async src="https://cdn.ad.plus/player/adplus.js"></script>
                        <script data-playerPro="current">(function(){var s=document.querySelector(\'script[data-playerPro="current"]\');s.removeAttribute("data-playerPro");(playerPro=window.playerPro||[]).push({id:"1brVB_MeRT-PaZdAIeQt3yWsoSpFKJ-BP-70J82l-6Cqz4ieYH20",after:s});})();</script>
                        </div>

            ';*/
            $ad_code = '<script async id="aniviewJS180010148" src="https://play.aniview.com/59a5603f28a0611e9360c113/5da6bdfd28a0610183257f8c/gestiopolis.com_DT_OS.js"></script>';

            if ( is_single() && ! is_admin() ) {
                return insert_ads_after_paragraph( $ad_code, 5, $content );
            }
            return $content;

    }
    add_filter( 'the_content', 'insert_post_ads' );



   //Insertar ads o contenido propio después 8 parrafo
    function insert_post_ads_8( $content ) {
        $ad_code = '<div style="text-align:center !important;margin:0 auto !important">

                  <!-- /1007663/Post_Octavo_P -->
                  <div id="div-gpt-ad-1567180150839-0">
                   <script>
                     googletag.cmd.push(function() { googletag.display("div-gpt-ad-1567180150839-0"); });
                   </script>
                  </div>

            </div>

        ';

        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 8, $content );
        }
        return $content;
    }
    //add_filter( 'the_content', 'insert_post_ads_8' );


    //Insertar opt_ad 360 o contenido propio después 8 parrafo
    function insert_opt_ad_360_8( $content ) {
        $ad_code = '<div style="text-align:center !important; margin:0 auto !important">    
                      <ins class="staticpubads89354"
                        data-sizes-desktop="300x250,336x280,360x300"
                        data-sizes-mobile="300x250,336x280,360x300"
                        data-slot="1">
                        </ins>    
                    </div>';

        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 8, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_opt_ad_360_8' );



/****************************************
*****************************************
      Aqui comienza todo el footer
*****************************************
*****************************************/


// Dataxpand Audiencias
function footer_dataxpand() {

    echo '<script type="text/javascript" src="https://tc.dataxpand.com/tc/4ccf3bf.js" async></script>';

}
add_action('wp_footer', 'footer_dataxpand', 100);



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
