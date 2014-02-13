<h3>Marker With Options Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = [
    'id'         => 'map_canvas',
    'width'      => '500px',
    'height'     => '500px',
    'localize'   => false,
    'zoom'       => 10,
    'address'    => 'Manhattan, NY',
    'marker'     => true,
    'infoWindow' => true
  ];
?>

<div style="float:left;">
  <?= $this->GoogleMap->map($map_options); ?>
</div>
<?=
  $this->GoogleMap->addMarker("map_canvas", 2, "Queens, NY", array(
    'showWindow' => true,
    'windowText' => 'Marker',
    'markerTitle' => 'Title',
    'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
    'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
  ));
?>

<?php
  $text = '
    // load the necessary scripts
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>

    <?php
      $map_options = [
        "id"         => "map_canvas",
        "width"      => "500px",
        "height"     => "500px",
        "localize"   => false,
        "zoom"       => 10,
        "address"    => "Manhattan, NY",
        "marker"     => true,
        "infoWindow" => true
      ];
    ?>

    // print the default map
    <?= $this->GoogleMap->map($map_options); ?>

    // add the marker with options
    <?=
      $this->GoogleMap->addMarker("map_canvas", 2, "Queens, NY", array(
        "showWindow"   => true,
        "windowText"   => "Marker",
        "markerTitle"  => "Title",
        "markerIcon"   => "http://labs.google.com/ridefinder/images/mm_20_purple.png",
        "markerShadow" => "http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png"
      ));
    ?>
'   ;
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
