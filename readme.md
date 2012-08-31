## Google Maps for CakePHP 2.x
Helper for CakePHP framework that integrates a Google Map in your view using Google Maps API V3.

## Installation
Add this line into the **controller**:
```php
public $helpers = array('GoogleMap');   //Adding the helper
```

Then we need to add the necessary Javascript files into the **view**:
```php
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
```
Note that the API key is not required but it you may want to add it if you want to monitor your usage or to buy additional usage quota.
To add the api key:
```php
<?= $this->Html->script('http://maps.google.com/maps/api/js?key=YOUR_API_KEY&sensor=true', false); ?>
```

## Usage
```php
<?= $this->GoogleMap->map(); ?>   //Adding the map to your view
```

## Map Options
Below are the options available to set to your map:
* **id:** Map canvas id
* **width:** Map width
* **height:** Map height
* **style:** Map canvas CSS style
* **zoom:** Map zoom
* **type:** Type of map - `ROADMAP`, `SATELLITE`, `HYBRID` or `TERRAIN`
* **custom:** Any other map option not mentioned before and available for the map. For example `mapTypeControl: true` (http://code.google.com/apis/maps/documentation/javascript/controls.html)
* **latitude:** Default latitude if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
* **longitude:** Default longitude if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
* **address:** Default address if the browser doesn't support localization or you don't want localization (Latitude & Langitude have priority versus Address)
* **localize:** Boolean to localize your position or not
* **marker:** Boolean to put a marker in your position or not
* **markerIcon:** Default icon of the marker of your position
* **infoWindow:** Boolean to show an information window when you click your position marker or not
* **windowText:** Default text inside your position marker´s information window

In order modify any of the default options you need to create your map passing the array follows:
```php
<?
$mapOptions = array(
  'id'='map_canvas',        
  'width'=>'800px', 
  'height'=>'800px',
  'style' =>'',
  'zoom'=>7,
  'type'=>'HYBRID',
  'custom'=>null,
  'latitude'=>40.69847032728747,
  'longitude'=>-1.9514422416687,
  'address="1 Infinite Loop, Cupertino";
  'localize'=>true,
  'marker'=>true,
  'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png',
  'infoWindow'=>true,
  'windowText'=>'My Position'
);
?>

<?= $this->GoogleMap->map($mapOptions); ?>   //Adding the map to your view
```
