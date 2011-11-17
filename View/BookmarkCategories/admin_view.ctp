<div class="bookmarkCategories view">
<h1><?php echo __('Bookmark Category');?></h1>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Parent Bookmark Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($bookmarkCategory['ParentBookmarkCategory']['name'], array('controller' => 'bookmark_categories', 'action' => 'view', $bookmarkCategory['ParentBookmarkCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookmark Category'), array('action' => 'edit', $bookmarkCategory['BookmarkCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Bookmark Category'), array('action' => 'delete', $bookmarkCategory['BookmarkCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $bookmarkCategory['BookmarkCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories'), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Bookmark Category'), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bookmark Categories');?></h3>
	<?php if (!empty($bookmarkCategory['ChildBookmarkCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($bookmarkCategory['ChildBookmarkCategory'] as $childBookmarkCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childBookmarkCategory['id'];?></td>
			<td><?php echo $childBookmarkCategory['created'];?></td>
			<td><?php echo $childBookmarkCategory['name'];?></td>
			<td><?php echo $childBookmarkCategory['description'];?></td>
			<td><?php echo $childBookmarkCategory['parent_id'];?></td>
			<td><?php echo $childBookmarkCategory['lft'];?></td>
			<td><?php echo $childBookmarkCategory['rght'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bookmark_categories', 'action' => 'view', $childBookmarkCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookmark_categories', 'action' => 'edit', $childBookmarkCategory['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'bookmark_categories', 'action' => 'delete', $childBookmarkCategory['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $childBookmarkCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Bookmark Category'), array('controller' => 'bookmark_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Bookmarks');?></h3>
	<?php if (!empty($bookmarkCategory['Bookmark'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Bookmark Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($bookmarkCategory['Bookmark'] as $bookmark):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $bookmark['id'];?></td>
			<td><?php echo $bookmark['created'];?></td>
			<td><?php echo $bookmark['name'];?></td>
			<td><?php echo $bookmark['url'];?></td>
			<td><?php echo $bookmark['description'];?></td>
			<td><?php echo $bookmark['account_id'];?></td>
			<td><?php echo $bookmark['bookmark_category_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $bookmark['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
