<?php /* Template Name: Country Archive  */ ?>

<?php get_header(); ?>
<div id="content">
<div class="info">
<h1><?php the_title(); ?></h1>
<div class="country">
<?php
	$args = array( 'post_type' => 'country', 'posts_per_page' => 9 );
	$loop = new WP_Query( $args );
	$count = 0;
	echo '<ul>';
	while ( $loop->have_posts() ) : $loop->the_post();
		
		$count++;
		$class = ($count % 3 == 1) ? 'first' : '';

		echo '<li class="'.$class.'">';
		echo '<a href="';
		the_permalink();
		echo '">';
		echo '<div class="overlay" style="background-color:'.ot_get_option( 'main_colour' ).';"></div>';
		the_post_thumbnail('flozo-thumb');
		echo '</a>';
		
		echo '<br />';
		
		echo '<h2><a href="';
		the_permalink();
		echo '">';
		the_title();
		echo '</a></h2>';
		
		echo '<div class="entry-content">';
		echo limit_words(get_the_excerpt(), '30'); 
		echo '..</div>';
		echo '</li>';
	endwhile;
	echo '</ul>';
?>
</div>
</div>
<?php wp_reset_query(); ?>
</div>
<?php get_footer();?>