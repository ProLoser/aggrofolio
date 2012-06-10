<header>
	<hgroup>
		<h1><?php echo __('Resume Employers');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume Employer'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships'), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship'), array('controller' => 'post_relationships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeEmployers index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Showing %start% to %end% of %count% total')
		));
		?>		</h3>
		<p class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</p>
	</header>
	<?php echo $this->Batch->create('ResumeEmployer')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('date_started');?></th>
			<th><?php echo $this->Paginator->sort('date_ended');?></th>
			<th><?php echo $this->Paginator->sort('currently_employed');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'name',
			'date_started',
			'date_ended',
			'currently_employed',
			'published',
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
		<td>
			<strong><?php echo $resumeEmployer['ResumeEmployer']['name']; ?></strong>
			<?php if (!empty($resumeEmployer['ResumeEmployer']['title'])): ?>
				<?php echo $resumeEmployer['ResumeEmployer']['title']; ?>
			<?php endif ?>
			&nbsp;
		</td>
		<td><?php if (!empty($resumeEmployer['ResumeEmployer']['date_started'])) echo $this->Time->timeAgoInWords($resumeEmployer['ResumeEmployer']['date_started']); ?>&nbsp;</td>
		<td><?php if (!empty($resumeEmployer['ResumeEmployer']['date_ended'])) echo $this->Time->timeAgoInWords($resumeEmployer['ResumeEmployer']['date_ended']); ?>&nbsp;</td>
		<td><?php echo ($resumeEmployer['ResumeEmployer']['currently_employed']) ? __('Yes') : __('No'); ?>&nbsp;</td>
		<td><?php echo ($resumeEmployer['ResumeEmployer']['published']) ? __('Yes') : __('No'); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resumeEmployer['ResumeEmployer']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resumeEmployer['ResumeEmployer']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $resumeEmployer['ResumeEmployer']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeEmployer['ResumeEmployer']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeEmployer['ResumeEmployer']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'name',
			'date_started',
			'date_ended',
			'currently_employed',
			'published',
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
