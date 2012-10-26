<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php if (empty($this->data['Album']['id'])): ?>
			<?php echo __('Add Album'); ?>
		<?php else: ?>
			<?php echo __('Edit Album'); ?>
		<?php endif ?>
	</h3>
</div>

<?php
echo $this->Form->create('Album', array('class' => 'modal-body'));
	echo $this->Form->input('Album.id');
	echo $this->Form->input('Album.name');
	echo $this->Form->input('Album.published');
	echo $this->Form->input('Album.description');
	echo $this->Form->input('Album.media_category_id', array('label' => 'Category ' . $this->Html->link('', array('controller' => 'media_categories', 'action' => 'add'), array('escape' => false, 'class' => 'icon-plus ajax')), 'empty' => true, 'data-placeholder' => '-- None --'));
	echo $this->Form->input('Album.project_id', array('empty' => true, 'data-placeholder' => '-- None --'));
echo $this->Form->end();
?>
<div class="modal-footer">
<?php if (!empty($this->data['Album']['id'])): ?>
	<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->Form->value('Album.id')), array('escape' => false, 'class' => 'btn pull-left', 'title' => __('Remove')), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Album.id'))); ?>
	<?php echo $this->Html->link('<i class="icon-picture"></i>', array('controller' => 'media_items', 'action' => 'add', 'album' => $this->request->data['Album']['id']), array('class' => 'pull-left btn ajax', 'escape' => false, 'title' => 'Attach Media')); ?>
<?php endif	?>
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>