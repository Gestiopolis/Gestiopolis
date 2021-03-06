<?php
/*
 * Template Name: Eduhub
 * Description: Plantilla de Eduhub
 */
?>

<?php
    if(isset($_POST['boton'])){
        if($_POST['nombre'] == ''){
            $errors[1] = '<span class="error">Ingrese su nombre</span>';
        }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
            $errors[2] = '<span class="error">Ingrese su email</span>';
        }else if($_POST['telefono'] == ''){
            $errors[3] = '<span class="error">Ingrese su teléfono</span>';
        }else if($_POST['pais'] == ''){
            $errors[4] = '<span class="error">Ingrese su país</span>';
        }else{
            $dest = "djdiego88@gmail.com"; //Email de destino
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono']; //Asunto
            $pais = $_POST['pais']; //Cuerpo del mensaje
            $cuerpo = "Nombre: $nombre <br/> Email: $email <br/> Teléfono: $telefono <br/> Pais: $pais";
            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 
            if(mail($dest,'Nuevo contacto de Eduhub',$cuerpo,$headers)){
                $result = '<div class="result_ok">Email enviado correctamente </div>';
                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre'] = '';
                $_POST['email'] = '';
                $_POST['telefono'] = '';
                $_POST['pais'] = '';
            }else{
                $result = '<div class="result_fail">Hubo un error al enviar el mensaje </div>';
            }
        }
    }
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="container cposts">
    <div class="row">
      <div class="hidden-xs hidden-sm col-md-3 sidebarcol gafrom from-sidebar-post">
        <div class="fixedside">
<?php if (get_post_meta($post->ID, "all2html_htmlcontent", true) != "") {?>

<!-- /1007663/Trans-Lateral-ATF-300x600 -->
<!--
<div id='div-gpt-ad-1460590183368-14'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1460590183368-14'); });
</script>
</div>
-->

<!-- Surge Pricing Unit - gestiopolis.com_300x600_piso030cts -->
<div id="gestiopolis.com_300x600_piso030cts" class="surgeprice">
  <script data-cfasync="false" type="text/javascript">surgeprice.display("gestiopolis.com_300x600_piso030cts");</script>
</div>

<?php }else { ?>

<!-- /1007663/Post-Lateral-ATF-300x600 -->
<!--
<div id='div-gpt-ad-1460590183368-9'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1460590183368-9'); });
</script>
</div>
-->

<!-- Surge Pricing Unit - gestiopolis.com_300x600_piso030cts -->
<div id="gestiopolis.com_300x600_piso030cts" class="surgeprice">
  <script data-cfasync="false" type="text/javascript">surgeprice.display("gestiopolis.com_300x600_piso030cts");</script>
</div>

 <?php } ?>
<?php get_template_part('templates/sidebar-post'); ?>
  </div>
</div><!--.col-sm-3-->
      <div class="col-sm-12 col-md-9 maincol">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title title"><?php the_title(); ?></h1>
          <div class="row"><!-- Empieza row de contenido y meta datos -->
            <div class="col-sm-12 col-md-2 col-md-push-10">
              <div class="breadcredit gafrom from-post-breadcredit">
                <?php get_template_part('templates/entry-meta'); ?>
                <?php the_tags('<div class="temas-uppost hidden-xs hidden-sm gafrom from-post-tags"> ','','</div>'); ?>
                <div class="adstags gafrom from-ads-posttags hidden-xs hidden-sm" style="margin-top: 32px;">
                  <!-- /1007663/Post-AbajoTags -->
                  <div id='div-gpt-ad-1460590183368-8'>
                  <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('div-gpt-ad-1460590183368-8'); });
                  </script>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-10 col-md-pull-2 content-col">
          <time class="entry-date published hidden" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date('d.m.Y'); ?></time>
          <time class="entry-date updated hidden" datetime="<?php echo get_the_modified_time('c'); ?>"><?php echo get_the_modified_date('d.m.Y'); ?></time>
          <?php if (get_post_meta($post->ID, "all2html_htmlcontent", true) != "") {?>
          <div class="adsce">
            <!-- /1007663/Trans-Principal-ATF-728x90 -->
            <div id='div-gpt-ad-1460590183368-15'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1460590183368-15'); });
            </script>
            </div>
          </div>
          <div id="sidebar" style="display: none !important;">
            <div id="outline"></div>
          </div>
          <?php 
          $servidor = $_SERVER['HTTP_HOST'] == 'localhost' ? '/Gestiopolis' : '';
          $content = file_get_contents($_SERVER['DOCUMENT_ROOT'].$servidor.get_post_meta($post->ID, "all2html_htmlcontent", true));
            echo insert_ads_all2html( $content );
          
        ?>
          <div class="loading-indicator"><img alt="" src="<?php echo home_url( '/pdf2htmlEX/pdf2htmlEX-64x64.png' ); ?>"></div>
          <?php } else if ((get_post_meta($post->ID, "all2html_php", true) != "") && (get_post_meta($post->ID, "all2html_htmlcontent", true) == "")) {?>
          <h3>Se debe volver a procesar el archivo para poder ver correctamente este documento. Elimina primero el documento y luego procésalo de nuevo.</h3>
          <p><b><a href="<?php echo home_url('/'); ?>" id="deletePdf">ELIMINAR DOCUMENTO</a></b></p>
          <?php } ?>
          <div class="post-content clearfix">
            <div class="entry-content gafrom from-post-entry-content">
              <?php if ( get_post_meta($post->ID, "all2html_htmlcontent", true) == "" ) { ?>
              
              <?php } ?>
               <style>
