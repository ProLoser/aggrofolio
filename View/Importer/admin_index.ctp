<style>
.timeline header {
	position: fixed;
	top: 0;
	left: 0;
	background: white;
	width: 100%;
	text-align: center;
}
.timeline header ul {
	overflow: hidden;
	list-style: none;
	margin: 10px 0;
	padding: 0;
}
.timeline header li {
	float: left;
	width: 25%;
	margin: 0;
	padding: 0;
}
div.timeline {
	overflow: hidden;
}
div.timeline ul {
	width: 25%;
	float: left;
	margin: 10px 0;
	padding: 0;
}
div.timeline li {
	margin: 5px 20px;
}
</style>
<header class="timeline">
	<h2>Sections</h2>
	<ul>
		<li>Experience</li>
		<li>Projects</li>
		<li>Media</li>
		<li>Posts</li>
	</ul>
</header>
<div class="timeline">
	<ul id="experience">
	<?php foreach ($schools as $id => $school): ?>
		<li><?php echo $school; ?></li>
	<?php endforeach ?>
	<?php foreach ($works as $id => $work): ?>
		<li><?php echo $work; ?></li>
	<?php endforeach ?>
	</ul>
	<ul id="projects">
	<?php foreach ($projects as $id => $project): ?>
		<li><?php echo $project; ?></li>
	<?php endforeach ?>
	</ul>
	<ul id="media">
	<?php foreach ($mediaItems as $id => $item): ?>
		<li><?php echo $item; ?></li>
	<?php endforeach ?>
	</ul>
	<ul id="posts">
	<?php foreach ($posts as $id => $post): ?>
		<li><?php echo $post; ?></li>
	<?php endforeach ?>
	</ul>
</div>