<h2><?php __('Albums');?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Album', true), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Media Categories', true), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Media Category', true), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Media Items', true), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Media Item', true), array('controller' => 'media_items', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Resume Employers', true), array('controller' => 'resume_employers', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Resume Schools', true), array('controller' => 'resume_schools', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add')); ?> </li>
</ul>
<div class="albums index">
	<div class="header">
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>
			<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>		</p>
	</div>
	<?php echo $this->Batch->create('ResumeSchool')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('media_category_id');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
echo $this->Batch->filter(array('id',
		null,
		null,
		'name',
		'description',
		'url',
		'published',
		'media_category_id' => array('empty' => '-- None --'),
		'uuid',
		'account_id' => array('empty' => '-- None --')));

	$i = 0;
	foreach ($albums as $album):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $album['Album']['id']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['created']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['modified']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['name']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['description']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['url']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['published']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($album['MediaCategory']['name'], array('controller' => 'media_categories', 'action' => 'view', $album['MediaCategory']['id'])); ?>
		</td>
		<td><?php echo $album['Album']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($album['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $album['Account']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Scan', true), array('controller' => 'media_items', 'action' => 'scan', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $album['Album']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $album['Album']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $album['Album']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $album['Album']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
<?php echo $this->Batch->batch(array('id',
		null,
		null,
		'name',
		'description',
		'url',
		'published',
		'media_category_id' => array('empty' => '-- None --'),
		'uuid',
		'account_id' => array('empty' => '-- None --'))); ?>	</table>
		<?php echo $this->Batch->end()?>	
	<div class="paging">
		<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
		| <?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
	</div>
</div>