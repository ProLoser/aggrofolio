<header>
	<hgroup>
		<h1><?php __('Admin Edit Resume Skill Category'); ?></h1>
	</hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ResumeSkillCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ResumeSkillCategory.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Resume Skill Categories', true), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Resume Skills', true), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSkillCategories form">
<?php echo $this->Form->create('ResumeSkillCategory');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => __('-- None --', true)));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit();?>
	</footer>
<?php echo $this->Form->end();?>
</article>