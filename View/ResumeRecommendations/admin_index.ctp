<header>
	<hgroup><h1><?php echo __('Resume Recommendations');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume Recommendation'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeRecommendations index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total')
		));
		?>	</h3>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</header>
	<?php echo $this->Batch->create('ResumeRecommendation')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('recommendor_uuid');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th class="actions"><?php echo __('Actions');?><?php echo $this->Batch->all()?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			'id',
			null,
			'type',
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'first_name',
			'last_name',
			'recommendor_uuid',
			'published',
			'deleted'
		));
	$i = 0;
	foreach ($resumeRecommendations as $resumeRecommendation):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['type']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeRecommendation['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resumeRecommendation['Account']['id'])); ?>
		</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['first_name']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['last_name']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['recommendor_uuid']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['published']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['deleted']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resumeRecommendation['ResumeRecommendation']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resumeRecommendation['ResumeRecommendation']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $resumeRecommendation['ResumeRecommendation']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $resumeRecommendation['ResumeRecommendation']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeRecommendation['ResumeRecommendation']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			'id',
			null,
			'type',
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'first_name',
			'last_name',
			'recommendor_uuid',
			'published',
			'deleted'
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<footer>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>