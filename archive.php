<?php
/*
Template Name: Archivo
*/
?>
<div class="container cm8">
  <div class="row rm8 title-archivo">
    <div class="col-sm-30">
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
  <div class="row rm8">
    <div class="col-sm-36">
      <table class="table arch-table">
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th id="m12">Diciembre</th>
            <th id="m11">Noviembre</th>
            <th id="m10">Octubre</th>
            <th id="m9">Septiembre</th>
            <th id="m8">Agosto</th>
            <th id="m7">Julio</th>
            <th id="m6">Junio</th>
            <th id="m5">Mayo</th>
            <th id="m4">Abril</th>
            <th id="m3">Marzo</th>
            <th id="m2">Febrero</th>
            <th id="m1">Enero</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="year actual-year selected">2014</td>
            <td rowspan="13" colspan="12" class="ejes-table">
              <div class="row rm8">
                <div class="col-sm-36">
                  <div class="row rm8">
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-0">
                        <span class="eje-meta"><span><?php echo count_posts('allarchive', '2014', '05'); ?></span> publicaciones</span>
                        <i class="fa icon-cat-0"></i>
                        <span class="eje-nombre">Todo</span>
                        <div class="rb-overlay">
                          <span class="rb-close">close</span>
                          <div class="rb-content cat-bg-0">
                            <div><span class="rb-city">Lisbon</span><span class="icon-clima-1"></span><span>21°C</span></div>
                            <div><span>Mon</span><span class="icon-clima-1"></span><span>19°C</span></div>
                            <div><span>Tue</span><span class="icon-clima-2"></span><span>19°C</span></div>
                            <div><span>Wed</span><span class="icon-clima-2"></span><span>18°C</span></div>
                            <div><span>Thu</span><span class="icon-clima-2"></span><span>17°C</span></div>
                            <div><span>Fri</span><span class="icon-clima-1"></span><span>19°C</span></div>
                            <div><span>Sat</span><span class="icon-clima-1"></span><span>22°C</span></div>
                            <div><span>Sun</span><span class="icon-clima-1"></span><span>18°C</span></div>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-20">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 20); ?></span> publicaciones</span>
                        <i class="fa icon-cat-20"></i>
                        <span class="eje-nombre">Administración</span>
                        <br class="clearfix">
                        <span class="eje-tagline">Todo es susceptible de mejorar</span>
                        
                      </a>
                    </div>
                  </div>
                  <div class="row rm8">
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-15">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 15); ?></span> publicaciones</span>
                        <i class="fa icon-cat-15"></i>
                        <span class="eje-nombre">Autoayuda</span>
                        <br class="clearfix">
                        <span class="eje-tagline">Yo puedo</span>
                        
                      </a>
                    </div>
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-16">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 16); ?></span> publicaciones</span>
                        <i class="fa icon-cat-16"></i>
                        <span class="eje-nombre">Contabilidad</span>
                        <br class="clearfix">
                        <span class="eje-tagline">Comprobar, medir, evaluar, formular</span>
                      </a>
                    </div>
                  </div>
                  <div class="row rm8">
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-17">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 17); ?></span> publicaciones</span>
                        <i class="fa icon-cat-17"></i>
                        <span class="eje-nombre">Economía</span>
                        <br class="clearfix">
                        <span class="eje-tagline">Recursos escasos. Asignación eficiente</span>
                      </a>
                    </div>
                    <div class="col-sm-18">
                      <a href="emprendimiento.php" class="cat-bg-18">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 18); ?></span> publicaciones</span>
                        <i class="fa icon-cat-18"></i>
                        <span class="eje-nombre">Emprendimiento</span>
                        <br class="clearfix">
                        <span class="eje-tagline">A pensar en grande</span>
                      </a>
                    </div>
                  </div>
                  <div class="row rm8">
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-19">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 19); ?></span> publicaciones</span>
                        <i class="fa icon-cat-19"></i>
                        <span class="eje-nombre">Finanzas</span>
                        <br class="clearfix">
                        <span class="eje-tagline">Minimizar riesgos. Maximizar retornos</span>
                      </a>
                    </div>
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-3">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 13); ?></span> publicaciones</span>
                        <i class="fa icon-cat-3"></i>
                        <span class="eje-nombre">Marketing</span>
                        <br class="clearfix">
                        <span class="eje-tagline">Satisfacer necesidades. Entregar valor</span>
                      </a>
                    </div>
                  </div>
                  <div class="row rm8">
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-23">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 23); ?></span> publicaciones</span>
                        <i class="fa icon-cat-23"></i>
                        <span class="eje-nombre">Medio Ambiente</span>
                        <br class="clearfix">
                        <span class="eje-tagline">La naturaleza es sabia</span>
                      </a>
                    </div>
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-21">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 21); ?></span> publicaciones</span>
                        <i class="fa icon-cat-21"></i>
                        <span class="eje-nombre">Talento</span>
                        <br class="clearfix">
                        <span class="eje-tagline">Felicidad = Productividad</span>
                      </a>
                    </div>
                  </div>
                  <div class="row rm8">
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-56">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 56); ?></span> publicaciones</span>
                        <i class="fa icon-cat-56"></i>
                        <span class="eje-nombre">Tecnología</span>
                        <br class="clearfix">
                        <span class="eje-tagline">En favor de la evolución humana</span>
                      </a>
                    </div>
                    <div class="col-sm-18">
                      <a href="#" class="cat-bg-24">
                        <span class="eje-meta"><span><?php echo count_posts('catsarchive', '2014', '05', 24); ?></span> publicaciones</span>
                        <i class="fa icon-cat-24"></i>
                        <span class="eje-nombre">Otros temas</span>
                        <br class="clearfix">
                        <span class="eje-tagline">De todo un poco</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td class="year">2013</td>
          </tr>
          <tr>
            <td class="year">2012</td>
          </tr>
          <tr>
            <td class="year">2011</td>
          </tr>
          <tr>
            <td class="year">2010</td>
          </tr>
          <tr>
            <td class="year">2009</td>
          </tr>
          <tr>
            <td class="year">2008</td>
          </tr>
          <tr>
            <td class="year">2007</td>
          </tr>
          <tr>
            <td class="year">2006</td>
          </tr>
          <tr>
            <td class="year">2005</td>
          </tr>
          <tr>
            <td class="year">2004</td>
          </tr>
          <tr>
            <td class="year">2003</td>
          </tr>
          <tr>
            <td class="year">2002</td>
          </tr>
          <tr>
            <td class="year">2001</td>
          </tr>
          <tr>
            <td class="year">2000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- .container PRINCIPAL -->