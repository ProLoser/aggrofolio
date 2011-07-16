<header>
	<h2 class="blog"><?php echo $post['Post']['subject']; ?></h2>
	<?php echo $this->Html->time($post['Post']['created'], array('pubdate' => true, 'format' => 'nice'))?>
</header>
<article class="posts view">
	<?php echo $post['Post']['body']; ?>
</article>
<?php echo $this->element('comments', array('comments' => $post['Comment'], 'id' => $post['Post']['id']))?>