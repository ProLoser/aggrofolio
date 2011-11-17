<header>
	<hgroup>
		<h1><?php echo __('Resume Skill Category');?></h1>
	</hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('Edit Resume Skill Category'), array('action' => 'edit', $resumeSkillCategory['ResumeSkillCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume Skill Category'), array('action' => 'delete', $resumeSkillCategory['ResumeSkillCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $resumeSkillCategory['ResumeSkillCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skill Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills'), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add')); ?> </li>
	</ul>
</header>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Parent Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeSkillCategory['ResumeSkillCategory']['parent_id']; ?>
			&nbsp;
		</dd>
	</dl>
</article>
<article class="related">
	<header>
		<h3><?php echo __('Related Resume Skills');?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</header>
	<?php if (!empty($resumeSkillCategory['ResumeSkill'])):?>
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'resume_skills', 'action' => 'view', $resumeSkill['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resume_skills', 'action' => 'edit', $resumeSkill['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'resume_skills', 'action' => 'delete', $resumeSkill['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeSkill['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</article>
