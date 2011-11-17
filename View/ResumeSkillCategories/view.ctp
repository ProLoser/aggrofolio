<h1><?php echo __('Resume Skill Category');?></h1>
<ul class="actions">
		<li><?php echo $this->Html->link(__('Edit Resume Skill Category'), array('action' => 'edit', $resumeSkillCategory['ResumeSkillCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume Skill Category'), array('action' => 'delete', $resumeSkillCategory['ResumeSkillCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $resumeSkillCategory['ResumeSkillCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skill Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skill Categories'), array('controller' => 'resume_skill_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Resume Skill Category'), array('controller' => 'resume_skill_categories', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills'), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add')); ?> </li>
</ul>
<article class="resumeSkillCategories view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Parent Resume Skill Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($resumeSkillCategory['ParentResumeSkillCategory']['name'], array('controller' => 'resume_skill_categories', 'action' => 'view', $resumeSkillCategory['ParentResumeSkillCategory']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h2><?php echo __('Related Resume Skill Categories');?></h2>
		<ul>
			<li><?php echo $this->Html->link(__('New Child Resume Skill Category'), array('controller' => 'resume_skill_categories', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resumeSkillCategory['ChildResumeSkillCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resumeSkillCategory['ChildResumeSkillCategory'] as $childResumeSkillCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
</thead>
		<tr<?php echo $class;?>>
			<td><?php echo $childResumeSkillCategory['id'];?></td>
			<td><?php echo $childResumeSkillCategory['created'];?></td>
			<td><?php echo $childResumeSkillCategory['modified'];?></td>
			<td><?php echo $childResumeSkillCategory['name'];?></td>
			<td><?php echo $childResumeSkillCategory['description'];?></td>
			<td><?php echo $childResumeSkillCategory['parent_id'];?></td>
			<td><?php echo $childResumeSkillCategory['lft'];?></td>
			<td><?php echo $childResumeSkillCategory['rght'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_skill_categories', 'action' => 'view', $childResumeSkillCategory['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_skill_categories', 'action' => 'edit', $childResumeSkillCategory['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_skill_categories', 'action' => 'delete', $childResumeSkillCategory['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $childResumeSkillCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
<article class="related">
	<header>
		<h2><?php echo __('Related Resume Skills');?></h2>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resumeSkillCategory['ResumeSkill'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<thead>
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
		foreach ($resumeSkillCategory['ResumeSkill'] as $resumeSkill):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
</thead>
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
