<header>
	<hgroup>
		<h1><?php echo __('Bookmarks');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Bookmark'), array('action' => 'add')); ?></li>
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
<article class="bookmarks index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
		));
		?>		</h3>
		<p class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</p>
	</header>
	<?php echo $this->Batch->create('Bookmark')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('bookmark_category_id');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			null,
			'name',
			'url',
			'description',
			'account_id' => array('empty' => '-- None --'),
			'bookmark_category_id' => array('empty' => '-- None --'),
			'uuid',
			'user_id' => array('empty' => '-- None --')
		));
	$i = 0;
	foreach ($bookmarks as $bookmark):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $bookmark['Bookmark']['id']; ?>&nbsp;</td>
		<td><?php echo $bookmark['Bookmark']['created']; ?>&nbsp;</td>
		<td><?php echo $bookmark['Bookmark']['name']; ?>&nbsp;</td>
		<td><?php echo $bookmark['Bookmark']['url']; ?>&nbsp;</td>
		<td><?php echo $bookmark['Bookmark']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bookmark['Account']['label'], array('controller' => 'accounts', 'action' => 'view', $bookmark['Account']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bookmark['BookmarkCategory']['name'], array('controller' => 'bookmark_categories', 'action' => 'view', $bookmark['BookmarkCategory']['id'])); ?>
		</td>
		<td><?php echo $bookmark['Bookmark']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bookmark['User']['name'], array('controller' => 'users', 'action' => 'view', $bookmark['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bookmark['Bookmark']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bookmark['Bookmark']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $bookmark['Bookmark']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Batch->checkbox($bookmark['Bookmark']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			null,
			'name',
			'url',
			'description',
			'account_id' => array('empty' => '-- None --'),
			'bookmark_category_id' => array('empty' => '-- None --'),
			'uuid',
			'user_id' => array('empty' => '-- None --')
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<footer>
		<h3>Records:</h3>
		<p class="limit">
			<?php echo $this->Paginator->limit(array(10,20,50,100));?>
		</p>
		<ul class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li'));?>			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</ul>
	</footer>
</article>
