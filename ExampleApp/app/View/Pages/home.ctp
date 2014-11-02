<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<h2>
  <?php echo "GoogleMapHelper " . GoogleMapHelper::getVersion(); ?>
  <?php
    echo $this->Html->link(
      $this->Html->image('GitHub-Mark-32px.png'),
      "https://github.com/marcferna/CakePHP-GoogleMapHelper",
      array('escape' => false)
    );
   ?>
 </h2>
<h3>Map Examples</h3>
<?php
  echo $this->Html->link("Default map", array(
    'controller' => 'pages',
    'action' => 'display',
    'default_map'
)); ?>
<br/>
<?php
  echo $this->Html->link("Map with different options", array(
    'controller' => 'pages',
    'action' => 'display',
    'map_with_options'
)); ?>
<br/>
<?php
  echo $this->Html->link("Map with geocoding", array(
    'controller' => 'pages',
    'action' => 'display',
    'map_with_options_geocode'
)); ?>
<br/>
<?php
  echo $this->Html->link("Multiple maps", array(
    'controller' => 'pages',
    'action' => 'display',
    'multiple_maps'
)); ?>

<br/><br/>
<h3>Markers Examples</h3>
<?php
  echo $this->Html->link("Default marker", array(
    'controller' => 'pages',
    'action' => 'display',
    'default_marker'
)); ?>
<br/>
<?php
  echo $this->Html->link("Marker with options", array(
    'controller' => 'pages',
    'action' => 'display',
    'marker_with_options'
)); ?>
<br/>
<?php
  echo $this->Html->link("Draggable marker", array(
    'controller' => 'pages',
    'action' => 'display',
    'draggable_marker'
)); ?>

<br/><br/>
<h3>Directions Examples</h3>
<?php
  echo $this->Html->link("Default directions", array(
    'controller' => 'pages',
    'action' => 'display',
    'default_directions'
)); ?>
<br/>
<?php
  echo $this->Html->link("Directions with options", array(
    'controller' => 'pages',
    'action' => 'display',
    'directions_with_options'
)); ?>
<br/>
<?php
  echo $this->Html->link("Directions with lat & long", array(
    'controller' => 'pages',
    'action' => 'display',
    'directions_with_latlong'
)); ?>

<br/><br/>
<h3>Polylines Examples</h3>
<?php
  echo $this->Html->link("Default polyline", array(
    'controller' => 'pages',
    'action' => 'display',
    'default_polyline'
)); ?>
<br/>
<?php
  echo $this->Html->link("Polyline with options", array(
    'controller' => 'pages',
    'action' => 'display',
    'polyline_with_options'
)); ?>
