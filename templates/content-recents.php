<div class="postw col-lg-3 col-md-4 col-sm-6" style="height:200px;">
  <article id="post-<?php the_ID(); ?>" class="post">
    <div class="wrapper-img">
      <a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'main-thumb' );
      ?>
        <img src="<?php echo $large_image_url[0]; ?>" data-original="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/grey.gif" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive">
        <div class="overlay"></div>
        <div class="vert-center-wrapper">
          <div class="vert-centered">
            <div class="text-center">
              <h2 class="entry-title"><span><?php the_title(); ?></span></h2>
            </div>
          </div>
        </div>
        <div class="sb-caption"><i class="fa fa-clock-o"></i> <?php echo estimate_time();?> de lectura</div>
      </a>
    </div>
  </article><!-- .post -->
</div><!-- .col-md-3 col-sm-6 -->