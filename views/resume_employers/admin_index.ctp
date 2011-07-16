<header>
	<hgroup><h1><?php __('Resume Employers');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume Employer', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeEmployers index">
	<header>
		<h3><?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total', true)
		));
		?></h3>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</header>
	<?php echo $this->Batch->create('ResumeEmployer')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('date_started');?></th>
			<th><?php echo $this->Paginator->sort('date_ended');?></th>
			<th><?php echo $this->Paginator->sort('currently_employed');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th class="actions"><?php __('Actions');?> <?php echo $this->Batch->all();?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'name',
			'account_id' => array('empty' => '-- None --'),
			'title',
			null,
			null,
			'currently_employed',
			'published',
			'deleted',
		));
	$i = 0;
	foreach ($resumeEmployers as $resumeEmployer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeEmployer['ResumeEmployer']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeEmployer['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resumeEmployer['Account']['id'])); ?>
		</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['title']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['date_started']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['date_ended']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['currently_employed']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['published']; ?>&nbsp;</td>
		<td><?php echo $resumeEmployer['ResumeEmployer']['deleted']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resumeEmployer['ResumeEmployer']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resumeEmployer['ResumeEmployer']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resumeEmployer['ResumeEmployer']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resumeEmployer['ResumeEmployer']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeEmployer['ResumeEmployer']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'name',
			'account_id' => array('empty' => '-- None --'),
			'title',
			null,null,
			'currently_employed',
			'published',
			'deleted',
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<footer>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>