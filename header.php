<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php bloginfo('name'); ?></title>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

    	<!-- custom scrollbar stylesheet -->
		<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
		<?php wp_head(); ?>
</head>
<body>
	<!-- header start -->
	<header>
		<section class="container">
			<div class="logo"></div>
			<div class="search"><?php get_search_form(); ?></div>
			<!-- navigation start -->
			<nav class="clearfix">
				<?php
					$args = array(
						'theme_location' => 'primary'
					);
				?>
				<?php wp_nav_menu( $args ); ?>
			</nav><!-- navigation end -->
		</section>
	</header>
	<!-- header end -->