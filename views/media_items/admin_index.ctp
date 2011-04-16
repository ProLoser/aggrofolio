<h2><?php __('Media Items');?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Media Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
</ul>
<div class="mediaItems index">
	<div class="header">
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>		</p>
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>
			<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
	</div>
	<?php echo $this->Batch->create('MediaItem')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('source');?></th>
			<th><?php echo $this->Paginator->sort('album_id');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'name',
			'source',
			'album_id' => array('empty' => '-- None --'),
			'published',
			'uuid'
		));
	$i = 0;
	foreach ($mediaItems as $mediaItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mediaItem['MediaItem']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($mediaItem['MediaItem']['name'], $mediaItem['MediaItem']['url']); ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['source']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mediaItem['Album']['name'], array('controller' => 'albums', 'action' => 'view', $mediaItem['Album']['id'])); ?>
		</td>
		<td><?php echo $mediaItem['MediaItem']['published']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['uuid']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mediaItem['MediaItem']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mediaItem['MediaItem']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mediaItem['MediaItem']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $mediaItem['MediaItem']['id'])); ?>
			<?php echo $this->Batch->checkbox($mediaItem['MediaItem']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'name',
			'source',
			'album_id' => array('empty' => '-- None --'),
			'published',
			'uuid'
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<div class="paging">
		<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
	</div>
</div>