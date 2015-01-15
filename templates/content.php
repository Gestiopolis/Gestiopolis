<?php 
	$category = get_the_category(get_the_ID());
?>
<div class="postw col-md-12 col-sm-18">
  <article id="post-<?php the_ID(); ?>" class="post">
    <div class="wrapper-img">
      <img src="<?php echo get_post_meta(get_the_ID(), "Thumbnail", true); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
      <span class="compartir"><i class="fa fa-share"></i></span>
      <div class="meta-content">
        <div class="botones-compartir" id="compartir-<?php the_ID(); ?>">
          <div class="platform bc-facebook" id="fb-compartir-<?php the_ID(); ?>"></div>
          <div class="platform bc-twitter" id="tweet-compartir-<?php the_ID(); ?>"></div>
          <div class="platform bc-linkedin" id="linkedin-compartir-<?php the_ID(); ?>"></div>
          <div class="platform bc-gplus" id="gplus-compartir-<?php the_ID(); ?>"></div>
        </div>
      </div>
    </div>
    <div class="wrapper-post cat-<?php echo $category[0]->term_id; ?>">
      <div class="cat-bar">
          <a href="<?php echo get_category_link( $category[0]->term_id ) ?>" class="hexagon cat-bg-<?php echo $category[0]->term_id; ?>" title="Enlace a categoría <?php echo $category[0]->cat_name; ?>"><i class="fa icon-cat-<?php echo $category[0]->term_id; ?>"></i></a>
        </div>
      <div class="wrapper-content clearfix">
        <h2 class="entry-title"><a id="titulo-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <a class="autor" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
          <?php echo get_avatar( get_the_author_meta( 'ID' ), 32, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?> Por: <?php echo get_the_author_meta('display_name'); ?>
        </a>
        <div class="fecha"><?php the_time('j.m.Y') ?></div>
        <div class="post-content">
          <p><?php echo title_trim(220, get_the_excerpt()); ?></p>
        </div>
      </div>
    </div>
    <div class="wrapper-meta clearfix">
      <?php the_tags('<div class="tags"><i class="fa fa-tags"></i> ',', ','</div>'); ?>
      <div class="stats"><i class="fa fa-eye"></i> <?php if(function_exists('the_views')) { the_views(); } ?> <i class="fa fa-comments"></i> <?php comments_number('0','1','%'); ?> <i class="fa fa-heart"></i> 21</div>
      <div class="tiempo"><i class="fa fa-coffee"></i> Leerlo te tomará <?php echo estimate_time();?></div>
    </div>
  </article><!-- .post -->
</div><!-- .col-md-12 col-sm-18 -->