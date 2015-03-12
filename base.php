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
      <a herf="<?php comments_link(); ?>"class="btn-floating red">
        <i class="large fa fa-comments"></i>
      </a>
      <ul>
        <li><a href="#" class="btn-floating yellow"><i class="large fa fa-facebook"></i></a></li>
        <li><a href="#" class="btn-floating green"><i class="large fa fa-twitter"></i></a></li>
        <li><a href="#" class="btn-floating blue"><i class="large fa fa-heart"></i></a></li>
      </ul>
    </div>
    <div class="fixed-action-btn top-left">
      <a herf="<?php comments_link(); ?>"class="btn-floating red">
        <i class="large fa fa-comments"></i>
      </a>
      <ul>
        <li><a href="#" class="btn-floating yellow"><i class="large fa fa-facebook"></i></a></li>
        <li><a href="#" class="btn-floating green"><i class="large fa fa-twitter"></i></a></li>
        <li><a href="#" class="btn-floating blue"><i class="large fa fa-heart"></i></a></li>
      </ul>
    </div>
  <?php }} ?>
  <a href="#" class="toTop" title="Volver a arriba"><i class="fa fa-chevron-circle-up"></i></a>
  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>

</body>
</html>
