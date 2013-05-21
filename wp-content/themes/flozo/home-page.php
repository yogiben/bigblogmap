<?php
/*
Template Name: Home
*/
?>


<?php get_header(); ?>
<?php if(ot_get_option( 'feature_image_1' ) != ''){ ?>
<script class="secret-source">
        jQuery(document).ready(function($) {
          $('.feature').bjqs({
            height      : 410,
            width       : 960,
            responsive  : true,
            showmarkers : false,
            usecaptions : false,
            animtype : 'slide',
            randomstart :false
          });
        });
</script>
<div class="feature">
	<ul class="bjqs">
		<li><a href="<?php ot_get_option( 'feature_link_1' ) ?>"><img src="<?php echo ot_get_option( 'feature_image_1' ); ?>"/><p><?php echo ot_get_option( 'feature_text_1' ); ?></p></a></li>
		<?php if(ot_get_option( 'feature_image_2' ) != ''){ ?><li><a href="<?php echo ot_get_option( 'feature_link_2' ) ?>"><img src="<?php echo ot_get_option( 'feature_image_2' ); ?>"/><p><?php echo ot_get_option( 'feature_text_2' ); ?></p></a></li><?php } ?>
		<?php if(ot_get_option( 'feature_image_3' ) != ''){ ?><li><a href="<?php echo ot_get_option( 'feature_link_3' ) ?>"><img src="<?php echo ot_get_option( 'feature_image_3' ); ?>"/><p><?php echo ot_get_option( 'feature_text_3' ); ?></p></a></li><?php } ?>
		<?php if(ot_get_option( 'feature_image_4' ) != ''){ ?><li><a href="<?php echo ot_get_option( 'feature_link_4' ) ?>"><img src="<?php echo ot_get_option( 'feature_image_4' ); ?>"/><p><?php echo ot_get_option( 'feature_text_4' ); ?></p></a></li><?php } ?>
		<?php if(ot_get_option( 'feature_image_5' ) != ''){ ?><li><a href="<?php echo ot_get_option( 'feature_link_5' ) ?>"><img src="<?php echo ot_get_option( 'feature_image_5' ); ?>"/><p><?php echo ot_get_option( 'feature_text_5' ); ?></p></a></li><?php } ?>
	</ul>
	
</div>
<?php } ?>
<div id="content">
	<div class="info home-special-content">
		<article class="primary-content" id="">

	
		
        <article class="article-archive first-post" id="post-49">
                	                	  <h1>Hi, I'm Ben</h1>
												  <div class="home-summary">
			                
					<img id="home-image-about" src="http://www.improbablecollections.com/img/ben-jones.jpg" class="attachment-flozo-thumb wp-post-image" alt="Ben Jones">
                	                	
					<div id="home-about-text"><p>In my available time I make Web Apps, hitchhike long distances, explore strange museums, take photos of horses' eyes and learn languages. I'm currently living in Berlin.</p>
					
					<p>If you'd like to get in touch about a project or anything else, please feel free to email ben.p.s[at]gmail.com</p>
					
					</div>
                                  </div>
		</article>

		

</article>
		</div>

		<div class="country">
		<h2><span style="background-color:<?php echo ot_get_option( 'main_colour' ); ?>;">Projects</span></h2>
		<ul>
		<?php
		$args = array( 'post_type' => 'country', 'posts_per_page' => 6 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		
		$count++;
		$class = ($count % 3 == 1) ? 'first' : '';
		
			echo '<li class="'.$class.'">';			
			echo '<a href="';
			the_permalink();
			echo '" alt="">';
			echo '<div class="overlay" style="background-color:'.ot_get_option( 'main_colour' ).';"></div>';
			the_post_thumbnail('flozo-thumb');			
			echo '<h3 style="border-bottom:2px solid '.ot_get_option( 'main_colour' ).';">';
			the_title();
			echo '</h3>';
			echo limit_words(get_the_excerpt(), '30');
			echo '...</a>';
			echo '</li>';
		endwhile;
		?>
		</ul>
		</div>
	
		
		
	</div>
<?php get_footer(); ?>