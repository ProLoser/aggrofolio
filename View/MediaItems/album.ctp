<?php $this->Paginator->options(array('url' => $this->request->params['pass']))?>
<header>
	<h2 class="gallery"><?php echo $album['Album']['name']?></h2>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>	
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?>
	</p>
</header>
<ul class="gallery media">
<?php foreach ($items as $item): ?>
	<li>
	<?php
		echo $this->Html->link($item['MediaItem']['name'], '/uploads/media/original-' . $item['MediaItem']['attachment_file_name'], array('rel' => 'gallery', 'title' => $item['MediaItem']['name'])); 
		echo $this->Html->image('/uploads/media/thumb-' . $item['MediaItem']['attachment_file_name'], array('alt' => $item['MediaItem']['name']));
	?>
	</li>
<?php endforeach ?>
</ul>