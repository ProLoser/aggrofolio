<header><hgroup>
	<h2 class="contact"><?php echo __('Contact Me'); ?></h2>
</hgroup></header>
<div class="contacts form">
<?php echo $this->Form->create('Contact', array('inputDefaults' => array('placeholder' => true)));?>

<?php $this->Html->scriptStart(array('inline' => false))?>
$(document).ready(function(){
	$('form fieldset').append('<?php echo $this->Form->input('human', array('type' => 'checkbox', 'label' => 'Are You Human?'));?>');
});
<?php $this->Html->scriptEnd(); ?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('subject');
		echo $this->Form->input('message');
		echo $this->Form->hidden('inhuman');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Send'));?>
</div>
