<div class="resumes form">
<?php echo $this->Form->create('Resume');?>
	<fieldset>
 		<legend><?php __('Add Resume'); ?></legend>
	<?php
		echo $this->Form->input('purpose');
		echo $this->Form->input('attachment');
		echo $this->Form->input('content');
		echo $this->Form->input('visible');
		echo $this->Form->input('objective');
		echo $this->Form->input('summary');
		echo $this->Form->input('specialties');
		echo $this->Form->input('associations');
		echo $this->Form->input('honors');
		echo $this->Form->input('interests');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('ResumeRecommendation');
		echo $this->Form->input('ResumeSchool');
		echo $this->Form->input('ResumeSkill');
		echo $this->Form->input('ResumeEmployer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Resumes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Resume Recommendations', true), array('controller' => 'resume_recommendations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('controller' => 'resume_recommendations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Schools', true), array('controller' => 'resume_schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills', true), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Employers', true), array('controller' => 'resume_employers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add')); ?> </li>
	</ul>
</div>