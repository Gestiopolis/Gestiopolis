<?php
/*
Template Name: Archivo
*/

global $current_user;
get_currentuserinfo();

if(!is_user_logged_in() || ($current_user->ID != 5833)){
  wp_redirect( home_url() ); 
  exit;
}
global $wpdb;

$collection = $wpdb->get_results("
  SELECT DISTINCT YEAR(p.post_date) AS post_year, MONTH(p.post_date) AS post_month
  FROM {$wpdb->posts} AS p
  WHERE p.post_type = 'post' AND p.post_status = 'publish'
  ORDER BY p.post_date DESC
", OBJECT );
?>

<div class="bgcon">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="title">Archivo</h1>
          <div class="row posts-home">
            <?php
              // Loop once to grab the years
              $oneyear = 1999;
              foreach ( $collection as $year ){
                if ( $oneyear === $year->post_year ) continue;
                echo '<div class="postw col-lg-3 col-md-4 col-sm-6">
                <article class="post">';
                echo '<h3><a href="'. get_year_link($year->post_year).'" title="Archivo de '.$year->post_year.'">'.$year->post_year.'</a></h3>';
                echo '<ul>';
                // Loop for a second time to grab the months inside a year
                foreach ( $collection as $month ){
                  if ( $month->post_year != $year->post_year ) continue;
                  echo '<li><a href="'.get_month_link( $year->post_year, $month->post_month ).'" title="Archivo de '.month_name($month->post_month).' de '.$year->post_year.'">'.month_name($month->post_month).'</a></li>';
                  $oneyear = $year->post_year;
                }
                echo '</ul>
                </article>
                </div>';

              }
            ?>
            <!--<div class="postw col-lg-3 col-md-4 col-sm-6">
              <article class="post">
                <h3><a href="<?php //echo get_year_link( date('Y') ); ?>" title="Archivo de <?php //echo date('Y');?>"><?php //echo date('Y');?></a></h3>
                <ul>
                  <li><a href="<?php //echo get_month_link( date('Y'), date('m') ); ?>" title="Archivo de <?php //month_name(date('m'));?> de <?php //echo date('Y');?>"><?php //month_name(date('m'));?></a></li>
                  <?php 
                  //$m = date('m');
                  /*$l=1;
                  while ($m >= '01') { 
                  $m = date('m', mktime(0, 0, 0, date('m')-$l, 0, date('Y')));*/
                  ?>
                  <li><a href="<?php //echo get_month_link( date('Y'), $m ); ?>" title="Archivo de <?php //month_name($m);?> de <?php //echo date('Y');?>"><?php //month_name($m);?></a></li>
                  <?php 
                    /*$l++;
                   }*/
                  ?>
                </ul>
              </article>
            </div>-->
          </div><!-- .row -->
      </div>
    </div>
  </div><!-- .container PRINCIPAL -->
</div>