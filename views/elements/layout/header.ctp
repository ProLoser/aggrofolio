<h1>Dean Sofer</h1>
<ul id="mainNav">
	<li><?php echo $this->Html->link('Resume', array('controller' => 'resumes', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Aggropholio', '/log'); ?></li>
</ul>
<?php if (!empty($actions_for_layout)): ?>
<div class="actions">
	<h3>Actions</h3>
	<?php echo $actions_for_layout; ?>
</div>
<?php endif;?>
<?php if (!empty($nav_for_layout)): ?>
<div class="nav">
	<?php echo $nav_for_layout; ?>
</div>
<?php endif;?>
<?php if (!empty($categories_for_layout)): $type = $catType_for_layout . 'Category'; ?>
	<h3>Categories</h3>
	<ul>
	<?php foreach ($categories_for_layout as $id => $category): ?>
		<li><?php echo $this->Html->link($category, array('controller' => Inflector::tableize($type), 'action' => 'view', $id)); ?></li>
	<?php endforeach ?>
	</ul>
<?php endif;?>