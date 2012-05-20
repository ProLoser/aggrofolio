<header><hgroup>
	<h2 class="project"><?php echo __('Projects');?></h2>
	<p class="paging">
		<?php echo $this->Paginator->prev();?><?php echo $this->Paginator->numbers(array('separator'=>''));?><?php echo $this->Paginator->next();?>
	</p>
	<p class="sorting">
		<span>Sort by:</span>
		<?php echo $this->Paginator->sort('created');?><?php echo $this->Paginator->sort('name');?><?php echo $this->Paginator->sort('project_category_id', 'Category');?>
	</p>
</hgroup></header>
<ul class="gallery">
<?php foreach ($projects as $project): ?>
	<li<?php if (!empty($project['ProjectCategory'])) echo " class='cat-{$project['ProjectCategory']['id']}'";?>>
	<?php 
		$name = $project['Project']['name'];
		if (!empty($project['ProjectCategory']))
			$name .= "<span>{$project['ProjectCategory']['name']}</span>";
		echo $this->Html->link($name, array('action' => 'view', $project['Project']['id'], Inflector::slug($project['Project']['name'])), array('escape' => false)); 
		if (!empty($project['MediaItem'])) {
			echo $this->Html->image('/uploads/media/thumb-' . $project['MediaItem'][0]['attachment_file_name']);
		} elseif ($project['Project']['url']) {
			echo $this->Html->image("http://images.websnapr.com/?sw=300&sh=225&url={$project['Project']['url']}&key=b86uHWf6y38D&hash=cbfa28ab4bffa4404663b15e9613d7f1&nocache=0.0817837524227798&size=s");
		}
	?>
	</li>
<?php endforeach; ?> 
</ul>
