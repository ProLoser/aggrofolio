<h2><?php __('Blog');?></h2>
<div class="posts index">	
	<div class="paging">
		<?php echo $this->Paginator->prev();?> |
	 	<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next();?>
		<p>
			Sort By <?php echo $this->Paginator->sort('created');?> |
			<?php echo $this->Paginator->sort('subject');?>
		</p>
	</div>
	<?php foreach ($posts as $post):?>
	<article<?php if (!empty($post['PostCategory'])) echo " class='cat-{$post['PostCategory']['id']}'";?>>
		<header>
			<h1><?php echo $this->Html->link($post['Post']['subject'], array('action' => 'view', $post['Post']['id'], $post['Post']['slug'])); ?></h1>
			<time><?php echo $this->Time->nice($post['Post']['created']); ?></time>
		</header>
		<?php echo $post['Post']['body']; ?>
	</article>
<?php endforeach; ?>
	<div class="paging">
		<?php echo $this->Paginator->prev();?> |
	 	<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next();?>
		<p>
			Sort By <?php echo $this->Paginator->sort('created');?> |
			<?php echo $this->Paginator->sort('subject');?>
		</p>
	</div>
</div>