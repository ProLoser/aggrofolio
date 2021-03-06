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
		<th><?php echo $this->Paginator->sort('published');?></th>
		<th><?php echo $this->Paginator->sort('post_category_id');?></th>
		<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php echo $this->Batch->filter(array(null, null, 'subject', 'published', 'post_category_id'));
	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $post['Post']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($post['Post']['created']); ?>&nbsp;</td>
		<td title="Slug: <?php echo $post['Post']['slug']; ?>">
			<strong><?php echo $post['Post']['subject']; ?></strong>
			<?php echo $this->Agro->truncate($post['Post']['body']);?>
		</td>
		<td><?php echo ($post['Post']['published']) ? 'Yes' : 'No'; ?>&nbsp;</td>
		<td>
			<?php if (!empty($post['Post']['post_category_id'])): ?>
				<?php echo $this->Html->link($postCategories[$post['Post']['post_category_id']], array('controller' => 'post_categories', 'action' => 'view', $post['Post']['post_category_id']));?>
			<?php endif ?>
			&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $post['Post']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $post['Post']['id'])); ?>
			<?php echo $this->Batch->checkbox($post['Post']['id'])?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->Batch->batch(array(null, null, 'subject', 'published', 'post_category_id'))?>
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