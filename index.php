<!-- Empieza sección de DESTACADOS -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div>

        <!-- /1007663/Home-Top-728x90 -->
        <div id='div-gpt-ad-1559754130804-0' class="adsce" style='height:90px; width:728px;'>
        <script>
        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1559754130804-0'); });
        </script>
        </div>

      </div>
    </div>
  </div>

  <div class="row title-section">
    <div class="col-sm-12">
      <h2>Nuevas Publicaciones</h2>
      <div class="subtitle">Estos son los últimos posts compartidos por nuestros lectores</div>
    </div>
  </div>
  <div class="row destacados">
    <div class="col-sm-12">
      <div class="row gafrom from-home-dest">
        
      <?php
      
        $argss = array(
          'post_type' => 'post',
          'posts_per_page' => 10,
        );

        $posts = get_posts( $argss );

        $i = 1;
        foreach( $posts as $post ) {

        $post_title = get_the_title($post->ID);
        $permalink = get_permalink($post->ID);

        $category1 = get_the_category($post->ID);
        $category_id = $category1[0]->term_id;

        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ), 'dest-img' );


        if($i == 1){

       ?>


        <div class="col-sm-6 col-md-9 col-lg-6">
          <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $post->ID;?> post gafrom from-home-dest-1">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo $large_image_url[0]; ?>); height: 250px;"></div>
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
        <div class="col-sm-6 col-md-3 col-lg-3">
          <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $post->ID;?> post gafrom from-home-dest-2-3">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo $large_image_url[0]; ?>); height: 250px;"></div>
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
        <div class="col-sm-6 col-md-9 col-lg-3">
          <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $post->ID;?> post gafrom from-home-dest-4">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo $large_image_url[0]; ?>); height: 250px;"></div>
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
        <div class="col-sm-6 col-md-4 col-lg-3">
          <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $post->ID;?> post gafrom from-home-dest-5">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo $large_image_url[0]; ?>); height: 250px;"></div>
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
        <div class="col-sm-6 col-md-4 col-lg-6">
          <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $post->ID;?> post gafrom from-home-dest-6">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo $large_image_url[0]; ?>); height: 250px;"></div>
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
        <?php } else if($i == 7 || $i == 8 || $i == 9 || $i == 10){ ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <article id="post-<?php echo $post->ID;?>" class="destacado-<?php echo $post->ID;?> post gafrom from-home-dest-7-8-9-10">
            <a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>" rel="bookmark">
              <div class="bg-image" style="background-image: url(<?php echo $large_image_url[0]; ?>); height: 250px;"></div>
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
        <?php } $i++; }// fin foreach $tposts ?>
        <?php 
          wp_reset_postdata();
          wp_reset_query();
         ?>
      </div><!-- /.row -->
    </div><!-- /.col-sm-12-->
  </div><!-- /.destacados -->
  
  <!-- Empieza sección de EJES TEMÁTICOS -->
  <div class="row title-section">
    <div class="col-sm-12">

      <h2>Materias</h2>
      <div class="subtitle">Temáticas en las que clasificamos los posts</div>
    </div>
  </div>
  <div class="row ejes-home">
    <div class="col-sm-12">
      <ul id="og-grid" class="row og-grid gafrom from-home-ejes" rel="reci">
        <?php
        $args = array(
          'orderby' => 'name',
          'parent' => 0,
          'exclude'=> '1,2,97,105,106'
          );
        $categories = get_categories( $args );
        foreach ( $categories as $category ) { ?>
        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <a href="<?php echo get_category_link( $category->term_id ); ?>" class="cat-bg-<?php echo $category->term_id; ?>  gafrom from-home-eje-<?php echo $category->slug; ?>">
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
  <div class="row title-section">
    <div class="col-sm-12">
      <h2>Autores Populares</h2>
      <div class="subtitle">Quienes han querido compartir sus conocimientos con todos nosotros</div>
    </div>
  </div>
  <div class="row autores-home">
    <div class="col-sm-12">
      <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner gafrom from-home-autores">
          <?php $authors = get_trending_authors(12, TRENDING_DAYS); 
            $k = 1;
            foreach ($authors as $author) {
          ?>
          <div class="item<?php if ($k==1){ echo ' active';}?>">
            <div class="trending-author gafrom from-home-autor-<?php echo get_the_author_meta('nickname', $author->post_author); ?>">
              <a href="<?php echo get_author_posts_url($author->post_author); ?>" data-toggle="tooltip" title="<?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> posts de <?php echo get_the_author_meta('display_name', $author->post_author); ?>"><?php echo get_author_color_id($author->post_author); ?></a>
              <div class="author-name"><a href="<?php echo get_author_posts_url($author->post_author); ?>" data-toggle="tooltip" title="<?php echo number_format_i18n( count_user_posts( $author->post_author ) ); ?> posts de <?php echo get_the_author_meta('display_name', $author->post_author); ?>"><?php echo get_the_author_meta('display_name', $author->post_author); ?></a></div>  
            </div>
          </div>
          <?php $k++;} ?>
          </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
      </div>
    </div><!-- .span12 -->
  </div><!-- .row AUTORES POPULARES -->

  <div class="row title-section">
    <div class="col-sm-12">
      <h2>Temas del momento</h2>
      <div class="subtitle">De lo que habla lo que se publica y lee ahora</div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 temas-archive gafrom from-home-tags">
      <?php $terms = trending_tags(30, TRENDING_DAYS ); 
        foreach ($terms as $key => $tag) {
          $link = get_term_link( intval($tag->term_id), 'post_tag' );
          $tag_link = '#' != $tag->link ? esc_url( $link ) : '#';
          $tag_id = isset($tag->term_id) ? $tag->term_id : $key;
          $tag_name = $terms[ $key ]->name;
      ?>
      <a href="<?php echo $tag_link; ?>" title="<?php echo esc_attr( $tag->count ); ?> posts"><?php echo $tag_name; ?></a>
      <?php }  ?>
    </div><!-- .col-sm-12 -->
  </div><!-- .row TEMAS -->
</div><!-- .container -->
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <div class="row title-section">
    <div class="col-sm-12">
      <h2>Todos los posts</h2>
      <?php
      $count_posts = wp_count_posts();

      $published_posts = $count_posts->publish;
      ?>
      <div class="subtitle">Son <strong><?php echo number_format_i18n($published_posts); ?></strong> desde acá los puedes explorar todos</div>
    </div>
  </div>
  <div class="row posts-home">
    <div id="recientes" class="gafrom from-home-posts">


<div class="section">
      
      
      <?php 
      wp_reset_postdata();
      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      
        query_posts( 'post_type=post&offset=10&posts_per_page=4'.'&paged='.get_query_var('paged') );
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
          
          wp_reset_postdata();
          wp_reset_query();
          ?>
          <?php
        endif;
        
          wp_reset_postdata();
          wp_reset_query();
         
      ?>

  </div>

  <div class="section">
      
      
      <?php 
      wp_reset_postdata();
      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      
        query_posts( 'post_type=post&offset=14&posts_per_page=4'.'&paged='.get_query_var('paged') );
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
          
          wp_reset_postdata();
          wp_reset_query();
          ?>
          <?php
        endif;
        
          wp_reset_postdata();
          wp_reset_query();
         
      ?>

  </div>

  <div class="section">
      
      
      <?php 
      wp_reset_postdata();
      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      
        query_posts( 'post_type=post&offset=18&posts_per_page=4'.'&paged='.get_query_var('paged') );
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
          
          wp_reset_postdata();
          wp_reset_query();
          ?>
          <?php
        endif;
        
          wp_reset_postdata();
          wp_reset_query();
         
      ?>

  </div>

  <div class="section">
      
      
      <?php 
      wp_reset_postdata();
      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      
        query_posts( 'post_type=post&offset=22&posts_per_page=4'.'&paged='.get_query_var('paged') );
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
          
          wp_reset_postdata();
          wp_reset_query();
          ?>
          <?php
        endif;
        
          wp_reset_postdata();
          wp_reset_query();
         
      ?>

  </div>

  <div class="section">
      
      
      <?php 
      wp_reset_postdata();
      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      
        query_posts( 'post_type=post&offset=26&posts_per_page=4'.'&paged='.get_query_var('paged') );
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
          
          wp_reset_postdata();
          wp_reset_query();
          ?>
          <?php
        endif;
        
          wp_reset_postdata();
          wp_reset_query();
         
      ?>

  </div>

  <div class="section">
      
      
      <?php 
      wp_reset_postdata();
      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      
        query_posts( 'post_type=post&offset=30&posts_per_page=4'.'&paged='.get_query_var('paged') );
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
          
          wp_reset_postdata();
          wp_reset_query();
          ?>
          <?php
        endif;
        
          wp_reset_postdata();
          wp_reset_query();
         
      ?>

  </div>

  <div class="section">
      
      
      <?php 
      wp_reset_postdata();
      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      
        query_posts( 'post_type=post&offset=34&posts_per_page=4'.'&paged='.get_query_var('paged') );
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
          
          wp_reset_postdata();
          wp_reset_query();
          ?>
          <?php
        endif;
        
          wp_reset_postdata();
          wp_reset_query();
         
      ?>

  </div>

    </div><!-- #recientes -->

  </div><!-- .row -->
</div><!-- .container -->