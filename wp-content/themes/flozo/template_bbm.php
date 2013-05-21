<?php /* Template Name: Map	  */ ?>
<html><?php $options = get_option('ozh_sample'); ?>

<?php 


$fullName= get_bloginfo();

$mapUrl=$options[mapUrl];

$siteUrl=home_url();

$logoUrl=$options[logoUrl];
$iconUrl=$options[iconUrl];

$twitterHandle=$options[twitterHandle];
$twitter="@".$twitterHandle;
$twitterUrl="http://twitter.com/".$twitterHandle;

$bbmDirectory = plugins_url() . "/blog-map/bbm-resources/";

?>






  <head>
    <title><?php echo $fullName?> - Blog Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" content="text/html;charset=utf-8">
	<meta name="description" content="<?php echo $fullName ?> Blog Map">
    <style>
      html, body, #map_canvas {
        margin: 0;
        padding: 0;
        height: 100%;
      }
    </style>
	
	<script>
	//PHP Variables
	
	var mapUrl = "<?php echo $mapUrl?>";
	
	var siteUrl = "<?php echo $siteUrl?>";
	
	var twitterHandle = "<?php echo $twitterHandle?>";
	
	
	
	
	
	<?php
	$args = array( 'post_type' => 'post', 'posts_per_page' => 200 );
	$loop = new WP_Query( $args );
	$count = 0;
	echo 'locations = [';
	while ( $loop->have_posts() ) : $loop->the_post();
		
		$count++;
		
		$post_id = get_the_ID();
		
		/*echo '[';
		
		echo '"'.get_the_title().'"';
		echo ',';
		

	$key = "lat";
	$single = true;

	$meta_values = get_post_meta(get_the_ID(), $key, $single);
	$lat = get_post_meta(get_the_ID(), $key, $single);
	
	echo $meta_values;

	echo ',';

	$key = "lon";
	$single = true;

	$meta_values = get_post_meta(get_the_ID(), $key, $single);
	$lon = get_post_meta(get_the_ID(), $key, $single);
	
		echo $meta_values;
		
		echo ',';
		echo '"'.get_permalink($post_id).'"';
		echo "]";
		*/
		$key = "lat";
		$lat = get_post_meta(get_the_ID(), $key, $single);
		
		$key = "lon";
		$lon = get_post_meta(get_the_ID(), $key, $single);
		
		$row = '['.'"'.get_the_title().'"'.','.$lat.','.$lon.','.'"blog"'.','.'"'.get_permalink($post_id).'"'.'],';
		
		$rows = $rows . $row;
		
	endwhile;
	
	$rows = rtrim($rows, ",");
	
	echo $rows;
	
	echo ']';
	
