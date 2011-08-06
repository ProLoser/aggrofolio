<?php $this->set('title_for_layout', $post['Post']['subject']); ?>
<?php $this->Plate->start('nav')?>
<h3>Admin</h3>
<ul>
	<li><?php echo $this->Html->link('Edit Post', array('admin' => true, 'action' => 'edit', $post['Post']['id'])); ?></li>
</ul>
<?php $this->Plate->stop()?>
<header>
	<h2 class="blog"><?php echo $post['Post']['subject']; ?></h2>
	<?php echo $this->Html->time($post['Post']['created'], array('pubdate' => true, 'format' => 'nice'))?>
</header>
<article class="posts view">
	<?php echo $post['Post']['body']; ?>
</article>
<?php echo $this->element('comments', array('comments' => $post['Comment'], 'id' => $post['Post']['id']))?>