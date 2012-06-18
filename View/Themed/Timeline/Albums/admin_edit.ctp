<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['Album']['id'])): ?>
			<?php echo __('Add Album'); ?>
		<?php else: ?>
			<?php echo __('Edit Album'); ?>
		<?php endif ?>
	</h3>
</div>

<?php
echo $this->Form->create('Album', array('class' => 'modal-body'));
	echo $this->Form->input('id');
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('published');
	echo $this->Form->input('media_category_id', array('empty' => '-- None --'));
	echo $this->Form->input('project_id', array('empty' => '-- None --'));
echo $this->Form->end();
?>
<div class="modal-footer">
<?php if (!empty($this->data['Album']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('Album.id')), array('escape' => false, 'class' => 'btn pull-left', 'title' => __('Remove')), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Album.id'))); ?>
<?php endif	?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>