?>
	


	</script>
	
	<!--<link rel="icon" type="image/x-icon" href="img/favicon.ico" />-->
	<!--<link rel="shortcut icon" href="http://travelsofadam.com/favicon.ico" type="image/x-icon" />-->
	
	<script src="<?php echo $bbmDirectory?>js/jquery.js"></script>
	
	  <script src="<?php echo $bbmDirectory?>js/markerclusterer.js" type="text/javascript"></script>

	
	
	<link rel="stylesheet" href="<?php echo $bbmDirectory?>bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $bbmDirectory?>css/css.css">
	<link rel="stylesheet" href="<?php echo $bbmDirectory?>css/infowindow.css">
	<link rel="stylesheet" href="<?php echo $bbmDirectory?>css/display.css">
	
	<link rel="stylesheet" href="<?php echo $bbmDirectory?>fontawesome/css/font-awesome.css">
	
    <script src="https://maps.googleapis.com/maps/api/js?libraries=panoramio&sensor=false"></script>

	
	<script src="<?php echo $bbmDirectory?>js/icons.js">
	</script>
	
	
	<script src="<?php echo $bbmDirectory?>js/data.js">
	</script>
	
	
	
	<script>
	  var csvOptions = {separator:"`"};
	  
	  var categories = [];
	  var mcOptions = {maxZoom: 8, zoomOnClick:false, title:"There are multiple blogs. Zoom in to read."};
	  
	</script>
	
   
	



	
  </head>
  <body>
  <?php echo $meta_values;?>

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container" id="nav-bar-container">


	
		  <a class="brand" href="<?php echo $siteUrl ?>" ><img id="brand-image" alt="" src="<?php echo $logoUrl?>"></img><span></span></a>
		
          <div class="nav-collapse collapse visible-desktop">
            <ul class="nav" id="nav-buttons">
              <li class="">
                <a title data-original-title="Random Blog (r)" data-toggle="tooltip" data-placement="bottom" onclick="randomBlog();"><i class="icon-random"></i></a>
              </li>
			  <li>
			  <a onclick="onPanoramio()" id="photos-on" data-toggle="tooltip" data-placement="bottom" title data-original-title="Turn photos on (p)" class=""><i class="icon-camera"></i></a>
			  <a onclick="offPanoramio()" id="photos-off" data-toggle="tooltip" data-placement="bottom" title data-original-title="Turn photos off (p)" class="invisible"><i class="icon-camera"></i></a>
			  </li>
				<div class="on-loaded addthis_toolbox addthis_default_style ">
				
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="" data-text="<?php echo $fullName?> Blog Map" data-via="<?php twitterHandle?>">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


				
				</div>


			  <!--<div class="btn-group visible-desktop" id="category-div" style="">
				  <a class="btn dropdown-toggle" id="category-top" data-toggle="dropdown" href="#">
					All Blogs <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
					<li><a  title="Travel Blogs" onclick="reloadMap('all');categoryButton('All Blogs');"><i class="icon-star"></i>All Blogs</a></li>
					<li><a onclick="reloadMap('hotels');categoryButton('Hotels');" >Hotel Reviews</a></li>
					<li><a onclick="reloadMap('gay');categoryButton('Gay Travel');" >Gay Travel	</a></li>
					<li><a onclick="reloadMap('food');categoryButton('Food and Drink');" >Food and Drink</a></li>
					<li><a onclick="reloadMap('art');categoryButton('Art and Culture');" >Art and Culture</a></li>
					<li><a onclick="reloadMap('music');categoryButton('Music Festivals');" >Music Festivals</a></li>
					<li><a onclick="reloadMap('city');categoryButton('City Guides');" >City Guides</a></li>
				  </ul>
			  </div>-->
			  
            </ul>
          </div>
		  <a title="View this blog in a new window" id="btn-close-link" href="http://www.bigblogmap.com">
			X
		  </a>
		  <div class="social-tab visible-desktop" id="social-tab">
		  
		  <span class="social-share-button"><a class="facebook" title="Share this blog on Facebook" id="facebook-social-bar" href="http://www.facebook.com/sharer/sharer.php?u=http://bigblogmap.com/#'+i+'" target="_blank"><i class="icon-facebook"></i></a>   <a class="twitter" title="Share this blog on Twitter" id="twitter-social-bar" href="https://twitter.com/share?url=&text=Travel%20Blogs%20presented%20Geographically%20@BigBlogMap.%20http://www.bigblogmap.com/%23'+i+'" target="_blank"><i class="icon-twitter"></i></a>   <a class="google_plus" title="Share this blog on Google Plus" id="google-social-bar" href="https://plus.google.com/share?url=http://www.bigblogmap.com/#'+i+'" target="_blank"><i class="icon-google-plus"></i></a></span>
		  <a title="Close this tab (esc)" id="btn-back-x" onclick="closeIframe()">
			<img src="<?php echo $bbmDirectory?>img/close.png"></img>
		  </a>
		  
		  </div>
        </div>
      </div>
    </div>

<textarea style="display:none" id="blog-database" > <?php include 'http://bigblogmap.com/data/append.csv'; ?>
</textarea>

