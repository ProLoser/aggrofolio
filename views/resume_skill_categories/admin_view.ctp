<header>
	<hgroup>
		<h1><?php  __('Resume Skill Category');?></h1>
	</hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('Edit Resume Skill Category', true), array('action' => 'edit', $resumeSkillCategory['ResumeSkillCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume Skill Category', true), array('action' => 'delete', $resumeSkillCategory['ResumeSkillCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeSkillCategory['ResumeSkillCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skill Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills', true), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSkillCategories view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['parent_id']; ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h3><?php __('Related Resume Skills');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resumeSkillCategory['ResumeSkill'])):?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Uuid'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Years'); ?></th>
		<th><?php __('Proficiency'); ?></th>
		<th><?php __('Resume Skill Category Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resumeSkillCategory['ResumeSkill'] as $resumeSkill):
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
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_skills', 'action' => 'view', $resumeSkill['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_skills', 'action' => 'edit', $resumeSkill['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_skills', 'action' => 'delete', $resumeSkill['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resumeSkill['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
