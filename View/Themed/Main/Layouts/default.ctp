<?php
/**
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!doctype html>
<?php echo $this->Plate->html(array('ie' => true)); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		unfol.io
	</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="description" content="<?php if (!empty($description_for_layout)) echo $description_for_layout; ?>">
	<meta name="keywords" content="<?php if (!empty($keywords_for_layout)) echo $keywords_for_layout; ?>">
	<meta name="author" content="Cakephp with Baking Plate">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php echo $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon')); ?>
	<?php echo $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon', 'rel' => 'shortcut icon')); ?>
	<?php echo $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon', 'rel' => 'apple-touch-icon')); ?>
<?php
	echo $this->Html->css(array(
	#!# $this->AssetCompress->css(array(
		'main'
	));
	#!# echo $this->AssetCompress->includeCss();
	echo $this->fetch('css');
?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Unfol.io</h1>
			<?php echo $this->element('navigation'); ?>
		</div>
		<div id="main">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>

		</div>
	</div>
<?php
	echo $this->Plate->lib('jquery', array('compressed' => true, 'fallback' => 'libs/jquery-1.6.1'));
	echo $this->Html->script(array(
	#!# $this->AssetCompress->script(array(
		'main'
	));
	#!# echo $this->AssetCompress->includeJs();
	echo $this->fetch('scripts');
	echo $this->element('analytics', array('code' => 'UA-31891793-1', 'domain' => 'unfol.io'), array('plugin' => 'BakingPlate'));
?>
</body>
</html>