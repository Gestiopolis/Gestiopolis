<?php if (!is_user_logged_in()) { ?>
  <!-- Empieza sección de DESTACADOS -->
<div class="container cm8">
  <div class="row rm8 destacados">
    <div class="col-sm-36">
      <div class="row rm8">
        <div class="col-sm-9">
          <div class="row rm8">
            <div class="col-sm-36">
              <div class="destacan">
                Se destacan <i class="fa fa-angle-right"></i>
                <span><a href="#"><i class="fa fa-plus"></i></a>
              </div>
            </div><!-- .col-sm-36 -->
          </div><!-- .row -->
          <div class="row rm8">
            <div class="col-sm-36">
              <?php $posts = get_trending_posts(6, 1240);
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
                    <?php echo get_avatar( $post->post_author, 21, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
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
                    <?php echo get_avatar( $post->post_author, 21, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
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
                    <?php echo get_avatar( $post->post_author, 21, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
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
                    <?php echo get_avatar( $post->post_author, 21, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
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
                    <?php echo get_avatar( $post->post_author, 21, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
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
                    <?php echo get_avatar( $post->post_author, 21, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name', $post->post_author); ?>
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
  <!-- Empieza sección de EJES TEMÁTICOS -->
  <div class="row rm8 ejes-home">
    <div class="col-sm-36">
      <ul id="og-grid" class="row rm8 og-grid" rel="reci">
        <li class="col-sm-9">
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
        <li class="col-sm-9">
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
  <div class="row rm8 autores-home">
    <div class="col-sm-36">
      <div class="row rm8">
        <div class="col-sm-12">
          <div class="title-home"><h2>Autores Populares</h2></div>
        </div><!-- .span4 -->
      </div><!-- .row -->
      <div class="navCarrusel">
          <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
          <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
      </div>
      <div class="wrapper-carrusel">
        <div class="row rm8 carrusel">
          <div class="span3">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div class="row rm8">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div class="row rm8">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div class="row rm8">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div class="row rm8">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div class="row rm8">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
            <div class="wrapper-nombre">
              <img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar">
              <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
              <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
            </div>
            <div class="row rm8">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
        </div><!-- .row -->
      </div><!-- .wrapper-carrusel -->
    </div><!-- .span12 -->
  </div><!-- .row AUTORES POPULARES -->
  <!-- Empieza sección de TEMAS DEL MOMENTO -->
  <div class="row rm8 temas-home">
    <div class="col-md-36">
      <div class="row rm8">
        <div class="col-md-12">
          <div class="title-home"><h2>Temas del momento</h2></div>
        </div><!-- .span4 -->
      </div><!-- .row -->
      <div class="navCarrusel">
        <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
      </div>
      <div class="wrapper-carrusel">
        <div class="row rm8 carrusel">
          <div class="span3">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
          <div class="span3">
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
              <!--<a href="#" class="btn btn-seguir"><i class="fa fa-plus"></i> Seguir</a>-->
            </div>
          </div><!-- .span3 -->
        </div><!-- .row -->
      </div><!-- .wrapper-carrusel -->
    </div><!-- .span12 -->
  </div><!-- .row TEMAS DEL MOMENTO -->
</div><!-- .container.cm8 -->
<?php } ?>
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <div class="row posts-home">
    <div class="col-md-36">
      <?php if (!is_user_logged_in()) { ?>
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
            <h2>Todas las publicaciones</h2>
            <!--<a href="#" class="btn btn-unete">Únete</a>-->
          </div>
        </div><!-- .span4 -->
        <div class="col-md-12 col-md-offset-9">
          <div class="btns-orden btn-toolbar">
            <div id="OrdenEjes" class="btn-group">
              <a href="#" id="ordenEje" class="btn btn-orden dropdown-toggle" data-toggle="dropdown">Por eje temático <i class="fa fa-sort-desc"></i></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="ordenEje">
                <?php
                $args = array(
                  'orderby' => 'name',
                  'parent' => 0,
                  'exclude'=> '1,2,97,105,106'
                  );
                $categories = get_categories( $args );
                foreach ( $categories as $category ) { ?>
                <li><a class="cat-<?php echo $category->term_id; ?>" href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div><!-- .btns-orden -->
        </div><!-- .span4 -->
      </div><!-- .row -->
      <?php } ?>
      <?php if (is_user_logged_in()) { ?>
      <div class="row title-loggedin">
        <div class="col-md-24">
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
        <div class="col-md-12">
          <a href="#" class="btn btn-unete pull-right">Invita a tus amigos</a>
        </div><!-- .col-md-4 -->
      </div><!-- .row -->
      <?php } ?>
      <div class="row tab-content">
        <div class="tab-pane active" id="recientes">
          <?php $args1=array( 'posts_per_page'=>9, 'post__not_in'=>array($post->ID));//Empieza query del último post
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
                <div class="tiempo"><i class="fa fa-coffee"></i> Leerlo te tomará <?php echo estimate_time();?></div>
              </div>
            </article><!-- .post -->
          </div><!-- .col-md-12 col-sm-18 -->
          <?php endwhile;?>
          <?php } 
          wp_reset_query(); 
          wp_reset_postdata(); ?>
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
            <div class="col-md-36">
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