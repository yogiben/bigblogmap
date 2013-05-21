<?php ?>
<article class="primary-content">
<?php $firstClass = 'first-post'; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
	<?php if ( ! have_posts() ) : ?>
        <article role="main" class="the-content">
            <h1><?php _e( '404 - I&#39;m sorry but the page can&#39;t be found' ); ?></h1>
            <p>Please try searching again or head back to the homepage.</p>
        </article>
    <?php endif; ?>
<?php ?>
<?php if (is_home()): ?>
<h1>
	<?php if ( is_day() ) : ?><?php printf( __( '<span>Daily Archive</span> %s' ), get_the_date() ); ?>
    <?php elseif ( is_month() ) : ?><?php printf( __( '<span>Monthly Archive</span> %s' ), get_the_date('F Y') ); ?>
    <?php elseif ( is_year() ) : ?><?php printf( __( '<span>Yearly Archive</span> %s' ), get_the_date('Y') ); ?>
    <?php elseif ( is_category() ) : ?><?php echo single_cat_title(); ?>
	<?php elseif ( is_search() ) : ?><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
	<?php elseif ( is_home() ) : ?>Blog<?php else : ?>
    <?php endif; ?>
</h1>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php /* How to display standard posts and search results */ ?>
	
        <article class="article-archive <?php echo $firstClass; ?>" id="post-<?php the_ID(); ?>">
			<?php $firstClass = ""; ?>
			<?php ?>
			<?php if (is_front_page()) { ?>
			  <div class="home-summary">
			<?php } else { ?>
			  <div class="entry-summary">
			<?php } ?>
                
                	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail('flozo-thumb');?></a>
                	<?php if (is_front_page()) { ?>
                	  <h1><?php the_title(); ?></h1>
                	<?php } else { ?>
                	  <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                	<?php } ?>
                	
					<?php the_excerpt(); ?>
                  <?php if ( is_home() ) : ?> <p class="entry-meta"><time datetime="<?php the_time('l, F jS, Y') ?>" pubdate><?php the_time('l jS F Y') ?></time></p>
                  <?php endif; ?>
                </div>
		</article>

		<?php /*?><?php comments_template( '', true ); ?><?php */?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( 'Older posts' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
</article>

