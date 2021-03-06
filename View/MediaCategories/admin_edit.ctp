
<header>
	<hgroup>
		<h1><?php echo __('Admin Edit Media Category'); ?></h1>
	</hgroup>
	<ul>
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('MediaCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('MediaCategory.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Media Categories'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="mediaCategories form">
<?php echo $this->Form->create('MediaCategory');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => __('-- None --')));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit();?>
	</footer>
<?php echo $this->Form->end();?>
</article>