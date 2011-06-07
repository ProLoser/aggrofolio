<?php $this->Paginator->options(array('url' => $this->params['pass']))?>
<header>
	<h2>Gallery: <?php echo $album['Album']['name']?></h2>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>	
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?>
	</p>
</header>
<div class="gallery">
	<ul class="media">
	<?php foreach ($items as $item): ?>
		<li>
		<?php
			echo $this->Html->link($item['MediaItem']['name'], '/uploads/original-' . $item['MediaItem']['attachment_file_name'], array('rel' => 'gallery', 'title' => $item['MediaItem']['name'])); 
			echo $this->Html->image('/uploads/thumb-' . $item['MediaItem']['attachment_file_name'], array('alt' => $item['MediaItem']['name']));
		?>
		</li>
	<?php endforeach ?>
	</ul>
</div>
<footer>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>	
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?>
	</p>
</footer>