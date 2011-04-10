<div class="resumeSkills index">
	<h2><?php __('Resume Skills');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($resumeSkills as $resumeSkill):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeSkill['ResumeSkill']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['name']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeSkill['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $resumeSkill['Account']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resumeSkill['ResumeSkill']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resumeSkill['ResumeSkill']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resumeSkill['ResumeSkill']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeSkill['ResumeSkill']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</div>