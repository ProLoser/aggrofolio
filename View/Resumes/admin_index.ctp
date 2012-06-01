<header>
	<hgroup>
		<h1><?php echo __('Resumes');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation'), array('controller' => 'resume_recommendations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School'), array('controller' => 'resume_schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Skill'), array('controller' => 'resume_skills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer'), array('controller' => 'resume_employers', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumes index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
		<div class="paging">
			<?php echo $this->Paginator->prev();?>
		 	<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</div>
	</header>
	<?php echo $this->Batch->create('Resume')?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th><?php echo $this->Paginator->sort('purpose');?></th>
		<th><?php echo $this->Paginator->sort('first_name');?></th>
		<th><?php echo $this->Paginator->sort('last_name');?></th>
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	echo $this->Batch->filter(array(
		null,
		null,
		null,
		null,
		null,
		null,
		'published',
	));
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
                <td><?php echo $resume['Resume']['published']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resume['Resume']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resume['Resume']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $resume['Resume']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resume['Resume']['id'])); ?>
		</td>
	</tr>
<?php endforeach; 
echo $this->Batch->batch(array(
	null,null,null,null,null,null,'published',
));
?>
	</table>
	<?php echo $this->Batch->end();?>
</article>
