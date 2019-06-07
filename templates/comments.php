<?php
  if (post_password_required()) {
    return;
  }
?>

<section class="comments">
 <!--  -->

  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3&appId=1712097452440529&autoLogAppEvents=1"></script>

<div class="fb-comments" data-href="<?php echo the_permalink( $post ); ?>" data-width="100%" data-numposts="5"></div>



</section>
