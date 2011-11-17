<h1><?php echo __('Edit Contact'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Contact.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Contact.id'))); ?></li>
	<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index'));?></li>
</ul>
<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subject');
		echo $this->Form->input('message');
		echo $this->Form->input('email');
		echo $this->Form->input('name');
		echo $this->Form->input('phone');
	?>
<?php echo $this->Form->end(__('Submit'));?>
</div>