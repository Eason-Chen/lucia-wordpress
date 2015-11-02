<?php

get_header();

// if( is_search() )  :
// 	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// 	query_posts("s=$s&paged=$paged&cat=29,15,25,31,13,30,24,26,27,28,39,12,41,37,48,49,45,10,38,43");
// endif;

if (have_posts()) : ?>

<!-- wine products start -->
	<section class="container mar">
		<h2 class="searchRes">Search results for: <?php the_search_query(); ?></h2>
<?php
	while (have_posts()) : the_post();
?>
		<div class="product">
			<div class="wines clearfix">
				<div class="wines_img">
					<?php the_post_thumbnail('wine-thumbnail'); ?>
				</div>
				<div class="wines_des">
					<h5><?php the_title(); ?></h5>
					<?php the_excerpt(); ?>
				</div>
				<a class="more" href="<?php the_permalink(); ?>">点击查看</a>
			</div>
		</div>
<?php
	endwhile;
?>
	</section>
<?php
else :
	echo '<section class="container mar"><h2 class="searchRes">Search results for: <?php the_search_query(); ?></h2><p>No results found, please try others keywords. Thank you!</p></section>';
endif;

get_footer();
?>