<?php


/*** Option Tree code ***/
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
include_once( 'includes/theme-options.php' );
/*** Option Tree end ***/

function limit_words($string, $word_limit) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
 
	$words = explode(' ', $string);
 
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
 
	return implode(' ', array_slice($words, 0, $word_limit));
 
}


add_theme_support( 'menus' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

add_action('init', 'country_register');   

function country_register() {   

	$labels = array( 
		'name' => _x('Country', 'post type general name'), 
		'singular_name' => _x('Country Item', 'post type singular name'), 
		'add_new' => _x('Add New', 'country item'), 
		'add_new_item' => __('Add New Country Item'), 
		'edit_item' => __('Edit Country Item'), 
		'new_item' => __('New Country Item'), 
		'view_item' => __('View Country Item'), 
		'search_items' => __('Search Country'), 
		'not_found' => __('Nothing found'), 
		'not_found_in_trash' => __('Nothing found in Trash'), 
		'parent_item_colon' => '' 
	);   
	
	$args = array( 
		'labels' => $labels, 
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'query_var' => true, 
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png', 
		'rewrite' => true, 'capability_type' => 'post', 
		'hierarchical' => false, 
		'menu_position' => null, 
		'supports' => array('title','editor','thumbnail') 
	);   
	
	register_post_type( 'country' , $args ); 
	
	//register_taxonomy("categories", array("country"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true));
	
	
	
}
	
	
add_action('init', 'toolbox_register'); 
	
	function toolbox_register() {   

	$labels = array( 
		'name' => _x('Toolbox', 'post type general name'), 
		'singular_name' => _x('Toolbox Item', 'post type singular name'), 
		'add_new' => _x('Add New', 'toolbox item'), 
		'add_new_item' => __('Add New Toolbox Item'), 
		'edit_item' => __('Edit Toolbox Item'), 
		'new_item' => __('New Toolbox Item'), 
		'view_item' => __('View Toolbox Item'), 
		'search_items' => __('Search Toolbox'), 
		'not_found' => __('Nothing found'), 
		'not_found_in_trash' => __('Nothing found in Trash'), 
		'parent_item_colon' => '' 
	);   
	
	$args = array( 
		'labels' => $labels, 
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'query_var' => true, 
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png', 
		'rewrite' => true, 'capability_type' => 'post', 
		'hierarchical' => false, 
		'menu_position' => null, 
		'supports' => array('title','editor','thumbnail') 
	);   
	
	register_post_type( 'toolbox' , $args );
	
	//register_taxonomy("categories", array("country"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true));
	
	
	
}



	
add_action('init', 'language_register'); 
	
	function language_register() {   

	$labels = array( 
		'name' => _x('Language', 'post type general name'), 
		'singular_name' => _x('Language', 'post type singular name'), 
		'add_new' => _x('Add New', 'language item'), 
		'add_new_item' => __('Add New Language Item'), 
		'edit_item' => __('Edit Language Item'), 
		'new_item' => __('New Language Item'), 
		'view_item' => __('View Language Item'), 
		'search_items' => __('Search Language'),
		'not_found' => __('Nothing found'), 
		'not_found_in_trash' => __('Nothing found in Trash'), 
		'parent_item_colon' => '' 
	);   
	
	$args = array( 
		'labels' => $labels, 
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'query_var' => true, 
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png', 
		'rewrite' => true, 'capability_type' => 'post', 
		'hierarchical' => false, 
		'menu_position' => null, 
		'supports' => array('title','editor','thumbnail') 
	);   
	
	register_post_type( 'language' , $args );
	
	//register_taxonomy("categories", array("country"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true));
	
	
	
}



add_action('init', 'feature_register'); 
	
	function feature_register() {   

	$labels = array( 
		'name' => _x('Feature', 'post type general name'), 
		'singular_name' => _x('Feature', 'post type singular name'), 
		'add_new' => _x('Add New', 'feature item'), 
		'add_new_item' => __('Add New Feature Item'), 
		'edit_item' => __('Edit Feature Item'), 
		'new_item' => __('New Feature Item'), 
		'view_item' => __('View Feature Item'), 
		'search_items' => __('Search Feature'),
		'not_found' => __('Nothing found'), 
		'not_found_in_trash' => __('Nothing found in Trash'), 
		'parent_item_colon' => '' 
	);   
	
	$args = array( 
		'labels' => $labels, 
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'query_var' => true, 
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png', 
		'rewrite' => true, 'capability_type' => 'post', 
		'hierarchical' => false, 
		'menu_position' => null, 
		'supports' => array('title','editor','thumbnail'),
		'taxonomies' => array('category')
	);   
	
	register_post_type( 'feature' , $args );
	
	//register_taxonomy("categories", array("country"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true));
	
	
	
}











function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div>

		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), ' ' );
			?>
		</div>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
	<?php

		break;
	endswitch;
}



