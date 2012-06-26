<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Timeline'); ?>:
		<?php echo $title_for_layout; ?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $this->fetch('meta'); ?>

    <!-- Le styles -->
	<?php
		echo $this->Html->css(array(
			'bootstrap',
			'bootstrap-responsive',
			'/js/mylibs/select2/select2',
			'layout',
		));
		echo $this->fetch('css');
	?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body ng-controller="Importer">

    <?php echo $this->element('navigation')?>

    <div class="container-fluid">
	  <?php echo $this->Session->flash(); ?>
      <div class="row-fluid">
        <?php echo $this->element('resumeBuilder');?>
        <div ng-class="{span10:resumeBuilder}">
        	<?php echo $this->fetch('content'); ?>
        </div>
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Unfol.io 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <?php echo $this->element('modal'); ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<?php
	echo $this->Plate->lib('jquery', array('compressed' => true, 'fallback' => 'libs/jquery-1.6.1'));
	echo $this->Html->script(array(
		'bootstrap-transition',
		'bootstrap-alert',
		'bootstrap-modal',
		'bootstrap-dropdown',
		'bootstrap-scrollspy',
		'bootstrap-tab',
		'bootstrap-tooltip',
		'bootstrap-popover',
		'bootstrap-button',
		'bootstrap-collapse',
		'bootstrap-carousel',
		'bootstrap-typeahead',
		'angular.min',
		'mylibs/select2/select2',
		'script',
	));
	echo $this->fetch('scripts');
?>

  </body>
</html>
