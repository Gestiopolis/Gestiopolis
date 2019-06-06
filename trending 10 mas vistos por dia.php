<!-- <?php 
        global $post;
        $args = array( 'posts_per_page' => 10 , 'post_status' => 'publish');
        $myposts = get_posts( $args );

          $i = 1;
          foreach( $myposts as $post ) :  setup_postdata($post);
            $post_title = get_the_title($post->post_title);
            $permalink = get_permalink($post->ID);
            $category = get_the_category($post->ID);
            $category_id = $category[0]->term_id;
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'dest-img' );
            if($i == 1){

        ?> -->




         <?php $tposts = get_trending_posts(10, TRENDING_DAYS);
          $i = 1;
          foreach ($tposts as $tpost) {
            $post_title = stripslashes($tpost->post_title);
            $permalink = get_permalink($tpost->ID);
            $category = get_the_category($tpost->ID);
            $category_id = $category[0]->term_id;
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $tpost->ID ), 'dest-img' );
            if($i == 1){

        ?>