<div class="bookmarkCategories form">
<?php echo $this->Form->create('BookmarkCategory');?>
	<fieldset>
 		<legend><?php __('Add Bookmark Category'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Bookmark Category', true), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>