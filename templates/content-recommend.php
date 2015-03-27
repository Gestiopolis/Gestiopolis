<div class="postw col-sm-6">
  <article id="post-<?php the_ID(); ?>" class="post">
    <div class="wrapper-img">
      <a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/grey.gif" data-original="<?php echo wp_imager(640, 360, '', 'img-responsive', false, null, true); ?>" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive">
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
  </article><!-- .post -->
</div><!-- .col-md-3 col-sm-6 -->