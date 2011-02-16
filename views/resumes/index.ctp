<div class="resumes index">
	<h2><?php __('Resumes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('purpose');?></th>
			<th><?php echo $this->Paginator->sort('attachment_file_name');?></th>
			<th><?php echo $this->Paginator->sort('attachment_file_size');?></th>
			<th><?php echo $this->Paginator->sort('attachment_meta_type');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('visible');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($resumes as $resume):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resume['Resume']['id']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['created']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['modified']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['purpose']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['attachment_file_name']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['attachment_file_size']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['attachment_meta_type']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['content']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['visible']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resume['User']['name'], array('controller' => 'users', 'action' => 'view', $resume['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resume['Resume']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resume['Resume']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resume['Resume']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resume['Resume']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Resume', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>