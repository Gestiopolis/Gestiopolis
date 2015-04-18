<?php
/*
Template Name: Contacto
*/
?>

<?php while (have_posts()) : the_post(); ?>
<div class="bgcon">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="breadcrumb">
          <a href="#">gestiopolis.com</a> <i class="fa fa-angle-right"></i> contacto
        </div><!-- .breadcrumb -->
        <h1 class="title">Nos interesa saber de ti</h1>
        <div class="descrcon">Tus opiniones, sugerencias, dudas y cualquier otra clase de mensajes serán bienvenidos.</div>

        <div class="row">
          <div class="col-sm-4">
            <div class="img-tel"></div>
          </div><!-- imagen tel -->
          <div class="col-sm-4">
            <div class="form-con">
              <?php insert_cform('1'); ?>
              <!--<form role="form">
                <div class="form-group">
                  <label for="inputName">Tu nombre<span>*</span></label>
                  <input type="text" class="form-control" id="inputName">
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email<span>*</span></label>
                  <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="form-group">
                  <label for="selectObj">Tu comunicación tiene que ver con:</label>
                  <div class="selectAs">
                    <select class="form-control" id="selectObj">
                      <option>Contenidos</option>
                      <option>Operaciones</option>
                      <option>Publicidad</option>
                      <option>Alianzas</option>
                      <option>Otros</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="textMessage">Mensaje<span>*</span></label>
                  <textarea class="form-control" rows="3" id="textMessage"></textarea>
                </div>
                <button type="submit" class="btn btn-green btn-block">Enviar</button>
              </form>-->
            </div>
          </div>
          <div class="col-md-4">
            <ul class="infocon">
              <li class="email"><a href="mailto:info@gestiopolis.com">info@gestiopolis.com <i class="fa fa-envelope"></i></a></li>
              <li class="twitter"><a href="http://www.twitter.com/gestiopoliscom">@gestiopoliscom <i class="fa fa-twitter"></i></a></li>
              <li class="facebook"><a href="http://www.facebook.com/gestiopolis">facebook.com/gestiopolis <i class="fa fa-facebook"></i></a></li>
              <li class="phone">(0571) 6333200 <i class="fa fa-phone"></i></li>
              <li class="dir">Cr. 53 127-70 T1 Of. 604 Bogotá, Colombia <i class="fa fa-building"></i></li>
            </ul>
            
          </div>
        </div>
      </div><!-- .col-md-12 -->
      
    </div>

  </div><!-- .container PRINCIPAL -->
</div><!--bgcon-->
<?php endwhile; ?>
