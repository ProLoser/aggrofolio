<h2><?php __('Admin Add Post Category'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Post Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
</ul>
<div class="postCategories form">
<?php echo $this->Form->create('PostCategory');?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => '-- None --'));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>