<header>
	<hgroup>
		<h1><?php echo $this->Html->link('Administrator', '/admin')?></h1>
		<h2><?php echo $this->Html->link('Unfol.io', '/')?></h2>
	</hgroup>
	<div>
		<p>Welcome </p>
		<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('title' => 'Logout', 'class' => 'logout'))?>
	</div>
</header> 

<h3>Admin</h3>
<ul class="toggle">
	<li class="icn_profile"><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li>
</ul>

<footer>
	<hr />
	<p><strong>Copyright &copy; 2011 Unfol.io</strong></p>
	<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
</footer>