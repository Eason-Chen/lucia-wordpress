<?php
/*
Template Name: Contact Template
 */
	get_header();
?>

	<!-- contact start -->
	<section class="container mar contact">
		<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					the_content();
				endwhile;
			else :
				echo '<p>No content found</p>';
			endif;
		?>
		<?php
			if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); }
		?>
	</section>
	<!-- contact end -->

<?php
	get_footer();
?>