.container-ad{
  max-width: 100%;
  margin: 0 auto;
}
.container-pub-eduhub{
  padding: 10px;
  
  border: 1px solid #D4D4D4;
  border-radius: 5px;
  box-shadow: 0px 0px 10px #D4D4D4;
}
.box-1{
  width: 60%;
  max-width: 100%;
}
.box-2{
  width: 38%;
  text-align: center;
  max-width: 100%;
}
.box-3, .box-4{
  width: 49%;
  display:inline-block;
  margin-top: 13px;
}
.box-1, .box-2{
  display: inline-block;
  vertical-align: middle;
  max-width: 100%;
}
.container-pub-eduhub h2{
  margin: 0px !important;
  font-size: 16px !important;
}
.container-pub-eduhub li{
  color: #ff4422 !important;
  font-size: 14px !important;
  padding: 0px !important;
}
.container-pub-eduhub ul{
  padding-left: 20px !important;
  margin: 10px !important;
}
.button-pub-eduhub{
  background-color: #ff4422;
}
a.button-pub-eduhub{
  color: #ffffff !important;
  text-decoration: none;
  padding: 12px 10px !important;
  border-radius: 4px !important;
  font-size: 14px !important;
  font-weight: bold;
}
a.button-pub-eduhub:hover{
  background-color: #ff765d;
}

.contacto input[type="text"]{
  width: 300px;
  max-width: 90%;
  height: 32px;
  border-radius: 5px;
  border: 1px solid #D4D4D4;
  margin-bottom: 24px;
}
.contacto input[type="submit"]{
  color: #ffffff;
  text-decoration: none;
  padding: 12px 10px;
  border-radius: 4px;
  font-size: 14px;
  background-color: #ff4422;
  border: none;
  font-weight: bold;
}
.contacto input[type="submit"]:hover{
  background-color: #ff765d;
  
}
.popup__form{
  text-align: center;
}
.popup__form h3{
  margin-bottom: 30px;
}

::-webkit-input-placeholder{
  color:#00AEDB;
  font-size: 14px;
  color: #D4D4D4;
  padding-left: 20px;
}

.result_fail{
    background: none repeat scroll 0 0 #BC1010;
    border-radius: 20px 20px 20px 20px;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    text-align: center;
}
.result_ok{
    background: none repeat scroll 0 0 #1EA700;
    border-radius: 20px 20px 20px 20px;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    text-align: center;
}
.error{
  position: absolute;
  margin-top: 9px;
  margin-left: 5px;
  font-weight: bold;
  color: red;
}

