<header>
	<hgroup><h1><?php echo __('Media Categories');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Media Category'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="mediaCategories index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</header>
	<?php echo $this->Batch->create('MediaCategory')?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'name',
			'description',
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
		<td><?php echo $mediaCategory['MediaCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $mediaCategory['MediaCategory']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mediaCategory['MediaCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mediaCategory['MediaCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $mediaCategory['MediaCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $mediaCategory['MediaCategory']['id'])); ?>
			<?php echo $this->Batch->checkbox($mediaCategory['MediaCategory']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'name',
			'description',
		));?>
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