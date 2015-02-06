<?php 
	$category = get_the_category($post->ID);
?>
<div class="postw col-lg-3 col-md-4 col-sm-6">
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
    <div class="wrapper-post cat-<?php echo $category[0]->term_id; ?>">
      <div class="cat-bar"></div>
      <div class="wrapper-content clearfix">
        <a class="autor" href="<?php echo get_author_posts_url($post->post_author); ?>">
          <?php echo get_author_color_id(); ?> 
          <?php if(get_post_meta($post->ID, "author-name_value", true) != "") : ?>
          <strong><?php echo get_the_author();//echo get_post_meta($post->ID, "author-name_value", true); ?></strong>
          <?php else : ?>
          <strong><?php echo get_the_author(); ?></strong>
          <?php endif; ?>
        </a>
        <div class="post-content">
          <p><?php echo title_trim(220, get_the_excerpt()); ?></p>
        </div>
        <div class="tiempo-fecha">
          <div class="tiempo pull-left"><?php echo estimate_time();?> de lectura</div>
          <div class="fecha pull-right"><?php echo get_the_date('j\.m\.Y'); ?></div>
        </div>
        <div class="category pull-left"><a href="#" class="cat-bg-<?php echo $category[0]->term_id; ?>"><i class="fa icon-cat-<?php echo $category[0]->term_id; ?>"></i> <?php echo $category[0]->cat_name; ?></a></div>
        <?php the_tags('<div class="tags"> ',', ','</div>'); ?>
      </div>
    </div>
    <!--<div class="wrapper-meta clearfix">
      <div class="tiempo pull-left"><?php echo estimate_time();?> de lectura</div>
      <div class="fecha pull-right"><?php echo get_the_date('j\.m\.Y'); ?></div>
      <?php the_tags('<div class="tags"><i class="fa fa-tags"></i> ',', ','</div>'); ?>
      <div class="stats"><i class="fa fa-eye"></i> <?php if(function_exists('the_views')) { the_views(); } ?> <i class="fa fa-comments"></i> <?php comments_number('0','1','%'); ?> <i class="fa fa-heart"></i> 21</div>
      
    </div>-->
  </article><!-- .post -->
</div><!-- .col-md-3 col-sm-6 -->