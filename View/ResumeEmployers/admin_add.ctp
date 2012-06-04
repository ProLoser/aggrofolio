
<header>
	<hgroup>
		<h1><?php echo __('Admin Add Resume Employer'); ?></h1>
	</hgroup>
	<ul>
			<li><?php echo $this->Html->link(__('List Resume Employers'), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Relationships'), array('controller' => 'post_relationships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Relationship'), array('controller' => 'post_relationships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeEmployers form">
<?php echo $this->Form->create('ResumeEmployer');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('account_id', array('empty' => __('-- None --')));
		echo $this->Form->input('uuid');
		echo $this->Form->input('title');
		echo $this->Form->input('date_started');
		echo $this->Form->input('date_ended');
		echo $this->Form->input('currently_employed');
		echo $this->Form->input('published');
		echo $this->Form->input('deleted');
		echo $this->Form->input('summary');
		echo $this->Form->input('user_id', array('empty' => __('-- Select One --')));
		echo $this->Form->input('Resume');
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit();?>
	</footer>
<?php echo $this->Form->end();?>
</article>