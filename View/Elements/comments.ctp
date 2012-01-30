<section id="comments">
	<h1>Comments</h1>
	<?php if (!empty($comments)): ?>
		<ul>
		<?php foreach ($comments as $comment): ?>
			<li>
				<header>
					<time><?php echo $this->Time->nice($comment['created'])?></time>
					<h2>
						<?php if ($this->Session->read('Auth.User')): ?>
							<?php echo $this->Html->link('[X]', array('admin' => true, 'controller' => 'comments', 'action' => 'delete', $comment['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete "%s"?'), $comment['subject'])); ?>
						<?php endif;?>
						<?php echo (empty($comment['website'])) ? $comment['name'] : $this->Html->link($comment['name'], $comment['website'])?>:
						<?php echo $comment['subject']?>
					</h2>
				</header>
				<?php echo $comment['body']?>
			</li>		
		<?php endforeach ?>
		</ul>
	<?php endif; ?>	
	<?php echo $this->Form->create('Comment', array('action' => 'add', 'inputDefaults' => array('label' => false, 'placeholder' => true)))?>
	<h2>Add New Comment</h2>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$(document).ready(function(){
		$('#CommentAddForm fieldset').append('<?php echo $this->Form->input('human', array('type' => 'checkbox', 'label' => 'Please fill the void'));?>');
	});
<?php $this->Html->scriptEnd(); ?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('website');
		echo $this->Form->input('subject');
		echo $this->Form->input('body');
		echo $this->Form->input('foreign_model', array('type' => 'hidden', 'value' => Inflector::classify($this->request->params['controller'])));
		echo $this->Form->input('foreign_key', array('type' => 'hidden', 'value' => $id));
		echo $this->Form->input('inhuman', array('type' => 'hidden'));
	?>
	</fieldset>
	<?php echo $this->Form->end('Submit')?>
</section>