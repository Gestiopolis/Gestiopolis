<?php
/*
Template Name: Archivo
*/
?>
<div class="container">
  <div class="row title-archivo">
    <div class="col-sm-10">
      <div class="title-arch"><h3>Archivo</h3></div>
    </div><!-- .col-sm-30 -->
    <!--<div class="col-sm-3 col-sm-offset-3">
      <div class="btns-orden btn-toolbar">
        <div id="OrdenEjes" class="btn-group">
          <a href="#" class="btn btn-unete">Únete</a>
        </div>
      </div>
    </div>--><!-- .col-sm-4 -->
  </div><!-- .row -->
  <div class="row">
    <div class="col-sm-12">
      <table class="table arch-table">
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th id="12" class="month<?php if(date('m') == '12'){ echo ' selected';}?>">Diciembre</th>
            <th id="11" class="month<?php if(date('m') == '11'){ echo ' selected';}?>">Noviembre</th>
            <th id="10" class="month<?php if(date('m') == '10'){ echo ' selected';}?>">Octubre</th>
            <th id="09" class="month<?php if(date('m') == '09'){ echo ' selected';}?>">Septiembre</th>
            <th id="08" class="month<?php if(date('m') == '08'){ echo ' selected';}?>">Agosto</th>
            <th id="07" class="month<?php if(date('m') == '07'){ echo ' selected';}?>">Julio</th>
            <th id="06" class="month<?php if(date('m') == '06'){ echo ' selected';}?>">Junio</th>
            <th id="05" class="month<?php if(date('m') == '05'){ echo ' selected';}?>">Mayo</th>
            <th id="04" class="month<?php if(date('m') == '04'){ echo ' selected';}?>">Abril</th>
            <th id="03" class="month<?php if(date('m') == '03'){ echo ' selected';}?>">Marzo</th>
            <th id="02" class="month<?php if(date('m') == '02'){ echo ' selected';}?>">Febrero</th>
            <th id="01" class="month<?php if(date('m') == '01'){ echo ' selected';}?>">Enero</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="year actual-year selected"><?php echo date('Y'); ?></td>
            <td rowspan="13" colspan="12" class="ejes-table">
              <!-- carga de archivo -->
            </td>
          </tr>
          <?php 
            $year = date('Y');
            $j=1;
            while ($year != '2000') { 
              $year = date('Y', mktime(0, 0, 0, date('m'), 0, date('Y')-$j));
              ?>
              <tr>
                <td class="year"><?php echo $year;?></td>
              </tr>
          <?php 
            $j++;
           }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- .container PRINCIPAL -->