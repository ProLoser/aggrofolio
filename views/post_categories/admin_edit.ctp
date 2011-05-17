<h2><?php __('Admin Edit Post Category'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PostCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PostCategory.id'))); ?></li>
	<li><?php echo $this->Html->link(__('List Post Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
</ul>
<div class="postCategories form">
<?php echo $this->Form->create('PostCategory');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => '-- None --'));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>