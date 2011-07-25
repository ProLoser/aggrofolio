<header>
	<hgroup><h1><?php __('Admin Edit Project'); ?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Project.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Attach Media Item', true), array('controller' => 'media_items', 'action' => 'add', 'project' => $project['Project']['id']), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
	</ul>
</header>
<article class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('description');
		echo $this->Form->input('hash_tag');
		echo $this->Form->input('cvs_url');
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