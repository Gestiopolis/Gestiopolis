<?php
$term = get_queried_object();
global $current_user;
get_currentuserinfo();
?>
<div class="post-image">
  <div class="bg-image" style="background: #c5cae9; height: 248px;"></div>
  <div class="vert-center-wrapper">
    <div class="vert-centered">
      <div class="center container">
        <span class="author-color"><i class="fa fa-tag"></i></span>
        <h1 class="title"><?php single_term_title(); ?></h1>
      </div>
    </div>
  </div>        
</div>
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="adsce">
      <div id="google-ads-docs-1"></div>

      <script type="text/javascript"> 
       
          /* Calculate the width of available ad space */
          ad = document.getElementById('google-ads-docs-1');
       
          if (ad.getBoundingClientRect().width) {
              adWidth = ad.getBoundingClientRect().width; // for modern browsers 
          } else {
              adWidth = ad.offsetWidth; // for old IE 
          }
       
          /* Replace ca-pub-XXX with your AdSense Publisher ID */ 
          google_ad_client = "ca-pub-1187873112185798";
       
          /* Replace 1234567890 with the AdSense Ad Slot ID */ 
          google_ad_slot = "7664190414";
        
          /* Do not change anything after this line */
          if ( adWidth >= 970 )
            google_ad_size = ["970", "90"];  /* Leaderboard 728x90 */
          else if ( adWidth >= 727 )
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
              </script>
      </div>
    </div>
  </div>
  <!-- Empieza sección de TÍTULO DE CATEGORÍA -->
  <div class="row posts-home">
    <div class="col-md-12">
      <div class="row tab-content">
        <div class="tab-pane active gafrom from-tag-posts" id="publicaciones">
          <?php
            if ( have_posts() ) :
              // Start the Loop.
              while ( have_posts() ) : the_post();

                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 */
                get_template_part( 'templates/content' );
            
              endwhile;
              ?>
              <?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
              <div class="pagination">
                <?php wp_pagenavi(); ?>
              </div>
              <?php } else { ?>
              <div class="pagination">
                <div class="nav-previous alignleft"><?php next_posts_link( 'Artículos anteriores' ); ?></div>
              </div>
              <?php } ?>
              <?php
            endif;
          ?>
        </div><!-- #recientes -->
      </div><!-- .row -->
    </div><!-- .span4 -->
  </div><!-- .row LISTADO DE POSTS -->
</div><!-- .container -->