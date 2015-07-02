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
		case 'deletepost':
			wp_delete_post($post_ID);
			wp_redirect( home_url('/') ); exit;
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
}else{
	echo 'No deber&iacute;as estar aqu&iacute;';
}
function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    } 
    return rmdir($dir); 
  }
?>