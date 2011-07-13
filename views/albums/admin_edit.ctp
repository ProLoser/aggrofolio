<header>
	<hgroup><h1><?php __('Edit Album'); ?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Album.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Album.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Media Categories', true), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Category', true), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Items', true), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Item', true), array('controller' => 'media_items', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="albums form">
<?php echo $this->Form->create('Album');?>
	<fieldset>
		<?php
			echo $this->Form->input('id');
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
<?php echo $this->Form->end(__('Submit', true));?>
</article>