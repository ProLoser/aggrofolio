<article class="resumes form">
	<header>
		<h3>Edit Resume</h3>
		<ul>
			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Resume.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Resume.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Resumes', true), array('action' => 'index'));?></li>
		</ul>
	</header>
<?php echo $this->Form->create('Resume');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
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
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
	</footer>
<?php echo $this->Form->end();?>
</article>