<h2><?php __('Admin Edit Resume Skill'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ResumeSkill.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ResumeSkill.id'))); ?></li>
	<li><?php echo $this->Html->link(__('List Resume Skills', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
</ul>
<div class="resumeSkills form">
<?php echo $this->Form->create('ResumeSkill');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id');
		echo $this->Form->input('years');
		echo $this->Form->input('proficiency');
		echo $this->Form->input('Resume');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>