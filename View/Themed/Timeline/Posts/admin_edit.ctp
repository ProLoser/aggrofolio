<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['Post']['id'])): ?>
			<?php echo __('Add Post'); ?>
		<?php else: ?>
			<?php echo __('Edit Post'); ?>
		<?php endif ?>
	</h3>
</div>
<?php echo $this->Form->create('Post', array('class' => 'modal-body')); ?>
<?php
	echo $this->Form->input('id');
	echo $this->Form->input('Post.subject');
	echo $this->Form->input('Post.slug');
	echo $this->Form->input('Post.body');
	echo $this->Form->input('Post.published');
	echo $this->Form->input('Post.post_category_id', array('label' => 'Post Category '.$this->Html->link('<i class="icon-plus"></i>',array('controller' => 'post_categories', 'action' => 'add'),array('class' => 'ajax btn', 'escape' => false)), 'empty' => '-- None --'));
?>

	<fieldset class="related">
		<h3>Relationship Tags</h3>
		<?php if (!empty($this->request->data['PostRelationship'])): ?>
		<ul>
			<?php foreach ($this->request->data['PostRelationship'] as $relationship): ?>
			<li>
				<?php echo $this->Html->link('[Delete]', array('action' => 'delete_related', $relationship['id'], $this->Form->value('Post.id'))); ?>
				<strong><?php echo $relationship['foreign_model']; ?></strong>
				<?php echo $relationship['title']; ?>
			</li>
			<?php endforeach ?>
		</ul>
		<?php endif ?>
		<?php echo $this->element('related'); ?>
	</fieldset>

<?php echo $this->Form->end(); ?>

<div class="modal-footer">
	<a href="#" class="add-related pull-left btn"><i class="icon-plus"></i> Add Related</a>
<?php if (!empty($this->data['Post']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('Post.id')), array('escape' => false, 'class' => 'pull-left btn', 'title' => __('Remove')), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Post.id'))); ?>
	<?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('action' => 'view', $this->Form->value('Post.id')), array('escape' => false, 'class' => 'pull-left btn', 'title' => __('View')));?>
<?php endif ?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>