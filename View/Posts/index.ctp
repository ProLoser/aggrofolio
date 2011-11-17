<header>
	<h2 class="blog"><?php echo __('Blog');?></h2>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>	
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?><?php echo $this->Paginator->sort('post_category_id', 'Category');?>
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
			$post['Post']['body'] = str_replace('/original-', '/thumb-', $post['Post']['body']);
			echo $this->Agro->truncate($post['Post']['body'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'], $post['Post']['slug']));
		?>
	</article>
<?php endforeach; ?>
</div>