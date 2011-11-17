<header>
	<hgroup><h1><?php echo __('Admin Add Album'); ?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('List Albums'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Media Categories'), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Category'), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Items'), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Item'), array('controller' => 'media_items', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="albums form">
<?php echo $this->Form->create('Album');?>
	<fieldset>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('description');
			echo $this->Form->input('url');
			echo $this->Form->input('published');
			echo $this->Form->input('media_category_id', array('empty' => '-- None --'));
			echo $this->Form->input('uuid');
			echo $this->Form->input('account_id', array('empty' => '-- None --'));
			echo $this->Form->input('project_id', array('empty' => '-- None --'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</article>