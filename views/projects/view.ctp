<h2><?php  echo $project['Project']['name'];?></h2>
<?php if (!empty($project['MediaItem'])): ?>
<div id="radial_container" class="media">
	<ul class="list">
	<?php foreach ($project['MediaItem'] as $item): ?>
		<li class="item"><?php echo $this->Html->link($this->Html->image('/uploads/thumb-' . $item['attachment_file_name'], array('class' => 'my_class')), '/uploads/original-' . $item['attachment_file_name'], array('escape' => false, 'rel' => 'Project')) ?></li>
	<?php endforeach ?>	
	</ul>
	<a href="#" class="arrow" id="radright">Right</a>
	<a href="#" class="arrow" id="radleft">Left</a>
</div>
<?php endif; ?>

<div id="description"><p><?php echo $project['Project']['description']; ?></p></div>
<h3>Project Stats</h3>
<ul id="stats" class="clearfix">
<?php if (!empty($project['Project']['url'])): ?>
	<li class="url"><?php echo $this->Html->link($project['Project']['url'], $project['Project']['url'])?></li>
<?php endif; ?>
<?php if (!empty($project['Project']['cvs_url'])): ?>
	<li class="repo"><?php echo $this->Html->link($project['Project']['cvs_url'], $project['Project']['cvs_url']); ?></li>
<?php endif; ?>
<?php if (!empty($project['repository']['has_downloads'])): ?>
	<li class="downloads"><?php echo $this->Html->link(__('Downloads', true), $project['Project']['cvs_url'] . '/downloads'); ?> </li>
<?php endif ?>
<?php if (!empty($project['repository']['has_issues'])): ?>
	<li class="bugs"><?php echo $this->Html->link('Open Bugs: '.$project['repository']['open_issues'], $project['Project']['cvs_url'] . '/issues'); ?> </li>
<?php endif ?>
<?php if (!empty($project['repository']['has_wiki'])): ?>
	<li class="wiki"><?php echo $this->Html->link(__('Wiki', true), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
<?php endif ?>
<?php if (!empty($project['ProjectCategory']['name'])): ?>
	<li class="category"><?php echo $this->Html->link($project['ProjectCategory']['name'], array('controller' => 'projects', 'action' => 'index', 'category' => $project['ProjectCategory']['id'])); ?></li>		  	 
<?php endif; ?>
<?php if (!empty($project['ResumeEmployer']['name'])): ?>
	<li class="organization"><?php echo $project['ResumeEmployer']['name']?></li>
<?php endif; ?>	
<?php if (!empty($project['ResumeSchool']['name'])): ?>
	<li class="organization"><?php echo $project['ResumeSchool']['name']?></li>
<?php endif; ?>
	
<?php if (!empty($project['repository'])): ?>
	<li class="updated">Last Update: <?php echo $project['repository']['pushed_at']; ?></p>
	<li class="followers"><?php echo $this->Html->link('Followers: ' . $project['repository']['watchers'], $project['Project']['cvs_url'] . '/watchers'); ?></li>
	<li class="forks"><?php echo $this->Html->link('Collaborators: ' . $project['repository']['forks'], $project['Project']['cvs_url'] . '/network'); ?></li>
<?php endif ?>

<?php if (!empty($project['codaset'])): ?>
	<li class="updated">Last Updated: <?php echo $project['codaset']['last_pushed_at']; ?></li>
	<li class="followers"><?php echo $this->Html->link('Followers: ' . $project['codaset']['bookmark_count'], $project['Project']['cvs_url'] . '/bookmarks'); ?></li>
	<li class="forks"><?php echo $this->Html->link('Collaborators: ' . $project['codaset']['fork_count'], $project['Project']['cvs_url'] . '/forks'); ?></li>
	<li class="bugs"><?php echo $this->Html->link('Open Bugs: '.$project['codaset']['ticket_count'], $project['Project']['cvs_url'] . '/tickets'); ?> </li>
	<li class="wiki"><?php echo $this->Html->link(__('Wiki', true), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
	<li class="milestones"><?php echo $this->Html->link(__('Milestones', true), $project['Project']['cvs_url'] . '/milestones'); ?> </li>
<?php endif ?>
</ul>

<?php if (!empty($project['PostRelationship']) || !empty($project['commits'])):?>
<section id="related" class="clearfix<?php if (!empty($project['PostRelationship']) && !empty($project['commits'])) echo ' half'?>">
	<h1><?php __('Related'); ?></h1>
	<?php if (!empty($project['PostRelationship'])): ?>
	<section>
		<h2>Blog Posts</h2>
		<?php foreach ($project['PostRelationship'] as $post): ?>
			<article>
				<header>
					<h1><?php echo $this->Html->link($post['Post']['subject'], array('controller' => 'posts', $post['Post']['id']))?></h1>
					<time pubdate><?php echo $this->Time->timeAgoInWords($post['Post']['created']);?></time>
				</header>
				<?php echo $post['Post']['body']?>
				<footer>
					<?php echo $this->Html->link('Read More &rarr;', array('controller' => 'posts', 'action' => 'view', $post['Post']['id'], $post['Post']['slug']), array('class' => 'readmore', 'escape' => false)); ?>
				</footer>
			</article>
		<?php endforeach ?>
	</section>
	<?php endif ?>
	<?php if (!empty($project['repository'])): ?>
	<section>
		<h2>Recent Updates</h2>
		<ul>
		<?php foreach ($project['commits'] as $i => $commit): ?>
			<li>
				<h4><?php echo $this->Html->link($commit['message'], 'https://github.com' . $commit['url'])?></h4>
				<p>
					By <?php echo (empty($commit['author']['login'])) ? $commit['author']['name'] : $this->Html->link($commit['author']['name'], 'https://github.com/' . $commit['author']['login']);?>
					<?php echo $this->Time->timeAgoInWords($commit['authored_date']);?>
				</p>
			</li>
		<?php endforeach ?>
		</ul>
	</section>
	<?php endif ?>
	</div>
</section>
<?php endif;?>