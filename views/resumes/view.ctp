<div class="resumes view">
<h2><?php  __('Resume');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Purpose'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['purpose']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attachment File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_file_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attachment File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attachment Meta Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_meta_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Visible'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['visible']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Objective'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['objective']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Summary'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['summary']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Specialties'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['specialties']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Associations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['associations']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Honors'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['honors']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Interests'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['interests']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['last_name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resume', true), array('action' => 'edit', $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume', true), array('action' => 'delete', $resume['Resume']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Resume Recommendations');?></h3>
	<?php if (!empty($resume['ResumeRecommendation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Uui'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Text'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Recommendor Uuid'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Deleted'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resume['ResumeRecommendation'] as $resumeRecommendation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resumeRecommendation['id'];?></td>
			<td><?php echo $resumeRecommendation['created'];?></td>
			<td><?php echo $resumeRecommendation['type'];?></td>
			<td><?php echo $resumeRecommendation['uui'];?></td>
			<td><?php echo $resumeRecommendation['account_id'];?></td>
			<td><?php echo $resumeRecommendation['text'];?></td>
			<td><?php echo $resumeRecommendation['first_name'];?></td>
			<td><?php echo $resumeRecommendation['last_name'];?></td>
			<td><?php echo $resumeRecommendation['recommendor_uuid'];?></td>
			<td><?php echo $resumeRecommendation['published'];?></td>
			<td><?php echo $resumeRecommendation['deleted'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_recommendations', 'action' => 'view', $resumeRecommendation['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_recommendations', 'action' => 'edit', $resumeRecommendation['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_recommendations', 'action' => 'delete', $resumeRecommendation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeRecommendation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('controller' => 'resume_recommendations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Resume Schools');?></h3>
	<?php if (!empty($resume['ResumeSchool'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Uuid'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Deleted'); ?></th>
		<th><?php __('Date Started'); ?></th>
		<th><?php __('Date Ended'); ?></th>
		<th><?php __('Field Of Study'); ?></th>
		<th><?php __('Degree'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Activities'); ?></th>
		<th><?php __('Notes'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resume['ResumeSchool'] as $resumeSchool):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resumeSchool['id'];?></td>
			<td><?php echo $resumeSchool['created'];?></td>
			<td><?php echo $resumeSchool['modified'];?></td>
			<td><?php echo $resumeSchool['uuid'];?></td>
			<td><?php echo $resumeSchool['account_id'];?></td>
			<td><?php echo $resumeSchool['published'];?></td>
			<td><?php echo $resumeSchool['deleted'];?></td>
			<td><?php echo $resumeSchool['date_started'];?></td>
			<td><?php echo $resumeSchool['date_ended'];?></td>
			<td><?php echo $resumeSchool['field_of_study'];?></td>
			<td><?php echo $resumeSchool['degree'];?></td>
			<td><?php echo $resumeSchool['name'];?></td>
			<td><?php echo $resumeSchool['activities'];?></td>
			<td><?php echo $resumeSchool['notes'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_schools', 'action' => 'view', $resumeSchool['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_schools', 'action' => 'edit', $resumeSchool['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_schools', 'action' => 'delete', $resumeSchool['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeSchool['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Resume Skills');?></h3>
	<?php if (!empty($resume['ResumeSkill'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Uuid'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Years'); ?></th>
		<th><?php __('Proficiency'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resume['ResumeSkill'] as $resumeSkill):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resumeSkill['id'];?></td>
			<td><?php echo $resumeSkill['created'];?></td>
			<td><?php echo $resumeSkill['name'];?></td>
			<td><?php echo $resumeSkill['uuid'];?></td>
			<td><?php echo $resumeSkill['account_id'];?></td>
			<td><?php echo $resumeSkill['years'];?></td>
			<td><?php echo $resumeSkill['proficiency'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_skills', 'action' => 'view', $resumeSkill['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_skills', 'action' => 'edit', $resumeSkill['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_skills', 'action' => 'delete', $resumeSkill['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeSkill['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Resume Employers');?></h3>
	<?php if (!empty($resume['ResumeEmployer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Uuid'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Date Started'); ?></th>
		<th><?php __('Date Ended'); ?></th>
		<th><?php __('Currently Employed'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Deleted'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resume['ResumeEmployer'] as $resumeEmployer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resumeEmployer['id'];?></td>
			<td><?php echo $resumeEmployer['created'];?></td>
			<td><?php echo $resumeEmployer['modified'];?></td>
			<td><?php echo $resumeEmployer['name'];?></td>
			<td><?php echo $resumeEmployer['account_id'];?></td>
			<td><?php echo $resumeEmployer['uuid'];?></td>
			<td><?php echo $resumeEmployer['title'];?></td>
			<td><?php echo $resumeEmployer['date_started'];?></td>
			<td><?php echo $resumeEmployer['date_ended'];?></td>
			<td><?php echo $resumeEmployer['currently_employed'];?></td>
			<td><?php echo $resumeEmployer['published'];?></td>
			<td><?php echo $resumeEmployer['deleted'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_employers', 'action' => 'view', $resumeEmployer['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_employers', 'action' => 'edit', $resumeEmployer['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_employers', 'action' => 'delete', $resumeEmployer['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeEmployer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
