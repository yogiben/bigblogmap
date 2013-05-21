<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true); 
	} else {
	bloginfo('name'); echo " - "; bloginfo('description');
	}
?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<!--Bootstrap-->
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">

<!-- The little things -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="icon" type="image/png" href="<?php echo bloginfo('template_directory'); ?>/assets/images/favicon.png" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
<!-- The little things -->
	
<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="all" />
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/bjqs.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/tooltipster.css">
	<link href="<?php echo bloginfo('template_directory'); ?>/bootstrap.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	
<!-- Stylesheets -->

<!-- Load scripts quick smart -->
	<script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/modernizr-2.0.6.js"></script>
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="<?php echo bloginfo('template_directory'); ?>/js/bjqs-1.3.min.js"></script>
	<script src="<?php echo bloginfo('template_directory'); ?>/js/common.js"></script>
	<script src="<?php echo bloginfo('template_directory'); ?>/js/tooltipster.js"></script>
	
	<script src="<?php echo bloginfo('template_directory'); ?>/js/my.js"></script>
	 
    <!--[if (lt IE 9) & (!IEMobile)]>
		<script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/respond.js"></script>
		<script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/selectivizr-min.js"></script>
	<![endif]-->
<!-- Load scripts quick smart -->

<style type="text/css">
	ul#menu-main, li.bjqs-prev a, li.bjqs-next a{
		background-color: <?php echo ot_get_option( 'main_colour' ) ?>;	
	}
	#content .blog ul li a:hover, p.entry-meta, .entry-summary h2 a:hover{
		color: <?php echo ot_get_option( 'main_colour' ) ?>;
	}
	#content .country ul li h3, #content .country ul li h2{
		border-color: <?php echo ot_get_option( 'main_colour' ) ?>;
		
	}
	::selection {background: <?php echo ot_get_option( 'main_colour' ) ?>; color: #fff}
	::-moz-selection {background:<?php echo ot_get_option( 'main_colour' ) ?>; color: #fff}
	
	::selection {background: <?php echo ot_get_option( 'main_colour' ) ?>; color: #fff}
	.sub-navigation li a:hover, ul li.current_page_item {
		background: <?php echo ot_get_option( 'main_colour' ) ?>; color: #fff
	}
	li.comment{
		border-bottom: 3px solid <?php echo ot_get_option( 'main_colour' ) ?>;
	}
	
</style>

<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

<?php wp_deregister_script('jquery');wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">
    <header role="banner" style="border-top:2px solid <?php echo ot_get_option( 'main_colour' ) ?>;">
        
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo"><img src="<?php echo ot_get_option( 'logo' ); ?>"/></a>
        <p class="tagline"><?php bloginfo( 'description' ); ?></p>
      <ul class="social">
      	<?php if(ot_get_option( 'linkedin_url' ) != ''){ ?><li><a href="<?php echo ot_get_option( 'linkedin_url' ); ?>" class="rss"></a></li><?php } ?>
      	<?php if(ot_get_option( 'twitter_handle' ) != ''){ ?><li><a href="http://twitter.com/<?php echo ot_get_option( 'twitter_handle' ); ?>" class="twitter"></a></li><?php } ?>
      	<?php if(ot_get_option( 'facebook_url' ) != ''){ ?><li><a href="<?php echo ot_get_option( 'facebook_url' ); ?>" class="facebook"></a></li><?php } ?>
      </ul>
      <div class="contact">
      	<?php if(ot_get_option( 'phone_no' ) != ''){ ?><p><span class="tel-number" style="color:<?php echo ot_get_option( 'main_colour' ); ?>;"><?php echo ot_get_option( 'phone_no' ); ?></span><span class="call-us-on">Call Us On</span></p><?php } ?>
      </div>
    </header>
   <?php $args = array( 'menu' => 'mainnav', 'container' => false, 'menu_id' => false); wp_nav_menu($args); ?> 
	