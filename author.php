<?php
$curaut = get_queried_object();
global $current_user;
get_currentuserinfo();
?>
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <!-- Empieza sección de TÍTULO DE CATEGORÍA -->
  <div class="row titu-tag">
    <div class="col-sm-8">
      <?php echo get_avatar( $curaut->ID, 96, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
      <div class="tag-nombre"><?php echo $curaut->display_name; ?></div>
      <!--<br class="clearfix">-->
      <div class="tag-tagline">
        <div class="user-tagline"><?php echo title_trim(125, get_the_author_meta('description', $curaut->ID)); ?></div>
        <a href="#" class="enl-compartir"><i class="fa fa-share"></i> Compartir perfil</a>
        <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
      </div>
    </div><!-- .col-sm-8 -->
  </div><!-- .row TÍTULO DE TAG -->
  <div class="row posts-home">
    <div class="col-md-12">
      <div class="row title-loggedin">
        <div class="col-sm-8">
          <div class="title-home-loggedin">
            <div class="thl">
              <a href="#perfil" data-toggle="tab">Perfil</a> <span>&bull;</span> <a href="#publicaciones" class="active" data-toggle="tab">Publicaciones (<?php echo number_format_i18n( count_user_posts( $curaut->ID) ); ?>)</a><!-- <span>&bull;</span> <a href="#autores" data-toggle="tab">Autores (11)</a> <span>&bull;</span>--><!-- <a href="#seguidores" data-toggle="tab">Seguidores (12)</a>-->
            </div>
          </div> 
        </div><!-- .col-sm-8 -->
        <!--<div class="col-sm-4">
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
        </div>--><!-- .col-sm-4 -->
      </div><!-- .row -->
      <div class="row tab-content">
        <div class="tab-pane" id="perfil">
          <!--<div class="row tab-content">-->
            <div class="col-md-3 col-sm-6">
              <article class="userbox">
                <div class="box-title">Mini Bio</div>
                <div class="box-content"><?php echo get_the_author_meta('description', $curaut->ID); ?></div>
              </article>
            </div>
            <div class="col-md-3 col-sm-6">
              <article class="userbox">
                <div class="box-title">Contacto</div>
                <div class="box-content">
                  <ul>
                    <li>Email: <?php echo hideEmail($curaut->user_email); ?></li>
                    <li>URL: <?php echo $curaut->user_url; ?></li>
                    <li>Google+: <?php echo get_user_meta($curaut->ID, 'googleplus', true); ?></li>
                    <li>Facebook: <?php echo get_user_meta($curaut->ID, 'twitter', true); ?></li>
                    <li>Twitter: <?php echo get_user_meta($curaut->ID, 'facebook', true); ?></li>
                  </ul>
                </div>
              </article>
            </div>
            <div class="col-md-3 col-sm-6">
              <article class="userbox">
                <div class="box-title">Localización</div>
                <div class="box-content"></div>
              </article>
            </div>
          <!--</div>-->
        </div>
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
      </div>
      </div><!-- .row -->
    </div><!-- .span12 -->
  </div><!-- .row LISTADO DE POSTS -->
<!--</div>--><!-- .container -->