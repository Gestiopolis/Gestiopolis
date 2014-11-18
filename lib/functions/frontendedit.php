<?php 
$servidor = $_SERVER['HTTP_HOST'] == 'localhost' ? 'blog23/' : '';
include_once($_SERVER['DOCUMENT_ROOT'].'/'.$servidor.'wp-load.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/'.$servidor. 'wp-admin/includes/image.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/'.$servidor. 'wp-admin/includes/file.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/'.$servidor. 'wp-admin/includes/media.php');

$type_edit = ( isset($_POST['type']) && (string)$_POST['type'] ) ? $_POST['type'] : false;
$post_ID = ( isset($_POST['postid']) && (int)$_POST['postid'] ) ? $_POST['postid'] : false;
if($type_edit && $post_ID){
	switch ($type_edit) {
		case 'slugedit':
			$new_Slug = ( isset($_POST['newslug']) && (string)$_POST['newslug'] ) ? $_POST['newslug'] : false;
			if($new_Slug){
				$new_Slug = sanitize_title($new_Slug);
				$post = array();
				$post['ID'] = $post_ID;
				$post['post_name'] = $new_Slug;
				wp_update_post( $post );
				wp_redirect( get_permalink( $post_ID ) ); exit;
			}
			break;
		
		case 'imageedit':
			$flickrurl = ( isset($_POST['flickrurl']) && (string)$_POST['flickrurl'] ) ? $_POST['flickrurl'] : false;
			if($flickrurl){
				flickr_image_attach ($flickrurl, $post_ID);

			}
			break;
		case 'deletepost':
			wp_delete_post($post_ID);
			wp_redirect( home_url('/') ); exit;
			break;
		case 'imagemargin':
			$immargin = ( isset($_POST['immargin']) && (int)$_POST['immargin'] ) ? $_POST['immargin'] : false;
			if($immargin){
				update_post_meta($post_ID, 'image_margin_top', $immargin);
			}
			break;
		case 'deleteimage':
			$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
			wp_delete_attachment( $post_thumbnail_id, true );
			delete_post_meta($post_ID, 'image_url_value');
			delete_post_meta($post_ID, 'image_author_t_value');
			delete_post_meta($post_ID, 'image_value');
			delete_post_thumbnail( $post_ID );
			delete_post_meta($post_ID, 'Thumbnail');
			delete_post_meta($post_ID, 'image_margin_top');
			break;
		case 'deletepdf':
			$attachment_id = get_post_meta($post_ID, "all2html_id", true);
			$pdf_path = get_post_meta($post_ID, "all2html_path", true);
			wp_delete_attachment( $attachment_id, true );
			if(get_post_meta($post_ID, "all2html_id_pdf", true) != ''){
				$attachment_id_pdf = get_post_meta($post_ID, "all2html_id_pdf", true);
				wp_delete_attachment( $attachment_id_pdf, true );
			}
			delTree($pdf_path);
			delete_post_meta($post_ID, 'all2html_docu');
			delete_post_meta($post_ID, 'all2html_pdf');
			delete_post_meta($post_ID, 'all2html_id');
			delete_post_meta($post_ID, 'all2html_id_pdf');
			delete_post_meta($post_ID, 'all2html_ext');
			delete_post_meta($post_ID, 'all2html_path');
			delete_post_meta($post_ID, 'all2html_php');
      delete_post_meta($post_ID, 'all2html_html');
      delete_post_meta($post_ID, 'all2html_css');
      delete_post_meta($post_ID, 'all2html_fullhtml');
      delete_post_meta($post_ID, 'all2html_excerpt');
      delete_post_meta($post_ID, 'output_convpdf');
      delete_post_meta($post_ID, 'output_copiar');
      delete_post_meta($post_ID, 'output_pdf2html');
      delete_post_meta($post_ID, 'output_php');
      delete_post_meta($post_ID, 'output_full');
      delete_post_meta($post_ID, 'all2html_ok');
      delete_post_meta($post_ID, 'all2html_upf');
      delete_post_meta($post_ID, 'all2html_arch');
      delete_post_meta($post_ID, 'all2html_pdfpath');
      delete_post_meta($post_ID, 'all2html_pdfoptpath');
      delete_post_meta($post_ID, 'output_optpdf');
      delete_post_meta($post_ID, 'all2html_htmlcontent');
      delete_post_meta($post_ID, 'all2html_hash');
      delete_post_meta($post_ID, 'all2html_zip');
      delete_post_meta($post_ID, 'all2html_outzip');
      delete_post_meta($post_ID, 'all2html_postID');
    break;				
	}
	if ( function_exists('w3tc_pgcache_flush_post') ) {
		w3tc_pgcache_flush_post( $post_ID );
	}
}else{
	echo 'No deber&iacute;as estar aqu&iacute;';
}

