<?php
$term = get_queried_object();
global $current_user;
get_currentuserinfo();
?>
<div class="container cm8">
  <!-- Empieza sección de TÍTULO DE CATEGORÍA -->
  <div class="row rm8 titu-cat">
    <div class="col-sm-15">
      <i class="fa icon-cat-<?php echo $term->term_id; ?> cat-col-<?php echo $term->term_id; ?>"></i>
      <span class="eje-nombre"><?php single_term_title(); ?></span>
      <br class="clearfix">
      <span class="eje-tagline"><?php echo $term->description; ?></span>
    </div><!-- .col-sm-15 -->
    <div class="col-sm-15">
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
    </div><!-- .col-sm-15 -->
  </div><!-- .row TÍTULO DE CATEGORÍA -->
  <div class="row rm8 destacados">
    <div class="col-sm-36">
      <div class="row rm8">
        <div class="col-sm-9">
          <div class="row rm8">
            <div class="col-sm-36">
              <div class="destacan">
                Populares <i class="fa fa-angle-right"></i>
                <span><a href="#"><i class="fa fa-plus"></i></a>
              </div>
            </div><!-- .col-sm-36 -->
          </div><!-- .row -->
          <div class="row rm8">
            <div class="col-sm-36">
              <?php $posts = get_trending_posts(6, 1240, $term->term_id);
              //print_r($posts);
                $i = 1;
                foreach ($posts as $post) {
                  $post_title = stripslashes($post->post_title);
                  $permalink = get_permalink($post->ID);
                  $category = get_the_category($post->ID);
                  $category_id = $category[0]->term_id;
                  if($i == 1){

              ?>
              <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $i;?> post">
                <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php echo $post_title; ?>" class="img-responsive">
                <div class="overlay"></div>
                <h2 class="entry-title"><a id="titulo-<?php echo $post->ID;?>" href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark"><span><?php echo $post_title; ?></span></a></h2>
                <span class="compartir"><i class="fa fa-share"></i></span>
                <span class="cat-bg-<?php echo $category_id;?>"><i class="fa icon-cat-<?php echo $category_id;?>"></i></span>
                <div class="destacado-content cat-bg-<?php echo $category_id;?>">
                  <div class="meta"><i class="fa fa-eye"></i> <?php echo $post->vistas;?> <i class="fa fa-heart"></i> <?php echo $post->likes;?> <i class="fa fa-comment"></i> <?php echo $post->comment_count;?></div>
                  <div class="excerpt"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo title_trim(150, $post->post_content);?></a></div>
                  <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
                    <?php echo get_avatar( $post->post_author, 21, '', 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                  </a>
                  <div class="botones-compartir" id="compartir-<?php echo $post->ID;?>">
                    <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-gplus" id="gplus-compartir-<?php echo $post->ID;?>"></div>
                  </div>
                </div>
              </article>
              <?php } else if($i == 2){ ?>
            </div><!-- .col-sm-36 -->
          </div><!-- .row -->
        </div><!-- .col-sm-9 -->
        <div class="col-sm-18">
          <div class="row rm8">
            <div class="col-sm-18">
              <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $i;?> post">
                <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php echo $post_title; ?>" class="img-responsive">
                <div class="overlay"></div>
                <h2 class="entry-title"><a id="titulo-<?php echo $post->ID;?>" href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark"><span><?php echo $post_title; ?></span></a></h2>
                <span class="compartir"><i class="fa fa-share"></i></span>
                <span class="cat-bg-<?php echo $category_id;?>"><i class="fa icon-cat-<?php echo $category_id;?>"></i></span>
                <div class="destacado-content cat-bg-<?php echo $category_id;?>">
                  <div class="meta"><i class="fa fa-eye"></i> <?php echo $post->vistas;?> <i class="fa fa-heart"></i> <?php echo $post->likes;?> <i class="fa fa-comment"></i> <?php echo $post->comment_count;?></div>
                  <div class="excerpt"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo title_trim(150, $post->post_content);?></a></div>
                  <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
                    <?php echo get_avatar( $post->post_author, 21, '', 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                  </a>
                  <div class="botones-compartir" id="compartir-<?php echo $post->ID;?>">
                    <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-gplus" id="gplus-compartir-<?php echo $post->ID;?>"></div>
                  </div>
                </div>
              </article>
              <?php } else if($i == 3){ ?>
            </div><!-- .col-sm-18 -->
            <div class="col-sm-18">
              <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $i;?> post">
                <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php echo $post_title; ?>" class="img-responsive">
                <div class="overlay"></div>
                <h2 class="entry-title"><a id="titulo-<?php echo $post->ID;?>" href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark"><span><?php echo $post_title; ?></span></a></h2>
                <span class="compartir"><i class="fa fa-share"></i></span>
                <span class="cat-bg-<?php echo $category_id;?>"><i class="fa icon-cat-<?php echo $category_id;?>"></i></span>
                <div class="destacado-content cat-bg-<?php echo $category_id;?>">
                  <div class="meta"><i class="fa fa-eye"></i> <?php echo $post->vistas;?> <i class="fa fa-heart"></i> <?php echo $post->likes;?> <i class="fa fa-comment"></i> <?php echo $post->comment_count;?></div>
                  <div class="excerpt"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo title_trim(150, $post->post_content);?></a></div>
                  <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
                    <?php echo get_avatar( $post->post_author, 21, '', 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                  </a>
                  <div class="botones-compartir" id="compartir-<?php echo $post->ID;?>">
                    <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-gplus" id="gplus-compartir-<?php echo $post->ID;?>"></div>
                  </div>
                </div>
              </article>
              <?php } else if($i == 4){ ?>
            </div><!-- .col-sm-18 -->
          </div><!-- .row -->
          <div class="row rm8">
            <div class="col-sm-36">
              <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $i;?> post">
                <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php echo $post_title; ?>" class="img-responsive">
                <div class="overlay"></div>
                <h2 class="entry-title"><a id="titulo-<?php echo $post->ID;?>" href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark"><span><?php echo $post_title; ?></span></a></h2>
                <span class="compartir"><i class="fa fa-share"></i></span>
                <span class="cat-bg-<?php echo $category_id;?>"><i class="fa icon-cat-<?php echo $category_id;?>"></i></span>
                <div class="destacado-content cat-bg-<?php echo $category_id;?>">
                  <div class="meta"><i class="fa fa-eye"></i> <?php echo $post->vistas;?> <i class="fa fa-heart"></i> <?php echo $post->likes;?> <i class="fa fa-comment"></i> <?php echo $post->comment_count;?></div>
                  <div class="excerpt"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo title_trim(150, $post->post_content);?></a></div>
                  <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
                    <?php echo get_avatar( $post->post_author, 21, '', 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                  </a>
                  <div class="botones-compartir" id="compartir-<?php echo $post->ID;?>">
                    <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-gplus" id="gplus-compartir-<?php echo $post->ID;?>"></div>
                  </div>
                </div>
              </article>
              <?php } else if($i == 5){ ?>
            </div><!-- .col-sm-36 -->
          </div><!-- .row -->
        </div><!-- .span6 -->
        <div class="col-sm-9">
          <div class="row rm8">
            <div class="col-sm-36">
              <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $i;?> post">
                <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php echo $post_title; ?>" class="img-responsive">
                <div class="overlay"></div>
                <h2 class="entry-title"><a id="titulo-<?php echo $post->ID;?>" href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark"><span><?php echo $post_title; ?></span></a></h2>
                <span class="compartir"><i class="fa fa-share"></i></span>
                <span class="cat-bg-<?php echo $category_id;?>"><i class="fa icon-cat-<?php echo $category_id;?>"></i></span>
                <div class="destacado-content cat-bg-<?php echo $category_id;?>">
                  <div class="meta"><i class="fa fa-eye"></i> <?php echo $post->vistas;?> <i class="fa fa-heart"></i> <?php echo $post->likes;?> <i class="fa fa-comment"></i> <?php echo $post->comment_count;?></div>
                  <div class="excerpt"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo title_trim(150, $post->post_content);?></a></div>
                  <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
                    <?php echo get_avatar( $post->post_author, 21, '', 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                  </a>
                  <div class="botones-compartir" id="compartir-<?php echo $post->ID;?>">
                    <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-gplus" id="gplus-compartir-<?php echo $post->ID;?>"></div>
                  </div>
                </div>
              </article>
              <?php } else if($i == 6){ ?>
            </div><!-- .col-sm-36 -->
          </div><!-- .row -->
          <div class="row rm8">
            <div class="col-sm-36">
              <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $i;?> post">
                <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php echo $post_title; ?>" class="img-responsive">
                <div class="overlay"></div>
                <h2 class="entry-title"><a id="titulo-<?php echo $post->ID;?>" href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark"><span><?php echo $post_title; ?></span></a></h2>
                <span class="compartir"><i class="fa fa-share"></i></span>
                <span class="cat-bg-<?php echo $category_id;?>"><i class="fa icon-cat-<?php echo $category_id;?>"></i></span>
                <div class="destacado-content cat-bg-<?php echo $category_id;?>">
                  <div class="meta"><i class="fa fa-eye"></i> <?php echo $post->vistas;?> <i class="fa fa-heart"></i> <?php echo $post->likes;?> <i class="fa fa-comment"></i> <?php echo $post->comment_count;?></div>
                  <div class="excerpt"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo title_trim(150, $post->post_content);?></a></div>
                  <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
                    <?php echo get_avatar( $post->post_author, 21, '', 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                  </a>
                  <div class="botones-compartir" id="compartir-<?php echo $post->ID;?>">
                    <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID;?>"></div>
                    <div class="platform bc-gplus" id="gplus-compartir-<?php echo $post->ID;?>"></div>
                  </div>
                </div>
              </article>
              <?php } $i++; } // fin foreach $posts ?>
            </div><!-- .col-sm-36 -->
          </div><!-- .row -->
        </div><!-- .span3 -->
      </div><!-- .row -->
    </div>
  </div><!-- .row DESTACADOS -->
  <!-- Empieza sección de AUTORES TEMAS -->
  <div class="row rm8 autores-temas">
    <div class="col-sm-18 autores-archive">
      <div class="row rm8">
        <div class="col-sm-36">
          <div class="title-archive"><h2>Autores destacados</h2></div>
        </div><!-- .span6 -->
      </div><!-- .row -->
      <?php 
        $authors = get_trending_authors(6, 1240, $term->term_id);
        $j = 1;
        foreach ($authors as $author) {
        if($j == 1){
      ?>
      <div class="row rm8">
        <div class="col-sm-18">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, '', 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-18 -->
        <?php } else if($j == 2){ ?>
        <div class="col-sm-18">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, '', 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-18  -->
      </div><!-- .row -->
      <?php } else if($j == 3){ ?>
      <div class="row rm8">
        <div class="col-sm-18">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, '', 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-18 -->
        <?php } else if($j == 4){ ?>
        <div class="col-sm-18">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, '', 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-18 -->
      </div><!-- .row -->
      <?php } else if($j == 5){ ?>
      <div class="row rm8">
        <div class="col-sm-18">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, '', 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-18 -->
        <?php } else if($j == 6){ ?>
        <div class="col-sm-18">
          <div class="wrapper-nombre">
            <?php echo get_avatar( $author->post_author, 56, '', 'Avatar' ); ?>
            <div class="nombre-autor"><a href="<?php echo get_author_posts_url($author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>
            <div class="info-autor"><i class="fa fa-book"></i> <?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> <i class="fa fa-eye"></i> <?php echo number_format_i18n( $author->vcount ); ?></div>
            <!--<a href="#" class="btn btn-seguir"><i class="icon-plus-sign"></i> Seguir</a>-->
          </div>
        </div><!-- .col-sm-18 -->
      </div><!-- .row -->
      <?php } $j++; } //end foreach ?>
    </div><!-- .col-sm-18 -->
    <div class="col-sm-18 temas-archive">
      <div class="row rm8">
        <div class="col-sm-36">
          <div class="title-archive"><h2>Temas tendencia</h2></div>
        </div><!-- .col-sm-36 -->
      </div><!-- .row -->
      <div class="row rm8">
        <div class="col-sm-36">
          <a href="#"><i class="fa fa-tag"></i> quimbara quimbara</a><a href="#"><i class="fa fa-tag"></i> te voy a enseñar</a><a href="#"><i class="fa fa-tag"></i> mi negrita me espera</a><a href="#"><i class="fa fa-tag"></i> pedro navaja</a><a href="#"><i class="fa fa-tag"></i> dime por qué</a><a href="#"><i class="fa fa-tag"></i> quimbara quimbara</a><a href="#"><i class="fa fa-tag"></i> te voy a enseñar</a><a href="#"><i class="fa fa-tag"></i> mi negrita me espera</a><a href="#"><i class="fa fa-tag"></i> pedro navaja</a><a href="#"><i class="fa fa-tag"></i> dime por qué</a><a href="#"><i class="fa fa-tag"></i> quimbara quimbara</a><a href="#"><i class="fa fa-tag"></i> te voy a enseñar</a><a href="#"><i class="fa fa-tag"></i> mi negrita me espera</a><a href="#"><i class="fa fa-tag"></i> pedro navaja</a><a href="#"><i class="fa fa-tag"></i> dime por qué</a><a href="#"><i class="fa fa-tag"></i> mi negrita me espera</a><a href="#"><i class="fa fa-tag"></i> pedro navaja</a><a href="#"><i class="fa fa-tag"></i> dime por qué</a>
        </div><!-- .col-sm-36 -->
      </div><!-- .row -->
    </div><!-- .col-sm-18 -->
  </div><!-- .row AUTORES TEMAS -->
</div><!-- .container.cm8 -->
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <div class="row posts-home">
    <div class="col-md-36">
      <div class="row title-loggedout">
        <div class="col-md-15">
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
        <div class="col-md-12 col-md-offset-9">
          <div class="btns-orden btn-toolbar">
            <div id="OrdenNuevasPopulares" class="btn-group">
              <a href="#"  id="ordenNuevas" class="btn btn-orden dropdown-toggle" data-toggle="dropdown">Ordenar por <i class="fa fa-sort-desc"></i></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="ordenNuevas">
                <li><a href="#">Más nuevas</a></li>
                <li><a href="#">Más populares</a></li>
              </ul>
              <!--<a href="#" class="btn btn-orden">Más populares <i class="fa icon-sort"></i></a>-->
            </div>
          </div><!-- .btns-orden -->
        </div><!-- .span4 -->
      </div><!-- .row -->
      <div class="row tab-content">
        <div class="tab-pane active" id="recientes">
          <?php $args1=array( 'posts_per_page'=>9, 'category__in'=>array($term->term_id));//Empieza query del último post
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
                    <?php echo get_avatar( $post->post_author, 32, '', 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
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
                <div class="tiempo"><i class="fa fa-coffee"></i> Leerlo te tomará <?php echo estimate_time();?></div>
              </div>
            </article><!-- .post -->
          </div><!-- .col-md-12 col-sm-18 -->
          <?php endwhile;?>
          <?php } 
          wp_reset_query(); 
          wp_reset_postdata(); ?>
        </div><!-- #recientes -->
      </div><!-- .row -->
    </div><!-- .span12 -->
  </div><!-- .row LISTADO DE POSTS -->
</div><!-- .container -->