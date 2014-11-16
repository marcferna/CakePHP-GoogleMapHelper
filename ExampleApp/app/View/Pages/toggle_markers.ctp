<h3>Hide / Add Markers Example</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = array(
    'id'         => 'map_canvas',
    'width'      => '500px',
    'height'     => '500px',
    'localize'   => false,
    'zoom'       => 3,
    'address'    => 'USA',
    'marker'     => true,
    'infoWindow' => true
  );
?>

<div style="float:left;">
  <script>var red = blue = true;</script>
	<button onclick="if(red){removeMarker(2, temp_canvas);removeMarker(3, temp_canvas);red=false;}else{addMarker(2, temp_canvas);addMarker(3, temp_canvas);red=true;}">Toggle Red Markers</button> 
	<button onclick="if(blue){removeMarker(4, temp_canvas);removeMarker(5, temp_canvas);blue=false;}else{addMarker(4, temp_canvas);addMarker(5, temp_canvas);blue=true;}">Toggle Blue Markers</button>
  <?= $this->GoogleMap->map($map_options); ?>
</div>
<?=
  $this->GoogleMap->addMarker("map_canvas", 2, "Las Angeles, CA", array(
    'showWindow' => true,
    'windowText' => 'Marker',
    'markerTitle' => 'Title',
    'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
    'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
  ));
?>
<?=
  $this->GoogleMap->addMarker("map_canvas", 3, "Chicago, IL", array(
    'showWindow' => true,
    'windowText' => 'Marker',
    'markerTitle' => 'Title',
    'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
    'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
  ));
?>
<?=
  $this->GoogleMap->addMarker("map_canvas", 4, "Pumpkin Town, SC", array(
    'showWindow' => true,
    'windowText' => 'Marker',
    'markerTitle' => 'Title',
    'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
    'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
  ));
?>
<?=
  $this->GoogleMap->addMarker("map_canvas", 5, "Melrose, NM", array(
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
    // add marker toggle buttons
    <script>var red = blue = true;</script>
	  <button onclick="if(red){removeMarker(2, temp_canvas);removeMarker(3, temp_canvas);red=false;}else{addMarker(2, temp_canvas);addMarker(3, temp_canvas);red=true;}">Toggle Red Markers</button> 
	  <button onclick="if(blue){removeMarker(4, temp_canvas);removeMarker(5, temp_canvas);blue=false;}else{addMarker(4, temp_canvas);addMarker(5, temp_canvas);blue=true;}">Toggle Blue Markers</button>
    // print the default map
    <?= $this->GoogleMap->map($map_options); ?>
    // add the markers with options
    <?=
      $this->GoogleMap->addMarker("map_canvas", 2, "Las Angeles, CA", array(
        'showWindow' => true,
        'windowText' => 'Marker',
        'markerTitle' => 'Title',
        'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
        'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
      ));
    ?>
    <?=
      $this->GoogleMap->addMarker("map_canvas", 3, "Chicago, IL", array(
        'showWindow' => true,
        'windowText' => 'Marker',
        'markerTitle' => 'Title',
        'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
        'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
      ));
    ?>
    <?=
      $this->GoogleMap->addMarker("map_canvas", 4, "Pumpkin Town, SC", array(
        'showWindow' => true,
        'windowText' => 'Marker',
        'markerTitle' => 'Title',
        'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
        'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
      ));
    ?>
    <?=
      $this->GoogleMap->addMarker("map_canvas", 5, "Melrose, NM", array(
        'showWindow' => true,
        'windowText' => 'Marker',
        'markerTitle' => 'Title',
        'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
        'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png'
      ));
    ?>
'   ;
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
