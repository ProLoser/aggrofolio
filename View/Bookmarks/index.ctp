<header>
	<h2><?php echo __('Bookmarks');?></h2>
</header>
<article class="bookmarks index">
	<?php
	function recurse($data, $recursive = false) {	
		foreach ($data as $bookmarkCategory):?>
			<?php if ($recursive): ?>
				<h2><?php echo $bookmarkCategory['BookmarkCategory']['name']?></h2>
		  	 <?php else: ?>
				<h3><?php echo $bookmarkCategory['BookmarkCategory']['name']?></h3>
			<?php endif; ?>
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
				<?php recurse($bookmarkCategory['children'], true); ?>
			</div>
			<?php endif ?>
		<?php
		endforeach;
	}

	recurse($bookmarks);
	?>
</article>