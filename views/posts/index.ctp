<header>
	<h2><?php __('Blog');?></h2>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>	
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?><?php echo $this->Paginator->sort('Category', 'post_category_id');?>
	</p>
</header>
<div class="posts index">	
	<?php foreach ($posts as $post):?>
	<article<?php if (!empty($post['PostCategory'])) echo " class='cat-{$post['PostCategory']['id']}'";?>>
		<header>
			<h1><?php echo $this->Html->link($post['Post']['subject'], array('action' => 'view', $post['Post']['id'], $post['Post']['slug'])); ?></h1>
			<time><?php echo $this->Time->nice($post['Post']['created']); ?></time>
		</header>	
		<?php 
			$pos = strpos($post['Post']['body'], '<hr>');
			if ($pos === false) {
				echo $post['Post']['body'];
			} else {
				echo substr($post['Post']['body'], 0, $pos);
				echo "<footer>\n";
				echo $this->Html->link('Read More...', array('controller' => 'posts', 'action' => 'view', $post['Post']['id'], $post['Post']['slug']), array('class' => 'readon'));
				echo "</footer>\n";
			}
		?>
	</article>
<?php endforeach; ?>
</div>
<footer>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>	
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?><?php echo $this->Paginator->sort('Category', 'post_category_id');?>
	</p>
</footer>