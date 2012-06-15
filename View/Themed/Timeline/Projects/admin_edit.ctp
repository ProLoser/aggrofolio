<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['Project']['id'])): ?>
			<?php echo __('Add Project'); ?>
		<?php else: ?>
			<?php echo __('Edit Project'); ?>
		<?php endif ?>
	</h3>
</div>
<?php echo $this->Form->create('Project', array('class' => 'modal-body')); ?>
<?php
	echo $this->Form->input('id');
	echo $this->Form->input('name');
	echo $this->Form->input('url');
	echo $this->Form->input('description');
	echo $this->Form->input('hash_tag');
	echo $this->Form->input('cvs_url');
	echo $this->Form->input('bugs_url');
	echo $this->Form->input('project_category_id', array('empty' => '-- None --'));
	echo $this->Form->input('published');
	echo $this->Form->input('owner');
	echo $this->Form->input('resume_employer_id', array('empty' => '-- None --'));
	echo $this->Form->input('resume_school_id', array('empty' => '-- None --'));
?>
<?php echo $this->Form->end();?>
<div class="modal-footer">
<?php if (!empty($this->data['Project']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('action' => 'view', $this->data['Project']['id']), array('class' => 'pull-left btn', 'escape' => false, 'title' => 'View')); ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('Project.id')), array('class' => 'pull-left btn', 'escape' => false), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Project.id'))); ?>
	<?php echo $this->Html->link('<i class="icon-picture"></i>', array('controller' => 'media_items', 'action' => 'add', 'project' => $this->request->data['Project']['id']), array('class' => 'pull-left btn', 'escape' => false, 'title' => 'Attach Media')); ?>
<?php endif ?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>