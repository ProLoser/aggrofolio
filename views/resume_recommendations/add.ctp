<div class="resumeRecommendations form">
<?php echo $this->Form->create('ResumeRecommendation');?>
	<fieldset>
 		<legend><?php __('Add Resume Recommendation'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('uui');
		echo $this->Form->input('account_id');
		echo $this->Form->input('text');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('recommendor_uuid');
		echo $this->Form->input('published');
		echo $this->Form->input('deleted');
		echo $this->Form->input('Resume');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Resume Recommendations', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</div>