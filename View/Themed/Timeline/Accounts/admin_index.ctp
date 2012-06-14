<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>Select an Account </h3>
</div>
<div class="modal-body icons">
	<?php if (!empty($accounts)): ?>
		<h4>Existing Accounts</h4>
		<ul>
			<?php foreach ($accounts as $account): ?>
				<li class="<?php echo $account['Account']['type']?>">
					<?php echo $this->Html->link($account['Account']['username'], array($account['Account']['id']), array('title' => $account['Account']['username'], 'rel' => 'tooltip')); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif ?>
	<h4>Experience</h4>
	<ul>
		<li class="linkedin"><?php echo $this->Html->link('LinkedIn', array('action' => 'connect', 'linkedin'), array('rel' => 'tooltip', 'title' => 'LinkedIn')); ?></li>
		<li class="facebook"><?php echo $this->Html->link('Facebook', array('action' => 'connect', 'facebook'), array('rel' => 'tooltip', 'title' => 'Facebook')); ?></li>
	</ul>

	<h4>Projects</h4>
	<ul>
		<li class="github"><?php echo $this->Html->link('Github', array('action' => 'connect', 'github'), array('rel' => 'tooltip', 'title' => 'Github')); ?></li>
		<li class="google"><?php echo $this->Html->link('Google Code', array('action' => 'connect', 'googlecode'), array('rel' => 'tooltip', 'title' => 'Google Code')); ?></li>
		<li class="basecamp"><?php echo $this->Html->link('BaseCamp', array('action' => 'connect', 'basecamp'), array('rel' => 'tooltip', 'title' => 'BaseCamp')); ?></li>
		<li class="asana"><?php echo $this->Html->link('Asana', array('action' => 'connect', 'asana'), array('rel' => 'tooltip', 'title' => 'Asana')); ?></li>
	</ul>

	<h4>Media</h4>
	<ul>
		<li class="instagram"><?php echo $this->Html->link('Instagram', array('action' => 'connect', 'instagram'), array('rel' => 'tooltip', 'title' => 'Instagram')); ?></li>
		<li class="flickr"><?php echo $this->Html->link('Flickr', array('action' => 'connect', 'flickr'), array('rel' => 'tooltip', 'title' => 'Flickr')); ?></li>
		<li class="picasa"><?php echo $this->Html->link('Picasa', array('action' => 'connect', 'picasa'), array('rel' => 'tooltip', 'title' => 'Picasa')); ?></li>
		<li class="deviantart"><?php echo $this->Html->link('DeviantArt', array('action' => 'connect', 'deviantart'), array('rel' => 'tooltip', 'title' => 'DeviantArt')); ?></li>
		<li class="youtube"><?php echo $this->Html->link('YouTube', array('action' => 'connect', 'youtube'), array('rel' => 'tooltip', 'title' => 'YouTube')); ?></li>
		<li class="vimeo"><?php echo $this->Html->link('Vimeo', array('action' => 'connect', 'vimeo'), array('rel' => 'tooltip', 'title' => 'Vimeo')); ?></li>
		<li class="behance"><?php echo $this->Html->link('Behance', array('action' => 'connect', 'behance'), array('rel' => 'tooltip', 'title' => 'Behance')); ?></li>
		<li class="dribbble"><?php echo $this->Html->link('Dribbble', array('action' => 'connect', 'dribbble'), array('rel' => 'tooltip', 'title' => 'Dribbble')); ?></li>
		<li class="photobucket"><?php echo $this->Html->link('Photobucket', array('action' => 'connect', 'photobucket'), array('rel' => 'tooltip', 'title' => 'Photobucket')); ?></li>
		<li class="forrst"><?php echo $this->Html->link('Forrst', array('action' => 'connect', 'forrst'), array('rel' => 'tooltip', 'title' => 'Forrst')); ?></li>
	</ul>

	<h4>Bookmarks</h4>
	<ul>
		<li class="jsfiddle"><?php echo $this->Html->link('JsFiddle', array('action' => 'noauth', 'jsfiddle'), array('rel' => 'tooltip', 'title' => 'JsFiddle')); ?></li>
		<li class="delicious"><?php echo $this->Html->link('Delicious', array('action' => 'connect', 'delicious'), array('rel' => 'tooltip', 'title' => 'Delicious')); ?></li>
		<li class="stackoverflow"><?php echo $this->Html->link('Stack Overflow', array('action' => 'connect', 'stackoverflow'), array('rel' => 'tooltip', 'title' => 'Stack Overflow')); ?></li>
	</ul>

	<h4>Blogs</h4>
	<ul>
		<li class="rss"><?php echo $this->Html->link('RSS', array('action' => 'connect', 'rss'), array('rel' => 'tooltip', 'title' => 'RSS')); ?></li>
		<li class="wordpress"><?php echo $this->Html->link('Wordpress', array('action' => 'connect', 'wordpress'), array('rel' => 'tooltip', 'title' => 'Wordpress')); ?></li>
		<li class="blogger"><?php echo $this->Html->link('Blogger', array('action' => 'connect', 'blogger'), array('rel' => 'tooltip', 'title' => 'Blogger')); ?></li>
		<li class="tumblr"><?php echo $this->Html->link('Tumblr', array('action' => 'connect', 'tumblr'), array('rel' => 'tooltip', 'title' => 'Tumblr')); ?></li>
	</ul>
</div>