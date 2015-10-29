# Google Maps for CakePHP 2.x [![Build Status](https://travis-ci.org/marcferna/CakePHP-GoogleMapHelper.png?branch=master)](https://travis-ci.org/marcferna/CakePHP-GoogleMapHelper)
Helper for CakePHP framework that integrates a Google Map in your view using Google Maps API V3.

## CakePHP3
You can find a working version for CakePHP 3 in the branch `CakePHP3`:
https://github.com/marcferna/CakePHP-GoogleMapHelper/tree/CakePHP3

##[Demo](http://googlemap-examples.herokuapp.com/)
[See all the examples live here](http://googlemap-examples.herokuapp.com/)

## Installation
1. Place the helper into **app/View/Helper/GoogleMapHelper.php**

2. Add this line into the **controller**:
```php
public $helpers = array('GoogleMap');   //Adding the helper
```

3. Then we need to add the necessary Javascript files into the **view**:
```php
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
```
Note that the API key is not required but it you may want to add it if you want to monitor your usage or to buy additional usage quota.
To add the api key:
```php
<?= $this->Html->script('http://maps.google.com/maps/api/js?key=YOUR_API_KEY&sensor=true', false); ?>
```

## Usage
Print the map to your view
```php
<?= $this->GoogleMap->map(); ?>
```

### Map Options
Below are the options available to set to your map:
* **id:** Map canvas id
* **width:** Map width
* **height:** Map height
* **style:** Map canvas CSS style
* **zoom:** Map zoom
* **type:** Type of map - `ROADMAP`, `SATELLITE`, `HYBRID` or `TERRAIN`
* **custom:** Any other map option not mentioned before and available for the map. For example `mapTypeControl: true`. See more map options at: https://developers.google.com/maps/documentation/javascript/controls
* **localize:** Boolean to localize your position or not. Overrides 'latitude' & 'longitude' and 'address' (Localize have priority versus Latitude & Longitude and Address)
* **latitude:** Default latitude if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
* **longitude:** Default longitude if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
* **address:** Default address if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
* **marker:** Boolean to put a marker in your position or not
* **markerTitle:** Marker title (HTML title tag)
* **markerIcon:** Default icon of the marker of your position
* **markerShadow:** Default icon' shadow of the marker of your position
* **infoWindow:** Boolean to show an information window when you click your position marker or not
* **windowText:** Default text inside your position marker´s information window
* **draggableMarker:** Indicator if marker will be draggable

In order modify any of the default options shown above you need to create your map passing the array as follows:
```php
<?
  // Override any of the following default options to customize your map
  $map_options = array(
    'id' => 'map_canvas',
    'width' => '800px',
    'height' => '800px',
    'style' => '',
    'zoom' => 7,
    'type' => 'HYBRID',
    'custom' => null,
    'localize' => true,
    'latitude' => 40.69847032728747,
    'longitude' => -1.9514422416687,
    'address' => '1 Infinite Loop, Cupertino',
    'marker' => true,
    'markerTitle' => 'This is my position',
    'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
    'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
    'infoWindow' => true,
    'windowText' => 'My Position',
    'draggableMarker' => false
  );
?>

<?= $this->GoogleMap->map($map_options); ?>
```

## Markers
To add a marker use:
```php
<?= $this->GoogleMap->addMarker($map_id, $marker_id, $position); ?>
```
Where:
* **$map_id** is the map canvas id ('map_canvas' by default)
* **$marker_id** is the unique identifiyer for that marker
* **$position** could be a simple string with the address or an array with latitude and longitude.

**Example with address (using geolocation)**
```php
<?= $this->GoogleMap->addMarker("map_canvas", 1, "1 Infinite Loop, Cupertino, California"); ?>
```

**Example with latitude and longitude**
```php
<?= $this->GoogleMap->addMarker("map_canvas", 1, array('latitude' => 40.69847, 'longitude' => -73.9514)); ?>
```

### Marker Options
There are some marker options available to customize the marker popup info window:
* **showWindow:** Boolean to show or not the popup info window
* **windowText:** Text to show inside the popup info window
* **markerTitle:** Marker title (HTML title tag)
* **markerIcon:** Marker icon
* **markerShadow:** Marker icon shadow
* **draggableMarker:** Indicator if marker will be draggable

In order modify any of the default options shown above you need to create your marker passing the array as follows:
```php

<?
  // Override any of the following default options to customize your marker
  $marker_options = array(
    'showWindow' => true,
    'windowText' => 'Marker',
    'markerTitle' => 'Title',
    'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
    'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png',
    'draggableMarker' => true
  );
?>

<?= $this->GoogleMap->addMarker("map_canvas", 1, "1 Infinite Loop, Cupertino, California", $marker_options); ?>

```

### Draggable Marker
To access the draggable marker's coordinates include an element in the html with the id of the marker.
If a draggable marker with id of **1** is added, the coordinates can be accessed like:
```html
<input type="text" id="latitude_1" />
<input type="text" id="longitude_1" />
```

## Directions
To add a route between two points use:
```php
<?= $this->GoogleMap->getDirections($map_id, $id, $position); ?>
```
Where:
* **$map_id** is the map canvas id ('map_canvas' by default)
* **$id** is the unique identifiyer for that route
* **$position** array with from and to addresses

**Example:**
```php
<?= $this->GoogleMap->getDirections("map_canvas", "directions1", array("from" => "Lake Tahoe", "to" => "San Francisco")); ?>
```

### Directions Options
There are some directions options available to customize:
* **travelMode:** Travel mode (DRIVING, BICYCLING, TRANSIT, WALKING)
* **directionsDiv:** Div ID to dump the step by step directions (The div needs to be before the getDirections() call)

In order modify any of the default options shown above you need pass the array as follows:
```php

<?
  // Override any of the following default options to customize your route
  $directions_options = array(
    'travelMode' => "WALKING",
    'directionsDiv' => 'directions',
  );
?>
<div id="directions"></div>
<?= $this->GoogleMap->getDirections("map_canvas", "directions1", array("from" => "Lake Tahoe", "to" => "San Francisco"), $directions_options); ?>

```

## Polylines
To draw a line between to points use:
```php
<?= $this->GoogleMap->addPolyline($map_id, $id, $position); ?>
```
Where:
* **$map_id** is the map canvas id ('map_canvas' by default)
* **$id** is the unique identifiyer for that polyline
* **$position** array with start and end coordinates (geolocation not suppoerted yet)

**Example:**
```php
<?= $this->GoogleMap->addPolyline("map_canvas", "polyline", array("start" => array("latitude" =>37.772323 ,"longitude"=> -122.214897), "end" => array("latitude" =>21.291982 ,"longitude"=> -157.821856))); ?>
```

### Polylines Options
There are some drawing options available to customize:
* **strokeColor:** Specifies a hexadecimal HTML color of the format "#FFFFFF". The Polyline class does not support named colors.
* **strokeOpacity:** Specifies a numerical fractional value between 0.0 and 1.0.
* **strokeWeight:** Specifies the weight of the line's stroke in pixels.

In order modify any of the default options shown above you need to create your polyline passing the array as follows:
```php

<?
  // Override any of the following default options to customize your polyline
  $options = array(
    "strokeColor" => "#FFFFFF",
    "strokeOpacity" => 1,
    "strokeWeight" => 8
  );
?>
<?= $this->GoogleMap->addPolyline("map_canvas", "polyline", array("start" => array("latitude" => 37.772323 ,"longitude" => -122.214897), "end" => array("latitude" => 21.291982 , "longitude" => -157.821856)), $options); ?>

```

## Circles
To draw a circle around a point use:
```php
<?= $this->GoogleMap->addCircle($map_id, $id, $center, $radius=100); ?>
```
Where:
* **$map_id** is the map canvas id ('map_canvas' by default)
* **$id** is the unique identifiyer for that circle
* **$center** array with the center latitude and longitude coordinates (geolocation not suppoerted yet)
* **$radius** specifies the radius of the circle, in meters. Defaults to 100 meters

**Example:**
```php
<?= $this->GoogleMap->addCircle("map_canvas", "circle1", array('latitude' => 40.70894620592961, 'longitude' => -73.93882513046293)); ?>
```

### Circle Options
There are some drawing options available to customize:
* **strokeColor:** Specifies a hexadecimal HTML color of the format "#FFFFFF". The Circle class does not support named colors.
* **strokeOpacity:** Specifies a numerical fractional value between 0.0 and 1.0.
* **strokeWeight:** Specifies the weight of the line's stroke in pixels.
* **fillColor:** Specifies a hexadecimal HTML color of the format "#FFFFFF". The Circle class does not support named colors.
* **fillOpacity:** Specifies a numerical fractional value between 0.0 and 1.0.

In order modify any of the default options shown above you need to create your circle passing the array as follows:
```php

<?
  // Override any of the following default options to customize your circle
  $options = array(
    "strokeColor" => "#FFFFFF",
    "strokeOpacity" => 1,
    "strokeWeight" => 5,
    "fillColor" => "#E2252D",
    "fillOpacity" => 0.3
  );
?>
<?= $this->GoogleMap->addCircle("map_canvas", "circle1", array('latitude' => 40.70894620592961, 'longitude' => -73.93882513046293), 1000, $options); ?>

```
