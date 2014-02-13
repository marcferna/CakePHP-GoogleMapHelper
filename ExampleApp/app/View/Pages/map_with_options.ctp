<h3>Map With Options Example</h3>
<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = [
    'id'           => 'map_canvas',
    'width'        => '800px',
    'height'       => '800px',
    'zoom'         => 9,
    'type'         => 'ROADMAP',
    'localize'     => false,
    'latitude'     => 40.69847032728747,
    'longitude'    => -1.9514422416687,
    'marker'       => true,
    'markerIcon'   => 'http://google-maps-icons.googlecode.com/files/home.png',
    'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
    'infoWindow'   => true,
    'windowText'   => 'My Position custom text'
  ];
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
      $map_options = [
        "id"           => "map_canvas",
        "width"        => "800px",
        "height"       => "800px",
        "zoom"         => 9,
        "type"         => "ROADMAP",
        "localize"     => false,
        "latitude"     => 40.69847032728747,
        "longitude"    => -1.9514422416687,
        "marker"       => true,
        "markerIcon"   => "http://google-maps-icons.googlecode.com/files/home.png",
        "markerShadow" => "http://google-maps-icons.googlecode.com/files/shadow.png",
        "infoWindow"   => true,
        "windowText"   => "My Position custom text"
      ];
    ?>

    // print the default map
    <?= $this->GoogleMap->map(); ?>
';
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
