<header>
	<hgroup>
		<h1><?php echo __('Media Items');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Media Item'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</header>

<article class="mediaItems index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
		<div class="paging">
			<span>Records:</span>
			<?php echo $this->Paginator->limit(array(10,20,40));?>
		</div>
	</header>
	<?php echo $this->Batch->create('MediaItem')?>	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('album_id');?></th>
		<th><?php echo $this->Paginator->sort('project_id');?></th>
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th class="actions"><?php echo __('Actions');?><?php echo $this->Batch->all();?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'name',
			'album_id' => array('empty' => '-- None --'),
			'project_id' => array('empty' => '-- None --'),
			'published',
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
		<td><?php echo $this->Html->link($mediaItem['MediaItem']['name'], '/uploads/original-' . $mediaItem['MediaItem']['attachment_file_name'], array('title' => 'View Image')); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mediaItem['Album']['name'], array('controller' => 'albums', 'action' => 'view', $mediaItem['Album']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mediaItem['Project']['name'], array('controller' => 'project', 'action' => 'view', $mediaItem['Project']['id'])); ?>
		</td>
		<td><?php echo $mediaItem['MediaItem']['published']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mediaItem['MediaItem']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mediaItem['MediaItem']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $mediaItem['MediaItem']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $mediaItem['MediaItem']['id'])); ?>
			<?php echo $this->Batch->checkbox($mediaItem['MediaItem']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'name',
			'album_id' => array('empty' => '-- None --'),
			'project_id' => array('empty' => '-- None --'),
			'published',
		));?> 
	</table>
	<?php echo $this->Batch->end()?>
	<footer>
		<div class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</div>
	</footer>
</article>