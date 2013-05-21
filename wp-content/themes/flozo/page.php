
<?php get_header(); ?>

	<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="info">
		
			
		
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
	       
	        <?php /*?>
	        <?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
	        <?php comments_template( '', true ); ?>
	        <?php */?>
	    
	        <?php endwhile; ?>
	    </article>
	    </div>
	    <div class="blog">
	    <h2><span>Our Blog</span></h2>
	    <ul>
	    <?php
	    if (is_page()) {
	     
	      $posts = get_posts ("cat=$cat&showposts=3");
	      if ($posts) {
	        foreach ($posts as $post):
	          setup_postdata($post); ?>
	          <li><h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3><p class="date"></p><p><?php the_excerpt(); ?></p></li>
	        <?php endforeach;
	      }
	    }
	    
	    ?>
	    </ul>
	    </div>
	  
	 </div> 
	    
  

<?php get_footer(); // will include footer-no-sidebar.php; ?>
</div>