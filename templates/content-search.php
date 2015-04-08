<div class="row postw">
  <div class="col-sm-12">
    <article id="post-<?php the_ID(); ?>" class="post ">
      <div class="row">
        <div class="col-sm-3">
          <div class="wrapper-img pull-left">
            <a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/grey.gif" data-original="<?php echo wp_imager(640, 360, '', 'img-responsive', false, null, true); ?>" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive">
            </a>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="contsearch pull-left">
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title_attribute(); ?></a></h2>
            <span class="autor">
              <?php if(get_post_meta($post->ID, "author-name_value", true) != "") : ?>
              <a href="<?php bloginfo('url') ?>/author/<?php the_author_meta('nickname'); ?>" rel="author"><?php echo get_post_meta($post->ID, "author-name_value", true); ?></a>
              <?php else : ?>
              <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" rel="author"><?php echo get_the_author_meta('display_name'); ?></a>
              <?php endif; ?>
               <time class="updated" datetime="<?php echo get_the_time('c'); ?>"><i class="fa fa-calendar"></i> <?php echo get_the_date('d.m.Y'); ?></time>
               <i class="fa fa-clock-o"></i> <?php echo estimate_time();?> de lectura
            </span><!--/.autor-->
            <p><?php echo title_trim(180, get_the_excerpt()); ?></p><!--/post-excerpt -->
          </div>
        </div>
      </div>
    </article>
  </div>
</div>