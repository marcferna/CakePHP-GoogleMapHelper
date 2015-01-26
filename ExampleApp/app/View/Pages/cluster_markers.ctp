<h3>Cluster Markers Example</h3>
<p>Clustering markers together is useful in cases where you have hundreds of markers to display close to each other. The MarkerClusterer script will cluster markers together and display a total count. The clusters will change with each zoom level. The further out you zoom, the bigger the cluster.</p>
<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>
<?= $this->Html->script('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js', false); ?>

<?php
  $map_options = array(
    'id'         => 'map_canvas',
    'width'      => '500px',
    'height'     => '500px',
    'localize'   => false,
    'zoom'       => 3,
    'latitude'   => 33.105801,
    'longitude'  => -92.378012,
    'marker'     => true,
    'infoWindow' => true
  );
?>

<div style="float:left;">
  <?= $this->GoogleMap->map($map_options); ?>
</div>
  <?php
      echo $this->GoogleMap->addMarker("map_canvas", 2, array('latitude' => 34.8024139, 'longitude' => -82.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 3, array('latitude' => 34.9024139, 'longitude' => -119.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 4, array('latitude' => 33.8024139, 'longitude' => -118.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 5, array('latitude' => 34.8024139, 'longitude' => -118.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 6, array('latitude' => 27.8024139, 'longitude' => -94.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 8, array('latitude' => 34.1024139, 'longitude' => -81.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 9, array('latitude' => 34.8024139, 'longitude' => -83.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 10, array('latitude' => 33.8024139, 'longitude' => -82.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 11, array('latitude' => 34.8024139, 'longitude' => -103.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 12, array('latitude' => 35.8024139, 'longitude' => -104.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 13, array('latitude' => 33.8024139, 'longitude' => -102.3967902));
  ?>

  <?php echo $this->GoogleMap->clusterMarkers("map_canvas");?>

<?php
  $text = '
    // load the necessary scripts
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>
    // note the extra MarkerClusterer script you need for this example
    <?= $this->Html->script("http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js", false); ?>

    <?php
      $map_options = array(
        "id"         => "map_canvas",
        "width"      => "500px",
        "height"     => "500px",
        "localize"   => false,
        "zoom"       => 3,
        "latitude"   => 33.105801,
        "longitude"  => -92.378012,
        "marker"     => true,
        "infoWindow" => true
      );
    ?>
    // print the default map
    <?= $this->GoogleMap->map($map_options); ?>
    // add the markers
    <?php
      echo $this->GoogleMap->addMarker("map_canvas", 2, array("latitude" => 34.8024139, "longitude" => -82.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 3, array("latitude" => 34.9024139, "longitude" => -119.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 4, array("latitude" => 33.8024139, "longitude" => -118.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 5, array("latitude" => 34.8024139, "longitude" => -118.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 6, array("latitude" => 27.8024139, "longitude" => -94.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 8, array("latitude" => 34.1024139, "longitude" => -81.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 9, array("latitude" => 34.8024139, "longitude" => -83.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 10, array("latitude" => 33.8024139, "longitude" => -82.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 11, array("latitude" => 34.8024139, "longitude" => -103.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 12, array("latitude" => 35.8024139, "longitude" => -104.3967902));
      echo $this->GoogleMap->addMarker("map_canvas", 13, array("latitude" => 33.8024139, "longitude" => -102.3967902));
    ?>

    // cluster the markers
    <?php echo $this->GoogleMap->clusterMarkers("map_canvas");?>
'   ;
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
