<h3>Polyline With Options Example</h3>
<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = [
    'id'       => 'map_canvas',
    'width'    => '500px',
    'height'   => '500px',
    'localize' => false,
    'zoom'     => 3,
    'marker'   => false,
    'address'  => 'San Francisco, CA',
    'type'     => 'ROADMAP'
  ];
?>

<div style="float:left;">
  <?= $this->GoogleMap->map($map_options); ?>
</div>
<?=
  $this->GoogleMap->addPolyline("map_canvas", "polyline", array(
    "start" => array("latitude" => 37.772323 ,"longitude"=> -122.214897),
    "end"   => array("latitude" => 21.291982 ,"longitude"=> -157.821856)
  ), array(
    "strokeColor"   => "#000",
    "strokeOpacity" => 1,
    "strokeWeight"  => 8
  ));
?>
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
        "zoom"     => 3,
        "marker"   => false,
        "address"  => "San Francisco, CA",
        "type"     => "ROADMAP"
      ];
    ?>

    // print the map
    <?= $this->GoogleMap->map($map_options); ?>

    // add the polyline with both point coordinates
    <?=
      $this->GoogleMap->addPolyline("map_canvas", "polyline", array(
        "start" => array("latitude" => 37.772323 ,"longitude"=> -122.214897),
        "end"   => array("latitude" => 21.291982 ,"longitude"=> -157.821856)
      ), array(
        "strokeColor"   => "#000",
        "strokeOpacity" => 1,
        "strokeWeight"  => 8
      ));
    ?>
'   ;
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
