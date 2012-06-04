<header>
	<hgroup>
		<h1><?php echo __('Accounts');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?></li>
	</ul>
</header>
<article class="accounts index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Showing %start% to %end% out of %count% total')
		));
		?>		</h3>
		<p class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</p>
	</header>
	<?php echo $this->Batch->create('Account')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('order_weight');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'username',
			'email',
			'type',
			'published',
			'order_weight',
		));
	$i = 0;
	foreach ($accounts as $account):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $account['Account']['id']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['username']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['email']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['type']; ?>&nbsp;</td>
		<td><?php echo ($account['Account']['published']) ? __('Yes') : __('No'); ?>&nbsp;</td>
		<td><?php echo $account['Account']['order_weight']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $account['Account']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $account['Account']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $account['Account']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $account['Account']['id'])); ?>
			<?php echo $this->Batch->checkbox($account['Account']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'username',
			'email',
			'type',
			'published',
			'order_weight',
		));?>	</table>
	<?php echo $this->Batch->end()?>	<footer>
		<h3>Records:</h3>
		<p class="limit">
			<?php echo $this->Paginator->limit(array(10,20,50,100));?>
		</p>
		<ul class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li'));?>			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</ul>
	</footer>
</article>
