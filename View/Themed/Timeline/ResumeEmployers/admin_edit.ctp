<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['ResumeEmployer']['id'])): ?>
			<?php echo __('Add Company'); ?>
		<?php else: ?>
			<?php echo __('Edit Company'); ?>
		<?php endif ?>
	</h3>
</div>
<?php
echo $this->Form->create('ResumeEmployer', array('class' => 'modal-body'));
	echo $this->Form->input('ResumeEmployer.id');
	echo $this->Form->input('ResumeEmployer.name');
	echo $this->Form->input('ResumeEmployer.title', array('label' => 'Position Title'));
	echo $this->Form->input('ResumeEmployer.date_started');
	echo $this->Form->input('ResumeEmployer.date_ended');
	echo $this->Form->input('ResumeEmployer.currently_employed');
	echo $this->Form->input('ResumeEmployer.published');
	echo $this->Form->input('ResumeEmployer.deleted');
	echo $this->Form->input('ResumeEmployer.summary');
echo $this->Form->end();
?>
<div class="modal-footer">
<?php if (!empty($this->data['ResumeEmployer']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('ResumeEmployer.id')), array('class' => 'btn pull-left', 'escape' => false, 'title' => 'remove'), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('ResumeEmployer.id'))); ?>
<?php endif ?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>