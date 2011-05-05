<h2>Gallery: Albums</h2>
<div class="gallery">
	<div class="paging">
		<?php echo $this->Paginator->prev();?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next();?>
		<p>
			Sort by: 
			<?php echo $this->Paginator->sort('created');?> 
			| <?php echo $this->Paginator->sort('name');?> | 
			<?php echo $this->Paginator->sort('Category', 'media_category_id');?>
		</p>
	</div>
	<ul>
	<?php foreach ($albums as $album): ?>
		<li<?php if (!empty($album['MediaCategory'])) echo " class='cat-{$album['MediaCategory']['id']}'";?>>
		<?php 
			$name = $album['Album']['name'];
			if (!empty($album['AlbumCategory']))
				$name .= "<span>{$album['AlbumCategory']['name']}</span>";
			echo $this->Html->link($name, array('controller' => 'media_items', 'action' => 'album', $album['Album']['id'], Inflector::slug($album['Album']['name'])), array('escape' => false)); 
			if (!empty($album['MediaItem'])) echo $this->Html->image('/uploads/thumb-' . $album['MediaItem'][0]['attachment_file_name']);
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
			| <?php echo $this->Paginator->sort('name');?> | 
			<?php echo $this->Paginator->sort('Category', 'media_category_id');?>
		</p>
	</div>
</div>