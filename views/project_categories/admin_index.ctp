<div class="projectCategories index">
	<h2><?php __('Project Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('lft');?></th>
			<th><?php echo $this->Paginator->sort('rght');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projectCategories as $projectCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $projectCategory['ProjectCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $projectCategory['ProjectCategory']['created']; ?>&nbsp;</td>
		<td><?php echo $projectCategory['ProjectCategory']['modified']; ?>&nbsp;</td>
		<td><?php echo $projectCategory['ProjectCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $projectCategory['ProjectCategory']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectCategory['ParentProjectCategory']['name'], array('controller' => 'project_categories', 'action' => 'view', $projectCategory['ParentProjectCategory']['id'])); ?>
		</td>
		<td><?php echo $projectCategory['ProjectCategory']['lft']; ?>&nbsp;</td>
		<td><?php echo $projectCategory['ProjectCategory']['rght']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $projectCategory['ProjectCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $projectCategory['ProjectCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $projectCategory['ProjectCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectCategory['ProjectCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Project Category', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Project Categories', true), array('controller' => 'project_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Project Category', true), array('controller' => 'project_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>