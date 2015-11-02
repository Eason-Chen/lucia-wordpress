<?php
/*
Template Name: About Template
 */
	get_header();
?>
	<!-- about content start -->
	<section class="container mar">
		<!-- address start -->
		<address class="pull-left">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					the_content();
				endwhile;
			else :
				echo '<p>No content found</p>';
			endif;
			?>
		</address>
		<!-- address end -->

		<!-- team start -->
		<div class="team pull-right">
			<?php
			$aboutPost = new WP_Query('category_name=about us');

			if ($aboutPost->have_posts()) :
				while ($aboutPost->have_posts()) : $aboutPost->the_post();
			?>
			<article class="clearfix">
				<div class="about_img">
					<?php the_post_thumbnail('about-thumbnail'); ?>
				</div>
				<div class="about_content">
					<?php the_content(); ?>
				</div>
			</article>
			<?php
				endwhile;
			else :
				echo '<p>No content found</p>';
			endif;
			?>
		</div>
		<!-- team end -->
	</section>
	<!-- about content end -->
<?php
	get_footer();
?>