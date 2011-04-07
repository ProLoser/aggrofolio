<h1>Dean Sofer</h1>
<nav>
	<ul>
		<li><?php echo $this->Html->link('Resume', array('controller' => 'resumes', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Aggropholio', array('controller' => 'posts', 'action' => 'index')); ?></li>
	</ul>
</nav>
<h3>Actions</h3>
<?php if (isset($actions_for_layout)) echo $actions_for_layout; ?>