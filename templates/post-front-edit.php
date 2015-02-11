<div class="entry-edit">
  <p>Visitas: <b><?php if(function_exists('the_views')) { the_views(); } ?></b></p>
  <p><b><a href="<?php echo home_url('/'); ?>wp-admin/post.php?post=<?php echo $post->ID;?>&amp;action=edit" target="_blank">Enlace a Editor</a></b></p>
  <p><b><a href="<?php echo home_url('/'); ?>" id="deletePost">ELIMINAR ARTÍCULO</a></b></p>
  <h3>Edición de Enlace del Post (Slug)</h3>
  <p><b>Slug:</b> <input type="text" name="slugedit" id="slugedit" value="<?php echo $post->post_name; ?>"> <input type="submit" name="editslug" id="editslug" value="Editar"></p>
  <h3>Edición de Yoast SEO</h3>
  <p><b>Título SEO:</b> <?php echo get_post_meta($post->ID, "_yoast_wpseo_title", "input", true); ?></p>
  <h3>Edición de Imagen Principal</h3>
<?php if(get_post_meta($post->ID, "image_value", true) != ""){?>
  <p><b><a href="<?php echo home_url('/'); ?>" id="deleteImage">ELIMINAR IMAGEN</a></b></p>
  <p><b>URL Original de la Imagen en Flickr:</b> <input type="text" name="imageedit" id="imageedit" value="<?php echo get_post_meta($post->ID, "image_url_value", "input", true); ?>"> <input type="submit" name="editimage" id="editimage" value="Editar"></p>
  <p><b>URL de Imagen en GestioPolis:</b> <?php echo get_post_meta($post->ID, "image_value", true); ?></p>
  <p><b>Autor de la Imagen:</b> <?php echo get_post_meta($post->ID, "image_author_t_value", true); ?></p>                
<?php } else if(get_post_meta($post->ID, "Thumbnail", true) != "") { ?>
  <p><b><a href="<?php echo home_url('/'); ?>" id="deleteImage">ELIMINAR IMÁGEN</a></b></p>
  <p><b>URL Original de la Imagen en Flickr:</b> <input type="text" name="imageedit" id="imageedit" value="<?php echo get_post_meta($post->ID, "Thumbnail", "input", true); ?>"> <input type="submit" name="editimage" id="editimage" value="Editar"></p>
  <p><b>URL de Imagen en GestioPolis:</b> <?php echo get_post_meta($post->ID, "Thumbnail", true); ?></p>
  <p><b>Autor de la Imagen:</b> <?php echo get_post_meta($post->ID, "image_author_t_value", true); ?></p>
<?php }else{ ?>
  <p><b>URL Original de la Imagen en Flickr:</b> <input type="text" name="imageedit" id="imageedit" value=""> <input type="submit" name="editimage" id="editimage" value="Añadir"></p>
  <p><b>URL de Imagen en GestioPolis:</b> </p>
  <p><b>Autor de la Imagen:</b> </p>              
<?php } ?>
  <h3>Edición de Embebidos Superiores</h3>
  <p><b>URL de embebido de Presentaciones:</b> <?php echo get_post_meta($post->ID, "ppts_value", "input", true); ?></p>
  <p><b>URL de embebido de Documentos complejos:</b> <?php echo get_post_meta($post->ID, "docs_c_value", "input", true); ?></p>
  <?php if ((get_post_meta($post->ID, "all2html_htmlcontent", true) == "") && (get_post_meta($post->ID, "all2html_php", true) == "")) { ?>
  <p>
    <b>Subir documento:</b> 
    <form id="all2html" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="">
      <input type="file" class="form-control" id="document_file" name="document_file" required>
      <input type="hidden" name="postid" id="postids" value="<?php echo $post->ID; ?>" />
      <input type="hidden" name="step" id="step" value="uno" />
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-play"></span> Procesar Documento</button>
    </form>
  </p>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-text center-block text-center"></div>
          <img src="<?php bloginfo('template_directory'); ?>/assets/img/preloader.gif" alt="Cargando HTML" class="text-center center-block">
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
  <p><b>Server Root:</b> <?php echo $_SERVER['DOCUMENT_ROOT']; ?></p>
  <p><b>Enlace al documento original:</b> <?php echo get_post_meta($post->ID, "all2html_docu", true); ?></p>
  <p><b>Enlace al documento en PDF:</b> <?php echo get_post_meta($post->ID, "all2html_pdf", true); ?></p>
  <p><b>Hash para embebidos:</b> <?php echo get_post_meta($post->ID, "all2html_hash", true); ?></p>
  <p><b>Iframe:</b> &lt;iframe width=&quot;800&quot; height=&quot;566&quot; src=&quot;<?php echo home_url('/'); ?>embed/<?php echo get_post_meta($post->ID, "all2html_hash", true); ?>&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;</p>
  <?php if (get_post_meta($post->ID, "all2html_zip", true) != '') { ?>
  <p><b>Url del ZIP:</b> <?php echo home_url(get_post_meta($post->ID, 'all2html_zip', true)); ?></p>
  <p><b>Output del ZIP:</b> <?php echo home_url(get_post_meta($post->ID, 'all2html_outzip', true)); ?></p>
  <?php } ?>
  <p><b>Id del attachment:</b> <?php echo get_post_meta($post->ID, "all2html_id", true); ?></p>
  <p><b>Extensión del archivo:</b> <?php echo get_post_meta($post->ID, "all2html_ext", true); ?></p>
  <p><b>Ruta donde está el archivo:</b> <?php echo path2url(get_post_meta($post->ID, "all2html_path", true)); ?></p>
  <p><b>HTML del PDF:</b> <?php echo get_post_meta($post->ID, "all2html_html", true); ?></p>
  <p><b>CSS del HTML:</b> <?php echo get_post_meta($post->ID, "all2html_css", true); ?></p>
  <p><b>Full HTML del PDF:</b> <?php echo get_post_meta($post->ID, "all2html_fullhtml", true); ?></p>
  <p><b>Versión en PHP del HTML:</b> <?php echo get_post_meta($post->ID, "all2html_php", true); ?></p>
  <p><b>Extracto de la página 3:</b> <?php echo get_post_meta($post->ID, "all2html_excerpt", true); ?></p>
  <p><b>Output convertir a PDF:</b> <?php echo get_post_meta($post->ID, "output_convpdf", true); ?></p>
  <p><b>Output copiar PDF:</b> <?php echo get_post_meta($post->ID, "output_copiar", true); ?></p>
  <p><b>Output a HTML:</b> <?php echo get_post_meta($post->ID, "output_pdf2html", true); ?></p>
  <p><b>Output convertir a PHP:</b> <?php echo get_post_meta($post->ID, "output_php", true); ?></p>
  <p><b>Output full HTML:</b> <?php echo get_post_meta($post->ID, "output_full", true); ?></p>
  <p><b>Output optimize PDF:</b> <?php print_r(get_post_meta($post->ID, "output_optpdf", true)); ?></p>
  <p><b><a href="<?php echo home_url('/'); ?>" id="deletePdf">ELIMINAR DOCUMENTO</a></b></p>
  <?php }?>
  <h3>Edición de Embebidos Inferiores</h3>
  <p><b>URL de embebido de Documentos:</b> <?php echo get_post_meta($post->ID, "docs_value", "input", true); ?></p>
</div>