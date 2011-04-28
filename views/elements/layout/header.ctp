<h1>Dean Sofer</h1>
<ul id="mainNav">
	<li><?php echo $this->Html->link('Resume', array('controller' => 'resumes', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Aggropholio', '/log'); ?></li>
</ul>

<?php if (!empty($nav_for_layout)): ?>
<nav>
	<?php echo $nav_for_layout; ?>
</nav>		
<?php endif;?>