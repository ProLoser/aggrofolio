<h1><?php  __('Resume School');?></h1>
<ul class="actions">
		<li><?php echo $this->Html->link(__('Edit Resume School', true), array('action' => 'edit', $resumeSchool['ResumeSchool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume School', true), array('action' => 'delete', $resumeSchool['ResumeSchool']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeSchool['ResumeSchool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Schools', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships', true), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship', true), array('controller' => 'post_relationships', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add'), array('class' => 'add')); ?> </li>
</ul>
<div class="resumeSchools view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Uuid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['uuid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Account'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($resumeSchool['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resumeSchool['Account']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['deleted']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Started'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['date_started']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Ended'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['date_ended']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field Of Study'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['field_of_study']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Degree'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['degree']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Activities'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['activities']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSchool['ResumeSchool']['notes']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<div class="header">
		<h1><?php __('Related Post Relationships');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Post Relationship', true), array('controller' => 'post_relationships', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($resumeSchool['PostRelationship'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Post Id'); ?></th>
		<th><?php __('Foreign Model'); ?></th>
		<th><?php __('Foreign Key'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Url'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resumeSchool['PostRelationship'] as $postRelationship):
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
				<?php echo $this->Html->link(__('View', true), array('controller' => 'post_relationships', 'action' => 'view', $postRelationship['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'post_relationships', 'action' => 'edit', $postRelationship['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'post_relationships', 'action' => 'delete', $postRelationship['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $postRelationship['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<div class="header">
		<h1><?php __('Related Projects');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($resumeSchool['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Hash Tag'); ?></th>
		<th><?php __('Cvs Url'); ?></th>
		<th><?php __('Project Category Id'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Deleted'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Owner'); ?></th>
		<th><?php __('Resume Employer Id'); ?></th>
		<th><?php __('Resume School Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resumeSchool['Project'] as $project):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['created'];?></td>
			<td><?php echo $project['modified'];?></td>
			<td><?php echo $project['name'];?></td>
			<td><?php echo $project['description'];?></td>
			<td><?php echo $project['hash_tag'];?></td>
			<td><?php echo $project['cvs_url'];?></td>
			<td><?php echo $project['project_category_id'];?></td>
			<td><?php echo $project['published'];?></td>
			<td><?php echo $project['deleted'];?></td>
			<td><?php echo $project['account_id'];?></td>
			<td><?php echo $project['owner'];?></td>
			<td><?php echo $project['resume_employer_id'];?></td>
			<td><?php echo $project['resume_school_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'projects', 'action' => 'view', $project['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'projects', 'action' => 'edit', $project['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'projects', 'action' => 'delete', $project['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<div class="header">
		<h1><?php __('Related Resumes');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($resumeSchool['Resume'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Purpose'); ?></th>
		<th><?php __('Attachment File Name'); ?></th>
		<th><?php __('Attachment File Size'); ?></th>
		<th><?php __('Attachment Meta Type'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Visible'); ?></th>
		<th><?php __('Objective'); ?></th>
		<th><?php __('Summary'); ?></th>
		<th><?php __('Specialties'); ?></th>
		<th><?php __('Associations'); ?></th>
		<th><?php __('Honors'); ?></th>
		<th><?php __('Interests'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resumeSchool['Resume'] as $resume):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resume['id'];?></td>
			<td><?php echo $resume['created'];?></td>
			<td><?php echo $resume['modified'];?></td>
			<td><?php echo $resume['purpose'];?></td>
			<td><?php echo $resume['attachment_file_name'];?></td>
			<td><?php echo $resume['attachment_file_size'];?></td>
			<td><?php echo $resume['attachment_meta_type'];?></td>
			<td><?php echo $resume['content'];?></td>
			<td><?php echo $resume['visible'];?></td>
			<td><?php echo $resume['objective'];?></td>
			<td><?php echo $resume['summary'];?></td>
			<td><?php echo $resume['specialties'];?></td>
			<td><?php echo $resume['associations'];?></td>
			<td><?php echo $resume['honors'];?></td>
			<td><?php echo $resume['interests'];?></td>
			<td><?php echo $resume['first_name'];?></td>
			<td><?php echo $resume['last_name'];?></td>
			<td><?php echo $resume['account_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resumes', 'action' => 'view', $resume['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resumes', 'action' => 'edit', $resume['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resumes', 'action' => 'delete', $resume['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resume['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
