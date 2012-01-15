<header>
	<hgroup><h1>My Settings</h1></hgroup>
</header>
<article class="settings form">
	<header>
		<h3><?php echo __('Site Settings'); $this->set('title_for_layout', __('Site Settings')); ?></h3>
	</header>
	<?php echo $this->Form->create('Setting'); ?>
		<fieldset>
			<?php foreach($this->request->data as $key => &$setting) : ?>
				<?php echo $this->Form->input("Setting." . $setting['Setting']['id'] . ".id", array('value' => $setting['Setting']['id'])); ?>
				<?php $params = array('label' => $setting['Setting']['title'], 'type' => $setting['Setting']['input_type'], 'value' => $setting['Setting']['value']); ?>
				<?php if (isset($selects[$setting['Setting']['key']])) : ?>
					<?php $params = array_merge(array('options' => $selects[$setting['Setting']['key']]), $params); ?>
				<?php endif; ?>
				<?php echo $this->Form->input("Setting." . $setting['Setting']['id'] . ".value", $params); ?>
			<?php endforeach; ?>
		</fieldset>	
		<footer>
			<?php echo $this->Form->submit(__('Change Settings'), array('div' => 'submit cancel')); ?>
		</footer>
	<?php echo $this->Form->end(); ?>
</article>