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
        <!--<div class="col-sm-12">
          <div class="btns-orden btn-toolbar">
            <div id="OrdenNuevasPopulares" class="btn-group">
              <a href="#"  id="ordenNuevas" class="btn btn-orden dropdown-toggle" data-toggle="dropdown">Ordenar por <i class="icon-sort-down"></i></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="ordenNuevas">
                <li><a href="#">Más nuevas</a></li>
                <li><a href="#">Más populares</a></li>
              </ul>
              <a href="#" class="btn btn-orden">Más populares <i class="icon-sort"></i></a>
            </div>
            <div id="OrdenEjes" class="btn-group">
              <a href="#" class="btn btn-unete">Invita a tus amigos</a>
            </div>
          </div>
        </div>--><!-- .col-sm-12 -->
      </div><!-- .row -->
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
              <div class="pagination">
                <div class="nav-previous alignleft"><?php next_posts_link( 'Artículos anteriores' ); ?></div>
              </div>
              <?php
            endif;
          ?>
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