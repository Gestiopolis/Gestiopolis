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
    <?php $args1=array( 'cat' => $category_id, 'posts_per_page'=>2, 'post__not_in'=>array($post->ID));//Empieza query del último post
      $query1 = new WP_Query($args1);
        if( $query1->have_posts() ) { while ($query1->have_posts()) : $query1->the_post(); ?>
    <article id="post-<?php echo $post->ID; ?>" class="post">
      <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
      <div class="overlay"></div>
      <h3 class="entry-title"><a id="titulo-<?php echo $post->ID; ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><span><?php the_title_attribute(); ?></span></a></h3>
      <span class="compartir"><i class="fa fa-share"></i></span>
      <div class="destacado-content cat-bg-<?php echo $category_id; ?>">
        <div class="botones-compartir" id="compartir-<?php echo $post->ID; ?>">
          <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID; ?>"></div>
          <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID; ?>"></div>
          <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID; ?>"></div>
        </div>
      </div>
    </article>
    <?php endwhile;?>
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata(); ?>
    <div class="autores-sidebar">
      <h3>Más autores en <?php echo $category_name; ?></h3>
      <div class="wrapper-nombre">
        <a href="#"><img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar"></a>
        <a href="#"><img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar"></a>
        <a href="#"><img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar"></a>
        <a href="#"><img src="http://gravatar.com/avatar/e71197281d0838afcc0a1f838e78441f?s=56" class="avatar avatar-56 avatar-default" height="56" width="56" style="width: 56px; height: 56px;" alt="avatar"></a>
        <a href="#" class="prev"><i class="fa icon-chevron-left"></i></a>
        <a href="#" class="next"><i class="fa icon-chevron-right"></i></a>
      </div>
      <div class="nombre-titu">
        <div class="nombre-autor"><a href="#">Elisabeth Judson Shue Guggenheim</a></div>
        <div class="titular-autor">Actriz de cine y televisión. Nominada a los Oscar, Golden Globe, BAFTA y SAG</div>
      </div>
      <div class="wrapper-meta">
        <div class="span1">
          <span class="number">12</span> publicaciones
        </div><!-- .span1 -->
        <div class="span1">
          <span class="number">123456</span> lectores
        </div><!-- .span1 -->
        <!--<div class="span1">
          <a href="#" class="btn btn-seguir"><i class="fa fa-plus-sign"></i> Seguir</a>
        </div>--><!-- .span1 -->
      </div>
    </div>
    <?php $args2=array( 'cat' => $category_id, 'posts_per_page'=>3, 'post__not_in'=>array($post->ID), 'offset' => 2);//Empieza query del último post
      $query2 = new WP_Query($args2);
        if( $query2->have_posts() ) { while ($query2->have_posts()) : $query2->the_post(); ?>
    <article id="post-<?php echo $post->ID; ?>" class="post">
      <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
      <div class="overlay"></div>
      <h3 class="entry-title"><a id="titulo-<?php echo $post->ID; ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><span><?php the_title_attribute(); ?></span></a></h3>
      <span class="compartir"><i class="fa fa-share"></i></span>
      <div class="destacado-content cat-bg-<?php echo $category_id; ?>">
        <div class="botones-compartir" id="compartir-<?php echo $post->ID; ?>">
          <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID; ?>"></div>
          <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID; ?>"></div>
          <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID; ?>"></div>
        </div>
      </div>
    </article>
    <?php endwhile;?>
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata(); ?>
    <div class="temas-sidebar">
      <h3>Temas tendencia en <?php echo $category_name; ?></h3>
      <div class="wrapper-temas">
        <a href="#"><i class="fa fa-tag"></i> quimbara quimbara</a><a href="#"><i class="fa fa-tag"></i> te voy a enseñar</a><a href="#"><i class="fa fa-tag"></i> mi negrita me espera</a><a href="#"><i class="fa fa-tag"></i> pedro navaja</a><a href="#"><i class="fa fa-tag"></i> dime por qué</a><a href="#"><i class="fa fa-tag"></i> quimbara quimbara</a><a href="#"><i class="fa fa-tag"></i> te voy a enseñar</a><a href="#"><i class="fa fa-tag"></i> mi negrita me espera</a><a href="#"><i class="fa fa-tag"></i> pedro navaja</a><a href="#"><i class="fa fa-tag"></i> dime por qué</a>
      </div>
    </div>
    <?php $args3=array( 'cat' => $category_id, 'posts_per_page'=>4, 'post__not_in'=>array($post->ID), 'offset' => 5);//Empieza query del último post
      $query3 = new WP_Query($args3);
        if( $query3->have_posts() ) { while ($query3->have_posts()) : $query3->the_post(); ?>
    <article id="post-<?php echo $post->ID; ?>" class="post">
      <img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
      <div class="overlay"></div>
      <h3 class="entry-title"><a id="titulo-<?php echo $post->ID; ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><span><?php the_title_attribute(); ?></span></a></h3>
      <span class="compartir"><i class="fa fa-share"></i></span>
      <div class="destacado-content cat-bg-<?php echo $category_id; ?>">
        <div class="botones-compartir" id="compartir-<?php echo $post->ID; ?>">
          <div class="platform bc-facebook" id="fb-compartir-<?php echo $post->ID; ?>"></div>
          <div class="platform bc-twitter" id="tweet-compartir-<?php echo $post->ID; ?>"></div>
          <div class="platform bc-linkedin" id="linkedin-compartir-<?php echo $post->ID; ?>"></div>
        </div>
      </div>
    </article>
    <?php endwhile;?>
    <?php } 
    wp_reset_query(); 
    wp_reset_postdata(); ?>
    <!--<a href="#" class="btn btn-cargar btn-block"><i class="fa fa-plus"></i> Cargar más</a>-->
  </div><!-- .sidebar-post -->
</div><!-- .right-post -->