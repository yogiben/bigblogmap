<script src="https://maps.googleapis.com/maps/api/js?libraries=panoramio&sensor=false"></script>

<script>



initialLat = -36.137875;
initialLon = -60.117188;

initialLat = getCountryLat('<?php echo get_post_meta(get_the_ID(), "country_name", true);?>');
initialLon = getCountryLon('<?php echo get_post_meta(get_the_ID(), "country_name", true);?>');


  </script>


<script>
//Variables for Map

initialZoom = 3;
</script>

<script src="<?php echo home_url(); ?>/wp-content/custom-js/map.js"></script>

<?php do_map_locations();?>

<script>
	  var mapOptions = {
		  zoom: initialZoom,
          center: new google.maps.LatLng(initialLat,initialLng),
		  
		  minZoom: 2,
		  panControl: false,
      }
	  
	  
</script>





<?php get_header(); ?>


		<div id="top-image-container" style="background-image:<?php get_big_image();?>">
				<header id="title">
				<div id="title-inner">
					<h1><?php the_title(); ?></h1>
					<h2>Travel Tips and Blogs</h2>
					<big><?php get_country_short()?></big>
					<?php do_meta(); ?>
				</div>
			</header>
			
			
				<div id="interaction" class="false">
				
					<div id="interaction-experience" class="checked">
				
				
				<!--False-->
				
					
					<div class="btn-collection btn-group btn-large" id="btn-collection-false">
					
						  <a title="I've been here" class="btn btn-success btn-large btn-visited tooltipster" href="#"><i class="icon-check-empty"></i> I've been here</a>
						  <a class="btn btn-success dropdown-toggle btn-large" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a class="btn-wants" href="#"><i class="icon-star"></i> I want to go here</a></li>
							<li class="divider"></li>
							<li><a class="btn-false" href="#"><i class="icon-cross"></i> Clear</a></li>
						  </ul>
						  
					</div>
					
					
					
					
					<!--Been Here-->
				
					<div class="btn-collection btn-group btn-large" id="btn-collection-visited">
					
						  <a class="btn btn-success btn-large" href="#"><i class="icon-check"></i> I've been here</a>
						  <a class="btn btn-success dropdown-toggle btn-large" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="#" class="btn-wants"><i class="icon-star"></i> I want to go here</a></li>
							<li class="divider"></li>
							<li><a href="#" class="btn-false"><i class="icon-cross"></i> Clear</a></li>
						  </ul>
						  
					</div>
					
					
					<!--Btn wants-->
					<div class="btn-collection btn-group btn-large" id="btn-collection-wants">
					
						  <a class="btn btn-success btn-large" href="#"><i class="icon-star"></i> I want to go</a>
						  <a class="btn btn-success dropdown-toggle btn-large" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="#" class="btn-visited"><i class="icon-check"></i> I've been here</a></li>
							<li class="divider"></li>
							<li><a href="#" class="btn-false"><i class="icon-cross"></i> Clear</a></li>
						  </ul>
						  
					</div>
					
						  
					</div>
						
						
						<!--Star of Opinion-->
						
						<div id="interaction-opinion" class="btn-toolbar">
						  <div class="btn-group btn-large">
							<a title="Recommendable" class="btn btn-large interaction-opinion-btn interaction-opinion-1 tooltipster" href="#"><i class="icon-plane"></i></a>
							<a title="Good times!" class="btn btn-large interaction-opinion-btn interaction-opinion-2 tooltipster" href="#"><i class="icon-plane"></i><i class="icon-plane"></i></a>
							<a title="Double Rainbow Awesome" class="btn btn-large interaction-opinion-btn interaction-opinion-3 tooltipster" href="#"><i class="icon-rocket"></i><i class="icon-rocket"></i><i class="icon-rocket"></i></a>
						  </div>
						</div>
						
						
						
						
						
					</div><!-- End of Country Interaction-->
					
					
					
				
				
		</div>
		
		
