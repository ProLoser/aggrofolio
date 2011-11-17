<h2><?php echo __('Edit Resume Skill Category'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('ResumeSkillCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('ResumeSkillCategory.id'))); ?></li>
	<li><?php echo $this->Html->link(__('List Resume Skill Categories'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Resume Skill Categories'), array('controller' => 'resume_skill_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Resume Skill Category'), array('controller' => 'resume_skill_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills'), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
</ul>
<article class="resumeSkillCategories form">
<?php echo $this->Form->create('ResumeSkillCategory');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
	?>
<?php echo $this->Form->end(__('Submit'));?>
</article>