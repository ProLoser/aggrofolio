<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
 		<legend><?php __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('Post.subject');
		echo $this->Form->input('Post.body');
		echo $this->Form->input('Post.slug');
		echo $this->Form->input('PostRelationship.0.foreign_model', array('empty' => '-- None --'));
		echo $this->Form->input('PostRelationship.0.foreign_key');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index'));?></li>
	</ul>
</div>