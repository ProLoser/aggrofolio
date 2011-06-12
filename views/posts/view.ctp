<header>
	<h2 class="blog"><?php echo $post['Post']['subject']; ?></h2>
	<time><?php echo $this->Time->nice($post['Post']['created']); ?></time>
</header>
<article class="posts view">
	<?php echo $post['Post']['body']; ?>
</article>
<?php echo $this->element('comments', array('comments' => $post['Comment'], 'id' => $post['Post']['id']))?>