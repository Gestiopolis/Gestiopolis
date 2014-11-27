<?php while (have_posts()) : the_post(); ?>
  <div class="post-image">
    <?php if (get_post_meta($post->ID, "Thumbnail", true) != "") { ?>
    <div class="bg-image" style="background-image: url(<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>); height: 400px;"></div>
    <?php } else { ?>
    <div class="bg-image" style="background: #ccc; height: 400px;"></div>
    <?php } ?>
    <div class="overlay"></div>
      <div class="vert-center-wrapper">
        <div class="vert-centered">
          <div class="center container">
            <h1 class="title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div>        
  </div>
  <div class="breadcredit container">
    <div class="breadcrumb pull-left">
      <a href="#"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i>
      <?php 
      $category = get_the_category(); 
      if($category[0]){
        echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
      }
      ?> 
      <i class="fa fa-angle-right"></i>
    </div>
    <?php if (get_post_meta($post->ID, "image_url_value", true) != "") { ?>
    <div class="image-credit pull-right"><a href="<?php echo get_post_meta($post->ID, "image_url_value", $single = true); ?>" target="_blank"><i class="fa fa-camera"></i> <?php echo get_post_meta($post->ID, "image_author_t_value", true); ?></a></div>
    <?php } ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-26">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php get_template_part('templates/entry-meta'); ?>
          <?php if(is_user_logged_in() && current_user_can( 'manage_options')){ ?>
          <?php get_template_part('templates/post-front-edit'); ?>
          <?php } ?>
          <?php if (get_post_meta($post->ID, "all2html_htmlcontent", true) != "") { ?>
          <div id="toolbar">
            <div class="btn-toolbar" role="toolbar">
              <div class="btn-group btn-group-sm pull-left">
                <a type="button" class="btn btn-default prevpage" href="#" title="Página Anterior"><i class="fa fa-chevron-up"></i></a>
                <a type="button" class="btn btn-default nextpage" href="#" title="Página Siguiente"><i class="fa fa-chevron-down"></i></a>
              </div>&nbsp;&nbsp;
              Página <input class="pagen" value="0" name="gopage" maxlength="4" size="1"> de <span id="pages"></span>
              <div class="btn-group pull-right">
                  <a type="button" title="Descargar archivo" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-download-alt"></span> Descargar <span class="caret"></span></a>
                  <ul class="dropdown-menu list-unstyled" role="menu">
                    <li><a href="<?php echo get_post_meta($post->ID, 'all2html_docu', true); ?>">Original</a></li>
                    <?php if (get_post_meta($post->ID, "all2html_zip", true) != '') { ?>
                    <li><a href="<?php echo home_url(get_post_meta($post->ID, 'all2html_zip', true)); ?>">Comprimido</a></li>
                    <?php } ?>
                    <?php if (get_post_meta($post->ID, "all2html_ext", true) != 'pdf') { ?>
                    <li><a href="<?php echo home_url(get_post_meta($post->ID, 'all2html_pdf', true)); ?>">PDF</a></li>
                    <?php } ?>
                  </ul>
              </div>
            </div>
          </div>
          <div id="sidebar" style="display: none !important;">
            <div id="outline"></div>
          </div>
          <?php 
          $servidor = $_SERVER['HTTP_HOST'] == 'localhost' ? '/Gestiopolis' : '';
          include_once($_SERVER['DOCUMENT_ROOT'].$servidor.get_post_meta($post->ID, "all2html_htmlcontent", true)); //Carga el php convertido por pdf2htmlEX ?>
          <div class="loading-indicator"><img alt="" src="<?php echo home_url( '/pdf2htmlEX/pdf2htmlEX-64x64.png' ); ?>"></div>
          <?php } else if ((get_post_meta($post->ID, "all2html_php", true) != "") && (get_post_meta($post->ID, "all2html_htmlcontent", true) == "")) {?>
          <h3>Se debe volver a procesar el archivo para poder ver correctamente este documento. Elimina primero el documento y luego procésalo de nuevo.</h3>
          <p><b><a href="<?php echo home_url('/'); ?>" id="deletePdf">ELIMINAR DOCUMENTO</a></b></p>
          <?php } ?>
          <div class="post-content clearfix">
            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </div>
          <footer>
            <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
          </footer>
          <div class="related-in">
            <h2><i class="fa fa-thumb-tack"></i> Más sobre este tema</h2>
          </div><!-- .related-in -->
          <?php get_template_part('templates/entry-exlinks'); ?>

          <div class="quotes">
            <h2><i class="fa fa-bookmark"></i> Cita esta publicación</h2>
            <ul>
              <li class="active"><a href="#apa" data-toggle="tab">APA</a></li>
              <li><a href="#mla" data-toggle="tab">MLA</a></li>
              <li><a href="#chicago" data-toggle="tab">CHICAGO</a></li>
              <li><a href="#icontec" data-toggle="tab">ICONTEC</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="apa">
                <?php echo get_the_author_meta('last_name').' '.get_the_author_meta('first_name'); ?>. (<?php echo get_the_date('Y, F j'); ?>). <em><?php echo get_the_title(); ?></em>. Recuperado de <?php echo get_permalink(); ?> 
              </div>
              <div class="tab-pane" id="mla">
                <?php echo get_the_author_meta('last_name').', '.get_the_author_meta('first_name'); ?>. "<?php echo get_the_title(); ?>". <em><?php echo get_bloginfo('name'); ?></em>. <?php echo get_the_date('j F Y'); ?>. Web. &lt;<?php echo get_permalink(); ?>&gt;.
              </div>
              <div class="tab-pane" id="chicago">
                <?php echo get_the_author_meta('last_name').', '.get_the_author_meta('first_name'); ?>. "<?php echo get_the_title(); ?>". <em><?php echo get_bloginfo('name'); ?></em>. <?php echo get_the_date('F j, Y'); ?>. Consultado el <?php actual_date(); ?>. <?php echo get_permalink(); ?>.
              </div>
              <div class="tab-pane" id="icontec">
                <?php echo get_the_author_meta('last_name').', '.get_the_author_meta('first_name'); ?>. <?php echo get_the_title(); ?> [en línea]. &lt;<?php echo get_permalink(); ?>&gt; [Citado el <?php actual_date(); ?>].
              </div>
            </div>
            <a href="#" class="btn btn-copiar">Copiar</a>
          </div><!-- .quotes -->

          <div class="comentarios">
            <h2><i class="fa fa-comments"></i> Comentarios</h2>
            <?php comments_template('/templates/comments.php'); ?>
          </div>
        </article>
      </div><!--.col-sm-26-->
      <div class="col-sm-10">
        <?php get_template_part('templates/sidebar-post'); ?>
      </div><!--.col-sm-10-->
    </div>
  </div>
<?php endwhile; ?>
