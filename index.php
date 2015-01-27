<?php if (!is_user_logged_in()) { ?>
  <!-- Empieza sección de DESTACADOS -->
<div class="container">
  <div class="row title-section">
    <div class="col-sm-12">
      <h2>Se destacan</h2>
      <div class="subtitle">Estas son las publicaciones preferidas por nuestros lectores hoy</div>
    </div>
  </div>
  <div class="row destacados">
    <div class="col-sm-12">
      <div class="row">
        <?php $tposts = get_trending_posts(10, 1240);
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
  <!-- Empieza sección de EJES TEMÁTICOS -->
  <div class="row ejes-home">
    <div class="col-sm-12">
      <ul id="og-grid" class="row og-grid" rel="reci">
        <li class="col-sm-3">
          <div class="destacan">
            Ejes temáticos <i class="fa fa-angle-right"></i>
          </div>
        </li><!-- .span3 -->
        <?php
        $args = array(
          'orderby' => 'name',
          'parent' => 0,
          'exclude'=> '1,2,97,105,106'
          );
        $categories = get_categories( $args );
        foreach ( $categories as $category ) { ?>
        <li class="col-sm-3">
          <a href="<?php echo get_category_link( $category->term_id ); ?>" class="cat-bg-<?php echo $category->term_id; ?>">
            <i class="fa icon-cat-<?php echo $category->term_id; ?>"></i>
            <span class="eje-nombre"><?php echo $category->name; ?></span>
            <br class="clearfix">
            <span class="eje-tagline"><?php echo $category->description; ?></span>
          </a>
        </li><!-- .span3 -->
        <?php } ?>
      </ul><!-- .row -->
    </div><!-- .span12 -->
  </div><!-- .row EJES TEMÁTICOS -->
  <!-- Empieza sección de AUTORES POPULARES -->
  <div class="row autores-home">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-4">
          <div class="title-home"><h2>Autores Populares</h2></div>
        </div><!-- .span4 -->
      </div><!-- .row -->
      <div class="navCarrusel">
          <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
          <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
      </div>
      <div class="wrapper-carrusel">
        <div class="row carrusel">
          <?php $authors = get_trending_authors(8, 1240); 
            foreach ($authors as $author) {
          ?>
          <div class="span3">
            <div class="wrapper-nombre">
              <?php echo get_avatar( $author->post_author, 56, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>
              <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
              <div class="titular-autor"><?php echo title_trim(125, get_the_author_meta('description', $author->post_author)); ?></div>
            </div>
            <div class="row">
              <div class="wrapper-meta">
                <div class="span1">
                  <span class="number"><?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?></span> publicaciones
                </div><!-- .span1 -->
                <div class="span1">
                  <span class="number"><?php echo number_format_i18n( $author->vcount ); ?></span> lectores
                </div><!-- .span1 -->
                <!--<div class="span1">
                  <span class="number">123</span> seguidores
                </div>--><!-- .span1 -->
              </div>
            </div><!-- .row -->
            <div class="wrapper-minithumbs">
              <?php $argsa=array( 'posts_per_page' => 4, 'author' => $author->post_author);//Empieza query del último post
            $querya = new WP_Query($argsa);
              if( $querya->have_posts() ) { while ($querya->have_posts()) : $querya->the_post(); ?>
              <a href="#" data-toggle="tooltip" title="<?php the_title(); ?>"><?php echo wp_imager(64, 32, '', 'img-responsive'); ?></a>
              <?php endwhile;?>
              <?php } 
              wp_reset_postdata(); ?>
            </div>
          </div><!-- .span3 -->
          <?php }  ?>
        </div><!-- .row -->
      </div><!-- .wrapper-carrusel -->
    </div><!-- .span12 -->
  </div><!-- .row AUTORES POPULARES -->
  <!-- Empieza sección de TEMAS DEL MOMENTO -->
  <div class="row temas-home">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-4">
          <div class="title-home"><h2>Temas del momento</h2></div>
        </div><!-- .span4 -->
      </div><!-- .row -->
      <div class="navCarrusel">
        <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
      </div>
      <div class="wrapper-carrusel">
        <div class="row carrusel">
          <?php $terms = trending_tags(8, 1240 ); 
            foreach ($terms as $key => $tag) {
              $link = get_term_link( intval($tag->term_id), 'post_tag' );
              $tag_link = '#' != $tag->link ? esc_url( $link ) : '#';
              $tag_id = isset($tag->term_id) ? $tag->term_id : $key;
              $tag_name = $terms[ $key ]->name;
          ?>
          <div class="span3">
            <div class="wrapper-titulo">
              <i class="fa fa-tag"></i>
              <div class="titulo-tema"><a href="<?php echo $tag_link; ?>"><?php echo $tag_name; ?></a></div>
            </div>
            <div class="wrapper-meta">
              <div class="meta">
                <span class="number"><?php echo esc_attr( $tag->count ); ?></span> publicaciones
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">#</span> lectores
              </div><!-- .meta -->
              <!--<div class="meta">
                <span class="number">123</span> seguidores
              </div>--><!-- .meta -->
            </div>
            <div class="wrapper-minithumbs">
              <?php $argst=array( 'posts_per_page' => 5, 'tag_id' => $tag_id);
              $queryt = new WP_Query($argst);
              if( $queryt->have_posts() ) { while ($queryt->have_posts()) : $queryt->the_post(); ?>
              <a href="#" data-toggle="tooltip" title="<?php the_title(); ?>"><?php echo wp_imager(64, 32, '', 'img-responsive'); ?></a>
              <?php endwhile;?>
              <?php } 
              wp_reset_postdata(); ?>
            </div>
          </div><!-- .span3 -->
          <?php }  ?>
        </div><!-- .row -->
      </div><!-- .wrapper-carrusel -->
    </div><!-- .span12 -->
  </div><!-- .row TEMAS DEL MOMENTO -->
</div><!-- .container.cm8 -->
<?php } ?>
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <div class="row posts-home">
    <div class="col-sm-12">
      <?php if (!is_user_logged_in()) { ?>
      <div class="row title-loggedout">
        <div class="col-sm-5">
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
            <h2>Todas las publicaciones</h2>
            <!--<a href="#" class="btn btn-unete">Únete</a>-->
          </div>
        </div><!-- .span4 -->
      </div><!-- .row -->
      <?php } ?>
      <?php if (is_user_logged_in()) { ?>
      <div class="row title-loggedin">
        <div class="col-sm-8">
          <div class="title-home-loggedin">
            <div class="thl">
              <a href="#recientes" class="active" data-toggle="tab">Lo más reciente de tu red</a> <span>&bull;</span> <a href="#parati" data-toggle="tab">Para ti</a> <span>&bull;</span> <a href="#destac" data-toggle="tab">Se destacan</a> <span>&bull;</span> <a href="#todo" data-toggle="tab">Todo</a> <span>&bull;</span> <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">A quién y qué seguir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#autrec" data-toggle="tab">Autores Recomendados</a></li>
                  <li><a href="#temrec" data-toggle="tab">Temas Recomendados</a></li>
                  <li><a href="#ejerec" data-toggle="tab">Ejes Recomendados</a></li>
                </ul>
              </div>
            </div>
          </div> 
        </div><!-- .col-md-8 -->
        <div class="col-sm-4">
          <a href="#" class="btn btn-unete pull-right">Invita a tus amigos</a>
        </div><!-- .col-md-4 -->
      </div><!-- .row -->
      <?php } ?>
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
        <?php if (is_user_logged_in()) { ?>
        <div class="tab-pane" id="parati">
          Mismo contenido como recientes pero con Recomendados
        </div><!-- #parati -->
        <div class="tab-pane" id="destac">
          Mismo contenido como recientes pero con Destacados
        </div><!-- #destac -->
        <div class="tab-pane" id="todo">
          Mismo contenido como recientes pero con Todo
        </div><!-- #todo -->
        <div class="tab-pane autores-home" id="autrec">
          <div>
            <div class="col-sm-12">
              <div class="title-home"><h2>Autores Recomendados</h2></div>
            </div><!-- .span4 -->
          </div><!-- .row -->
          <div class="span4">
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
          </div><!-- .span4 -->
          <div class="span4">
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
          </div><!-- .span4 -->
          <div class="span4">
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
          </div><!-- .span4 -->
        </div><!-- #autrec-->
        <div class="tab-pane temas-home" id="temrec">
          <div>
            <div class="span12">
              <div class="title-home"><h2>Temas Recomendados</h2></div>
            </div><!-- .span4 -->
          </div><!-- .row -->
          <div class="span4">
            <div class="wrapper-titulo">
              <i class="fa fa-tag"></i>
              <div class="titulo-tema"><a href="tag.php">living las vegas</a></div>
            </div>
            <div class="wrapper-meta">
              <div class="meta">
                <span class="number">12</span> publicaciones
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123456</span> lectores
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123</span> seguidores
              </div><!-- .meta -->
            </div>
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span4 -->
          <div class="span4">
            <div class="wrapper-titulo">
              <i class="fa fa-tag"></i>
              <div class="titulo-tema"><a href="tag.php">living las vegas</a></div>
            </div>
            <div class="wrapper-meta">
              <div class="meta">
                <span class="number">12</span> publicaciones
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123456</span> lectores
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123</span> seguidores
              </div><!-- .meta -->
            </div>
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span4 -->
          <div class="span4">
            <div class="wrapper-titulo">
              <i class="fa fa-tag"></i>
              <div class="titulo-tema"><a href="tag.php">living las vegas</a></div>
            </div>
            <div class="wrapper-meta">
              <div class="meta">
                <span class="number">12</span> publicaciones
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123456</span> lectores
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123</span> seguidores
              </div><!-- .meta -->
            </div>
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span4 -->
        </div><!-- #temrec-->
        <div class="tab-pane ejes-home" id="ejerec">
          <div>
            <div class="span12">
              <div class="title-home"><h2>Ejes Recomendados</h2></div>
            </div><!-- .span4 -->
          </div><!-- .row -->
          <div class="span4">
            <a href="#" class="cat-bg-23">
              <i class="fa icon-cat-23"></i>
              <span class="eje-nombre">Medio Ambiente</span>
              <br class="clearfix">
              <span class="eje-tagline">La naturaleza es sabia</span>
            </a>
            <div class="wrapper-meta">
              <div class="meta">
                <span class="number">12</span> publicaciones
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123456</span> lectores
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123</span> seguidores
              </div><!-- .meta -->
            </div>
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span4 -->
          <div class="span4">
            <a href="#" class="cat-bg-23">
              <i class="fa icon-cat-23"></i>
              <span class="eje-nombre">Medio Ambiente</span>
              <br class="clearfix">
              <span class="eje-tagline">La naturaleza es sabia</span>
            </a>
            <div class="wrapper-meta">
              <div class="meta">
                <span class="number">12</span> publicaciones
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123456</span> lectores
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123</span> seguidores
              </div><!-- .meta -->
            </div>
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span4 -->
          <div class="span4">
            <a href="#" class="cat-bg-23">
              <i class="fa icon-cat-23"></i>
              <span class="eje-nombre">Medio Ambiente</span>
              <br class="clearfix">
              <span class="eje-tagline">La naturaleza es sabia</span>
            </a>
            <div class="wrapper-meta">
              <div class="meta">
                <span class="number">12</span> publicaciones
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123456</span> lectores
              </div><!-- .meta -->
              <div class="meta">
                <span class="number">123</span> seguidores
              </div><!-- .meta -->
            </div>
            <div class="wrapper-minithumbs">
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm3.staticflickr.com/2808/9205555734_71acc6f431.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm8.staticflickr.com/7293/9202770387_08466164ae.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <a  class="no-margin-bt" href="#" data-toggle="tooltip" title="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"><img src="http://farm4.staticflickr.com/3687/9202770347_82d6ffe382.jpg" alt="Plan de negocios para la creación de una empresa productora de granadilla tipo exportación en Zetaquirá, Boyacá, Colombia"></a>
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span4 -->
        </div><!-- #ejerec-->
        <?php } ?>
      </div><!-- .row -->
    </div><!-- .span12 -->
  </div><!-- .row LISTADO DE POSTS -->
</div><!-- .container -->