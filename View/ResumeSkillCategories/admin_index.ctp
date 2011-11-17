<header>
	<hgroup>
		<h1><?php echo __('Resume Skill Categories');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume Skill Category'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Resume Skills'), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSkillCategories index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
		));
		?>		</h3>
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>
			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
	</header>
	<?php echo $this->Batch->create('ResumeSkillCategory')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			null,
			null,
			'name',
			'description',
			'parent_id' => array('empty' => '-- None --')
		));
	$i = 0;
	foreach ($resumeSkillCategories as $resumeSkillCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['modified']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['description']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['parent_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resumeSkillCategory['ResumeSkillCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resumeSkillCategory['ResumeSkillCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $resumeSkillCategory['ResumeSkillCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeSkillCategory['ResumeSkillCategory']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeSkillCategory['ResumeSkillCategory']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			null,
			null,
			'name',
			'description',
			'parent_id' => array('empty' => '-- None --')
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<footer>
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous'), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			<?php echo $this->Paginator->numbers();?>			<?php echo $this->Paginator->next(__('next') . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
	</footer>
</article>