<!--
<div id="sidebar-container-2" class="on-loaded-2 sidebar-container visible-desktop">
	<div class="sidebar-inner">
	<h1>Recent Blogs</h1>
		<a id="recent-blog-link-1" onclick="panAndOpen(360)">
		<div class="recent-blog" id="recent-blog-1">
			<h2 id="recent-blog-title-1">Blog one</h2>
			<p id="recent-blog-meta-1"></h2>
		</div>
		</a>
		
		<a id="recent-blog-link-2" onclick="panAndOpen(360)">
		<div class="recent-blog" id="recent-blog-2">
			<h2 id="recent-blog-title-2"></h2>
			<p id="recent-blog-meta-2"></h2>
		</div>
		</a>
		
		<a id="recent-blog-link-3" onclick="panAndOpen(360)">
		<div class="recent-blog" id="recent-blog-3">
			<h2 id="recent-blog-title-3"></h2>
			<p id="recent-blog-meta-3"></h2>
		</div>
		</a>
		
	</div>
</div>-->



  
    <div id="map_canvas";"></div>
	

	<div id="iframe-container" class="iframe">
	
	
		
		
	</div>
	
<script src="<?php echo $bbmDirectory?>js/functions.js"></script>


<div id="blog-index" value="0" max="1" active="0" firstRun="0" photos="0"></div>

<script>
/*
var random = Math.floor((Math.random()*4)+1);

if (random == 1){

var initialZoom = 5;
var initialLat = 13.969190363512578;
var initialLng = 113.55334727343755;
var locationName = "Southeast Asia";
}

else if (random == 2){

var initialZoom = 5;
var initialLat = 12.938118223864535;
var initialLng = -71.6871312421874;
var locationName = "Central America";
}

else if (random == 3){

var initialZoom = 6;
var initialLat = 41.247202318531876;
var initialLng = -6;
var locationName = "Southern Europe";
}

else if (random == 4){

var initialZoom = 4;
var initialLat = 37.996163;
var initialLng = -110.917969;
var locationName = "North America";
}
*/

var initialZoom = 2;
var initialLat = 34.327960895575146;
var initialLng = 8.54602305468755;
var locationName = "";
	


