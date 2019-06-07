<?php while (have_posts()) : the_post(); ?>
  <div class="container cposts">
    <div class="row">
      <div class="hidden-xs hidden-sm col-md-3 sidebarcol gafrom from-sidebar-post">
        <div class="fixedside">

        <!-- Surge Pricing Unit - gestiopolis.com_300x600_piso030 -->

        <div data-ad="gestiopolis.com_300x600_piso030" data-devices="m:1,t:1,d:1" class="demand-supply"></div>
        
      <!-- // Surge Pricing Unit - gestiopolis.com_300x600_piso030 -->

<?php get_template_part('templates/sidebar-post'); ?>
  </div>
</div><!--.col-sm-3-->
      <div class="col-sm-12 col-md-9 maincol">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title title"><?php the_title(); ?></h1>
          <div class="row"><!-- Empieza row de contenido y meta datos -->
            <div class="col-sm-12 col-md-2 col-md-push-10">
              <div class="breadcredit gafrom from-post-breadcredit">
                <?php get_template_part('templates/entry-meta'); ?>
                <?php the_tags('<div class="temas-uppost hidden-xs hidden-sm gafrom from-post-tags"> ','','</div>'); ?>
                
                  <!-- Taboola Tags -->

                  <div class="ads_right_tags">

                    <div id="taboola-right-rail-thumbnails"></div>
                      <script type="text/javascript">
                        window._taboola = window._taboola || [];
                        _taboola.push({
                          mode: 'thumbnails-rr',
                          container: 'taboola-right-rail-thumbnails',
                          placement: 'Right Rail Thumbnails',
                          target_type: 'mix'
                        });
                      </script>

                    </div>
                  <!-- Taboola Tags -->
                  
              </div>
            </div>
            <div class="col-sm-12 col-md-10 col-md-pull-2 content-col">
          <time class="entry-date published hidden" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date('d.m.Y'); ?></time>
          <time class="entry-date updated hidden" datetime="<?php echo get_the_modified_time('c'); ?>"><?php echo get_the_modified_date('d.m.Y'); ?></time>


          <div class="post-content clearfix">
            <div class="entry-content gafrom from-post-entry-content">
              <?php //if ( get_post_meta($post->ID, "all2html_htmlcontent", true) == "" ) { ?>
              <div class="adsfr">
                
                <!-- Sulvo - Debajo del titulo del artículo - under_page_title -->

                  <div data-ad="gestiopolis.com_300x250_precio030300x250" data-devices="m:1,t:1,d:1" class="demand-supply"></div>

                <!-- Sulvo - Debajo del titulo del artículo - under_page_title -->
        

              </div>
              
              <?php //} ?>
              <?php the_content(); ?>
            </div>


             <!-- Banner publicidad Taboola -->
             <div class="center">
               <div id="taboola-below-article-thumbnails"></div>
               <script type="text/javascript">
                 window._taboola = window._taboola || [];
                 _taboola.push({
                   mode: 'thumbnails-a',
                   container: 'taboola-below-article-thumbnails',
                   placement: 'Below Article Thumbnails',
                   target_type: 'mix'
                 });
               </script>
             </div>
             <!-- /Banner publicidad Taboola -->

             
            <div id="likepost" class="compartelo  gafrom from-post-likepost">
              <h2 class="text-center">Hazle saber al autor que aprecias su trabajo</h2>
              <div style="text-align: center !important;margin: 0 auto !important;width: 40px;">
                <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
              </div>
              <?php //if(function_exists(getILikeThis)) getILikeThis('get'); ?>
            </div>
            
            </div>
            <?php if (get_post_meta($post->ID, "downloads_value", true) != '') { ?>
            <div class="downbox"><a class="downlink gafrom from-post-downlink" href="<?php echo get_post_meta($post->ID, 'downloads_value', true); ?>"><span class="author-color"><i class="fa fa-cloud-download"></i></span> Descarga el archivo original</a></div>
            <?php } ?>

            <!-- Comments -->


            <div  class="comentarios gafrom from-post-comments">
              <span class="btn btn-block btn-primary btn-lg"><span>Tu opinión vale, comenta aquí</span></span>
              
                <h2><i class="fa fa-comments"></i> Comentarios</h2>


                <?php comments_template('/templates/comments.php'); ?>
              
            </div>
                  
            
           <!--  <div id="comments" class="comentarios gafrom from-post-comments">
              <a href="javascript:;" class="btn btn-block btn-primary btn-lg cerrado"><span>Tu opinión vale, comenta aquí</span><span style="display:none;">Oculta los comentarios</span></a>
              <div id="respond" class="comments-wrapper">
                <h2><i class="fa fa-comments"></i> Comentarios</h2>

                <div id="fb-root"></div>

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, sed praesentium atque quod debitis fugiat, molestias provident quis consectetur, natus optio fuga. Iusto, provident voluptate recusandae doloribus fugiat reiciendis esse.

                <?php //comments_template('/templates/comments.php'); ?>
              </div>
            </div> -->


            <!-- Comments -->

  
            <div class="compartelo">
              <h2><i class="fa fa-share"></i> Compártelo con tu mundo</h2>
              <ul class="list-unstyled gafrom from-post-compartelo">
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

            
            <div id="autores" class="autores">
              <h2>Escrito por:</h2>
              <div itemprop="author" itemscope itemtype="https://schema.org/Person" class="author vcard gafrom from-post-author-info-bottom">
                <?php if(get_post_meta($post->ID, "author-name_value", true) != "") : ?>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="url">
                  <?php echo get_author_color_id(); ?>
                  <strong itemprop="name" class="fn"><?php echo get_post_meta($post->ID, "author-name_value", true); ?></strong>
                </a>
                <p class="selectionShareable">
                  <em itemprop="description"><?php echo get_post_meta($post->ID, "author-bio_value", true); ?></em>
                </p>
                <?php else : ?>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="url fn">
                  <?php echo get_author_color_id(); ?>
                  <strong itemprop="name"><?php echo get_the_author(); ?></strong>
                </a>
                <p class="selectionShareable">
                  <em itemprop="description"><?php echo get_the_author_meta('description'); ?></em>
                </p>
                <?php endif; ?>
              </div>
            </div>
            
            <?php if(is_user_logged_in() && current_user_can( 'manage_options')){ ?>
            <?php get_template_part('templates/post-front-edit'); ?>
            <?php } ?>
            <?php get_template_part('templates/entry-exlinks'); ?>
            <div class="quotes gafrom from-post-quotes">
              <div>
                <span class="author-color"><i class="fa fa-thumb-tack"></i></span>
                <strong>Cita esta página</strong>
                <ul>
                  <li class="active"><a href="#apa" data-toggle="tab">APA</a></li>
                  <li><a href="#mla" data-toggle="tab">MLA</a></li>
                  <li><a href="#chicago" data-toggle="tab">CHICAGO</a></li>
                  <li><a href="#icontec" data-toggle="tab">ICONTEC</a></li>
                </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="apa">
                  <?php echo get_the_author_meta('last_name').' '.get_the_author_meta('first_name'); ?>. (<?php echo get_the_date('Y, F j'); ?>). <em><?php echo get_the_title(); ?></em>. Recuperado de <?php echo get_permalink(); ?> 
                </div>
                <div class="tab-pane" id="mla">
                  <?php echo get_the_author_meta('last_name').', '.get_the_author_meta('first_name'); ?>. "<?php echo get_the_title(); ?>". <em><?php echo get_bloginfo('name'); ?></em>. <?php echo get_the_date('j F Y'); ?>. Web. &lt;<?php echo get_permalink(); ?>&gt;.
                </div>
                <div class="tab-pane" id="chicago">
                  <?php echo get_the_author_meta('last_name').', '.get_the_author_meta('first_name'); ?>. "<?php echo get_the_title(); ?>". <em><?php echo get_bloginfo('name'); ?></em>. <?php echo get_the_date('F j, Y'); ?>. Consultado el <?php actual_date(); ?>. <?php echo get_permalink(); ?>.
                </div>
                <div class="tab-pane" id="icontec">
                  <?php echo get_the_author_meta('last_name').', '.get_the_author_meta('first_name'); ?>. <?php echo get_the_title(); ?> [en línea]. &lt;<?php echo get_permalink(); ?>&gt; [Citado el <?php actual_date(); ?>].
                </div>
              </div>
              <a href="javascript:;" id="copytext" class="btn btn-copiar" data-clipboard-target="apa">Copiar</a>
              <div class="hidden alert alert-success" role="alert">¡Texto copiado al portapapeles!</div>
            </div>
          </div><!-- .quotes -->

            
            <?php if (get_post_meta($post->ID, "image_url_value", true) != "") { ?>
            <div class="image-credit gafrom from-post-img-credit"><i class="fa fa-camera"></i> Imagen del encabezado cortesía de <a href="<?php echo get_post_meta($post->ID, "image_url_value", $single = true); ?>" target="_blank"><?php echo get_post_meta($post->ID, "image_author_t_value", true); ?></a> en Flickr</div>
            <?php } ?>
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
  <?php 
  $like = get_post_meta($post->ID, '_liked', true);
  if ($like == ""){
    update_post_meta($post->ID, '_liked', 1);
  }

  ?>
<?php endwhile; ?>
