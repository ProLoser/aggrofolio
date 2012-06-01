<!DOCTYPE HTML>
<?php echo $this->Plate->iecc('<html class="ie">', '<9'); ?>
<?php echo $this->Plate->iecc('<html>', false); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Timeline'); ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
			'layout',
		));
		echo $styles_for_layout;
	?>
</head>
<body>
	<h1>Timeline Importer</h1>
	<?php echo $this->Html->link('/admin');?>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Session->flash('email'); ?>
	<?php echo $content_for_layout; ?>

<?php
	echo $this->Plate->lib('jquery', array('compressed' => true, 'fallback' => 'libs/jquery-1.6.1'));
	echo $this->Html->script(array(
		'script',
	));
	echo $scripts_for_layout;
?>
</body>
</html>
