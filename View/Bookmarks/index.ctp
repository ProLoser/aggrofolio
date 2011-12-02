<header>
	<h2><?php echo __('Bookmarks');?></h2>
	<p class="paging">
	<?php 
		echo $this->Paginator->prev();
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next();
	?>
	</p>
</header>
<article class="bookmarks index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
	</header>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('url');?></th>
		<th><?php echo $this->Paginator->sort('description');?></th>
		<th><?php echo $this->Paginator->sort('account_id');?></th>
		<th><?php echo $this->Paginator->sort('bookmark_category_id');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $bookmark['Bookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $bookmark['Bookmark']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</article>