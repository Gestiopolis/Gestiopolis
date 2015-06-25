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