
<header>
	<hgroup>
		<h1><?php echo __('Admin Edit Contact'); ?></h1>
	</hgroup>
	<ul>
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Contact.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Contact.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subject');
		echo $this->Form->input('message');
		echo $this->Form->input('email');
		echo $this->Form->input('name');
		echo $this->Form->input('phone');
		echo $this->Form->input('user_id', array('empty' => __('-- Select One --')));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit();?>
	</footer>
<?php echo $this->Form->end();?>
</article>