// Custom functions 

// START : Show word count on blog post pages
// See more about the word count and reading time here http://www.welcomebrand.co.uk/blog/2010/12/12/wordpress-reading-time-and-word-count/
function show_post_word_count(){
    ob_start();
    the_content();
    $content = ob_get_clean();
    return sizeof(explode(" ", $content));
}
// END : Show word count

// START : Estimated reading time on blog post pages
if (!function_exists('est_read_time')):
function est_read_time( $return = false) {
	$wordcount = round(str_word_count(get_the_content()), -2);
	$minutes_fast = ceil($wordcount / 250);
	$minutes_slow = ceil($wordcount / 170);
 
	if ($wordcount <= 100) {
		$output = __("< 1 minute");
	} else {
		$output = sprintf(__("%s - %s minutes"), $minutes_fast, $minutes_slow);
	}
	echo $output;
}
endif;
 
if (!function_exists('est_the_content')):
function est_the_content( $orig ) {
	// Prepend the reading time to the post content
	return est_read_time(true) . "\n\n" . $orig;
}
endif;
// END : Estimated reading time


// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security 

add_theme_support('post-thumbnails');

add_image_size( 'flozo-thumb', 284, 200, true );

add_shortcode('gallery', 'new_gallery_shortcode');

function new_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'large',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$output.= "<script class=\"secret-source\">
		jQuery(document).ready(function($) {
			$('.gallery').bjqs({
				height      : 391,
				width       : 604,
				responsive  : true,
				showmarkers : false,
				usecaptions : false,
				animtype    : 'slide',
				randomstart : false
			});
		});
	</script>
	<div class=\"gallery\">
	<ul class=\"bjqs\">\r\n";
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		$output.= "\t\t".'<li>'.$link.'<p>'.wptexturize($attachment->post_excerpt).'</p></li>'."\r\n";
	}

	$output.= "\t</ul>
	</div>";

	return $output;
	
	
	

}


	//My Stuff
	
	
	
	//Country
	function do_intro(){
	echo '<!--The Intro-->';
	echo '<div id="country-intro" class="country-section">';
	echo get_post_meta(get_the_ID(), "country_intro", true);
	echo '</div>';
	}
	
	
	function do_food(){
	
	$font = "h2";
	
	echo '<!--The Food-->';
	echo '<div id="country-food" class="country-section">';
	echo '<'.$font.'>';
	echo 'Food, Drink and Nightlife in ';
	echo get_post_meta(get_the_ID(), "country_name", true);
	echo '</'.$font.'>';
	echo '<p>';
	echo get_post_meta(get_the_ID(), "country_food", true);
	echo '</p>';
	echo '</div>';
	}
	
	function do_tips(){
	
	$font = "h2";
	
	echo '<!--The Tips-->';
	echo '<div id="country-tips" class="country-section">';
	echo '<'.$font.'>';
	echo get_post_meta(get_the_ID(), "country_name", true);
	echo ' Travel Tips & Advice';
	echo '</'.$font.'>';
	echo '<p>';
	echo get_post_meta(get_the_ID(), "country_tips", true);
	echo '</p>';
	echo '</div>';
	}
	
	
	function do_recommended(){
	
	$font = "h2";
	
	echo '<!--The Recommended Reading-->';
	echo '<div id="country-recommended" class="country-section">';
	echo '<'.$font.'>';
	echo 'Recommended books and films for ';
	echo get_post_meta(get_the_ID(), "country_name", true);
	echo '</'.$font.'>';
	echo '<p>';
	echo get_post_meta(get_the_ID(), "country_recommended", true);
	echo '</p>';
	echo '</div>';
	}
	
	function do_comment_prompt(){
	
	$font = "h2";
	
	echo '<!--The Comment Props-->';
	echo '<div id="comment-prompt" class="">';
	echo get_post_meta(get_the_ID(), "comment_prompt", true);
	echo '</div>';
	}
	
	
	function do_top_things(){
	
	$font = "h2";
	
	echo '<!--The Top Things-->';
	echo '<div id="country-top" class="country-section">';
	echo '<'.$font.'>';
	echo 'Top things to see and do in  ';
	echo get_post_meta(get_the_ID(), "country_name", true);
	echo '</'.$font.'>';
	
	for ($i=1; $i<=5; $i++)
	  {
	  do_top_thing($i);
	  }
	  
	do_top_alternative(); 
	
	echo '</div>';
	}
	
	function do_top_thing($number){
	
	$key_thing = "top_thing_".$number;
	$key_description = "top_description_".$number;
	
	echo "<h3>";
	echo $number.'. ';
	echo get_post_meta(get_the_ID(), $key_thing, true);
	echo "</h3>";
	
	echo "<p>";
	echo get_post_meta(get_the_ID(), $key_description, true);
	echo "</p>";
	}
	
	function do_top_alternative(){
	
	$key_thing = "top_thing_6";
	$key_description = "top_description_6";
	
	echo "<h3>";
	echo 'Alternative Option: ';
	echo get_post_meta(get_the_ID(), $key_thing, true);
	echo "</h3>";
	
	echo "<p>";
	echo get_post_meta(get_the_ID(), $key_description, true);
	echo "</p>";
	}
	
	function do_country_meta($country_code){

	$con = mysql_connect('benjaminpeterjonesco.ipagemysql.com', 'wrdWudlWo6p', 'k1a8BDe5MV','wrd_2ogaka3mfh'); 
	if (!$con) {
	/*
	do_country_meta(get_post_meta(get_the_ID(), 'country_2_letter_code', true));
	
	$result = mysqli_query($con,"SELECT * FROM country_info WHERE country_code=".$country_code.'"');
*/
	echo 'success 2';
	}
	else
	{
	echo 'fail';
	}
	}
	
	
	function do_language(){
	echo '<!--The Language-->';
	echo '<div id="country-language" class="meta-item">';
	echo '<span class="icon-comment"></span> ';
	echo '<span class="meta-label">';
	echo 'Language: ';
	echo '</span>';
	echo get_post_meta(get_the_ID(), 'country_language', true);
	echo '</div>';
	}
	
	function do_currency(){
	echo '<!--The Currency-->';
	echo '<div id="country-currency" class="meta-item">';
	echo '<span class="icon-money"></span> ';
	echo '<span class="meta-label">';
	echo 'Currency: ';
	echo '</span>';
	echo get_post_meta(get_the_ID(), 'country_currency', true);
	echo '</div>';
	}
	
	function do_capital(){
	echo '<!--The Capital-->';
	echo '<div id="country-capital" class="meta-item">';
	echo '<span class="icon-certificate"></span> ';
	echo '<span class="meta-label">';
	echo 'Capital: ';
	echo '</span>';
	echo get_post_meta(get_the_ID(), 'country_capital', true);
	echo '</div>';
	}
	
	function do_cost(){
	echo '<!--The Cost-->';
	echo '<div title="Based on a backpacker\'s budget" id="country-cost" class="meta-item tooltipster">';
	echo '<span class="icon-tag"></span> ';
	echo '<span class="meta-label">';
	echo 'Cost: ';
	echo '</span>';
	echo '$';
	echo get_post_meta(get_the_ID(), 'country_cost', true);
	echo '</div>';
	}
	
	function do_meta(){
	echo '<div id="country-meta" class="country-section">';
	do_language();
	do_capital();
	do_currency();
	do_cost();
	echo '</div>';
	}
	
	function map_1(){
	echo '["';
	echo get_post_meta(get_the_ID(), 'top_thing_1', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_1_lat', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_1_lon', true);
	echo '","';
	echo '"]';
	}
	
	function map_2(){
	echo '["';
	echo get_post_meta(get_the_ID(), 'top_thing_2', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_2_lat', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_2_lon', true);
	echo '","';
	echo '"]';
	}
	
	function map_3(){
	echo '["';
	echo get_post_meta(get_the_ID(), 'top_thing_3', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_3_lat', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_3_lon', true);
	echo '","';
	echo '"]';
	}
	
	
		
	function map_4(){
	echo '["';
	echo get_post_meta(get_the_ID(), 'top_thing_4', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_4_lat', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_4_lon', true);
	echo '","';
	echo '"]';
	}
	
			
	function map_5(){
	echo '["';
	echo get_post_meta(get_the_ID(), 'top_thing_5', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_5_lat', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_5_lon', true);
	echo '","';
	echo '"]';
	}
	
	function map_6(){
	echo '["';
	echo get_post_meta(get_the_ID(), 'top_thing_6', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_6_lat', true);
	echo '","';
	echo get_post_meta(get_the_ID(), 'top_thing_6_lon', true);
	echo '","';
	echo 'alternative';
	echo '"]';
	}
	

	
	function do_map_locations(){
	echo '<script>';
	echo 'locations = [];';
	echo 'locations =';
	echo '[';
	map_1();
	echo ',';
	map_2();
	echo ',';
	map_3();
	echo ',';
	map_4();
	echo ',';
	map_5();
	echo ',';
	map_6();
	echo ']';
	echo '</script>';
	}
	
	function do_map_variables(){
	do_initial_lat();
	do_initial_lon();
	do_initial_zoom();
	}
	
	function do_initial_lat(){
	do_initial_lat();
	do_initial_lon();
	do_initial_zoom();
	}
	
	function get_country(){
	echo "'";
	echo get_post_meta(get_the_ID(), 'country_name', true);
	echo "'";
	}
	
	
	function get_country_short(){
	echo get_post_meta(get_the_ID(), 'country_short', true);
	}
	
	
	function get_big_image(){
		$image_id = get_post_meta(get_the_ID(), 'big_image', true);
		$image_array = wp_get_attachment_image_src($image_id, 'large');
		$image_src = $image_array[0];
		$image_css = "url('".$image_src."')";
		
		echo $image_css;
	}
	
	
		function get_features($country_code){
		echo '<script>';
		echo 'locations = [];';
		echo '</script>';
		
		echo '<h2>Top things to see and do in Argentina</h2>';
		echo '<p>A list of the top things to see and do in ';
		echo get_post_meta(get_the_ID(), "country_name", true);
		echo ', voted for by you</p>';
		echo '<ul>';

		
				$args = array( 
				
				'post_type' => 'feature',
				
				'meta_query' => array(
					array  (
						'numberposts'     => -1, //get all posts, or set a number here
						'key' => 'country_code',
						'value'=> $country_code,
						'orderby'  => 'meta_value', //this will look at the meta_key you set below,
						'meta_key'        => 'feature_points'
						)
					),
					
				'posts_per_page' => 9 );
	$loop = new WP_Query( $args );
	
	$count = 0;
	
	while ( $loop->have_posts() ) : $loop->the_post();
		
		$count++;
		$class = ($count % 3 == 1) ? 'first' : '';

		echo '<li class="feature '.$class.'">';
		echo '<a href="';
		the_permalink();
		echo '">';
		echo '<div class="overlay" style="background-color:'.ot_get_option( 'main_colour' ).';"></div>';
		the_post_thumbnail('flozo-thumb');
		echo '</a>';
		
		echo '<br />';
		
		echo '<h3><a href="';
		the_permalink();
		echo '">';
		echo $count.'. ';
		the_title();
		echo '</a></h3>';
		
		echo '<div class="entry-content">';
		echo get_post_meta(get_the_ID(), 'feature_short', true);
		echo '</div>';
		echo '</li>';
		
			//Get Loctions
	
		echo "\n";
		echo '<script>';
		echo ' feature = [];';
		echo "\n";
		echo 'feature = ["';
		
		echo the_title();
		echo '","';
		echo get_post_meta(get_the_ID(), 'feature_lat', true);
		echo '","';
		echo get_post_meta(get_the_ID(), 'feature_lon', true);
		echo '","';
		echo 'feature';			
		echo '","';
		echo the_permalink();	
		echo '"];';
		echo 'locations.push(feature)';
		
		echo get_post_meta(get_the_ID(), 'top_thing_1', true);
		
		echo '</script>';
		
		
	endwhile;
	echo '</ul>';
	

	
				}