<?php
/*
Template Name: Region Template
 */
	get_header();
?>
	<!-- about content start -->
	<section class="container mar">
		<!-- grape intro start -->
		<div class="grape_intro pull-left">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					the_content();
				endwhile;
			else :
				echo '<p>No content found</p>';
			endif;
			?>
		</div>
		<!-- grape intro end -->

		<!-- grape sort start -->
		<div class="grape_sort pull-right clearfix" id="content2">
			<?php
			$regionPost = new WP_Query('category__in=8');

			if ($regionPost->have_posts()) :
				while ($regionPost->have_posts()) : $regionPost->the_post();
			?>
			<div class="grapes clearfix">
				<div class="grapes_img">
					<?php the_post_thumbnail('grape-thumbnail'); ?>
				</div>
				<div class="grapes_des">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
				</div>
			</div>
			<?php
				endwhile;
			else :
				echo '<p>No content found</p>';
			endif;
			?>
		</div>
		<!-- grape sort end -->
	</section>
	<!-- about content end -->
<?php
	get_footer();
?>