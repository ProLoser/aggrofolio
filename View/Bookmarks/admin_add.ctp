
<header>
	<hgroup>
		<h1><?php echo __('Admin Add Bookmark'); ?></h1>
	</hgroup>
	<ul>
			<li><?php echo $this->Html->link(__('List Bookmarks'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories'), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Category'), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships'), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship'), array('controller' => 'post_relationships', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="bookmarks form">
<?php echo $this->Form->create('Bookmark');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('url', array('empty' => __('-- Select One --')));
		echo $this->Form->input('description');
		echo $this->Form->input('account_id', array('empty' => __('-- None --')));
		echo $this->Form->input('bookmark_category_id', array('empty' => __('-- None --')));
		echo $this->Form->input('uuid');
		echo $this->Form->input('user_id', array('empty' => __('-- Select One --')));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit();?>
	</footer>
<?php echo $this->Form->end();?>
</article>