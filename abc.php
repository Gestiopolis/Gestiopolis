<?php
/*
Template Name: ABC Temático
*/
?>
<div class="container cm8">
  <div class="row rm8 title-abc">
    <div class="col-sm-10">
      <div class="title-arch"><h3>ABC Temático</h3></div>
    </div><!-- .col-sm-8 -->
    <!--<div class="col-sm-1 col-sm-offset-1">
      <div class="btns-orden btn-toolbar">
        <div id="OrdenEjes" class="btn-group">
          <a href="#" class="btn btn-unete">Únete</a>
        </div>
      </div>
    </div>--><!-- .col-sm-12 -->
  </div><!-- .row -->
  <div class="row rm8 abc-grid">
    <div class="col-sm-36">
      <ul id="og-grid" class="row rm8 og-grid" rel="abcg">
        <?php
        $args = array(
          'orderby' => 'name',
          'parent' => 0,
          'exclude'=> '1,2,97,105,106'
          );
        $categories = get_categories( $args );
        foreach ( $categories as $category ) { 
          $args = array('categories' => $category->term_id);
          $tags = get_category_tags($args);
        ?>
        <li class="col-sm-12">
          <a href="<?php echo get_category_link( $category->term_id ); ?>" class="cat-bg-<?php echo $category->term_id; ?>">
            <span class="eje-meta"><span><?php echo count($tags); ?></span> temas</span>
            <i class="fa icon-cat-<?php echo $category->term_id; ?>"></i>
            <span class="eje-nombre"><?php echo $category->name; ?></span>
            <br class="clearfix">
            <span class="eje-tagline"><?php echo $category->description; ?></span>
          </a>
        </li><!-- .col-sm-12 -->
        <?php } ?>
        <li class="col-sm-12">
          <a href="#" class="cat-bg-0">
            <span class="eje-meta"><span><?php echo wp_count_terms('post_tag'); ?></span> temas</span>
            <i class="fa icon-cat-0"></i>
            <span class="eje-nombre">Todo</span>
          </a>
        </li><!-- .span3 -->
      </ul><!-- .row -->
    </div><!-- .span12 -->
  </div>

</div><!-- .container PRINCIPAL -->