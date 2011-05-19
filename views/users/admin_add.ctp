<article class="users form">
	<header>
		<h3><?php __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		</ul>
	</header>
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('name');
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit()?>
	</footer>	
<?php echo $this->Form->end();?>
</article>