<h1><?php echo __('Edit Album'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Album.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Album.id'))); ?></li>
</ul>
<?php
echo $this->Form->create('Album');
	echo $this->Form->input('id');
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('url');
	echo $this->Form->input('published');
	echo $this->Form->input('media_category_id', array('empty' => '-- None --'));
	echo $this->Form->input('uuid');
	echo $this->Form->input('account_id', array('empty' => '-- None --'));
	echo $this->Form->input('project_id', array('empty' => '-- None --'));
echo $this->Form->end(__('Submit'));
?>