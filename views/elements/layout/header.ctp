<h1>Dean Sofer</h1>
<ul id="mainNav">
	<li><?php echo $this->Html->link('Resume', array('controller' => 'resumes', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Aggropholio', array('controller' => 'posts', 'action' => 'index')); ?></li>
</ul>
<?php if (isset($actions_for_layout)): ?>
<div class="actions">
	<h3>Actions</h3>
	<?php echo $actions_for_layout; ?>
</div>
<?php endif;?>