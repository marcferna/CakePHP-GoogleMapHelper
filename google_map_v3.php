<?php
/*
  	CakePHP Google Map V3 - Helper to CakePHP framework that integrates a Google Map in your view
  	using Google Maps API V3.
  
	Copyright (c) 2012 Marc Fernandez Girones: info@marcfg.com

	MIT LICENSE:
	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:
	
	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.
	
	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
  
	MarcFG : http://www.marcfg.com
	 
	@author      Marc Fernandez Girones <info@marcfg.com>
	@version     2.0
	@license     OPPL
	 
	Date	     May 13, 2010
 
    USAGE:
    
    In your CONTROLLER:
    	var $helpers = array('GoogleMapV3'); 	//Add the helper

  	In your VIEW:
  		First we add the Google Maps API (Note that Google Maps API V3 does NOT require a API Key):
  		
  			<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true',false); ?>
			<?php echo $this->Html->script('http://code.google.com/apis/gears/gears_init.js',false); ?>
			
  		Then we can add a map:
  
  			<?php echo $this->GoogleMapV3->map(); ?>
  		
  		OR
  		
  		You can also pass to the function a variable with any of the followings options and change the default parameters
	  		$mapOptions= array(
				'id'='map_canvas',				//Map canvas ID
				'width'=>'800px',				//Width of the map
				'height'=>'800px',				//Height of the map
				'style' =>'',					//CSS style for the map canvas
				'zoom'=>7,						//Zoom
				'type'=>'HYBRID', 				//Type of map (ROADMAP, SATELLITE, HYBRID or TERRAIN)
				'custom'=>null,					//Any other map option not mentioned before and available for the map. For example 'mapTypeControl: true' (http://code.google.com/apis/maps/documentation/javascript/controls.html)
				'latitude'=>40.69847032728747,	//Default latitude if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
				'longitude'=>-1.9514422416687,	//Default longitude if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
				'address="1 Infinite Loop, Cupertino"; //Default address if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
				'localize'=>true,				//Boolean to localize your position or not
				'marker'=>true,					//Boolean to put a marker in the position or not
				'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png',	//Default icon of the marker
				'infoWindow'=>true,				//Boolean to show an information window when you click the marker or not
				'windowText'=>'My Position'		//Default text inside the information window
			);
			echo $this->GoogleMapV3->map($mapOptions); To add a map that localizes you
		
		To add a marker:
  			echo $this->GoogleMapV3->addMarker(array('latitude'=>40.69847,'longitude'=>-73.9514));
  			
  		OR
  		
  		You can also pass to the function a variable with any of the followings options and change the default parameters
		$markerOptions= array(
			'id'=>1								//Id of the marker
			'latitude'=>40.69847032728747,		//Latitude of the marker
			'longitude'=>-1.9514422416687,		//Longitude of the marker
			'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom icon
			'shadowIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom shadow
			'infoWindow'=>true,					//Boolean to show an information window when you click the marker or not
			'windowText'=>'Marker'				//Default text inside the information window
		);
  		
  	This helper uses the latest Google API V3 so you don't need to provide or get any Google API Key
*/

class GoogleMapV3Helper extends Helper {

	
	//DEFAULT MAP OPTIONS (function map())
	var $defaultId="map_canvas";				//Map canvas ID
	var $defaultWidth="800px";					//Width of the map
	var $defaultHeight="800px";					//Height of the map
	var $defaultStyle ="";						//CSS style for the map canvas
	var $defaultZoom=6;							//Default zoom
	var $defaultType='HYBRID';					//Type of map (ROADMAP, SATELLITE, HYBRID or TERRAIN)
	var $defaultCustom = "";					//Any other map option not mentioned before and available for the map. For example 'mapTypeControl: true' (http://code.google.com/apis/maps/documentation/javascript/controls.html)
	var $defaultLatitude=40.69847032728747;		//Default latitude if the browser doesn't support localization or you don't want localization
	var $defaultLongitude=-73.9514422416687;	//Default longitude if the browser doesn't support localization or you don't want localization
	var $defaultLocalize=true;					//Boolean to localize your position or not
	var $defaultMarker=true;					//Boolean to put a marker in the position or not
	var $defaultMarkerIcon='http://google-maps-icons.googlecode.com/files/home.png'; //Default icon of the marker
	var $defaultInfoWindow=true;				//Boolean to show an information window when you click the marker or not
	var $defaultWindowText='My Position';		//Default text inside the information window
		
