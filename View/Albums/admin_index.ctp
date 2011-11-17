<header>
	<hgroup><h1><?php echo __('Albums');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Album'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Media Categories'), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Category'), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Items'), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Item'), array('controller' => 'media_items', 'action' => 'add')); ?> </li>
	</ul>
</header>

<article class="albums index">
	<header>
		<div class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</div>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
	</header>
	<?php echo $this->Batch->create('Album')?>	
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th><?php echo $this->Paginator->sort('media_category_id');?></th>
		<th><?php echo $this->Paginator->sort('uuid');?></th>
		<th><?php echo $this->Paginator->sort('account_id');?></th>
		<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php
	echo $this->Batch->filter(array(
		null,
		'name',
		'published',
		'media_category_id' => array('empty' => '-- None --'),
		'uuid',
		'account_id' => array('empty' => '-- None --')
	));

	$i = 0;
	foreach ($albums as $album):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $album['Album']['id']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['name']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['published']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($album['MediaCategory']['name'], array('controller' => 'media_categories', 'action' => 'view', $album['MediaCategory']['id'])); ?>
		</td>
		<td><?php echo $album['Album']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($album['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $album['Account']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Scan'), array('controller' => 'media_items', 'action' => 'scan', $album['Album']['id']), array('class' => 'scan')); ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $album['Album']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $album['Album']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $album['Album']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $album['Album']['id'])); ?>
			<?php echo $this->Batch->checkbox($album['Album']['id'])?>
		</td>
	</tr>
<?php endforeach; ?>
<?php echo $this->Batch->batch(array(
		null,
		'name',
		'published',
		'media_category_id' => array('empty' => '-- None --'),
		'uuid',
		'account_id' => array('empty' => '-- None --'))); ?>	
</table>
		<?php echo $this->Batch->end()?>	
	<footer>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>