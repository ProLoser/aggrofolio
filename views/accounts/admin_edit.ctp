<article class="accounts form">
<?php echo $this->Form->create('Account');?>
	<fieldset>
 		<legend><?php __('Edit Account'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('api_key');
		echo $this->Form->input('type');
		echo $this->Form->input('published');
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
		<ul>
			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Account.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Account.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Accounts', true), array('action' => 'index'));?></li>
		</ul>
	</footer>
	<?php echo $this->Form->end();?>
</article>