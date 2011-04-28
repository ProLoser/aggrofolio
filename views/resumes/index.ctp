<?php $this->Plate->start('nav')?>
<h3>Sections</h3>
<ul>
<?php if (!empty($resume['ResumeSkill'])): ?>
	<li><a href="#skills">Skills</a></li>
<?php endif; ?>
<?php if (!empty($resume['Resume']['interests'])): ?>
	<li><a href="#interests">Interests</a></li>
<?php endif; ?>
<?php if (!empty($resume['ResumeEmployer'])): ?>
	<li><a href="#experience">Experience</a></li>
<?php endif; ?>
<?php if (!empty($resume['ResumeSchool'])): ?>
	<li><a href="#education">Education</a></li>
<?php endif; ?>
<?php if (!empty($resume['Resume']['specialties'])): ?>
	<li><a href="#specialties">Specialties</a></li>
<?php endif; ?>
<?php if (!empty($resume['Resume']['honors'])): ?>
	<li><a href="#honors">Honors</a></li>
<?php endif; ?>
<?php if (!empty($resume['Resume']['associations'])): ?>
	<li><a href="#associations">Associations</a></li>
<?php endif; ?>
</ul>
<?php $this->Plate->stop()?>

<style type="text/css">
	#skills ul {
		overflow: hidden;
		margin: 5px 0;
		padding-left: 20px;
	}
	#skills li {
		width: 33%;
		list-style: circle;
		float: left;
	}
</style>
<div class="resumes">
	<h2>Resume</h2>
	<?php if (!empty($resume['Resume']['objective'])): ?>
		<p id="objective"><strong>Objective:</strong> <?php echo $resume['Resume']['objective']?></p>	  	 
	<?php endif; ?>

	<?php if (!empty($resume['ResumeSkill'])): ?>
	<section id="skills">
		<h3>Skills</h3>
		<ul>	  	 
			<?php foreach ($resume['ResumeSkill'] as $skill): ?>
			<li><?php $years = ($skill['years'] > 1) ? 'years' : 'year';
			echo "<strong>{$skill['name']}</strong>: {$skill['proficiency']} - {$skill['years']} {$years}";?></li>
			<?php endforeach ?>
		</ul>
	</section>
	<?php endif; ?>

	<?php if (!empty($resume['Resume']['interests'])): ?>
	<section id="interests">
		<h3>Interests</h3>
		<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['interests']); ?></p>
	</section>
	<?php endif; ?>

	<?php if (!empty($resume['ResumeEmployer'])): ?>
	<section id="experience">
		<h3>Experience</h3>
		<?php foreach ($resume['ResumeEmployer'] as $employer): ?>
		<article>
			<time><?php echo $employer['date_started']?> - <?php echo (!empty($employer['date_ended'])) ? $employer['date_ended'] : 'Present' ?></time>
			<h4>
				<?php echo $this->Html->link($employer['name'], array('controller' => 'resume_employers', 'action' => 'view', $employer['id']))?>
				<span><?php echo $employer['title']?></span>
			</h4>
			<?php if (!empty($employer['summary'])): ?>
				<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $employer['summary']); ?></p>
			<?php endif; ?>
			<?php echo $this->element('projects', array('projects' => $employer['Project']))?>
		</article>
		<?php endforeach ?>
	</section>
	<?php endif; ?>

	<?php if (!empty($resume['ResumeSchool'])): ?>
	<section id="education">
		<h3>Education</h3>
		<?php foreach ($resume['ResumeSchool'] as $school): ?>
		<article>
			<time><?php echo $school['date_started']?> - <?php echo (!empty($school['date_ended'])) ? $school['date_ended'] : 'Present' ?></time>
			<h4>
				<?php echo $this->Html->link($school['name'], array('controller' => 'resume_schools', 'action' => 'view', $school['id']))?>
				<span><?php echo $school['field_of_study']?></span>
			</h4>
			<?php if (!empty($school['activities'])): ?>
				<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $school['activities']); ?></p>
			<?php endif; ?>
			<?php if (!empty($school['notes'])): ?>
				<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $school['notes']); ?></p>
			<?php endif; ?>
			<?php echo $this->element('projects', array('projects' => $school['Project']))?>
		</article>
		<?php endforeach ?>
	</section>
	<?php endif; ?>

	<?php if (!empty($resume['Resume']['specialties'])): ?>
	<section id="specialties">
		<h3>Specialties</h3>
		<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['specialties']); ?></p>
	</section>
	<?php endif; ?>

	<?php if (!empty($resume['Resume']['honors'])): ?>
	<section id="honors">
		<h3>Honors</h3>
		<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['honors']); ?></p>
	</section>
	<?php endif; ?>

	<?php if (!empty($resume['Resume']['associations'])): ?>
	<section id="associations">
		<h3>Associations</h3>
		<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['associations']); ?></p>
	</section>
	<?php endif; ?>
</div>