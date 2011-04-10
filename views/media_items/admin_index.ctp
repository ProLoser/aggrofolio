<div class="mediaItems index">
	<h2><?php __('Media Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('attachment_file_name');?></th>
			<th><?php echo $this->Paginator->sort('attachment_file_size');?></th>
			<th><?php echo $this->Paginator->sort('attachment_meta_type');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('source');?></th>
			<th><?php echo $this->Paginator->sort('album_id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mediaItems as $mediaItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mediaItem['MediaItem']['id']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['created']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['modified']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['name']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['attachment_file_name']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['attachment_file_size']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['attachment_meta_type']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['url']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['source']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mediaItem['Album']['name'], array('controller' => 'albums', 'action' => 'view', $mediaItem['Album']['id'])); ?>
		</td>
		<td><?php echo $mediaItem['MediaItem']['description']; ?>&nbsp;</td>
		<td><?php echo $mediaItem['MediaItem']['published']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mediaItem['MediaItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mediaItem['MediaItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mediaItem['MediaItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mediaItem['MediaItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Media Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>