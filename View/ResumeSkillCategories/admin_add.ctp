<header>
	<hgroup>
		<h1><?php echo __('Admin Add Resume Skill Category'); ?></h1>
	</hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('List Resume Skill Categories'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Resume Skills'), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSkillCategories form">
<?php echo $this->Form->create('ResumeSkillCategory');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => __('-- None --')));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit();?>
	</footer>
<?php echo $this->Form->end();?>
</article>