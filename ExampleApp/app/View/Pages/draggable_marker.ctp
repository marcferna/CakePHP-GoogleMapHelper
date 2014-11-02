<h3>Draggable Marker Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<div style="float:right; width: 30%">
  <h4>Pin 1</h4>
  <input type="text" id="latitude_1" />
  <input type="text" id="longitude_1" />
  <h4>Pin 2</h4>
  <input type="text" id="latitude_2" />
  <input type="text" id="longitude_2" />
</div>
<div style="float:left;">
  <?= $this->GoogleMap->map(['localize' => false, 'type' => 'ROADMAP', 'zoom' => 14, 'marker' => false, 'draggableMarker' => false]); ?>
  <?= $this->GoogleMap->addMarker('map_canvas', 1, array('latitude' => 40.70894620592961, 'longitude' => -73.93882513046293), array('draggableMarker' => true, 'windowText' => 'Pin 1')); ?>
  <?= $this->GoogleMap->addMarker('map_canvas', 2, '63 Flushing Ave #300, New York, NY 11205, United States', array('draggableMarker' => true, 'windowText' => 'Pin 2')); ?>
</div>
