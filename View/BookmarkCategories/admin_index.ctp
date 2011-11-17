<header>
	<hgroup><h1><?php echo __('Bookmark Categories');?></h1></hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('New Bookmark Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories'), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Bookmark Category'), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="bookmarkCategories index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('lft');?></th>
			<th><?php echo $this->Paginator->sort('rght');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
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
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bookmarkCategory['BookmarkCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bookmarkCategory['BookmarkCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $bookmarkCategory['BookmarkCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $bookmarkCategory['BookmarkCategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<footer>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
		));
		?></p>
	
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>