</script>



 <script>
      var map;
      function initialize() {
	  

		
		
	  
	  var mapOptions = {
		  zoom: initialZoom,
          center: new google.maps.LatLng(initialLat,initialLng),
		  
		  minZoom: 2,
		  panControl: false,

		  
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		      panControl: false,
			  overviewMapControl: true}
		    
	  
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

		var markers = [];
        for (i = 0; i < locations.length; i++) {
		
		
		
		 //CREATION
		 
		 var rnd = Math.floor((Math.random()*3)+1);
		 
		   marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][lat], locations[i][lng]),
        map: map,
		title: locations[i][title],
		icon: '<?php echo $iconUrl ?>',
		//icon: 'icons/icon.png',
		shadow: new google.maps.MarkerImage(
                'icons/' + locations[i][3]+'Shadow.png',
                null, null, new google.maps.Point(16, 34))
      });
	  
	  markers.push(marker);
		

		
		/*Event CLICK*/
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
		  popup.close(map,marker);
		  
		  

		  //INFO Content
		  
		  var infoContentTitle = '<a title="Read this blog" onclick="initializeIframe(&quot;'+locations[i][url]+'&quot;,'+i+')"><h2 class="content-title">'+locations[i][title]+'</h2></a>'; 


		  var infoContentPrompt = '<p class="content-propmt">Click <a  title="'+locations[i][title]+'" onclick="initializeIframe(&quot;'+locations[i][url]+'&quot;,'+i+')">here</a> to read it.</p>';
		 
		  var infoContentSocial = '<span class="content-social"> - <a title="FB this mo fo" href="http://www.facebook.com/sharer/sharer.php?u=http://bigblogmap.com/#'+i+'" target="_blank"><i class="icon-facebook"></i></a>   <a title="Tweet this mo fo" href="https://twitter.com/share?url=&text=Travel%20Blogs%20presented%20Geographically%20@BigBlogMap.%20http://www.bigblogmap.com/%23'+i+'" target="_blank"><i class="icon-twitter"></i></a></span>'

					//Author Url
		  /*
		  if (locations[i][authorUrl] == " " || locations[i][authorUrl] == ""){
		  
		  
		  var infoContentFooter = '<p class="content-footer">by <span class="author-name">'+locations[i][author]+infoContentSocial+'</span></p>';
		  
		  }
		  else
		  {
		  var infoContentFooter = '<p class="content-footer">by <span class="author-name"><a title="'+locations[i][author]+'" target="_blank" href="'+locations[i][authorUrl]+'">'+locations[i][author]+'</a></span></p>';
		  }
		  */
		  
		  var infoContentFooter = '<p class="content-footer">by <span class="author-name"><a title="The Art of Backpacking on Twitter" target="_blank" href="http://twitter.com/artofbackpackin">Art of Backpacking</a></span></p>';
		  
		  
		  var infoContent = infoContentTitle + infoContentPrompt
		  
          infowindow.setContent(infoContent);
          infowindow.open(map, marker);
        }
		})(marker, i));
		
		//Listeners
				google.maps.event.addListener(marker, 'dblclick', (function(marker, i) {
        return function() {


		  var iframeUrl = locations[i][url]
		  
		  initializeIframe(iframeUrl,i);
		
        }
		})(marker, i));
		
		/*Event MOUSEOVER*/
	
		google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
		if (infowindow.getMap() != null) {
				}
			else {
			
			//POPUP Content
		  var popupContent = '<h3>' + locations[i][title]+'</h3>';
		  
          popup.setContent(popupContent);
          popup.open(map, marker);
        }
		}
		
		})(marker, i));
		
		
		/*Event MOUSEOut*/
	
		google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
        return function() {
		  popup.close(map,marker);

        }

		})(marker, i));
	
	
		  
        } //End FOR
		
		
		var markerCluster = new MarkerClusterer(map, markers, mcOptions);
		
		
		
		$('#blog-index').attr("max",(i-1));
		

		

			


		return markerCluster;
	
		
      }  //End initialise
	  
	  


//Defaults
var contentString = "<?php echo $welcomeMessage?>";
	
var popupContent = 'Travel Blog';



var infowindow = new google.maps.InfoWindow({
    content: contentString
});



var popup = new google.maps.InfoWindow({
    content: popupContent
});


      google.maps.event.addDomListener(window, 'load', initialize);
	  


    </script>
	

<script id="reload-variables">
</script>

<script type="text/javascript">

