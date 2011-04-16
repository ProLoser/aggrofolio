<h2><?php __('Resume Schools');?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Resume School', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
</ul>
<div class="resumeSchools index">
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
	<?php echo $this->Batch->create('ResumeSchool')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th><?php echo $this->Paginator->sort('date_started');?></th>
			<th><?php echo $this->Paginator->sort('date_ended');?></th>
			<th><?php echo $this->Paginator->sort('field_of_study');?></th>
			<th><?php echo $this->Paginator->sort('degree');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('activities');?></th>
			<th><?php echo $this->Paginator->sort('notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			'id',
			null,
			null,
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'published',
			'deleted',
			'date_started',
			'date_ended',
			'field_of_study',
			'degree',
			'name',
			'activities',
			'notes'
		));
	$i = 0;
	foreach ($resumeSchools as $resumeSchool):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeSchool['ResumeSchool']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['modified']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeSchool['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resumeSchool['Account']['id'])); ?>
		</td>
		<td><?php echo $resumeSchool['ResumeSchool']['published']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['deleted']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['date_started']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['date_ended']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['field_of_study']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['degree']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['name']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['activities']; ?>&nbsp;</td>
		<td><?php echo $resumeSchool['ResumeSchool']['notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resumeSchool['ResumeSchool']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resumeSchool['ResumeSchool']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resumeSchool['ResumeSchool']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resumeSchool['ResumeSchool']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeSchool['ResumeSchool']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			'id',
			null,
			null,
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'published',
			'deleted',
			'date_started',
			'date_ended',
			'field_of_study',
			'degree',
			'name',
			'activities',
			'notes'
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<div class="paging">
		<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
	</div>
</div>