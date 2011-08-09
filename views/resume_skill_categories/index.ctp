<h2><?php __('Resume Skill Categories');?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('New Resume Skill Category', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Resume Skill Categories', true), array('controller' => 'resume_skill_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Resume Skill Category', true), array('controller' => 'resume_skill_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills', true), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
</ul>
<article class="resumeSkillCategories index">
	<header>
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			| <?php echo $this->Paginator->numbers();?>
 |
			<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>		</p>
	</header>
	<?php echo $this->Batch->create('ResumeSkill')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('lft');?></th>
			<th><?php echo $this->Paginator->sort('rght');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
echo $this->Batch->filter(array('id',
		null,
		null,
		'name',
		'description',
		'parent_id' => array('empty' => '-- None --'),
		'lft',
		'rght'));

	$i = 0;
	foreach ($resumeSkillCategories as $resumeSkillCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['modified']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeSkillCategory['ParentResumeSkillCategory']['name'], array('controller' => 'resume_skill_categories', 'action' => 'view', $resumeSkillCategory['ParentResumeSkillCategory']['id'])); ?>
		</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['lft']; ?>&nbsp;</td>
		<td><?php echo $resumeSkillCategory['ResumeSkillCategory']['rght']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resumeSkillCategory['ResumeSkillCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resumeSkillCategory['ResumeSkillCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resumeSkillCategory['ResumeSkillCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resumeSkillCategory['ResumeSkillCategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
<tfoot><?php echo $this->Batch->batch(array('id',
		null,
		null,
		'name',
		'description',
		'parent_id' => array('empty' => '-- None --'),
		'lft',
		'rght')); ?></tfoot>	</table>
		<?php echo $this->Batch->end()?>	
	<footer>
		<div class="paging">
			<?php echo $this->Paginator->prev('&laquo; ' . __('previous', true), array('escape' => false), null, array('escape' => false, 'class'=>'disabled'));?>
			| <?php echo $this->Paginator->numbers();?>
 |
			<?php echo $this->Paginator->next(__('next', true) . ' &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
		</div>
	</footer>
</article>