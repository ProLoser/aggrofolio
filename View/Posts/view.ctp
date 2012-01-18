<?php $this->set('title_for_layout', $post['Post']['subject']);?>
<header>
	<h2 class="blog"><?php echo $post['Post']['subject']; ?></h2>
	<?php if ($this->Session->read('Auth.User')):?>
	<p class="sorting">
		<span>Admin:</span>
		<?php 
		echo $this->Html->link('Edit Post', array('admin' => true, 'action' => 'edit', $post['Post']['id']));
		?>
	</p>
	<?php endif;?>
	<?php echo $this->Html->time($post['Post']['created'], array('pubdate' => true, 'format' => 'nice'))?>
</header>
<article class="posts view">
	<?php echo $post['Post']['body']; ?>
</article>
<?php echo $this->element('comments', array('comments' => $post['Comment'], 'id' => $post['Post']['id']))?>