<article class="projectCategories view">
	<header class="page-header">
		<hgroup>
			<h1><?php echo __('Project Category');?></h1>
		</hgroup>
		<ul>
				<li><?php echo $this->Html->link(__('Edit Project Category'), array('action' => 'edit', $projectCategory['ProjectCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Project Category'), array('action' => 'delete', $projectCategory['ProjectCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $projectCategory['ProjectCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => 'add')); ?> </li>
		</ul>
	</header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd><?php echo $this->Time->niceShort($projectCategory['ProjectCategory']['created']); ?>&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd><?php echo $this->Time->niceShort($projectCategory['ProjectCategory']['modified']); ?>&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectCategory['ProjectCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectCategory['User']['name'], array('controller' => 'users', 'action' => 'view', $projectCategory['User']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Projects');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($projectCategory['Project'])):?>
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
		foreach ($projectCategory['Project'] as $project):
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
