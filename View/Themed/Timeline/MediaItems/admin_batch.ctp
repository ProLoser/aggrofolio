<h1><?php echo __('Batch Add Media Items'); ?></h1>
<?php
echo $this->Form->create('MediaItem', array('type' => 'file'));
	echo $this->Form->input("MediaItem.published");
	echo $this->Form->input("MediaItem.album_id", array('empty' => '-- Select One --'));
	echo $this->Form->input("MediaItem.project_id", array('empty' => '-- None --'));
	echo $this->Form->input("MediaItem.attachment.", array('label' => 'Attachment', 'type' => 'file', 'multiple'));
echo $this->Form->end('Save');
?>