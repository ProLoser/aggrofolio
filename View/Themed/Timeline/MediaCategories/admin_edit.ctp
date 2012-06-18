<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo __('Add Media Category'); ?>
	</h3>
</div>
<?php
echo $this->Form->create('MediaCategory', array('class' => 'modal-body'));
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('parent_id', array('empty' => __('-- None --')));
echo $this->Form->end();
?>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>