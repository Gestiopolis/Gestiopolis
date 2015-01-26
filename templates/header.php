<nav id="offcanvas">
  <ul class="list-unstyled main-menu">
 
    <!--Include your navigation here-->
    <li class="text-right"><a href="#" id="nav-close">X</a></li>
    <?php
    $args = array(
      'orderby' => 'name',
      'parent' => 0,
      'exclude'=> '1,2,97,105,106'
      );
    $categories = get_categories( $args );
    foreach ( $categories as $category ) {
      echo '<li><a class="cat-' . $category->term_id . '" href="' . get_category_link( $category->term_id ) . '"><i class="fa icon-cat-'.$category->term_id.' cat-col-'.$category->term_id.'"></i>  ' . $category->name . '<span class="icon"></span></a></li>';
    }
    ?>
    <li><a href="#">Autores y Temas</a>
      <ul id="explora_autores">
        <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/autores-destacados-explora.png'); ?>" width="28" height="28" alt="Autores destacados"/>&nbsp;&nbsp;Autores destacados</a></li>
        <li><a href="#"><i class="fa fa-tags"></i>&nbsp;&nbsp;Temas tendencia</a></li>
      </ul>
    </li>
    <li><a href="#">Más&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
      <ul id="explora_mas">
        <li><a href="<?php echo get_page_link(2); ?>">Acerca de</a></li>
        <li><a href="#">Ayuda</a></li>
        <li><a href="#">Términos legales</a></li>
        <li><a href="<?php echo get_page_link(80309); ?>">ABC temático</a></li>
        <li><a href="<?php echo get_page_link(4767); ?>">Contacto</a></li>
        <li><a href="#">Derechos de autor</a></li>
        <li><a href="<?php echo get_page_link(80284); ?>">Archivo</a></li>
        <li><a href="#">Publicidad</a></li>
        <li class="copy">&copy;<?php echo date('Y'); ?> WebProfit Ltda.</li>
      </ul>
    </li>
  </ul>
