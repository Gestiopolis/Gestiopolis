<div class="author-info pull-left">
  <?php if(get_post_meta($post->ID, "author-name_value", true) != "") : ?>
  Por: <?php echo get_author_color_id(); ?> <a href="#autores" rel="author" class="fn"><?php echo get_the_author();//echo get_post_meta($post->ID, "author-name_value", true); ?></a>
  <?php else : ?>
  Por: <?php echo get_author_color_id(); ?> <a href="#autores" rel="author" class="fn"><?php echo get_the_author(); ?></a>
  <?php endif; ?>
</div>
<ul class="list-unstyled pull-right">
  <li><?php 
  $category = get_the_category(); 
  if($category[0]){
    echo '<i class="fa icon-cat-'.$category[0]->term_id.'"></i> <a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
  }
  ?></li>
  <li><time class="updated" datetime="<?php echo get_the_time('c'); ?>"><i class="fa fa-calendar"></i> <?php echo get_the_date('d.m.Y'); ?></time></li>
  <li class="estimate-time"><i class="fa fa-clock-o"></i> <?php echo estimate_time();?> de lectura</li>
  <?php if (get_post_meta($post->ID, "image_url_value", true) != "") { ?>
  <li class="image-credit"><a href="<?php echo get_post_meta($post->ID, "image_url_value", $single = true); ?>" target="_blank"><i class="fa fa-camera"></i> <?php echo get_post_meta($post->ID, "image_author_t_value", true); ?></a></li>
  <?php } ?>
</ul>