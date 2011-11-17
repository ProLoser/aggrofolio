<header>
	<hgroup>
		<h1><?php echo __('Resume');?></h1>
	</hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('Edit Resume'), array('action' => 'edit', $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume'), array('action' => 'delete', $resume['Resume']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships'), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship'), array('controller' => 'post_relationships', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Items'), array('controller' => 'resume_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Item'), array('controller' => 'resume_items', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Recommendations'), array('controller' => 'resume_recommendations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation'), array('controller' => 'resume_recommendations', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Schools'), array('controller' => 'resume_schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School'), array('controller' => 'resume_schools', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills'), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Employers'), array('controller' => 'resume_employers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer'), array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumes view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Purpose'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['purpose']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Attachment File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_file_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Attachment File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Attachment Meta Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_meta_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Visible'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['visible']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Objective'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['objective']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Summary'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['summary']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Specialties'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['specialties']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Associations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['associations']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Honors'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['honors']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Interests'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['interests']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Account'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($resume['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resume['Account']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Post Relationships');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Post Relationship'), array('controller' => 'post_relationships', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resume['PostRelationship'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Post Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resume['PostRelationship'] as $postRelationship):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $postRelationship['id'];?></td>
			<td><?php echo $postRelationship['post_id'];?></td>
			<td><?php echo $postRelationship['foreign_model'];?></td>
			<td><?php echo $postRelationship['foreign_key'];?></td>
			<td><?php echo $postRelationship['title'];?></td>
			<td><?php echo $postRelationship['url'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'post_relationships', 'action' => 'view', $postRelationship['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'post_relationships', 'action' => 'edit', $postRelationship['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'post_relationships', 'action' => 'delete', $postRelationship['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $postRelationship['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Resume Items');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Item'), array('controller' => 'resume_items', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resume['ResumeItem'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Resume Item Type Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Resume Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resume['ResumeItem'] as $resumeItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resumeItem['id'];?></td>
			<td><?php echo $resumeItem['created'];?></td>
			<td><?php echo $resumeItem['modified'];?></td>
			<td><?php echo $resumeItem['resume_item_type_id'];?></td>
			<td><?php echo $resumeItem['account_id'];?></td>
			<td><?php echo $resumeItem['resume_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_items', 'action' => 'view', $resumeItem['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_items', 'action' => 'edit', $resumeItem['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_items', 'action' => 'delete', $resumeItem['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Resume Recommendations');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Recommendation'), array('controller' => 'resume_recommendations', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resume['ResumeRecommendation'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Recommendor Uuid'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<td><?php echo $resumeRecommendation['uuid'];?></td>
			<td><?php echo $resumeRecommendation['account_id'];?></td>
			<td><?php echo $resumeRecommendation['text'];?></td>
			<td><?php echo $resumeRecommendation['first_name'];?></td>
			<td><?php echo $resumeRecommendation['last_name'];?></td>
			<td><?php echo $resumeRecommendation['recommendor_uuid'];?></td>
			<td><?php echo $resumeRecommendation['published'];?></td>
			<td><?php echo $resumeRecommendation['deleted'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_recommendations', 'action' => 'view', $resumeRecommendation['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_recommendations', 'action' => 'edit', $resumeRecommendation['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_recommendations', 'action' => 'delete', $resumeRecommendation['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeRecommendation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Resume Schools');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume School'), array('controller' => 'resume_schools', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resume['ResumeSchool'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Date Started'); ?></th>
		<th><?php echo __('Date Ended'); ?></th>
		<th><?php echo __('Field Of Study'); ?></th>
		<th><?php echo __('Degree'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Activities'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_schools', 'action' => 'view', $resumeSchool['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_schools', 'action' => 'edit', $resumeSchool['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_schools', 'action' => 'delete', $resumeSchool['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeSchool['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Resume Skills');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resume['ResumeSkill'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Years'); ?></th>
		<th><?php echo __('Proficiency'); ?></th>
		<th><?php echo __('Resume Skill Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<td><?php echo $resumeSkill['resume_skill_category_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_skills', 'action' => 'view', $resumeSkill['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_skills', 'action' => 'edit', $resumeSkill['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_skills', 'action' => 'delete', $resumeSkill['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeSkill['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Resume Employers');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Employer'), array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resume['ResumeEmployer'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Date Started'); ?></th>
		<th><?php echo __('Date Ended'); ?></th>
		<th><?php echo __('Currently Employed'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Summary'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<td><?php echo $resumeEmployer['summary'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_employers', 'action' => 'view', $resumeEmployer['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_employers', 'action' => 'edit', $resumeEmployer['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_employers', 'action' => 'delete', $resumeEmployer['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeEmployer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
