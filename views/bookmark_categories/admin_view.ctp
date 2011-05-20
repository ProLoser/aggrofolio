<div class="bookmarkCategories view">
<h1><?php  __('Bookmark Category');?></h1>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Bookmark Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($bookmarkCategory['ParentBookmarkCategory']['name'], array('controller' => 'bookmark_categories', 'action' => 'view', $bookmarkCategory['ParentBookmarkCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookmarkCategory['BookmarkCategory']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookmark Category', true), array('action' => 'edit', $bookmarkCategory['BookmarkCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Bookmark Category', true), array('action' => 'delete', $bookmarkCategory['BookmarkCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmarkCategory['BookmarkCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories', true), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Bookmark Category', true), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks', true), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Bookmark Categories');?></h3>
	<?php if (!empty($bookmarkCategory['ChildBookmarkCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('Lft'); ?></th>
		<th><?php __('Rght'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
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
				<?php echo $this->Html->link(__('View', true), array('controller' => 'bookmark_categories', 'action' => 'view', $childBookmarkCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'bookmark_categories', 'action' => 'edit', $childBookmarkCategory['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'bookmark_categories', 'action' => 'delete', $childBookmarkCategory['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childBookmarkCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Bookmark Category', true), array('controller' => 'bookmark_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Bookmarks');?></h3>
	<?php if (!empty($bookmarkCategory['Bookmark'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Bookmark Category Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
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
				<?php echo $this->Html->link(__('View', true), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookmark['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bookmark', true), array('controller' => 'bookmarks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
