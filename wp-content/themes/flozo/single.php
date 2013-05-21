<?php get_header(); ?>
	<div id="content" class="post">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="info">
	        <article id="post-<?php the_ID(); ?>" class="primary-content">
	            <header>
	                <h1><?php the_title(); ?></h1>
	                <?php /*?><p class="reading-time">The following <?php echo show_post_word_count(); ?> words should take about <?php echo est_read_time(); ?> to read.</p><?php */?>
	                <p class="entry-meta">Posted <strong><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></strong> on <time datetime="<?php the_time('l, F jS, Y') ?>"><?php the_time('l, F jS, Y') ?></time></p>
	            </header>
				
				<?php the_post_thumbnail('flozo-thumb');?>
				
	            <div class="the-content">
					<?php the_content(); ?>
	            </div>
	            
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
	
	            
	
				<?php comments_template( '', true ); ?>
	
	            <div class="navigation">
	                <span class="older"><?php previous_post_link( '%link', '&larr; %title' ); ?></span> <span class="newer"><?php next_post_link( '%link', '%title &rarr;' ); ?></span>
	            </div>
	    
	            
	        </article>
	    </div> 
	<?php endwhile; // end of the loop. ?>
   </div>
   <div id="sidebar">
	<?php get_sidebar( $name ); ?>
	</div>
<?php get_footer(); ?>
