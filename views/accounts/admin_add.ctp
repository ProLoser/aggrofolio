<div class="accounts form">
	<div class="header">
		<h3><?php __('Add Account'); ?></h3>
	</div>
<?php echo $this->Form->create('Account');?>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('api_key');
		echo $this->Form->input('type');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Accounts', true), array('action' => 'index'));?></li>
	</ul>
</div>