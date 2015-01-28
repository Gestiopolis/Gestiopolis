<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-right offcanvas">
  <ul class="nav navmenu-nav">
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
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Autores y Temas</a>
      <ul id="explora_autores" class="dropdown-menu navmenu-nav">
        <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/autores-destacados-explora.png'); ?>" width="28" height="28" alt="Autores destacados"/>&nbsp;&nbsp;Autores destacados</a></li>
        <li><a href="#"><i class="fa fa-tags"></i>&nbsp;&nbsp;Temas tendencia</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Más&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
      <ul id="explora_mas" class="dropdown-menu navmenu-nav">
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
        </li>

        <li>
          <a id="nav-expander" class="nav-expander navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
            MENU &nbsp;<i class="fa fa-bars fa-lg white"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>
