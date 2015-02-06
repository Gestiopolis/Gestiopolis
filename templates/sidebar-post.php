<?php global $post; ?>
<div class="right-post">
  <div id="top_ejes_side" class="dropdown">
    <?php 
      $category = get_the_category($post->ID); 
      $category_id = 0;
      $category_name = '';
      if($category[0]){
        echo '<a class="dropdown-toggle" data-toggle="dropdown" href="'.get_category_link($category[0]->term_id ).'" id="drop_menu_ejes">'.$category[0]->cat_name.' <i class="fa fa-sort-desc"></i></a>';
        $category_id = $category[0]->term_id;
        $category_name = $category[0]->cat_name;
      }
      ?> 
    <div id="menu_ejes" class="dropdown-menu" role="menu" aria-labelledby="drop_menu_ejes">
      <ul id="menu_ejes_list">
        <li><a class="cat-0 cat-bg-0" href="#"><i class="fa icon-cat-0"></i> Todos los temas</a></li>
        <?php
        $args = array(
          'orderby' => 'name',
          'parent' => 0,
          'exclude'=> '1,2,97,105,106'
          );
        $categories = get_categories( $args );
        foreach ( $categories as $category ) {
          echo '<li><a class="cat-' . $category->term_id . ' cat-bg-' . $category->term_id . '" href="' . get_category_link( $category->term_id ) . '"><i class="fa icon-cat-' . $category->term_id . '"></i>' . $category->name . '</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="eje-tabs">
    <a href="#" class="recent active"><i class="fa fa-clock-o"></i> Recientes</a>
    <a href="#" class="popular"><i class="fa fa-thumbs-up"></i> Populares</a>
  </div><!-- eje tabs -->
  <div class="sidebar-post">
    <?php $args1=array( 'cat' => $category_id, 'posts_per_page'=>9, 'post__not_in'=>array($post->ID));//Empieza query del último post
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
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata(); ?>
    <!--<a href="#" class="btn btn-cargar btn-block"><i class="fa fa-plus"></i> Cargar más</a>-->
  </div><!-- .sidebar-post -->
</div><!-- .right-post -->