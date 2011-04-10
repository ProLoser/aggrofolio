<div class="resumeEmployers form">
<?php echo $this->Form->create('ResumeEmployer');?>
	<fieldset>
 		<legend><?php __('Edit Resume Employer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('account_id');
		echo $this->Form->input('uuid');
		echo $this->Form->input('title');
		echo $this->Form->input('date_started');
		echo $this->Form->input('date_ended');
		echo $this->Form->input('currently_employed');
		echo $this->Form->input('published');
		echo $this->Form->input('deleted');
		echo $this->Form->input('Album');
		echo $this->Form->input('Resume');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ResumeEmployer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ResumeEmployer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Resume Employers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</div>