<?php 
/*$servidor = $_SERVER['HTTP_HOST'] == 'localhost' ? 'Gestiopolis/' : '';
include_once($_SERVER['DOCUMENT_ROOT'].'/'.$servidor.'wp-load.php');

global $wpdb;*/
//$p = ( isset($_REQUEST['p']) && (string)$_REQUEST['p'] ) ? $_REQUEST['p'] : false;
function publigp_create_db() {

	global $wpdb;
  	//$version = get_option( 'plubigp_version', '1.0' );
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'publigp';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		type varchar(55) DEFAULT '' NOT NULL,
		info varchar(255) DEFAULT '' NOT NULL,
		date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		slug_ad varchar(55) DEFAULT '' NOT NULL,
		name_ad varchar(255) DEFAULT '' NOT NULL,
		PRIMARY KEY (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

function publigp_settings_add_admin() {
	add_menu_page('Publicidad GP', 'Publicidad GP', 'manage_options', 'my-publi-gp-analytics', 'publigp_config',get_bloginfo('template_directory').'/assets/img/favicon-16x16.png','3');
	add_submenu_page( 'my-publi-gp-analytics', 'Estadísticas de Anuncios', 'Anuncios', 'manage_options', 'my-publi-gp-ads', 'follows_users_analytics');
	/*add_submenu_page( 'my-publi-gp-analytics', 'Estadísticas de Ítems', 'Ítems', 'manage_options', 'my-items-follows-analytics', 'follows_items_analytics');
	add_submenu_page( 'my-publi-gp-analytics', 'Estadíticas de Emails', 'Emails', 'manage_options', 'my-emails-follows-analytics', 'follows_emails_analytics');*/
	
}
add_action('admin_menu', 'publigp_settings_add_admin');

function publigp_config() {
	if(isset($_POST['submit'])){
		if(isset($_POST['publigp_email']) && !empty($_POST['publigp_email']) && is_email($_POST['publigp_email'])){
			update_option( 'publigp_email', $_POST['publigp_email'] );
		}
	}
?>	
	<div id="wrap2">
	    <h2>Configuraciones Generales de Publi GP</h3>	
	    <form class='config_publigp' method='POST' action=''>
	    	<input type="email" name="publigp_email" value="<?php echo get_option('publigp_email', ''); ?>" required placeholder="Ingresa el correo destinatario de los envíos">
	    	<input type="submit" name="submit" value="Enviar">
	    </form>
    </div>
<?php	
}
?>