/*------------------------------------*\
    $MEDIA-QUERIES
\*------------------------------------*/

  /* Smaller than standard 960 (devices and browsers) */
  @media only screen and (max-width: 959px) {}

  /* Tablet Portrait size to standard 960 (devices and browsers) */
  @media only screen and (min-width: 768px) and (max-width: 959px) {}

  /* All Mobile Sizes (devices and browser) */
  @media only screen and (max-width: 767px) {}

  /* Mobile Landscape Size to Tablet Portrait (devices and browsers) */
  @media only screen and (min-width: 480px) and (max-width: 767px) {
    .box-1, .box-2, .box-3, .box-4{
      display: block;
      width: 100%;
    }
    .box-2{
      margin-bottom: 20px;
    }
    .container-pub-eduhub ul{
      margin-bottom: 30px;
    }
    .popup__form h3, .container-pub-eduhub h2{
      font-size: 18px;
    }

  }

  /* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
  @media only screen and (max-width: 479px) {
    .box-1, .box-2, .box-3, .box-4{
      display: block;
      width: 100%;
    }
    .box-2{
      margin-bottom: 20px;
    }
    .container-pub-eduhub ul{
      margin-bottom: 30px;
    }
    .popup__form h3, .container-pub-eduhub h2{
      font-size: 16px;
    }

  }
          </style>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory' ); ?>/publi-eduhub/jquery.fancybox.css">





<div class="container-ad">
  <div class="container-pub-eduhub">
  <form class='contacto' method='POST' action=''>
    <div class="box-1">
      <h2>Transforma tu vida con el MBA Online de ISEAD</h2>
      <ul class="toogle">
        <li>Mejorarás tus competencias</li>
        <li>Obtendrás una visión de negocio mucho más completa</li>
        <li>Aumentarás tu capacidad de resolver problemas y tomar decisiones</li>
        <li>Apliarás tu red profesional de contactos</li>
      </ul>


    <div class="box-3 toogle" style="display: none">
      <div>
        <input type='text' class='email' name='email' placeholder='Correo electrónico' value='<?php if(isset($_POST['email'])){ $_POST['email']; } ?>' required><?php if(isset($errors)){ echo $errors[2]; } ?>
            </div>


            <div><input type='text' class='nombre' name='nombre' placeholder='Nombre completo' value='<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>' required><?php if(isset($errors)){ echo $errors[1]; } ?>
            </div>
    </div>
    

          <div class="box-4 toogle" style="display: none">
            <div><input type='text' class='telefono' name='telefono' placeholder='Teléfono móvil' value='<?php if(isset($_POST['telefono'])){ $_POST['telefono']; } ?>' required><?php if(isset($errors)){ echo $errors[3]; } ?>
            </div>

            <div><input type='text' class='pais' name='pais' placeholder='Colombia' value='<?php if(isset($_POST['pais'])){ $_POST['pais']; } ?>' required><?php if(isset($errors)){ echo $errors[4]; } ?>
            </div>
          </div>
          

          
          <?php if(isset($result)) { echo $result; } ?>
      
    </div>

    <div class="box-2"<?php if(isset($result)) {  echo ' style="display: none"'; } ?>>
      <a class="button-pub-eduhub various toogle" href="#">SOLICITAR INFORMACIÓN</a>
      <div class="toogle" style="display: none"><input type='submit' value='SOLICITAR INFORMACIÓN' class='boton' name='boton'></div>
    </div>
    </form>
  </div>
</div>

  <!--<div id="inline" style="display:none;" class="popup__form">
    
    <h3>Transforma tu vida con el MBA Online de ISEAD</h3>

      <form class='contacto' method='POST' action=''>

        <div class="box-3">
          <div>
            <input type='text' class='email' name='email' placeholder='Correo electrónico' value='<?php if(isset($_POST['email'])){ $_POST['email']; } ?>' required><?php if(isset($errors)){ echo $errors[2]; } ?>
                </div>


                <div><input type='text' class='nombre' name='nombre' placeholder='Nombre completo' value='<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>' required><?php if(isset($errors)){ echo $errors[1]; } ?>
                </div>
        </div>
        

              <div class="box-4">
                <div><input type='text' class='telefono' name='telefono' placeholder='Teléfono móvil' value='<?php if(isset($_POST['telefono'])){ $_POST['telefono']; } ?>' required><?php if(isset($errors)){ echo $errors[3]; } ?>
                </div>

                <div><input type='text' class='pais' name='pais' placeholder='Colombia' value='<?php if(isset($_POST['pais'])){ $_POST['pais']; } ?>' required><?php if(isset($errors)){ echo $errors[4]; } ?>
                </div>
              </div>
              

              <div><input type='submit' value='SOLICITAR INFORMACIÓN' class='boton' name='boton'></div>
              <?php if(isset($result)) { echo $result; } ?>
          </form>
  </div>-->
    
<!-- Add jQuery library -->

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory' ); ?>/publi-eduhub/funciones.js"></script>

<script src="<?php bloginfo('stylesheet_directory' ); ?>/publi-eduhub/jquery.fancybox.pack.js"></script>

<script>
  $(document).ready(function() {
  /*$(".various").fancybox({
    maxWidth  : 500,
    maxHeight : 700,
    fitToView : false,
    width   : '30%',
    height    : '60%',
    autoSize  : true,
    closeClick  : false,
    openEffect  : 'none',
    closeEffect : 'none'
  });*/
  $('.button-pub-eduhub').click(function(e){
    e.preventDefault();
    $(".toogle").toggle();
  });
});
</script>

              <!-- FIN EDUHUB -->

              <?php the_content(); ?>

            </div>
            <div id="likepost" class="compartelo  gafrom from-post-likepost">
              <h2 class="text-center">Hazle saber al autor que aprecias su trabajo</h2>
              <?php if(function_exists(getILikeThis)) getILikeThis('get'); ?>
            </div>
            <div class="adsce">
            
            <!-- Surge Pricing Unit - gestiopolis.com_300x250_btf -->
            <div id="gestiopolis.com_300x250_btf" class="surgeprice">
              <script data-cfasync="false" type="text/javascript">surgeprice.display("gestiopolis.com_300x250_btf");</script>
            </div>

              <!-- /1007663/Post-Abajo-BTF-300x250 -->
              <!-- 
              <div id='div-gpt-ad-1460590183368-7'>
                
              <script type='text/javascript'>
              googletag.cmd.push(function() { googletag.display('div-gpt-ad-1460590183368-7'); });
              </script>
                -->
                
              </div>
            </div>
            <?php if (get_post_meta($post->ID, "downloads_value", true) != '') { ?>
            <div class="downbox"><a class="downlink gafrom from-post-downlink" href="<?php echo get_post_meta($post->ID, 'downloads_value', true); ?>"><span class="author-color"><i class="fa fa-cloud-download"></i></span> Descarga el archivo original</a></div>
            <?php } ?>
            <div id="comments" class="comentarios gafrom from-post-comments">
              <a href="javascript:;" class="btn btn-block btn-primary btn-lg cerrado"><span>Tu opinión vale, comenta aquí</span><span style="display:none;">Oculta los comentarios</span></a>
              <div id="respond" class="comments-wrapper">
                <h2><i class="fa fa-comments"></i> Comentarios</h2>
                <?php echo do_shortcode('[fbcomments]'); ?>
                <?php //comments_template('/templates/comments.php'); ?>
              </div>
            </div>
            <div id="suscripcion" class="suscripcion hidden gafrom from-post-suscripcion">
              <div>
                <span class="author-color"><i class="fa fa-envelope"></i></span>
                <strong>Recibe los mejores contenidos en tu email</strong>
                <p>
                  <em>Nos aseguraremos de seleccionar especialmente para ti sólo lo mejor de las nuevas publicaciones cada semana</em>
                </p>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Que se vea y funcione como http://azumbrunnen.me/frontkit/" aria-describedby="basic-addon1">
                  </div>
              </div>
            </div>
            <div class="compartelo">
              <h2><i class="fa fa-share"></i> Compártelo con tu mundo</h2>
              <ul class="list-unstyled gafrom from-post-compartelo">
                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&layout=link&appId=220995104693477" class="btn facebook"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink());?>&amp;text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
 ?>&amp;via=gestiopoliscom" class="btn twitter"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                <li><a target="_blank" href="mailto:?subject=Revisa este artículo&amp;body=Hola! Revisa este artículo: <?php the_title(); ?> - <?php echo get_permalink(); ?>." class="btn email"><i class="fa fa-envelope"></i></a></li>
                <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" class="btn google"><i class="fa fa-google-plus"></i></a></li>
                <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
 ?>" class="btn linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="btn more"><i class="fa fa-plus"></i></a></li>
              </ul>
            </div><!-- .compartelo -->
            <div id="autores" class="autores">
              <h2>Escrito por:</h2>
              <div itemprop="author" itemscope itemtype="http://schema.org/Person" class="author vcard gafrom from-post-author-info-bottom">
                <?php if(get_post_meta($post->ID, "author-name_value", true) != "") : ?>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="url">
                  <?php echo get_author_color_id(); ?>
                  <strong itemprop="name" class="fn"><?php echo get_post_meta($post->ID, "author-name_value", true); ?></strong>
                </a>
                <p class="selectionShareable">
                  <em itemprop="description"><?php echo get_post_meta($post->ID, "author-bio_value", true); ?></em>
                </p>
                <?php else : ?>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="url fn">
                  <?php echo get_author_color_id(); ?>
                  <strong itemprop="name"><?php echo get_the_author(); ?></strong>
                </a>
                <p class="selectionShareable">
                  <em itemprop="description"><?php echo get_the_author_meta('description'); ?></em>
                </p>
                <?php endif; ?>
              </div>
            </div>
            <div class="post-tags hidden-md hidden-lg">
              <h2><i class="fa fa-tags"></i> En este post se habla sobre</h2>
              <?php the_tags('<div class="temas-archive  gafrom from-post-tags-mobile"> ','','</div>'); ?>
            </div><!-- .post-tags -->
            <div class="compartelo posts-home hidden-md hidden-lg gafrom from-post-rels-mobile">
              <div class="title-section"><h2>Relacionados</h2><i class="fa fa-caret-down"></i></div>
              <?php 
              $show = 12;
              $postsnot = array();
              $postsnot[] = $post->ID;
              $mainpost = $post->ID;
              $query1 = ci_get_related_posts_1( $post->ID, $show );
              //$countp = 1;
                  if( $query1->have_posts() ) { while ($query1->have_posts()) : $query1->the_post(); 
                    $postsnot[] = $post->ID;
                    if($mainpost != $post->ID){
                      get_template_part( 'templates/content', 'recommend' );
                    }
                    //$countp++; 
                   endwhile;?>
                  <?php } 
                  wp_reset_query(); 
                  wp_reset_postdata(); 
                  $show = $show - count($query1->posts);
                 if ($show > 0) {
                  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $query2 = ci_get_related_posts_2( $post->ID, $postsnot, $show, $paged );
                    if( $query2->have_posts() ) { while ($query2->have_posts()) : $query2->the_post();get_template_part( 'templates/content', 'recommend' );
                     endwhile;
                    } 
                    wp_reset_query(); 
                    wp_reset_postdata();
                  }
                  ?>
            </div><!-- .recomendados -->
            <?php if(is_user_logged_in() && current_user_can( 'manage_options')){ ?>
            <?php get_template_part('templates/post-front-edit'); ?>
            <?php } ?>
            <?php get_template_part('templates/entry-exlinks'); ?>
            <div class="quotes gafrom from-post-quotes">
              <div>
                <span class="author-color"><i class="fa fa-thumb-tack"></i></span>
                <strong>Cita esta página</strong>
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
              <a href="javascript:;" id="copytext" class="btn btn-copiar" data-clipboard-target="apa">Copiar</a>
              <div class="hidden alert alert-success" role="alert">¡Texto copiado al portapapeles!</div>
            </div>
          </div><!-- .quotes -->

            
            <?php if (get_post_meta($post->ID, "image_url_value", true) != "") { ?>
            <div class="image-credit gafrom from-post-img-credit"><i class="fa fa-camera"></i> Imagen del encabezado cortesía de <a href="<?php echo get_post_meta($post->ID, "image_url_value", $single = true); ?>" target="_blank"><?php echo get_post_meta($post->ID, "image_author_t_value", true); ?></a> en Flickr</div>
            <?php } ?>
          </div>
          <footer>
            <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
          </footer>
        </div><!-- fin col-md-10 -->
        </div><!-- fin de row de contenido y meta -->
        </article>
      </div><!--.col-sm-9-->
      
    </div><!-- fin de .row -->
  </div>
  <?php 
  $like = get_post_meta($post->ID, '_liked', true);
  if ($like == ""){
    update_post_meta($post->ID, '_liked', 1);
  }
  //if(has_tag(8175)){//Reclutamiento tag
  //if(has_tag(8277)){//gerencia y habilidades gerenciales
  if(has_category(20)){//Administración
    echo do_shortcode("[pro_ad_display_adzone id='334406' flyin='1' flyin_delay='3']"); 
  }
  ?>
<?php endwhile; ?>
