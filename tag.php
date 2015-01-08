<?php
$term = get_queried_object();
global $current_user;
get_currentuserinfo();
?>
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <!-- Empieza sección de TÍTULO DE CATEGORÍA -->
  <div class="row titu-tag">
    <div class="col-sm-24">
      <i class="fa fa-tag"></i>
      <div class="tag-nombre"><?php single_term_title(); ?></div>
      <!--<br class="clearfix">-->
      <div class="tag-tagline">
        <a href="#" class="enl-compartir"><i class="fa fa-share"></i> Compartir</a>
        <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
      </div>
    </div><!-- .col-md-8 -->
  </div><!-- .row TÍTULO DE TAG -->
  <div class="row posts-home">
    <div class="col-md-36">
      <div class="row title-loggedin">
        <div class="col-sm-24">
          <div class="title-home-loggedin">
            <div class="thl">
              <a href="#publicaciones" class="active" data-toggle="tab">Publicaciones (<?php echo $term->count; ?>)</a> <span>&bull;</span> <a href="#autores" data-toggle="tab">Autores (11)</a> <span>&bull;</span><!-- <a href="#seguidores" data-toggle="tab">Seguidores (12)</a>-->
            </div>
          </div> 
        </div><!-- .col-sm-24 -->
        <div class="col-sm-12">
          <div class="btns-orden btn-toolbar">
            <div id="OrdenNuevasPopulares" class="btn-group">
              <a href="#"  id="ordenNuevas" class="btn btn-orden dropdown-toggle" data-toggle="dropdown">Ordenar por <i class="icon-sort-down"></i></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="ordenNuevas">
                <li><a href="#">Más nuevas</a></li>
                <li><a href="#">Más populares</a></li>
              </ul>
              <!--<a href="#" class="btn btn-orden">Más populares <i class="icon-sort"></i></a>-->
            </div>
            <div id="OrdenEjes" class="btn-group">
              <a href="#" class="btn btn-unete">Invita a tus amigos</a>
            </div>
          </div><!-- .btns-orden -->
        </div><!-- .col-sm-12 -->
      </div><!-- .row -->
      <div class="row tab-content">
        <div class="tab-pane active" id="publicaciones">
          <?php $args1=array( 'posts_per_page'=>9, 'tag__in'=>array($term->term_id));//Empieza query del último post
      $query1 = new WP_Query($args1);
        if( $query1->have_posts() ) { while ($query1->have_posts()) : $query1->the_post(); 
          $category = get_the_category($post->ID); 
          ?>
          <div class="col-md-12 col-sm-18">
            <article id="post-<?php echo $post->ID; ?>" class="post">
              <div class="wrapper-img">
                <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php the_title(); ?>" class="img-responsive">
                <span class="compartir"><i class="fa fa-share"></i></span>
                <div class="meta-content">
                  <div class="botones-compartir" id="compartir-<?php echo $post->ID; ?>">
                    <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID; ?>"></div>
                    <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID; ?>"></div>
                    <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID; ?>"></div>
                    <div class="platform bc-gplus" id="gplus-compartir-<?php echo $post->ID; ?>"></div>
                  </div>
                </div>
              </div>
              <div class="wrapper-post cat-<?php echo $category[0]->term_id; ?>">
                <div class="cat-bar">
                    <a href="<?php echo get_category_link( $category[0]->term_id ) ?>" class="hexagon cat-bg-<?php echo $category[0]->term_id; ?>" title="Enlace a categoría <?php echo $category[0]->cat_name; ?>"><i class="fa icon-cat-<?php echo $category[0]->term_id; ?>"></i></a>
                  </div>
                <div class="wrapper-content clearfix">
                  <h2 class="entry-title"><a id="titulo-<?php echo $post->ID; ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                  <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
                    <?php echo get_avatar( $post->post_author, 32, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                  </a>
                  <div class="fecha"><?php the_time('j.m.Y') ?></div>
                  <div class="post-content">
                    <p><?php echo title_trim(220, get_the_excerpt()); ?></p>
                  </div>
                </div>
              </div>
              <div class="wrapper-meta clearfix">
                <?php the_tags('<div class="tags"><i class="fa fa-tags"></i> ',', ','</div>'); ?>
                <div class="stats"><i class="fa fa-eye"></i> <?php if(function_exists('the_views')) { the_views(); } ?> <i class="fa fa-comments"></i> <?php comments_number('0','1','%'); ?> <i class="fa fa-heart"></i> 21</div>
                <div class="tiempo"><i class="fa fa-coffee"></i> Leerlo te tomará <?php echo estimate_time_shortcode();?></div>
              </div>
            </article><!-- .post -->
          </div><!-- .col-md-12 col-sm-18 -->
          <?php endwhile;?>
          <?php } 
          wp_reset_query(); 
          wp_reset_postdata(); ?>
        </div><!-- #recientes -->
        <div class="tab-pane autores-home" id="autores">
          <div class="col-sm-12">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div>
              <div class="wrapper-meta">
                <div class="span1">
                  <span class="number">12</span> publicaciones
                </div><!-- .span1 -->
                <div class="span1">
                  <span class="number">123456</span> lectores
                </div><!-- .span1 -->
                <div class="span1">
                  <span class="number">123</span> seguidores
                </div><!-- .span1 -->
              </div>
            </div><!-- .row -->
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .col-sm-12 -->
          <div class="col-sm-12">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div>
              <div class="wrapper-meta">
                <div class="span1">
                  <span class="number">12</span> publicaciones
                </div><!-- .span1 -->
                <div class="span1">
                  <span class="number">123456</span> lectores
                </div><!-- .span1 -->
                <div class="span1">
                  <span class="number">123</span> seguidores
                </div><!-- .span1 -->
              </div>
            </div><!-- .row -->
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .col-sm-12 -->
          <div class="col-sm-12">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div>
              <div class="wrapper-meta">
                <div class="span1">
                  <span class="number">12</span> publicaciones
                </div><!-- .span1 -->
                <div class="span1">
                  <span class="number">123456</span> lectores
                </div><!-- .span1 -->
                <div class="span1">
                  <span class="number">123</span> seguidores
                </div><!-- .span1 -->
              </div>
            </div><!-- .row -->
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .col-sm-12 -->
        </div><!-- #parati -->
      </div><!-- .row -->
    </div><!-- .span12 -->
  </div><!-- .row LISTADO DE POSTS -->
</div><!-- .container -->