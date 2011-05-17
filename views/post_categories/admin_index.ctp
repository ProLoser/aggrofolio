<h2><?php __('Post Categories');?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Post Category', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
</ul>
<div class="postCategories index">
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
	<?php echo $this->Batch->create('PostCategory')?>	<table cellpadding="0" cellspacing="0">
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
	foreach ($postCategories as $postCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $postCategory['PostCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $postCategory['PostCategory']['created']; ?>&nbsp;</td>
		<td><?php echo $postCategory['PostCategory']['modified']; ?>&nbsp;</td>
		<td><?php echo $postCategory['PostCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $postCategory['PostCategory']['description']; ?>&nbsp;</td>
		<td><?php echo $postCategory['PostCategory']['parent_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $postCategory['PostCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $postCategory['PostCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $postCategory['PostCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $postCategory['PostCategory']['id'])); ?>
			<?php echo $this->Batch->checkbox($postCategory['PostCategory']['id']); ?>
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
		<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
	</div>
</div>
