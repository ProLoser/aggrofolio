<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['Resume']['id'])): ?>
			<?php echo __('Add Resume'); ?>
		<?php else: ?>
			<?php echo __('Edit Resume'); ?>
		<?php endif ?>
	</h3>
</div>
<?php echo $this->Form->create('Resume', array('type' => 'file', 'class' => 'modal-body form-horizontal'));
	echo $this->Form->input('Resume.id');
	echo $this->Form->input('Resume.purpose');
	echo $this->Form->input('Resume.attachment', array('type' => 'file'));
	echo $this->Form->input('Resume.attachment_pdf', array('type' => 'file'));
	echo $this->Form->input('Resume.attachment_doc', array('type' => 'file'));
	echo $this->Form->input('Resume.content');
	echo $this->Form->input('Resume.published');
	echo $this->Form->input('Resume.objective');
	echo $this->Form->input('Resume.summary');
	echo $this->Form->input('Resume.specialties');
	echo $this->Form->input('Resume.associations');
	echo $this->Form->input('Resume.honors');
	echo $this->Form->input('Resume.interests');
	echo $this->Form->input('Resume.first_name');
	echo $this->Form->input('Resume.last_name');
	echo $this->Form->input('ResumeRecommendation');
	echo $this->Form->input('ResumeSchool');
	echo $this->Form->input('ResumeSkill');
	echo $this->Form->input('ResumeEmployer');
echo $this->Form->end();?>
<div class="modal-footer">
<?php if (!empty($this->data['Resume']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('action' => 'view', $this->data['Resume']['id']), array('class' => 'pull-left btn', 'escape' => false, 'title' => 'View')); ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('Resume.id')), array('class' => 'pull-left btn', 'escape' => false), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Resume.id'))); ?>
<?php endif ?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>