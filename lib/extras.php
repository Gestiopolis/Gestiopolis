<?php

//Limitar tags mostradas a 5
add_filter('term_links-post_tag','limitar_tags');
function limitar_tags($terms) {
return array_slice($terms,0,3,true);
}

/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');
/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }
  $title .= get_bloginfo('name');
  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);
//Recortar extracto
add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return 70; }
//Cambiar dirección de logo de Login y título
function change_wp_login_url() { return bloginfo('url');}
add_filter('login_headerurl', 'change_wp_login_url');
function change_wp_login_title() { return get_option('blogname');}
add_filter('login_headertext', 'change_wp_login_title');
// Añade nuevo caracteres para limpiar nombres de arhcivos
function my_sanitize_chars($chars){
  $chars[] = '%';
  return $chars;
}
add_filter('sanitize_file_name_chars', 'my_sanitize_chars');
//Ofuscar Email
function hideEmail($mail){
	$mail = strrev($mail);
	return "<span style=\"direction:rtl; unicode-bidi:bidi-override;\">".$mail."</span>";
}
//Recortar textos largos
function title_trim($max_length, $title){
	//Make sure that we are not making it longer with that ellipse
	if((mb_strlen($title) + 3) > $max_length){
		//Trim the title
		$title = mb_substr($title, 0, $max_length - 1);
		//Make sure we can split at a space, but we want to limmit to cutting at max an additional 25%
		if(mb_strpos($title, ' ', .75 * $max_length) > 0)
		{
			//Don't split mid word
			while(mb_substr($title,-1) != ' ')
			{
				$title = mb_substr($title, 0, -1);
			}
		}
		//Remove the whitespace at the end and add the hellip
		return $title = rtrim($title) . '&hellip;';
	} else if((mb_strlen($title) + 3) <= $max_length) {
		return $title;
	}
}
/****************
Mostrar los artículos más populares por comentarios, votos y visitas
Se necesita tener instalado el plugin I Like This
https://github.com/cabrerahector/wordpress-popular-posts/wiki/3.-Filters
https://wordpress.org/plugins/wordpress-popular-posts/installation/
****************/
function trending_posts($numberOf, $before, $after, $days) {
	global $wpdb;
    $request = "SELECT ID, post_title, votos.meta_value,views.meta_value, comment_count FROM $wpdb->posts posts INNER JOIN $wpdb->postmeta votos ON (posts.ID = votos.post_id)
INNER JOIN $wpdb->postmeta views ON (posts.ID = views.post_id)
WHERE posts.post_type='post' AND post_date > '" . date('Y-m-d', strtotime('-'.$days.' days')) . "' AND posts.post_status='publish' AND votos.meta_key='_liked' AND views.meta_key='views' ORDER BY views.meta_value+0 DESC, votos.meta_value+0 DESC, posts.comment_count DESC LIMIT $numberOf";
    $posts = $wpdb->get_results($request);
    foreach ($posts as $post) {
    	$post_title = stripslashes($post->post_title);
    	$permalink = get_permalink($post->ID); ?>
    	    	<?php echo $before;?><?php get_the_image( array('post_id' => $post->ID, 'size' => 'trending-posts', 'width' => '50', 'height' => '43', 'default_image' => get_bloginfo('template_directory').'/images/thumbnail.png' ) ); ?><p class="desthheight"><a href="<?php echo $permalink; ?>" title="<?php echo $post_title ?>" rel="nofollow"><?php echo title_trim(70, $post_title);?></a></p>
	<?php 	echo $after;
    }
}
/****************
Mostrar los artículos más populares por comentarios, votos y visitas
Se necesita tener instalado el plugin I Like This
****************/
function get_trending_posts($numberOf, $days, $catid = '') {
	/*global $wpdb;
    //$request = "SELECT ID, post_title, post_content, post_author, votos.meta_value AS likes,views.meta_value AS vistas, comment_count FROM $wpdb->posts posts INNER JOIN $wpdb->postmeta votos ON (posts.ID = votos.post_id) INNER JOIN $wpdb->postmeta views ON (posts.ID = views.post_id)";
    $request = "SELECT ID, post_title, post_content, post_author, votos.meta_value AS likes FROM $wpdb->posts posts INNER JOIN $wpdb->postmeta votos ON (posts.ID = votos.post_id)";
	if($catid != ''){
		$request .= " INNER JOIN $wpdb->term_relationships term ON (posts.ID = term.object_id)";
	}
	//$request .= " WHERE posts.post_type='post' AND post_date > '" . date('Y-m-d', strtotime('-'.$days.' days')) . "' AND posts.post_status='publish' AND votos.meta_key='_liked' AND views.meta_key='views'";
	$request .= " WHERE posts.post_type='post' AND posts.post_status='publish' AND views.meta_key='_liked'";
	if($catid != ''){
	$request .= " AND term.term_taxonomy_id=$catid";
	}
	//$request .= " ORDER BY votos.meta_value+0 DESC, views.meta_value+0 DESC, posts.comment_count DESC LIMIT $numberOf";
	$request .= " ORDER BY votos.meta_value+0 DESC, posts.comment_count DESC LIMIT $numberOf";
    //$posts = $wpdb->get_results($request);
    //return $posts;*/
    $args = array();
	if($catid != ''){
		$args = array(
			'posts_per_page'   => $numberOf,
			'category'         => $catid,
			'orderby'          => 'rand',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
	} else {
		$args = array(
			'posts_per_page'   => $numberOf,
			'orderby'          => 'rand',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
	} 
	 return get_posts( $args );
}
/****************
Mostrar los autores con más artículos y más visitas a sus artículos
****************/
function get_trending_authors($numberOf, $days, $catid = '') {
	global $wpdb;
    $request = "SELECT DISTINCT post_author, COUNT(ID) AS count FROM wp_posts posts";
	if($catid != ''){
		$request .= " INNER JOIN $wpdb->term_relationships term ON (posts.ID = term.object_id)";
	}
	$request .= " WHERE posts.post_type = 'post' AND posts.post_date > '" . date('Y-m-d', strtotime('-'.$days.' days')) . "' AND posts.post_status='publish'";
	if($catid != ''){
		$request .= " AND term.term_taxonomy_id=$catid";
	}
	$request .= " GROUP BY posts.post_author ORDER BY count DESC LIMIT $numberOf";
    $posts = $wpdb->get_results($request);
    return $posts;
}
/*Función que trae las etiquetas más vistas de determinada categoría*/
function popular_tags_from_category($catid, $days, $limit=15){
	global $wpdb;
	$now = gmdate("Y-m-d H:i:s",time());
	//$datelimit = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m"),date("d")-30,date("Y")));
	$current_time = current_time( 'timestamp', 0 );
	$from_date = $current_time - ( max( 0, ($days - 1) ) * DAY_IN_SECONDS );
	$from_date = gmdate( 'Y-m-d 0' , $from_date);
	//$table_name = $wpdb->base_prefix . "top_ten_daily";
	//$where = " AND dp_date >= '$from_date' ";
	$popterms = "SELECT DISTINCT terms2.*, t2.count as count FROM $wpdb->posts as p1 LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id LEFT JOIN {$wpdb->postmeta} as meta1 ON (p1.ID = meta1.post_id), $wpdb->posts as p2 LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id 	LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id 	LEFT JOIN {$wpdb->postmeta} as meta2 ON (p2.ID = meta2.post_id) WHERE t1.taxonomy = 'category' AND p1.post_status = 'publish' AND p1.post_date >= '$from_date' AND meta1.meta_key='_liked' AND terms1.term_id = '$catid' AND t2.taxonomy = 'post_tag' AND p2.post_status = 'publish' AND p2.post_date >= '$from_date' AND meta2.meta_key='_liked' AND p1.ID = p2.ID ORDER BY count DESC, meta1.meta_value+0 DESC LIMIT $limit";
	$terms = $wpdb->get_results($popterms);
	if($terms){
		$args = array(
		'smallest'  => 18,
		'largest'   => 18,
		'unit'      => 'px',
		'number'    => $limit,
		'format'    => 'flat',
		'separator' => "\n",
		'orderby'   => 'name',
		'order'     => 'ASC',
		'link' => 'view',
		'taxonomy' => 'post_tag',
		'echo' => true );
	// Create links
	foreach ( $terms as $key => $tag ) {
		if ( 'edit' == $args['link'] )
			$link = get_edit_tag_link( $tag->term_id, $args['taxonomy'] );
		else
			$link = get_term_link( intval($tag->term_id), $args['taxonomy'] );
		if ( is_wp_error( $link ) )
			return false;
		$tag_link = '#' != $tag->link ? esc_url( $link ) : '#';
		$tag_id = isset($tag->term_id) ? $tag->term_id : $key;
		$tag_name = $terms[ $key ]->name;
		echo "<a href='$tag_link' class='tag-link-$tag_id' title='" . esc_attr( $tag->count ) . " posts'>$tag_name</a>";
	}	
		//echo wp_generate_tag_cloud( $terms, $args );
	}
}
/*Función que trae las etiquetas más vistas de determinada categoría*/
function trending_tags($limit=10, $days ){
	global $wpdb;
	$now = gmdate("Y-m-d H:i:s",time());
	//$datelimit = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m"),date("d")-30,date("Y")));
	$current_time = current_time( 'timestamp', 0 );
	$from_date = $current_time - ( max( 0, ($days - 1) ) * DAY_IN_SECONDS );
	$from_date = gmdate( 'Y-m-d 0' , $from_date);
	//$table_name = $wpdb->base_prefix . "top_ten_daily";
	$where = " AND dp_date >= '$from_date' ";
	$popterms = "SELECT DISTINCT terms2.*, t2.count as count FROM $wpdb->posts as p2 LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id 	LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id LEFT JOIN {$wpdb->postmeta} as meta2 ON (p2.ID = meta2.post_id) WHERE t2.taxonomy = 'post_tag' AND p2.post_status = 'publish' AND p2.post_date >= '$from_date' AND meta2.meta_key='_liked' ORDER BY count DESC, meta2.meta_value+0 DESC LIMIT $limit";
	$terms = $wpdb->get_results($popterms);
	return $terms;
}
/*Función que trae las etiquetas por letra*/
function old_style_name_like_wpse_123298($clauses) {
  remove_filter('term_clauses','old_style_name_like_wpse_123298');
  $pattern = '|(name LIKE )\'%(.+%)\'|';
  $clauses['where'] = preg_replace($pattern,'$1 \'$2\'',$clauses['where']);
  return $clauses;
}
add_filter('terms_clauses','old_style_name_like_wpse_123298');
function tags_by_letter($letter, $letterM){
	$tagsm = get_tags(array('name__like' => $letter) );
	//$tagsM = get_tags(array('name__like' => $letterM) );
	//$tags = array_merge($tagsm, $tagsM);
	return $tagsm;
}
//Obtener fecha actual en español
function actual_date(){
	$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	 
	echo date('j')." de ".$meses[date('n')-1]. " de ".date('Y');
}
function count_posts($type, $year, $month, $catid=0) {
	global $wpdb;
	switch ($type) {
		case 'catsarchive':
			$query = "SELECT count(ID) AS posts FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id INNER JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id INNER JOIN $wpdb->terms ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id WHERE $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish' AND $wpdb->terms.term_id = $catid AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->posts.post_date >= '$year-$month-01' AND $wpdb->posts.post_date <= '$year-$month-31' ORDER BY post_date ASC";
			$result = $wpdb->get_var( $query );
			return $result;
		break;
		case 'cats':
			$year1= date('Y');
			$month1= date('m');
			$day1= date('d');
			$query = "SELECT count(ID) AS posts FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id INNER JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id INNER JOIN $wpdb->terms ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id WHERE $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish' AND $wpdb->terms.term_id = $catid AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->posts.post_date >= '2000-01-01' AND $wpdb->posts.post_date <= '$year1-$month1-$day1' ORDER BY post_date ASC";
			$result = $wpdb->get_var( $query );
			return $result;
		break;
		case 'allarchive':
			$query = "SELECT count(ID) AS posts FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_date >= '$year-$month-01' AND post_date <= '$year-$month-31' ORDER BY post_date ASC";
			$result = $wpdb->get_var( $query );
			return $result;
		break;
		
		default:
			# code...
			break;
	}
}
//Número de autores por categoría
function autcat($catid) {
	global $wpdb;
	echo $wpdb->get_var("SELECT COUNT(DISTINCT post_author) AS count FROM $wpdb->posts posts INNER JOIN $wpdb->term_relationships term ON (posts.ID = term.object_id) WHERE posts.post_type = 'post' AND term.term_taxonomy_id= '$catid' AND posts.post_status='publish'");
}
//Obtener tags de una categoría específica
function get_category_tags($args) {
	global $wpdb;
	$tags = $wpdb->get_results
	("
		SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name, null as tag_link
		FROM
			$wpdb->posts as p1
			LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID
			LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
			LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id,
			$wpdb->posts as p2
			LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID
			LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
			LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id
		WHERE
			t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id = '".$args['categories']."' AND
			t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
			AND p1.ID = p2.ID
		ORDER by tag_name
	");
	$count = 0;
	foreach ($tags as $tag) {
		$tags[$count]->tag_link = get_tag_link($tag->tag_id);
		$count++;
	}
	return $tags;
}
//Tiempo estimado de lectura
function estimate_time() {
	global $post;
	$result = "";
	$wpm = 250; //Palabras por minuto
	$content = '';
	if (get_post_meta($post->ID, "all2html_htmlcontent", true) != "") {
		$servidor = $_SERVER['HTTP_HOST'] == 'localhost' ? '/Gestiopolis' : '';
    $html_plain = file_get_contents($_SERVER['DOCUMENT_ROOT'].$servidor.get_post_meta($post->ID, "all2html_htmlcontent", true));
    $content = strip_tags($html_plain);
    $wpm = 180;
	}else {
		$content = strip_tags($post->post_content);
	}
	
	$content_words = str_word_count($content);
	$estimated_minutes = floor($content_words / $wpm);
	if ($estimated_minutes < 1) {
		$result = "1 minuto";
	}
	else if ($estimated_minutes > 60) {
		if ($estimated_minutes > 1440){
			$result = "más de un día";
		}
		else {
			$result = (floor($estimated_minutes / 60) == 1) ?  floor($estimated_minutes / 60) . " hora" : floor($estimated_minutes / 60) . " horas";
		}
	}
	else if ($estimated_minutes == 1) {
		$result = $estimated_minutes . " minuto";
	}
	else {
		$result = $estimated_minutes . " minutos";
	}
	return $result;
}
//Arreglar tamaño del elemento figure
add_filter('img_caption_shortcode','fix_img_caption_shortcode_inline_style',10,3);
function fix_img_caption_shortcode_inline_style($output,$attr,$content) {
	$atts = shortcode_atts( array(
		'id'	  => '',
		'align'	  => 'alignnone',
		'width'	  => '',
		'caption' => '',
		'class'   => '',
	), $attr, 'caption' );
	$atts['width'] = (int) $atts['width'];
	if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
		return $content;
	if ( ! empty( $atts['id'] ) )
		$atts['id'] = 'id="' . esc_attr( $atts['id'] ) . '" ';
	$class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );
	if ( current_theme_supports( 'html5', 'caption' ) ) {
		return '<figure ' . $atts['id'] . ' class="' . esc_attr( $class ) . '">'
		. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
	}
	$caption_width = 10 + $atts['width'];
	$caption_width = apply_filters( 'img_caption_shortcode_width', $caption_width, $atts, $content );
	$style = '';
	return '<div ' . $atts['id'] . $style . 'class="' . esc_attr( $class ) . '">'
		. do_shortcode( $content ) . '<p class="wp-caption-text">' . $atts['caption'] . '</p></div>';
}
function get_author_color_id($author_id=0){
	global $post;
	$firstletter = '';
	if($author_id == 0){
		$firstletter = mb_substr(get_the_author(), 0, 1);
	}else{
		$firstletter = mb_substr(get_the_author_meta('display_name', $author_id), 0, 1);
	}
	if ($firstletter == 'ñ' || $firstletter == 'Ñ' || $firstletter == 'á' || $firstletter == 'Á' || $firstletter == 'é' || $firstletter == 'É' || $firstletter == 'í' || $firstletter == 'Í' || $firstletter == 'ó' || $firstletter == 'Ó' || $firstletter == 'ú' || $firstletter == 'Á'){
		return '<span class="author-color author-color-nn">'.$firstletter.'</span>';
	} else {
		return '<span class="author-color author-color-'.strtolower($firstletter).'">'.strtoupper($firstletter).'</span>';
	}
}
//Función de related posts by tags and categories
//http://www.cssigniter.com/ignite/programmatically-get-related-wordpress-posts-easily/
function ci_get_related_posts_1( $post_id, $related_count, $args = array() ) {
  $args = wp_parse_args( (array) $args, array(
    'orderby' => 'rand',
    'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
  ) );
  $post       = get_post( $post_id );
  $taxonomies = get_object_taxonomies( $post, 'names' );
  $related_args = array(
    'post_type'      => get_post_type( $post_id ),
    'posts_per_page' => $related_count,
    'post_status'    => 'publish',
    'post__not_in'   => array( $post_id ),
    'orderby'        => 'relevance',
    's'							 => $post->post_title,
    //'cache_results'  => true,
    'tax_query'      => array()
  );
  foreach( $taxonomies as $taxonomy ) {
    $terms = get_the_terms( $post_id, $taxonomy );
    if ( empty( $terms ) ) continue;
    $term_list = wp_list_pluck( $terms, 'slug' );
    $related_args['tax_query'][] = array(
        'taxonomy' => $taxonomy,
        'field'    => 'slug',
        'terms'    => $term_list
    );
  }
  if( count( $related_args['tax_query'] ) > 1 ) {
    $related_args['tax_query']['relation'] = 'AND';
  }
  if( $args['return'] == 'query' ) {
  	return new WP_Query( $related_args );
  } else {
    return $related_args;
  }
}
function ci_get_related_posts_2( $post_id, $postsnot, $related_count, $paged, $args = array() ) {
  $args = wp_parse_args( (array) $args, array(
    'orderby' => 'rand',
    'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
  ) );
  $post       = get_post( $post_id );
  $taxonomies = get_object_taxonomies( $post, 'names' );
  $related_args = array(
    'post_type'      => get_post_type( $post_id ),
    'posts_per_page' => $related_count,
    'post_status'    => 'publish',
    'post__not_in'   => $postsnot,
    'orderby'        => $args['orderby'],
    'paged'					 => $paged,
    'tax_query'      => array()
  );
  foreach( $taxonomies as $taxonomy ) {
    $terms = get_the_terms( $post_id, $taxonomy );
    if ( empty( $terms ) ) continue;
    $term_list = wp_list_pluck( $terms, 'slug' );
    $related_args['tax_query'][] = array(
        'taxonomy' => $taxonomy,
        'field'    => 'slug',
        'terms'    => $term_list
    );
  }
  if( count( $related_args['tax_query'] ) > 1 ) {
    $related_args['tax_query']['relation'] = 'AND';
  }
  if( $args['return'] == 'query' ) {
  	return new WP_Query( $related_args );
  } else {
    return $related_args;
  }
}
function footer_lazyload() {
	if(is_single()){
    echo '
	<script type="text/javascript">
	    (function($){
	      $(".single img.lazy").show().lazyload({
				  effect : "fadeIn",
				  failure_limit : 40
				});
	    })(jQuery);
	</script>
	';
	}
}
add_action('wp_footer', 'footer_lazyload', 100);
function head_meta_schema() {
	if(is_single()) {
		global $post;
		echo '
	    <meta itemprop="dateModified" content="'.get_the_modified_time('c').'"/>
	    <meta itemprop="datePublished" content="'.get_the_time('c').'"/>
			';
	}
}
add_action('wp_head', 'head_meta_schema', 1);


// function filter_lazyload($content) {
//     return preg_replace_callback('/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'preg_lazyload', $content);
// }
// add_filter('the_content', 'filter_lazyload');
// function preg_lazyload($img_match) {
 
//   $img_replace = $img_match[1] . 'src="' . get_stylesheet_directory_uri() . '/assets/img/grey.gif" data-original' . substr($img_match[2], 3) . $img_match[3];
//   $img_replace = preg_replace('/class\s*=\s*"/i', 'class="lazy ', $img_replace);
//   $img_replace .= '<noscript>' . $img_match[0] . '</noscript>';
//   return $img_replace;
// }

function month_name($month) {
 
  switch ($month) {
  	case '1':
  		return 'Enero';
  		break;
  	case '2':
  		return 'Febrero';
  		break;
  	case '3':
  		return 'Marzo';
  		break;
  	case '4':
  		return 'Abril';
  		break;
  	case '5':
  		return 'Mayo';
  		break;
  	case '6':
  		return 'Junio';
  		break;
  	case '7':
  		return 'Julio';
  		break;
  	case '8':
  		return 'Agosto';
  		break;
  	case '9':
  		return 'Septiembre';
  		break;
  	case '10':
  		return 'Octubre';
  		break;
  	case '11':
  		return 'Noviembre';
  		break;
  	case '12':
  		return 'Diciembre';
  		break;										
  }
}
function custom_error_pages()
{
    global $wp_query;
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
    {
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = TRUE;
        $wp_query->is_singular = TRUE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(403);
        get_template_part('403');
        exit;
    }
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
    {
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = TRUE;
        $wp_query->is_singular = TRUE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(401);
        get_template_part('401');
        exit;
    }
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 400)
    {
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = TRUE;
        $wp_query->is_singular = TRUE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(400);
        get_template_part('400');
        exit;
    }
}
 
function custom_error_title($title='',$sep='')
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
        return "Prohibido ".$sep." ".get_bloginfo('name');
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
        return "No autorizado ".$sep." ".get_bloginfo('name');
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 400)
        return "Solicitud incorrecta ".$sep." ".get_bloginfo('name');
}
 
function custom_error_class($classes)
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
    {
        $classes[]="error403";
        return $classes;
    }
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
    {
        $classes[]="error401";
        return $classes;
    }
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 400)
    {
        $classes[]="error400";
        return $classes;
    }
}
 
add_action('wp','custom_error_pages');
//NO cargara Contact form en todas partes
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );
//Quitar Emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
//Función de Wp_Imager https://github.com/Jany-M/WP-Imager
//require_once ('functions/wp-imager.php');
//Archivos necesarios para la cabecera en la administración
require_once ('functions/admin_head.php');
//Campo personalizado de autor virtual
require_once ('functions/meta_author.php');
//Campo personalizado de Enlace Externos
require_once ('functions/meta_exlinks.php');
//Campo personalizado de Descargas
require_once ('functions/meta_downloads.php');
//Campo personalizado de Imagen Principal
require_once ('functions/meta_main_image.php');
//Funciones para los seguimiento del blog
require_once ('functions/follows.php');
//Funciones para los anuncios
require_once ('functions/ads/ads.php');
