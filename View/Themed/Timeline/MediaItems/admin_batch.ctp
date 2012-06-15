<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo __('Batch Media Items'); ?>
	</h3>
</div>
<?php
echo $this->Form->create('MediaItem', array('type' => 'file', 'class' => 'modal-body'));
	echo $this->Form->input("MediaItem.published");
	echo $this->Form->input("MediaItem.album_id", array('empty' => '-- Select One --'));
	echo $this->Form->input("MediaItem.project_id", array('empty' => '-- None --'));
	echo $this->Form->input("MediaItem.attachment.", array('label' => 'Attachment', 'type' => 'file', 'multiple'));
echo $this->Form->end();
?>
<div class="modal-footer">
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('MediaItem.id')), array('class' => 'btn pull-left', 'remove' => false, 'title' => __('Remove')), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('MediaItem.id'))); ?>
</div>