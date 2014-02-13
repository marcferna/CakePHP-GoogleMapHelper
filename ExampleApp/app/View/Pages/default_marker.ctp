<h3>Marker Default Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = array(
    'id'         => 'map_canvas',
    'width'      => '500px',
    'height'     => '500px',
    'localize'   => false,
    'zoom'       => 10,
    'address'    => 'Manhattan, NY',
    'marker'     => true,
    'infoWindow' => true
  );
?>

<div style="float:left;">
  <?= $this->GoogleMap->map($map_options); ?>
</div>
<?= $this->GoogleMap->addMarker("map_canvas", 1, array('latitude' => 40.69847, 'longitude' => -73.9514)); ?>
<?= $this->GoogleMap->addMarker("map_canvas", 2, "Queens, NY"); ?>

<?php
  $text = '
    // load the necessary scripts
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>

    <?php
      $map_options = array(
        "id"         => "map_canvas",
        "width"      => "500px",
        "height"     => "500px",
        "localize"   => false,
        "zoom"       => 10,
        "address"    => "Manhattan, NY",
        "marker"     => true,
        "infoWindow" => true
      );
    ?>

    // print the default map
    <?= $this->GoogleMap->map($map_options); ?>

    // add the marker with latitude and longitude
    <?= $this->GoogleMap->addMarker("map_canvas", 1, array("latitude" => 40.69847, "longitude" => -73.9514)); ?>

    // add the marker with address
    <?= $this->GoogleMap->addMarker("map_canvas", 2, "Queens, NY"); ?>
'   ;
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
