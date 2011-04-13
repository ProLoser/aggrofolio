<a href="#" id="show_menu">&raquo;</a>
<div id="left_menu">
	<ul id="main_menu">
		<li id="hide_menu"><a href="#">&laquo;</a></li>
		<li><?php echo $this->Html->link($this->Html->image('icons/comments.png', array('alt'=>'Posts')) . ' Posts', array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?></li>
		<li>
			<?php echo $this->Html->link($this->Html->image('icons/user.png', array('alt'=>'Users')) . ' Users', '#', array('escape' => false)); ?>
			<ul>
				<li><?php echo $this->Html->link('Accounts', array('controller' => 'accounts', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Albums', array('controller' => 'albums', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Bookmarks', array('controller' => 'bookmarks', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Bookmark Categories', array('controller' => 'bookmark_categories', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Comments', array('controller' => 'comments', 'action' => 'index'))?></li>
			</ul>	
		</li>
		<li>
			<?php echo $this->Html->link($this->Html->image('icons/palette.png', array('alt'=>'Media')) . ' Media', '#', array('escape' => false)); ?>
			<ul>
				<li><?php echo $this->Html->link('Items', array('controller' => 'media_items', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Item Categories', array('controller' => 'media_categories', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Project Categories', array('controller' => 'project_categories', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Volunteers', array('controller' => 'volunteers', 'action' => 'index'))?></li>
			</ul>	
		</li>
		<li>
			<a href="#"><?php echo $this->Html->image('icons/folder_page.png', array('alt'=>'Posts')); ?>Resume</a>
			<ul>
				<li><?php echo $this->Html->link('Resumes', array('controller' => 'resumes', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Employers', array('controller' => 'resume_employers', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Items', array('controller' => 'resume_items', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Recommendations', array('controller' => 'resume_recommendations', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Schools', array('controller' => 'resume_schools', 'action' => 'index'))?></li>
				<li><?php echo $this->Html->link('Skills', array('controller' => 'resume_skills', 'action' => 'index'))?></li>
			</ul>	
		</li>
	</ul>
</div>