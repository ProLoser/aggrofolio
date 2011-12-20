<header>
	<hgroup><h1>Add Project</h1></hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Categories'), array('controller' => 'project_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Category'), array('controller' => 'project_categories', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('url');		
		echo $this->Form->input('description');
		echo $this->Form->input('hash_tag');
		echo $this->Form->input('cvs_url');
		echo $this->Form->input('bugs_url');
		echo $this->Form->input('project_category_id', array('empty' => '-- None --'));
		echo $this->Form->input('published');
		echo $this->Form->input('account_id', array('empty' => '-- None --'));
		echo $this->Form->input('owner');
		echo $this->Form->input('resume_employer_id', array('empty' => '-- None --'));
		echo $this->Form->input('resume_school_id', array('empty' => '-- None --'));
	?>
	</fieldset>
	<footer>
		<?php echo $this->Form->submit('Submit'); ?>
	</footer>
<?php echo $this->Form->end();?>
</article>