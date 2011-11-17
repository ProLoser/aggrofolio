<header>
	<hgroup>
		<h1><?php echo __('Admin Edit Resume Skill'); ?></h1>
	</hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('ResumeSkill.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('ResumeSkill.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Resume Skills'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skill Categories'), array('controller' => 'resume_skill_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill Category'), array('controller' => 'resume_skill_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSkills form">
<?php echo $this->Form->create('ResumeSkill');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id', array('empty' => __('-- None --')));
		echo $this->Form->input('years');
		echo $this->Form->input('proficiency');
		echo $this->Form->input('resume_skill_category_id', array('empty' => __('-- None --')));
		echo $this->Form->input('Resume');
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit();?>
	</footer>
<?php echo $this->Form->end();?>
</article>