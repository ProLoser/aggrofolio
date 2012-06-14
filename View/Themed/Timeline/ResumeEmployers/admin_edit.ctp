<h1><?php echo __('Edit Company'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('ResumeEmployer.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('ResumeEmployer.id'))); ?></li>
	<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
</ul>
<?php
echo $this->Form->create('ResumeEmployer');
	echo $this->Form->input('id');
	echo $this->Form->input('name');
	echo $this->Form->input('account_id', array('empty' => __('-- None --')));
	echo $this->Form->input('uuid');
	echo $this->Form->input('title');
	echo $this->Form->input('date_started');
	echo $this->Form->input('date_ended');
	echo $this->Form->input('currently_employed');
	echo $this->Form->input('published');
	echo $this->Form->input('deleted');
	echo $this->Form->input('summary');
	echo $this->Form->input('user_id', array('empty' => __('-- Select One --')));
	echo $this->Form->input('Resume');
echo $this->Form->end('Save');
?>