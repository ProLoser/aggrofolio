<section id="comments">
	<h1>Comments</h1>
	<?php if (!empty($comments)): ?>
		<ol>
		<?php foreach ($comments as $comment): ?>
			<li>
				<header>
					<time><?php echo $this->Time->nice($comment['created'])?></time>
					<h2><?php echo (empty($comment['website'])) ? $comment['name'] : $this->Html->link($comment['name'], $comment['website'])?>: <?php echo $comment['subject']?></h2>
				</header>
				<?php echo $comment['body']?>
			</li>		
		<?php endforeach ?>
		</ol>
	<?php endif; ?>	
	<?php echo $this->Form->create('Comment', array('action' => 'add'))?>
	<script>
	$(document).ready(function(){
		$('form fieldset').append('<?php echo $this->Form->input('human', array('type' => 'checkbox', 'label' => 'Are You Human?'));?>');
	});
	</script>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('website');
		echo $this->Form->input('subject');
		echo $this->Form->input('body');
		echo $this->Form->input('foreign_model', array('type' => 'hidden', 'value' => Inflector::classify($this->params['controller'])));
		echo $this->Form->input('foreign_key', array('type' => 'hidden', 'value' => $id));
	?>
	</fieldset>
	<?php echo $this->Form->end('Submit')?>
</section>