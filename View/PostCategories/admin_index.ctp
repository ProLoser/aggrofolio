<header>
	<hgroup>
		<h1><?php echo __('Post Categories');?></h1>
	</hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('New Post Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="postCategories index">
	<header>
		<h3><?php echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));?></h3>
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
	</header>
	<?php echo $this->Batch->create('PostCategory')?>	<table cellpadding="0" cellspacing="0">
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
	foreach ($postCategories as $postCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $postCategory['PostCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $postCategory['PostCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $postCategory['PostCategory']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $postCategory['PostCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $postCategory['PostCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $postCategory['PostCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $postCategory['PostCategory']['id'])); ?>
			<?php echo $this->Batch->checkbox($postCategory['PostCategory']['id']); ?>
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
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
	</footer>
</article>