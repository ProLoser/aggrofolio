<?php if (!empty($projects)): ?>
<div class="projects">
	<h5>Projects:</h5>
	<ul class="names">
	<?php foreach ($projects as $project): ?>			
		<li>
			<h1><?php echo $this->Html->link($project['name'], array('controller' => 'projects', 'action' => 'view', $project['id']), array('rel' => 'project-'.$project['id'], 'title' => $project['description'])); ?></h1>
		</li>
	<?php endforeach ?>
	</ul>
	<ul class="thumbs clearfix media">
	<?php foreach ($projects as $project): ?>				
		<?php foreach ($project['MediaItem'] as $item): ?>
		<li class="project-<?php echo $project['id']?>">
			<?php echo $this->Html->link(
				$this->Html->image('/uploads/thumb-' . $item['attachment_file_name']), 
				'/uploads/original-' . $item['attachment_file_name'], 
				array('rel' => 'project-' . $project['id'], 'escape' => false)
			)?>
		</li>
		<?php endforeach ?>
	<?php endforeach ?>
	</ul>
</div>
<?php endif; ?>