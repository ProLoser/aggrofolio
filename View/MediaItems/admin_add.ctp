<header>
	<hgroup>
		<h1><?php echo __('Admin Add Media Item'); ?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('List Media Items'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="mediaItems form">
<?php echo $this->Form->create('MediaItem', array('type' => 'file'));?>
	<fieldset><?php
		echo $this->Form->input('name');
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('url');
		echo $this->Form->input('source');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Form->input('uuid');
		echo $this->Form->input('album_id', array('empty' => '-- Select One --'));
		echo $this->Form->input('project_id', array('empty' => '-- None --'));
	?></fieldset>
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
	</footer>
<?php echo $this->Form->end();?>
</article>