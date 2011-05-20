<h1><?php __('Add Contact'); ?></h1>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Contacts', true), array('action' => 'index'));?></li>
</ul>
<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<?php
		echo $this->Form->input('subject');
		echo $this->Form->input('message');
		echo $this->Form->input('email');
		echo $this->Form->input('name');
		echo $this->Form->input('phone');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>