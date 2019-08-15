<?php
/****************************************
*****************************************
      Aqui comienzan los head
*****************************************
*****************************************/

/* DFP Tercer parrafo Head*/
    // function head_DFP_tercer_parrafo(){
    //     echo "
    //     <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
    //     <script>
    //      window.googletag = window.googletag || {cmd: []};
    //      googletag.cmd.push(function() {
    //        googletag.defineSlot('/1007663/Post-3Parrafo-VideoAds', [1, 1], 'div-gpt-ad-1564762063649-0').addService(googletag.pubads());
    //        googletag.pubads().enableSingleRequest();
    //        googletag.enableServices();
    //      });
    //     </script>
    //   ";


    // }

    // add_filter('wp_head', 'head_DFP_tercer_parrafo');


// DFP head quinto parrafo
    function head_DFP_quinto_parrafo(){

        echo "

            <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
            <script>
             window.googletag = window.googletag || {cmd: []};
             googletag.cmd.push(function() {
               googletag.defineSlot('/1007663/5to-Parrafo-Ads', [300, 250], 'div-gpt-ad-1564760269858-0').addService(googletag.pubads());
               googletag.pubads().enableSingleRequest();
               googletag.enableServices();
             });
            </script>
        
        ";
    }


    add_filter('wp_head', 'head_DFP_quinto_parrafo');




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



// Head taboola general

// function head_taboola_home(){

//     if (is_single()) {
        
//         echo "
//             <script type='text/javascript'>
//               window._taboola = window._taboola || [];
//               _taboola.push({home:'auto'});
//               !function (e, f, u, i) {
//                 if (!document.getElementById(i)){
//                   e.async = 1;
//                   e.src = u;
//                   e.id = i;
//                   f.parentNode.insertBefore(e, f);
//                 }
//               }(document.createElement('script'),
//               document.getElementsByTagName('script')[0],
//               '//cdn.taboola.com/libtrc/embimedia-gestiopolis/loader.js',
//               'tb_loader_script');
//               if(window.performance && typeof window.performance.mark == 'function')
//                 {window.performance.mark('tbl_ic');}
//             </script>
        
//         ";
//     }


// }

// add_filter('wp_footer','head_taboola_home');


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



/* Tercer parrafo VIDEO */

    function insert_post_ads_two( $content ) {
        $ad_code = '

            <!-- /1007663/Post-3Parrafo-VideoAds -->
            <div id="div-gpt-ad-1565111312207-0" style="width: 1px; height: 1px;">
             <script>
               googletag.cmd.push(function() { googletag.display("div-gpt-ad-1565111312207-0"); });
             </script>
            </div>

        ';
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 4, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_two' );

 //Insertar ads o contenido propio después 5 parrafo
    function insert_post_ads( $content ) {
        $ad_code = '<div style="width:300px !important;height:250px !important; text-align:center !important;margin:0 auto !important">

                   <!-- /1007663/5to-Parrafo-Ads -->
                  <div id="div-gpt-ad-1564760269858-0" style="width: 300px; height: 250px;">
                   <script>
                     googletag.cmd.push(function() { googletag.display("div-gpt-ad-1564760269858-0"); });
                   </script>
                  </div>

                    </div>

        ';
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 6, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads' );



    //Insertar ads o contenido propio después 8 parrafo
    function insert_post_ads_8_mobile( $content ) {
        
        if(wp_is_mobile()){

        $ad_code = '

        <div style="width:320px !important;height:100px !important; text-align:center !important;margin:0 auto !important">

            <div data-ad="gestiopolis.com_320x100_sulvo_mobile_2_320x100" data-devices="m:1,t:1,d:0" class="demand-supply"></div>

        </div>

        ';

        }
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 8, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_8_mobile' );



//Insertar ads o contenido propio después 10 parrafo - Sulvo
    function insert_post_ads_10_mobile( $content ) {
        
        if(wp_is_mobile()){

        $ad_code = '

        <div style="width:300px !important;height:250px !important; text-align:center !important;margin:0 auto !important">

               <div data-ad="gestiopolis.com_300x250_sulvo_mobile_3_300x250" data-devices="m:1,t:1,d:0" class="demand-supply"></div>

        </div>

        ';

        }
     
        if ( is_single() && ! is_admin() ) {
            return insert_ads_after_paragraph( $ad_code, 10, $content );
        }
        return $content;
    }
    add_filter( 'the_content', 'insert_post_ads_10_mobile' );

    

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


// Footer taboola category, tags y home

function footer_taboola_category_tag(){

    if (is_single()) {

        echo "
            
            <script type='text/javascript'>
              window._taboola = window._taboola || [];
              _taboola.push({flush: true});
            </script>

        ";
    }

}


add_filter('wp_footer','footer_taboola_category_tag');