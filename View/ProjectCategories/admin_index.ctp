<header>
	<hgroup><h1><?php echo __('Project Categories');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Project Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="projectCategories index">
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
	<?php echo $this->Batch->create('ProjectCategory')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			null,
			'name',
			'description',
		));
	$i = 0;
	foreach ($projectCategories as $projectCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $projectCategory['ProjectCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $projectCategory['ProjectCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $projectCategory['ProjectCategory']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectCategory['ProjectCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectCategory['ProjectCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $projectCategory['ProjectCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $projectCategory['ProjectCategory']['id'])); ?>
			<?php echo $this->Batch->checkbox($projectCategory['ProjectCategory']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			null,
			'name',
			'description',
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