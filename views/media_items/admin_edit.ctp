<div class="mediaItems form">
<?php echo $this->Form->create('MediaItem');?>
	<fieldset>
 		<legend><?php __('Edit Media Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('attachment_file_name');
		echo $this->Form->input('attachment_file_size');
		echo $this->Form->input('attachment_meta_type');
		echo $this->Form->input('url');
		echo $this->Form->input('source');
		echo $this->Form->input('album_id');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MediaItem.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MediaItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Media Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>