<header>
	<hgroup><h1><?php  __('Project');?></h1></hgroup>
</header>
<article class="projects view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['modified']; ?>
			&nbsp;
		</dd>
	<?php if (!empty($project['repository'])): ?>	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['repository']['pushed_at']; ?>
			&nbsp;
		</dd>
	<?php endif ?>
	<?php if (!empty($project['codaset'])): ?>	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['codaset']['last_pushed_at']; ?>
			&nbsp;
		</dd>
	<?php endif ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['description']; ?>
			&nbsp;
		</dd>
	<?php if (!empty($project['codaset'])): ?>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Watchers'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['codaset']['bookmark_count']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Forks'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['codaset']['fork_count']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Issues'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['codaset']['ticket_count']; ?>
			&nbsp;
		</dd>
	<?php endif ?>
	<?php if (!empty($project['repository'])): ?>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Homepage'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['repository']['homepage']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Watchers'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['repository']['watchers']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Forks'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['repository']['forks']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Open Issues'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['repository']['open_issues']; ?>
			&nbsp;
		</dd>
	<?php endif ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hash Tag'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['hash_tag']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cvs Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['cvs_url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['ProjectCategory']['name'], array('controller' => 'categories', 'action' => 'view', $project['ProjectCategory']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
<?php if (!empty($project['repository'])): ?>
	<h1>Recent Updates</h1>
	<ol>
	<?php foreach ($project['commits'] as $i => $commit): ?>
		<li>
			<h4><?php echo $this->Html->link($commit['author']['name'] . ' at ' . $this->Time->nice($commit['authored_date']), 'https://github.com' . $commit['url'])?></h4>
			<p><?php echo $commit['message']?></p>
		</li>
	<?php endforeach ?>
	</ol>
<?php endif ?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project', true), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Project', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
<?php if (!empty($project['repository'])): ?>
	<h3><?php __('Related'); ?></h3>
	<ul>
		<?php if ($project['repository']['has_issues']): ?>
			<li><?php echo $this->Html->link(__('Issues', true), $project['Project']['cvs_url'] . '/issues'); ?> </li>
		<?php endif ?>
		<?php if ($project['repository']['has_wiki']): ?>
			<li><?php echo $this->Html->link(__('Wiki', true), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
		<?php endif ?>
		<?php if ($project['repository']['has_downloads']): ?>
			<li><?php echo $this->Html->link(__('Downloads', true), $project['Project']['cvs_url'] . '/downloads'); ?> </li>
		<?php endif ?>
	</ul>
<?php endif ?>
<?php if (!empty($project['codaset'])): ?>
	<h3><?php __('Related'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Issues', true), $project['Project']['cvs_url'] . '/tickets'); ?> </li>
		<li><?php echo $this->Html->link(__('Wiki', true), $project['Project']['cvs_url'] . '/wiki'); ?> </li>
		<li><?php echo $this->Html->link(__('Milestones', true), $project['Project']['cvs_url'] . '/milestones'); ?> </li>
		<li><?php echo $this->Html->link(__('Blog', true), $project['Project']['cvs_url'] . '/blog'); ?> </li>
	<?php if ($project['codaset']['state'] == 'public'): ?>
		<li><?php echo $this->Html->link(__('Source', true), $project['Project']['cvs_url'] . '/source'); ?> </li>
	<?php endif ?>
	</ul>
<?php endif ?>
</article>