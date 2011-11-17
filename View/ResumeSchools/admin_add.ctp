<h1><?php echo __('Admin Add Resume School'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Resume Schools'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships'), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship'), array('controller' => 'post_relationships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
</ul>
<div class="resumeSchools form">
<?php echo $this->Form->create('ResumeSchool');?>
	<?php
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id');
		echo $this->Form->input('published');
		echo $this->Form->input('date_started');
		echo $this->Form->input('date_ended', array('empty' => true));
		echo $this->Form->input('field_of_study');
		echo $this->Form->input('degree');
		echo $this->Form->input('name');
		echo $this->Form->input('activities');
		echo $this->Form->input('notes');
	?>
<?php echo $this->Form->end(__('Submit'));?>
</div>