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

<h2><?php echo "GoogleMapHelper " . GoogleMapHelper::getVersion(); ?></h2>
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
