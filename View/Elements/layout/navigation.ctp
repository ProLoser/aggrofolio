<h1><?php echo $this->Html->link(Configure::read('Settings.site_name'), '/'); ?></h1>
<ul id="mainNav">
	<li class="resume"><?php echo $this->Html->link('Resume', array('controller' => 'resumes', 'action' => 'index')); ?></li>
	<li class="blog"><?php echo $this->Html->link('Blog Posts', array('controller' => 'posts', 'action' => 'index'), array('id' => 'type-Post')); ?></li>
	<li class="project"><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index'), array('id' => 'type-Project')); ?></li>
	<li class="gallery"><?php echo $this->Html->link('Albums', array('controller' => 'albums', 'action' => 'index'), array('id' => 'type-Album')); ?></li>
	<li class="bookmark"><?php echo $this->Html->link('Bookmarks', array('controller' => 'bookmarks', 'action' => 'index'), array('id' => 'type-Bookmark')); ?></li>
	<li class="contact"><?php echo $this->Html->link('Contact', array('controller' => 'contacts', 'action' => 'index')); ?></li>
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
		$result = '<a href="#" class="reset">Reset</a>';
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
	echo $this->Html->link('Control Panel', array('admin' => true));
}?>
</nav>