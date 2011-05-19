<h2><?php __('Bookmarks');?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Bookmark', true), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Bookmark Category', true), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
</ul>
<div class="bookmarks index">
	<div class="header">
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total', true)
		));
		?>	</h3>
		<div class="paging">
			<?php echo $this->Paginator->prev();?>
		 	<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('url');?></th>
		<th><?php echo $this->Paginator->sort('description');?></th>
		<th><?php echo $this->Paginator->sort('account_id');?></th>
		<th><?php echo $this->Paginator->sort('bookmark_category_id');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
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
			<?php echo $this->Html->link($bookmark['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $bookmark['Account']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bookmark['BookmarkCategory']['name'], array('controller' => 'bookmark_categories', 'action' => 'view', $bookmark['BookmarkCategory']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['Bookmark']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>