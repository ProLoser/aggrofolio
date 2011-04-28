<h2><?php __('Projects');?></h2>
<?php $this->Plate->start('nav')?>
<h3>Categories</h3>
<?php echo $this->Plate->tree($categories);?> 
<?php $this->Plate->stop();?>
<div class="projects index">
	<div class="header">
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>		</p>
		<div class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers();?>
			<?php echo $this->Paginator->next();?>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0" style="width:100%">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('project_category_id');?></th>
		<th><?php echo $this->Paginator->sort('account_id');?></th>
		<th><?php echo $this->Paginator->sort('owner');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $project['Project']['id']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['created']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['modified']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($project['Project']['name'], $project['Project']['cvs_url']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['ProjectCategory']['name'], array('controller' => 'project_categories', 'action' => 'view', $project['ProjectCategory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($project['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $project['Account']['id'])); ?>
		</td>
		<td><?php echo $project['Project']['owner']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $project['Project']['id']), array('class' => 'view')); ?>
		</td>
	</tr>
	<?php endforeach; ?> 
	</table>
	<div class="paging">
		<?php echo $this->Paginator->prev();?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next();?>
	</div>
</div>