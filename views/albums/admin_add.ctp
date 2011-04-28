<h2><?php __('Admin Add Album'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Albums', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Categories', true), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Category', true), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships', true), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship', true), array('controller' => 'post_relationships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Items', true), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Item', true), array('controller' => 'media_items', 'action' => 'add')); ?> </li>
</ul>
<div class="albums form">
<?php echo $this->Form->create('Album');?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('url');
		echo $this->Form->input('published');
		echo $this->Form->input('media_category_id');
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id');
		echo $this->Form->input('project_id');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>