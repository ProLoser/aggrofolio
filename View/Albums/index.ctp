<header>
	<h2 class="gallery">Albums</h2>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>	
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?><?php echo $this->Paginator->sort('album_category_id', 'Category');?>
	</p>
</header>
<ul class="gallery">
<?php foreach ($albums as $album): if (!empty($album['MediaItem'])): ?>
	<li<?php if (!empty($album['MediaCategory'])) echo " class='cat-{$album['MediaCategory']['id']}'";?>>
	<?php 
		$name = $album['Album']['name'];
		if (!empty($album['AlbumCategory']))
			$name .= "<span>{$album['AlbumCategory']['name']}</span>";
		echo $this->Html->link($name, array('controller' => 'media_items', 'action' => 'album', $album['Album']['id'], Inflector::slug($album['Album']['name'])), array('escape' => false)); 
		if (!empty($album['MediaItem'])) echo $this->Html->image('/uploads/media/thumb-' . $album['MediaItem'][0]['attachment_file_name']);
	?>
	</li>
<?php endif; endforeach ?>
</ul>