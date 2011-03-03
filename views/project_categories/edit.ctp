<div class="projectCategories form">
<?php echo $this->Form->create('ProjectCategory');?>
	<fieldset>
 		<legend><?php __('Edit Project Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ProjectCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ProjectCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Project Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Project Categories', true), array('controller' => 'project_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Project Category', true), array('controller' => 'project_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>