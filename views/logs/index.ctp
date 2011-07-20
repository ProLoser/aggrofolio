<?php echo $this->Html->meta('rss', '/.rss', array('inline' => false));?>
<?php echo $this->Html->css(array('logs', '/js/mylibs/jscrollpane/jquery.jscrollpane'), null, array('inline' => false)); ?>
<?php echo $this->Html->script(array('mylibs/jscrollpane/mwheelIntent', 'mylibs/jscrollpane/jquery.jscrollpane.min', 'logs'), array('inline' => false)); ?>
<header>
	<h2 class="log"><?php __('Activity Feed'); ?></h2>
	<?php if (isset($paginate)): ?>
		<p class="paging">
			<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
		</p>
		<p class="sorting">
			<span>Sort by:</span>
			<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?><?php echo $this->Paginator->sort('Section', 'model');?>
		</p>
	<?php endif; ?>
</header>
<ul class="log posts">
<?php foreach ($logs as $log) : ?>
	<li class="type-<?php echo $log['Log']['model']?>">
	<?php switch ($log['Log']['model']) :
		case 'Post': ?>
		<article>
			<header>
				<h1><?php echo $this->Html->link($log['Post']['subject'], array('controller' => 'posts', 'action' => 'view', $log['Post']['id'], $log['Post']['slug'])); ?></h1>
				<time><?php echo $actions[$log['Log']['action']] . ' ' . $this->Time->nice($log['Post']['created']); ?></time>
			</header>	
			<?php echo $this->Agro->truncate($log['Post']['body'], array('controller' => 'posts', 'action' => 'view', $log['Post']['id'], $log['Post']['slug'])); ?>
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
	<?php endif; break; case 'Album': if ($log['Album']['published'] && !empty($log['Album']['MediaItem'])):?>
		<header>
			<h3>
				<?php echo $log['Album']['name']?>
				Album <?php echo $actions[$log['Log']['action']]?>
				<?php echo $this->Html->link('»', array('controller' => 'media_items', 'action' => 'album', $log['Album']['id'])); ?>
			</h3>
			<time><?php echo $actions[$log['Log']['action']] . ' ' . $this->Time->nice($log['Log']['created']); ?></time>
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
	<?php endif; break; case 'Resume': if ($log['Resume']['published']):?>
		<article>
			<header>
				<h1><?php echo $this->Html->link($log['Resume']['purpose'] . ' Resume', array('controller' => 'resumes', 'action' => 'view', $log['Log']['model_id'])); ?></h1>
				<time><?php echo $actions[$log['Log']['action']] . ' ' . $this->Time->nice($log['Log']['created']); ?></time>
			</header>	
			<p><?php echo $log['Resume']['summary']; ?></p>
		</article>
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
				<h1><?php echo $this->Html->link($log['Project']['name'], array('controller' => 'projects', 'action' => 'view', $log['Log']['model_id'], Inflector::slug($log['Project']['name']))); ?></h1>
				<time><?php echo $actions[$log['Log']['action']] . ' ' . $this->Time->nice($log['Log']['created']); ?></time>
			</header>
			<?php echo $this->Agro->truncate($log['Project']['description'], array('controller' => 'projects', 'action' => 'view', $log['Project']['id'], Inflector::slug($log['Project']['name'])))?>
			<?php if (!empty($items) && count($log['Project']['MediaItem']) > 1) echo $items ?>
		</article>
	<?php endif; endswitch; ?>
	</li>
<?php endforeach; ?>
</ul>