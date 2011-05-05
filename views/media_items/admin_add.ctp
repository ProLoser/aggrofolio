<h2><?php __('Admin Add Media Item'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Media Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
</ul>
<div class="mediaItems form">
<?php echo $this->Form->create('MediaItem', array('type' => 'file'));?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('url');
		echo $this->Form->input('source');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Form->input('uuid');
		echo $this->Form->input('album_id', array('empty' => '-- Select One --'));
		echo $this->Form->input('project_id', array('empty' => '-- None --'));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>