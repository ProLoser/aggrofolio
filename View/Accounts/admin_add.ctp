<article class="accounts form">
	<header>
		<h3><?php echo __('Add Account'); ?></h3>
	</header>
<?php echo $this->Form->create('Account');?>
	<fieldset>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('type');
		echo $this->Form->input('published');
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index'));?></li>
		</ul>
	</footer>
<?php echo $this->Form->end();?>
</article>