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
<?php echo $this->Form->create('Project', array('class' => 'modal-body form-horizontal')); ?>
<?php
	echo $this->Form->input('Project.id');
	echo $this->Form->input('Project.name');
	echo $this->Form->input('Project.url');
	echo $this->Form->input('Project.description');
	echo $this->Form->input('Project.hash_tag');
	echo $this->Form->input('Project.bugs_url');
	echo $this->Form->input('Project.published');
	echo $this->Form->input('Project.project_category_id', array('label' => 'Category ' . $this->Html->link('', array('controller' => 'project_categories', 'action' => 'add'), array('escape' => false, 'class' => 'icon-plus ajax')), 'empty' => true, 'data-placeholder' => '-- None --'));
	echo $this->Form->input('Project.resume_employer_id', array('empty' => true, 'data-placeholder' => '-- None --'));
	echo $this->Form->input('Project.resume_school_id', array('empty' => true, 'data-placeholder' => '-- None --'));
	echo $this->Form->input('ResumeSkill.ResumeSkill');
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