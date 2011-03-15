<div class="resumeRecommendations index">
	<h2><?php __('Resume Recommendations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('uui');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('text');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('recommendor_uuid');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
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
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['uui']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeRecommendation['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $resumeRecommendation['Account']['id'])); ?>
		</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['text']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['first_name']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['last_name']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['recommendor_uuid']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['published']; ?>&nbsp;</td>
		<td><?php echo $resumeRecommendation['ResumeRecommendation']['deleted']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resumeRecommendation['ResumeRecommendation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resumeRecommendation['ResumeRecommendation']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resumeRecommendation['ResumeRecommendation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeRecommendation['ResumeRecommendation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</div>