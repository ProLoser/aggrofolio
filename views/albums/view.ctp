<h2>Gallery: <?php echo $album['Album']['name']?></h2>
<div class="gallery">
	<ul>
	<?php foreach ($album['MediaItem'] as $item): ?>
		<li>
		<?php
			echo $this->Html->link($item['name'], '/uploads/original-' . $item['attachment_file_name']); 
			echo $this->Html->image('/uploads/thumb-' . $item['attachment_file_name']);
		?>
		</li>
	<?php endforeach ?>
	</ul>
</div>