<?php global $post; 
$maincat = get_the_category($post->ID); 
?>
<div class="right-post gafrom from-sidebar-right-post">

  <div class="sidebar-post" style="background-color: #ffffff">
    <h3>Relacionados</h3>
    
    <i class="fa fa-caret-down"></i>
    <?php 
    $show = 5;
    $postsnot = array();
    $postsnot[] = $post->ID;
    $mainpost = $post->ID;
    $query1 = ci_get_related_posts_1( $post->ID, $show );
    //$countp = 1;
        if( $query1->have_posts() ) { while ($query1->have_posts()) : $query1->the_post(); 
          $postsnot[] = $post->ID;
          if($mainpost != $post->ID){
          ?>
    <article id="post-<?php the_ID(); ?>" class="post">
      <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
      ?>
      <a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" data-ic="ic_medium=related_posts&ic_source=sidebar" class="internal-campaign"><img src="<?php echo $large_image_url[0]; ?>" data-original="<?php echo $large_image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" class="lazy pull-left" width="64" height="56"></a>
      <div class="wrapper-content">
        <h2 class="entry-title"><a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" data-ic="ic_medium=related_posts&ic_source=sidebar" class="internal-campaign"><?php the_title(); ?></a></h2>
      </div>
    </article>
    <?php }
      //$countp++; 
     endwhile;?>
    

    <?php } 
    wp_reset_query(); 
    wp_reset_postdata();
    $show = $show - count($query1->posts);
     if ($show > 0) {
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $query2 = ci_get_related_posts_2( $post->ID, $postsnot, $show, $paged );
        if( $query2->have_posts() ) { while ($query2->have_posts()) : $query2->the_post();?>
    <article id="post-<?php the_ID(); ?>" class="post">
      <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
      ?>
      <a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" data-ic="ic_medium=related_posts&ic_source=sidebar"><img src="<?php echo $large_image_url[0]; ?>" data-original="<?php echo $large_image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" class="lazy pull-left" width="64" height="56"></a>
      <div class="wrapper-content">
        <h2 class="entry-title"><a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" data-ic="ic_medium=related_posts&ic_source=sidebar"><?php the_title(); ?></a></h2>
      </div>

      

    </article>
    <?php endwhile;?>
    <div class="pagination">
      <div class="nav-previous alignleft"><?php next_posts_link( 'Artículos anteriores', $query2->max_num_pages ); ?></div>
    </div>
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata();
  }
    ?>
  </div>

    <div id="scrollerads"></div>
		<script async id="aniviewJS23da12ceba" src="https://play.aniview.com/59a5603f28a0611e9360c113/5aa67dd928a06107220a4b8a/gestiopolis.com_MW+D_300_250.js"></script>

    
</div><!-- .right-post -->