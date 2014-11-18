<?php 
$exlinks = unserialize(get_post_meta($post->ID, "exlinks_value", true));
if($exlinks){
if(!is_array($exlinks)){?>
  <?php if(is_user_logged_in() && current_user_can( 'manage_options')){ ?>
  <div class="entry-edit">
    <h3>Edición de Enlaces Externos</h3>
    <?php echo get_editable_post_meta($post->ID, "exlinks_value", "textarea", true);?>
  </div>
  <?php } ?>
  <div class="related-out">
    <h2><i class="fa fa-external-link"></i> Más en la web</h2>
    <?php
    echo get_post_meta($post->ID, "exlinks_value", true);?>
  </div>
<?php 
}else if(empty($exlinks)){
?>
<?php if(is_user_logged_in() && current_user_can( 'manage_options')){ ?>
<div class="entry-edit">
  <h3>Edición de Enlaces Externos</h3>
  <form id="post-meta" class="post-meta" method="post" action="<?php bloginfo('template_directory'); ?>/lib/functions/editexlinks.php">
  <input type="hidden" name="postid" id="postid" value="<?php echo $post->ID; ?>" />
  <a href="#help-exlinks" class="gesti-open">&iquest;Qu&eacute; es esto?</a>
  <div id="help-exlinks" class="help-box">
  <p>Aqu&iacute; se ponen los enlaces externos del art&iacute;culo rellenando el formulario con el siguiente formato:<br />T&iacute;tulo del Enlace: <code>El marketing mix: conceptos, estrategias y aplicaciones</code><br />URL del Enlace: <code>http://books.google.com/books?id=B0OMnbAf3soC&printsec=frontcover&hl=es&source=gbs_v2_summary_r&cad=0#v=onepage&q&f=false</code></p>
  <p><a href="#help-exlinks" class="gesti-close">Cerrar</a></p>
  </div>

  <p id="exlinks-o">
  <label for="exlinks_t[]">T&iacute;tulo del Enlace:</label><input type="text" name="exlinks_t[]" class="gesti-input" /><br />
  <label for="exlinks_u[]">URL del enlace:</label><input type="text" name="exlinks_u[]" class="gesti-input" /><br />
  &nbsp;&nbsp;<a href="javascript:;" class="borrarjq" rel="exlinks-o">Borrar Enlace</a>
  </p>
  <?php for($m=0; $m<20; $m++){
  echo '<p id="exlinks-',$m,'" style="display:none">';
  echo '<label for="exlinks_t[]">T&iacute;tulo del Enlace:</label><input type="text" name="exlinks_t[]" class="gesti-input" /><br />';
  echo '<label for="exlinks_u[]">URL del enlace:</label><input type="text" name="exlinks_u[]" class="gesti-input" /><br />';
  echo '&nbsp;&nbsp;<a href="javascript:;" class="borrarjq" rel="exlinks-',$m,'">Borrar Enlace</a>';
  echo '</p>';  
  } ?>
  <br /><a href="javascript:;" id="agrexl">Agregar otro enlace</a>
  <p>Ingresa aqu&iacute; los enlaces externos de este art&iacute;culo. Para m&aacute;s informaci&oacute;n haz clic en "&iquest;Qu&eacute; es esto?"</p>
  <input type="submit" id="exlinks_submit" name="exlinks_submit" value="Editar Enlaces Externos" />
  </form>
</div>
<?php }?>
<?php }else{ ?>

<?php if(is_user_logged_in() && current_user_can( 'manage_options')){ ?>
<div class="entry-edit">
  <h3>Edición de Enlaces Externos</h3>
  <form id="post-meta" class="post-meta" method="post" action="<?php bloginfo('template_directory'); ?>/lib/functions/editexlinks.php">
  <input type="hidden" name="postid" id="postid" value="<?php echo $post->ID; ?>" />
  <a href="#help-exlinks" class="gesti-open">&iquest;Qu&eacute; es esto?</a>
  <div id="help-exlinks" class="help-box">
  <p>Aqu&iacute; se ponen los enlaces externos del art&iacute;culo rellenando el formulario con el siguiente formato:<br />T&iacute;tulo del Enlace: <code>El marketing mix: conceptos, estrategias y aplicaciones</code><br />URL del Enlace: <code>http://books.google.com/books?id=B0OMnbAf3soC&printsec=frontcover&hl=es&source=gbs_v2_summary_r&cad=0#v=onepage&q&f=false</code></p>
  <p><a href="#help-exlinks" class="gesti-close">Cerrar</a></p>
  </div>
  <?php
  $n = 0;
  foreach($exlinks as $q){
  echo '<p id="exlinks-ed-',$n,'">';
  echo '<label for="exlinks_t[]">T&iacute;tulo del Enlace:</label><input type="text" name="exlinks_t[]" class="gesti-input" value="',$q['titulo'],'" /><br />';
  echo '<label for="exlinks_u[]">URL del enlace:</label><input type="text" name="exlinks_u[]" class="gesti-input" value="',$q['exlink'],'" /><br />';
  echo '&nbsp;&nbsp;<a href="javascript:;" class="borrarjq" rel="exlinks-ed-',$n,'">Borrar Enlace</a>';
  echo '</p>';
  $n++; 
  } 
  for($m=0; $m<20; $m++){
  echo '<p id="exlinks-',$m,'" style="display:none">';
  echo '<label for="exlinks_t[]">T&iacute;tulo del Enlace:</label><input type="text" name="exlinks_t[]" class="gesti-input" /><br />';
  echo '<label for="exlinks_u[]">URL del enlace:</label><input type="text" name="exlinks_u[]" class="gesti-input" /><br />';
  echo '&nbsp;&nbsp;<a href="javascript:;" class="borrarjq" rel="exlinks-',$m,'">Borrar Enlace</a>';
  echo '</p>';  
  } ?>
  <br /><a href="javascript:;" id="agrexl">Agregar otro enlace</a>
  <p>Ingresa aqu&iacute; los enlaces externos de este art&iacute;culo. Para m&aacute;s informaci&oacute;n haz clic en "&iquest;Qu&eacute; es esto?"</p>
  <input type="submit" id="exlinks_submit" name="exlinks_submit" value="Editar Enlaces Externos" />
  </form>
</div>
<?php }?>

<div class="related-out">
  <h2><i class="fa fa-external-link"></i> Más en la web</h2>
  <ul>
  <?php 
  foreach($exlinks as $q){
    echo "<li><a rel=\"nofollow\" href=\"",$q['exlink'],"\" title =\"",$q['titulo'],"\">",$q['titulo'],"</a><span><a href=\"#\" data-toggle=\"tooltip\" title=\"Reportar enlace roto\"><i class=\"fa fa-chain-broken\"></i></a></span></li>";
  }
  ?>
  </ul>
</div>
<?php } }else{ ?>
<?php if(is_user_logged_in() && current_user_can( 'manage_options')){ ?>
<div class="entry-edit">
  <h3>Edición de Enlaces Externos</h3>
  <form id="post-meta" class="post-meta" method="post" action="<?php bloginfo('template_directory'); ?>/lib/functions/editexlinks.php">
  <input type="hidden" name="postid" id="postid" value="<?php echo $post->ID; ?>" />
  <a href="#help-exlinks" class="gesti-open">&iquest;Qu&eacute; es esto?</a>
  <div id="help-exlinks" class="help-box">
  <p>Aqu&iacute; se ponen los enlaces externos del art&iacute;culo rellenando el formulario con el siguiente formato:<br />T&iacute;tulo del Enlace: <code>El marketing mix: conceptos, estrategias y aplicaciones</code><br />URL del Enlace: <code>http://books.google.com/books?id=B0OMnbAf3soC&printsec=frontcover&hl=es&source=gbs_v2_summary_r&cad=0#v=onepage&q&f=false</code></p>
  <p><a href="#help-exlinks" class="gesti-close">Cerrar</a></p>
  </div>

  <p id="exlinks-o">
  <label for="exlinks_t[]">T&iacute;tulo del Enlace:</label><input type="text" name="exlinks_t[]" class="gesti-input" /><br />
  <label for="exlinks_u[]">URL del enlace:</label><input type="text" name="exlinks_u[]" class="gesti-input" /><br />
  &nbsp;&nbsp;<a href="javascript:;" class="borrarjq" rel="exlinks-o">Borrar Enlace</a>
  </p>
  <?php for($m=0; $m<20; $m++){
  echo '<p id="exlinks-',$m,'" style="display:none">';
  echo '<label for="exlinks_t[]">T&iacute;tulo del Enlace:</label><input type="text" name="exlinks_t[]" class="gesti-input" /><br />';
  echo '<label for="exlinks_u[]">URL del enlace:</label><input type="text" name="exlinks_u[]" class="gesti-input" /><br />';
  echo '&nbsp;&nbsp;<a href="javascript:;" class="borrarjq" rel="exlinks-',$m,'">Borrar Enlace</a>';
  echo '</p>';  
  } ?>
  <br /><a href="javascript:;" id="agrexl">Agregar otro enlace</a>
  <p>Ingresa aqu&iacute; los enlaces externos de este art&iacute;culo. Para m&aacute;s informaci&oacute;n haz clic en "&iquest;Qu&eacute; es esto?"</p>
  <input type="submit" id="exlinks_submit" name="exlinks_submit" value="Editar Enlaces Externos" />
  </form>
</div>
<?php }?>

<?php }?>