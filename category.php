<?php
$term = get_queried_object();
global $current_user;
get_currentuserinfo();
?>
<div class="post-image">
  <div class="bg-image cat-bg-<?php echo $term->term_id; ?>" style="height: 248px;"></div>
  <div class="vert-center-wrapper">
    <div class="vert-centered">
      <div class="center container">
        <h1 class="title"><i class="fa icon-cat-<?php echo $term->term_id; ?>"></i> <?php single_term_title(); ?></h1>
        <div class="eje-tagline"><?php echo $term->description; ?></div>
        <ul class="catcounts list-unstyled">
          <li><i class="fa fa-file-o"></i> <?php echo $term->count; ?> posts</li>
          <li><i class="fa fa-pencil"></i> <?php autcat($term->term_id); ?> autores</li>
          <?php 
            $args = array('categories' => $term->term_id);
            $tags = get_category_tags($args);
          ?>
          <li><i class="fa fa-tags"></i> <?php echo count($tags); ?> temas</li>
        </ul>
      </div>
    </div>
  </div>        
</div>
<div class="container">
  <?php if (is_category('18')) {?>
  <div class="review-ad">
    <div class="row title-section">
      <div class="col-sm-12">
        <h2>Recomendado</h2>
        <div class="subtitle">La siguiente es una información comercial de tu interés</div>
      </div>
    </div>
    <div class="row destacados">
      <div class="col-sm-12">
        <div class="row">
          <?php $repost = get_post(333666);
            $post_title = stripslashes($repost->post_title);
            $permalink = get_permalink($repost->ID);
            $category = get_the_category($repost->ID);
            $category_id = $category[0]->term_id;
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $repost->ID ), 'dest-img' );
          ?>
          <div class="col-sm-12">
            <article id="post-<?php echo $repost->ID;?>" class="destacado-<?php echo $repost->ID;?> post">
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
        </div><!-- .row -->
      </div>
    </div>
  </div>
  <?php } ?>
</div><!-- .container -->
<!-- Empieza sección de LISTADO DE POSTS -->
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-9">
      <h1 class="title">Todos los posts Son 13.481 desde acá los puedes explorar todos</h1>
      <div id="publicaciones">
        <?php while (have_posts()) : the_post(); 
          get_template_part( 'templates/content', 'search' );
         endwhile; ?>
         <?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
        <div class="pagination">
          <?php wp_pagenavi(); ?>
        </div>
        <?php } else { ?>
        <div class="pagination">
          <div class="nav-previous alignleft"><?php next_posts_link( 'Artículos anteriores' ); ?></div>
        </div>
        <?php } ?>
      </div>
    </div><!-- .col-sm-12 -->
    <div class="hidden-xs hidden-sm col-md-3">
      <?php get_template_part('templates/sidebar-search'); ?>
    </div><!--.col-sm-3-->
  </div>
</div><!-- .container PRINCIPAL -->