<header>
	<hgroup>
		<h1><?php echo __('Batch Add Media Items'); ?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('List Media Items'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="mediaItems form">
<?php echo $this->Form->create('MediaItem', array('type' => 'file'));?>
	<fieldset>
		<legend>General Settings</legend>
	<?php
	echo $this->Form->input("MediaItem.published");
	echo $this->Form->input("MediaItem.album_id", array('empty' => '-- Select One --'));
	echo $this->Form->input("MediaItem.project_id", array('empty' => '-- None --'));
	?></fieldset>
	<?php for($i = 0; $i < $count; $i++): ?>
	<fieldset>
		<legend>Item <?php echo $i + 1;?></legend>
	<?php
		echo $this->Form->input("MediaItem.$i.name");
		echo $this->Form->input("MediaItem.$i.attachment", array('type' => 'file'));
	?></fieldset>	
	<?php endfor; ?>
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
	</footer>
<?php echo $this->Form->end();?>
</article>