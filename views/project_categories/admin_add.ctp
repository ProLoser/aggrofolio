<h2><?php __('Admin Add Project Category'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Project Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
</ul>
<div class="projectCategories form">
<?php echo $this->Form->create('ProjectCategory');?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => '-- None --'));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>