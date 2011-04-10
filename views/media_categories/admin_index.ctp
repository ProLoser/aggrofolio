<div class="mediaCategories index">
	<h2><?php __('Media Categories');?></h2>
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
	foreach ($mediaCategories as $mediaCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mediaCategory['MediaCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $mediaCategory['MediaCategory']['created']; ?>&nbsp;</td>
		<td><?php echo $mediaCategory['MediaCategory']['modified']; ?>&nbsp;</td>
		<td><?php echo $mediaCategory['MediaCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $mediaCategory['MediaCategory']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mediaCategory['ParentMediaCategory']['name'], array('controller' => 'media_categories', 'action' => 'view', $mediaCategory['ParentMediaCategory']['id'])); ?>
		</td>
		<td><?php echo $mediaCategory['MediaCategory']['lft']; ?>&nbsp;</td>
		<td><?php echo $mediaCategory['MediaCategory']['rght']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mediaCategory['MediaCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mediaCategory['MediaCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mediaCategory['MediaCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mediaCategory['MediaCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Media Category', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Media Categories', true), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Media Category', true), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>