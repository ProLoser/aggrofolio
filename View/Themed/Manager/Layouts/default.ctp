<!DOCTYPE HTML>
<?php echo $this->Plate->iecc('<html class="ie">', '<9'); ?>
<?php echo $this->Plate->iecc('<html>', false); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Admin'); ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
			'layout',
			'/batch/css/batch',
			'/js/mylibs/markitup/skins/simple/style',
			'/js/mylibs/markitup/sets/default/style',
		));
		echo $this->fetch('css');
		echo $this->Html->script('libs/modernizr-1.7.min');
	?>
</head>
<body>
	<aside id="sidebar">
		<?php echo $this->element('layout/navigation'); ?>
	</aside>

	<section id="main">

		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Session->flash('email'); ?>
		<?php echo $this->fetch('content'); ?>

		<div class="spacer"></div>
	</section>
<?php
	echo $this->Plate->lib('jquery', array('compressed' => true, 'fallback' => 'libs/jquery-1.6.1'));
	echo $this->Html->script(array(
		'jquery.equalHeight',
		'/batch/js/jquery',
		'mylibs/markitup/jquery.markitup',
		'mylibs/markitup/sets/default/set',
		'script',
	));
	echo $this->fetch('scripts');
?>
</body>
</html>