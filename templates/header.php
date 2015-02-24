<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-right offcanvas">
  <ul class="nav navmenu-nav">
    <li><a class="home-link" href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-home"></i> Ir al inicio</a></li>
    <?php
    $args = array(
      'orderby' => 'name',
      'parent' => 0,
      'exclude'=> '1,2,97,105,106'
      );
    $categories = get_categories( $args );
    foreach ( $categories as $category ) {
      echo '<li><a class="cat-' . $category->term_id . '" href="' . get_category_link( $category->term_id ) . '"><i class="fa icon-cat-'.$category->term_id.' cat-bg-'.$category->term_id.'"></i>  ' . $category->name . '</a></li>';
    }
    ?>
    <li class="contact-link"><a href="<?php echo get_page_link(4767); ?>"><i class="fa fa-map-marker"></i> Contacto</a></li>
    <li class="dropdown more-link"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus"></i>Más&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
      <ul id="explora_mas" class="dropdown-menu navmenu-nav">
        <li><a href="<?php echo get_page_link(2); ?>">Acerca de</a></li>
        <li><a href="<?php echo get_page_link(80309); ?>">ABC temático</a></li>
        <li><a href="<?php echo get_page_link(80284); ?>">Archivo</a></li>
        <li><a href="#">Términos legales</a></li>
        <li><a href="#">Publicidad</a></li>
        <li class="copy">&copy;<?php echo date('Y'); ?> WebProfit Ltda.</li>
      </ul>
    </li>
  </ul>
</nav>
<header class="banner navbar navbar-inverse navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img width="179" height="48" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.png'); ?>" alt="<?php bloginfo('name'); ?>"></a>
    </div>

    <nav role="navigation">
      <ul class="nav navbar-nav navbar-right">
        <li id="nav_publica"><a href="<?php echo get_page_link(264); ?>"><i class="fa fa-cloud-upload"></i><span class="hidden-xs"> Publica</span></a></li>
        <li id="nav_busca">
          <div id="sb-search" class="sb-search">
            <form id="searchbox_002900072100095058217:mp7ncjp0apo" action="<?php echo home_url( '/' ); ?>" role="search">
              <input type="hidden" name="cx" value="002900072100095058217:mp7ncjp0apo">
              <input type="hidden" name="cof" value="FORID:10">
              <input type="hidden" name="ie" value="UTF-8">
              <input class="sb-search-input" placeholder="Ingresa tu búsqueda..." type="search" value="" name="s" id="search">
              <input class="sb-search-submit" type="submit" value="">
              <span class="sb-icon-search"><i class="fa fa-search"></i><span class="hidden-xs"> Busca</span></span>
            </form>
          </div>
        </li>

        <li>
          <a id="nav-expander" class="nav-expander navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
            <i class="fa fa-bars white"></i><span class="hidden-xs">&nbsp;Menú</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>
