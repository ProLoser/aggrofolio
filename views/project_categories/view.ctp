<div class="projectCategories view">
<h2><?php  __('Project Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Project Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectCategory['ParentProjectCategory']['name'], array('controller' => 'project_categories', 'action' => 'view', $projectCategory['ParentProjectCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Category', true), array('action' => 'edit', $projectCategory['ProjectCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Project Category', true), array('action' => 'delete', $projectCategory['ProjectCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectCategory['ProjectCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Categories', true), array('controller' => 'project_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Project Category', true), array('controller' => 'project_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Project Categories');?></h3>
	<?php if (!empty($projectCategory['ChildProjectCategory'])):?>
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
		foreach ($projectCategory['ChildProjectCategory'] as $childProjectCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childProjectCategory['id'];?></td>
			<td><?php echo $childProjectCategory['created'];?></td>
			<td><?php echo $childProjectCategory['modified'];?></td>
			<td><?php echo $childProjectCategory['name'];?></td>
			<td><?php echo $childProjectCategory['description'];?></td>
			<td><?php echo $childProjectCategory['parent_id'];?></td>
			<td><?php echo $childProjectCategory['lft'];?></td>
			<td><?php echo $childProjectCategory['rght'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'project_categories', 'action' => 'view', $childProjectCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'project_categories', 'action' => 'edit', $childProjectCategory['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'project_categories', 'action' => 'delete', $childProjectCategory['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childProjectCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Project Category', true), array('controller' => 'project_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
