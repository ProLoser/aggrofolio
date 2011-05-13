<h1><?php echo $this->Html->link('Dean Sofer', '/'); ?></h1>
<ul id="mainNav">
	<li><?php echo $this->Html->link('Resume', array('controller' => 'resumes', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Gallery', array('controller' => 'albums', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Blog', array('controller' => 'posts', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Bookmarks', array('controller' => 'bookmarks', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Contact', array('controller' => 'contacts', 'action' => 'index')); ?></li>
</ul>


<?php if (!empty($nav_for_layout)): ?>
<nav>
	<?php echo $nav_for_layout; ?>
</nav>		
<?php endif;?>

<?php if (!empty($categories)): ?>
<nav>
	<div id="categories">
		<h3>Categories</h3>
		<?php echo $this->Plate->tree($categories, array('callback' => '_categories'));?> 
		<p class="reset"><a href="#">&raquo; Reset &laquo;</a></p>
	</div>
</nav>		
<?php endif;?>