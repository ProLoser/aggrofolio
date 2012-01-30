<h1>New Comment at <a href="deansofer.com">DeanSofer.com</a>!</h1>
<h3>
	Post: 
	<?php echo $this->Html->link(
		$related[$comment['Comment']['foreign_model']]['subject'], 
		array('controller' => 'posts', 'action' => 'view', $related[$comment['Comment']['foreign_model']]['id'], $related[$comment['Comment']['foreign_model']]['slug'])
	)?>
</h3>
<p><strong>Commentor:</strong> <?php echo $this->Html->link($comment['Comment']['name'], 'mailto:'.$comment['Comment']['email']); ?></p>
<p><strong>Website:</strong> <?php echo $this->Html->link($comment['Comment']['website'], $comment['Comment']['website']); ?></p>
<pre style="font-family:sans-serif;"><?php echo $comment['Comment']['body']; ?></pre>