	//DEFAULT MARKER OPTIONS (function addMarker())
	var $defaultInfoWindowM=true;		//Boolean to show an information window when you click the marker or not
	var $defaultWindowTextM=' ';		//Default text inside the information window
	
	
	/** 
     * Function map 
     * 
     * This method generates a tag called map_canvas and insert
     * a google maps.
     * 
     * Pass an array with the options listed above in order to customize it
     * 
     * @author Marc Fernandez <info (at) marcfg (dot) com> 
     * @param array $options - options array 
     * @return string - will return all the javascript script to generate the map
     * 
     */	
	function map($options=null){
		if($options!=null) extract($options);
		if(!isset($id)) 		$width=$this->defaultId;
		if(!isset($width)) 		$width=$this->defaultWidth;
		if(!isset($height)) 	$height=$this->defaultHeight;	
		if(!isset($zoom)) 		$zoom=$this->defaultZoom;			
		if(!isset($type)) 		$type=$this->defaultType;
		if(!isset($custom))		$custom = $this->defaultCustom;		
		if(!isset($localize)) 	$localize=$this->defaultLocalize;		
		if(!isset($marker)) 	$marker=$this->defaultMarker;		
		if(!isset($markerIcon)) $markerIcon=$this->defaultMarkerIcon;	
		if(!isset($infoWindow)) $infoWindow=$this->defaultInfoWindow;	
		if(!isset($windowText)) $windowText=$this->defaultWindowText;	

		$map = "<div id='$id' style='$style'></div>";
		$map .="
			<script>
			var geocoder = new google.maps.Geocoder();
			function geocodeAddress(address, action) {
			    geocoder.geocode( { 'address': address}, function(results, status) {
			      if (status == google.maps.GeocoderStatus.OK) {
			      	//alert(results[0].geometry.location);
			      	if(action =='setCenter'){
			      		setCenterMap(results[0].geometry.location);";
						if($marker) $map .= "setMarker(results[0].geometry.location);";
					$map .= "
			      	}
			      } else {
			        alert('Geocode was not successful for the following reason: ' + status);
			        return null;
			      }
			    });
			}";
		
		$map .= "
			var initialLocation;
		    var browserSupportFlag =  new Boolean();
		    var map;
		    var myOptions = {
		      zoom: {$zoom},
		      mapTypeId: google.maps.MapTypeId.{$type}
		      ".(($custom != "")? ",$custom" : "")."
		      
		    };
		    map = new google.maps.Map(document.getElementById('$id'), myOptions);
		";
		$map.="
			function setCenterMap(position){
		";
		if($localize) $map .= "localize();"; 
		else {
			$map .= "map.setCenter(position);";
			if($marker) $map .= "setMarker(position);";
		}
		$map .="
			}
		";
		if(isset($latitude) && isset($longitude)) $map .="setCenterMap(new google.maps.LatLng({$latitude}, {$longitude}));";
		else if(isset($address)) $map .="geocodeAddress('{$address}','setCenter') ; ";
		else $map .="setCenterMap(new google.maps.LatLng({$this->defaultLatitude}, {$this->defaultLongitude}));";
		$map .= "
			function localize(){
		        if(navigator.geolocation) { // Try W3C Geolocation method (Preferred)
		            browserSupportFlag = true;
		            navigator.geolocation.getCurrentPosition(function(position) {
		              initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
		              map.setCenter(initialLocation);";
					  if($marker) $map .= "setMarker(initialLocation);";
		                       
		            $map .= "}, function() {
		              handleNoGeolocation(browserSupportFlag);
		            });
		            
		        } else if (google.gears) { // Try Google Gears Geolocation
		            browserSupportFlag = true;
		            var geo = google.gears.factory.create('beta.geolocation');
		            geo.getCurrentPosition(function(position) {
		              initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
		              map.setCenter(initialLocation);";
					  if($marker) $map .= "setMarker(initialLocation);";         
		        
		            $map .= "}, function() {
		              handleNoGeolocation(browserSupportFlag);
		            });
		        } else {
		            // Browser doesn't support Geolocation
		            browserSupportFlag = false;
		            handleNoGeolocation(browserSupportFlag);
		        }
		    }
		    
		    function handleNoGeolocation(errorFlag) {
		        if (errorFlag == true) {
		          initialLocation = noLocation;
		          contentString = \"Error: The Geolocation service failed.\";
		        } else {
		          initialLocation = noLocation;
		          contentString = \"Error: Your browser doesn't support geolocation.\";
		        }
		        map.setCenter(initialLocation);
		        map.setZoom(3);
		    }";

		    $map .= "
			function setMarker(position){
		        var contentString = '".$windowText."';
		        var image = '".$markerIcon."';
		        var infowindow = new google.maps.InfoWindow({
		            content: contentString
		        });
		        var marker = new google.maps.Marker({
		            position: position,
		            map: map,
		            icon: image,
		            title:\"My Position\"
		        });";
		     if($infoWindow){   
		     	$map .= "google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map,marker);
		        			});";
		     }
		     $map .= "}";
		$map .= "</script>";
		return $map;
	}
	
	
	/** 
     * Function addMarker 
     * 
     * This method puts a marker in the google map generated with the function map
     * 
     * Pass an array with the options listed above in order to customize it
     * 
     * @author Marc Fernandez <info (at) marcfg (dot) com> 
     * @param array $options - options array 
     * @return string - will return all the javascript script to add the marker to the map
     * 
     */ 
	function addMarker($options){
		if($options==null) return null;
		extract($options);
		if(!isset($latitude) || $latitude==null || !isset($longitude) || $longitude==null) return null;
		if (!preg_match("/[-+]?\b[0-9]*\.?[0-9]+\b/", $latitude) || !preg_match("/[-+]?\b[0-9]*\.?[0-9]+\b/", $longitude)) return null;		
		if(!isset($id)) $id=rand();
		if(!isset($infoWindow)) $infoWindow=$this->defaultInfoWindowM;
		if(!isset($windowText)) $windowText=$this->defaultWindowTextM;
		$marker = "<script>";
		if(isset($markerIcon)) $marker .= "var image = '".$markerIcon."';";
		if(isset($shadowIcon)) $marker .= "var shadowImage = '".$shadowIcon."';";
		$marker .= "var myLatLng = new google.maps.LatLng(".$latitude.", ".$longitude.");
			  	var marker".$id." = new google.maps.Marker({
			      	position: myLatLng,
			     	map: map,";
			        if(isset($markerIcon)) $marker .= "icon: image,";
			        if(isset($shadowIcon)) $marker .= "shadow: shadowImage,";
		$marker .= "
			});";
		$marker .= "
			var contentString = '".$windowText."';
	        var infowindow".$id." = new google.maps.InfoWindow({
	            content: contentString
	        });";
		if($infoWindow){   
		     	$marker .= "google.maps.event.addListener(marker".$id.", 'click', function() {
								infowindow".$id.".open(map,marker".$id.");
		        			});";
	    }
		$marker .= "</script>";
		return $marker;
	}
	

}
?>