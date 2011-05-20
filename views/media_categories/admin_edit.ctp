<h1><?php __('Admin Edit Media Category'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MediaCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MediaCategory.id'))); ?></li>
	<li><?php echo $this->Html->link(__('List Media Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
</ul>
<div class="mediaCategories form">
<?php echo $this->Form->create('MediaCategory');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => '-- None --'));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>