<h1>New Comment at <?php echo $this->Html->link($owner['Setting']['site_name'], $this->Html->url('/', true))?>!</h1>
<h3>
	Post: 
	<?php echo $this->Html->link(
		$related[$comment['Comment']['foreign_model']]['subject'], 
		$this->Html->url(array('controller' => 'posts', 'action' => 'view', $related[$comment['Comment']['foreign_model']]['id'], $related[$comment['Comment']['foreign_model']]['slug']), true)
	)?>
</h3>
<p><strong>Commentor:</strong> <?php echo $this->Html->link($comment['Comment']['name'], 'mailto:'.$comment['Comment']['email']); ?></p>
<?php if (!empty($comment['Comment']['website'])): ?>
	<p><strong>Website:</strong> <?php echo $this->Html->link($comment['Comment']['website'], $comment['Comment']['website']); ?></p>
<?php endif; ?>
<pre style="font-family:sans-serif;"><?php echo $comment['Comment']['body']; ?></pre>