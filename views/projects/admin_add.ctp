<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('hash_tag');
		echo $this->Form->input('cvs_url');
		echo $this->Form->input('project_category_id');
		echo $this->Form->input('published');
		echo $this->Form->input('deleted');
		echo $this->Form->input('account_id');
		echo $this->Form->input('owner');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Categories', true), array('controller' => 'project_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Category', true), array('controller' => 'project_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>