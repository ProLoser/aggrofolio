<h1><?php echo __('Contacts');?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?></li>
</ul>
<div class="contacts index">
	<div class="header">
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
	</div>
	<?php echo $this->Batch->create('Contact')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('subject');?></th>
			<th><?php echo $this->Paginator->sort('message');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			null,
			'subject',
			'message',
			'email',
			'name',
			'phone'
		));
	$i = 0;
	foreach ($contacts as $contact):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $contact['Contact']['id']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['created']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['subject']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['message']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['email']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['name']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['phone']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $contact['Contact']['id'])); ?>
			<?php echo $this->Batch->checkbox($contact['Contact']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			null,
			'subject',
			'message',
			'email',
			'name',
			'phone'
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<div class="paging">
		<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
		<?php echo $this->Paginator->numbers(array('separator' => ''));?>
		<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
	</div>
</div>
