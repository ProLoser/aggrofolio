<div class="resumes form">
<?php echo $this->Form->create('Resume');?>
	<fieldset>
 		<legend><?php __('Edit Resume'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('purpose');
		echo $this->Form->input('attachment_file_name');
		echo $this->Form->input('attachment_file_size');
		echo $this->Form->input('attachment_meta_type');
		echo $this->Form->input('content');
		echo $this->Form->input('visible');
		echo $this->Form->input('objective');
		echo $this->Form->input('ResumeRecommendation');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Resume.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Resume.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Resume Recommendations', true), array('controller' => 'resume_recommendations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('controller' => 'resume_recommendations', 'action' => 'add')); ?> </li>
	</ul>
</div>