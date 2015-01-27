<?php
$term = get_queried_object();
global $current_user;
get_currentuserinfo();
?>
<div class="container">
  <!-- Empieza sección de TÍTULO DE CATEGORÍA -->
  <div class="row titu-cat">
    <div class="col-sm-5">
      <i class="fa icon-cat-<?php echo $term->term_id; ?> cat-col-<?php echo $term->term_id; ?>"></i>
      <span class="eje-nombre"><?php single_term_title(); ?></span>
      <br class="clearfix">
      <span class="eje-tagline"><?php echo $term->description; ?></span>
    </div><!-- .col-sm-5 -->
    <div class="col-sm-5">
      <ul>
        <!--<li><a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a></li>-->
        <li>Publicaciones <a href="#" class="btn btn-publ"><?php echo $term->count; ?></a></li>
        <li>Autores <a href="#" class="btn btn-aut"><?php autcat($term->term_id); ?></a></li>
        <?php 
          $args = array('categories' => $term->term_id);
          $tags = get_category_tags($args);
        ?>
        <li>Temas <a href="#" class="btn btn-tem"><?php echo count($tags); ?></a></li>
        <!--<li>Seguidores <a href="#" class="btn btn-seg">2560</a></li>-->
      </ul>
    </div><!-- .col-sm-5 -->
  </div><!-- .row TÍTULO DE CATEGORÍA -->
  <div class="row title-section">
    <div class="col-sm-12">
      <h2>Se destacan</h2>
      <div class="subtitle">Estas son las publicaciones preferidas por nuestros lectores hoy</div>
    </div>
  </div>
  <div class="row destacados">
    <div class="col-sm-12">
      <div class="row">
        <?php $tposts = get_trending_posts(10, 1240, $term->term_id);
          $i = 1;
          foreach ($tposts as $tpost) {
            $post_title = stripslashes($tpost->post_title);
            $permalink = get_permalink($tpost->ID);
            $category = get_the_category($tpost->ID);
            $category_id = $category[0]->term_id;
            if($i == 1){

        ?>
        <div class="col-sm-6">
          <article id="post-<?php echo $tpost->ID;?>" class="destacado-<?php echo $tpost->ID;?> post">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo wp_imager(640, 250, '', 'img-responsive', false, get_post_meta($tpost->ID, "Thumbnail", true), true); ?>); height: 250px;"></div>
              <div class="overlay"></div>
              <div class="vert-center-wrapper">
                <div class="vert-centered">
                  <div class="text-center">
                    <h2 class="entry-title"><span><?php echo $post_title; ?></span></h2>
                  </div>
                </div>
              </div>
            </a>
          </article>
        </div><!-- ./col-sm-6 -->
        <?php } else if($i == 2 || $i == 3){ ?>
        <div class="col-sm-3">
          <article id="post-<?php echo $tpost->ID;?>" class="destacado-<?php echo $tpost->ID;?> post">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo wp_imager(640, 250, '', 'img-responsive', false, get_post_meta($tpost->ID, "Thumbnail", true), true); ?>); height: 250px;"></div>
              <div class="overlay"></div>
              <div class="vert-center-wrapper">
                <div class="vert-centered">
                  <div class="text-center">
                    <h2 class="entry-title"><span><?php echo $post_title; ?></span></h2>
                  </div>
                </div>
              </div>
            </a>
          </article>
        </div><!-- ./col-sm-3 -->
        <?php } else if($i == 4){ ?>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-sm-3">
          <article id="post-<?php echo $tpost->ID;?>" class="destacado-<?php echo $tpost->ID;?> post">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo wp_imager(640, 250, '', 'img-responsive', false, get_post_meta($tpost->ID, "Thumbnail", true), true); ?>); height: 250px;"></div>
              <div class="overlay"></div>
              <div class="vert-center-wrapper">
                <div class="vert-centered">
                  <div class="text-center">
                    <h2 class="entry-title"><span><?php echo $post_title; ?></span></h2>
                  </div>
                </div>
              </div>
            </a>
          </article>
        </div><!-- ./col-sm-3 -->
        <?php } else if($i == 5){ ?>
        <div class="col-sm-3">
          <article id="post-<?php echo $tpost->ID;?>" class="destacado-<?php echo $tpost->ID;?> post">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo wp_imager(640, 250, '', 'img-responsive', false, get_post_meta($tpost->ID, "Thumbnail", true), true); ?>); height: 250px;"></div>
              <div class="overlay"></div>
              <div class="vert-center-wrapper">
                <div class="vert-centered">
                  <div class="text-center">
                    <h2 class="entry-title"><span><?php echo $post_title; ?></span></h2>
                  </div>
                </div>
              </div>
            </a>
          </article>
        </div><!-- ./col-sm-3 -->
        <?php } else if($i == 6){ ?>
        <div class="col-sm-6">
          <article id="post-<?php echo $tpost->ID;?>" class="destacado-<?php echo $tpost->ID;?> post">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo wp_imager(640, 250, '', 'img-responsive', false, get_post_meta($tpost->ID, "Thumbnail", true), true); ?>); height: 250px;"></div>
              <div class="overlay"></div>
              <div class="vert-center-wrapper">
                <div class="vert-centered">
                  <div class="text-center">
                    <h2 class="entry-title"><span><?php echo $post_title; ?></span></h2>
                  </div>
                </div>
              </div>
            </a>
          </article>
        </div><!-- ./col-sm-6 -->
      </div><!-- /.row -->
      <div class="row">
        <?php } else if($i == 7 || $i == 8 || $i == 9 || $i == 10){ ?>
        <div class="col-sm-3">
          <article id="post-<?php echo $tpost->ID;?>" class="destacado-<?php echo $tpost->ID;?> post">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo wp_imager(640, 250, '', 'img-responsive', false, get_post_meta($tpost->ID, "Thumbnail", true), true); ?>); height: 250px;"></div>
              <div class="overlay"></div>
              <div class="vert-center-wrapper">
                <div class="vert-centered">
                  <div class="text-center">
                    <h2 class="entry-title"><span><?php echo $post_title; ?></span></h2>
                  </div>
                </div>
              </div>
            </a>
          </article>
        </div><!-- ./col-sm-3 -->
        <?php } $i++; } // fin foreach $tposts ?>
      </div><!-- /.row -->
    </div><!-- /.col-sm-12-->
  </div><!-- /.destacados -->
  <!-- Empieza sección de AUTORES TEMAS -->
  <div class="row autores-temas">
    <div class="col-sm-6 autores-archive">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-archive"><h2>Autores destacados</h2></div>
        </div><!-- .span6 -->
      </div><!-- .row -->
      <?php 
        $authors = get_trending_authors(6, 1240, $term->term_id);
        $j = 1;
        foreach ($authors as $author) {
        if($j == 1){
      ?>
      <div class="row">
        <div class="col-sm-6">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-6 -->
        <?php } else if($j == 2){ ?>
        <div class="col-sm-6">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-6  -->
      </div><!-- .row -->
      <?php } else if($j == 3){ ?>
      <div class="row">
        <div class="col-sm-6">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-6 -->
        <?php } else if($j == 4){ ?>
        <div class="col-sm-6">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-6 -->
      </div><!-- .row -->
      <?php } else if($j == 5){ ?>
      <div class="row">
        <div class="col-sm-6">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-6 -->
        <?php } else if($j == 6){ ?>
        <div class="col-sm-6">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-6 -->
      </div><!-- .row -->
      <?php } $j++; } //end foreach ?>
    </div><!-- .col-sm-6 -->
    <div class="col-sm-6 temas-archive">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-archive"><h2>Temas tendencia</h2></div>
        </div><!-- .col-sm-12 -->
      </div><!-- .row -->
      <div class="row">
        <div class="col-sm-12">
          <?php popular_tags_from_category($term->term_id, 1240)?>
        </div><!-- .col-sm-12 -->
      </div><!-- .row -->
    </div><!-- .col-sm-3 -->
  </div><!-- .row AUTORES TEMAS -->
