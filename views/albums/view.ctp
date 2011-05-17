<h2>Gallery: <?php echo $album['Album']['name']?></h2>
<div class="gallery media">
	<ul>
	<?php foreach ($album['MediaItem'] as $item): ?>
		<li>
		<?php
			echo $this->Html->link($item['name'], '/uploads/original-' . $item['attachment_file_name'], array('title' => $item['name'], 'rel' => 'album')); 
			echo $this->Html->image('/uploads/thumb-' . $item['attachment_file_name']);
		?>
		</li>
	<?php endforeach ?>
	</ul>
</div>