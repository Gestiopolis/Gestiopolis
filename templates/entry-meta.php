<div class="entry-meta">
	<time class="updated" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<p class="byline author vcard"><?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
<p>Categorías: <?php the_category(', '); ?></p>
<p>Etiquetas: <?php the_tags('<ul class="etiquetas"><li>','</li><li>','</li></ul>'); ?></p>
<p><span class="comments_number">Comentarios (<?php comments_number('0','1','%'); ?>)</span> - Visitas (<?php if(function_exists('the_views')) { the_views(); } ?>)</p>
<?php if (get_post_meta($post->ID, "downloads_value", $single = true) != "") { ?>
<p class="spot left" style="width:200px; margin: 0 10px 10px 0; display:inline-block;"><a rel="nofollow" href="<?php echo get_post_meta($post->ID, "downloads_value", $single = true); ?>" class="descargas">Descargar archivo</a></p>
<?php } ?>
</div>
