<div class="mediaCategories view">
<h2><?php  __('Media Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaCategory['MediaCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaCategory['MediaCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaCategory['MediaCategory']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaCategory['MediaCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaCategory['MediaCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Media Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mediaCategory['ParentMediaCategory']['name'], array('controller' => 'media_categories', 'action' => 'view', $mediaCategory['ParentMediaCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaCategory['MediaCategory']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaCategory['MediaCategory']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Media Category', true), array('action' => 'edit', $mediaCategory['MediaCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Media Category', true), array('action' => 'delete', $mediaCategory['MediaCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mediaCategory['MediaCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Categories', true), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Media Category', true), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Albums');?></h3>
	<?php if (!empty($mediaCategory['Album'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Media Category Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mediaCategory['Album'] as $album):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $album['id'];?></td>
			<td><?php echo $album['created'];?></td>
			<td><?php echo $album['modified'];?></td>
			<td><?php echo $album['name'];?></td>
			<td><?php echo $album['description'];?></td>
			<td><?php echo $album['url'];?></td>
			<td><?php echo $album['published'];?></td>
			<td><?php echo $album['media_category_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'albums', 'action' => 'view', $album['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'albums', 'action' => 'edit', $album['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'albums', 'action' => 'delete', $album['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $album['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Media Categories');?></h3>
	<?php if (!empty($mediaCategory['ChildMediaCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('Lft'); ?></th>
		<th><?php __('Rght'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mediaCategory['ChildMediaCategory'] as $childMediaCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childMediaCategory['id'];?></td>
			<td><?php echo $childMediaCategory['created'];?></td>
			<td><?php echo $childMediaCategory['modified'];?></td>
			<td><?php echo $childMediaCategory['name'];?></td>
			<td><?php echo $childMediaCategory['description'];?></td>
			<td><?php echo $childMediaCategory['parent_id'];?></td>
			<td><?php echo $childMediaCategory['lft'];?></td>
			<td><?php echo $childMediaCategory['rght'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'media_categories', 'action' => 'view', $childMediaCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'media_categories', 'action' => 'edit', $childMediaCategory['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'media_categories', 'action' => 'delete', $childMediaCategory['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childMediaCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Media Category', true), array('controller' => 'media_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
