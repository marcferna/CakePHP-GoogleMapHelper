<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<div style="float:left;">
  <?php $map_options1 = [
    'id'     => 'map_canvas1',
    'width'  => '300px',
    'height' => '300px'
  ]; ?>
  <?= $this->GoogleMap->map($map_options1); ?>

  <?php $map_options2 = [
    'id'     => 'map_canvas2',
    'width'  => '300px',
    'height' => '300px'
  ]; ?>
  <?= $this->GoogleMap->map($map_options2); ?>
</div>

<?php
  $text = '
    // load the necessary scripts
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>

    // print the default map
    <?php $map_options1 = [
      "id"     => "map_canvas1",
      "width"  => "300px",
      "height" => "300px"
    ]; ?>
    <?= $this->GoogleMap->map($map_options1); ?>

    <?php $map_options2 = [
      "id"     => "map_canvas2",
      "width"  => "300px",
      "height" => "300px"
    ]; ?>
    <?= $this->GoogleMap->map($map_options2); ?>
';
?>
<div style="float:left; margin-left: 20px">
Code:
<?= $this->Geshi->highlightText($text, 'php'); ?>
</div>
