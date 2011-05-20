<h1><?php __('Admin Edit Resume Employer'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ResumeEmployer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ResumeEmployer.id'))); ?></li>
	<li><?php echo $this->Html->link(__('List Resume Employers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships', true), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship', true), array('controller' => 'post_relationships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
</ul>
<div class="resumeEmployers form">
<?php echo $this->Form->create('ResumeEmployer');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('account_id');
		echo $this->Form->input('uuid');
		echo $this->Form->input('title');
		echo $this->Form->input('date_started');
		echo $this->Form->input('date_ended', array('empty' => true));
		echo $this->Form->input('currently_employed');
		echo $this->Form->input('published');
		echo $this->Form->input('summary');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>