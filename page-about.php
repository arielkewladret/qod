<?php
/**
 * The about page template file.
 *
 * @package QOD_Starter_Theme
 */
get_header(); ?>

	<div id="primary" class="content-area about-page-area">
	<i class="fas fa-quote-left"></i>		
	<div id="main" class="site-main" role="main">

		
		
	

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
		

			

				<?php get_template_part( 'template-parts/content' ); ?>
			
				
			<?php endwhile; ?>

			<?php else : ?>

<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>


</div><!-- #main -->
<i class="fas fa-quote-right"></i>
</div><!-- #primary -->

<?php get_footer(); ?>