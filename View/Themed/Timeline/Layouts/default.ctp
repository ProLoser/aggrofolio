<!DOCTYPE html>
<html lang="en">
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
			'layout',
		));
		echo $this->fetch('css');
	?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php echo $this->Html->link(Configure::read('subdomain') . '.unfol.io', '/', array('class' => 'brand'));?>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?php echo $this->Session->read('Auth.User.name'); ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><?php echo $this->Html->link('Settings', array('controller' => 'settings', 'action' => 'index'));?></li>
              <li class="divider"></li>
              <li><?php echo $this->Html->link('Sign Out', array('admin' => false, 'controller' => 'users', 'action' => 'logout'));?></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li><?php echo $this->Html->link('Old Admin', '/admin');?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
	  <?php echo $this->Session->flash(); ?>
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">
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
		'script',
	));
	echo $this->fetch('scripts');
?>

  </body>
</html>
