<h1><?php echo __('Admin Add Resume Recommendation'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Resume Recommendations'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
</ul>
<div class="resumeRecommendations form">
<?php echo $this->Form->create('ResumeRecommendation');?>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id');
		echo $this->Form->input('text');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('recommendor_uuid');
		echo $this->Form->input('published');
		echo $this->Form->input('deleted');
		echo $this->Form->input('Resume');
	?>
<?php echo $this->Form->end(__('Submit'));?>
</div>