<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['MediaItem']['id'])): ?>
			<?php echo __('Add Media Item'); ?>
		<?php else: ?>
			<?php echo __('Edit Media Item'); ?>
		<?php endif ?>
	</h3>
</div>
<?php
echo $this->Form->create('MediaItem', array('type' => 'file', 'class' => 'modal-body'));
	echo $this->Form->input('MediaItem.id');
	echo $this->Form->input('MediaItem.name');
	echo $this->Form->input('MediaItem.attachment', array('type' => 'file'));
	echo $this->Form->input('MediaItem.url');
	echo $this->Form->input('MediaItem.source');
	echo $this->Form->input('MediaItem.description');
	echo $this->Form->input('MediaItem.published');
	echo $this->Form->input('MediaItem.album_id', array('empty' => true, 'data-placeholder' => '-- None --'));
	echo $this->Form->input('MediaItem.project_id', array('empty' => true, 'data-placeholder' => '-- None --'));
echo $this->Form->end();
?>
<div class="modal-footer">
<?php if (!empty($this->data['MediaItem']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('MediaItem.id')), array('escape' => false, 'title' => 'remove', 'class' => 'pull-left btn'), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('MediaItem.id'))); ?>
<?php endif ?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>