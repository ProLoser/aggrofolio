<header>
	<hgroup><h1><?php echo __('Edit Project'); ?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $this->data['Project']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Project.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Attach Media Item'), array('controller' => 'media_items', 'action' => 'add', 'project' => $this->request->data['Project']['id']), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index'));?></li>
	</ul>
</header>
<article class="projects form">
<?php echo $this->Form->create('Project');?>	
	<header>
		<ul>
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Project.id'))); ?></li>
		</ul>
		<?php echo $this->Form->submit('Save'); ?>
	</header>
	<fieldset>
	<?php
		echo $this->Form->input('id');
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
		<ul>
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Project.id'))); ?></li>
		</ul>
		<?php echo $this->Form->submit('Save'); ?>
	</footer>
<?php echo $this->Form->end();?>
</article>