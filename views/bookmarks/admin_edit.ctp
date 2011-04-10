<div class="bookmarks form">
<?php echo $this->Form->create('Bookmark');?>
	<fieldset>
 		<legend><?php __('Edit Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('description');
		echo $this->Form->input('account_id');
		echo $this->Form->input('bookmark_category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Bookmark.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Bookmark.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Category', true), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>