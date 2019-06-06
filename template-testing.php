<?php
/*
Template Name: Testing
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="title"><?php the_title(); ?></h1>
        
        <div class="row">
          <div class="col-sm-12">

            <?php the_content(); ?>


            <script src='https://www.googletagservices.com/tag/js/gpt.js'>
              googletag.pubads().definePassback('/5555/CO_GESTIOPOLIS/CO_GESTIOPOLIS_SPLASHADMOBILE', [320, 100]).display();
            </script>


            <script src='https://www.googletagservices.com/tag/js/gpt.js'>
              googletag.pubads().definePassback('/5555/CO_GESTIOPOLIS/CO_GESTIOPOLIS_VIDEOWALL', [300, 600]).display();
            </script>


            <script type="text/javascript">
              var p='68005'; var e='';
              var t='//des.smartclip.net/ads?type=dyn&sz=400x320';t+='&plc='+p;t+='&elementId='+e;
              t+='&ref='+encodeURIComponent(window.top.document.URL);t+='&rnd='+Math.round(Math.random()*1e8);
              var s=document.createElement('script');s.type='text/javascript';s.src=t;document.body.appendChild(s);
            </script>
            
          </div>
          <div class="col-sm-2">&nbsp;</div>
        </div><!-- .row -->
      </div><!-- .col-sm-12 -->
      <script type="text/javascript" async="true" src="//fo-api.omnitagjs.com/fo-api/ot.js"></script>
    </div>
  </div><!-- .container PRINCIPAL -->
<?php endwhile; ?>
