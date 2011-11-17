<article class="resumes form">
	<header>
		<h3>Add Resume</h3>
	</header>
<?php echo $this->Form->create('Resume', array('type' => 'file'));?>
	<fieldset>
	<?php
		echo $this->Form->input('purpose');
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('content');
		echo $this->Form->input('published');
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
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
		<ul>
			<li><?php echo $this->Html->link(__('List Resumes'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Resume Recommendations'), array('controller' => 'resume_recommendations', 'action' => 'index')); ?> </li>
		</ul>
	</footer>
	<?php echo $this->Form->end();?>
</article>