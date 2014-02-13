<h3>Map With Geocode Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = array(
    'id'         => 'map_canvas',
    'width'      => '300px',
    'height'     => '300px',
    'zoom'       => 16,
    'type'       => 'SATELLITE',
    'custom'     => 'mapTypeControl: false, disableDefaultUI: true',
    'localize'   => false,
    'address'    => 'Camp Nou, Barcelona',
    'marker'     => true,
    'markerIcon' => 'soccerfield.png',
    'infoWindow' => false
  );
?>

<div style="float:left;">
  <?= $this->GoogleMap->map($map_options); ?>
</div>

<?php
  $text = '
    // load the necessary scripts
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>

    <?php
      $map_options = array(
        "id"         => "map_canvas",
        "width"      => "300px",
        "height"     => "300px",
        "zoom"       => 16,
        "type"       => "SATELLITE",
        "custom"     => "mapTypeControl: false, disableDefaultUI: true",
        "localize"   => false,
        "address"    => "Camp Nou, Barcelona",
        "marker"     => true,
        "markerIcon" => "soccerfield.png",
        "infoWindow" => false
      );
    ?>

    // print the default map
    <?= $this->GoogleMap->map($map_options); ?>
';
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
