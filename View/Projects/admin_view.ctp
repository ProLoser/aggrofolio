<header>
	<hgroup>
		<h1><?php echo __('Project');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Attach Media Item'), array('controller' => 'media_items', 'action' => 'add', 'project' => $project['Project']['id']), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
	</ul>
</header>
<article class="projects view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Hash Tag'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['hash_tag']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Cvs Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['cvs_url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Project Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['ProjectCategory']['name'], array('controller' => 'project_categories', 'action' => 'view', $project['ProjectCategory']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Deleted'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['deleted']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Account'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $project['Account']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Owner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['owner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Resume Employer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['ResumeEmployer']['label'], array('controller' => 'resume_employers', 'action' => 'view', $project['ResumeEmployer']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Resume School'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['ResumeSchool']['name'], array('controller' => 'resume_schools', 'action' => 'view', $project['ResumeSchool']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['url']; ?>
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
	<?php if (!empty($project['PostRelationship'])):?>
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
		foreach ($project['PostRelationship'] as $postRelationship):
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
		<h3><?php echo __('Related Albums');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($project['Album'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Media Category Id'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Album'] as $album):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $album['id'];?></td>
			<td><?php echo $album['created'];?></td>
			<td><?php echo $album['modified'];?></td>
			<td><?php echo $album['name'];?></td>
			<td><?php echo $album['description'];?></td>
			<td><?php echo $album['url'];?></td>
			<td><?php echo $album['published'];?></td>
			<td><?php echo $album['media_category_id'];?></td>
			<td><?php echo $album['uuid'];?></td>
			<td><?php echo $album['account_id'];?></td>
			<td><?php echo $album['project_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'albums', 'action' => 'view', $album['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'albums', 'action' => 'edit', $album['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'albums', 'action' => 'delete', $album['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $album['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Media Items');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Media Item'), array('controller' => 'media_items', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($project['MediaItem'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Attachment File Name'); ?></th>
		<th><?php echo __('Attachment File Size'); ?></th>
		<th><?php echo __('Attachment Meta Type'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Source'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['MediaItem'] as $mediaItem):
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
			<td><?php echo $mediaItem['project_id'];?></td>
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
