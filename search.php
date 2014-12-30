
  <div class="container">
    <div class="row">
      <div class="col-sm-36">
        <div class="breadcrumb">
          <a href="#">gestiopolis.com</a> <i class="fa fa-angle-right"></i> búsqueda
        </div><!-- .breadcrumb -->
        <h1 class="title"><em>Resultados de la Búsqueda |</em> "<?php echo get_search_query(); ?>"</h1>
        
        <?php while (have_posts()) : the_post(); ?>
          <div class="row">
            <div class="col-sm-36 aboutsections">
              <article class="notaPrincipal alinearLeft">
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title_attribute(); ?></a></h2>
                <span class="autor">
                <?php if(get_post_meta($post->ID, "author-name_value", true) != "") : ?>
                Por <a href="<?php bloginfo('url') ?>/author/<?php the_author_meta('nickname'); ?>" rel="author"><?php echo get_post_meta($post->ID, "author-name_value", true); ?></a>
                <?php else : ?>
                Por <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" rel="author"><?php echo get_the_author_meta('display_name'); ?></a>
                <?php endif; ?>
                 el <?php the_time('j.m.Y') ?>
                </span><!--/.autor-->
                <p><?php echo title_trim(260, get_the_excerpt()); ?></p><!--/post-excerpt -->
              </article>
            </div>
          </div><!-- .row -->
        <?php endwhile; ?>
      </div><!-- .col-sm-36 -->
      
    </div>

  </div><!-- .container PRINCIPAL -->