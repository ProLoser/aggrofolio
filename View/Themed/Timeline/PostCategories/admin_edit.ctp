<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo __('Add Post Category'); ?>
	</h3>
</div>
<?php
echo $this->Form->create('PostCategory', array('class' => 'modal-body'));
	echo $this->Form->input('PostCategory.id');
	echo $this->Form->input('PostCategory.name');
	echo $this->Form->input('PostCategory.parent_id', array('empty' => true, 'data-placeholder' => '-- None --'));
	echo $this->Form->input('PostCategory.description');
echo $this->Form->end();
?>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>