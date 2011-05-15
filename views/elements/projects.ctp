<?php if (!empty($projects)): ?>
<div class="projects">
	<h5>Projects:</h5>
	<ul>
	<?php foreach ($projects as $project): ?>			
		<li>
			<h1><?php echo $this->Html->link($project['name'], array('controller' => 'projects', 'action' => 'view', $project['id']), array('rel' => 'project-'.$project['id'])); ?></h1>
			<?php if (!empty($project['MediaItem']) || !empty($project['description'])): ?>
				<div>
					<?php echo $project['description']?>
					<p>
					<?php foreach ($project['MediaItem'] as $item): ?>
						<?php echo $this->Html->image('/uploads/thumb-' . $item['attachment_file_name'])?>
					<?php endforeach ?>
					</p>
				</div>
			<?php endif; ?>
		</li>
	<?php endforeach ?>
	</ul>
</div>
<?php endif; ?>