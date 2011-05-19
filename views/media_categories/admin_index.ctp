<h2><?php __('Media Categories');?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Media Category', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
</ul>
<div class="mediaCategories index">
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
	<?php echo $this->Batch->create('MediaCategory')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			null,
			null,
			'name',
			'description',
			'parent_id' => array('empty' => '-- None --')
		));
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
		<td><?php echo $mediaCategory['MediaCategory']['parent_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mediaCategory['MediaCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mediaCategory['MediaCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mediaCategory['MediaCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $mediaCategory['MediaCategory']['id'])); ?>
			<?php echo $this->Batch->checkbox($mediaCategory['MediaCategory']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			null,
			null,
			'name',
			'description',
			'parent_id' => array('empty' => '-- None --')
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<div class="paging">
		<?php echo $this->Paginator->prev();?>
		<?php echo $this->Paginator->numbers(array('separator' => ''));?>
		<?php echo $this->Paginator->next();?>
	</div>
</div>