<div class="comments form">
<?php echo $this->Form->create('Comment');?>
	<fieldset>
 		<legend><?php echo __('Add Comment'); ?></legend>
	<?php
		echo $this->Form->input('subject');
		echo $this->Form->input('body');
		echo $this->Form->input('name');
		echo $this->Form->input('website');
		echo $this->Form->input('foreign_key');
		echo $this->Form->input('foreign_model');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comments'), array('action' => 'index'));?></li>
	</ul>
</div>