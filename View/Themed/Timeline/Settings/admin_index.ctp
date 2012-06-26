<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo __('Site Settings'); ?>
	</h3>
</div>
<?php
echo $this->Form->create('Setting', array('class' => 'modal-body'));
	echo $this->Form->input('Setting.id');
	echo $this->Form->input('User.id');
	echo $this->Form->input('Setting.site_name');
	echo $this->Form->input('Setting.google_analytics', array('label' => 'Google Analytics Code (Optional)'));
	echo $this->Form->input('User.name');
	echo $this->Form->input('User.email');
	//echo $this->Form->input('User.password');
	echo $this->Form->input('Setting.css');
	echo $this->Form->input('Setting.js');
echo $this->Form->end();
?>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>