<header>
	<hgroup>
		<h1><?php __('Accounts');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Account', true), array('action' => 'add')); ?></li>
	</ul>
</header>
<article class="accounts index">
	<header>
		<p><?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total', true)
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
		<th class="actions"><?php __('Actions');?></th>
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
		<td><?php echo $account['Account']['type']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['published']; ?>&nbsp;</td>
		<td class="actions">
		<?php if (in_array($account['Account']['type'], array('deviantart', 'flickr'))): ?>
			<?php echo $this->Html->link(__('Scan', true), array('controller' => 'albums', 'action' => 'scan', $account['Account']['id']), array('class' => 'scan')); ?>
		<?php elseif ($account['Account']['type'] == 'xmarks'): ?>
			<?php echo $this->Html->link(__('Scan', true), array('controller' => 'bookmarks', 'action' => 'scan', $account['Account']['id']), array('class' => 'scan')); ?>
		<?php else: ?>
			<?php $action = ($account['Account']['type'] == 'linkedin') ? 'login': 'scan'; ?>
			<?php echo $this->Html->link(__('Scan', true), array('action' => $action, $account['Account']['id']), array('class' => 'scan')); ?>
		<?php endif ?>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $account['Account']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $account['Account']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $account['Account']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $account['Account']['id'])); ?>
			<?php echo $this->Batch->checkbox($account['Account']['id'])?>
		</td>
	</tr>
<?php endforeach; 
echo $this->Batch->batch(array(null, null, null, 'username', 'email', 'type', 'published'));?>
	</table>
	<?php echo $this->Batch->end()?>
</article>