<header>
	<hgroup>
		<h1><?php echo __('Admin Add Post Category'); ?></h1>
	</hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('List Post Categories'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="postCategories form">
<?php echo $this->Form->create('PostCategory');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array('empty' => '-- None --'));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
	</footer>
<?php echo $this->Form->end();?>
</article>