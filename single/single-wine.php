 <?php
	get_header();
?>

	<!-- wine signle content start -->
	<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
	?>
	<section class="container mar">
		<div class="grape_intro">
			<?php echo get_post_meta($post->ID, "grapeintro_value", true); ?>
		</div>
		<div class="wine clearfix">
			<div class="wine_img">
				<?php
					$code = get_post_meta($post->ID, "slider_value", true);
					masterslider($code);
				?>
			</div>
			<div class="img_atr clearfix">
				<div class="imgs_atr <?php echo get_post_meta($post->ID, "listgrape_value", true); ?>"></div>
				<div class="imgs_atr <?php echo get_post_meta($post->ID, "listregion_value", true); ?>"></div>
				<div class="imgs_atr <?php echo get_post_meta($post->ID, "listcolor_value", true); ?>"></div>
			</div>
			<div class="wine_atr clearfix">
				<div class="wines_atr">
					葡萄种类：
				</div>
				<div class="wines_atr">
					产区：
				</div>
				<div class="wines_atr">
					酒颜色：
				</div>
			</div>
			<div class="wine_atr_value clearfix">
				<div class="wines_atr_value">
					<?php echo get_post_meta($post->ID, "sort_value", true); ?>
				</div>
				<div class="wines_atr_value">
					<?php echo get_post_meta($post->ID, "area_value", true); ?>
				</div>
				<div class="wines_atr_value">
					<?php echo get_post_meta($post->ID, "color_value", true); ?>
				</div>
			</div>
			<p>
				庄园：<?php echo get_post_meta($post->ID, "manor_value", true); ?> 年份：<?php echo get_post_meta($post->ID, "year_value", true); ?> 酒精度：<?php echo get_post_meta($post->ID, "alcohol_value", true); ?> 净含量：<?php echo get_post_meta($post->ID, "weight_value", true); ?> Lucia 编码：<?php echo get_post_meta($post->ID, "code_value", true); ?>
			</p>
			<?php the_content(); ?>
		</div>
	</section>
	<?php
		endwhile;
	else :
		echo '<p>No content found</p>';
	endif;
	?>
	<!-- wine single content end -->

<?php
	get_footer();
?>