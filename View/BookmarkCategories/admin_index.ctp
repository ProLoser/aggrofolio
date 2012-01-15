<header>
	<hgroup><h1><?php echo __('Bookmark Categories');?></h1></hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('New Bookmark Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="bookmarkCategories index">
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
	<?php echo $this->Batch->create('BookmarkCategory')?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	echo $this->Batch->filter(array(
		null,
		null,
		'name',
		'description',
		'parent_id' => array('empty' => '-- None --')
	));
	$i = 0;
	foreach ($bookmarkCategories as $bookmarkCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['created']; ?>&nbsp;</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['name']; ?>&nbsp;</td>
		<td><?php echo $bookmarkCategory['BookmarkCategory']['description']; ?>&nbsp;</td>
		<td><?php if (!empty($parents[$bookmarkCategory['BookmarkCategory']['parent_id']])) 
			echo $this->Html->link($parents[$bookmarkCategory['BookmarkCategory']['parent_id']], array('action' => 'view', $bookmarkCategory['BookmarkCategory']['parent_id'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bookmarkCategory['BookmarkCategory']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bookmarkCategory['BookmarkCategory']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $bookmarkCategory['BookmarkCategory']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $bookmarkCategory['BookmarkCategory']['id'])); ?>
			<?php echo $this->Batch->checkbox($bookmarkCategory['BookmarkCategory']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
	echo $this->Batch->batch(array(
		null,
		null,
		'name',
		'description',
		'parent_id' => array('empty' => '-- None --')
	));?>
	</table>
	<footer>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
		));
		?></p>
	
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>