<div id="content-container">
	<div id="content" class="country">
	<!--Start of First Loop-->
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php 
	global $country_code;
	$country_code =  get_post_meta(get_the_ID(), "country_2_letter_code", true);
	$country_code =  strtoupper($country_code);
	?>
		<div class="info">
	        <article id="country-<?php the_ID(); ?>" class="primary-content">
				
				<?php the_post_thumbnail('flozo-thumb');?>
				
	            <div class="the-content">
					<?php the_content(); ?>
					
					
				<!--Country Meta-->
				<?php //do_country_meta(get_post_meta(get_the_ID(), 'country_2_letter_code', true));?>

				
					
					
				<!--intro-->
				<?php do_intro();?>
				
				<!--Map Canvas-->
				<div id="map-canvas"></div>
				<a onclick="onPanoramio()" id="photos-on"><i class="icon-camera"></i>Turn Photos On</a>
				<a onclick="offPanoramio()" id="photos-off"><i class="icon-camera"></i>Turn Photos Off</a>
				
				
				<!--Top Things-->
				<?php do_top_things();?>
				
				
				

				
				<!--Food-->
				<?php do_food();?>
				
				<!--Tips-->
				<?php do_tips();?>
				
				<!--Do Recommeded Reading-->
				<?php do_recommended();?>
				
				
				<?php do_comment_prompt();?>
				
				
	            </div>
				
	            
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
	
	            
	
	

	<?php endwhile; // end of the loop. ?>
	
	
	
	
					<!--Features-->
		<?php get_features($country_code); ?>
			
				
	    
	            
	        </article>
				<?php comments_template( '', true ); ?>
	    </div> 
	
	
	
	
	

	
	
	
   </div>
   <div id="sidebar">
	<?php get_sidebar( $name ); ?>
	</div>
</div><!--End of content Container-->
<?php get_footer(); ?>







<script>

popupContent = "default";
contentString = "default";

var popup = new google.maps.InfoWindow({
    content: popupContent
});

var infowindow = new google.maps.InfoWindow({
    content: contentString
});

function codeAddress(address) {
geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
	  console.log(results[0].geometry.location.kb);
    } else {
    }
  $('#map-canvas').css('opacity',1);
  });
  
  console.log('coded address');
    
}




$(document).ready(function() {

//Hide map until country lat/lon are good
  
  $('#map-canvas').css('opacity',0);

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
			
		var markers = [];
        for (i = 0; i < locations.length; i++) {
		
		
		 //CREATION
		
		 
		marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		title: locations[i][0],
		icon: 'http://bigblogmap.com/icons/star.png',
		shadow: new google.maps.MarkerImage(
                'icons/' + locations[i][3]+'Shadow.png',
                null, null, new google.maps.Point(16, 34))
      });
	  
	  markers.push(marker);
	  
	  //Mouseover
	  google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
			
		
		  var popupContent = '<h3>' + locations[i][0]+'</h3>';
		  
          popup.setContent(popupContent);
          popup.open(map, marker);
		}
		
		})(marker, i));
	  
	  
	  //Mouseout
	  	google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
        return function() {
		  popup.close(map,marker);

        }

		})(marker, i));
	  
	  }//End For
	  
	  
	  
	  
	  codeAddress(<?php get_country();?>);
});



//Javascript for Map
var panoramioLayer = new google.maps.panoramio.PanoramioLayer();
	
		function onPanoramio(){
		panoramioLayer.setMap(map);
		$('#photos-on').hide();
		$('#photos-off').show();
		
		$('#blog-index').attr('photos','1');
		}
		
		function offPanoramio(){
		panoramioLayer.setMap(null);
		
		$('#photos-on').show();
		$('#photos-off').hide();
		
		$('#blog-index').attr('photos','0');
		}
		
		$('#photos-off').hide();
		
		
		
		function getCountryLat(country){
geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': country}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
	  initialLat = results[0].geometry.location.kb;
	  return initialLat;
	  console.log(initialLat);
    } else {
	return -36.137875;
    }
	
  });
  
  return initialLat;
  }
  
  
  function getCountryLon(country){
geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': country}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
	  initialLon = results[0].geometry.location.lb;
	  console.log(initialLon);
	  return initialLon;
    } else {
	return -60;
    }
	
  });
  
  return initialLon;
  }

	  
</script>
