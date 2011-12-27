<header>
	<h2><?php echo __('Bookmarks');?></h2>
</header>
<article class="bookmarks index">
	<?php
	function recurse($data) {	
		foreach ($data as $bookmarkCategory):?>
			<h3><?php echo $bookmarkCategory['BookmarkCategory']['name']?></h3>
			<ul>
			<?php foreach ($bookmarkCategory['Bookmark'] as $bookmark):	?>
				<li>
					<h4><a href="<?php echo $bookmark['url'] ?>"><?php echo $bookmark['name'] ?></a></h4>
					<p><?php echo $bookmark['description'] ?></p>
				</li>
			<?php endforeach; ?>
			</ul>
			<?php if (!empty($bookmarkCategory['children'])): ?>
			<div class="child">
				<?php recurse($bookmarkCategory['children']); ?>
			</div>
			<?php endif ?>
		<?php
		endforeach;
	}

	recurse($bookmarks);
	?>
</article>
<style>
.child {
	margin: 0px 40px;
}
#main .child h3 {
	margin-left: 0;
	padding-left: 0;
}
</style>