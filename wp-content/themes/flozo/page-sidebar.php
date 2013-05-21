<?php
/*
Template Name: Page With Sub Navigation
*/
?>
<?php get_header(); ?>

<div id="content">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="info page-sidebar">
		
		<article role="main" class="primary-content the-content" id="post-<?php the_ID(); ?>">
			<?php if ( is_front_page() ) { ?>
				<h1><?php the_title(); ?></h1>
			<?php } else { ?>
				<h1><?php the_title(); ?></h1>
			<?php } ?>
			<?php the_post_thumbnail(array(872,398));?>
			<div class="columns">
				<?php the_content(); ?>
			</div> 
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
		   
			<?php //edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
			<?php //comments_template( '', true ); ?>
		
		</article>

		<div class="secondary-content">
		<h2><?php
		$parent_title = get_the_title($post->post_parent);
		echo $parent_title;
		?></h2>
			<ul class="sub-navigation">
			
			<?php
			$id = get_the_ID();
			$topParent = array_reverse(get_post_ancestors($id));
			if (empty($topParent)) $topParent = array(0=>$id);
			$args = array(
				'child_of'	 => $topParent[0],
				'title_li'	 => ''
			);
			wp_list_pages($args);
			//wp_list_pages("title_li=&child_of=$id&show_date=modified&date_format=$date_format");
			?>
			</ul>
		</div>

	</div>
		
	<?php endwhile; ?>
		
	<div class="blog">
	<h2><span>Our Blog</span></h2>
	<ul>
	<?php
	if (is_page()) {
	 
	  $posts = get_posts ("cat=$cat&showposts=3");
	  if ($posts) {
		foreach ($posts as $post):
		  setup_postdata($post); ?>
		  <li><h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3><p class="date"></p><?php the_time("j M Y"); ?><p><?php the_excerpt(); ?></p></li>
		<?php endforeach;
	  }
	}
	
	?>
	</ul>
	</div>

</div> 
		
  

<?php get_footer();  ?>
</div>