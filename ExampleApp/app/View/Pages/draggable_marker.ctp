<h3>Draggable Marker Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<div style="float:left;">
  <?= $this->GoogleMap->map(['localize' => false, 'type' => 'ROADMAP', 'zoom' => 14, 'marker' => true, 'draggableMarker' => true]); ?>
  <?= $this->GoogleMap->addMarker('map_canvas', 2, array('latitude' => 40.70894620592961, 'longitude' => -73.93882513046293), array('draggableMarker' => true)); ?>
  <?= $this->GoogleMap->addMarker('map_canvas', 2, '63 Flushing Ave #300, New York, NY 11205, United States', array('draggableMarker' => true)); ?>
</div>
