<?php global $post; ?>
<div class="right-post">
  <div class="sidebar-post">
    <?php 
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $tag_ids = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
    if($tag_ids){
    $args1=array( 'cat' => $category_id, 'posts_per_page'=>9, 'post__not_in'=>array($post->ID), 'tag__in' => $tag_ids, 'paged' => $paged, 'orderby' => 'rand');//Empieza query del último post
      $query1 = new WP_Query($args1);
        if( $query1->have_posts() ) { while ($query1->have_posts()) : $query1->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" class="post">
      <div class="wrapper-img">
        <a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
          <img src="<?php echo wp_imager(640, 360, '', 'img-responsive', false, null, true); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
          <div class="overlay"></div>
          <div class="vert-center-wrapper">
            <div class="vert-centered">
              <div class="text-center">
                <h2 class="entry-title"><span><?php the_title(); ?></span></h2>
              </div>
            </div>
          </div>
        </a>
      </div>
    </article>
    <?php endwhile;?>
    <div class="pagination">
      <div class="nav-previous alignleft"><?php next_posts_link( 'Artículos anteriores', $query1->max_num_pages ); ?></div>
    </div>
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata();
    } ?>
    <!--<a href="#" class="btn btn-cargar btn-block"><i class="fa fa-plus"></i> Cargar más</a>-->
  </div><!-- .sidebar-post -->
</div><!-- .right-post -->