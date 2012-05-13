<header><hgroup>
	<h2 class="project"><?php  echo $project['Project']['name'];?></h2>
	<?php if ($this->Session->read('Auth.User')):?>
	<p class="sorting">
		<span>Admin:</span>
		<?php 
		echo $this->Html->link('Edit Project', array('admin' => true, 'action' => 'edit', $project['Project']['id']));
		echo $this->Html->link('Add Media Item', array('admin' => true, 'controller' => 'media_items', 'action' => 'add', 'project' => $project['Project']['id']));
		?>
	</p>
	<?php endif;?>
</hgroup></header>
<?php if (!empty($project['MediaItem'])): ?>
<div id="radial_container" class="media">
	<ul class="list">
	<?php foreach ($project['MediaItem'] as $item): ?>
		<li class="item"><?php echo $this->Html->link($this->Html->image('/uploads/media/thumb-' . $item['attachment_file_name'], array('class' => 'my_class')), '/uploads/media/original-' . $item['attachment_file_name'], array('escape' => false, 'rel' => 'Project')) ?></li>
	<?php endforeach ?>	
	</ul>
	<a href="#" class="arrow" id="radright">Right</a>
	<a href="#" class="arrow" id="radleft">Left</a>
</div>
<?php endif; ?>

<article id="description"><p><?php echo $project['Project']['description']; ?></p></article>
<h3>Project Stats</h3>
<ul id="stats" class="clearfix">
<?php if (!empty($project['Project']['url'])): ?>
	<li class="url"><?php echo $this->Html->link($project['Project']['url'], $project['Project']['url'], array('title' => 'Project Url'))?></li>
<?php endif; ?>
<?php if (!empty($project['github']['has_downloads'])): ?>
	<li class="downloads"><?php echo $this->Html->link(__('Download'), $project['Project']['cvs_url'] . '/downloads'); ?> </li>
<?php endif ?>
<?php if (!empty($project['github']['has_wiki'])): ?>
	<li class="wiki"><?php echo $this->Html->link(__('Wiki'), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
<?php endif ?>
<?php if (!empty($project['github']['has_issues'])): ?>
	<li class="bugs"><?php echo $this->Html->link('Open Bugs: '.$project['github']['open_issues'], $project['Project']['cvs_url'] . '/issues'); ?> </li>
<?php endif ?>
<?php if (!empty($project['Project']['bugs_url'])): ?>
	<li class="bugs"><?php echo $this->Html->link('Issue Tracker', $project['Project']['bugs_url']); ?> </li>
<?php endif ?>
<?php if (!empty($project['ProjectCategory']['name'])): ?>
	<li class="category"><?php echo $this->Html->link($project['ProjectCategory']['name'], array('controller' => 'projects', 'action' => 'index', 'category' => $project['ProjectCategory']['id']), array('title' => 'Category')); ?></li>		  	 
<?php endif; ?>
<?php if (!empty($project['ResumeEmployer']['name'])): ?>
	<li class="organization"><p title="Organization"><?php echo $project['ResumeEmployer']['name']?></p></li>
<?php endif; ?>	
<?php if (!empty($project['ResumeSchool']['name'])): ?>
	<li class="organization"><p title="Organization"><?php echo $project['ResumeSchool']['name']?></p></li>
<?php endif; ?>
	
<?php if (!empty($project['github'])): ?>
	<li class="followers"><?php echo $this->Html->link('Followers: ' . $project['github']['watchers'], $project['Project']['cvs_url'] . '/watchers'); ?></li>
	<li class="forks"><?php echo $this->Html->link('Collaborators: ' . $project['github']['forks'], $project['Project']['cvs_url'] . '/network'); ?></li>
	<li class="updated"><p>Last Update: <?php echo $project['github']['pushed_at']; ?></p></li>
<?php endif ?>

<?php if (!empty($project['codaset'])): ?>
	<li class="followers"><?php echo $this->Html->link('Followers: ' . $project['codaset']['bookmark_count'], $project['Project']['cvs_url'] . '/bookmarks'); ?></li>
	<li class="forks"><?php echo $this->Html->link('Collaborators: ' . $project['codaset']['fork_count'], $project['Project']['cvs_url'] . '/forks'); ?></li>
	<li class="bugs"><?php echo $this->Html->link('Open Bugs: '.$project['codaset']['ticket_count'], $project['Project']['cvs_url'] . '/tickets'); ?> </li>
	<li class="wiki"><?php echo $this->Html->link(__('Wiki'), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
	<li class="milestones"><?php echo $this->Html->link(__('Milestones'), $project['Project']['cvs_url'] . '/milestones'); ?> </li>
	<li class="updated"><p>Last Updated: <?php echo $project['codaset']['last_pushed_at']; ?></p></li>
<?php endif ?>
<?php if (!empty($project['Project']['cvs_url'])): ?>
	<li class="repo"><?php echo $this->Html->link($project['Project']['cvs_url'], $project['Project']['cvs_url'], array('title' => 'Repository Hosting')); ?></li>
<?php endif; ?>
</ul>

<?php if (!empty($project['PostRelationship']) || !empty($project['commits'])):?>
<section id="related" class="clearfix<?php if (!empty($project['PostRelationship']) && !empty($project['commits'])) echo ' half'?>">
	<h3><?php echo __('Related'); ?></h3>
	<?php if (!empty($project['PostRelationship'])): ?>
	<section class="posts">
		<h2>Blog Posts</h2>
		<?php foreach ($project['PostRelationship'] as $post): ?>
			<article>
				<header>
					<h1><?php echo $this->Html->link($post['Post']['subject'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'], $post['Post']['slug']))?></h1>
					<?php echo $this->Html->time($post['Post']['created'], array('format' => 'timeAgoInWords'))?>
					<?php if (!empty($post['Post']['PostCategory']['name'])): ?>				  	 
						<h2><?php echo $post['Post']['PostCategory']['name']?></h2>
					<?php endif; ?>
				</header>
				<?php echo $this->Agro->truncate($post['Post']['body'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'], $post['Post']['slug'])); ?>
			</article>
		<?php endforeach ?>
	</section>
	<?php endif ?>
	<?php if (!empty($project['github'])): ?>
	<section id="commits">
		<h2>Recent Updates</h2>
		<ul>
		<?php foreach ($project['commits'] as $i => $commit): ?>
			<li>
				<h4><?php echo $this->Html->link($commit['commit']['message'], str_replace(array('api.github.com/repos/', 'commits'), array('github.com/', 'commit'), $commit['url']), array('title' => 'Hash: ' . $commit['sha']))?></h4>
				<p>
					By <?php echo (empty($commit['author']['login'])) ? $commit['commit']['author']['name'] : $this->Html->link($commit['commit']['author']['name'], 'https://github.com/' . $commit['author']['login']);?>
					<?php echo $this->Time->timeAgoInWords($commit['commit']['author']['date']);?>
				</p>
			</li>
		<?php endforeach ?>
		</ul>
	</section>
	<?php endif ?>
	</div>
</section>
<?php endif;?>
