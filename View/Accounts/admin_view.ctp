<article class="accounts view">
	<header class="page-header">
		<hgroup>
			<h1><?php echo __('Account');?></h1>
		</hgroup>
		<?php echo $this->Plate->start('sidebar'); ?>
		<ul>
				<li><?php echo $this->Html->link(__('Edit Account'), array('action' => 'edit', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Account'), array('action' => 'delete', $account['Account']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Items'), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Item'), array('controller' => 'media_items', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Employers'), array('controller' => 'resume_employers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer'), array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Schools'), array('controller' => 'resume_schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School'), array('controller' => 'resume_schools', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Recommendations'), array('controller' => 'resume_recommendations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation'), array('controller' => 'resume_recommendations', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills'), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add')); ?> </li>
		</ul>
		<?php echo $this->Plate->stop(); ?>
	</header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $account['Account']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<td><?php echo $this->Time->niceShort($account['Account']['created']); ?>&nbsp;</td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<td><?php echo $this->Time->niceShort($account['Account']['modified']); ?>&nbsp;</td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $account['Account']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $account['Account']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $account['Account']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Api Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $account['Account']['api_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $account['Account']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($account['Account']['published']) ? __('Yes') : __('No'); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Order Weight'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $account['Account']['order_weight']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($account['User']['name'], array('controller' => 'users', 'action' => 'view', $account['User']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Albums');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['Album'])):?>
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
		<th><?php echo __('Primary Media Item Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Album'] as $album):
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
			<td><?php echo $album['primary_media_item_id'];?></td>
			<td><?php echo $album['user_id'];?></td>
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
		<h3><?php echo __('Related Bookmarks');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['Bookmark'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Bookmark Category Id'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Bookmark'] as $bookmark):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $bookmark['id'];?></td>
			<td><?php echo $bookmark['created'];?></td>
			<td><?php echo $bookmark['name'];?></td>
			<td><?php echo $bookmark['url'];?></td>
			<td><?php echo $bookmark['description'];?></td>
			<td><?php echo $bookmark['account_id'];?></td>
			<td><?php echo $bookmark['bookmark_category_id'];?></td>
			<td><?php echo $bookmark['uuid'];?></td>
			<td><?php echo $bookmark['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $bookmark['id'])); ?>
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
	<?php if (!empty($account['MediaItem'])):?>
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
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['MediaItem'] as $mediaItem):
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
			<td><?php echo $mediaItem['user_id'];?></td>
			<td><?php echo $mediaItem['account_id'];?></td>
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
		<h3><?php echo __('Related Posts');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['Post'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Subject'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Post Category Id'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Post'] as $post):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td><?php echo $post['subject'];?></td>
			<td><?php echo $post['body'];?></td>
			<td><?php echo $post['url'];?></td>
			<td><?php echo $post['slug'];?></td>
			<td><?php echo $post['post_category_id'];?></td>
			<td><?php echo $post['published'];?></td>
			<td><?php echo $post['account_id'];?></td>
			<td><?php echo $post['uuid'];?></td>
			<td><?php echo $post['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Projects');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['Project'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Summary'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Hash Tag'); ?></th>
		<th><?php echo __('Cvs Url'); ?></th>
		<th><?php echo __('Bugs Url'); ?></th>
		<th><?php echo __('Project Category Id'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Owner'); ?></th>
		<th><?php echo __('Resume Employer Id'); ?></th>
		<th><?php echo __('Resume School Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Primary Media Item Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Date Started'); ?></th>
		<th><?php echo __('Date Ended'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Project'] as $project):
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
			<td><?php echo $project['summary'];?></td>
			<td><?php echo $project['description'];?></td>
			<td><?php echo $project['hash_tag'];?></td>
			<td><?php echo $project['cvs_url'];?></td>
			<td><?php echo $project['bugs_url'];?></td>
			<td><?php echo $project['project_category_id'];?></td>
			<td><?php echo $project['published'];?></td>
			<td><?php echo $project['deleted'];?></td>
			<td><?php echo $project['account_id'];?></td>
			<td><?php echo $project['owner'];?></td>
			<td><?php echo $project['resume_employer_id'];?></td>
			<td><?php echo $project['resume_school_id'];?></td>
			<td><?php echo $project['url'];?></td>
			<td><?php echo $project['uuid'];?></td>
			<td><?php echo $project['primary_media_item_id'];?></td>
			<td><?php echo $project['user_id'];?></td>
			<td><?php echo $project['date_started'];?></td>
			<td><?php echo $project['date_ended'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Resumes');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['Resume'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Purpose'); ?></th>
		<th><?php echo __('Attachment File Name'); ?></th>
		<th><?php echo __('Attachment File Size'); ?></th>
		<th><?php echo __('Attachment Meta Type'); ?></th>
		<th><?php echo __('Attachment Pdf File Name'); ?></th>
		<th><?php echo __('Attachment Doc File Name'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Objective'); ?></th>
		<th><?php echo __('Summary'); ?></th>
		<th><?php echo __('Specialties'); ?></th>
		<th><?php echo __('Associations'); ?></th>
		<th><?php echo __('Honors'); ?></th>
		<th><?php echo __('Interests'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Resume'] as $resume):
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
			<td><?php echo $resume['attachment_pdf_file_name'];?></td>
			<td><?php echo $resume['attachment_doc_file_name'];?></td>
			<td><?php echo $resume['content'];?></td>
			<td><?php echo $resume['published'];?></td>
			<td><?php echo $resume['objective'];?></td>
			<td><?php echo $resume['summary'];?></td>
			<td><?php echo $resume['specialties'];?></td>
			<td><?php echo $resume['associations'];?></td>
			<td><?php echo $resume['honors'];?></td>
			<td><?php echo $resume['interests'];?></td>
			<td><?php echo $resume['first_name'];?></td>
			<td><?php echo $resume['last_name'];?></td>
			<td><?php echo $resume['account_id'];?></td>
			<td><?php echo $resume['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resumes', 'action' => 'view', $resume['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resumes', 'action' => 'edit', $resume['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resumes', 'action' => 'delete', $resume['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resume['id'])); ?>
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
	<?php if (!empty($account['ResumeEmployer'])):?>
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
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['ResumeEmployer'] as $resumeEmployer):
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
			<td><?php echo $resumeEmployer['user_id'];?></td>
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
		<h3><?php echo __('Related Resume Schools');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume School'), array('controller' => 'resume_schools', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['ResumeSchool'])):?>
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
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['ResumeSchool'] as $resumeSchool):
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
			<td><?php echo $resumeSchool['user_id'];?></td>
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
		<h3><?php echo __('Related Resume Recommendations');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Recommendation'), array('controller' => 'resume_recommendations', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['ResumeRecommendation'])):?>
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
		foreach ($account['ResumeRecommendation'] as $resumeRecommendation):
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
		<h3><?php echo __('Related Resume Skills');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($account['ResumeSkill'])):?>
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
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['ResumeSkill'] as $resumeSkill):
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
			<td><?php echo $resumeSkill['user_id'];?></td>
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
