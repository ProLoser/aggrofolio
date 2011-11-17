<header>
	<h2>Add Comment</h2>
	<p class="sorting"><?php echo $this->Html->link('Return To Post', array('controller' => Inflector::pluralize($this->request->data['Comment']['foreign_model']), 'action' => 'view', $this->request->data['Comment']['foreign_key'])); ?></p>
</header>
<article>
	<section id="comments">
		<?php echo $this->Form->create('Comment')?>
	<?php $this->Html->scriptStart(array('inline' => false)); ?>
		$(document).ready(function(){
			$('form fieldset').append('<?php echo $this->Form->input('human', array('type' => 'checkbox', 'label' => 'Please fill the void'));?>');
		});
	<?php $this->Html->scriptEnd(); ?>
		<fieldset>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('email');
			echo $this->Form->input('website');
			echo $this->Form->input('subject');
			echo $this->Form->input('body');
			echo $this->Form->input('foreign_model', array('type' => 'hidden'));
			echo $this->Form->input('foreign_key', array('type' => 'hidden'));
			echo $this->Form->hidden('inhuman');
		?>
		</fieldset>
		<?php echo $this->Form->end('Submit')?>
	</section>
</article>
