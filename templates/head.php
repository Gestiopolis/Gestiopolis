<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>


  <!-- Llamada a sulvo -->  
  <script data-cfasync="false" type="text/javascript" src="https://live.demand.supply/up.js"></script>

  <style>
  	body{
  		padding-top: 0px !important;
  	}

  	.ads_right_tags{
        width:148px;
        max-width: 100%;
    }

    @media (max-width: 991px){
        .ads_right_tags{
            display: none;
        }
    }

	@media(max-width: 700px){
	    .adsfr{
			width: 100% !important;
			max-width: 100% !important;
			text-align: center !important;
			margin: 0 auto !important;
	    }
	}

	.navigation{
      text-align: center;
      margin-top: 30px;
    }

                    

	.single .downlink {
		color: #fff !important;
	}
  	
  	#comments a.btn, .from-post-compartelo a{
   	   color: #fff !important;
	}
	.quotes li a {
	   color: #222 !important;
	}
	#copytext {
	   color: #fff !important;
	}

	.single article .wrapper-img h2 span{
		color: #ffffff !important;
	}


	/* Section */
.section {
  clear: both;
  margin: 0px;
  padding: 0px;
}
/* Column */
.col {
  display: block;
  float:left;
  margin: 1% 0 1% 1%;
  height: 550px;
}
.col:first-child { margin-left: 0 !important; }

.col:nth-child(4n+5){
	margin:1% 0 1% 0%;
}

/* Row */
.row:before,
.row:after { content:""; display:table; }
.row:after { clear:both;}
.row { zoom:1; /* For IE 6/7 */ }

/* Grid */
.grid_1_of_4{ width: 24.25% }
.grid_2_of_4{ width: 49.5% }
.grid_3_of_4{ width: 74.75% }
.grid_4_of_4{ width: 100% }

/* Full Width below 768 pixels */
@media only screen and (max-width: 768px) {
  .col {  margin: 1% 0 1% 0%;height: auto; }
  [class*='grid_'] { width: 100%; }
}

  </style>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-57x57.png'); ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-60x60.png'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-72x72.png'); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-76x76.png'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-114x114.png'); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-120x120.png'); ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-144x144.png'); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-152x152.png'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/apple-icon-180x180.png'); ?>">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/android-icon-192x192.png'); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon-32x32.png'); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon-96x96.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon-16x16.png'); ?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ms-icon-144x144.png'); ?>">
	<meta name="theme-color" content="#ffffff">
  
  <?php wp_head(); ?>
</head>
<?php flush(); // http://developer.yahoo.com/performance/rules.html#flush ?>