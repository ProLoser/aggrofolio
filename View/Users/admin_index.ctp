<header>
	<hgroup>
		<h1><?php echo __('Users');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="users index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
		));
		?>		</h3>
		<p class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</p>
	</header>
	<?php echo $this->Batch->create('User')?>	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th><?php echo $this->Paginator->sort('email');?></th>
		<th><?php echo $this->Paginator->sort('password');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	echo $this->Batch->filter(array(
		null,
		null,
		null,
		'email',
		'password',
		'name'
	));
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
		<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
		<td><?php echo $user['User']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $user['User']['id'])); ?>
			<?php echo $this->Batch->checkbox($user['User']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
	echo $this->Batch->batch(array(
		null,
		null,
		null,
		'email',
		'password',
		'name'
	));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<footer>
		<h3>Records:</h3>
		<p class="paging limit">
			<?php echo $this->Paginator->limit(array(10,20,50,100));?>
		</p>
		<ul class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li'));?>				<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</ul>
	</footer>
</article>
