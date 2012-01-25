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
		<p><?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?></p>
		<div class="paging">
			<?php echo $this->Paginator->prev();?>
		 	<?php echo $this->Paginator->numbers(array('separator' => null));?>
			<?php echo $this->Paginator->next();?>
		</div>
	</header>
	<?php echo $this->Batch->create('Account');?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th><?php echo $this->Paginator->sort('username');?></th>
		<th><?php echo $this->Paginator->sort('email');?></th>
		<th><?php echo $this->Paginator->sort('type');?></th>
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	echo $this->Batch->filter(array(
		null, null, null, 'username', 'email', 'type', 'published'
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
		<td><?php echo $account['Account']['created']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['modified']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['username']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['email']; ?>&nbsp;</td>
		<td><?php echo $types[$account['Account']['type']]; ?>&nbsp;</td>
		<td><?php echo $account['Account']['published']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Login'), array('action' => 'connect', $account['Account']['id']), array('class' => 'login', 'title' => 'Login')); ?>
			<?php echo $this->Html->link(__('Scan'), array('action' => 'scan', $account['Account']['id']), array('class' => 'scan', 'title' => 'Scan')); ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $account['Account']['id']), array('class' => 'view', 'title' => 'View')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $account['Account']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $account['Account']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $account['Account']['id'])); ?>
			<?php echo $this->Batch->checkbox($account['Account']['id'])?>
		</td>
	</tr>
<?php endforeach; 
echo $this->Batch->batch(array(null, null, null, 'username', 'email', 'type', 'published'));?>
	</table>
	<?php echo $this->Batch->end()?>
</article>