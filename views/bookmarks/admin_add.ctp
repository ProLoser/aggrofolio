<article class="bookmarks form">
	<header>
		<h3><?php __('Add Bookmark'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('List Bookmarks', true), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Bookmark Category', true), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		</ul>
	</header>
<?php echo $this->Form->create('Bookmark');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('description');
		echo $this->Form->input('account_id');
		echo $this->Form->input('bookmark_category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</article>