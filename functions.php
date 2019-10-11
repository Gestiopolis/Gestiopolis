<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

@ini_set( 'upload_max_size' , '512M' );
@ini_set( 'post_max_size', '512M');
@ini_set( 'max_execution_time', '300' );





function insert_script_videootv($content){
    $videoo_script = '<script defer id="videoo-library" data-id="6000da7e107954a396b1824935e141d24b228eef8a34cecfb564d4dd1233ea8d" src="https://static.videoo.tv/6000da7e107954a396b1824935e141d24b228eef8a34cecfb564d4dd1233ea8d.js"></script>';
    if (is_single()){
        $content = insert_videootv_after_paragraph($videoo_script, 2, $content);
    }
    return $content;
}
add_filter('the_content', 'insert_script_videootv');

function insert_videootv_after_paragraph($insertion, $paragraph_id, $content){
    $closing_p  = '</p>';
    $paragraphs = explode($closing_p, $content);
    foreach ($paragraphs as $index => $paragraph) {
        if (trim($paragraph)) {
            $paragraphs[$index] .= $closing_p;
        }

        if ($paragraph_id == $index + 1) {
            $paragraphs[$index] .= $insertion;
        }
    }

    return implode('', $paragraphs);
}