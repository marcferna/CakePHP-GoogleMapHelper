<h3>Draggable Marker Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<div style="float:left;">
  <?= $this->GoogleMap->map(array('localize' => false, 'type' => 'ROADMAP', 'zoom' => 14, 'marker' => false)); ?>
  <?= $this->GoogleMap->addCircle(
    'map_canvas',
    'circle1',
    array('latitude' => 40.70894620592961, 'longitude' => -73.93882513046293)
  ); ?>
</div>

<?php
  $text = '
    // load the necessary scripts
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>

    <?php
      $map_options = array(
        "localize" => false,
        "type" => "ROADMAP",
        "zoom" => 14,
        "marker" => false
      );
    ?>

    // print the default map
    <?= $this->GoogleMap->map(); ?>

    // add circle
    <?= $this->GoogleMap->addCircle(
      "map_canvas",
      "circle1",
      array(
        "latitude" => 40.70894620592961,
        "longitude" => -73.93882513046293
      )
    ); ?>
';
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
