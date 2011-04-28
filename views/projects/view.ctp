<?php $this->Plate->start('nav')?>
	<h3><?php __('Related'); ?></h3>
	<ul>
	<?php if (!empty($project['ProjectCategory']['name'])): ?>
		<li><?php echo $this->Html->link('Category: '.$project['ProjectCategory']['name'], array('controller' => 'project_categories', 'action' => 'view', $project['ProjectCategory']['id'])); ?></li>		  	 
	<?php endif; ?>
	<?php if (!empty($project['repository'])): ?>
		<?php if ($project['repository']['has_issues']): ?>
			<li><?php echo $this->Html->link('Issues ('.$project['repository']['open_issues'].')', $project['Project']['cvs_url'] . '/issues'); ?> </li>
		<?php endif ?>
		<?php if ($project['repository']['has_wiki']): ?>
			<li><?php echo $this->Html->link(__('Wiki', true), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
		<?php endif ?>
		<?php if ($project['repository']['has_downloads']): ?>
			<li><?php echo $this->Html->link(__('Downloads', true), $project['Project']['cvs_url'] . '/downloads'); ?> </li>
		<?php endif ?>
	<?php endif ?>
	<?php if (!empty($project['codaset'])): ?>
		<li><?php echo $this->Html->link('Issues ('.$project['codaset']['ticket_count'].')', $project['Project']['cvs_url'] . '/tickets'); ?> </li>
		<li><?php echo $this->Html->link(__('Wiki', true), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
		<li><?php echo $this->Html->link(__('Milestones', true), $project['Project']['cvs_url'] . '/milestones'); ?> </li>
		<li><?php echo $this->Html->link(__('Blog', true), $project['Project']['cvs_url'] . '/blog'); ?> </li>
		<?php if ($project['codaset']['state'] == 'public'): ?>
			<li><?php echo $this->Html->link(__('Source', true), $project['Project']['cvs_url'] . '/source'); ?> </li>
		<?php endif ?>
	<?php endif ?>	
	</ul>
<?php $this->Plate->stop()?>
<h2><?php  echo $project['Project']['name'];?></h2>
<div id='radial_container'>
	<ul class='list'>
		<li class="item"><div class="my_class">1</div></li>
		<li class="item"><div class="my_class">2</div></li>
		<li class="item"><div class="my_class">3</div></li>
		<li class="item"><div class="my_class">4</div></li>
		<li class="item"><div class="my_class">5</div></li>
		<li class="item"><div class="my_class">6</div></li>
		<li class="item"><div class="my_class">7</div></li>
		<li class="item"><div class="my_class">8</div></li>
		<li class="item"><div class="my_class">9</div></li>
	</ul>
	<a href="#" class="arrow" id="radright">Right &raquo;</a>
	<a href="#" class="arrow" id="radleft">&laquo; Left</a>
</div>
<div class="projects view">
	<p><?php echo $project['Project']['description']; ?></p>
	<?php if (!empty($project['repository'])): ?>	
		<p>Last Updated: <?php echo $project['repository']['pushed_at']; ?></p>
	<?php endif ?>
	<?php if (!empty($project['codaset'])): ?>
		<p>Last Updated: <?php echo $project['codaset']['last_pushed_at']; ?></p>
	<?php endif ?>
	<?php if (!empty($project['codaset'])): ?>		
		<dt><?php __('Watchers'); ?></dt>
		<dd>
			<?php echo $project['codaset']['bookmark_count']; ?>
			&nbsp;
		</dd>
		<dt><?php __('Forks'); ?></dt>
		<dd>
			<?php echo $project['codaset']['fork_count']; ?>
			&nbsp;
		</dd>
	<?php endif ?>
	<?php if (!empty($project['repository'])): ?>		
		<dt><?php __('Homepage'); ?></dt>
		<dd>
			<?php echo $project['repository']['homepage']; ?>
			&nbsp;
		</dd>
		<dt><?php __('Watchers'); ?></dt>
		<dd>
			<?php echo $project['repository']['watchers']; ?>
			&nbsp;
		</dd>
		<dt><?php __('Forks'); ?></dt>
		<dd>
			<?php echo $project['repository']['forks']; ?>
			&nbsp;
		</dd>
	<?php endif ?>
		<dt><?php __('Cvs Url'); ?></dt>
		<dd>
			<?php echo $project['Project']['cvs_url']; ?>
			&nbsp;
		</dd>
	</dl>
<?php if (!empty($project['PostRelationship'])): ?>
<section>
	<h1>Related Blog Posts</h1>
	<?php foreach ($project['PostRelationship'] as $post): ?>
		<article>
			<time pubdate><?php echo $this->Time->timeAgoInWords($post['Post']['created']);?></time>
			<h1><?php echo $this->Html->link($post['Post']['subject'], array('controller' => 'posts', $post['Post']['id']))?></h1>
			<?php echo $post['Post']['body']?>
		</article>
	<?php endforeach ?>
</section>
<?php endif ?>
<?php if (!empty($project['repository'])): ?>
<section>
	<h1>Recent Updates</h1>
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