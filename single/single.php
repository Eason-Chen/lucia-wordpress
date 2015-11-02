 <?php
	get_header();
?>

	<!-- single grape start -->
	<section class="container mar">
		<div class="singleGrape_des">
			<h3><?php the_title(); ?></h3>
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
			?>
			<?php the_content(); ?>
			<?php
				endwhile;
			else :
				echo '<p>No content found</p>';
			endif;
			wp_reset_postdata();
			?>
		</div>
		<div class="singleGrape_img">
			<?php the_post_thumbnail('grapeSingle-thumbnail'); ?>
		</div>
	</section>
	<!-- single grape end -->

	<!-- the title of wine start -->
	<section class="container">
		<h4><?php the_title(); ?></h4>
	</section>
	<!-- the title of wine end -->

	<!-- wine products start -->
	<section class="container mar">
		<div class="product">
			<?php
				$a = getchild(the_category_ID( $echo ));
				foreach ($a as $v ) {
					$v->cat_ID;
			 	}
     		?>
     		<?php
			$wines = new WP_Query('category__in='.$v->cat_ID);

			if ($wines->have_posts()) :
				while ($wines->have_posts()) : $wines->the_post();
			?>
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
			<?php
				endwhile;
			else :
				echo '<p>No content found</p>';
			endif;

			//wp_reset_postdata();
			?>
		</div>
	</section>
	<!-- wine products end -->

<?php
	get_footer();
?>