<nav>
<ul>
<?php if ($this->Session->read('Auth.User')): ?>
	<?php if ($this->Session->read('Auth.User.role') === 'admin'): ?>
		<li><?php echo $this->Html->link('Manager', array('manager' => true, 'controller' => 'users', 'action' => 'index')); ?></li>
	<?php endif; ?>
	<li><?php echo $this->Html->link('My Site', 'http://' . $this->Session->read('Auth.User.subdomain') . '.' . $_SERVER['HTTP_HOST']); ?></li>
	<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
<?php elseif ($this->action === 'login'): ?>
	<li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?></li>
<?php else: ?>
	<li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
<?php endif; ?>
</ul>
</nav>