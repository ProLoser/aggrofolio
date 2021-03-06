<h1><?php echo $this->Html->link($owner['Setting']['site_name'], '/'); ?></h1>
<ul id="mainNav">
<?php if ($navBlog): ?>
	<li class="blog<?php if ($this->request->controller === 'posts') echo ' active'; ?>"><?php echo $this->Html->link('Blog', array('controller' => 'posts', 'action' => 'index'), array('id' => 'type-Post')); ?></li>
<?php endif ?>
<?php if ($navProjects): ?>
	<li class="project<?php if ($this->request->controller === 'projects') echo ' active'; ?>"><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index'), array('id' => 'type-Project')); ?></li>
<?php endif ?>
<?php if ($navGallery): ?>
	<li class="gallery<?php if ($this->request->controller === 'albums') echo ' active'; ?>"><?php echo $this->Html->link('Media', array('controller' => 'albums', 'action' => 'index'), array('id' => 'type-Album')); ?></li>
<?php endif ?>
<?php if ($navBookmarks): ?>
	<li class="bookmark<?php if ($this->request->controller === 'bookmarks') echo ' active'; ?>"><?php echo $this->Html->link('Bookmarks', array('controller' => 'bookmarks', 'action' => 'index'), array('id' => 'type-Bookmark')); ?></li>
<?php endif ?>
<?php if ($navResume): ?>
	<li class="resume<?php if ($this->request->controller === 'resumes') echo ' active'; ?>"><?php echo $this->Html->link('Resume', array('controller' => 'resumes', 'action' => 'index')); ?></li>
<?php endif ?>
	<li class="contact<?php if ($this->request->controller === 'contacts') echo ' active'; ?>"><?php echo $this->Html->link('Contact', array('controller' => 'contacts', 'action' => 'index')); ?></li>
</ul>

<?php if (!empty($nav_for_layout)): ?>
<nav>
	<?php echo $nav_for_layout; ?>
</nav>
<?php endif;?>

<?php if (!empty($categories)): ?>
<nav id="categories">
	<h3>Categories</h3>
	<?php echo $this->Plate->tree($categories, array('callback' => function($view, $row) {
		$model = key($row);
		$result = '<a class="reset">Reset</a>';
		$result .= $view->HtmlPlus->link(
			$row[$model]['name'],
			array('category' => $row[$model]['id']),
			array('title' => strip_tags(str_replace('"', '\"', $row[$model]['description'])), 'id' => 'cat-' . $row[$model]['id'])
		);
		return $result;
	}));?>
</nav>
<?php endif;?>

<?php if (!empty($navAccounts)): ?>
<nav id="accounts">
	<h3>Follow Me</h3>
	<ul>
<?php foreach ($navAccounts as $account):?>
		<li class="<?php echo $account['Account']['type']?>"><?php echo $this->Agro->account($account['Account'])?></li>
<?php endforeach;?>
	</ul>
</nav>
<?php endif; ?>

<nav id="login">
<?php
if (!$this->Session->read('Auth.User')) {
	echo $this->Html->link('Login', '/login');
} else {
	echo $this->Html->link('Logout', '/logout');
	if ($owner['User']['id'] === $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.role') === 'admin') {
		echo " | ";
		echo $this->Html->link('Admin', array('admin' => true));
	}
}?>
</nav>
