<?php if (!empty($projects)): ?>
<div class="projects">
	<h5>Projects:</h5>
	<ul>
	<?php foreach ($projects as $project): ?>			
		<li>
			<h1><?php echo $this->Html->link($project['name'], array('controller' => 'projects', 'action' => 'view', $project['id']), array('title' => $project['description'])); ?></h1>
		</li>
	<?php endforeach ?>
	</ul>
</div>
<?php endif; ?>