<div class="bookmarkCategories index">
	<h2><?php __('Bookmark Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('lft');?></th>
			<th><?php echo $this->Paginator->sort('rght');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($bookmarkCategories as $bookmarkCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['created']; ?>&nbsp;</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bookmarkCategory['ParentBookmarkCategory']['name'], array('controller' => 'bookmark_categories', 'action' => 'view', $bookmarkCategory['ParentBookmarkCategory']['id'])); ?>
		</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['lft']; ?>&nbsp;</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['rght']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $bookmarkCategory['BookmarkCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $bookmarkCategory['BookmarkCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $bookmarkCategory['BookmarkCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmarkCategory['BookmarkCategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Bookmark Category', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Bookmark Category', true), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>