<?php
$term = get_queried_object();
global $current_user;
wp_get_current_user();
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
    <div class="col-sm-12">



      <!-- /1007663/Tag-Top-728x90 -->
      <div id='div-gpt-ad-1559754535644-0' class="adsce" style='height:90px; width:728px;'>
      <script>
      googletag.cmd.push(function() { googletag.display('div-gpt-ad-1559754535644-0'); });
      </script>
      </div>


    </div>
  </div>
  <!-- Empieza sección de TÍTULO DE CATEGORÍA -->
  <div class="row posts-home">
    <div class="col-md-12">
      <div class="row tab-content equal-items">
        <div class="tab-pane active gafrom from-tag-posts" id="publicaciones">
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

        <?php  wp_paginate(); ?>
        
      </div><!-- .row -->
    </div><!-- .span4 -->
  </div><!-- .row LISTADO DE POSTS -->
</div><!-- .container -->