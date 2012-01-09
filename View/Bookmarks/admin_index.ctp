<header>
	<hgroup><h1><?php echo __('Bookmarks');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Bookmark'), array('action' => 'add')); ?></li>
		<li><a href="javascript:%20var%20a=document.title,b=document.location.href,c=document.getElementsByTagName('meta'),d='',i=c.length;while(i--){if(c[i].name.toLowerCase()=='description'){d=c[i].content;}}%20window.open('http://deansofer.com/admin/bookmarks/add/name:'+a%20+'/description:'+d%20+'/url:'+b.replace(/\//g,'@s@').replace(/:/g,'@c@').replace(/#/g,'@h@').replace(/\?/g,'@q@'),'New%20Bookmark','width=400,height=400,location=0,directories=0,status=0,menubar=0,copyhistory=0');">Bookmarklet</a></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Categories'), array('controller' => 'bookmark_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Category'), array('controller' => 'bookmark_categories', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="bookmarks index">
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
	<?php echo $this->Batch->create('Bookmark')?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('bookmark_category_id');?></th>
		<th class="actions"><?php echo __('Actions');?> <?php echo $this->Batch->all()?></th>
	</tr>
	<?php
	echo $this->Batch->filter(array('name', 'bookmark_category_id'));
	$i = 0;
	foreach ($bookmarks as $bookmark):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<strong><?php echo $this->Html->link($bookmark['Bookmark']['name'], $bookmark['Bookmark']['url'], array('title' => $bookmark['Bookmark']['description'])); ?></strong>
			<br><?php echo $bookmark['Bookmark']['url']; ?>&nbsp;
		</td>
		<td>
			<?php echo $this->Html->link($bookmark['BookmarkCategory']['name'], array('controller' => 'bookmark_categories', 'action' => 'view', $bookmark['BookmarkCategory']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bookmark['Bookmark']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bookmark['Bookmark']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $bookmark['Bookmark']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?'), $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Batch->checkbox($bookmark['Bookmark']['id'])?>
		</td>
	</tr>
<?php 
	endforeach; 
	echo $this->Batch->batch(array('name', 'bookmark_category_id'));
?>
	</table>
	<?php echo $this->Batch->end();?>
</article>