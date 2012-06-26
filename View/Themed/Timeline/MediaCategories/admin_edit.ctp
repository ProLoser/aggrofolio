<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo __('Add Media Category'); ?>
	</h3>
</div>
<?php
echo $this->Form->create('MediaCategory', array('class' => 'modal-body'));
	echo $this->Form->input('MediaCategory.id');
	echo $this->Form->input('MediaCategory.name');
	echo $this->Form->input('MediaCategory.parent_id', array('empty' => true, 'data-placeholder' => __('-- None --')));
	echo $this->Form->input('MediaCategory.description');
echo $this->Form->end();
?>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>