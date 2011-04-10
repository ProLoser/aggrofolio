<h2><?php __('Add Album'); ?></h2>
<ul class="actions">
	<li><?php echo $this->Html->link(__('List Albums', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Categories', true), array('controller' => 'media_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Category', true), array('controller' => 'media_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Items', true), array('controller' => 'media_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Item', true), array('controller' => 'media_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Employers', true), array('controller' => 'resume_employers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Employer', true), array('controller' => 'resume_employers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Schools', true), array('controller' => 'resume_schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume School', true), array('controller' => 'resume_schools', 'action' => 'add')); ?> </li>
</ul>
<div class="albums form">
<?php echo $this->Form->create('Album');?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('url');
		echo $this->Form->input('published');
		echo $this->Form->input('media_category_id');
		echo $this->Form->input('uuid');
		echo $this->Form->input('account_id');
		echo $this->Form->input('ResumeEmployer');
		echo $this->Form->input('ResumeSchool');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>