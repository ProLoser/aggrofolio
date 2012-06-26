<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['ResumeSchool']['id'])): ?>
			<?php echo __('Add School'); ?>
		<?php else: ?>
			<?php echo __('Edit School'); ?>
		<?php endif ?>
	</h3>
</div>
<?php
echo $this->Form->create('ResumeSchool', array('class' => 'modal-body'));
	echo $this->Form->input('ResumeSchool.id');
	echo $this->Form->input('ResumeSchool.name');
	echo $this->Form->input('ResumeSchool.published');
	echo $this->Form->input('ResumeSchool.date_started');
	echo $this->Form->input('ResumeSchool.date_ended', array('empty' => true));
	echo $this->Form->input('ResumeSchool.field_of_study');
	echo $this->Form->input('ResumeSchool.degree');
	echo $this->Form->input('ResumeSchool.activities');
	echo $this->Form->input('ResumeSchool.notes');
echo $this->Form->end();
?>
<div class="modal-footer">
<?php if (!empty($this->data['ResumeSchool']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('ResumeSchool.id')), array('class' => 'btn pull-left', 'escape' => false, 'title' => 'remove'), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('ResumeSchool.id'))); ?>
<?php endif ?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>