<h2><?php echo $post['Post']['subject']; ?></h2>
<article class="posts view">
	<header>
		<time><?php echo $this->Time->nice($post['Post']['created']); ?></time>
	</header>
	<?php echo $post['Post']['body']; ?>
</article>
<?php echo $this->element('comments', array('comments' => $post['Comment'], 'id' => $post['Post']['id']))?>