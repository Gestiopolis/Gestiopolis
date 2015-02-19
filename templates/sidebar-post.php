<?php global $post; ?>
<div class="right-post">
  <div class="sidebar-post">
    <h3>Relacionados manuales</h3>
    <?php 
    $show = 25;
    $postsnot = array();
    $postsnot[] = $post->ID;
    $query1 = ci_get_related_posts_1( $post->ID, $show );
        if( $query1->have_posts() ) { while ($query1->have_posts()) : $query1->the_post(); 
          $postsnot[] = $post->ID;
          ?>
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
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata();
    $show = $show - count($query1->posts);
     if ($show > 0) {
    $query2 = ci_get_related_posts_2( $post->ID, $postsnot, $show );
        if( $query2->have_posts() ) { while ($query2->have_posts()) : $query2->the_post();?>
    <article id="post-<?php the_ID(); ?>" class="post">
      <!--<p><?php //echo $show;?></p>-->
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
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata();
  }
    ?>
  </div><!-- .sidebar-post -->
</div><!-- .right-post -->