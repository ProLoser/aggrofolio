<div class="resumes index">
	<h2><?php __('Resumes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('purpose');?></th>
			<th><?php echo $this->Paginator->sort('attachment_file_name');?></th>
			<th><?php echo $this->Paginator->sort('attachment_file_size');?></th>
			<th><?php echo $this->Paginator->sort('attachment_meta_type');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('visible');?></th>
			<th><?php echo $this->Paginator->sort('objective');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($resumes as $resume):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resume['Resume']['id']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['created']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['modified']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['purpose']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['attachment_file_name']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['attachment_file_size']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['attachment_meta_type']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['content']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['visible']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['objective']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resume['Resume']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resume['Resume']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resume['Resume']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resume['Resume']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Resume', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Resume Recommendations', true), array('controller' => 'resume_recommendations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('controller' => 'resume_recommendations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Schools', true), array('controller' => 'resume_schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Skills', true), array('controller' => 'resume_skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Employers', true), array('controller' => 'resume_employers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add')); ?> </li>
	</ul>
</div>