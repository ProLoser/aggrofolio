<?php
$this->set('navAdmin', array(
	$this->Html->link('Edit Resume', array('admin' => true, 'action' => 'edit', $resume['Resume']['id'])),
))?>
<header><hgroup>
	<h2 class="resume">Resume</h2>
	<?php if (!empty($resume['Resume']['attachment_file_name']) || !empty($resume['Resume']['attachment_pdf_file_name']) || !empty($resume['Resume']['attachment_doc_file_name'])): ?>
	<p class="sorting">
		<span>Download:</span>
	<?php
		if (!empty($resume['Resume']['attachment_file_name']))
			echo $this->Html->link('File', '/uploads/resumes/'.$resume['Resume']['attachment_file_name']);
		if (!empty($resume['Resume']['attachment_pdf_file_name']))
			echo $this->Html->link('Adobe PDF', '/uploads/resumes/'.$resume['Resume']['attachment_pdf_file_name']);
		if (!empty($resume['Resume']['attachment_doc_file_name']))
			echo $this->Html->link('Word DOC', '/uploads/resumes/'.$resume['Resume']['attachment_doc_file_name']);
	?>
	</p>
	<?php endif; ?>
	<?php if ($this->Session->read('Auth.User')):?>
	<p class="sorting">
		<span>Admin:</span>
		<?php 
		echo $this->Html->link('Edit Resume', array('admin' => true, 'controller' => 'resumes', 'action' => 'edit', $resume['Resume']['id']));
		?>
	</p>
	<?php endif;?>
</hgroup></header>
<div class="resumes">
	<?php if (!empty($resume['Resume']['objective'])): ?>
		<p id="objective"><?php echo $resume['Resume']['objective']?></p>	  	 
	<?php endif; ?>

	<?php if (!empty($resume['ResumeSkill'])): ?>
	<section id="skills">
		<h3>Skills</h3>
		<?php
		$skills = array();
		$generalSkills = '';
		foreach ($resume['ResumeSkill'] as $skill) {			
			$years = ($skill['years'] > 1) ? 'years' : 'year';
			$text = "\t<li><strong>{$skill['name']}</strong>: {$skill['proficiency']} - {$skill['years']} {$years}</li>\n";
			if (empty($skill['ResumeSkillCategory']['name'])) {
				$generalSkills .= $text;
			} else {
				if (!isset($skills[$skill['ResumeSkillCategory']['name']]))
					$skills[$skill['ResumeSkillCategory']['name']] = '';
				$skills[$skill['ResumeSkillCategory']['name']] .= $text;
			}
		}
		if (!empty($generalSkills)): ?>
			<ul>
				<?php echo $generalSkills; ?>
			</ul>
		<?php endif; ?>
		<?php foreach ($skills as $category => $skill): ?>
			<h4><?php echo $category; ?></h4>
			<ul>
				<?php echo $skill; ?>
			</ul>
		<?php endforeach; ?>
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
			<time><?php echo $this->Time->format('M Y', $employer['date_started'])?> - <?php echo (!empty($employer['date_ended'])) ? $this->Time->format('M Y', $employer['date_ended']) : 'Present' ?></time>
			<h4>
				<?php echo $employer['name']?>
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
			<time><?php echo $this->Time->format('M Y', $school['date_started'])?> - <?php echo (!empty($school['date_ended'])) ? $this->Time->format('M Y', $school['date_ended']) : 'Present' ?></time>
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
