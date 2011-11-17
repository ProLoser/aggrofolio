<h1><?php echo __('Admin Add Resume Skill'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Resume Skills'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
</ul>
<div class="resumeSkills form">
<?php echo $this->Form->create('ResumeSkill');?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id');
		echo $this->Form->input('years');
		echo $this->Form->input('proficiency');
		echo $this->Form->input('Resume');
	?>
<?php echo $this->Form->end(__('Submit'));?>
</div>