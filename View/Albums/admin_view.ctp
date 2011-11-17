<header>
	<hgroup><h1><?php echo __('Album');?></h1></hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('Edit Album'), array('action' => 'edit', $album['Album']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('Delete Album'), array('action' => 'delete', $album['Album']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $album['Album']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Albums'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Album'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Media Items'), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Media Item'), array('controller' => 'media_items', 'action' => 'add'), array('class' => 'add')); ?> </li>
	</ul>
</header>
<article class="albums view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Media Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($album['MediaCategory']['name'], array('controller' => 'media_categories', 'action' => 'view', $album['MediaCategory']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Uuid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['uuid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Account'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($album['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $album['Account']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h1><?php echo __('Related Media Items');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Media Item'), array('controller' => 'media_items', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($album['MediaItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Attachment File Name'); ?></th>
		<th><?php echo __('Attachment File Size'); ?></th>
		<th><?php echo __('Source'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<td><?php echo $mediaItem['source'];?></td>
			<td><?php echo $mediaItem['album_id'];?></td>
			<td><?php echo $mediaItem['published'];?></td>
			<td><?php echo $this->Html->link($mediaItem['uuid'], $mediaItem['url']);?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'media_items', 'action' => 'view', $mediaItem['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'media_items', 'action' => 'edit', $mediaItem['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'media_items', 'action' => 'delete', $mediaItem['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $mediaItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h1><?php echo __('Related Resume Employers');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Employer'), array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($album['ResumeEmployer'])):?>
	<table cellpadding = "0" cellspacing = "0">
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_employers', 'action' => 'view', $resumeEmployer['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_employers', 'action' => 'edit', $resumeEmployer['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_employers', 'action' => 'delete', $resumeEmployer['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeEmployer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</article>
<article class="related">
	<header>
		<h1><?php echo __('Related Resume Schools');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume School'), array('controller' => 'resume_schools', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($album['ResumeSchool'])):?>
	<table cellpadding = "0" cellspacing = "0">
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_schools', 'action' => 'view', $resumeSchool['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_schools', 'action' => 'edit', $resumeSchool['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_schools', 'action' => 'delete', $resumeSchool['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeSchool['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</article>