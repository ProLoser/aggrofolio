<header>
	<hgroup>
		<h1><?php echo $this->Html->link('Administrator', '/admin')?></h1>
		<h2><?php echo $this->Html->link('View Site', '/')?></h2>
	</hgroup>
	<div>
		<p>Welcome </p>
		<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('title' => 'Logout', 'class' => 'logout'))?>
	</div>
</header> 

<h3>Admin</h3>
<ul class="toggle">
	<li class="icn_profile"><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li>
	<li class="icn_view_users"><?php echo $this->Html->link('Accounts', array('controller' => 'accounts', 'action' => 'index')); ?></li>
	<li class="icn_edit_article"><?php echo $this->Html->link('Emails', array('controller' => 'contacts', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Settings', array('controller' => 'settings', 'action' => 'index')); ?></li>
</ul>
<h3>Blog</h3>
<ul class="toggle">
	<li class="icn_new_article"><?php echo $this->Html->link('New Post', array('controller' => 'posts', 'action' => 'add')); ?></li>
	<li class="icn_edit_article"><?php echo $this->Html->link('Edit Posts', array('controller' => 'posts', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Categories', array('controller' => 'post_categories', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Comments', array('controller' => 'comments', 'action' => 'index')); ?></li>
</ul>
<h3>Media</h3>
<ul class="toggle">
	<li class="icn_folder"><?php echo $this->Html->link('Albums', array('controller' => 'albums', 'action' => 'index')); ?></li>
	<li class="icn_photo"><?php echo $this->Html->link('Items', array('controller' => 'media_items', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Categories', array('controller' => 'media_categories', 'action' => 'index')); ?></li>
</ul>
<h3>Bookmarks</h3>
<ul class="toggle">
	<li class="icn_new_article"><?php echo $this->Html->link('New Bookmark', array('controller' => 'bookmarks', 'action' => 'add')); ?></li>
	<li class="icn_tags"><?php echo $this->Html->link('Edit Bookmarks', array('controller' => 'bookmarks', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Categories', array('controller' => 'bookmark_categories', 'action' => 'index')); ?></li>
</ul>
<h3>Projects</h3>
<ul class="toggle">
	<li class="icn_new_article"><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Categories', array('controller' => 'project_categories', 'action' => 'index')); ?></li>
</ul>
<h3>Resume</h3>
<ul class="toggle">
	<li class="icn_new_article"><?php echo $this->Html->link('Resumes', array('controller' => 'resumes', 'action' => 'index')); ?></li>
	<li class="icn_tags"><?php echo $this->Html->link('Employers', array('controller' => 'resume_employers', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Schools', array('controller' => 'resume_schools', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Recommendations', array('controller' => 'resume_recommendations', 'action' => 'index')); ?></li>
	<li class="icn_categories"><?php echo $this->Html->link('Skills', array('controller' => 'resume_skills', 'action' => 'index')); ?></li>
</ul>

<footer>
	<hr />
	<p><strong>Copyright &copy; 2011 Aggrofolio.com</strong></p>
	<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
</footer>