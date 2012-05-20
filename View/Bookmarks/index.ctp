<header><hgroup>
	<h2><?php echo __('Bookmarks');?></h2>
</hgroup></header>
<article class="bookmarks index">
	<?php foreach ($bookmarks as $bookmarkCategory):?>
		<h2><?php echo $bookmarkCategory['BookmarkCategory']['name']?></h2>
		<ul>
		<?php foreach ($bookmarkCategory['Bookmark'] as $bookmark):	?>
			<li>
				<h4><a href="<?php echo $bookmark['url'] ?>"><?php echo $bookmark['name'] ?></a></h4>
				<p><?php echo $bookmark['description'] ?></p>
			</li>
		<?php endforeach; ?>
		</ul>
	<?php endforeach; ?>
</article>
