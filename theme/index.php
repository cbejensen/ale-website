<!-- THIS IS THE INDEX -->

<?php get_header(); ?>
	<!-- Begin #main -->
	<div id="main">
		<!-- Begin #content -->
		<div id="content">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<p><?php the_content(__('(more...)')); ?></p>		
			<?php endwhile;  ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
		
		<div id="delimiter">
		</div>
	</div><!-- #main -->

<?php get_footer(); ?>
