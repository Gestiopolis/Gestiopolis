<?php
/*
Template Name: StoryAd Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <div class="container cposts">
    <div class="row">
      <div class="hidden-xs hidden-sm col-md-3 sidebarcol">
        <div class="fixedside">
<?php if (get_post_meta($post->ID, "all2html_htmlcontent", true) != "") {?>
<div id="google-ads-sidebar"></div>
<script type="text/javascript"> 
 
    /* Calculate the width of available ad space */
    ad = document.getElementById('google-ads-sidebar');
 
    if (ad.getBoundingClientRect().width) {
        adWidth = ad.getBoundingClientRect().width; // for modern browsers 
    } else {
        adWidth = ad.offsetWidth; // for old IE 
    }
 
    /* Replace ca-pub-XXX with your AdSense Publisher ID */ 
    google_ad_client = "ca-pub-1187873112185798";
 
    /* Replace 1234567890 with the AdSense Ad Slot ID */ 
    google_ad_slot = "6290017974";
  
    /* Do not change anything after this line */
    if ( adWidth >= 300 )
      google_ad_size = ["300", "600"];  /* Leaderboard 728x90 */
    else
      google_ad_size = ["160", "600"]; /* Button (125 x 125) */
 
    google_ad_width = google_ad_size[0];
    google_ad_height=google_ad_size[1];
 
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php }else { ?>      
<div id="google-ads-sidebar"></div>
<script type="text/javascript"> 
 
    /* Calculate the width of available ad space */
    ad = document.getElementById('google-ads-sidebar');
 
    if (ad.getBoundingClientRect().width) {
        adWidth = ad.getBoundingClientRect().width; // for modern browsers 
    } else {
        adWidth = ad.offsetWidth; // for old IE 
    }
 
    /* Replace ca-pub-XXX with your AdSense Publisher ID */ 
    google_ad_client = "ca-pub-1187873112185798";
 
    /* Replace 1234567890 with the AdSense Ad Slot ID */ 
    google_ad_slot = "9383186454";
  
    /* Do not change anything after this line */
    if ( adWidth >= 300 )
      google_ad_size = ["300", "600"];  /* Leaderboard 728x90 */
    else
      google_ad_size = ["160", "600"]; /* Button (125 x 125) */
 
    google_ad_width = google_ad_size[0];
    google_ad_height=google_ad_size[1];
 
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php } ?>
<?php get_template_part('templates/sidebar-post'); ?>
</div>
      </div><!--.col-sm-3-->
      <div class="col-sm-12 col-md-9 maincol">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title title"><!-- #Title --></h1>
          <div class="row">
            <div class="col-sm-12 col-md-2 col-md-push-10">
              <div class="breadcredit">
                <div class="author-info">
								  <a href="#autores" rel="author" class="fn"><!-- #Author --></a>
								</div>
								<ul class="list-unstyled">
								  <li><time class="entry-date published" datetime="<?php echo get_the_time('c'); ?>"><i class="fa fa-calendar"></i> <!-- #ReleaseDate --></time></li>
								</ul>
              </div>
            </div>
            <div class="col-sm-12 col-md-10 col-md-pull-2 content-col">
          <div class="post-content clearfix">
            <div class="entry-content">
              <?php //the_content(); ?>
              <!-- #Release -->
            </div>
            <div class="adsce">
              <script type="text/javascript"><!--
              google_ad_client = "ca-pub-1187873112185798";
              /* post-doc-fondo-contenido */
              google_ad_slot = "2800946094";
              google_ad_width = 300;
              google_ad_height = 250;
              //-->
              </script>
              <script type="text/javascript"
              src="//pagead2.googlesyndication.com/pagead/show_ads.js">
              </script>
            </div>
            <div id="comments" class="comentarios">
              <a href="javascript:;" class="btn btn-block btn-primary btn-lg cerrado"><span>Tu opinión vale, comenta aquí</span><span style="display:none;">Oculta los comentarios</span></a>
              <div class="comments-wrapper">
                <h2><i class="fa fa-comments"></i> Comentarios</h2>
                <?php echo do_shortcode('[fbcomments]'); ?>
                <?php //comments_template('/templates/comments.php'); ?>
              </div>
            </div>
            <div class="compartelo">
              <h2><i class="fa fa-share"></i> Compártelo con tu mundo</h2>
              <ul class="list-unstyled">
                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&layout=link&appId=220995104693477" class="btn facebook"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink());?>&amp;text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
 ?>&amp;via=gestiopoliscom" class="btn twitter"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                <li><a target="_blank" href="mailto:?subject=Revisa este artículo&amp;body=Hola! Revisa este artículo: <?php the_title(); ?> - <?php echo get_permalink(); ?>." class="btn email"><i class="fa fa-envelope"></i></a></li>
                <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" class="btn google"><i class="fa fa-google-plus"></i></a></li>
                <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
 ?>" class="btn linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="btn more"><i class="fa fa-plus"></i></a></li>
              </ul>
            </div><!-- .compartelo -->
            <div class="compartelo posts-home hidden-md hidden-lg">
              <div class="title-section"><h2>Relacionados</h2><i class="fa fa-caret-down"></i></div>
              <?php 
              $show = 12;
              $postsnot = array();
              $postsnot[] = $post->ID;
              $mainpost = $post->ID;
              $query1 = ci_get_related_posts_1( $post->ID, $show );
              //$countp = 1;
                  if( $query1->have_posts() ) { while ($query1->have_posts()) : $query1->the_post(); 
                    $postsnot[] = $post->ID;
                    if($mainpost != $post->ID){
                      get_template_part( 'templates/content', 'recommend' );
                    }
                    //$countp++; 
                   endwhile;?>
                  <?php } 
                  wp_reset_query(); 
                  wp_reset_postdata(); 
                  $show = $show - count($query1->posts);
                 if ($show > 0) {
                  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $query2 = ci_get_related_posts_2( $post->ID, $postsnot, $show, $paged );
                    if( $query2->have_posts() ) { while ($query2->have_posts()) : $query2->the_post();get_template_part( 'templates/content', 'recommend' );
                     endwhile;
                    } 
                    wp_reset_query(); 
                    wp_reset_postdata();
                  }
                  ?>
            </div><!-- .recomendados -->
          </div>
          <footer>
            <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
          </footer>
        </div><!-- fin col-md-10 -->
        </div><!-- fin de row de contenido y meta -->
        </article>
      </div><!--.col-sm-9-->
      
    </div><!-- fin de .row -->
  </div>
<?php endwhile; ?>
