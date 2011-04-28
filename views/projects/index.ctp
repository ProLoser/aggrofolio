<style>
.projects ul {
	overflow: hidden;
	margin: 0;
}
.projects li {
	float: left;
	margin: 10px;
	list-style: none;
}
.projects li a {
	font-weight: bold;
	display: block;
	padding: 40px;
	background: rgba(0,0,0,.3);
	width: 120px;
	height: 80px;
	text-align: center;
	text-decoration: none;
	color: white;
	text-shadow: 0 1px 1px rgba(0,0,0,.7);
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	box-shadow: 1px 1px 2px rgba(0,0,0,.8);
	-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.8);
	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.8);
}	
.projects li a:hover {
	background: rgba(0,0,0,.7);
}
</style>
<h2><?php __('Projects');?></h2>
<?php $this->Plate->start('nav')?>
<h3>Categories</h3>
<?php echo $this->Plate->tree($categories);?> 
<?php $this->Plate->stop();?>
<div class="projects index">
	<p><?php echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	))?></p>
	
	<?php echo $this->Paginator->sort('created');?>
	- <?php echo $this->Paginator->sort('name');?> -
	<?php echo $this->Paginator->sort('project_category_id');?>
	<div class="paging">
		<?php echo $this->Paginator->prev();?>
		<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next();?>
	</div>
	<ul>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<li<?php echo $class;?>>
		<?php echo $this->Html->link($project['Project']['name'], array('action' => 'view', $project['Project']['id']), array('class' => 'view')); ?>
	</li>
	<?php endforeach; ?> 
	</ul>
	<div class="paging">
		<?php echo $this->Paginator->prev();?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next();?>
	</div>
</div>