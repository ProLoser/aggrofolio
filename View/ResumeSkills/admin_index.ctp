<header>
	<hgroup><h1><?php echo __('Resume Skills');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'resume_skill_categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'resume_skill_categories', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSkills index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?></h3>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</header>
	<?php echo $this->Batch->create('ResumeSkill')?>	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('years');?></th>
			<th><?php echo $this->Paginator->sort('proficiency');?></th>
			<th><?php echo $this->Paginator->sort('Category', 'resume_skill_category_id');?></th>
			<th class="actions"><?php echo __('Actions');?><?php echo $this->Batch->all()?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			null,
			'name',
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'years',
			'proficiency',
			'resume_skill_category_id' => array('empty' => '-- None --'),
		));
	$i = 0;
	foreach ($resumeSkills as $resumeSkill):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeSkill['ResumeSkill']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['name']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeSkill['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resumeSkill['Account']['id'])); ?>
		</td>
		<td><?php echo $resumeSkill['ResumeSkill']['years']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['proficiency']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeSkill['ResumeSkillCategory']['name'], array('controller' => 'resume_skill_categories', 'action' => 'view', $resumeSkill['ResumeSkillCategory']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resumeSkill['ResumeSkill']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resumeSkill['ResumeSkill']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $resumeSkill['ResumeSkill']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeSkill['ResumeSkill']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeSkill['ResumeSkill']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			null,
			'name',
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'years',
			'proficiency',
			'resume_skill_category_id' => array('empty' => '-- None --'),
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