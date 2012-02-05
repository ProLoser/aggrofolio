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

<?php if ($post['PostRelationship']): ?>
	<section id="related" class="clearfix<?php if (!empty($project['PostRelationship']) && !empty($project['commits'])) echo ' half'?>">
		<h3>Related</h3>
		<?php foreach ($post['PostRelationship'] as $related): ?>
			<?php switch($related['foreign_model']):
				case 'Project':?>
				<?php if (!isset($firstProject)):?>
					<section class="posts">
					<h2>Projects</h2>
				<?php endif; ?>
				<article>
					<header>
						<h1><?php echo $this->Html->link($related['Project']['name'], array('controller' => 'projects', 'action' => 'view', $related['Project']['id'], Inflector::slug($related['Project']['name'])))?></h1>
						<?php echo $this->Html->time($related['Project']['created'], array('format' => 'timeAgoInWords'))?>
					</header>
					<?php echo $this->Agro->truncate($related['Project']['description'], array('controller' => 'projects', 'action' => 'view', $related['Project']['id'], Inflector::slug($related['Project']['name']))); ?>
				</article>
				<?php if (!isset($firstProject)): $firstProject = true;?>
					</section>
				<?php endif; ?>
			<?php break; case 'Album':?>
			<?php break; case 'MediaItem':?>
			<?php break; case 'Bookmark':?>
				<?php if (!isset($firstBookmark)):?>
					<section class="posts">
					<h2>Bookmarks</h2>
				<?php endif; ?>
				<article>
					<header>
						<h1><?php echo $this->Html->link($related['Bookmark']['name'], $related['Project']['url'])?></h1>
						<?php echo $this->Html->time($related['Bookmark']['created'], array('format' => 'timeAgoInWords'))?>
					</header>
					<?php echo $related['Bookmark']['description']; ?>
				</article>
				<?php if (!isset($firstBookmark)): $firstBookmark = true;?>
					</section>
				<?php endif; ?>
			<?php break; case 'Resume':?>
			<?php break; case 'ResumeEmployer':?>
			<?php break; case 'ResumeSchool':?>
			<?php endswitch;?>
		<?php endforeach ?>
	</section>
<?php endif; ?>

<?php echo $this->element('comments', array('comments' => $post['Comment'], 'id' => $post['Post']['id']))?>