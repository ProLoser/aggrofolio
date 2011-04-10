<div class="resumeSchools form">
<?php echo $this->Form->create('ResumeSchool');?>
	<fieldset>
 		<legend><?php __('Add Resume School'); ?></legend>
	<?php
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id');
		echo $this->Form->input('published');
		echo $this->Form->input('deleted');
		echo $this->Form->input('date_started');
		echo $this->Form->input('date_ended');
		echo $this->Form->input('field_of_study');
		echo $this->Form->input('degree');
		echo $this->Form->input('name');
		echo $this->Form->input('activities');
		echo $this->Form->input('notes');
		echo $this->Form->input('Resume');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Resume Schools', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</div>