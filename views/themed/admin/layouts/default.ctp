<!DOCTYPE HTML>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Admin'); ?>:
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
		echo $this->Plate->iecc(
			$this->Html->css('ie') . 
			$this->Html->script('http://html5shim.googlecode.com/svn/trunk/html5.js'),
			'<9'
		);
		echo $this->Plate->lib('jquery');
		echo $this->Html->script(array(
			'jquery.equalHeight',
			'/batch/js/jquery',
			'mylibs/markitup/jquery.markitup',
			'mylibs/markitup/sets/default/set',
			'script',
		));
		echo $scripts_for_layout;
	?>
</head>
<body>
	<aside id="sidebar">
		<?php echo $this->element('layout/navigation'); ?>
	</aside>
	
	<section id="main">
		
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Session->flash('email'); ?>
		<?php echo $content_for_layout; ?>
		
		<div class="spacer"></div>
	</section>
</body>
</html>