function openHash() {if (window.location.hash !== "") {

	
	var currentIndex = window.location.hash;
    
	currentIndex = currentIndex.replace(/#/g, "");

	var setLat = locations[currentIndex][lat];
	var setLng = locations[currentIndex][lng];
	
	var latLng = new google.maps.LatLng(setLat, setLng); //Makes a latlng
	
	map.panTo(latLng);
	
		infoWindow(currentIndex,latLng);
}
else
{
welcomeMessage();
}
} 

function welcomeMessage(){

	
	var latLng = map.getCenter();

	var contentString = "";

	new google.maps.InfoWindow({
		content: contentString
	});

	infowindow.setPosition(latLng);
	
	infowindow.open(map)

}

function pageLoaded() {

$('body').addClass('loaded');

}

function pageLoaded2() {

$('body').addClass('loaded-2');

}


			setTimeout(function(){openHash()},3000);
			setTimeout(function(){openHash()},3010);
			setTimeout(function(){loadExtras()},3000);
			
			setTimeout(function(){pageLoaded()},5000);
			setTimeout(function(){pageLoaded2()},7000);



</script>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

	<script src="<?php echo $bbmDirectory?>js/modal.js"></script>
	<script src="<?php echo $bbmDirectory?>js/transition.js"></script>
	<!--<script src="js/tooltip.js"></script>-->
	<script src="<?php echo $bbmDirectory?>js/dropdown.js"></script>
	 
    <a id="button-modal" href="#bigblogmap-modal" role="button" class="btn btn-primary" data-toggle="modal">About</a>
   
   <div id="bigblogmap-modal" class="modal hide fade" tabindex="-1" role="dialog">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><a href="<?php echo $siteUrl?>"><?php echo $fullName?></a> - About the Map</h3>
  </div>
  <div class="modal-body">
	<p>This map is developed on the <a href="http://bigblogmap.com" target="_blank" title="The Big Blog Map">Big Blog Map</a> platform, a project trying to Geo-tag the world's best travel blogs.
	<br/>
	<a id="bigblogmap-screenshot" href="http://bigblogmap.com" target="_blank" title="The Big Blog Map"><img alt="Big Blog Map Screenshot" id="modal-screenshot" src="http://bigblogmap.com/img/bigblogmapscreenshot.png"></img></a>
	<br /><p>Do you want your own map? Click <a href="http://bigblogmap.com/map" target="_blank" title="Get your own map">here</a>.
	</p>
  </div>
  <div class="modal-footer">
	<a href="http://bigblogmap.com/about" title="About Page" class="btn">Read more</a>
    <a href="" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</a>
  </div>
</div>


<script>
for (var i=0;i<3;i++){

index = locations.length - i -1;

recentTitle = locations[index][0];
recentAuthor = locations[index][5];

var x = '#recent-blog-link-'+(i+1);
var y = '#recent-blog-title-'+(i+1);
var z = '#recent-blog-meta-'+(i+1);

var w = 'panAndOpen('+index+')'

$(x).attr('onclick',w);
$(y).html(recentTitle);
$(z).html('by '+recentAuthor);

}



var extras = [
['About this Map',62.186014,-45.703125,"http://bigblogmap.com/about","btb",'This project is based on the <a href="http://BigBlogMap.com/" target="_blank" title="Big Blog Map">Big Blog Map</a>, a project to geotag the best travel blogs. Check out the project <a href="http://BigBlogMap.com/" target="_blank" title="Big Blog Map">here</a><br/><br />Do you want your own map? Get <a href="http://bigblogmap.com/map" target="_blank">in touch</a> with the developer for a quote.']
]

function loadExtras() {



        for (i = 0; i < extras.length; i++) { 
		
		
		
		
		
		 //CREATION 
		 
		   marker = new google.maps.Marker({
        position: new google.maps.LatLng(extras[i][lat], extras[i][lng]),
        map: map,
		title: extras[i][title],
		icon: '<?php echo $bbmDirectory?>icons/mushroom.png',
		shadow: new google.maps.MarkerImage(
                'icons/btbShadow.png',
                null, null, new google.maps.Point(16, 34))
      });
	  
	  /*Event CLICK*/
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
		  popup.close(map,marker);
		  
		  

		  //INFO Content
		  
		  var infoContentTitle = '<h2 class="content-title">'+extras[i][title]+'</h2>';
		  var infoContentBody = '<p class="content-extra">'+extras[i][5]+'</p>'

		  
		  
		  
		  
		
		  var infoContent = infoContentTitle +  infoContentBody
		  
          infowindow.setContent(infoContent);
          infowindow.open(map, marker);
        }
		})(marker, i));
		
		
		
	
	
		/*Event MOUSEOVER*/
	
		google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
		if (infowindow.getMap() != null) {
				}
			else {
			
			//POPUP Content
		  var popupContent = '<h3>' + extras[i][title]+'</h3>';
		  
          popup.setContent(popupContent);
          popup.open(map, marker);
        }
		}
		
		})(marker, i));
		
		
		/*Event MOUSEOut*/
	
		google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
        return function() {
		  popup.close(map,marker);

        }

		})(marker, i));
	
	
		
	 } //End FOR
	 
	 }

</script>

   

  </body>
</html>