//Funciones para migrar imagen de Flickr a WordPress
function flickr_image_attach ($flickrurl, $post_id){
	preg_match('/http\:\/\/www\.flickr\.com\/photos\/(.*?)\/([0-9]+)\//si', $flickrurl, $m);
	if($m){
		$flickruser = $m[1];
		$photo_id = $m[2];
	}else{
		return;
	}
	//$flickruser = getFlickrUser($photo_id);
	$file = getFlickrURL($photo_id);
	if ( ! empty($file) ) {
		// Download file to temp location
		$tmp = download_url( $file );

		// Set variables for storage
		// fix file filename for query strings
		preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
		$file_array['name'] = basename($matches[0]);
		$file_array['tmp_name'] = $tmp;

		// If error storing temporarily, unlink
		if ( is_wp_error( $tmp ) ) {
			@unlink($file_array['tmp_name']);
			$file_array['tmp_name'] = '';
		}

		// do the validation and storage stuff
		$id = media_handle_sideload( $file_array, $post_id, $desc=null );
		// If error storing permanently, unlink
		if ( is_wp_error($id) ) {
			@unlink($file_array['tmp_name']);
			return $id;
		}

		$src = wp_get_attachment_url( $id );
	}
	if (!empty($src)){
		update_post_meta($post_id, 'image_url_value', $flickrurl);
		update_post_meta($post_id, 'image_author_t_value', $flickruser);
		update_post_meta($post_id, 'image_value', $src);
		set_post_thumbnail( $post_id, $id );
		return update_post_meta($post_id, 'Thumbnail', $src);
	}
else return false;
}

function getFlickrUser($photo_id) {
	//$content = file_get_contents("http://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=ffdc73baf6e955d9048ecc77ebd6b2c7&photo_id=".$photo_id);
	$ch = curl_init("https://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=ffdc73baf6e955d9048ecc77ebd6b2c7&photo_id=".$photo_id);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$content = curl_exec($ch);
	curl_close($ch);
	$rsp = new SimpleXmlElement($content);
	$flickrusername = $rsp->photo->owner['path_alias'];
	if($flickrusername){
		return $flickrusername;}
	else{
		return '';
	}
}
function getFlickrURL($photo_id) {
	//$content = file_get_contents("http://api.flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=ffdc73baf6e955d9048ecc77ebd6b2c7&photo_id=".$photo_id);
	$ch = curl_init("https://api.flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=ffdc73baf6e955d9048ecc77ebd6b2c7&photo_id=".$photo_id);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$content = curl_exec($ch);
	curl_close($ch);
	//$xml = simplexml_load_string($xml_raw)
	$rsp = new SimpleXmlElement($content);
	$number = count($rsp->sizes->size);
	for ($i=0; $i<$number; $i++){
		if($rsp->sizes->size[$i]['width'] == 1024)
			return $rsp->sizes->size[$i]['source'];
	}
}
function externimg_getext ($file) {
	if (function_exists('mime_content_type'))
	$mime = mime_content_type($file);
	else return '';
	switch($mime) {
		case 'image/jpg':
		case 'image/jpeg':
			return '.jpg';
			break;
		case 'image/gif':
			return '.gif';
			break;
		case 'image/png':
			return '.png';
			break;
	}
	return '';
}

function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    } 
    return rmdir($dir); 
  }
?>