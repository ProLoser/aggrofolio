<h2><?php __('Admin Add Media Item'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Media Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
</ul>
<div class="mediaItems form">
<?php echo $this->Form->create('MediaItem');?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('attachment_file_name');
		echo $this->Form->input('attachment_file_size');
		echo $this->Form->input('attachment_meta_type');
		echo $this->Form->input('url');
		echo $this->Form->input('source');
		echo $this->Form->input('album_id');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Form->input('uuid');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>