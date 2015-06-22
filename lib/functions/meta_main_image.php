<?php

$main_image_meta = array(

	array(
		"name" => "main_image",
		"std" => "",
		"title" => "URL Original de la Imagen en Flickr: ",
		"description" => "Aqu&iacute; se pone el enlace  original de una imagen de Flickr para descargar el archivo, y asociar dicha imagen en la librería multimedia y que se ponga como imágen destacada de este artículo.Por ejemplo:<br /><code>http://www.flickr.com/photos/dannyqu/4753513735/</code>",
		"description2" => "Ingresa aqu&iacute; la URL de una imagen en Flickr. Para m&aacute;s informaci&oacute;n haz clic en \"&iquest;Qu&eacute; es esto?\""
		),
	);


function main_image_meta() {

	global $post, $main_image_meta;
	
	global $post_ID, $temp_ID;
	
	foreach($main_image_meta as $meta_box) {
		$meta_box_value = get_post_meta($post->ID, 'image_value', true);
		

			
		echo '<div class="post-meta">';
		echo '<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		echo '<h2 style="margin:5px;">'.$meta_box['title'].' &nbsp;<a href="#help-' . $meta_box['name'] . '" class="gesti-open">&iquest;Qu&eacute; es esto?</a></h2>';
		
		//cuadro de Ayuda
		echo '<div id="help-' . $meta_box['name'] . '" class="help-box">';
		echo '<p>' . $meta_box['description'] . '</p>';
		echo '<p><a href="#help-' . $meta_box['name'] . '" class="gesti-close">Cerrar</a></p>';
		echo '</div>';
		
		//Si el campo esta vacío
		if($meta_box_value == "") {
		
			echo '<p><input type="file" name="' . $meta_box['name'] . '_value" class="gesti-input" value="' . $meta_box_value . '" /></p>';
			
		}else {
			echo '<p><input type="file" name="' . $meta_box['name'] . '_value" class="gesti-input" value="' . $meta_box_value . '" /></p>';

		}
		
		echo '<p>' . $meta_box['description2'] . '</p>';
		echo '</div>';

	}
}

function create_main_image_meta() {
	global $theme_name;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'main_image-meta', 'Imagen Principal', 'main_image_meta', 'post', 'normal', 'high' );
	}
}

function save_main_image_meta( $post_id ) {
	global $post, $main_image_meta;
	
	foreach($main_image_meta as $meta_box) {
	// Verifica
		/*if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}*/
		
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ))
				return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		}
		
		//$data = $_POST['image_value'];
		$file = ( !empty($_FILES[$meta_box['name'].'_value'])) ? $_FILES[$meta_box['name'].'_value'] : false;

		if(get_post_meta($post_id, 'image_value') == "" || get_post_meta($post_id, 'image_value') != ""){
			if($file){
				$arch = pathinfo($file['name']);
        $extension = $arch['extension'];
        if($extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG' || $extension == 'png' || $extension == 'PNG'){
        	$id = media_handle_sideload( $file, $post_id, $desc=null );
        	// If error storing permanently, unlink
					if ( is_wp_error($id) ) {
						return $id;
					}

					$fullsize_path = get_attached_file( $id ); // Full path
					if (function_exists('ewww_image_optimizer')) {
						ewww_image_optimizer($fullsize_path, $gallery_type = 4, $converted = false, $new = true, $fullsize = true);
					}
					$src = wp_get_attachment_url( $id );
					if (!empty($src)){
						update_post_meta($post_id, 'image_value', $src);
						set_post_thumbnail( $post_id, $id );
						return update_post_meta($post_id, 'Thumbnail', $src);
					}
				}
			}
		}
			
		/*elseif($data != get_post_meta($post_id, 'image_value', true))
			update_post_meta($post_id, 'image_value', $data);
			
		elseif($data == "")
			delete_post_meta($post_id, 'image_value', get_post_meta($post_id, 'image_value', true));*/
	}
}

function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');

add_action('admin_menu', 'create_main_image_meta');
add_action('save_post', 'save_main_image_meta');


?>