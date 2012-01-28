<header>
	<hgroup>
		<h1><?php echo __('Posts');?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
	</ul>
</header>
<article class="posts index">
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
	<?php echo $this->Batch->create('Post')?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('subject');?></th>
		<th><?php echo $this->Paginator->sort('slug');?></th>
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php echo $this->Batch->filter(array(null, null, 'subject', 'slug', 'published'));
	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $post['Post']['id']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['created']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['subject']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['slug']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['published']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $post['Post']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $post['Post']['id'])); ?>
			<?php echo $this->Batch->checkbox($post['Post']['id'])?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->Batch->batch(array(null, null, 'subject', 'slug', 'published'))?>
	</table>
	<?php echo $this->Batch->end()?>
	<footer>
		<h3>Records:</h3>
		<p class="paging limit">
			<?php echo $this->Paginator->limit(array(10,20,50,100));?>
		</p>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
		 	<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>