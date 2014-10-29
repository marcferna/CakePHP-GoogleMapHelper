<h3>Draggable Marker Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<div style="float:left;">
  <?= $this->GoogleMap->map(['localize' => false, 'type' => 'ROADMAP', 'zoom' => 14]); ?>
</div>
