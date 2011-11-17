<header>
	<hgroup><h1><?php echo __('Projects');?></h1></hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Project Categories'), array('controller' => 'project_categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Project Category'), array('controller' => 'project_categories', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="projects index">
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
	<?php echo $this->Batch->create('Project')?>	
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('project_category_id');?></th>
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th><?php echo $this->Paginator->sort('deleted');?></th>
		<th><?php echo $this->Paginator->sort('account_id');?></th>
		<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'name',
			'project_category_id' => array('empty' => '-- None --'),
			'published',
			'deleted',
			'account_id' => array('empty' => '-- None --'),
		));
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $project['Project']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($project['Project']['name'], $project['Project']['cvs_url']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['ProjectCategory']['name'], array('controller' => 'project_categories', 'action' => 'view', $project['ProjectCategory']['id'])); ?>
		</td>
		<td><?php echo $project['Project']['published']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['deleted']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $project['Account']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $project['Project']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $project['Project']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $project['Project']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $project['Project']['id'])); ?>
			<?php echo $this->Batch->checkbox($project['Project']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'name',
			'project_category_id' => array('empty' => '-- None --'),
			'published',
			'deleted',
			'account_id' => array('empty' => '-- None --'),
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