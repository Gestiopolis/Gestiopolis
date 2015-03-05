<?php 
$servidor = $_SERVER['HTTP_HOST'] == 'localhost' ? 'Gestiopolis/' : '';
include_once($_SERVER['DOCUMENT_ROOT'].'/'.$servidor.'wp-load.php');

$linkid = ( isset($_POST['id']) && (int)$_POST['id'] ) ? $_POST['id'] : false;
$post_ID = ( isset($_POST['postid']) && (int)$_POST['postid'] ) ? $_POST['postid'] : false;
$title = ( isset($_POST['title']) && (string)$_POST['title'] ) ? $_POST['title'] : false;
$url = ( isset($_POST['url']) && (string)$_POST['url'] ) ? $_POST['url'] : false;
if($linkid && $post_ID && $title && $url){

	add_filter( 'wp_mail_content_type', 'set_html_content_type' );

	$to = 'djdiego88@gmail.com';
	$subject = 'Enlace reportado roto en GestioPolis';
	$body = '<h1>Reporte de enlace roto</h1>';
	$body .= '<p>Se ha reportado el siguiente enlace roto en el artículo: <a href="'.get_permalink( $post_ID ).'" title="'.get_the_title( $post_ID ).'">'.get_the_title( $post_ID ).'</a>:</p>';
	$body .= '<p>Título del enlace: '.$title.'</p>';
	$body .= '<p>URL del enlace: '.$url.'</p><br>';
	$body .= '<p>Gracias por su atenci&oacute;n.</p>';
	$headers = array('Content-Type: text/html; charset=UTF-8');

	$send = wp_mail( $to, $subject, $body, $headers );

	// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
	remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

	function set_html_content_type() {
		return 'text/html';
	}
	$log = ($send == true) ? "wp_mail: true\n" : "wp_mail: false\n";
	$log .= "linkid: '.$linkid.'\n";
	$log .= "pid: '.$post_ID.'\n";
	$log .= "title: '.$title.'\n";
	$log .= "url: '.$url.'\n";
	return $log;
}else{
	echo 'No deber&iacute;as estar aqu&iacute;';
}