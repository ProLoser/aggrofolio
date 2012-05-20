<header>
	<hgroup><h1>My Settings</h1></hgroup>
</header>
<article class="settings form">
	<header>
		<h3><?php echo __('Site Settings'); $this->set('title_for_layout', __('Site Settings')); ?></h3>
	</header>
	<?php echo $this->Form->create('Setting'); ?>
		<fieldset>
		<?php
			echo $this->Form->input('Setting.id');
			echo $this->Form->input('User.id');
			echo $this->Form->input('Setting.site_name');
			echo $this->Form->input('User.name');
			echo $this->Form->input('User.email');
			//echo $this->Form->input('User.password');
			echo $this->Form->input('Setting.css');
			echo $this->Form->input('Setting.js');
			echo $this->Form->input('Setting.google_analytics');
			
		?>
		</fieldset>	
		<footer>
			<?php echo $this->Form->submit(__('Change Settings'), array('div' => 'submit cancel')); ?>
		</footer>
	<?php echo $this->Form->end(); ?>
</article>