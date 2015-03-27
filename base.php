<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div class="wrap" role="document">
    <div class="content">
      <main role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->
  <?php if(is_single()){ 
    global $post;
    if (get_post_meta($post->ID, "all2html_htmlcontent", true) == "") {?>
    <div class="fixed-action-btn bottom-right">
      <a href="javascript:;"class="btn-floating share-color">
        <i class="large fa fa-share"></i>
      </a>
      <ul>
        <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&layout=link&appId=220995104693477" class="btn-floating fb-color"><i class="large fa fa-facebook"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink());?>&amp;text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
 ?>&amp;via=gestiopoliscom" class="btn-floating tw-color"><i class="large fa fa-twitter"></i></a></li>
        <li><a href="#" class="btn-floating red"><i class="large fa fa-heart"></i></a></li>
        <li><a href="<?php comments_link(); ?>" class="btn-floating gray"><i class="large fa fa-comments"></i></a></li>
      </ul>
    </div>
    <div class="fixed-action-btn top-left">
      <a href="<?php comments_link(); ?>"class="btn-floating gray">
        <i class="large fa fa-comments"></i>
      </a>
      <ul>
        <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&layout=link&appId=220995104693477" class="btn-floating fb-color"><i class="large fa fa-facebook"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink());?>&amp;text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
 ?>&amp;via=gestiopoliscom" class="btn-floating tw-color"><i class="large fa fa-twitter"></i></a></li>
        <li><a href="javascript:;" class="btn-floating red"><i class="large fa fa-plus"></i></a></li>
        <li class="additional" style="display:none;"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
 ?>" class="btn-floating linkedin-color"><i class="large fa fa-linkedin"></i></a></li>
        <li class="additional" style="display:none;"><a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" class="btn-floating gp-color"><i class="large fa fa-google-plus"></i></a></li>
      </ul>
    </div>
  <?php }} ?>
  <a href="#myNavmenu" class="toTop" title="Volver a arriba"><i class="fa fa-chevron-circle-up"></i></a>
  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>

</body>
</html>
