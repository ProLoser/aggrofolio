<?php echo $this->Html->meta('rss', '/.rss', array('inline' => false));?>
<?php echo $this->Html->css(array('activities', '/js/mylibs/jscrollpane/jquery.jscrollpane'), null, array('inline' => false)); ?>
<?php echo $this->Html->script(array('mylibs/jscrollpane/mwheelIntent', 'mylibs/jscrollpane/jquery.jscrollpane.min'), array('inline' => false)); ?>
<header><hgroup>
	<h2 class="activity"><?php echo __('Activity Feed'); ?></h2>
	<?php if (isset($paginate)): ?>
		<p class="paging">
			<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
		</p>
		<p class="sorting">
			<span>Sort by:</span>
			<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?><?php echo $this->Paginator->sort('Section', 'model');?>
		</p>
	<?php endif; ?>
	<?php if ($this->Session->read('Auth.User')):?>
	<p class="sorting">
		<span>Create New:</span>
		<?php 
		echo $this->Html->link('Post', array('admin' => true, 'controller' => 'posts', 'action' => 'add'));
		echo $this->Html->link('Media Item', array('admin' => true, 'controller' => 'media_items', 'action' => 'add'));
		echo $this->Html->link('Bookmark', array('admin' => true, 'controller' => 'bookmarks', 'action' => 'add'));
		echo $this->Html->link('Project', array('admin' => true, 'controller' => 'projects', 'action' => 'add')); 
		?>
	</p>
	<?php endif;?>
</hgroup></header>
<ul class="activity posts">
<?php 
foreach ($activities as $activity): 
	if (
		( !isset($activity[$activity['Activity']['model']]['published']) || $activity[$activity['Activity']['model']]['published'] )
		&&
		( $activity['Activity']['model'] !== 'Album' || !empty($activity['Album']['MediaItem']) )
	):
