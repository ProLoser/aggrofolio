<div class="resumeEmployers index">
	<h2><?php __('Resume Employers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('date_started');?></th>
			<th><?php echo $this->Paginator->sort('date_ended');?></th>
			<th><?php echo $this->Paginator->sort('currently_employed');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($resumeEmployers as $resumeEmployer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeEmployer['ResumeEmployer']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['modified']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeEmployer['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $resumeEmployer['Account']['id'])); ?>
		</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['uuid']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['title']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['date_started']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['date_ended']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['currently_employed']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['published']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['deleted']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resumeEmployer['ResumeEmployer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resumeEmployer['ResumeEmployer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resumeEmployer['ResumeEmployer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeEmployer['ResumeEmployer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Resume Employer', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</div>