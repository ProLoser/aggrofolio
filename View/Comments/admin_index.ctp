<header>
	<hgroup><h1><?php echo __('Comments');?></h1></hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('New Comment'), array('action' => 'add')); ?></li>
	</ul>
</header>
<article class="comments index">
	<?php echo $this->Batch->create('Comment')?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('subject');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('website');?></th>
			<th><?php echo $this->Paginator->sort('foreign_key');?></th>
			<th><?php echo $this->Paginator->sort('foreign_model');?></th>
			<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php
	echo $this->Batch->filter(array(null,null,null,'subject','body','name','website',null,null));
	$i = 0;
	foreach ($comments as $comment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $comment['Comment']['id']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['created']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['modified']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['subject']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['body']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['name']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['website']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['foreign_key']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['foreign_model']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comment['Comment']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comment['Comment']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $comment['Comment']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $comment['Comment']['id'])); ?>
			<?php echo $this->Batch->checkbox($comment['Comment']['id'])?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->Batch->batch(array(null,null,null,'subject','body','name','website',null,null));?>
	</table>
	<?php echo $this->Batch->end()?>
	<footer>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
		));
		?>	</p>
	
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>