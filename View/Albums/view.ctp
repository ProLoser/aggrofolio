<header>
	<h2 class="gallery"><?php echo $album['Album']['name']?></h2>
	<?php if ($this->Session->read('Auth.User')):?>
	<p class="sorting">
		<span>Admin:</span>
		<?php 
		echo $this->Html->link('Edit Album', array('admin' => true, 'action' => 'edit', $album['Album']['id']));
		?>
	</p>
	<?php endif;?>
</header>
<div class="gallery media">
	<ul>
	<?php foreach ($album['MediaItem'] as $item): ?>
		<li>
		<?php
			echo $this->Html->link($item['name'], '/uploads/media/original-' . $item['attachment_file_name'], array('title' => $item['name'], 'rel' => 'album')); 
			echo $this->Html->image('/uploads/media/thumb-' . $item['attachment_file_name']);
		?>
		</li>
	<?php endforeach ?>
	</ul>
</div>