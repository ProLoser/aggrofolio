<header>
	<hgroup>
		<h1>Edit Post</h1>
	</hgroup>
	<ul>
		<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Post.id'))); ?></li>
		<li><?php echo $this->Html->link(__('View Post'), array('action' => 'view', $this->Form->value('Post.id')));?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index'));?></li>
	</ul>
</header>
<article class="posts form">
<?php echo $this->Form->create('Post');?>
	<header>
		<ul>
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Post.id'))); ?></li>
			<li><a href="#" class="add-related">Add Related</a></li>
		</ul>
		<?php echo $this->Form->submit('Save'); ?>
	</header>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('Post.subject');
		echo $this->Form->input('Post.slug');
		echo $this->Form->input('Post.body');
		echo $this->Form->input('Post.published');
		echo $this->Form->input('Post.post_category_id', array('empty' => '-- None --'));
	?>
	</fieldset>
	<fieldset>
		<h3>Relationship Tags</h3>
		<?php if (!empty($this->request->data['PostRelationship'])): ?>
		<ul>
			<?php foreach ($this->request->data['PostRelationship'] as $relationship): ?>
			<li>
				<?php echo $this->Html->link('[Delete]', array('action' => 'delete_related', $relationship['id'], $this->Form->value('Post.id'))); ?>
				<strong><?php echo $relationship['foreign_model']; ?></strong>
				<?php echo $relationship['title']; ?>
			</li>
			<?php endforeach ?>
		</ul>
		<?php endif ?>
		<?php echo $this->element('related'); ?>
	</fieldset>
	<footer>
		<ul>
			<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Post.id'))); ?></li>
			<li><a href="#" class="add-related">Add Related</a></li>
		</ul>
		<?php echo $this->Form->submit('Save'); ?>
	</footer>
<?php echo $this->Form->end();?>
</article>