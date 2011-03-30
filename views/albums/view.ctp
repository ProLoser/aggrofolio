<h1><?php  __('Album');?></h1>
<ul class="actions">
		<li><?php echo $this->Html->link(__('Edit Album', true), array('action' => 'edit', $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Album', true), array('action' => 'delete', $album['Album']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Categories', true), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Category', true), array('controller' => 'media_categories', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Items', true), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Item', true), array('controller' => 'media_items', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Employers', true), array('controller' => 'resume_employers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Schools', true), array('controller' => 'resume_schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add'), array('class' => 'add')); ?> </li>
</ul>
<div class="albums view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Media Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($album['MediaCategory']['name'], array('controller' => 'media_categories', 'action' => 'view', $album['MediaCategory']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Uuid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['uuid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Account'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($album['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $album['Account']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<div class="header">
		<h2><?php __('Related Media Items');?></h2>
		<ul>
			<li><?php echo $this->Html->link(__('New Media Item', true), array('controller' => 'media_items', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($album['MediaItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Attachment File Name'); ?></th>
		<th><?php __('Attachment File Size'); ?></th>
		<th><?php __('Attachment Meta Type'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Source'); ?></th>
		<th><?php __('Album Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Uuid'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($album['MediaItem'] as $mediaItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $mediaItem['id'];?></td>
			<td><?php echo $mediaItem['created'];?></td>
			<td><?php echo $mediaItem['modified'];?></td>
			<td><?php echo $mediaItem['name'];?></td>
			<td><?php echo $mediaItem['attachment_file_name'];?></td>
			<td><?php echo $mediaItem['attachment_file_size'];?></td>
			<td><?php echo $mediaItem['attachment_meta_type'];?></td>
			<td><?php echo $mediaItem['url'];?></td>
			<td><?php echo $mediaItem['source'];?></td>
			<td><?php echo $mediaItem['album_id'];?></td>
			<td><?php echo $mediaItem['description'];?></td>
			<td><?php echo $mediaItem['published'];?></td>
			<td><?php echo $mediaItem['uuid'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'media_items', 'action' => 'view', $mediaItem['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'media_items', 'action' => 'edit', $mediaItem['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'media_items', 'action' => 'delete', $mediaItem['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $mediaItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<div class="header">
		<h2><?php __('Related Resume Employers');?></h2>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($album['ResumeEmployer'])):?>
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
		<th><?php __('Summary'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($album['ResumeEmployer'] as $resumeEmployer):
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
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_employers', 'action' => 'view', $resumeEmployer['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_employers', 'action' => 'edit', $resumeEmployer['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_employers', 'action' => 'delete', $resumeEmployer['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resumeEmployer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<div class="header">
		<h2><?php __('Related Resume Schools');?></h2>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($album['ResumeSchool'])):?>
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
		foreach ($album['ResumeSchool'] as $resumeSchool):
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
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_schools', 'action' => 'view', $resumeSchool['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_schools', 'action' => 'edit', $resumeSchool['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_schools', 'action' => 'delete', $resumeSchool['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resumeSchool['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
