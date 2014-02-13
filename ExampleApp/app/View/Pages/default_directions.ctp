<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = [
    'id'       => 'map_canvas',
    'width'    => '500px',
    'height'   => '500px',
    'localize' => false,
    'zoom'     => 10,
    'marker'   => false,
    'type'     => 'ROADMAP',
  ];
?>

<div style="float:left;">
  <?= $this->GoogleMap->map($map_options); ?>
</div>
<?= $this->GoogleMap->getDirections("map_canvas", "directions1", array("from" => "Lake Tahoe", "to" => "San Francisco")); ?>

<?php
  $text = '
    // load the necessary scripts
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>

    <?php
      $map_options = [
        "id"       => "map_canvas",
        "width"    => "500px",
        "height"   => "500px",
        "localize" => false,
        "zoom"     => 10,
        "marker"   => false,
        "type"     => "ROADMAP",
      ];
    ?>

    // print the map
    <?= $this->GoogleMap->map($map_options); ?>

    // add the directions with geolocation of the 2 points
    <?=
      $this->GoogleMap->getDirections("map_canvas", "directions1", array(
        "from" => "Lake Tahoe",
        "to"   => "San Francisco"
      ));
    ?>
'   ;
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
