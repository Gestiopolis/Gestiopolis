/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Gestiopolis = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
      //1. Formulario de búsqueda top-nav
      $('.busca-link').on('click', function(e){
        e.preventDefault();
        $(this).hide();
        $('#nav_busca .navbar-search').removeClass('hide');
        $('#nav_busca .navbar-search').show('slow');
      });
      $('#nav_busca .x-search').on('click', function(e){
        e.preventDefault();
        $('#nav_busca .navbar-search').hide();
        $('#nav_busca .navbar-search').addClass('hide');
        $('.busca-link').show();
      });
      // 2. Hacer que aparezcan botones sociales conforme pasa el cursor encima de un artículo 
      /*$('article.post').on('mouseenter', function (event) {
        $(this).off(event);
        var id = $(this).attr("id").slice(5);
        //$('#social-img-' + id).hide();
        $('#compartir-' + id).show();
        var permalink = $('#titulo-' + id).attr("href");
        var title = $('#titulo-' + id).attr("title");
        var fb_str = '<fb:like href="' + permalink + '" layout="button_count" send="false" show_faces="false"></fb:like>';
        var twitter_str = '<span style="float:left;width:90px;margin-right:5px;margin-bottom: -5px;"><iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?url=' + permalink + '&amp;text=' + title + '&amp;via=gestiopoliscom" style="width:90px; height:20px;" allowTransparency="true" frameborder="0"></iframe></span>';
        var linkedin_str = '<scr' + 'ipt id="inshare-' + id + '" type="in/share" data-url="' + permalink + '" data-counter="right"></scr' + 'ipt>';
        $('#compartir-' + id).css('background', 'none');
        $('#fb-compartir-' + id).removeClass('bc-facebook').css('width', 'auto').html(fb_str);
        FB.XFBML.parse(document.getElementById('fb-compartir-' + id));
        $('#tweet-compartir-' + id).css('width', '90px').removeClass('bc-twitter').html(twitter_str);
        $('#gplus-compartir-' + id).parent().removeClass('bc-gplus');
        if (typeof (gapi) != 'object'){ jQuery.getScript('http://apis.google.com/js/plusone.js', function () {
            gapi.plusone.render('gplus-compartir-' + id, {
                "href": permalink,
                "size": 'medium'
            });
        });
        }else {
            gapi.plusone.render('gplus-compartir-' + id, {
                "href": permalink,
                "size": 'medium'
            });
        }
        $('#linkedin-compartir-' + id).removeClass('bc-linkedin').html(linkedin_str);
        if (typeof (IN) != 'object'){ jQuery.getScript('http://platform.linkedin.com/in.js');}
        else { IN.parse(document.getElementById('linkedin-compartir-' + id));}
      });*/
      //3. Iniciar tooltips
      $("a[data-toggle=tooltip]").tooltip();

      //4. Off canvas header
      //Navigation Menu Slider
        $('#nav-expander').on('click',function(e){
          e.preventDefault();
          $('body').toggleClass('nav-expanded');
        });
        $('#nav-close').on('click',function(e){
          e.preventDefault();
          $('body').removeClass('nav-expanded');
        });

        // Initialize navgoco with default options
        $(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });
        //5. Función de buscador mobile friendly http://tympanus.net/codrops/2013/06/26/expanding-search-bar-deconstructed/
        new UISearch( document.getElementById( 'sb-search' ) );
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
      //1. Grid Ejes temáticos Home
      //Grid.init();
      //2. Slider home autores
      slider(".autores-home", ".autores-home .carrusel", ".carrusel>.span3", 8);
      //3. Slider home temas
      slider(".temas-home", ".temas-home .carrusel", ".carrusel>.span3", 8);
      
      var $container = $('#recientes');
      // Fire Isotope only when images are loaded
      $container.imagesLoaded(function(){
        $container.isotope({
          itemSelector : '.postw'
        });
      });
      // Infinite Scroll
      $('#recientes').infinitescroll({
        navSelector  : 'div.pagination',
        nextSelector : '.nav-previous a:first',
        itemSelector : '.postw',
        bufferPx     : 200,
        loading: {
          msgText: 'Cargando...',
          finishedMsg: 'We\'re done here.',
          img: serverval.template_directory+'/assets/img/ajax-loader.gif'
        }
      },
      // Infinite Scroll Callback
      function( newElements ) {
        var $newElems = jQuery( newElements ).hide();
        $newElems.imagesLoaded(function(){
          $newElems.fadeIn();
          $container.isotope( 'appended', $newElems );
        });
      });
    }
  },
  author: { //Página del autor
    init: function() {
      var $conta3 = $('#publicaciones');
      // Fire Isotope only when images are loaded
      $conta3.imagesLoaded(function(){
        $conta3.isotope({
          itemSelector : '.postw'
        });
      });
      // Infinite Scroll
      $('#publicaciones').infinitescroll({
        navSelector  : 'div.pagination',
        nextSelector : '.nav-previous a:first',
        itemSelector : '.postw',
        bufferPx     : 200,
        loading: {
          msgText: 'Cargando...',
          finishedMsg: 'We\'re done here.',
          img: serverval.template_directory+'/assets/img/ajax-loader.gif'
        }
      },
      // Infinite Scroll Callback
      function( newElements ) {
        var $newElems = jQuery( newElements ).hide();
        $newElems.imagesLoaded(function(){
          $newElems.fadeIn();
          $conta3.isotope( 'appended', $newElems );
        });
      });
    }
  },
  category: { //Página del autor
    init: function() {
      var $conta1 = $('#recientes');
      // Fire Isotope only when images are loaded
      $conta1.imagesLoaded(function(){
        $conta1.isotope({
          itemSelector : '.postw'
        });
      });
      // Infinite Scroll
      $('#recientes').infinitescroll({
        navSelector  : 'div.pagination',
        nextSelector : '.nav-previous a:first',
        itemSelector : '.postw',
        bufferPx     : 200,
        loading: {
          msgText: 'Cargando...',
          finishedMsg: 'We\'re done here.',
          img: serverval.template_directory+'/assets/img/ajax-loader.gif'
        }
      },
      // Infinite Scroll Callback
      function( newElements ) {
        var $newElems = jQuery( newElements ).hide();
        $newElems.imagesLoaded(function(){
          $newElems.fadeIn();
          $conta1.isotope( 'appended', $newElems );
        });
      });
    }
  },
  tag: { //Página del autor
    init: function() {
      var $conta2 = $('#publicaciones');
      // Fire Isotope only when images are loaded
      $conta2.imagesLoaded(function(){
        $conta2.isotope({
          itemSelector : '.postw'
        });
      });
      // Infinite Scroll
      $('#publicaciones').infinitescroll({
        navSelector  : 'div.pagination',
        nextSelector : '.nav-previous a:first',
        itemSelector : '.postw',
        bufferPx     : 200,
        loading: {
          msgText: 'Cargando...',
          finishedMsg: 'We\'re done here.',
          img: serverval.template_directory+'/assets/img/ajax-loader.gif'
        }
      },
      // Infinite Scroll Callback
      function( newElements ) {
        var $newElems = jQuery( newElements ).hide();
        $newElems.imagesLoaded(function(){
          $newElems.fadeIn();
          $conta2.isotope( 'appended', $newElems );
        });
      });
    }
  },
  page_id_80309: { //ABC temático
    init: function() {
      // JavaScript to be fired on the home page
      //1. Grid Ejes temáticos Home
      Grid.init();
      //2. Scrollbar ABC 404
      $('.scrollabc').tinyscrollbar();
    }
  },
  // About us page, note the change from about-us to about_us.
  page_id_80284: { //Página de Archivo
    init: function() {
      //1. Grid archivo
      Boxgrid.init();
      //2. Carga último archivo del último mes y año
      var currentTime = new Date();
      var month = ("0" + (currentTime.getMonth() + 1)).slice(-2);
      var year = currentTime.getFullYear();

      $.ajax({
        url: serverval.template_directory+'/lib/functions/archive_posts.php',
        type: 'POST',
        data: { year: year.toString(), month: month.toString() },
        async: true,
        cache: false,
        processData: true,
        success: function (result) {
          $( "td.ejes-table" ).html(result);
        }
      });
      //3. Carga archivo del año y 1er mes
      $("td.year").click(function(e){
        e.preventDefault();
        $( "td.ejes-table" ).empty();
        $("td.year").removeClass('selected');
        $(this).addClass('selected');
        $("th#01").addClass('selected');
        var selectedyear = $(this).text();
        $.ajax({
          url: serverval.template_directory+'/lib/functions/archive_posts.php',
          type: 'POST',
          data: { year: selectedyear, month: '01' },
          async: true,
          cache: false,
          processData: true,
          success: function (result) {
            $( "td.ejes-table" ).html(result);
          }
        });
      });
      //4. Carga archivo del año y mes seleccionado
      $("th.month").click(function(e){
        e.preventDefault();
        $( "td.ejes-table" ).empty();
        $("th.month").removeClass('selected');
        $(this).addClass('selected');
        var selectedyear = $('td.year.selected').text();
        var selectedmonth = $(this).attr('id');
        $.ajax({
          url: serverval.template_directory+'/lib/functions/archive_posts.php',
          type: 'POST',
          data: { year: selectedyear, month: selectedmonth },
          async: true,
          cache: false,
          processData: true,
          success: function (result) {
            $( "td.ejes-table" ).html(result);
          }
        });
      });
    }
  },
  page_id_264: { //Página de publicar
    init: function() {
      //Funciones javascript de página de publicar
      $("form#upldoc").submit(function(e){
        e.preventDefault();
        $('#publicar1').hide();
        $('#publicar2').show();
        $('#publicar2 .docprog').text('Cargando...');
        //grab all form data  
        var formData2 = new FormData($(this)[0]);
        $.ajax({
          url: serverval.template_directory+'/lib/functions/upload-doc.php',
          type: 'POST',
          data: formData2,
          async: true,
          cache: false,
          contentType: false,
          processData: false,
          success: function (pID1) {
            console.info('Paso 1 con éxito');
            console.info(pID1);
            $('#publicar2 .docprog').text('Preparando...');
            $('#publicar2 input#postid').val(pID1);
            $.ajax({
              url: serverval.template_directory+'/lib/functions/upload-doc.php',
              type: 'POST',
              data: { postid: pID1, step: 'dos' },
              async: true,
              cache: false,
              processData: true,
              success: function (pID2) {
                console.info('Paso 2 con éxito');
                console.info(pID2);
                $('#publicar2 .docprog').text('Optimizando...');
                $.ajax({
                  url: serverval.template_directory+'/lib/functions/upload-doc.php',
                  type: 'POST',
                  data: { postid: pID2, step: 'tres' },
                  async: true,
                  cache: false,
                  processData: true,
                  success: function (pID3) {
                    console.info('Paso 3 con éxito');
                    console.info(pID3);
                    $('#publicar2 .docprog').text('Generando HTML...');
                    $.ajax({
                      url: serverval.template_directory+'/lib/functions/upload-doc.php',
                      type: 'POST',
                      data: { postid: pID3, step: 'cuatro' },
                      async: true,
                      cache: false,
                      processData: true,
                      success: function (pID4) {
                        console.info('Paso 4 con éxito');
                        console.info(pID4);
                        $('#publicar2 .docprog').text('Finalizando...');
                        $.ajax({
                          url: serverval.template_directory+'/lib/functions/upload-doc.php',
                          type: 'POST',
                          data: { postid: pID4, step: 'cinco' },
                          async: true,
                          cache: false,
                          processData: true,
                          success: function (pID5) {
                            if (pID5 != 'error'){
                              console.info('Paso 5 con éxito');
                              console.info(pID5);
                              $('#publicar2 .docprog').text('¡Listo!');
                              $( "#uplpost button" ).removeAttr( "disabled" );
                              //$('#publicar2 input#postid').val(pID5);
                              /*setTimeout(function(){
                                window.location.replace(pID5);
                              }, 4000);*/
                            }else if (pID5 == 'error') {
                              $('#myModal img').hide();
                              console.info('Error en la conversión');
                              $('#publicar2 .docprog').text('Error en la conversión');
                              setTimeout(function(){
                                location.reload();
                                /*$.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "deletepdf", postid:parseInt(serverval.postid, 10)}).done(function() {
                                    location.reload();
                                  });*/
                              }, 6000);
                            }
                          }
                        });
                      }
                    });
                  }
                });
              }
            });
          }
        });
       
        return false;
      });
      $("form#uplpost").submit(function(e){
        e.preventDefault();
        $('#publicar1').hide();
        
        //grab all form data  
        var formData3 = new FormData($(this)[0]);
        $.ajax({
          url: serverval.template_directory+'/lib/functions/upload-doc.php',
          type: 'POST',
          data: formData3,
          async: true,
          cache: false,
          contentType: false,
          processData: false,
          success: function (datareturn) {
            $('#publicar2').hide();
            var sharedata = datareturn.split('|');
            $('#publicar3 #post_link').html(sharedata[0]);
            $('#publicar3 #doc_iframe').html(sharedata[1]);
            $('#publicar3').show();
          }
        });
        return false;
      });
    }
  }, //Fin page_id_264
  single: {
    init: function() {
      // JavaScript to be fired on a single post
      if (serverval.manage_options == "1" && serverval.userlogin == "1"){
        /*$(document).on('edit_started', function(ev) {
          var el = $(ev.target);
          var longitud = el.text().length;

          if(el.data('filter') == 'the_title'){
            $('#titcount').show();
            if (longitud > "56") {
                $('#titcount').css('color', '#ff0000');
              }else{
                $('#titcount').css('color', '#00913F');
              }
            $("#titcount").html('<b>'+longitud+'</b> caracteres');
            $("#title_edit input.fee-form-content").on('keyup', function(){
              var nueva_longitud = $(this).val().length;
              $("#titcount").html('<b>'+nueva_longitud+'</b> caracteres');
              if (nueva_longitud > "56") {
                $('#titcount').css('color', '#ff0000');
              }else{
                $('#titcount').css('color', '#00913F');
              }
            });
          }
          if(el.data('key') == '_yoast_wpseo_metadesc'){
            $('#descount').show();
            if (longitud > "156") {
                $('#descount').css('color', '#ff0000');
              }else{
                $('#descount').css('color', '#00913F');
              }
            $("#descount").html('<b>'+longitud+'</b> caracteres');
            $("#desc_edit input.fee-form-content").on('keyup', function(){
              var nueva_longitud = $(this).val().length;
              $("#descount").html('<b>'+nueva_longitud+'</b> caracteres');
              if (nueva_longitud > "156") {
                $('#descount').css('color', '#ff0000');
              }else{
                $('#descount').css('color', '#00913F');
              }
            });
          }
        });*/
        /*$(document).on('edit_saved', function(ev) {
          var el = $(ev.target);
          if(el.data('filter') == 'the_title'){
              $('#titcount').hide();
            }
            if(el.data('key') == '_yoast_wpseo_metadesc'){
              $('#descount').hide();
            }

        });*/
        $("input#editslug").on('click', function(e){
          e.preventDefault();
          var slug = $("input#slugedit").val();
          var idpost = parseInt(serverval.postid, 10);
          $.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "slugedit", postid:idpost, newslug:slug}).done(function() {
                  location.reload();
                });
        });
        $("input#editimage").on('click', function(e){
          e.preventDefault();
          var imageurl = $("input#imageedit").val();
          var idpost = parseInt(serverval.postid, 10);
          $.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "imageedit", postid:idpost, flickrurl:imageurl}).done(function() {
                  location.reload();
                });
        });
        $("#deletePost").on('click', function(e){
          e.preventDefault();
          var idpost = parseInt(serverval.postid, 10);
          if (confirm('¿Estás seguro que deseas eliminar este Artículo?')) {
              $.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "deletepost", postid:idpost});
          }
        });
        $("input#editmargin").on('click', function(e){
          e.preventDefault();
          var margin = $("input#imagemargin").val();
          var idpost = parseInt(serverval.postid, 10);
          $.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "imagemargin", postid:idpost, immargin:margin}).done(function() {
                  location.reload();
                });
        });
        $("#deleteImage").on('click', function(e){
          e.preventDefault();
          var idpost = parseInt(serverval.postid, 10);
          if (confirm('¿Estás seguro que deseas eliminar esta Imágen?')) {
              $.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "deleteimage", postid:idpost}).done(function() {
                  location.reload();
                });
          }
        });
        $("#deletePdf").on('click', function(e){
          e.preventDefault();
          var idpost = parseInt(serverval.postid, 10);
          if (confirm('¿Estás seguro que deseas eliminar este Documento?')) {
              $.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "deletepdf", postid:idpost}).done(function() {
                  location.reload();
                });
          }
        });

        $("a.gesti-open").click(function(){

          $($(this).attr('href')).fadeIn('normal');
              return false;
          
        });

        
        $('a.gesti-close').click(function() {
        
              $($(this).attr('href')).fadeOut();
              return false;
              
          });
        var ques=0;
        $("#agrexl").click(function() {
          $("#exlinks-"+ques).show();
          ques++;
        });
        $(".borrarjq").click(function() {
          var jqpost = $(this).attr("rel");
          $("#"+jqpost).remove();
        });
        $("form#all2html").submit(function(e){
          e.preventDefault();
          $('#myModal').modal('show');
          $('#myModal .modal-text').text('Cargando el Documento a WordPress...');
          //grab all form data  
          var formData = new FormData($(this)[0]);
          $.ajax({
            url: serverval.template_directory+'/lib/functions/processpdf.php',
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              //alert('Documento cargado con éxito. Recarga la página.');
              //location.reload();
              console.info('Paso 1 con éxito');
              $('#myModal .modal-text').text('Preparando el documento para la conversión...');
              $.ajax({
                url: serverval.template_directory+'/lib/functions/processpdf.php',
                type: 'POST',
                data: { postid: parseInt(serverval.postid, 10), step: 'dos' },
                async: true,
                cache: false,
                processData: true,
                success: function (returndata) {
                  console.info('Paso 2 con éxito');
                  $('#myModal .modal-text').text('Optimizando el documento...');
                  $.ajax({
                    url: serverval.template_directory+'/lib/functions/processpdf.php',
                    type: 'POST',
                    data: { postid: parseInt(serverval.postid, 10), step: 'tres' },
                    async: true,
                    cache: false,
                    processData: true,
                    success: function (returndata) {
                      console.info('Paso 3 con éxito');
                      $('#myModal .modal-text').text('Generando el HTML del documento');
                      $.ajax({
                        url: serverval.template_directory+'/lib/functions/processpdf.php',
                        type: 'POST',
                        data: { postid: parseInt(serverval.postid, 10), step: 'cuatro' },
                        async: true,
                        cache: false,
                        processData: true,
                        success: function (returndata) {
                          console.info('Paso 4 con éxito');
                          $('#myModal .modal-text').text('Finiquitando un par de detalles. Ya casi...');
                          $.ajax({
                            url: serverval.template_directory+'/lib/functions/processpdf.php',
                            type: 'POST',
                            data: { postid: parseInt(serverval.postid, 10), step: 'cinco' },
                            async: true,
                            cache: false,
                            processData: true,
                            success: function (returndata) {
                              if (returndata != 'error'){
                                console.info('Paso 5 con éxito');
                                $('#myModal .modal-text').text('Redirigiendo a la versión full del archivo convertido');
                                setTimeout(function(){
                                  window.location.replace(returndata);
                                }, 4000);
                              }else if (returndata == 'error') {
                                $('#myModal img').hide();
                                console.info('Error en la conversión');
                                $('#myModal .modal-text').text('El archivo que estás tratando de cargar tiene errores. Por favor revísalo e inténtalo cargar de nuevo.');
                                setTimeout(function(){
                                  location.reload();
                                  /*$.post(serverval.template_directory+'/lib/functions/frontendedit.php', {type: "deletepdf", postid:parseInt(serverval.postid, 10)}).done(function() {
                                      location.reload();
                                    });*/
                                }, 6000);
                              }
                            }
                          });
                        }
                      });
                    }
                  });
                }
              });
            }
          });
          return false;
        });
      } //If user admin and login
      if (serverval.all2html_htmlcontent != "") {
        $(document).on('ready', function() {
          var curpage = 0;
          $(window).scroll(function(){
            curpage = this_cur_page_idx;
            $('input.pagen').val(curpage+1);
          });
          $('#toolbar').stickUp();
          $('#toolbar').width($('#page-container').width());
          var page = document.getElementsByClassName('pf');

          var total_pages = page.length;
          $('#pages').text(total_pages);

          $( "input.pagen" ).keyup(function() {
            var value = $(this).val()-1;
            if(value < 0) {return;}
            var offsettop = $('#'+page[value].id).offset().top;
            setTimeout(function() {
              $('html, body').stop().animate({
                  scrollTop: offsettop
              }, 1000);
            },300);
          }).keyup();
          $( "#toolbar .prevpage" ).on('click', function(e) {
            e.preventDefault();
            var offsettop = $('#'+page[curpage-1].id).offset().top;
            $('html, body').stop().animate({
                scrollTop: offsettop
            }, 1000);
          });
          $( "#toolbar .nextpage" ).on('click', function(e) {
            e.preventDefault();
            var offsettop = $('#'+page[curpage+1].id).offset().top;
            $('html, body').stop().animate({
                scrollTop: offsettop
            }, 1000);
          });
          setTimeout(function() {
            a2h.fit_width(); //Escala las páginas para que se ajusten al ancho del contenedor
          },1500);
          $( window ).on( 'debouncedresize', function() {
            a2h.fit_width(); //Escala las páginas para que se ajusten al ancho del contenedor si la ventana cambia de tamaño
          });
        });
      } //if htmlcontent
    } //init
  }, //Fin single
  page_id_2: { //Acerca de
    init: function() {
      $('body').scrollspy({ target: '.aboutsidebar' });
    }
  } //Fin Acerca de
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Gestiopolis;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
