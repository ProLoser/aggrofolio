<header>
	<hgroup>
		<h1><?php __('Resumes');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('controller' => 'resume_recommendations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumes index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total', true)
		));
		?>	</h3>
		<div class="paging">
			<?php echo $this->Paginator->prev();?>
		 	<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</div>
	</header>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th><?php echo $this->Paginator->sort('purpose');?></th>
		<th><?php echo $this->Paginator->sort('first_name');?></th>
		<th><?php echo $this->Paginator->sort('last_name');?></th>
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
		<td><?php echo $this->Time->niceShort($resume['Resume']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($resume['Resume']['modified']); ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['purpose']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['first_name']; ?>&nbsp;</td>
		<td><?php echo $resume['Resume']['last_name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resume['Resume']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resume['Resume']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resume['Resume']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resume['Resume']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</article>