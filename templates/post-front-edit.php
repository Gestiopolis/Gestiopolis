<div class="entry-edit">
  <p>Visitas: <b><?php if(function_exists('the_views')) { the_views(); } ?></b></p>
  <p><b><a href="<?php echo home_url('/'); ?>wp-admin/post.php?post=<?php echo $post->ID;?>&amp;action=edit" target="_blank">Enlace a Editor</a></b></p>
  <p><b><a href="<?php echo home_url('/'); ?>" id="deletePost">ELIMINAR ARTÍCULO</a></b></p>
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
  <p><b><a href="<?php echo home_url('/'); ?>" id="deletePdf">ELIMINAR DOCUMENTO</a></b></p>
  <?php }?>
  </p>
</div>