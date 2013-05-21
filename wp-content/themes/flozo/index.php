<?php get_header(); ?>
	<div id="container">
		<div id="content">
			<div class="info">
			<?php get_template_part( 'loop', 'index' ); ?>
			</div>
		</div>
		<div id="sidebar">
			<?php get_sidebar();?>
		</div>
	</div>
<?php get_footer(); ?>