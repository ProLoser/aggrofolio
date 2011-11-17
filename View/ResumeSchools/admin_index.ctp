<header>
	<hgroup><h1><?php echo __('Resume Schools');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume School'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSchools index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</header>
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
			<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			null,
			null,
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'published',
			'deleted',
			null,null,
			'field_of_study',
			'degree',
			'name',
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
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resumeSchool['ResumeSchool']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resumeSchool['ResumeSchool']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $resumeSchool['ResumeSchool']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeSchool['ResumeSchool']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeSchool['ResumeSchool']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			null,
			null,
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'published',
			'deleted',
			null,null,
			'field_of_study',
			'degree',
			'name',
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