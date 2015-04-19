<?php
/*
Template Name: Archivo
*/
?>
<div class="bgcon">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="title">Archivo</h1>
          <div class="row posts-home">
            <div class="postw col-lg-3 col-md-4 col-sm-6">
                  <article class="post">
                    <h3><a href="<?php echo get_year_link( date('Y') ); ?>" title="Archivo de <?php echo date('Y');?>"><?php echo date('Y');?></a></h3>
                    <ul>
                      <li><a href="<?php echo get_month_link( date('Y'), date('m') ); ?>" title="Archivo de <?php month_name(date('m'));?> de <?php echo date('Y');?>"><?php month_name(date('m'));?></a></li>
                      <?php 
                      $m = date('m');
                      $l=1;
                      while ($m >= '01') { 
                      $m = date('m', mktime(0, 0, 0, date('m')-$l, 0, date('Y')));
                      ?>
                      <li><a href="<?php echo get_month_link( date('Y'), $m ); ?>" title="Archivo de <?php month_name($m);?> de <?php echo date('Y');?>"><?php month_name($m);?></a></li>
                      <?php 
                        $l++;
                       }
                      ?>
                    </ul>
                  </article>
                </div>
            <?php 
              $year = date('Y');
              $j=1;
              while ($year != '2000') { 
                $year = date('Y', mktime(0, 0, 0, date('m'), 0, date('Y')-$j));
                ?>
                <div class="postw col-lg-3 col-md-4 col-sm-6">
                  <article class="post">
                    <h3><a href="<?php echo get_year_link( $year ); ?>" title="Archivo de <?php echo $year;?>"><?php echo $year;?></a></h3>
                    <ul>
                      <li><a href="<?php echo get_month_link( $year, '12' ); ?>" title="Archivo de Diciembre de <?php echo $year;?>">Diciembre</a></li>
                      <li><a href="<?php echo get_month_link( $year, '11' ); ?>" title="Archivo de Noviembre de <?php echo $year;?>">Noviembre</a></li>
                      <li><a href="<?php echo get_month_link( $year, '10' ); ?>" title="Archivo de Octubre de <?php echo $year;?>">Octubre</a></li>
                      <li><a href="<?php echo get_month_link( $year, '09' ); ?>" title="Archivo de Septiembre de <?php echo $year;?>">Septiembre</a></li>
                      <li><a href="<?php echo get_month_link( $year, '08' ); ?>" title="Archivo de Agosto de <?php echo $year;?>">Agosto</a></li>
                      <li><a href="<?php echo get_month_link( $year, '07' ); ?>" title="Archivo de Julio de <?php echo $year;?>">Julio</a></li>
                      <li><a href="<?php echo get_month_link( $year, '06' ); ?>" title="Archivo de Junio de <?php echo $year;?>">Junio</a></li>
                      <li><a href="<?php echo get_month_link( $year, '05' ); ?>" title="Archivo de Mayo de <?php echo $year;?>">Mayo</a></li>
                      <li><a href="<?php echo get_month_link( $year, '04' ); ?>" title="Archivo de Abril de <?php echo $year;?>">Abril</a></li>
                      <li><a href="<?php echo get_month_link( $year, '03' ); ?>" title="Archivo de Marzo de <?php echo $year;?>">Marzo</a></li>
                      <li><a href="<?php echo get_month_link( $year, '02' ); ?>" title="Archivo de Febrero de <?php echo $year;?>">Febrero</a></li>
                      <li><a href="<?php echo get_month_link( $year, '01' ); ?>" title="Archivo de Enero de <?php echo $year;?>">Enero</a></li>
                    </ul>
                  </article>
                </div>
            <?php 
              $j++;
             }
            ?>
          </div><!-- .row -->
      </div>
    </div>
  </div><!-- .container PRINCIPAL -->
</div>