<nav>
<ul>
<?php if ($this->Session->read('Auth.User')): ?>
	<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
	<?php if ($this->Session->read('Auth.User.role') === 'admin'): ?>
		<li><?php echo $this->Html->link('Manager', array('manager' => true, 'controller' => 'users', 'action' => 'index')); ?></li>
	<?php endif; ?>
<?php else: ?>
	<li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
<?php endif; ?>
</ul>
</nav>