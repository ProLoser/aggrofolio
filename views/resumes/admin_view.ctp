<style type="text/css">
	h3 {
		margin-top: 20px;
		color: #0099cc;
		background-color: #eee;
		border-bottom: dotted 1px #666;
		border-top: solid 2px #333;
		padding: 3px 3px 1px 3px;
	}
	h4 {
		font-weight: bold;
	}
	h4 span {
		display: block;
		font-size: 80%;
		font-weight: normal;
	}
	h5 {
		float: right;
	}
	ul {
		overflow: hidden;
		margin: 5px 0;
		padding: 0 10px;
	}
	li {
		width: 30%;
		float: left;
	}
</style>

<h1>Resume</h1>
<p id="objective"><?php echo $resume['Resume']['objective']?></p>

<?php if (!empty($resume['ResumeSkill'])): ?>
<div id="skills">
	<h3>Skills</h3>
	<ul>	  	 
		<?php foreach ($resume['ResumeSkill'] as $skill): ?>
		<li><?php $years = ($skill['years'] > 1) ? 'years' : 'year';
		echo "<strong>{$skill['name']}</strong>: {$skill['proficiency']} - {$skill['years']} {$years}";?></li>
		<?php endforeach ?>
	</ul>
</div>
<?php endif; ?>

<?php if (!empty($resume['Resume']['interests'])): ?>
<div id="interests">
	<h3>Interests</h3>
	<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['interests']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($resume['ResumeEmployer'])): ?>
<div id="experience">
	<h3>Experience</h3>
	<?php foreach ($resume['ResumeEmployer'] as $employer): ?>
	<div>
		<h5><?php echo $employer['date_started']?> - <?php echo (!empty($employer['date_ended'])) ? $employer['date_ended'] : 'Present' ?></h5>
		<h4>
			<?php echo $employer['name']?>
			<span><?php echo $employer['title']?></span>
		</h4>
		<?php if (!empty($employer['summary'])): ?>
			<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $employer['summary']); ?></p>
		<?php endif; ?>
	</div>
	<?php endforeach ?>
</div>
<?php endif; ?>

<?php if (!empty($resume['ResumeSchool'])): ?>
<div id="education">
	<h3>Education</h3>
	<?php foreach ($resume['ResumeSchool'] as $school): ?>
	<div>
		<h5><?php echo $school['date_started']?> - <?php echo (!empty($employer['date_ended'])) ? $employer['date_ended'] : 'Present' ?></h5>
		<h4>
			<?php echo $school['name']?>
			<span><?php echo $school['field_of_study']?></span>
		</h4>
		<?php if (!empty($school['activities'])): ?>
			<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $school['activities']); ?></p>
		<?php endif; ?>
		<?php if (!empty($school['notes'])): ?>
			<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $school['notes']); ?></p>
		<?php endif; ?>
	</div>
	<?php endforeach ?>
</div>
<?php endif; ?>

<?php if (!empty($resume['Resume']['specialties'])): ?>
<div id="specialties">
	<h3>Specialties</h3>
	<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['specialties']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($resume['Resume']['honors'])): ?>
<div id="honors">
	<h3>Honors</h3>
	<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['honors']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($resume['Resume']['associations'])): ?>
<div id="associations">
	<h3>Associations</h3>
	<p><?php echo str_replace(array("\n\n", "\n"), array("</p><p>", "<br>\n"), $resume['Resume']['associations']); ?></p>
</div>
<?php endif; ?>