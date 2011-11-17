<article class="mediaItems form">
	<header>
		<h3><?php echo __('Admin Edit Media Item'); ?></h3>
		<ul class="actions">
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('MediaItem.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('MediaItem.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Media Items'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		</ul>
	</header>
<?php echo $this->Form->create('MediaItem', array('type' => 'file'));?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('url');
		echo $this->Form->input('source');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Form->input('uuid');
		echo $this->Form->input('album_id', array('empty' => '-- Select One --'));
		echo $this->Form->input('project_id', array('empty' => '-- None --'));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit()?>
	</footer>
<?php echo $this->Form->end();?>
</article>