</div><!-- .container.cm8 -->
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <div class="row posts-home">
    <div class="col-md-12">
      <div class="row title-loggedout">
        <div class="col-md-5">
          <div class="menuFlotante">
            <div id="dl-menu" class="dl-menuwrapper">
              <button class="dl-trigger">Abrir Menú</button>
              <ul class="dl-menu">
                  <li>
                    <a href="#"><i class="fa fa-user"></i> Ingresa</a>
                    <ul id="mfl_ingresa" class="dl-submenu">
                      <li>
                        <form class="nav-loginform" id="mfl-loginform" action="" method="post" role="form" aria-labelledby="nav-loginform">
                          <input type="text" name="log" id="user_login" class="input" value="" placeholder="Nombre de usuario o Email" required>
                          <input type="password" name="pwd" id="user_pass" class="input" value="" placeholder="Contraseña" required>
                          <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-block btn-green" value="Ingresa" >
                          <p>¿Aun sin cuenta? <a href="#">Regístrate</a></p>
                        </form>
                        <p>Accede con tu cuenta de:</p>
                        <a href="#" class="login-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="login-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="login-google"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="login-linkedin"><i class="fa fa-linkedin"></i></a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-cloud-upload"></i> Publica</a></li>
                  <li><a href="#"><i class="fa fa-search"></i> Busca</a></li>
                  <li>
                    <a href="#"><i class="fa fa-bars"></i> Explora</a>
                    <ul id="mfl_explora" class="dl-submenu">
                      <li><a class="cat-20" href="#">Administración</a></li>
                      <li><a class="cat-3" href="#">Marketing</a></li>
                      <li><a class="cat-15" href="#">Autoayuda</a></li>
                      <li><a class="cat-23" href="#">Medio Ambiente</a></li>
                      <li><a class="cat-16" href="#">Contabilidad</a></li>
                      <li><a class="cat-21" href="#">Talento</a></li>
                      <li><a class="cat-17" href="#">Economía</a></li>
                      <li><a class="cat-56" href="#">Tecnología</a></li>
                      <li><a class="cat-18" href="emprendimiento.php">Emprendimiento</a></li>
                      <li><a class="cat-24" href="#">Otros temas</a></li>
                      <li><a class="cat-19" href="#">Finanzas</a></li>
                      <li class="explora_autores"><a href="#"><img src="assets/img/autores-destacados-explora.png" width="28" height="28" alt="Autores destacados"/>&nbsp;&nbsp;Autores destacados</a></li>
                      <li class="explora_autores"><a href="#"><i class="fa fa-tags"></i>&nbsp;&nbsp;Temas tendencia</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-info"></i> Info</a>
                    <ul id="mfl_info" class="dl-submenu">
                      <li><a href="#">Acerca de</a></li>
                      <li><a href="#">Ayuda</a></li>
                      <li><a href="#">Términos legales</a></li>
                      <li><a href="#">ABC temático</a></li>
                      <li><a href="#">Contacto</a></li>
                      <li><a href="#">Derechos de autor</a></li>
                      <li><a href="#">Archivo</a></li>
                      <li><a href="#">Publicidad</a></li>
                    </ul>
                  </li>
              </ul>
          </div><!-- /dl-menuwrapper -->
        </div><!-- .menuFlotante-->
          <div class="title-home">
            <h2>Todo <?php single_term_title(); ?> <i class="fa icon-cat-<?php echo $term->term_id; ?> cat-col-<?php echo $term->term_id; ?>"></i></h2>
            <!--<a href="#" class="btn btn-unete">Únete</a>-->
          </div>
        </div><!-- .span4 -->
      </div><!-- .row -->
      <div class="row tab-content">
        <div class="tab-pane active" id="recientes">
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
      </div><!-- .row -->
    </div><!-- .span12 -->
  </div><!-- .row LISTADO DE POSTS -->
</div><!-- .container -->