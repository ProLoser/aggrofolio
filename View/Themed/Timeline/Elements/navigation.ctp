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
          <li><?php echo $this->Html->link('Settings', array('controller' => 'settings', 'action' => 'index'), array('class' => 'ajax'));?></li>
          <li class="divider"></li>
          <li><?php echo $this->Html->link('Sign Out', array('admin' => false, 'controller' => 'users', 'action' => 'logout'));?></li>
        </ul>
      </div>
      <div class="nav-collapse">
        <ul class="nav">
          <li><?php echo $this->Html->link('Old Admin', '/admin');?></li>
          <li><a ng-click="resumeBuilder=!resumeBuilder">Build a Resume</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>