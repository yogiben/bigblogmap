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
	<div id="content" class="country">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="info">
	        <article id="country-<?php the_ID(); ?>" class="primary-content">
	            <header>
	                <h1><?php the_title(); ?></h1>
	            </header>
				
				<?php the_post_thumbnail('flozo-thumb');?>
				
	            <div class="the-content">
					<?php the_content(); ?>
					
					
				<!--Country Meta-->
				<?php //do_country_meta(get_post_meta(get_the_ID(), 'country_2_letter_code', true));?>

				
				<?php do_meta(); ?>
					
					
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
