<h2><?php __('Projects');?></h2>
<div class="gallery">
	<p class="paging">
		<?php echo $this->Paginator->prev();?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next();?>
		<span class="sorting">
			Sort by: 
			<?php echo $this->Paginator->sort('created');?> 
			| <?php echo $this->Paginator->sort('name');?> | 
			<?php echo $this->Paginator->sort('Category', 'project_category_id');?>
		</span>
	</p>
	<ul>
	<?php foreach ($projects as $project): ?>
	<li<?php if (!empty($project['ProjectCategory'])) echo " class='cat-{$project['ProjectCategory']['id']}'";?>>
	<?php 
		$name = $project['Project']['name'];
		if (!empty($project['ProjectCategory']))
			$name .= "<span>{$project['ProjectCategory']['name']}</span>";
		echo $this->Html->link($name, array('action' => 'view', $project['Project']['id']), array('escape' => false)); 
		if (!empty($project['MediaItem'])) echo $this->Html->image('/uploads/thumb-' . $project['MediaItem'][0]['attachment_file_name']);
	?>
	</li>
	<?php endforeach; ?> 
	</ul>
	<p class="paging">
		<?php echo $this->Paginator->prev();?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next();?>
		<span class="sorting">
			Sort by: 
			<?php echo $this->Paginator->sort('created');?> 
			| <?php echo $this->Paginator->sort('name');?> | 
			<?php echo $this->Paginator->sort('Category', 'project_category_id');?>
		</span>
	</p>
</div>