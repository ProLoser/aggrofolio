<h1><?php echo __('Edit Media Item'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('MediaItem.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('MediaItem.id'))); ?></li>
</ul>
<?php
echo $this->Form->create('MediaItem', array('type' => 'file'));
	echo $this->Form->input('id');
	echo $this->Form->input('name');
	echo $this->Form->input('attachment', array('type' => 'file'));
	echo $this->Form->input('url');
	echo $this->Form->input('source');
	echo $this->Form->input('description');
	echo $this->Form->input('published');
	echo $this->Form->input('uuid');
	echo $this->Form->input('album_id', array('empty' => '-- Select One --'));
	echo $this->Form->input('project_id', array('empty' => '-- None --'));
echo $this->Form->end('Save');
?>