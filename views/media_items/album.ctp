<?php $this->Paginator->options(array('url' => $this->params['pass']));?>
<h2>Gallery: <?php echo $album['Album']['name']?></h2>
<div class="gallery">
	<div class="paging">
		<?php echo $this->Paginator->prev();?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next();?>
		<p>
			Sort by: 
			<?php echo $this->Paginator->sort('created');?> 
			| <?php echo $this->Paginator->sort('name');?>
		</p>
	</div>
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
	<div class="paging">
		<?php echo $this->Paginator->prev();?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next();?>
		<p>
			Sort by: 
			<?php echo $this->Paginator->sort('created');?> 
			| <?php echo $this->Paginator->sort('name');?>
		</p>
	</div>
</div>