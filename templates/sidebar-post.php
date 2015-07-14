<?php global $post; ?>
<div class="right-post">
  <div class="sidebar-post">
    <h3>Más populares</h3>
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="sidebar-post">
    <h3>Más recientes</h3>
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="sidebar-post">
    <h3>Vas a querer leer</h3>
    <i class="fa fa-caret-down"></i>
    <?php 
    $show = 6;
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
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/grey.gif" data-original="<?php echo $large_image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" class="lazy pull-left" width="64" height="56">
      <div class="wrapper-content">
        <h2 class="entry-title"><a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php 
        $categories = get_the_category($post->ID); 
        foreach($categories as $category){
          echo '<i class="fa icon-cat-'.$category->term_id.' cat-col-'.$category->term_id.'"></i> <a class="cat-col-'.$category->term_id.'" href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a> &nbsp;&nbsp;';
        }
        ?>
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
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/grey.gif" data-original="<?php echo $large_image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" class="lazy pull-left" width="64" height="56">
      <div class="wrapper-content">
        <h2 class="entry-title"><a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php 
        $categories = get_the_category($post->ID); 
        foreach($categories as $category){
          echo '<i class="fa icon-cat-'.$category->term_id.' cat-col-'.$category->term_id.'"></i> <a class="cat-col-'.$category->term_id.'" href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a> &nbsp;&nbsp;';
        }
        ?>
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
  </div><!-- .sidebar-post -->
</div><!-- .right-post -->