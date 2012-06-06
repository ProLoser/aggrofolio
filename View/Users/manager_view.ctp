<article class="users view">
	<header class="page-header">
		<hgroup>
			<h1><?php echo __('User');?></h1>
			<ul class="actions">
				<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $user['User']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
			</ul>
		</hgroup>
	</header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Subdomain'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['subdomain']; ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Accounts');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($user['Account'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Api Key'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Order Weight'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Account'] as $account):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $account['id'];?></td>
			<td><?php echo $account['created'];?></td>
			<td><?php echo $account['modified'];?></td>
			<td><?php echo $account['username'];?></td>
			<td><?php echo $account['email'];?></td>
			<td><?php echo $account['password'];?></td>
			<td><?php echo $account['api_key'];?></td>
			<td><?php echo $account['type'];?></td>
			<td><?php echo $account['published'];?></td>
			<td><?php echo $account['order_weight'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'accounts', 'action' => 'view', $account['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'accounts', 'action' => 'edit', $account['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'accounts', 'action' => 'delete', $account['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $account['id'])); ?>
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
	<?php if (!empty($user['Album'])):?>
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
		foreach ($user['Album'] as $album):
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
		<h3><?php echo __('Related Projects');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($user['Project'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Hash Tag'); ?></th>
		<th><?php echo __('Cvs Url'); ?></th>
		<th><?php echo __('Project Category Id'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Owner'); ?></th>
		<th><?php echo __('Resume Employer Id'); ?></th>
		<th><?php echo __('Resume School Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Bugs Url'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Project'] as $project):
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
			<td><?php echo $project['url'];?></td>
			<td><?php echo $project['bugs_url'];?></td>
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
	<?php if (!empty($user['Resume'])):?>
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
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Resume'] as $resume):
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
