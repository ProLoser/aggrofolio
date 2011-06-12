<?php $this->Plate->start('nav')?>
<nav id="filters">
	<h3>Filters</h3>
	<ul>
		<li><?php echo $this->Html->link('Blogs Posts', array('controller' => 'posts', 'action' => 'index'), array('id' => 'type-Post')); ?></li>
		<li><?php echo $this->Html->link('Gallery', array('controller' => 'albums', 'action' => 'index'), array('id' => 'type-Album')); ?></li>
		<li><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index'), array('id' => 'type-Project')); ?></li>
	</ul>
	<a href="#" class="reset">Reset</a>
</nav>
<?php $this->Plate->stop()?>
<style>
ul.log {
	list-style: none;
	margin: 0;
}
ul.log > li {
	margin: 25px 0;
}
.posts article {
	margin: 10px 0 0;
}
.type-Project {
	overflow: hidden;
	margin: 0;
}
.type-Album section, .type-Project section {
	overflow: auto;
	margin: -10px -40px 0 -38px;
}
.type-Project section {
	margin: 0;
}
.type-Album ul, .type-Project ul {
	padding: 0 40px;
	white-space: nowrap;
	margin: 0;
}
.type-Project ul {
	padding: 0;
}
.type-Album li, .type-Project li {
	padding: 0;
	margin: 0 2px;
	display: inline-block;
}
.type-MediaItem section {
	margin-top: -10px;
}
.type-Album header time {
	margin-top: -42px;
}
.type-Album li a img, .type-MediaItem a img, .type-Project li a img {
	border: 3px solid #000;
	padding: 5px;
	background: #fff;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
     -moz-box-shadow: 0px 0px 5px rgba(0,0,0,.5);
  -webkit-box-shadow: 0px 0px 5px rgba(0,0,0,.5);
          box-shadow: 0px 0px 5px rgba(0,0,0,.5);
	height: 176px;
}
article.half section {
	float: right;
	margin: -20px 0 0 5px;
}
</style>
<header>
	<h2 class="log"><?php __('Activity Feed'); ?></h2>
</header>
<ul class="log posts">
<?php foreach ($logs as $log) : ?>
	<li class="type-<?php echo $log['Log']['model']?>">
	<?php switch ($log['Log']['model']) :
		case 'Post': ?>
		<article>
			<header>
				<h1><?php echo $this->Html->link($log['Post']['subject'], array('action' => 'view', $log['Post']['id'], $log['Post']['slug'])); ?></h1>
				<time><?php echo $actions[$log['Log']['action']] . ' ' . $this->Time->nice($log['Post']['created']); ?></time>
			</header>	
			<?php 
				$pos = strpos($log['Post']['body'], '<hr>');
				if ($pos === false) {
					echo $log['Post']['body'];
				} else {
					echo substr($log['Post']['body'], 0, $pos);
					echo $this->Html->tag('footer', $this->Html->link('Read More...', array('controller' => 'posts', 'action' => 'view', $log['Post']['id'], $log['Post']['slug']), array('class' => 'readon')));
				}
			?>
		</article>
	<?php break; case 'MediaItem': if ($log['MediaItem']['published']):?>
		<?php if (!empty($log['MediaItem']['name'])): ?>
			<h3><?php echo $log['MediaItem']['name']?></h3>
		<?php endif; ?>
		<section class="media">
		<?php
			echo $this->Html->link(
				$this->Html->image('/uploads/thumb-' . $log['MediaItem']['attachment_file_name'], array('alt' => $log['MediaItem']['name'])), 
				'/uploads/original-' . $log['MediaItem']['attachment_file_name'], 
				array('escape' => false, 'title' => $log['MediaItem']['name'])
			);
		?>
		</section>
	<?php endif; break; case 'Album': if ($log['Album']['published']):?>
		<header>
			<h3>
				<?php echo $log['Album']['name']?>
				Album <?php echo $actions[$log['Log']['action']]?>
				<?php echo $this->Html->link('»', array('controller' => 'albums', 'action' => 'view', $log['Album']['id'])); ?>
			</h3>
			<time><?php echo $actions[$log['Log']['action']] . ' ' . $this->Time->nice($log['Post']['created']); ?></time>
		</header>
		<section>
			<ul class="media">
			<?php foreach ($log['Album']['MediaItem'] as $item): ?>
				<li>
				<?php
					echo $this->Html->link(
						$this->Html->image('/uploads/thumb-' . $item['attachment_file_name'], array('alt' => $item['name'])), 
						'/uploads/original-' . $item['attachment_file_name'], 
						array('escape' => false, 'rel' => 'album-' . $log['Album']['id'], 'title' => $item['name'])
					);
				?>
				</li>
			<?php endforeach ?>
			</ul>
		</section>
	<?php endif; break; case 'Project': if ($log['Project']['published']):?>
		<article<?php if (count($log['Project']['MediaItem']) === 1) echo ' class="half"'?>>
			<?php if (!empty($log['Project']['MediaItem'])): ?>
				<?php $this->Plate->start()?>
					<section>
						<ul class="media">
						<?php foreach ($log['Project']['MediaItem'] as $item): ?>
							<li>
							<?php
								echo $this->Html->link(
									$this->Html->image('/uploads/thumb-' . $item['attachment_file_name'], array('alt' => $item['name'])), 
									'/uploads/original-' . $item['attachment_file_name'], 
									array('escape' => false, 'rel' => 'project-' . $log['Project']['id'], 'title' => $item['name'])
								);
							?>
							</li>
						<?php endforeach ?>
						</ul>
					</section>
				<?php $items = $this->Plate->stop()?>
			<?php endif; ?>
			<?php if (!empty($items) && count($log['Project']['MediaItem']) == 1) echo $items ?>
			<header>
				<h1><?php echo $this->Html->link($log['Project']['name'], array('action' => 'view', $log['Project']['id'], Inflector::slug($log['Project']['name']))); ?></h1>
				<time><?php echo $actions[$log['Log']['action']] . ' ' . $this->Time->nice($log['Project']['created']); ?></time>
			</header>	
			<?php echo $log['Project']['description']; ?>
			<?php if (!empty($items) && count($log['Project']['MediaItem']) > 1) echo $items ?>
		</article>
	<?php endif; endswitch; ?>
	</li>
<?php endforeach; ?>
</ul>