?>
	<li class="type-<?php echo $activity['Activity']['model']?>">
	<?php switch ($activity['Activity']['model']) :
		case 'Post': ?>
		<article>
			<header>
				<h1><?php echo $this->Html->link($activity['Post']['subject'], array('controller' => 'posts', 'action' => 'view', $activity['Post']['id'], $activity['Post']['slug'])); ?></h1>
				<time><?php echo $actions[$activity['Activity']['action']] . ' ' . $this->Time->nice($activity['Post']['created']); ?></time>
				<?php if (!empty($activity['Post']['PostCategory']['name'])): ?>				  	 
					<h2><?php echo $activity['Post']['PostCategory']['name']?></h2>
				<?php endif; ?>
			</header>	
			<?php 
				$activity['Post']['body'] = str_replace('/original-', '/thumb-', $activity['Post']['body']);
				echo $this->Agro->truncate($activity['Post']['body'], array('controller' => 'posts', 'action' => 'view', $activity['Post']['id'], $activity['Post']['slug'])); 
			?>
		</article>
	<?php break; case 'Bookmark':?>
		<article>
			<header>
				<h1>Bookmark: <?php echo $this->Html->link($activity['Bookmark']['name'], $activity['Bookmark']['url'])?></h1>
				<time><?php echo $actions[$activity['Activity']['action']] . ' ' . $this->Time->nice($activity['Bookmark']['created']); ?></time>
				<?php if (!empty($activity['Bookmark']['BookmarkCategory']['name'])): ?>				  	 
					<h2><?php echo $activity['Bookmark']['BookmarkCategory']['name']?></h2>
				<?php endif; ?>
			</header>
			<p><?php echo $activity['Bookmark']['description']?></p>
		</article>
	<?php break; case 'MediaItem': ?>
		<?php if (!empty($activity['MediaItem']['name'])): ?>
			<h3><?php echo $activity['MediaItem']['name']?></h3>
		<?php endif; ?>
		<section class="media">
		<?php
			echo $this->Html->link(
				$this->Html->image('/uploads/media/thumb-' . $activity['MediaItem']['attachment_file_name'], array('alt' => $activity['MediaItem']['name'])), 
				'/uploads/media/original-' . $activity['MediaItem']['attachment_file_name'], 
				array('escape' => false, 'title' => $activity['MediaItem']['name'])
			);
		?>
		</section>
	<?php break; case 'Album': ?>
		<header>
			<h3><?php echo $this->Html->link($activity['Album']['name'], array('controller' => 'media_items', 'action' => 'album', $activity['Album']['id'], Inflector::slug($activity['Album']['name'], '-'))); ?></h3>
			<time><?php echo $actions[$activity['Activity']['action']] . ' ' . $this->Time->nice($activity['Activity']['created']); ?></time>
		</header>
		<section>
			<ul class="media">
			<?php foreach ($activity['Album']['MediaItem'] as $item): ?>
				<li>
				<?php
					echo $this->Html->link(
						$this->Html->image('/uploads/media/thumb-' . $item['MediaItem']['attachment_file_name'], array('alt' => $item['MediaItem']['name'])), 
						'/uploads/media/original-' . $item['MediaItem']['attachment_file_name'], 
						array('escape' => false, 'rel' => 'album-' . $activity['Album']['id'], 'title' => $item['MediaItem']['name'])

					);
				?>
				</li>
			<?php endforeach ?>
			</ul>
		</section>
	<?php break; case 'Resume': ?>
		<article>
			<header>
				<h1><?php echo $this->Html->link($activity['Resume']['purpose'] . ' Resume', array('controller' => 'resumes', 'action' => 'view', $activity['Activity']['model_id'])); ?></h1>
				<time><?php echo $actions[$activity['Activity']['action']] . ' ' . $this->Time->nice($activity['Activity']['created']); ?></time>
			</header>	
			<p><?php echo $activity['Resume']['summary']; ?></p>
		</article>
	<?php break; case 'Project':?>
		<article<?php if (count($activity['Project']['MediaItem']) === 1) echo ' class="half"'?>>
			<?php debug($activity)?>
			<?php if (!empty($activity['Project']['MediaItem'])): ?>
				<?php $this->Plate->start()?>
					<section>
						<ul class="media">
						<?php foreach ($activity['Project']['MediaItem'] as $item): ?>
							<li>
							<?php
								echo $this->Html->link(
									$this->Html->image('/uploads/media/thumb-' . $item['MediaItem']['attachment_file_name'], array('alt' => $item['MediaItem']['name'])), 
									'/uploads/media/original-' . $item['MediaItem']['attachment_file_name'], 
									array('escape' => false, 'rel' => 'project-' . $activity['Project']['id'], 'title' => $item['MediaItem']['name'])
								);
							?>
							</li>
						<?php endforeach ?>
						</ul>
					</section>
				<?php $items = $this->Plate->stop()?>
			<?php endif; ?>
			<?php if (!empty($items) && count($activity['Project']['MediaItem']) == 1) echo $items ?>
			<header>
				<h1><?php echo $this->Html->link($activity['Project']['name'], array('controller' => 'projects', 'action' => 'view', $activity['Activity']['model_id'], Inflector::slug($activity['Project']['name'], '-'))); ?></h1>
				<time><?php echo $actions[$activity['Activity']['action']] . ' ' . $this->Time->nice($activity['Activity']['created']); ?></time>
				<?php if (!empty($activity['Project']['ProjectCategory']['name'])): ?>				  	 
					<h2><?php echo $activity['Project']['ProjectCategory']['name']?></h2>
				<?php endif; ?>
			</header>
			<?php echo $this->Agro->truncate($activity['Project']['description'], array('controller' => 'projects', 'action' => 'view', $activity['Project']['id'], Inflector::slug($activity['Project']['name'], '-')))?>
			<?php if (!empty($items) && count($activity['Project']['MediaItem']) > 1) echo $items ?>
		</article>
	<?php endswitch; ?>
	</li>
<?php endif; endforeach; ?>
</ul>
