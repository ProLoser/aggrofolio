<header>
	<hgroup><h1><?php echo __('Add Bookmark Category'); ?></h1></hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('List Bookmark Categories'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories'), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Bookmark Category'), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="bookmarkCategories form">
<?php echo $this->Form->create('BookmarkCategory');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => '-- None --'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</article>