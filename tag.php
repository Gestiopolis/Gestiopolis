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
  <!-- Empieza sección de TÍTULO DE CATEGORÍA -->
  <div class="row posts-home">
    <div class="col-md-12">
      <div class="row tab-content">
        <div class="tab-pane active" id="publicaciones">
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
        <div class="tab-pane autores-home" id="autores">
          <div class="col-sm-4">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div>
              <div class="wrapper-meta">
                <div class="span1">
                  <span class="number">12</span> posts
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
          </div><!-- .col-sm-4 -->
          <div class="col-sm-4">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div>
              <div class="wrapper-meta">
                <div class="span1">
                  <span class="number">12</span> posts
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
          </div><!-- .col-sm-4 -->
          <div class="col-sm-4">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div>
              <div class="wrapper-meta">
                <div class="span1">
                  <span class="number">12</span> posts
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
          </div><!-- .col-sm-4 -->
        </div><!-- #parati -->
      </div><!-- .row -->
    </div><!-- .span4 -->
  </div><!-- .row LISTADO DE POSTS -->
</div><!-- .container -->