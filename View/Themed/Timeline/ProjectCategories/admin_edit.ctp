<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo __('Add Project Category'); ?>
	</h3>
</div>
<?php
echo $this->Form->create('ProjectCategory', array('class' => 'modal-body'));
	echo $this->Form->input('ProjectCategory.id');
	echo $this->Form->input('ProjectCategory.name');
	echo $this->Form->input('ProjectCategory.parent_id', array('empty' => '-- None --'));
	echo $this->Form->input('ProjectCategory.description');
echo $this->Form->end();
?>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>