</nav>
<header class="banner navbar navbar-inverse navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img width="179" height="48" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.png'); ?>" alt="<?php bloginfo('name'); ?>"></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-nav navbar-right">
        <?php if(!is_single()){ ?>
        <!--<li id="nav_explora" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="drop_explora"><i class="fa fa-bars"></i> Explora <i class="fa fa-sort-desc"></i></a>
          <div id="menu_explora" class="dropdown-menu" role="menu" aria-labelledby="drop_explora">
            <span class="nav-header">Ejes Temáticos&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></span>
            <ul id="explora_ejes">
              <?php
              $args = array(
                'orderby' => 'name',
                'parent' => 0,
                'exclude'=> '1,2,97,105,106'
                );
              $categories = get_categories( $args );
              foreach ( $categories as $category ) {
                echo '<li><a class="cat-' . $category->term_id . '" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
              }
              ?>
            </ul>
            <ul id="explora_autores">
              <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/autores-destacados-explora.png'); ?>" width="28" height="28" alt="Autores destacados"/>&nbsp;&nbsp;Autores destacados</a></li>
              <li><a href="#"><i class="fa fa-tags"></i>&nbsp;&nbsp;Temas tendencia</a></li>
            </ul>
            <span class="nav-header">Más&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></span>
            <ul id="explora_mas">
              <li><a href="<?php echo get_page_link(2); ?>">Acerca de</a></li>
              <li><a href="#">Ayuda</a></li>
              <li><a href="#">Términos legales</a></li>
              <li><a href="<?php echo get_page_link(80309); ?>">ABC temático</a></li>
              <li><a href="<?php echo get_page_link(4767); ?>">Contacto</a></li>
              <li><a href="#">Derechos de autor</a></li>
              <li><a href="<?php echo get_page_link(80284); ?>">Archivo</a></li>
              <li><a href="#">Publicidad</a></li>
              <li class="copy">&copy;<?php echo date('Y'); ?> WebProfit Ltda.</li>
            </ul>
          </div>
        </li>-->
        <?php } ?>
        <li id="nav_publica"><a href="<?php echo get_page_link(264); ?>"><i class="fa fa-cloud-upload"></i> Publica</a></li>
        <li id="nav_busca">
          <div id="sb-search" class="sb-search">
            <form id="searchbox_002900072100095058217:mp7ncjp0apo" action="<?php echo home_url( '/' ); ?>" role="search">
              <input type="hidden" name="cx" value="002900072100095058217:mp7ncjp0apo">
              <input type="hidden" name="cof" value="FORID:10">
              <input type="hidden" name="ie" value="UTF-8">
              <input class="sb-search-input" placeholder="Ingresa tu búsqueda..." type="search" value="" name="s" id="search">
              <input class="sb-search-submit" type="submit" value="">
              <!--<i class="fa fa-search sb-icon-search"></i>-->
              <span class="sb-icon-search"><i class="fa fa-search"></i> Busca</span>
            </form>
          </div>
          <!--<a class="busca-link" href="#"><i class="fa fa-search"></i> Busca</a>
          <form class="navbar-search pull-right hide" id="searchbox_002900072100095058217:mp7ncjp0apo" action="<?php echo home_url( '/' ); ?>" role="search">
            <input type="hidden" name="cx" value="002900072100095058217:mp7ncjp0apo">
            <input type="hidden" name="cof" value="FORID:10">
            <input type="hidden" name="ie" value="UTF-8">
            <i class="icon-search"></i>
            <input type="text" class="search-query" name="s" placeholder="Escribe aquí el término de búsqueda">
            <a href="#" id="x-search" class="x-search">✕</a>
          </form>-->
        </li>

        <li>
          <a id="nav-expander" class="nav-expander">
            MENU &nbsp;<i class="fa fa-bars fa-lg white"></i>
          </a>
        </li>
        <!--<li id="nav_boletin" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="drop_boletin"><i class="fa fa-envelope"></i></a>
          <div id="menu_boletin" class="dropdown-menu" role="menu" aria-labelledby="drop_boletin">
            <form class="nav-boletin" id="nav-boletin" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=boletingestiopolis', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" role="form" aria-labelledby="nav-boletin">
              <input type="email" placeholder="Ingresa tu email" class="inp-ema" name="email" required>
              <input type="hidden" value="boletingestiopolis" name="uri">
              <input type="hidden" name="loc" value="es_ES">
              <input type="submit" value="Suscríbete" title="Suscríbete al boletín" class="btn btn-block btn-green">
            </form>
            <p>Únete a más de 1.2 millones de personas que reciben el <a href="#">boletín gestiopolis</a></p>
          </div>
        </li>
        <li id="nav_facebook" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="drop_facebook"><i class="fa fa-facebook"></i></a>
          <div id="menu_facebook" class="dropdown-menu" role="menu" aria-labelledby="drop_facebook">
            <div class="fb-like" data-href="http://www.gestiopolis.com/" data-send="false" data-layout="button_count" data-width="116" data-show-faces="false" data-colorscheme="dark"></div>
          </div>
        </li>
        <li id="nav_twitter" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="drop_twitter"><i class="fa fa-twitter"></i></a>
          <div id="menu_twitter" class="dropdown-menu" role="menu" aria-labelledby="drop_twitter">
            <a href="https://twitter.com/gestiopoliscom" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @gestiopoliscom</a>
            <div id="tw_follow"></div>
          </div>
        </li>
        <li id="nav_google" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="drop_google"><i class="fa fa-google-plus"></i></a>
          <div id="menu_google" class="dropdown-menu" role="menu" aria-labelledby="drop_google">
            <div class="g-plus" data-width="160" data-href="//plus.google.com/+gestiopolis" data-rel="publisher" data-theme="dark"></div>
          </div>
        </li>-->
        <?php if (!is_user_logged_in()) { ?>
        <!--<li id="nav_ingresa" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="drop_ingresa"><i class="fa fa-user"></i> Ingresa <i class="fa fa-sort-desc"></i></a>
          <div id="menu_ingresa" class="dropdown-menu" role="menu" aria-labelledby="drop_ingresa">
            <form class="nav-loginform" id="nav-loginform" action="<?php echo site_url('wp-login.php', 'login_post'); ?>" method="post" role="form" aria-labelledby="nav-loginform">
              <input type="text" name="log" id="user_login" class="input" value="" placeholder="Nombre de usuario o Email" required>
              <input type="password" name="pwd" id="user_pass" class="input" value="" placeholder="Contraseña" required>
              <input type="hidden" name="redirect_to" value="<?php echo esc_url( $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ); ?>" />
              <input type="hidden" name="testcookie" value="1" />
              <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-block btn-green" value="Ingresa" >
              <p>¿Aun sin cuenta? <a rel="nofollow" href="<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>">Regístrate</a></p>
            </form>
            <p>Accede con tu cuenta de:</p>
            <a href="#" class="login-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="login-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="login-google"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="login-linkedin"><i class="fa fa-linkedin"></i></a>
          </div>
        </li>-->
        <?php } else { 
          global $current_user;
          get_currentuserinfo();
          $servidor = $_SERVER['HTTP_HOST'] == 'localhost' ? 'Gestiopolis/' : '';
          $link = esc_url( $_SERVER['HTTP_HOST']).'/'.$servidor.'wp-login.php?action=logout&redirect_to='.esc_url( $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ); ?>
        <!--<li id="nav_loggedin" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="drop_loggedin">
            <?php echo get_avatar( $current_user->ID, 32, esc_url(get_template_directory_uri() . '/assets/img/user_default.png'), 'Avatar' ); ?>  <?php echo $current_user->display_name;?>
          </a>
          <span><a href="#" class="notifications">12</a></span>
          <ul id="menu_loggedin" class="dropdown-menu" role="menu" aria-labelledby="drop_loggedin">
            <li><a href="<?php echo get_author_posts_url($current_user->ID);?>"><i class="fa fa-file-o"></i> Publicaciones (12)</a></li>
            <li><a href="#"><i class="fa fa-backward"></i> Seguidores (16)</a></li>
            <li><a href="#"><i class="fa fa-forward"></i> Siguiendo (5)</a></li>
            <li><a href="#"><i class="fa fa-heart"></i> Favoritos (33)</a></li>
            <li><a href="#"><i class="fa fa-bolt"></i> Para ti</a></li>
            <li><a href="<?php echo get_author_posts_url($current_user->ID);?>"><i class="fa fa-pencil-square-o"></i> Edita tu perfil</a></li>
            <li><a href="<?php echo wp_nonce_url($link, 'log-out')?>"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
          </ul>
        </li>-->
        <?php } ?>
      </ul>
    </nav>
  </div>
</header>
